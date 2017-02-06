<?php

session_start();
$pth = '1/6/';

mysql_connect('localhost', 'root', '');
mysql_select_db('test');
mysql_query('DELETE FROM images');

foreach (scandir($pth) as $value) {
    if (preg_match('/\.(jpg|jpeg)/', $value)) {
        mysql_query("INSERT INTO images (name) VALUE ('".$value."')");
    }
}

$res = mysql_query('SELECT * FROM images');

if (isset($_POST['ex'])) {
    $_SESSION['auth'] = false;
    $_SESSION['login'] = '';
}

$_SESSION['user'] = [[log=>'anya',
    pas=>'1234'],
    [log=>'igor',
        pas=>'4321']];

if (!empty($_POST['login'])) {
    foreach ($_SESSION['user'] as $us) {
        if (($_POST['login'] == $us['log']) && ($_POST['passw'] == $us['pas'])) {
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $us['log'];
        }
    }
    if (!$_SESSION['auth']) {
        echo 'Вы ввели неверные данные!';
    }
}
if (!empty($_POST['imgName'])) {
    switch (true) {
        case (false !== preg_match('/\.(jpg)/', $_POST['imgName'])):
            $imgType = 'jpg';
            break;
        case (false !== preg_match('/\.(jpeg)/', $_POST['imgName'])):
            $imgType = 'jpeg';
            break;
    }
    $_FILES['image']['name'] = $_POST['imgName'].'.'.$imgType;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $pth.basename($_FILES['image']['name']))) {
        echo 'Файл '.$_POST['imgName'].'.'.$imgType.' коректно загружен!<br>';
    }
} else {
    if (move_uploaded_file($_FILES['image']['tmp_name'], $pth.basename($_FILES['image']['name']))) {
        echo 'Файл '.$_FILES['image']['name'].' коректно загружен!<br>';
    }
}
?>
<html>
<head>
</head>
<body>
<?php if (!$_SESSION['auth']) : ?>
    <form action="http://test/index.php" method="post">
        <p>Введите login:</p>
        <input type="text" name="login" />
        <p>Введите пароль:</p>
        <input type="password" name="passw" />
        <p><input type="submit" value="войти" /></p>
    </form>
<?php endif ?>
<?php if ($_SESSION['auth']) : ?>
    <p>Здравствуйте <?php echo  $_SESSION['login']?>!</p>
    <p>Вы успешно вошли на сайт!</p>
    <form action="http://test/index.php" method="post">
        <p><input type="submit" value="выйти" name="ex" /></p>
    </form><br>
    <form action="http://test/index.php" method="post" enctype="multipart/form-data">

        <input type="text", name="imgName">
        <input type="file", name="image">
        <input type="submit">
    </form>
<?php endif ?>
<?php while (false !== ($row = mysql_fetch_array($res))) : ?>
    <div style="float: left;">
        <p><?php echo $row['name']; ?></p>
        <img src="<?php echo $pth.$row['name']; ?>" height="200" />
    </div>
<?php endwhile?>
</body>
</html>