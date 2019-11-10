<?php
    $vectorValue = (int)htmlspecialchars($_POST["vector"]);
    $searchValue = (int)htmlspecialchars($_POST["vectorSearchValue"]);
    $vector = [];

    if (!$vectorValue) $vectorValue = 10;
    if (!$searchValue) $searchValue = 10;

    if ($vectorValue){
        $i = 0;
        while ($i < $vectorValue){
            array_push($vector,random_int(0,100));
            $i += 1;
        }
        print_r($vector);
    }

    if ($searchValue && $vector){
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

    <form action = "index.php" method = "POST">
        <input placeholder="К-во элементов вектора" type = 'text' name = 'vector'>
        <input placeholder="Число поиска" type = 'text' name = 'vectorSearchValue'>
        <input type = 'submit' value = 'Результат #1'>
    </form>
    
</body>
</html>