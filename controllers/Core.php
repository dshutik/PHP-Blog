<?php
abstract class Core{

	protected $model;

	public function __construct(){
		$this->model = new Model();
	}

	protected function get_header(){
		return true;
	}

	protected function get_footer(){
	    return true;
    }

	
    public function get_body($tpl){
	    $this->get_header();
	    list($arr1, $arr2, $arr3) = $this->get_content();
	    $this->get_footer();


	    include "views/index.php";
    }

    abstract function get_content();

}

?>