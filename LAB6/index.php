<?php

$arrayLinear = [5,7,8,"car", 43, 99, 'hi', '543', 221];

$searchItemLinear = $_POST['searchItemLinear'] ? htmlspecialchars($_POST['searchItemLinear']) : null;


function linearSearch($searchItemLinear, $arrayLinear){
    $resultSearch = null;
    for ($i = 0; $i < count($arrayLinear); $i++){
        if ($arrayLinear[$i] == $searchItemLinear){
            $resultSearch = $i;
            break;
        } else $resultSearch = -1;
    }
    return $resultSearch;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Algorithms php. Lab 6.</title>
</head>
<body>
    <h3>Lab 6</h3>
    <p>Linear search:</p>
    <?php if ($arrayLinear) print_r($arrayLinear) ?>
    <form method = "POST" action = 'index.php'>
        <span>
            <p>Search item index: 
                <?php 
                    if ($searchItemLinear) echo linearSearch($searchItemLinear, $arrayLinear);
                ?>
            </p>
            <span>
            Search item:
                <input name = "searchItemLinear" type = "text" />
            </span>
        </span>
        <input type = 'submit' value = 'search' />
    </form>
    
</body>
</html>