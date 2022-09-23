<?php
session_start();
if(isset($_POST["submit"]))
{
    $title= $_POST['title'];
    $description = $_POST['description'];


    include "../db/db.php";
    include "../model/article.php";
    include "../controller/createcontroller.php";


    $createcontroller = new CreateController();
    $createcontroller->createArticle($_SESSION['id'], $title, $description);

    header("Location: ../index.php");
}