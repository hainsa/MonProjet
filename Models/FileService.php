<?php

class FileService
{

    function saveFile()
    {
        $photo = $_FILES['image'];
        $emplacement = "images/";

        $uploadOk = 1;
        $fileNumber = rand(10000, 99999);
        $cible = $emplacement . $fileNumber . basename($photo['name']);

        $extension = pathinfo($cible, PATHINFO_EXTENSION);
        if ($extension != 'jpg' && $extension != 'png' && $extension != 'gif') {
            echo "le fichier n'est pas de type image";
            $uploadOk = 0;
        }
        if ($photo['size'] > 500000) {
            echo "le fichier est très volumineux";
            $uploadOk = 0;
        }
        if (file_exists($cible)) {
            $uploadOk = 0;
        }

        if ($uploadOk === 1) {
            if (move_uploaded_file($photo["tmp_name"], $cible)) {
                //echo "fichier televersé";
                return $fileNumber . basename($photo['name']);
            };
        } else {
            return "le fichier n'est pas telechargé!";
        }
    }
}
