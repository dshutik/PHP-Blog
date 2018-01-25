<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 23.01.2018
 * Time: 21:06
 */

class Model
{
    protected $db;

    public function __construct(){
        $this->db = mysqli_connect(HOST,USER,PASSWORD);
        if(!$this->db){
            exit("Ошибка соединения с базой данной".mysqli_error($this->db));
        }
        if(!mysqli_select_db($this->db, DB)){
            exit("Нет такой базы данных".mysqli_error($this->db));
        }
    }


    public function get_hit_articles(){
        $query = "SELECT * FROM articles
                  LEFT JOIN (SELECT id_article, COUNT('id_article') as count  FROM comments GROUP BY id_article) A
                  ON (articles.id = A.id_article)
                  ORDER BY A.count DESC
                  LIMIT 5";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }

        for($i = 0;$i < mysqli_num_rows($result);$i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function get_all_articles(){
        $query = "SELECT * FROM articles ORDER BY articles.date DESC, articles.time DESC";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }

        for($i = 0;$i < mysqli_num_rows($result);$i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function add_article($title,$text,$author,$date,$time){
        $query = "INSERT INTO articles(title, text, author, date, time) VALUES('$title', '$text', '$author', '$date', '$time')";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }
    }

    public function get_article($id){
        $query = "SELECT * FROM articles WHERE id='$id'";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }

        for($i = 0;$i < mysqli_num_rows($result);$i++){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function add_comment($id,$author,$text){
        $query = "INSERT INTO comments(id_article, author, text) VALUES('$id', '$author', '$text')";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }
    }

    public function get_comments($id){
        $query = "SELECT * FROM comments WHERE id_article='$id'";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }

        for($i = 0;$i < mysqli_num_rows($result);$i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function get_count_comments($id){
        $query = "SELECT COUNT('id_article') AS comments_count FROM comments WHERE id_article='$id'";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }

        for($i = 0;$i < mysqli_num_rows($result);$i++){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }


}