<?php


function photo_getAll() {
    $query = 'SELECT * FROM photos';
    return sql_query($query);
}

function photo_insert($name, $path) {
    $query = "INSERT INTO photos (name, path) VALUES ('".$name."', '".$path."')";
    sql_exec($query);
}