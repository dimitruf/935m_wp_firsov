<?php
	date_default_timezone_set('Europe/Minsk');
	include "lib.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Учебный сайт "Почтовое отделение"</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table class="table">
	<tr>
		<?php include "blocks/top.inc.php" ?>
	</tr>
	<tr>
		<?php include "blocks/menu.inc.php" ?>
		<td>
			<table class="content">
				<tr>
					<td class="content_td"> 
					<!-- Область основного контента сайта -->
						<p>Почтовая связь является важнейшим элементом общенациональной инфраструктуры, выполняет ряд важнейших государственных и социальных функций. 
						Состояние национальной почтовой инфраструктуры является неотъемлемым элементом глобальной конкурентоспособности российского государства.</p>
						<p>Почтовая связь формирует значительный по размеру сектор экономики, в спектр услуг которого помимо классических, почтовых, входят финансовые, инфокоммуникационные и другие услуги. 
						Эффективно функционирующая Почта способствует созданию институциональных, финансовых, экономических и социальных основ долгосрочного социально-экономического развития страны.</p>
						<img src="images\twvwswm4g9zfvtni.jpg" height="200" width="400" alt="2"/>
						<img src="images\cennoe_pismo.jpg" height="200" width="400" alt="3"/>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/P4BqM6W1Qes" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<?php include "blocks\bottom.inc.php" ?>
	</tr>
</table>
</body>
</html>
