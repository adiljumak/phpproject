<?php

if(isset($_POST["submit"]))
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    include "../db/db.php";
    include "../model/signin.php";
    include "../controller/signincontroller.php";

    $signin = new SigninController($login, $password);
    $signin->signinUser();

    header("Location: ../index.php");
}