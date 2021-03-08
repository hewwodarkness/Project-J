<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/login.css">

</head>
<body>


<?php

	include 'menu.php';
	require 'db.php';
	include 'goodconnection.php';
	$connect = $conn;
	$data = $_POST;

	// function captcha_show(){
	// $questions = array(
	// 	1 => 'Столица России',
	// 	2 => 'Столица США',
	// 	3 => '2 + 3',
	// 	4 => '15 + 14',
	// 	5 => '45 - 10',
	// 	6 => '33 - 3'
	// 	);
	// 	$num = mt_rand( 1, count($questions) );
	// 	$_SESSION['captcha'] = $num;
	//  	echo $questions[$num];
	// }

	//если кликнули на button
	if ( isset($data['do_signup']) )
	{
    // проверка формы на пустоту полей
		$errors = array();
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите логин';
		}

		if ( trim($data['email']) == '' )
		{
			$errors[] = 'Введите Email';
		}

		if ( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}

		if ( $data['password_2'] != $data['password'] )
		{
			$errors[] = 'Повторный пароль введен не верно!';
		}

		//проверка на существование одинакового логина
		if ( R::count('users', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}

    //проверка на существование одинакового email
		if ( R::count('users', "email = ?", array($data['email'])) > 0)
		{
			$errors[] = 'Пользователь с таким Email уже существует!';
		}

		//проверка капчи
		// $answers = array(
		// 	1 => '1',
		// 	2 => '1',
		// 	3 => '1',
		// 	4 => '1',
		// 	5 => '1',
		// 	6 => '1'
		// );
		// if ( $_SESSION['captcha'] != array_search( mb_strtolower($_POST['captcha']), $answers, 'UTF-8' ) )
		// {
		// 	$errors[] = 'Ответ на вопрос указан не верно!';
		// }


		if ( empty($errors) )
		{

				// $upload_dir = 'upload/';
				// $file = $_FILES['path']['name'];

				// move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file);
			$upload_dir = 'uploads/';
			$file = $_FILES['file']['name'];
			// $file = "uploads/".$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file);


			//ошибок нет, теперь регистрируем
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT); 
			$user->full_name = $data['full_name'];
			$user->avatar = $file;
			R::store($user);
			// echo '<div style="color:dreen;">Вы успешно зарегистрированы!</div><hr>';
			// header('Location: main.php ');

			$_SESSION['user'] = $user;

				$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$user->login'");
				$user1 = mysqli_fetch_assoc($check_user);


						$_SESSION['user1'] = [
							"id" => $user1['id'],
							"full_name" => $user1['full_name'],
							"avatar" => $user1['avatar'],
						];


						
						$gtest = $user1['id'];
						$gtest1 = 2;
						
						$sql1 = "INSERT INTO `users_medals` (`medal_id`, `user_id`)
						VALUES             ('$gtest1', '$gtest')";
			   			mysqli_query($conn, $sql1);
				 		// header('Location: main.php');


				header('Location: index.php');
		}else
		{
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

?>

	<div class="reg-container">

		<div class="login-inputs">

			<p class="login-text">
				Registration
			</p>

			<form action="signup.php" method="POST" enctype="multipart/form-data">

				<input type="text" name="login" placeholder="Your login" value="<?php echo @$data['login']; ?>"><br/>


				<input type="text" name="full_name" placeholder="Your nickname" value="<?php echo @$data['full_name']; ?>"><br/>

				<input type="file" name="file" placeholder="Your avatar" value="<?php echo @$data['avatar']; ?>"><br/>


				<input type="email" name="email" placeholder="Your email" value="<?php echo @$data['email']; ?>"><br/>


				<input type="password" name="password" placeholder="Your password" value="<?php echo @$data['password']; ?>"><br/>

				<input type="password" name="password_2" placeholder="Write your password again" value="<?php echo @$data['password_2']; ?>"><br/>

				

				<div class="twobuttons">
					<button type="submit" name="do_signup" class="btn">Register</button>
				<div>
					<a type="submit" href="login.php" class="btn">Sign in</a>
				</div>
				</div>

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