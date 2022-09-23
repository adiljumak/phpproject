<?php

class Signin extends DB
{
    protected function getUser($login, $password) {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE login = ?');

        if(!$stmt->execute(array($login))) {
            $stmt = null;
            header("Location: ../index.php?error=true1");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../index.php?error=true2");
            exit();
        }

        $passwordhash = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordhash[0]["password"]);
        if($checkPassword == false) {
            $stmt = null;
            header("Location: ../index.php?error=true3");
            exit();
        }
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE login = ?');
        if(!$stmt->execute(array($login))) {
            $stmt = null;
            header("Location: ../index.php?error=true4");
            exit();
        }
        $user = $stmt->fetchAll(    PDO::FETCH_ASSOC);
        session_start();
        $_SESSION["id"] = $user[0]["id"];
        $_SESSION["login"] = $user[0]["login"];


        $stmt = null;
    }


}