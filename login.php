<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/user_profile.css">
    <link rel="stylesheet" href="css/tag_page.css">
	<link rel="stylesheet" href="css/menu.css">
	
</head>
<body>
<?php 

include 'menu.php';

	require 'db.php';
	include 'goodconnection.php';
	$connect = $conn;
	$data = $_POST;
	if ( isset($data['do_login']) )
	{
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if ( $user )
		{
			//логин существует
			if ( password_verify($data['password'], $user->password) )
			{
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['user'] = $user;

				
				$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$user->login'");
				$user1 = mysqli_fetch_assoc($check_user);


						$_SESSION['user1'] = [
							"id" => $user1['id'],
							"full_name" => $user1['full_name'],
							"avatar" => $user1['avatar'],
						];

				 		// header('Location: main.php');

				
				header('Location: main.php');
			}else
			{
				$errors[] = 'Неверно введен пароль!';
			}

		}else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		
		if ( ! empty($errors) )
		{
			//выводим ошибки авторизации
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

?>


<form action="login.php" method="POST" class="loginform">
	<strong>Логин</strong>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>"><br/>

	<strong>Пароль</strong>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>"><br/>
	<div class="twobuttons">
		<div class="buttontest">
			<button type="submit" name="do_login" class="btn">Sign in</button>
		</div>
		<div class="buttontest">
			<a type="submit" href="signup.php" class="btn">Registration</a>
		</div>
	</div>
		 


</form>

</body>
</html>