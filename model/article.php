<?php

class Article extends DB
{
    protected function getArticles() {
        $stmt = $this->connect()->prepare('SELECT * FROM articles');

        if(!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=true1");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../index.php?error=true2");
            exit();
        }
        //$stmt->execute();
        return $stmt->fetchAll(    PDO::FETCH_ASSOC);
    }

    protected function updateArticle($id, $newtitle, $newdescription) {
        $query = "UPDATE articles SET title='{$newtitle}', description='{$newdescription}' WHERE id='{$id}'";
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute(array())) {
            $stmt = null;
            header("Location: ../index.php?error=true1");
            exit();
        }
        header("Location: index.php");
    }
    protected function getArticleDataById($current_article_id) {
        $query = "SELECT * FROM articles WHERE id=" . $current_article_id;
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute(array())) {
            $stmt = null;
            die();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            die();
        }

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $article_data = $articles[0];
        if(empty($article_data)) {
            die();
        }
        return $article_data;
    }

    public function deleteArticle($id) {
        $query = "DELETE FROM articles WHERE id='{$id}'";
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute(array())) {
            $stmt = null;
            die();
        }
    }

    public function create($author_id, $title, $description) {
        $query = "INSERT INTO articles (title, description) VALUES ('{$title}', '{$description}')";
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute(array())) {
            $stmt = null;
            die();
        }
        $query = "SELECT MAX(id) AS max_id FROM articles";
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute(array())) {
            $stmt = null;
            die();
        }
        $articleId = $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];


        $query = "INSERT INTO usersarticles (user_id, article_id) VALUES ('{$author_id}', '{$articleId}')";
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute(array())) {
            $stmt = null;
            die();
        }
    }

    public function author_too($id, $article_id) {
        $query = "INSERT INTO usersarticles (user_id, article_id) VALUES ('{$id}', '{$article_id}')";
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute(array())) {
            $stmt = null;
            die();
        }
    }
}