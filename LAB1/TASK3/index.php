<?php

    $number = htmlspecialchars($_POST['num']);
    $result = null;

    if ($_POST) {
        $firstNum = (int)$number[0];
        $lastNum = (int)$number[strlen($number) - 1];

        $result = $firstNum + $lastNum;
    }
?>

<!DOCTYPE html>
<html lang = 'ru'>
<head>
    <title>Task 2</title>
    <meta charset="UTF-8">
</head>
<body>
    <p>Task 2:</p>
    <form action = 'index.php'  method = 'post'>
        <input name = 'num' type ='number' />
        <input type = 'submit' value = 'Расчет' />
    </form>
    <p>Result: <?php if ($result !== null) echo $result ?></p>
</body>
</html>
