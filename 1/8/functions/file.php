<?php

function photo_getUploadedName() {
    if (!empty($_POST['imgName'])) {
        switch (true) {
            case (false !== preg_match('/\.(jpg)/', $_POST['imgName'])):
                $imgType = 'jpg';
                break;
            case (false !== preg_match('/\.(jpeg)/', $_POST['imgName'])):
                $imgType = 'jpeg';
                break;
        }
        $rez = $_POST['imgName'].'.'.$imgType;
        return $rez;
    }
    return false;
}

function photo_upload() {
    if (!empty($_FILES)) {
        $rez = [];
        if (false !== $photoName = photo_getUploadedName()) {
            $_FILES['image']['name'] = $photoName;
        }
        $rez['name'] = $_FILES['image']['name'];
        $rez['path'] = 'img/'.basename($_FILES['image']['name']);
        if (false !== move_uploaded_file($_FILES['image']['tmp_name'], $rez['path'])) {
            return $rez;
        }
    }
    return false;
}
