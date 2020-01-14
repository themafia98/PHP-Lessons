<?php

define("FILE_SIMPLE", "fileSimpleSort.txt");
define("FILE_NATURAL", "fileNaturalMergeSort.txt");
define("CHUNK_ONE", "chunk1.txt");
define("CHUNK_TWO", "chunk2.txt");


function pyramidSort(array $array) {
    $init = (int)floor((count($array) - 1) / 2);
    for($i=$init; $i >= 0; $i--){
        $count = count($array) - 1;
        buildPyramid($array, $i, $count);
    }

    for ($i = (count($array) - 1); $i >= 1; $i--)  {
        $_arrayValue = $array[0];
        $array [0] = $array [$i];
        $array [$i] = $_arrayValue;
        buildPyramid($array, 0, $i - 1);
    }
    return $array;
}

function buildPyramid(array &$array, int $i, int $count){
    $_arrayValue = $array[$i];
    $j = $i * 2 + 1;

    while ($j <= $count)  {
        if($j < $count)
            if($array[$j] < $array[$j + 1]) {
                $j = $j + 1;
            }
        if($_arrayValue < $array[$j]) {
            $array[$i] = $array[$j];
            $i = $j;
            $j = 2 * $i + 1;
        } else {
            $j = $count + 1;
        }
    }
    $array[$i] = $_arrayValue;
}
print_r("pyramidSort: ");
print_r(pyramidSort([2,4,5,632,12,34,78,3,23,99,2]));
echo "<br/>";

function mergeSort(array $arr){
    $counter = count($arr);

    if ($counter <= 1){
        return $arr;
    }

    $leftPart = array_slice($arr, 0, $counter / 2);
    $rightPart = array_slice($arr, $counter / 2);

    return merge(mergeSort($leftPart), mergeSort($rightPart));
}

function merge(array $leftPart, array $rightPart){
    $_array = array();

    while (count($leftPart) > 0 && count($rightPart) > 0){
        if ($leftPart[0] < $rightPart[0])
            array_push($_array, array_shift($leftPart));
        else
            array_push($_array, array_shift($rightPart));
    }

    array_splice($_array, count($_array), 0, $leftPart);
    array_splice($_array, count($_array),0, $rightPart);

    return $_array;
}

print_r("mergeSort: ");
print_r(mergeSort([2,4,23,132,12,334,78,23,23,929,2]));
echo "<br/>";

function shellSort(array $arr){
    $index = 0;

    $last = count($arr);
    $_bufArr[0] = $last / 2;


    while ($_bufArr[$index] > 1){
        $index++;
        $_bufArr[$index] = $_bufArr[$index - 1] / 2;
    }

    for ($i = 0; $i <= $index; $i++){
        $step = $_bufArr[$i];

        for ($j = $step; $j < $last; $j++) {
            $value = $arr[$j];
            $ind = $j - $step;

            while ($ind >= 0 && $value < $arr[$ind]) {
                $arr[$ind + $step] = $arr[$ind];
                $ind = $ind - $step;
            }
            $arr[$ind + $step] = $value;
        }
    }
    return $arr;
}

print_r("shellSort: ");
print_r(shellSort([22,41,23,132,1112,334,78,23,23,929,32]));
echo "<br/>";

function qSort(array $arr){
    $arrLeft = $arrRight = array();

    if(count($arr) < 2) return $arr;

    $pivot_key = key($arr);
    $pivot = array_shift($arr);

    foreach ($arr as $val){
        if ($val <= $pivot) array_push($arrLeft, $val);
        elseif ($val > $pivot)
           array_push($arrRight, $val);
    }

    return array_merge(qSort($arrLeft), array($pivot_key => $pivot), qSort($arrRight));
}


print_r("qSort: ");
print_r(qSort([42,1,32,0,112,34,28,13,28,329,22]));
echo "<br/>";

/** externalSimpleMergeSort */
function convertToArray(string $filename){
    try {
        $file = fopen($filename, "r") or exit(1);
        $resultArr = Array();

        while (($buff = fgets($file)) !== false){

            $arrFile =  preg_split('//u',$buff,null,PREG_SPLIT_NO_EMPTY);

            foreach($arrFile as $value){
                if (!is_numeric($value)) continue;
                array_push($resultArr, trim($value));
            }
        }

        fclose($file);
        return $resultArr;

    } catch (Exception $err){
        echo $err -> getMessage(), "\n";
    }
}

function convertToFile(array  $arr, string $filename){
    try {
        $file = fopen($filename, "w") or exit(1);

        foreach ($arr as $value) {
            if ((fwrite($file, $value) === FALSE)){
                throw new Error(("Bad file write"));
                break;
            }
        }

        return "<br/><span>Sort and save file done. Result file content:</span>";
    } catch (Exception $err){
        echo $err -> getMessage(), "\n";
    }
}

echo "<p>---External simple merge sort---</p>";
echo "<span>File content:</span>";
print_r(file_get_contents(FILE_SIMPLE));
print_r(convertToFile(mergeSort(convertToArray(FILE_SIMPLE)), FILE_SIMPLE));
print_r(file_get_contents(FILE_SIMPLE));
echo "<br/>";

function endStream($file){
        $symbol = fgetc($file);

        if ($symbol != "\n"){
            fseek($file, -2, 1);
        } else fseek($file, 1, 1);

        return $symbol == "\n" ? true : false;
}

function naturalMergeSort(string $filename){

    $indexF1 = 1;
    $indexF2 = 1;

    while ($indexF1 > 0 && $indexF2 > 0){

        /** initial props */
        $sign = 0;
        $indexF1 = 0;
        $indexF2 = 0;
        $file = fopen($filename, "r");
        $chunkOne = fopen(CHUNK_ONE, "w");
        $chunkTwo = fopen(CHUNK_TWO, "w");

        /** start */
        fgets($file);

        $valChunkOne = 0;
        $valChunkTwo = 0;

        if (!feof($file)) fwrite($chunkOne, $file);
        if (!feof($file)) fgets($file);

        while (!feof($file)){

            if ($valChunkTwo  < $valChunkOne){
                switch ($sign){
                    case 1: {
                        fwirte($chunkOne," ");
                        $sign = 2;
                        $indexF1++;
                        break;
                    }

                    case 2: {
                        fwrite($chunkTwo, " ");
                        $sign = 1;
                        $indexF2++;
                        break;
                    }
                }
            }

            if ($sign === 1) {
                fwirte($chunkOne, $valChunkOne);
                $indexF1++;
            } else {
                fwrite($file, $valChunkTwo);
                $indexF2++;
            }

            $valChunkOne = $valChunkTwo;

            fgets($file);
        }

        if ($indexF2 > 0 && $sign == 2){
            fwrite($chunkTwo, "");
        }

        if ($indexF1 > 0 && $sign == 1){
            fwrite($chunkOne, "");
        }

        fclose($chunkTwo);
        fclose($chunkOne);
        fclose($file);

        if (!feof($chunkOne)) fgets($chunkOne);
        if (!feof($chunkTwo)) fgets($chunkTwo);

        while (!feof($chunkOne) && !feof($chunkTwo)){
            $_fileOne = false;
            $_fileTwo = false;

            while (!$_fileOne && !$_fileTwo){

                if ($valChunkOne <= $valChunkTwo){
                    fwrite($file, $valChunkOne);
                    $_fileOne = endStream($chunkOne);
                    fgets($chunkOne);
                } else {
                    fwrite($file, $valChunkTwo);
                }
            }
        }
    }

    unlink(CHUNK_ONE);
    unlink(CHUNK_TWO);
}

function insertNaturalFile(int $range){
    $fileNatural = fopen(FILE_NATURAL, "w");
    for ($i = $range; $i > 0; $i--) {
        fwrite($fileNatural, $i);
    }
    fclose($fileNatural);
}


echo "<p>---External natural merge sort---</p>";
insertNaturalFile(10);
echo "<span>File content:</span>";
print_r(file_get_contents(FILE_NATURAL));
print_r(convertToFile(mergeSort(convertToArray(FILE_NATURAL)), FILE_NATURAL));
print_r(file_get_contents(FILE_NATURAL));
echo "<br/>";
//naturalMergeSort(FILE_NATURAL);

?>