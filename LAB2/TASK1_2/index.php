<?php

	function getArea($kaktetA, $kaktetB){
		return 0.5 * ($kaktetA * $kaktetB);
	}

	function getResult($areaA = 0, $areaB = 0, $areaC = 0){
		if ($areaA > $areaB && $areaA > $areaC) return "Треугольник A, S = {$areaA}";
		elseif ($areaB > $areaA && $areaB > $areaC) return "Треугольник B, S = {$areaB}";
		elseif ($areaC > $areaA && $areaC > $areaB) return "Треугольник C, S = {$areaC}";
		else return '';
	};
	
	$treygolnikA = array();
	$treygolnikB = array();
	$treygolnikC = array();


	/** Треугольник 1 */
	array_push($treygolnikA,(int)htmlspecialchars($_POST['gip_1'])); /** Гипотинуза */
	array_push($treygolnikA,(int)htmlspecialchars($_POST['ygolA_1'])); /** Катет А */

	/** Треугольник 2 */
	array_push($treygolnikB,(int)htmlspecialchars($_POST['katetA_2'])); /** Угол B */
	array_push($treygolnikB,(int)htmlspecialchars($_POST['ygolB_2'])); /** Высота H */

	/** Треугольник 3 */
	array_push($treygolnikC,(int)htmlspecialchars($_POST['visotaH_3'])); /** Высота H */
	array_push($treygolnikC,(int)htmlspecialchars($_POST['ygolY_3'])); /** Угол Y */

	$isCorrect = sizeof($treygolnikA) === 2 && sizeof($treygolnikB) === 2
				&& sizeof($treygolnikC) === 2;

	if ($isCorrect){

		$ygolB_1 = 90 - $ygolA_1;
		$kaktetA_1 = $treygolnikA[0] * sin($treygolnikA[1]);
		$kaktetB_1 = $treygolnikA[0] * sin($kaktetB_1);
		$areaA = getArea($kaktetA_1, $kaktetB_1);

		$ygolA_2 = 180 - (90 + $treygolnikB[1]);
		$gipotenyza_2 = $treygolnikB[0] / sin($ygolA_2);
		$katetB_2 = $gipotenyza_2 * sin($treygolnikB[1]);
		$areaB = getArea($treygolnikB[0], $katetB_2);

		$gipotenyza_3 = $treygolnikC[0] * sin($treygolnikC[1]);
		$areaC = 0;


	};
?>

<!DOCTYPE html>
<html>
<head>
	<title>TASK 1 (LAB 3) </title>
	<meta charset="UTF-8" />
</head>
<body>
	<p>TASK 1 (AB 3)</p>
	<form action = 'index.php' method = 'POST'>
		<p>Треугольник 1:</p>
		<input placeholder="Гипотенуза" required="" type="number" name="gip_1" /> <br/>
		<input placeholder="Угол А" required="" type = "number" name = "ygolA_1" /> <br/>
		<p>Треугольник 2:</p>
		<input placeholder="Угол А" required="" type = "number" name = "katetA_2" /> <br/>
		<input placeholder="Угол В" required="" type = "number" name = "ygolB_2" /> <br/>
		<p>Треугольник 3_1:</p>
		<input placeholder_1="Высота Н" required="" type = "number" name = "visotaH_3" /> <br/>
		<input placeholder="Угол Y" required type = "number" value = "90" name = "ygolY_3" disabled /> <br/>
		<br/>
		<input type="submit" value = 'Выяснить'>
		<p><?php if ($isCorrect) echo getResult($areaA, $areaB, $areaC); ?></p>

	</form>
</body>
</html>