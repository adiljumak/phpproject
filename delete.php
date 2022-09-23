<?php
session_start();


if(!isset($_SESSION['login'])) {
    header("Location: 404.php");
}
require "db/db.php";
require "model/article.php";
require "controller/deletecontroller.php";
$deletecontroller = new DeleteController();
$deletecontroller->deleteArticle($_GET['id']);
header("Location: index.php");

