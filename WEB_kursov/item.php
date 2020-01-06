<?php
	$id = clearData($_GET['id']);
	$connect = mysqli_connect($host, $user, $password, $database) or die("Не удалось подключиться к БД"); 
	mysqli_set_charset($connect,"utf8");
	$query = "SELECT * FROM items WHERE id = '$id'";  // получаем инфу по данному id
	$result = mysqli_query($connect,$query) or die("Ошибка получения данных!" . mysqli_error($connect));
	$result = $result->fetch_assoc();
	mysqli_close($connect);
?>

<a href='index.php?page=catalog' style='margin-left:40px' class='catalog-link'>Назад</a>
<a href='index.php?page=edit&id=<?php echo $id; ?>' style='margin-left:20px' class='catalog-link'>Редактировать</a>
<br/><br/>
<table class="item">
	<tr>
		<th>Название</th>
		<td><?= $result['name'] ?></td>
		<td rowspan="6" style="text-align:center;"><img src='images\catalog\<?php echo $result['image'].'.jpg';?> '></td>
	</tr>
	<tr>
		<th>Артикул</th>
		<td><?= $result['article']?></td>
	</tr>
	<tr>
		<th>Производитель</th>
		<td><?= $result['manufacturer']?></td>
	</tr>
	<tr>
		<th>Комплектация</th>
		<td><?= $result['equipment']?></td>
	</tr>
	<tr>
		<th>Цена</th>
		<td><?= $result['price'] ?> руб.</td>
	</tr>
	<tr >
		<th>Описание</th>
		<td ><?= $result['description'] ?></td>
	</tr>
</table>
</div>
