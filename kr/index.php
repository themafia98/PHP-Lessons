<?php

   $data = isset($_POST["content"]) ? explode(" ", htmlspecialchars($_POST["content"])) : [];
   
    function isPrime($str = ""){
        if (!is_string($str)) return false;
        $counter = mb_strlen($str);

        $isPrimeDefault = $counter === 1 || $counter % 2 === 0;
        if ($isPrimeDefault || !$counter) return false;

        for ($i = 2; $i <= sqrt($counter); $i++){
            if (!($counter % $i)) return false;
        }
        return true;
    }

    function findPrimeLength($arr = []){
        $result = [];
        for ($i = 0; $i < count($arr); $i++){
            $word = trim($arr[$i]);
            if (!isPrime($word)) continue;
            array_push($result, $word);
        }
        return $result;
    }

    $fileContent = file_get_contents("./data.txt");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KR</title>
</head>
<body>
    <div>
        <p>Result from textarea:</p>
    <?php
        foreach(findPrimeLength($data) as $key){
            $count = mb_strlen($key);
            echo "<p>Word: $key || length: $count</p>";
        }
    ?>
    </div>
    
    <form method = "POST" action="index.php">
        <textarea style = "width: 450px; height: 150px;" name = "content"></textarea>
        <br/>
        <input type ='submit' />
    </form>
    <div>
        <p>Result from text file:</p>
        <?php
            if ($fileContent && is_string($fileContent)){
                $fileStringArray = explode(" ", $fileContent);
                foreach(findPrimeLength($fileStringArray) as $key){
                    $count = mb_strlen($key);
                    echo "<p>Word: $key || length: $count</p>";
                }
            }
        ?>
    </div>
</body>
</html>
