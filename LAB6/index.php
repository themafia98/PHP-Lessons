<?php

$arrayLinear = [5,7,8,"car", 43, 99, 'hi', '543', 221];
$searchItemLinear = htmlspecialchars($_POST['searchItemLinear']);
$searchItemBinary = htmlspecialchars($_POST['searchItemBinary']);


function linearSearch($searchItemLinear, $arrayLinear){
    $result = null;
    for ($i = 0; $i < count($arrayLinear); $i++){
        if ($arrayLinear[$i] == $searchItemLinear){
            $result = $i;
            break;
        } else $result = -1;
    }
    return $result;
}

function binarySearch($value, $arrayBinary){
    $result = null;

    $counter = count($arrayBinary);
    $pivot = ~~ ($counter / 2);
    $pivotItem = $arrayBinary[$pivot];

    $isLess = $value < $pivotItem;

    $startArray =  $isLess ? 0 : $pivot;
    $endArray = $isLess ? $pivot : count($arrayBinary);

    for ($i = $startArray; $i < $endArray; $i++){
        if ($arrayBinary[$i] == $value){
                $result = $i;
                break;
            } else $result = -1;
        }

    return $result;
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
    <p>1. Linear search:</p>
    <?php if ($arrayLinear || $arrayLinear === 0) print_r($arrayLinear) ?>
    <form method = "POST" action = 'index.php'>
        <span>
            <p>Search item index: 
                <?php 
                    if ($searchItemLinear) echo linearSearch($searchItemLinear, $arrayLinear);
                ?>
            </p>
            <span>
            Search item:
                <input name = "searchItemLinear" value = "0" type = "text" />
            </span>
        </span>
        <input type = 'submit' value = 'search' />
    </form>
    <p>2. Binary search:</p>
    <?php print_r([1,2,3,4,5,6,7,8,9]); ?>
    <form method = "POST" action = 'index.php'>
        <span>
            <p>Search item index: 
                <?php 
                    if ($searchItemBinary) echo binarySearch($searchItemBinary, [1,2,3,4,5,6,7,8,9]);
                ?>
            </p>
            <span>
            Search item:
                <input name = "searchItemBinary" value = "0" type = "text" />
            </span>
        </span>
        <input type = 'submit' value = 'search' />
    </form>
    
</body>
</html>