<?php
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

}

print_r("qSort: ");
print_r(qSort([42,1,32,0,112,34,28,13,28,329,22]));
echo "<br/>";

?>