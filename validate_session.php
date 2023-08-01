<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(!isset($_SESSION["email"])){
    if (!isset($_POST["email"]) || !isset($_POST["password"])){
        header("Location: login.html");
    }

    $email = $_POST["email"];
    $pass = $_POST["password"];

    //User Authentication
    if (!($email=="myemail@email.com" && $pass=="mypass")){ //TODO: change email/pass before deploy
        echo "<script> 
        alert('Wrong email and password provided');
        window.location = 'login.html';
        </script>";
    }

    //starting session
    $_SESSION["email"] = $email;
}
?>