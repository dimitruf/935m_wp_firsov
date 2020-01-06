<br>
<p>
	<b>
		Написать скрипт, вычисляющий стоимость земельного участка. Учесть длину, ширину участка, цену за квадратный метр, наличие газо и трубопровода, 
		удаленность от города и тип местности. Вывести всю информацию на экран.
	</b>
</p>
<form action="index.php?page=lab3" method="POST">
	Длина<br>
	<input type="number" min="0" step="1" name="height"  required> м.<br><br>
	Ширина<br>
	<input type="number" min="0" step="1" name="width" required> м.<br><br>	
	Цена за кв.метр<br>
	<input type="number" min="0" step="0.01" name="price" required> руб.<br><br>
	Наличие газопровода
	<input type="checkbox" name="gaz">
	Наличие трубопровода
	<input type="checkbox" name="truba"><br><br>
	Удаленность от города<br>
	<input type="number" min="0" step="1" name="distance" required> км.<br><br>	
	Тип местности<br>
	<select name="type" size="1">
		<option value="Равнинная" selected>Равнинная</option>
		<option value="Холмистая">Холмистая</option>
		<option value="Горная">Горная</option>
	<select>
	<br><br>
	<input type="submit" value="Рассчитать">
</form>

<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$cost = 0; // стоимость земельного участка
		$gaz = "Нет";
		$truba = "Нет";
		$height = clearData($_POST['height']);
		$width = clearData($_POST['width']);
		$price = clearData($_POST['price']);		
		$cost = $width * $height * $price; // считаем стоимость в зависимости от размеров
		if (isset($_POST['gaz'])){
			$gaz = "Да";
			$cost = $cost + 5000; // если есть газопровод, то к стоимость плюс еще 5к
		}
		if (isset($_POST['truba'])){
			$truba = "Да";
			$cost = $cost + 8500; // если есть трубопровод, то к стоимость плюс еще 8.5к
		}
		$distance = clearData($_POST['distance']);
		$cost = $cost - $distance * 15; // чем дальше от города тем меньше стоимость на 15 рубасов
		$type = $_POST['type'];
		switch ($type){ // в зависимости от типа местности добавляем еще пару тысяч
			case "Равнинная": $cost = $cost + 10000;break;
			case "Холмистая": $cost = $cost + 5000;break;
			case "Горная": $cost = $cost + 2500;break;
		}
		echo "<br><br><table border='1' style='width:300px;'><tr><td><b>Длина</b></td><td>".$height." м.</td></tr>
			 <tr><td><b>Ширина</b></td><td>".$width." м.</td></tr>
			 <tr><td><b>Цена за кв.метр</b></td><td>".$price." руб.</td></tr>
			 <tr><td><b>Наличие газопровода</b></td><td>".$gaz."</td></tr>
			 <tr><td><b>Наличие трубопровода</b></td><td>".$truba."</td></tr>
			 <tr><td><b>Удаленность от города</b></td><td>".$distance." км.</td></tr>
			 <tr><td><b>Тип местности</b></td><td>".$type."</td></tr>
			 <tr><td><b>Стоимость участка</b></td><td>".$cost." руб.</td></tr>
			</table>";
								
	}
?>