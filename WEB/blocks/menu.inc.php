<?php
	$menu = array(
		"Главная"=>"index.php", 
		"Работа №1"=>"lab_rab1.html",
		"Работа №2"=>"lab_rab2.php");
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