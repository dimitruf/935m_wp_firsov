<?php
	if (isset($_POST['add'])) header("Location: index.php?page=add");
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
						if ($_SESSION['catalog'][$v]['image']!= "no-image")
							@unlink('images/catalog/'.$_SESSION['catalog'][$v]['image'].'.jpg');   
						unset($_SESSION['catalog'][$v]);
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
				foreach($_SESSION['catalog'] as $id => $row)
				{
					if (!empty($row['name'])){
						echo "<tr>";											
						echo "<td><a href='index.php?page=item&id=$id' class='catalog-link'>".$row['name']."</a></td>";
						echo "<td>".$row['equipment']."</td>";
						echo "<td>".$row['price']."</td>";
						echo "<td><input type='checkbox' name='deleteTov[]' value=$id></td>";
						echo "</tr>";
					}
				}			
			?>
		</table>
</form>
</br>
</br>
</div>

