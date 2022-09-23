<?php


class Db
{
    public function connect() {
        try {
            $host = "localhost";
            $dbname = "articlesprojectdb";
            $username = "root";
            $password = "root";
            $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            return $db;
        } catch (PDOException $e) {
            print "Error " . $e->getMessage();
            die();
        }
    }
}

//$host = "localhost";
//$user = "root";
//$pass = "root";
//$db_name = "articlesprojectdb";
//$connection = mysqli_connect($host, $user, $pass, $db_name);
//
//if (mysqli_connect_errno()) {
//    die("Error: " . mysqli_connect_error());
//}
//
//mysqli_query($connection, "SET NAMES utf8");