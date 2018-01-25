<?php
class main extends Core{

    public function get_content()
    {
        $hit_articles = $this->model->get_hit_articles();
        $all_articles = $this->model->get_all_articles();
        return array($hit_articles, $all_articles);
    }
}
?>