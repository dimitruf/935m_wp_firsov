<?php
	$menu = array(
		"Главная"=>"index.php", 
		"Работа №1"=>"index.php?page=lab1",
		"Работа №2"=>"index.php?page=lab2",
		"Работа №3"=>"index.php?page=lab3",
		"Работа №4"=>"index.php?page=lab4",
		"Каталог"=>"index.php?page=catalog");
?>	

<td style="width:20%; height:100%">
	<table class="menu">
		<tr>
			<td>
				<?php
					getMenu($menu);
				?>
			</td>
		</tr>
	</table>
</td>