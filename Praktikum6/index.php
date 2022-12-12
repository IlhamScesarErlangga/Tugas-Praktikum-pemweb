<?php
function numberToRoman($number) {
    $lookup = array(
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    );
    $result = '';
    foreach ($lookup as $decimal => $roman) {
        $matches = intval($number / $decimal);
        $result .= str_repeat($roman, $matches);
        $number = $number % $decimal;
    }
    return $result;
    }
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Angka Romawi Ilham</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="#" method="POST" align="center">
	<label>Angka :</label>
        <input type="number" name="angka"><br><br>
	<button type="submit">Konversi</button>
	<h2>Romawi : <?php error_reporting(0); echo numberToRoman($_POST["angka"]); ?><br></h2>
	</form>	
</body>
</html>

