<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: 404.php");
}

require "db/db.php";
require "model/article.php";
require "controller/editcontroller.php";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $editcontroller = new EditController();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit article</title>
</head>
<body>
<div style="text-align: left"><a href="index.php" >Back</a></div>
<div style="text-align: center"><h1>Edit article</h1></div>

<form action="<?php echo "service/edit.php";?>?id=<?php echo $editcontroller->getArticleData($_GET['id']) !== null ? $editcontroller->getArticleData($_GET['id'])['id'] : ""; ?>" method="post">
    <input name="title" type="text" placeholder="title" required value="<?php echo $editcontroller->getArticleData($_GET['id']) !== null ?  $editcontroller->getArticleData($_GET['id'])['title'] : ""; ?>">
    <textarea name="description" placeholder="description" required><?php echo $editcontroller->getArticleData($_GET['id']) !== null ?  $editcontroller->getArticleData($_GET['id'])['description'] : ""; ?></textarea>
    <input name="submit" type="submit" placeholder="submit">
</form>
</body>
</html>