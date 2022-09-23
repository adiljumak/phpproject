<?php

class Signup extends DB
{
    protected function setUser($login, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (login, password) VALUES (?, ?);');

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($login, $passwordhash))) {
            $stmt = null;
            header("Location: ../index.php?error=true");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($login) {
        $stmt = $this->connect()->prepare('SELECT login FROM users WHERE login = ?;');

        if(!$stmt->execute(array($login))) {
            $stmt = null;
            header("Location: ../index.php?error=true");
            exit();
        }

        $check = true;
        if($stmt->rowCount() > 0) {
            $check = false;
        }

        return $check;
    }
}