<?php
      session_start();
      include "db/db.php";
      include "model/article.php";
      include "controller/articlecontroller.php";
      $articlecontroller = new ArticleController();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
</head>
<body>



    <?php if(isset($_SESSION['login'])): ?>
        <div style="text-align: right"><p>Hello, <?php echo $_SESSION['login'] ?></p></div>
        <div style="text-align: right"><a href="logout.php" >Logout</a></div>
    <?php else: ?>
        <div style="text-align: right"><a href="signin.php" >Sign In</a></div>
        <div style="text-align: right"><a href="signup.php" >Sign Up</a></div>
    <?php endif; ?>

    <br>

    <div style="display: flex; align-items: center">
        <div style="text-align: center"> <h1>Articles</h1> </div>

        <?php if(isset($_SESSION['login'])): ?>
            <a href="create.php">New article</a>
        <?php endif; ?>
    </div>

    <div>
        <?php foreach($articlecontroller->allArticles() as $resp ): ?>
            <hr>
                <h3>
                    <?php echo $resp['title'] ?>
                </h3>
                <p>
                    Description: <?php echo $resp['description'] ?>
                </p>
            <?php if(isset($_SESSION['login'])): ?>
                <a href="edit.php?id=<?php echo $resp['id']; ?>">Edit</a>
                <br>
                <a href="delete.php?id=<?php echo $resp['id']; ?>" >Delete</a>
                <br>
                <a href="authortoo.php?id=<?php echo $resp['id']; ?>" >Author too</a>
            <?php endif; ?>
        <?php endforeach; ?>
            <hr>
    </div>
</body>
</html>