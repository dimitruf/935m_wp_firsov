<?php
	if (isset($_POST['add'])) header("Location: index.php?page=add");
	$connect = mysqli_connect($host, $user, $password, $database) or die("Не удалось подключиться к БД"); 
	mysqli_set_charset($connect,"utf8");
?>
<h3><center>Каталог почтовых ящиков</center></h3>		
<div class="article">		
	<form action="index.php?page=catalog" method="POST">
		<input type="submit" name="add" value="Добавить товар">
		<input type="submit" name="delete" value="Удалить товар(-ы)">	
		<br><br>
		<?php	 			
			if	(isset($_POST['delete'])){	
				if (!empty($_POST['deleteTov'])){			    
					foreach($_POST['deleteTov'] as $v)
					{						
						$query = "DELETE FROM items WHERE id = '$v'"; // удаляем записи из таблицы items
						$result = mysqli_query($connect,$query) or die("Ошибка удаления!" . mysqli_error($connect));
						@unlink('images/catalog/'.$v.'.jpg');   					
					}
				}
				else echo "<center><font color='red'><b>Выберите товары для удаления!</b></font></center><br>";
			}
		?>		
		<br>
		<table  class="catalog">
			<tr>				
				<th >Название</th>		
				<th width="25%">Комплектация</th>	
				<th width="15%">Цена</th>				
				<th width="3%"></th>
			</tr>			
			<?php		
				$query = "SELECT id,name,equipment,price FROM items ORDER BY id ASC";  // получаем записи из таблицы items
				$result = mysqli_query($connect,$query) or die("Ошибка вывода данных" . mysqli_error($connect));			
				while (($row = $result->fetch_assoc()) !=false)
				{
					echo "<tr>";											
					echo "<td><a href='index.php?page=item&id=".$row['id']."' class='catalog-link'>".$row['name']."</a></td>";
					echo "<td>".$row['equipment']."</td>";
					echo "<td>".$row['price']."</td>";
					echo "<td><input type='checkbox' name='deleteTov[]' value=".$row['id']."></td>";
					echo "</tr>";
					
				}	
				mysqli_close($connect);				
			?>
		</table>
</form>
</br>
</br>
</div>

