<?php
    $totalSeconds = (int)htmlspecialchars($_POST['seconds']) % 60;
?>

<!DOCTYPE html>
<html lang = 'ru'>
    <head>
        <title>TASK 2</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <p>TASK 2</p>
        <form action = 'index.php' method = 'POST'>
            <input name = 'seconds' value = '0' type = 'number' />
            <input type = 'submit' value = 'Получить секунды' />
        </form>
        <?php 
            if (($totalSeconds || $totalSeconds === 0) && $totalSeconds > 0) 
            echo "<p>Result: {$totalSeconds}</p>"; 
        ?>
    </body>
</html>