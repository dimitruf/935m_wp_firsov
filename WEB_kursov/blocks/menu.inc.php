<?php
	$menu = array(
		"Главная"=>"index.php", 
		"Отправителям"=>"index.php?page=lab1",
		"Посылки"=>"index.php?page=lab4",
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