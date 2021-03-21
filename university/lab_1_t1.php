<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
</head>
<body>
<?php
echo 'Лабораторна робота №1 <br>';
echo 'Варіант 21 <br>';
echo 'Обчислення значення виразу <br>'; 
$a=0.24;
$x=9.86;
$y=( log( pow($x,3) )-$x*cos($x) ) /pow($a+$x,2);
$y = ( ((sin($x) + cos(3 * $x))^2)/log(2*($x + $a)) ) - sqrt($x);
echo "Отримані результати a = $a x = $x y = $y<br>";
?>
</html>