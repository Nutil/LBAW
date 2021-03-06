<?php
foreach (glob($BASE_DIR . "lib/passwordHashingLib/*.php") as $filename) {
    include_once($filename);
}

function getAllUsers()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM users
                            ORDER BY id DESC");
    $stmt->execute();

    return $stmt->fetchAll();
}

function createUser($username, $email, $password)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users(username, email, password) VALUES (?, ?, ?)");
    $stmt->execute(array($username, $email, password_hash($password, PASSWORD_BCRYPT)));
}

function isLoginCorrect($username, $password)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM users 
                            WHERE username = ?");
    $stmt->execute(array($username));
    $users = $stmt->fetchAll();

    if (sizeof($users) != 1) {
        return false;
    }

    if (password_verify($password, $users[0]['password'])) {
        return true;
    } else {
        return false;
    }
}


function getUsernameFromUserID($userID)
{
    global $conn;
    $stmt = $conn->prepare("SELECT username AS username FROM users WHERE id = :userID");
    $stmt->execute(['userID' => $userID]);

    return $stmt->fetch()['username'];
}

function getUserFromUsername($username)
{
    global $conn;
    $stmt = $conn->prepare("SELECT id, username, email, type, created_at 
                            FROM users 
                            WHERE username = ?");
    $stmt->execute(array($username));

    return $stmt->fetch();
}

function getProfile($user_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT *
                            FROM user_profile(:user)");

    $stmt->execute(['user' => $user_id]);

    return array_merge(['id' => $user_id], $stmt->fetch());
}

function changePassword($password)
{
    global $conn;
    $user_id = auth_user('id');

    $stmt = $conn->prepare("UPDATE users SET password=:password WHERE id=:user");
    $stmt->execute(['user' => $user_id, 'password' => password_hash($password, PASSWORD_BCRYPT)]);

    return true;
}

function userIsBanned($user_id){
    global $conn;
    $stmt = $conn->prepare("SElECT COUNT(*) AS number FROM bans WHERE user_id = ? AND expired_at::date > CURRENT_TIMESTAMP::date");
    $stmt->execute([$user_id]);

    $result = intval($stmt->fetch()['number']);


    if(intval($result) > 0) {
        return true;
    } else {
        return false;
    }
}
