<?php
	$id = clearData($_GET['id']);
?>

<a href='index.php?page=catalog' style='margin-left:40px' class='catalog-link'>Назад</a>
<a href='index.php?page=edit&id=<?php echo $id; ?>' style='margin-left:20px' class='catalog-link'>Редактировать</a>
<br/><br/>
<table class="item">
	<tr>
		<th>Название</th>
		<td><?= $_SESSION['catalog'][$id]['name'] ?></td>
		<td rowspan="6" style="text-align:center;"><img src='images\catalog\<?php echo $_SESSION['catalog'][$id]['image'].'.jpg';?> '></td>
	</tr>
	<tr>
		<th>Артикул</th>
		<td><?= $_SESSION['catalog'][$id]['article']?></td>
	</tr>
	<tr>
		<th>Производитель</th>
		<td><?= $_SESSION['catalog'][$id]['manufacturer']?></td>
	</tr>
	<tr>
		<th>Комплектация</th>
		<td><?= $_SESSION['catalog'][$id]['equipment']?></td>
	</tr>
	<tr>
		<th>Цена</th>
		<td><?= $_SESSION['catalog'][$id]['price'] ?> руб.</td>
	</tr>
	<tr >
		<th>Описание</th>
		<td ><?= $_SESSION['catalog'][$id]['description'] ?></td>
	</tr>
</table>
</div>
