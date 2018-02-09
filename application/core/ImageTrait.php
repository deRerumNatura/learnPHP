<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 03.02.2018
 * Time: 19:21
 */

namespace application\core;


trait ImageTrait
{
    ///////////////////////////////////////////////////////////////////
    /// //////////IMAGE CONTROLLER/////////////////////////////////////
    /// ///////////////////////////////////////////////////////////////
//    public $errors = [];

    public function existPost($post)
    {
        if (isset($post["submitImg"])) {
            return true;
        }
    }

    public function checkIfFake($filesTmpName)
    {

        $check = getimagesize($filesTmpName);

        if ($check !== false) {
//            $this->errors[] = "File is an image - " . $check["mime"] . ".";
//            todo убрать вывод ошибок, так как они не нужны, если файл валидный
            return false;
        } else {
            $this->errors[] = "File is not an image.";
            return true;
        }
    }


    public function ifFileExist($targetFile)
    {

        if (file_exists($targetFile)) {
            $this->errors[] = "Sorry, file already exists.";
            return true;
        }
        return false;

    }


    public function checkFileFormat($imageFileType)
    {
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
//            dump($imageFileType);
//            exit();
            $this->errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }
        return true;
    }


    public function uploadImage($file, $controllersName, $lastInsertId)
    {
//        dump($file[key($file)]['name']);
//        if ($file[key($file)]['name'] != '') {
            $filesTmpName = $file[key($file)]['tmp_name'];
//        dump($extension);
            $extension = pathinfo($file[key($file)]['name'])['extension'];
            $filesName = $controllersName . '_' . $lastInsertId . '.' . $extension;



            $dir = $_SERVER['DOCUMENT_ROOT'] . IMAGE_PATH . $controllersName . '/';
            if (!is_dir($dir)) {
                mkdir($dir);
            }

            $targetFile = $dir . $filesName;
//            dump($targetFile);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//            $ifFake = $this->checkIfFake($filesTmpName);
            $fileExist = $this->ifFileExist($targetFile);
            $checkFormat = $this->checkFileFormat($imageFileType);
//            dump($ifFake);
//            dump($fileExist);
//            dump( $checkFormat);
            if (/*!$ifFake &&*/ !$fileExist && $checkFormat) {
//                dump('move file');
//                $targetFile = 'newName.jpg';
                if (move_uploaded_file($filesTmpName, $targetFile)) {
                    $this->messages[] = "The file " . $filesName . " has been uploaded.";
                    return $filesName;
                } else {
                    $this->errors[] = "Sorry, there was an error uploading your file.";
                }
            } else {
                return false;
            }

//        } else
//            return false;

    }
    ///////////////////////////////////////////////////////////////////
    /// //////////END IMAGE CONTROLLER/////////////////////////////////
    /// ///////////////////////////////////////////////////////////////

}