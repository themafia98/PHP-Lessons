<?php
    $vectorValue = (int)htmlspecialchars($_POST["vector"]);
    

    $maxValue = null;
    $indexMax = null;
    $indexMin = null;
    $minValue = null;
    $vector = [];

    if (!$vectorValue) $vectorValue = 10;

    if ($vectorValue){
        $i = 1;
        while ($i < $vectorValue){
            array_push($vector,$i * random_int(1,100));
            $i += 1;
        }
    }

    if ($vector){
        $maxValue = max($vector);
        $minValue = min($vector);
        $indexMax = array_search($maxValue, $vector);
        $indexMin = array_search($minValue, $vector);
    }

  
    /** Task 2 */

    $N = (int)htmlspecialchars($_POST["n"]);
    $M = (int)htmlspecialchars($_POST["m"]);

    if (!$N) $N = 3;
    if (!$M) $M = 3;

    function matrix($n,$m) {
        $arr = array();
        for ($i=0; $i<$n; $i++) {
            $arr[$i] = array();
            for ($j=0; $j<$m; $j++) {
                $arr[$i][$j] = random_int(-50,50);
            }
        }
        return $arr;
    }
    $matrixResult = matrix($N,$M);
    $result = 0;

    for ($i = 0; $i < count($matrixResult); $i++){
        if ($arr[$i] <= 2){
            $sum += array_sum($matrixResult[$i]);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP LAB5</title>
</head>
<body>
    <br/><span>Task 1:</span><br/>
    <?php if ($vector) print_r($vector) ?>
    <?php if ($maxValue && ($indexMax || $indexMax === 0)) echo "<p>Максимальное число: $maxValue; Индекс: $indexMax</p>" ?>
    <?php if ($minValue && ($indexMin || $indexMin === 0)) echo "<p>Минимальное число: $minValue; Индекс: $indexMin</p>" ?>
    <?php if ($sum || $sum === 0) echo "<p>Результат Task2: $sum</p>" ?>

    <form style = 'margin-top: 5px;' action = "index.php" method = "POST">
        <br/><span>К-во элементов вектора</span><br/>
        <input type = 'number' name = 'vector'>
        <br/><span>Размерность матрицы:</span><br/>
        <input placeholder="N" type = 'number' name = 'n'>
        <input placeholder="M" type = 'number' name = 'm'>
        <br/>
        <input type = 'submit' value = 'Результат'>
    </form>
    
</body>
</html>