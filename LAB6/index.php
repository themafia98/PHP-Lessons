<?php

$arrayLinear = [5,7,8,"car", 43, 99, 'hi', '543', 221];
$searchItemLinear = isset($_POST['searchItemLinear']) ? 
    htmlspecialchars($_POST['searchItemLinear']) : null;
$searchItemBinary = isset($_POST['searchItemLinear']) ? 
    htmlspecialchars($_POST['searchItemLinear']) : null;
$directSearchString = isset($_POST['directSitrng']) ? 
    htmlspecialchars($_POST['directSitrng']) : "Привет мир, как дела?";
$searchArticle = isset($_POST['searchDirectArticle']) ? 
    htmlspecialchars($_POST['searchDirectArticle']) : "мир";
$searchStringKMP = isset($_POST['searchStringKMP']) ?
    htmlspecialchars($_POST['searchStringKMP']) : "Привет мир, как дела!!!";
$searchArticleKMP = isset($_POST['searchArticleKMP']) ?
    htmlspecialchars($_POST['searchArticleKMP']) : "дела";


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

function directSearch($string, $searchString){
    $isFind = "false";
    $searchStringCounter = 0;

    $stringList = preg_split("//u",$string, -1);
    $searchList = preg_split("//u", $searchString, -1);

    $counterStringList = count($searchList);

    for ($i = 0; $i < count($stringList); $i++){
        if ($searchStringCounter === $counterStringList - 1){
            $isFind = "true";
            break;
        }
        if ($stringList[$i] === $searchList[$searchStringCounter]){
            $searchStringCounter += 1;
        }
    }
    return $isFind;
}

function searchKMP($searchString, $string){
    $isFind = "false";

    $stringList = preg_split("//u",$string, -1);
    $searchList = preg_split("//u", $searchString, -1);
    
    for ($i = 0; $i < count($stringList); $i++){
        for ($j = 0; $j < count($searchList); $j++){
            if (!$searchList[$j]) {
                return $i;
            }
            if ($stringList[$i + $j]  !== $stringList[$j]){
                $isFind = "true";
                break;
            }
        }
        
    }
    return $isFind;
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
                    echo binarySearch($searchItemBinary, [1,2,3,4,5,6,7,8,9]);
                ?>
            </p>
            <span>
            Search item:
                <input name = "searchItemBinary" value = "0" type = "text" />
            </span>
        </span>
        <input type = 'submit' value = 'search' />
    </form>
    <p>3. Direct search:</p>
    <form method = "POST" action = 'index.php'>
       <span> Search string: <?php print_r($directSearchString); ?> </span><br/>
       <span>String for search: <?php print_r($searchArticle) ?></span>
        <span>
            <p>Search result: 
                <?php 
                   echo directSearch($directSearchString, $searchArticle);
                ?>
            </p>
            <span>
            String for search:  
                <input name = 'directSitrng' 
                    placeholder="Привет мир, как дела?" 
                    style = "margin-bottom: 4px;" 
                    type = 'text' 
                />
            </span> <br/>
            <span>
            Search item:
                <input name = "searchDirectArticle"  type = "text" />
            </span>
        </span>
        <input type = 'submit' value = 'search' />
    </form>
    <p>4. Search KMP:</p>
    <form method = "POST" action = 'index.php'>
       <span> Search string: <?php print_r($searchStringKMP); ?> </span><br/>
       <span>String for search: <?php print_r($searchArticleKMP) ?></span>
        <span>
            <p>Search result: 
                <?php 
                   echo searchKMP($searchStringKMP, $searchArticleKMP);
                ?>
            </p>
            <span>
            Search item:
                <input name = "searchArticleKMP"  type = "text" />
            </span>
        </span>
        <input type = 'submit' value = 'search' />
    </form>
    
</body>
</html>