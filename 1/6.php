<?php

session_start();

$pth = '6/';

if (isset($_POST['ex'])) {
    $_SESSION['auth'] = false;
    $_SESSION['login'] = '';
}

$_SESSION['user'] = [[log=>'anya',
    pas=>'1234'],
    [log=>'igor',
        pas=>'4321']];

//var_dump($_POST);
//echo '<br>';
//var_dump($_SESSION);

if (!empty($_POST['login'])) {
    //var_dump($_SESSION['user']);
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

if (move_uploaded_file($_FILES['image']['tmp_name'], $pth.basename($_FILES['image']['name']))) {
    echo 'Файл коректно загружен!<br>';
}
?>
<html>
<head>
</head>
<body>
<?php if (!$_SESSION['auth']) : ?>
    <form action="http://test/1/6.php" method="post">
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
    <form action="http://test/1/6.php" method="post">
        <p><input type="submit" value="выйти" name="ex" /></p>
    </form><br>
    <form action="http://test/1/6.php" method="post" enctype="multipart/form-data">
        <input type="file", name="image">
        <input type="submit">
    </form>
<?php endif ?>
<?php foreach (scandir($pth) as $value) :
    if (preg_match('/\.(jpg|jpeg)/', $value)) : ?>
        <img src="<?php echo $pth.'/'.$value; ?>" height="200" />
    <?php endif;
endforeach; ?>
</body>
</html>
