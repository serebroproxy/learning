<?php

define('secInDay', 62*62*24);

function user_getData() {
    if (!empty($_COOKIE['login']) && !empty($_COOKIE['username'])) {
        return $_COOKIE['username'];
    }
    return false;
}

function user_logOut() {
    setcookie('username', '', time()-3600);
    setcookie('login', '', time()-3600);
    header('Location: http://test/1/8/index.php');
}

function post_exec() {
    if (!empty($_POST['login']) && !empty($_POST['pass'])) {
        $rez = user_logIn($_POST['login'], $_POST['pass']);
        if (false !== $rez) {
            setcookie('login', $rez['login'], time()+secInDay);
            setcookie('username', $rez['username'], time()+secInDay);
            header('Location: http://test/1/8/index.php');
        }
    }
    if (!empty($_FILES) && (false !== $res = photo_upload())) {
        photo_insert($res['name'], $res['path']);
    }
    if (isset($_POST['ex'])) {
        user_logOut();
    }
}