<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(emptyInputSignup($username, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../sign-up.php?error=emptyinput");
        exit();
    }
    
    if(invalidUid($username) !== false) {
        header("location: ../sign-up.php?error=invaliduid");
        exit();
    }
    
    if(invalidEmail($email) !== false) {
        header("location: ../sign-up.php?error=invalidemail");
        exit();
    }
    
    if(pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../sign-up.php?error=passwordsdontmatch");
        exit();
    }
    
    if(uidExists($conn, $username, $email) !== false) {
        header("location: ../sign-up.php?error=usernametaken");
        exit();
    }
    
    createUser($conn, $username, $email, $pwd);
}
else {
    header("location: ../sign-up.php");
    exit();
}