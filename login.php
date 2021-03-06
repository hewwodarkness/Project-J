<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="uploads/siteicon.png" type="image/png">


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
				// header('Location: http://www.projectj.top/');
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/login.css">


</head>
<body>

	<div class="container">

		<div class="login-inputs">

			<p class="login-text">
				Login
			</p>

			<form action="login.php" method="POST" class="loginform">

				<input type="text" name="login" placeholder="Login" value="<?php echo @$data['login']; ?>"><br/>

				<input type="password" name="password" placeholder="Password" value="<?php echo @$data['password']; ?>"><br/>

			<p class="login-fp">
				Forgot password?
			</p>



						<button type="submit" name="do_login" class="btn">Sign in</button>

						<a type="submit" href="signup.php" class="btn">Registration</a>
			</form>

		</div>

		<div class="login-information">
			<div>
				<p class="login-text">
					Project J
				</p>
				<p>
				Blog system from scratch. Probably going to be my diploma project. This site created for storing, creating and exploring posts. Posts would have their tags, images, videos, descriptions.
				</p>
			</div>
		</div>

	</div>

</body>
</html>