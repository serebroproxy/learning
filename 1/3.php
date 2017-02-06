<?PHP

// 1 задание
$i = 0;
echo '<p><b>Числа от 1 до 100 нацело делящиеся на 3:</b> ';
while ($i<101) {
	$i++;
	if ($i%3 != 0) {
		continue;
	}
	echo $i.' ';
}

// 2 задание
echo "</p><p><b>Возвращаем, отсортированный по убыванию, массив рандомных чисел из функции:</b> ";
function sortRandArr($n, $min=1, $max=100) {
	$a = [];
	for ($i=0; $i<$n; $i++) {
		$a[$i] = rand($min, $max);
	}
	arsort($a);
	return $a;
}
$b = sortRandArr(10, 1, 100);
echo implode(', ', $b);

// 3 задание
echo "</p><p><b>Выводим на екран созданый массив:</b><ul>";
$a = ['Московская область'=>['Клин',
							 'Реутов'],
	  'Ярославская область'=>['Ярославль',
							  'Рыбинск']];
	foreach ($a as $key=>$el) {
		echo "<li>$key</li>";
			echo '<ul><li>'.implode('</li><li>', $el).'</li></ul>';
	}
	echo "</ul></p>";
