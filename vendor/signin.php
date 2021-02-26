<?php

    session_start();
    require_once 'connect.php';
  // $check_user1 = mysqli_query($connect, "SELECT u.password 
    // FROM users u
    // WHERE u.login = '$login'");

    // $login = $_POST['login'];
    // $password = password_verify($_POST['password'], $check_user1);

    // $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    // if (mysqli_num_rows($check_user) > 0) 


    // $myid2 = $row['post_id'];
    // $sql_select2 = "SELECT distinct b.avatar
    //                 from post a
    //                 inner join users b 
    //                 on a.user_id = b.id
    //                 WHERE a.post_id = '$myid2'";
    // $result2 = mysqli_query($conn, $sql_select2);
    //     while ($row2 = mysqli_fetch_assoc($result2))
    //         {
    //             echo $row2['avatar'];
//     //         } 

//     $login = $_POST['login'];

//     $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

//     $password = password_verify($_POST['password'], $hash);


//     $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    
//     if (mysqli_num_rows($check_user) > 0) {

//         $user = mysqli_fetch_assoc($check_user);

//         $_SESSION['user'] = [
//             "id" => $user['id'],
//             "full_name" => $user['full_name'],
//             "avatar" => $user['avatar'],
//             "email" => $user['email']
//         ];

//         header('Location: ../main.php');

//     } else {
//         $_SESSION['message'] = 'Не верный логин или пароль';
//         header('Location: ../index1.php');
//         echo $password;
//     }

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email']
        ];

        header('Location: ../main.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index1.php');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
