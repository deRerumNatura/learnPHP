<?php

namespace application\core;
use application\core\View;

class Controller
{
    public $route;
    public $url_params;
    public $post_vars;
    public $view;
    public $session_login;
    public $errors = [];

    public function __construct($route, $url_params = [], $post_vars = [])
    {
        // dump($route);
        $this->route = $route;
        $this->url_params = $url_params;
        $this->post_vars = $post_vars;
        $this->view = new View($route);

    }

    public function checkSession($user_id)
    {
        if (empty($_SESSION['user_id'])) {
            header("location: /account/login");
        }

    }

    ///////////////////////////////////////////////////////////////////
    /// //////////IMAGE CONTROLLER/////////////////////////////////////
    /// ///////////////////////////////////////////////////////////////

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

            if ($ifFake && !$fileExist && !$checkFormat) {

                if (move_uploaded_file($filesTmpName, $targetFile)) {
                    $this->errors[] = "The file " . basename($filesName) . " has been uploaded.";
                } else {
                    $this->errors[] = "Sorry, there was an error uploading your file.";
                }

            }

        }

    }
    ///////////////////////////////////////////////////////////////////
    /// //////////END IMAGE CONTROLLER/////////////////////////////////
    /// ///////////////////////////////////////////////////////////////

}