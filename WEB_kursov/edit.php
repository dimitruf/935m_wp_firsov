<?php
	$id = clearData($_GET['id']);	
	$connect = mysqli_connect($host, $user, $password, $database) or die("Не удалось подключиться к БД"); 
	mysqli_set_charset($connect,"utf8");
	$query = "SELECT * FROM items WHERE id = '$id'";  // получаем всю инфу по данному id	
	$result = mysqli_query($connect,$query) or die("Ошибка получения данных!" . mysqli_error($connect));
	$result = $result->fetch_assoc();
?>
<center><h3>Редактирование товара</h3></center>
<?php   
	if (isset($_POST['edit']))
	{ 
		if (!empty($_POST['name']) && !empty($_POST['article']) && !empty($_POST['manufacturer']) && !empty($_POST['price']) && !empty($_POST['description']))
		{	
			$image = $result['image'];
			$name = clearData($_POST['name']);
			$article = clearData($_POST['article']);
			$manufacturer = clearData($_POST['manufacturer']);
			$equipment = clearData($_POST['equipment']);
			$price = clearData($_POST['price']);
			$description = clearData($_POST['description']);
			$query = "SELECT id FROM items WHERE name = '$name' and id<>'$id'";	
			$result = mysqli_query($connect,$query) or die("Ошибка проверки названия!" . mysqli_error($connect));			
			if (count($result->fetch_assoc()) == 0) // если таки наименованй нет, то добавляем запись	
			{
				if ($_FILES['item-img']['tmp_name']) // если выбрали изображение
					$image = loadImage(); // грузим его
				if ($image != "error"){
					$query = "UPDATE items SET name = '$name', article = '$article', manufacturer = '$manufacturer', equipment = '$equipment', price = '$price', description = '$description', image ='$image' WHERE id = '$id'";				
					$result = mysqli_query($connect,$query) or die("Ошибка изменения записи!" . mysqli_error($connect));
					mysqli_close($connect);
					header("Location: index.php?page=catalog");
					exit;
				}
			}
			else
				echo '<center><font color="red"><b>Товар с таким названием уже есть в таблице!</b></font></center>';
		}
		else 
			echo '<center><font color="red"><b>Заполните все поля!</b></font></center>';	
	}
?>
<form method='POST' action='index.php?page=edit&id=<?php echo $id; ?>' ENCTYPE='multipart/form-data'>	
	<table style="text-align:left;" >
		<tr>
			<th>Наименование:</th>
			<td><input type='text' name='name' value='<?=$result['name']?>' size="70"></td>
		</tr>
		<tr>
			<th>Артикул:</th>
			<td><input type='text' name='article' value='<?=$result['article']?>' size="55"></td>
		</tr>
		<tr>
			<th>Производитель:</th>
			<td><input type='text' name='manufacturer' value='<?=$result['manufacturer']?>' size="60"></td>
		</tr>
		<tr>
			<th>Комплектация:</th> 
			<td>				
				<select size="1" name="equipment">		
					<option value="Без задней стенки" <?php if ($result['equipment'] == "Без задней стенки") echo "selected" ?> >Без задней стенки</option>
					<option value="С задней стенкой" <?php if ($result['equipment'] == "С задней стенкой") echo "selected" ?> >С задней стенкой</option>				
				</select>
			</td>
		</tr>			 			
		<tr>
			<th>Цена:</th>
			<td><input type='number' name='price' min="0" step="0.01" value='<?=$result['price']?>' >&nbsp;руб.</td>
		</tr>
		<tr>
			<th>Описание:</th>
			<td><textarea name='description' rows='15' cols='70'><?=$result['description']?></textarea>
		</tr>	
		<tr>
			<th>Изображение:</th>
			<td><input type="file" name="item-img" accept="image/jpeg"></td>
		</tr>			
		<rt>			
			<td colspan="2"><input type="submit" value="Сохранить" name="edit"></td>
		</tr>
	</table>			
</form>
