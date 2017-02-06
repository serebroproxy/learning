<?php

include __DIR__.'/../functions/user.php';

function user_logIn($login, $pass) {
    $query = "SELECT username, login FROM users WHERE login='".$login."' and pass='".$pass."'";
    return sql_userQuery($query);
}