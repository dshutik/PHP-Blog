<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 24.01.2018
 * Time: 20:18
 */

class addArticle extends Core
{
    public function get_content(){
            $title = strip_tags(trim($_POST['title']));
            $text = strip_tags(trim($_POST['text']));
            $author = strip_tags(trim($_POST['author']));
            $date = $_POST['date'];
            $time = $_POST['time'];

            $result = $this->model->add_article($title,$text,$author,$date,$time);
            return $result;
    }


}