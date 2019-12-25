<?php
	if (isset($_POST['login']) && isset($_POST['user_password']))
	{	 
		if (!empty($_POST['login']) && !empty($_POST['user_password']))
		{
			$login = clearData($_POST['login']);
			$user_password = md5(md5(clearData($_POST['user_password']).'pechkin'));  		
			// подключаемся к БД				
			$connect = mysqli_connect($host, $user, $password, $database) or die("Не удалось подключиться к БД"); 		
			mysqli_set_charset($connect,"utf8");	
			$query ="SELECT id FROM users where login = '$login' and password = '$user_password'";
			$result = mysqli_query($connect,$query) or die("Ошибка проверки логина и email!" . mysqli_error($connect));
			$result = $result->fetch_assoc();	
			if(!empty($result))
			{				
				$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['login'] = $login;		
				header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				exit;
			}
			else{
				echo "<br><font color=red>Неверный логин или пароль!</font>";
			}			
		
		}
		else echo "<center><font color=red><b>Заполните все поля!</b></font></center>";
	}
?>
<div style="text-align:center;">
<h3>Авторизация</h3>
<form method="POST">
	<p><input type="text" name="login" placeholder="Введите логин"></p>
	<p><input type="password" name="user_password" placeholder="Введите пароль"></p>
	<p><input type="submit" value="Войти" id="submit"></p>
	<p><a href="index.php?page=registration" class="catalog-link">Регистрация</a></p>
</form>
</div>
