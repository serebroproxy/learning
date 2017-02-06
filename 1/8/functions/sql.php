<?php

function sql_connect() {
    mysql_connect('localhost', 'root', '');
    mysql_select_db('test');
}

function sql_query($query) {
    sql_connect();
    $res = mysql_query($query);
    $rez = [];
    while (false !== $row = mysql_fetch_array($res)) {
        $rez[] = $row;
    }
    return $rez;
}

function sql_userQuery($query) {
    sql_connect();
    $res = mysql_query($query);
    return mysql_fetch_assoc($res);
}

function sql_exec($query) {
    sql_connect();
    mysql_query($query);
}