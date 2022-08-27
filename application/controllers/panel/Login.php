<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$userData = $this->session->userdata('usersData');
		if(!empty($userData)){
			redirect('panel/dashboard');
		}
		$this->tbl_admin = "tbl_admin";
    }
	public function index()
	{
		$this->load->view('panel/login');
	}
	public function auth()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if(empty($email))
		{
			$result['status']=0;
			$result['message']='Please enter Email';
			echo json_encode($result);die;
		}

		if(empty($password))
		{
			$result['status']=0;
			$result['message']='Please enter password';
			echo json_encode($result);die;
		}

		$row=$this->db->get_where($this->tbl_admin, ['email'=>$email,'password'=>$password,'disabled'=>0])->row();
		if(empty($row))
		{
			$result['status']=0;
			$result['message']='User name and password not match!';
			echo json_encode($result);die;
		}else{
			$this->session->set_userdata('usersData',$row);
			$result['status']=1;
			$result['message']='Welcome back sir/ma\'am';
			$result['redirect_url']=base_url('panel/dashboard');
			
			echo json_encode($result);die;
		}

	}
}
