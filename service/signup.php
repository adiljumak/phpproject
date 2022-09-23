<?php

if(isset($_POST["submit"]))
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['passwordrepeat'];

    include "../db/db.php";
    include "../model/signup.php";
    include "../controller/signupcontroller.php";

    $signup = new SignupController($login, $password, $passwordrepeat);
    $signup->signupUser();

    header("Location: ../index.php");
}