<?php
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
</head>
<body>
    <div style="text-align: left"><a href="index.php" >Back</a></div>
    <div style="text-align: center"><h1>Sign In</h1></div>
    <form action="service/signin.php" method="post">
        <input name="login" type="text" placeholder="login" required>
        <input name="password"  type="password" placeholder="password" required>
        <input name="submit" type="submit" value="Sign In">

    </form>

</body>
</html>