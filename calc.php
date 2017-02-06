<?php
if (isset($_POST['n1']) && (isset($_POST['n2']))) {
	$n1 = (float)$_POST['n1'];
	$n2 = (float)$_POST['n2'];
	$oper = (string)$_POST['oper'];

	switch ($oper) {
		case '+':
			echo $n1+$n2;
			break;
		case '-':
			echo $n1-$n2;
			break;
		case '/':
			if ($n2 == 0) {
				echo 'Делить на ноль - плохо ;)';
			} else {
				echo $n1/$n2;
			}
			break;
		case '*':
			echo $n1*$n2;
			break;
	}
} else {
	echo 'Что-то пошло не так!';
}