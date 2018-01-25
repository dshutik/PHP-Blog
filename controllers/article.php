<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 24.01.2018
 * Time: 21:22
 */

class article extends Core
{
    public function get_content()
    {
        $id_article = $_GET['id'];
        $author = strip_tags(trim($_POST['author']));
        $text = strip_tags(trim($_POST['text']));

        if($_POST['add']){
            $add_comment = $this->model->add_comment($id_article,$author,$text);
        }


        $article = $this->model->get_article($id_article);
        $comments = $this->model->get_comments($id_article);
        $comments_count = $this->model->get_count_comments($id_article);
        return array($article, $comments, $comments_count);
    }
}