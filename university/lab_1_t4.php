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
echo 'Завдання №4. Знайти суму всіх елементів матриці DR(15,3). <br>'; 

    $n = 15;
    $n2 = 3;
    $sum = 0;
    $DR = array(array($n), array($n2));
    for ($i = 0; $i < $n; $i++)
    {
        for ($j = 0; $j < $n2; $j++) 
        {
            $DR[$i][$j] = rand(5, 15);
            $sum = $sum + $DR[$i][$j];
            echo $DR[$i][$j]. ' ';
        }
        echo '<br>';
    }

    echo 'Сума всіх елементів матриці DR(15,3):   '.$sum;
?>
</html>
