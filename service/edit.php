<?php

if(isset($_POST["submit"]))
{
    $id = $_GET['id'];
    $newtitle = $_POST['title'];
    $newdescription = $_POST['description'];

    include "../db/db.php";
    include "../model/article.php";
    include "../controller/editcontroller.php";

    $editcontroller = new EditController($id);
    $editcontroller->updateArticleById($id, $newtitle, $newdescription);

    header("Location: ../index.php");

}