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
echo 'Завдання №2. Задано натуральне число n. Скласти програму, яка переставляє першу та останню цифру цього числа. <br>'; 
function var2($number)
{
    $number = (string)$number;
    $temp = $number[0];
    $number[0] = $number[strlen($number)-1];
    $number[strlen($number)-1] = $temp;
    return (int)$number;
}
$number = 61536353419;
echo 'Задано число:  '.$number."</br>";
echo 'Результат виконання:   '.var2($number)."</br>\r\n";

$number = 15341534163;
echo 'Задано число:  '.$number."</br>";
echo 'Результат виконання:   '.var2($number)."</br>\r\n";


$number = 1655413787;
echo 'Задано число:  '.$number."</br>";
echo 'Результат виконання:   '.var2($number)."</br>\r\n";


?>
</html>