<?php
class DeleteController extends Article
{

    public function deleteById($id) {
        $this->deleteArticle($id);
    }
}

