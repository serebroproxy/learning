<?php

session_start();

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

?>
<html>
<head>
</head>
<body>
	
	<?php if (!$_SESSION['auth']) : ?>
	<form action="http://test/1/5.php" method="post">
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
	<form action="http://test/1/5.php" method="post">
		<p><input type="submit" value="выйти" name="ex" /></p>	
	</form>
	<?php endif ?>
	

</body>
</html>