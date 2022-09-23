<?php



class EditController extends Article
{


    public function __construct() {

    }

    public function getArticleData($id) {
        return $this->getArticleDataById($id);
    }

    public function updateArticleById($id, $newtitle, $newdescription)
    {
        $this->updateArticle($id, $newtitle, $newdescription);
    }
}