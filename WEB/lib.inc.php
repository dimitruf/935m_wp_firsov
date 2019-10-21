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
	
?>