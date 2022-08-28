<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*  admin
**/
date_default_timezone_set("Asia/Kolkata");
class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_login();
		$this->tbl_sitemap = "tbl_sitemap";
		$this->tbl_admin = "tbl_admin";
		$this->tbl_images = "tbl_images";
		$this->tbl_key_desc = "tbl_key_desc";
	}
	
}

class Web_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->tbl_sitemap = "tbl_sitemap";
		$this->tbl_images = "tbl_images";
		$this->tbl_key_desc = "tbl_key_desc";
	}
	
}


?>