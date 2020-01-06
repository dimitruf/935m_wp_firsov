<td colspan="3">
<!-- Верхняя часть сайта --> 
	<table class="top">
		<tr>
			<td colspan="3"><a href="index.php">
			<img src="images\post-office-icon.png" width="350" height="200" alt="1"/></a>
			<p><strong>Учебный сайт "Почтовое отделение"</strong></p>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="top_left">
			<?php
				if (!empty($_SESSION['login']))
					echo "Привет,<b>".$_SESSION['login']."</b><a href='index.php?exit=true'class='catalog-link'>(Выход)</a>";
			?> 
			</td>
		</tr>
	</table>
</td>