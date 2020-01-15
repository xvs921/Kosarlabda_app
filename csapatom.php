<?php
include("classes/csapatomclasses.php");
$session = new Session();
$session->sessionStart();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menü</title>
	<link rel="stylesheet" href="menust.css">
</head>
<body>	

	<div class="testimonials">
		<?php
		$jatekosokListazas = new Session();
		$jatekosokListazas->connect();
		$csapatAzon=$jatekosokListazas->getCsapat();
		for($i=1;$i<=$jatekosokListazas->osszesCsapattag();$i++)
		{
			if($jatekosokListazas->getCsapata($i)==$csapatAzon)
			{
				echo $jatekosokListazas->getJatekosok($i);
			}
		}
		$jatekosokListazas->disconnect();
		?>
	</div>
</body>
</html>