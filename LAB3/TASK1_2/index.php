<?php

	function getResult($areaA, $areaB, $areaC){
		if ($areaA > $areaB && $areaA > $areaC) return "Треугольник A, S = {$areaA}";
		elseif ($areaB > $areaA && $areaB > $areaC) return "Треугольник B, S = {$areaB}";
		elseif ($areaC > $areaA && $areaC > $areaB) return "Треугольник C, S = {$areaC}";
		else return '';
	};
	

	/** Треугольник 1 */
	$gip_1 = (int)htmlspecialchars($_POST['gip_1']); /** Гипотинуза */
	$ygolA_1 = (int)htmlspecialchars($_POST['ygolA_1']); /** Угол А */

	/** Треугольник 2 */
	$katetA_2 = (int)htmlspecialchars($_POST['katetA_2']); /** Катет А*/
	$ygolB_2 = (int)htmlspecialchars($_POST['ygolB_2']); /** Угол B */

	/** Треугольник 3 */
	$visotaH_3 = (int)htmlspecialchars($_POST['visotaH_3']); /** Высота H */
	$ygolY_3 = (int)htmlspecialchars($_POST['ygolY_3']); /** Угол Y */

	$isCorrect = gettype($gip_1) === "integer" && gettype($ygolA_1) === "integer" && 
				gettype($katetA_2) === "integer" && gettype($ygolB_2) === "integer" && 
				gettype($visotaH_3) === "integer" && gettype($ygolY_3) === "integer";

	if ($isCorrect){

		$katetA_1 = $gip_1 * sin($ygolA_1);
		$katetB_1 = sqrt(pow($gip_1, 2) + pow($katetA_1, 2));
		$areaA = 0.5 * ($katetA_1 * $katetB_1);

		$katetB_2 = $kaktetA_1 * tan($ygolB_2);
		$areaB = 0.5 * ($katetA_2 * $katetB_2);

		$katetA_3 = $visotaH_3 / sin($ygolY_3);
		$areaC = 0.5 * ($katetA_3 * $visotaH_3);
	};
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>TASK 1 (LAB 3) </title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>TASK 1 (AB 3)</p>
    <form action='index.php' method='POST'>
        <p>Треугольник 1:</p>
        <input placeholder="Гипотенуза" required="" type="number" name="gip_1" /> <br />
        <input placeholder="Угол А" required="" type="number" name="ygolA_1" /> <br />
        <p>Треугольник 2:</p>
        <input placeholder="Катет А" required="" type="number" name="katetA_2" /> <br />
        <input placeholder="Угол В" required="" type="number" name="ygolB_2" /> <br />
        <p>Треугольник 3_1:</p>
        <input placeholder_1="Высота Н" required="" type="number" name="visotaH_3" /> <br />
        <input placeholder="Угол Y" required type="number" value="90" name="ygolY_3" /> <br />
        <br />
        <input type="submit" value='Выяснить'>
        <p><?php if ($isCorrect) echo getResult($areaA, $areaB, $areaC); ?></p>

    </form>
</body>

</html>