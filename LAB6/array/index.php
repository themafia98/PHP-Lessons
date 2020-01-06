<?php
function pyramidSort(array $array) {
    $init = (int)floor((count($array) - 1) / 2);
    for($i=$init; $i >= 0; $i--){
        $count = count($array) - 1;
        buildP($array, $i, $count);
    }

    for ($i = (count($array) - 1); $i >= 1; $i--)  {
        $tmp_var = $array[0];
        $array [0] = $array [$i];
        $array [$i] = $tmp_var;
        buildP($array, 0, $i - 1);
    }
    return $array;
}

function buildP(array &$array, int $i, int $count){
    $tmp_var = $array[$i];
    $j = $i * 2 + 1;

    while ($j <= $count)  {
        if($j < $count)
            if($array[$j] < $array[$j + 1]) {
                $j = $j + 1;
            }
        if($tmp_var < $array[$j]) {
            $array[$i] = $array[$j];
            $i = $j;
            $j = 2 * $i + 1;
        } else {
            $j = $count + 1;
        }
    }
    $array[$i] = $tmp_var;
}
print_r("pyramidSort:");
print_r(pyramidSort([2,4,5,632,12,34,78,3,23,99,2]));
?>