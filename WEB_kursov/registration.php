<?php	
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($_POST['user_password']) && !empty($_POST['login']) && !empty($_POST['email'])) 
        {               
			$user_password = md5(md5(clearData($_POST['user_password']).'pechkin'));   // хэшируем пароль 
			$login = clearData($_POST['login']);
			$email = clearData($_POST['email']);  	
			// подключаемся к БД				
			$connect = mysqli_connect($host, $user, $password, $database) or die("Не удалось подключиться к БД"); 		
			mysqli_set_charset($connect,"utf8");			
			$query ="SELECT id FROM users where login = '$login' or email = '$email'";		// проверяем нет ли пользователя с такии логином или емайл
			$result = mysqli_query($connect,$query) or die("Ошибка проверки логина и email!" . mysqli_error($connect));
			$result = $result->fetch_assoc();		
			if(!empty($result))
			{		
				echo "<br><font color=red>Пользователь с таким логином или email уже существует!</font>";
			}
			else 
			{
				$query ="INSERT INTO users (login,password,email) VALUES ('$login','$user_password','$email')";			
				$result_set = mysqli_query($connect,$query) or die("Ошибка добавления пользователя!" . mysqli_error($connect));				
				header("Location: index.php?login=".$login); 			
			}				                      
			mysqli_close($connect); // закрываем соединение с БД
        }
        else echo '<br><font color=red>Заполните все поля!</font>';
    }
?>

<center>
	<table>
		<tr>
			<td>		
				<h2 align="center">Регистрация</h2>
				<form method="POST">
					<table>
						<tr style="height:30px;">
							<td>Логин</td>
							<td><input type="text" name="login" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Пароль</td>
							<td><input type="password" name="user_password" required></td>
						</tr>
						</tr>      
						<tr style="height:30px;">
							<td>Email</td>
							<td><input type="text" name="email" required></td>
						</tr>
					</table>
					<p>
						<input type="submit" value="Зарегистрироваться">
						<input type="reset" value="Сброс">
					</p>
				</form>
			</td>
		</tr>
	</table>
</center>
