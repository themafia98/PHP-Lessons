
<?php

$x = (int)htmlspecialchars($_POST['xNumber']);
$y = (int)htmlspecialchars($_POST['yNumber']);
$b = (int)htmlspecialchars($_POST['bNumber']);

$isError = $y < 0;
$showError = 'Error!! Y < 0.';

if (!$isError){
    $root = sqrt(abs($x) + sqrt($y));
    $result = -5 * $root - $b * exp($x);
}
?>

<!DOCTYPE html>
<html lang = 'ru'>
<head>
    <title>Task 1</title>
    <meta charset="UTF-8">
<body>
<p>Task 1: </p>
<form action = 'index.php'  method = 'post'>
    <label>X:</label>
    <input name = 'xNumber' type ='number' />
    <label>Y:</label>
    <input name = 'yNumber' type ='number' />
    <label>B:</label>
    <input name = 'bNumber' type ='number' />
    <input type = 'submit' value = 'Расчет' />
</form>

<?php if ($isError) echo "<p>Ошибка, Y < 0.</p>"; ?>
<p>Результат: <?php if ($_POST && !$isError) echo $result; ?> </p>

</body>
</html>