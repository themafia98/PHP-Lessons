<?php


/** One start */

	$x = 0.5;
	$isGood = $x >= -2 && $x <= 1;
	if (!$isGood) $x = pow($x, 4);

	echo "<p style = 'font-weight: bold;'>Task 1:</p>";

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
		echo "<p>$i : $result</p>";
	}

	/** End One */

	/** Two start */

	$s = null;
	$_s = null;
	$x2 = $_POST["n"] ? (int)htmlspecialchars($_POST["n"]) : null;
	$isErrorTask2 = false;

	if ($x2 && $x2 > 0){
		echo "<p style = 'font-weight: bold;'>Task 2:</p>";
		for ($n = 1; $n <= $x2; $n++){
			if ($n > 1 && $_s === $s) break;
			if ($s === null) $s = pow(-1, $n - 1) * 1 / pow($n,$n);
			else $s += pow(-1, $n - 1) * 1 / pow($n,$n);
			echo "<p>$n : $s</p>";
			$_s = $s;
		} 
	} elseif ($x2) $isErrorTask2 = true;

	/** Two end */

	$natural = $_POST["natural"] ? (int)htmlspecialchars($_POST["natural"]) : null;
	$isError = false;
	if ($natural && $natural > 0){
	$res = array();
		for ($i=2;$i<=$natural;$i++) {
			if (($natural % $i) == 0) {
				array_push($res, $i);
				$natural /= $i;
				$i--;
				if ($natural < 2) break;
			}
		}
	} elseif ($natural) $isError = true;
	

?>

<!DOCTYPE html>
<html lang = 'ru'>
	<head>
	 <meta charset = "UTF-8">
	</head>
	<body>
		<hr><br>
		<form action = 'index.php' method = 'POST'>
			<p>Task 2. Enter n </p><input type = 'number' name = 'n' min = '0' step = '0.1'>
			<p>Task 3. Enter natural </p><input type = 'number' name = 'natural' min = '0' step = '1'><br/><br/>
			<input type = 'submit' value = 'Получить резлуьтат по 2 и 3' />
		</form>
		<p>Task 1 result: <?php if ($result) echo $result; ?></p>
		<p>Task 2 result: 
			<?php 
				if ($s && !$isErrorTask2) echo $s;
				elseif ($isErrorTask2) echo 'Число меньше 0'; 
				else echo 'no result'; 

			?>
		</p>
		<p>Task3 result: 
			<?php 
				if (!$isError && $natural) echo implode(' * ', $res);
				elseif ($natural) echo 'Число меньше 0'; 
				else echo 'no result'; 
			?>
		</p>
	</body>
</html>