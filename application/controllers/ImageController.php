<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 02.02.2018
 * Time: 2:22
 */

namespace application\controllers;

use application\core\Controller;


class ImageController
{
    public $errors = [];
    public $checkCorrectly = true;

    public function __construct($route, array $url_params = [], array $post_vars = [])
    {
        parent::__construct($route, $url_params, $post_vars);
    }

    public function existPost($post)
    {
        if (isset($post["submit"])) {
            return true;
        }
    }

    public function checkIfFake($filesTmpName)
    {

        $check = getimagesize($filesTmpName);

        if ($check !== false) {
            $this->errors[] = "File is an image - " . $check["mime"] . ".";
            return true;
        } else {
            $this->errors[] = "File is not an image.";
            return false;
        }
    }


    public function ifFileExist($targetFile)
    {

        if (file_exists($targetFile)) {
            $this->errors[] = "Sorry, file already exists.";
            return false;
        }

    }


    public function checkFileFormat($imageFileType)
    {

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $this->errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }
    }


    public function uploadImage($filesName, $filesTmpName, $post)
    {
        if ($this->existPost($post)) {

            $target_dir = IMAGE_PATH;
            $targetFile = $target_dir . basename($filesName); // имена в форме же любые могут быть
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $ifFake = $this->checkIfFake($filesTmpName);
            $fileExist = $this->ifFileExist($targetFile);
            $checkFormat = $this->checkFileFormat($imageFileType);

            if ($ifFake && $fileExist && $checkFormat) {

                if (move_uploaded_file($filesTmpName, $targetFile)) {
                    $this->errors[] = "The file " . basename($filesName) . " has been uploaded.";
                } else {
                    $this->errors[] = "Sorry, there was an error uploading your file.";
                }

            }

        }


    }
}