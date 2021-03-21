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
echo 'Завдання №3. Визначити суму невід’ємних елементів в одновимірному числовому масиві. <br>'; 
function var2()
{
$arr = array_map(function () { return random_int(-10, 10); }, range(1, 10));
$sum = array_sum(array_filter($arr, function($n) { return $n >= 0; } ));
var_dump($arr, $sum);
}

echo var2().'<br>';
echo var2().'<br>';
echo var2().'<br>';

?>
</html>