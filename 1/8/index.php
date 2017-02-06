<?php

include __DIR__.'/functions/sql.php';
include __DIR__.'/functions/file.php';
include __DIR__.'/models/users.php';
include __DIR__.'/models/photo.php';

post_exec();
$userData = user_getData();
$items = photo_getAll();

include __DIR__.'/views/index.php';