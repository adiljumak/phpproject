<?php
session_start();


if(!isset($_SESSION['login'])) {
    header("Location: 404.php");
}
require "db/db.php";
require "model/article.php";

$articlemodel = new Article();
$articlemodel->author_too($_SESSION['id'], $_GET['id']);

header("Location: index.php");

