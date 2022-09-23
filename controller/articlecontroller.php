<?php


class ArticleController extends Article
{


    public function __construct() {

    }
    public function allArticles() {
        return $this->getArticles();
    }
}

