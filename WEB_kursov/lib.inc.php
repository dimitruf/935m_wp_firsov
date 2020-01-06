<?php
	function getMenu($menu, $vertical=true)
	{
		$style = "";
		if(!$vertical)
		{
			$style = "display:inline";
		}
		echo '<ul style="list-style-type:none">';
			foreach ($menu as $link=>$href)
			{
				echo "<li style='$style'><a href=\"$href\" style='color: #FFFFFF'>", $link, '</a></li>';
			}
		
		echo '</ul>';
	}
	
	
	function luckyTicket($m,$n){
		for ($m;$m<=$n;$m++){
			$array = array(); 
			$number = $m;
			while ($number > 0) { 
				$array[] = $number % 10; 
				$number = intval($number / 10);  
			} 
			$left3 = $array[0]+$array[1]+$array[2];
			$right3 = $array[3]+$array[4]+$array[5];			
			if ($left3 == $right3)
				echo $m."<br>";
		}
	}	
	
	
		
	function clearData($data)
	{
		return trim(strip_tags($data));
	}
	
	function loadImage(){ 
		if ($_FILES['item-img']['type'] != 'image/jpeg') {
			echo '<center><font color="red"><b>Не верный тип изображения!</b></font></center>';
			return "error";
		}		
		else
		{
			if ($_FILES['item-img']['size'] > 100000) {
				echo '<center><font color="red"><b>Превышен максимальный размер файла! (макс.=100кб.)</b></font></center>';
				return "error";
			}
			else
			{
				$Image = imagecreatefromjpeg($_FILES['item-img']['tmp_name']); 
				$Size = getimagesize($_FILES['item-img']['tmp_name']); 
				$Tmp = imagecreatetruecolor(300, 300);
				imagecopyresampled($Tmp, $Image, 0, 0, 0, 0, 300, 300, $Size[0], $Size[1]);
				include "base_reg.php";
				$link = mysqli_connect($host, $user, $password, $database) or die("Не удалось подключиться к БД"); 
				mysqli_set_charset($link,"utf8");
				if (isset($_POST["add"])){				
					
					$query = "SELECT id FROM items order by id desc";
					$result = mysqli_query($link,$query) or die("Ошибка!" . mysqli_error($link));
					$result = $result->fetch_assoc();					
					mysqli_close($link);
					$img = $result['id']+1;
				}
				else {
					$query = "SELECT image FROM items where id =".$_GET['id']." ";
					$result = mysqli_query($link,$query) or die("Ошибка!" . mysqli_error($link));
					$result = $result->fetch_assoc();	
					$img = $result['image'];
				}
				if ($img=="no-image") $img = $_GET['id'];
				imagejpeg($Tmp, 'images/catalog/'.$img.'.jpg'); // сохраняем 
				imagedestroy($Image);
				imagedestroy($Tmp);
			}		
		}
		return $img;
	}
	
?>