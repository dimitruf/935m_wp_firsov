<?php
	date_default_timezone_set('Europe/Minsk');
	include "lib.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Лабораторная работа №2</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table class="table">
	<a href="index.php"><img src="images\значок.png" width="350" height="200" alt="1"/></a>
	<tr>
		<td>
			<table class="content">
					<tr>
						<td>
						    <br>
							<p><b>1.Создать ассоциативный многомерный массив, содержащий информацию о пользователя (ФИО, возраст, количество посещений страницы). Вывести всю информацию, начиная с пользователей, у которых количество посещений страницы больше.</b></p>
								<?php 
									$users = array(	array("fio"=>"Иванов Иван Иванович","age"=>23,"count"=>76),
													array("fio"=>"Петров Петр Иванович","age"=>53,"count"=>92),
													array("fio"=>"Сидоров Владимир Александрович","age"=>18,"count"=>276),
													array("fio"=>"Богданов Сергей Петрович","age"=>43,"count"=>471),
													array("fio"=>"Дюба Александр Генадьевич","age"=>33,"count"=>41),
													array("fio"=>"Шатов Олег Владимирович","age"=>35,"count"=>12),
													array("fio"=>"Стельмашенок Валерий Анатольевич","age"=>56,"count"=>534),
													array("fio"=>"Филиппов Андрей Михайлович","age"=>19,"count"=>2342),
												);
									
								?>

							<table border="1" >								
								<tr><td colspan="3" align="center"><h4>До сортировки</h4></tr>
								<tr>
									<td><b>ФИО</b></td><td><b>Возраст</b></td><td><b>Кол-во посещений</b></td>
								</tr>
								<?php 
									foreach ($users as $user)
										echo "<tr><td>".$user['fio']."</td><td>".$user['age']."</td><td>".$user['count']."</td></tr>";
								?>
							</table>	
							<br><br>
							<table border="1" >								
								<tr><td colspan="3" align="center"><h4>После сортировки</h4></tr>
								<tr>
									<td><b>ФИО</b></td><td><b>Возраст</b></td><td><b>Кол-во посещений</b></td>
								</tr>
								<?php 
									// Получение списка столбцов
									foreach ($users as $key => $row) {
										$count[$key]  = $row['count'];
									}
									// Сортируем данные по count по убыванию 
									// Добавляем $users в качестве последнего параметра, для сортировки по общему ключу
									array_multisort($count, SORT_DESC,$users);
									foreach ($users as $user)
										echo "<tr><td>".$user['fio']."</td><td>".$user['age']."</td><td>".$user['count']."</td></tr>";
								?>
							</table>	
							
						</td>
					</tr>
					<tr>
						<td>
						    <br>
							<p><b>2.Написать функцию, выводящую все счастливые билеты из отрезка [M,N], где M и N - шеснадцатизначные числа. Сумма первых трех цифр в таком билете должна ровняться сумме трех последних цифр.</b></p>
							<table border="1" >								
								<tr>
									<td><b>M</b></td><td>100000</td>
								</tr>
								<tr>
									<td><b>N</b></td><td>101111</td>
								</tr>								
								<tr>
									<td><b>Счастливые билеты</b></td><td><?php luckyTicket(100000,101111); ?></td>
								</tr>								
							</table>				
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
