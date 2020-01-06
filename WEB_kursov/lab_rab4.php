<?php
	
	function get_column_names_with_meta ($conn_id)
	{
		$query = "SELECT * FROM sklad,posilka WHERE 1 = 0";
		if (!($result_id = mysqli_query ($conn_id,$query)))
			return (FALSE);
		echo "<table border='1' align='center'>";
		echo "<tr><th>Таблица</th><th>Поле</th><th>Тип</th><th>Длинна</th></tr>";
		for ($i = 0; $i < mysqli_num_fields ($result_id); $i++)
		{
			if ($field = mysqli_fetch_field ($result_id))
				echo "<tr>";
				echo "<td>".$field->table."</td>";
				echo "<td>".$field->name."</td>";
				echo "<td>".$field->type."</td>";
				echo "<td>".$field->length."</td>";
				echo "</tr>";
		}
		echo "</table>";
		mysqli_free_result ($result_id);
	}	
	
	function resultSetArray($result_set){  // функция преобразования полученных данных из БД в ассоциативный массив
		$array =array();
		while (($row = $result_set->fetch_assoc()) !=false)
			$array[] = $row;
		return $array;
	}
	
	function addData($connect)
	{
		mysqli_query($connect,"INSERT INTO sklad (name,address,phone) values ('Склад 71','ш. Московское, д.11, 390000, г. Рязань', '(8-1111) 61-40-77')");
		mysqli_query($connect,"INSERT INTO sklad (name,address,phone) values ('Склад 72','ул. Космонавтов, д.6, г. Скопин', '(8-2222) 61-64-22')");
		mysqli_query($connect,"INSERT INTO sklad (name,address,phone) values ('Склад 73','ул. Октябрьская, д.38, 390001, г.Рязань', '(8-3333)  46-44-64')");
		mysqli_query($connect,"INSERT INTO sklad (name,address,phone) values ('Склад 74','ул. Гоголя, 29, 390008, г.Скопин', '(8-4444) 46-40-80')");

		
		$rows = resultSetArray(mysqli_query($connect,"SELECT * FROM sklad ORDER BY id ASC"));			
		echo "<br>Таблица sklad:<br>";		
		echo "<table border='1' align='center' width='1000'>";
		echo "<tr><th>ID</th><th>Название</th><th>Адрес</th><th>Телефон</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['id']."</td>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['address']."</td>";
			echo "<td>".$item['phone']."</td>";	
			echo "</tr>";
		}
		echo "</table><br>";
		
		mysqli_query($connect,"INSERT INTO posilka (id_sklad,country,ves,stoim) values ('1','Китай','10','50')");
		mysqli_query($connect,"INSERT INTO posilka (id_sklad,country,ves,stoim) values ('1','Китай','22.10','150.50')");
		mysqli_query($connect,"INSERT INTO posilka (id_sklad,country,ves,stoim) values ('3','Беларусь','30','65')");
		mysqli_query($connect,"INSERT INTO posilka (id_sklad,country,ves,stoim) values ('1','Беларусь','19','45')");
		mysqli_query($connect,"INSERT INTO posilka (id_sklad,country,ves,stoim) values ('4','Россия','5','25.50')");
		mysqli_query($connect,"INSERT INTO posilka (id_sklad,country,ves,stoim) values ('4','Россия','3.48','10')");	
		$rows = resultSetArray(mysqli_query($connect,"SELECT * FROM posilka ORDER BY id ASC"));			
		echo "<br>Таблица posilka:<br>";		
		echo "<table border='1' align='center' width='1000'>";
		echo "<tr><th>ID</th><th>ID склада</th><th>Страна отправления</th><th>Вес (кг.)</th><th>Стоимость</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['id']."</td>";
			echo "<td>".$item['id_sklad']."</td>";
			echo "<td>".$item['country']."</td>";
			echo "<td>".$item['ves']."</td>";
			echo "<td>".$item['stoim']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	
	function query2($connect)
	{
		echo "<br>Общая стоимость посылок по стране отправления:<br>";		
		$rows = resultSetArray(mysqli_query($connect,"SELECT country,round(sum(stoim),2) as 'summa' FROM posilka  GROUP BY(country) 
													  ORDER BY country ASC"));			
		echo "<table border='1' align='center' width='1000'>";
		echo "<tr><th>Страна отправления</th><th>Сумма</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['country']."</td>";
			echo "<td>".$item['summa']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	
	function delDB($connect){
		$query = 'DROP DATABASE lab4';
		mysqli_query($connect,$query) or die("Ошибка при удалении базы данных: " . mysqli_error($connect));
		mysqli_close($connect);
	}
	
	
	$host = "localhost";
	$user = "root";
	$password = "usbw";
	$database = "lab4";	
	$connect = mysqli_connect($host, $user, $password) or die("Ошибка соединения : " . mysqli_error($connect));		
	$query = "CREATE DATABASE IF NOT EXISTS lab4 ";
	mysqli_query($connect,$query) or die("Ошибка создания БД : " . mysqli_error($connect));
	mysqli_select_db($connect,$database);
	
	$query = "CREATE TABLE IF NOT EXISTS sklad (
        id integer not null auto_increment primary key,
        name varchar(65) not null,
        address varchar(75) not null)";
	mysqli_query($connect,$query) or die("Ошибка при создании таблицы sklad : " . mysqli_error($connect));

	$query = "CREATE TABLE IF NOT EXISTS posilka (
        id integer not null auto_increment primary key,
		id_sklad varchar(10) not null,
		country varchar(10) not null,
        ves float not null,
        stoim varchar(20) not null)";
	
	mysqli_query($connect,$query) or die("Ошибка при создании таблицы posilka: " . mysqli_error($connect));
	
	$query = "ALTER TABLE sklad ADD phone varchar(50)";	
	mysqli_query($connect,$query) or die("Ошибка при изменении таблицы sklad: " . mysqli_error($connect));
	echo "<br><br>";
	
	$query = "ALTER TABLE posilka MODIFY id_sklad integer not null,MODIFY country varchar(40) not null,MODIFY stoim float not null";	
	mysqli_query($connect,$query) or die("Ошибка при изменении таблицы posilka : " . mysqli_error($connect));

	addData($connect);                     			// заполняем таблицы и выводим
	query2($connect);                               // запрос №2
	delDB($connect);                                //удаляем БД


?>
