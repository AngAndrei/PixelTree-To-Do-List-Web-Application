<?php

function emptyInputSignup($username, $email, $pwd, $pwdRepeat) {
    $res;
    if(empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $res = true;
    }
    else {
        $res = false;
    }
    return $res;
}

function invalidUid($username) {
    $res;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $res = true;
    }
    else {
        $res = false;
    }
    return $res;
}

function invalidEmail($email) {
    $res;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $res = true;
    }
    else {
        $res = false;
    }
    return $res;
}

function pwdMatch($pwd, $pwdRepeat) {
    $res;
    if($pwd !== $pwdRepeat) {
        $res = true;
    }
    else {
        $res = false;
    }
    return $res;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM user_data WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../sign-up.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $res = false;
        return $res;
    }
    
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $pwd) {
    $sql = "INSERT INTO user_data (Username, Email, userPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../sign-up.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../sign-up.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    $res;
    if(empty($username) || empty($pwd)) {
        $res = true;
    }
    else {
        $res = false;
    }
    return $res;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);
    
    if($uidExists === false) {
        header("location: ../log-in.php?error=wronglogin");
        exit();
    }
    
    $pwdHashed = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    var_dump($pwdHashed);
    var_dump($pwd);
    
    if($checkPwd === false) {
        #header("location: ../log-in.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true) {
        session_start();
        $_SESSION["userID"] = $uidExists["ID"];
        $_SESSION["userUsername"] = $uidExists["Username"];
        header("location: ../index.php");
        exit();
    }
}