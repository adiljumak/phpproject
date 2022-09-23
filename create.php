<?php
session_start();


if(!isset($_SESSION['login'])) {
    header("Location: 404.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New publish</title>
</head>
<body>

    <div style="text-align: left"><a href="index.php" >Back</a></div>
    <div style="text-align: center"><h1>New article</h1></div>

    <form action="service/create.php" method="post">
        <input name="title" type="text" placeholder="title" required>
        <textarea name="description" placeholder="description" required></textarea>
        <input name="submit" type="submit" placeholder="submit">
    </form>
</body>
</html>