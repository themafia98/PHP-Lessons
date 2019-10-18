<?php


/** @One start */

	$x = 0.5;
	$isGood = $x >= -2 && x <= 1;
	if (!$isGood) $x = pow($x, 4);

	function factorial($j){
		$fac = 0;
			for ($facNum = 1; $facNum <= $j; $facNum++){
				if ($facNum === 1){
					$fac = $j;
				} else {
					$fac *= $facNum;
				};
			};
		return $fac;
	};

	$result = null;
	for ($i = 1; $i <= 5; $i++){
		if ($result === null) $result = (factorial(2*$i, $i) / pow(2*$i,2 * $i)) * $x;
		else $result += (factorial(2*$i, $i) / pow(2*$i,2 * $i)) * $x;
		echo `Task1 result: $result\n`;
	}

	/** End @One */

	/** @Two start */

	$s = null;
	$x2 = 5;

	for ($a = 1; $a <= $x2; $a++){
		if ($s === null) $s = pow(-1, $n - 1) * 1 / pow($n,$n);
		else $s += pow(-1, $n - 1) * 1 / pow($n,$n);
		echo `Task2 result: $s\n`;
	};

	/** @Two end */

	$natural = 30;
	$rasl = array();
	for ($i=2;$i <= $natural;$i++) {
		if (($natural % $i) == 0) {
			$rasl[] = $i;
			$n /= $i;
			$i--;
			if ($natural < 2) break;
		}
	}

?>