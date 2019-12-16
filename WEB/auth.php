<?php
	if (isset($_POST['login']) && isset($_POST['password']))
	{	 
		if (!empty($_POST['login']) && !empty($_POST['password']))
		{
			$login = clearData($_POST['login']);
			$password = clearData($_POST['password']);    	
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['login'] = $login;
			$_SESSION['catalog'] = array(array());
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			exit;
		}
		else echo "<center><font color=red><b>Заполните все поля!</b></font></center>";
	}
?>
<div style="text-align:center;">
<h3>Авторизация</h3>
<form method="POST">
	<p><input type="text" name="login" placeholder="Введите логин"></p>
	<p><input type="password" name="password" placeholder="Введите пароль"></p>
	<p><input type="submit" value="Войти" id="submit"></p>
</form>
</div>
