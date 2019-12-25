<?php
	session_start();
	ob_start();
	ini_set('display_errors',0);
	date_default_timezone_set('Europe/Minsk');
	header("Content-Type: text/html; charset=utf-8");
	header("Cache-control: no-store");
	include "lib.inc.php";
	include "base_reg.php";
	if (isset($_COOKIE['lastVisit']))
		$lastVisit = $_COOKIE['lastVisit'];	
	setcookie('lastVisit',date('Y-m-d H:i:s'),time()+0xFFFFFFF);
	$page = $_GET['page'];
	
	if (isset($_GET['exit'])) 
	{		
		session_destroy();
		header("Location: index.php");
		exit;
	}
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
						<?php
							if (isset($_SESSION['login']))	
							{												
								switch($page)
								{
									case 'lab1': include 'lab_rab1.html'; break;
									case 'lab2': include 'lab_rab2.php'; break;
									case 'lab3': include 'lab_rab3.php'; break;		
									case 'lab4': include 'lab_rab4.php'; break;										
									case 'catalog': include 'catalog.php';break;	
									case 'add': include 'add.php'; break;
									case 'item': include 'item.php'; break;	
									case 'edit': include 'edit.php'; break;
									default : echo '<p>Почтовая связь является важнейшим элементом общенациональной инфраструктуры, выполняет ряд важнейших государственных 
													и социальных функций.Состояние национальной почтовой инфраструктуры является неотъемлемым элементом глобальной конкурентоспособности 
													российского государства.</p>
													<p>Почтовая связь формирует значительный по размеру сектор экономики, в спектр услуг которого помимо классических, почтовых, входят 
													финансовые, инфокоммуникационные и другие услуги.Эффективно функционирующая Почта способствует созданию институциональных, 
													финансовых, экономических и социальных основ долгосрочного социально-экономического развития страны.</p>
													<img src="images\twvwswm4g9zfvtni.jpg" height="200" width="400" alt="2"/>
													<img src="images\cennoe_pismo.jpg" height="200" width="400" alt="3"/>
													<iframe width="560" height="315" src="https://www.youtube.com/embed/P4BqM6W1Qes" allow="accelerometer; autoplay; 
													encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';break;
								}
							}			
							else{
								if ($page=="registration")
									include 'registration.php';	
								else	
									include 'auth.php';		
							}
						?>					
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
