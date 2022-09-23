<?php



class CreateController extends Article
{

    public function __construct() {

    }

    public function createArticle($author_id, $title, $description) {
        $this->create($author_id, $title, $description);
    }
}