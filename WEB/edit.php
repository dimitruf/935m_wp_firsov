<?php
	$id = clearData($_GET['id']);	
?>
<center><h3>Редактирование товара</h3></center>
<?php   
	if (isset($_POST['edit']))
	{ 
		if (!empty($_POST['name']) && !empty($_POST['article']) && !empty($_POST['manufacturer']) && !empty($_POST['price']) && !empty($_POST['description']))
		{	
			$image = $_SESSION['catalog'][$id]['image'];
			if ($_FILES['item-img']['tmp_name']) // если выбрали изображение
				$image = loadImage(); // грузим его
			if ($image != "error"){
				$data = array (
					"name"=>clearData($_POST['name']),
					"article"=>clearData($_POST['article']),
					"manufacturer"=>clearData($_POST['manufacturer']),
					"price"=>clearData($_POST['price']),
					"equipment"=>clearData($_POST['equipment']),
					"description"=>clearData($_POST['description']),
					"image"=>$image
				);
				$_SESSION['catalog'][$id] = $data;			
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else 
			echo '<center><font color="red"><b>Заполните все поля!</b></font></center>';	
	}
?>
<form method='POST' action='index.php?page=edit&id=<?php echo $id; ?>' ENCTYPE='multipart/form-data'>	
	<table style="text-align:left;" >
		<tr>
			<th>Наименование:</th>
			<td><input type='text' name='name' value='<?=$_SESSION['catalog'][$id]['name']?>' size="70"></td>
		</tr>
		<tr>
			<th>Артикул:</th>
			<td><input type='text' name='article' value='<?=$_SESSION['catalog'][$id]['article']?>' size="55"></td>
		</tr>
		<tr>
			<th>Производитель:</th>
			<td><input type='text' name='manufacturer' value='<?=$_SESSION['catalog'][$id]['manufacturer']?>' size="60"></td>
		</tr>
		<tr>
			<th>Комплектация:</th> 
			<td>				
				<select size="1" name="equipment">		
					<option value="Без задней стенки" <?php if ($_SESSION['catalog'][$id]['equipment'] == "Без задней стенки") echo "selected" ?> >Без задней стенки</option>
					<option value="С задней стенкой" <?php if ($_SESSION['catalog'][$id]['equipment'] == "С задней стенкой") echo "selected" ?> >С задней стенкой</option>				
				</select>
			</td>
		</tr>			 			
		<tr>
			<th>Цена:</th>
			<td><input type='number' name='price' min="0" step="0.01" value='<?=$_SESSION['catalog'][$id]['price']?>' >&nbsp;руб.</td>
		</tr>
		<tr>
			<th>Описание:</th>
			<td><textarea name='description' rows='15' cols='70'><?=$_SESSION['catalog'][$id]['description']?></textarea>
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
