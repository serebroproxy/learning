<?PHP

//Задание 1
echo '<p><b>Выводим число Фибоначчи (16): </b><br>';
function fib($n) {
	return $n < 3 ? 1 : fib($n-1)+fib($n-2);
}

for ($i = 1; $i <= 16; $i++) {
    echo fib($i).' ';
}
echo "...</p>"; 

//Задание 2
//#1
echo '<p><b>Вычисляем доход по вкладу (простой): </b><br>';
define('MMInYY', 12);
function vklad($sum, $mt, $pc=0.25) {
	return $sum += (($sum*($pc/MMInYY))*$mt);
}
echo vklad(1000, 12	).'</p>';

//#2
echo '<p><b>Вычисляем доход по вкладу (сложный): </b><br>';
function vklad1($sum, $mt, $pc=0.25) {
	for ($i = 1; $i <= $mt; $i++) {
		$sum += $sum*($pc/MMInYY);
	}
	return $sum;
}
echo vklad1(1000, 12).'</p>';

//Задание 3
echo '<p><b>Выводим дату словом: </b><br>';
function dateInWords($d, $m) {
	if (($d>31)||($d<1)) {
		return false;
	}
	if (($m>12)||($m<1)) {
		return false;
	}
	if (($m==2)&&($d>29)) {
		return false;
	}
	switch ($m) {
		case 1:
			return $d.' января';
		case 2:
			return $d.' февраля';
		case 3:
			return $d.' марта';
		case 4:
			return $d.' апреля';
		case 5:
			return $d.' мая';
		case 6:
			return $d.' июля';
		case 7:
			return $d.' июня';
		case 8:
			return $d.' августа';
		case 9:
			return $d.' сеньтября';
		case 10:
			return $d.' октября';
		case 11:
			return $d.' ноября';
		case 12:
			return $d.' декабря';
	}
}
echo dateInWords(24, 4).'</p>';