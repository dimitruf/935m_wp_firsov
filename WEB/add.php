<h3><center>Добавить товар</center></h3> 
<?php   
	if (isset($_POST['add']))
	{	 
		if (!empty($_POST['name']) && !empty($_POST['article']) && !empty($_POST['manufacturer']) && !empty($_POST['price']) && !empty($_POST['description']))
		{	
			$image = "no-image";  // устанавливаем по умолчанию что у товара нет изображения
			if ($_FILES['item-img']['tmp_name']) // если выбрали изображение
				$image = loadImage(); // грузим его
			if ($image != "error"){  // если нет никаких ошибок добавляем в каталог
				$data = array (
					"name"=>clearData($_POST['name']),
					"article"=>clearData($_POST['article']),
					"manufacturer"=>clearData($_POST['manufacturer']),
					"price"=>clearData($_POST['price']),
					"equipment"=>clearData($_POST['equipment']),
					"description"=>clearData($_POST['description']),
					"image"=>$image
				);
				array_push($_SESSION['catalog'], $data); // добавляем массив с данными в сессию		
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else 
			echo '<center><font color="red"><b>Заполните все поля!</b></font></center><br>';	
	}
?>


<form method='POST' action='index.php?page=add' ENCTYPE='multipart/form-data'>	
	<table style="text-align:left;" >
		<tr>
			<th>Наименование:</th>
			<td><input type='text' name='name' size="70"></td>
		</tr>
		<tr>
			<th>Артикул:</th>
			<td><input type='text' name='article' size="55"></td>
		</tr>
		<tr>
			<th>Производитель:</th>
			<td><input type='text' name='manufacturer' size="60"></td>
		</tr>
		<tr>
			<th>Комплектация:</th> 
			<td>				
				<select size="1" name="equipment">		
					<option value="Без задней стенки" selected>Без задней стенки</option>
					<option value="С задней стенкой">С задней стенкой</option>				
				</select>
			</td>
		</tr>			 			
		<tr>
			<th>Цена:</th>
			<td><input type='number' name='price' min="0" step="0.01">&nbsp;руб.</td>
		</tr>
		<tr>
			<th>Описание:</th>
			<td><textarea name='description' rows='15' cols='70' ></textarea>
		</tr>	
		<tr>
			<th>Изображение:</th>
			<td><input type="file" name="item-img" accept="image/jpeg"></td>
		</tr>			
		<rt>			
			<td colspan="2"><input type="submit" value="Добавить товар" name="add"></td>
		</tr>
	</table>			
</form>
