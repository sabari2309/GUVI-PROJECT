<?php
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // You can perform server-side validation here and authenticate user with database
    if($email == 'example@mail.com' && $password == 'password123') {
        session_start();
        $_SESSION['email'] = $email;
        echo 'success';
    } else {
        echo 'error';
    }
}
?>