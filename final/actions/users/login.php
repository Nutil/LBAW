<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/users.php');

PagePermissions::create('guest')->check();

if (!$_POST['username'] || !$_POST['password']) {
    $_SESSION['error_messages'][] = 'Invalid login';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/authentication.php');
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

try {
    if (!isLoginCorrect($username, $password)) {
        $_SESSION['error_messages'][] = 'Error validating credentials.';
        header("Location: $BASE_URL" . 'pages/users/authentication.php');
        exit;
    }
    $user = getUserFromUsername($username);
    if(userIsBanned(intval($user['id']))) {
        $_SESSION['error_messages'][] = 'Your account has been banned. Please contact support for further information.';
        header("Location: $BASE_URL" . 'pages/users/authentication.php');
        exit;
    }
    $_SESSION['username'] = $username;
    $_SESSION['success_messages'][] = 'Login successful.';
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $user;

    redirect();
} catch (PDOexception $e) {

    $_SESSION['error_messages'][] = 'Login failed.';

    $_SESSION['form_values'] = $_POST;

    redirect('pages/users/authentication.php');
}

