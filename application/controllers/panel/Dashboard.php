<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dashboard  extends MY_Controller 
{  
    function __construct()
    {
        parent::__construct();
        $userData = $this->session->userdata('usersData');
        $this->userId=$userData->id;
    }
   
    public function index(){
     
        $header['title']='Dashboard';
        $header['sub_title']='Home';
        $data['img_count'] = $this->db->get_where($this->tbl_images)->num_rows();
        
        $this->load->view('panel/header',$header);
        $this->load->view('panel/index', $data);
        $this->load->view('panel/footer');

    }

    public function user_profile(){
        $header['title']='Dashboard';
        $header['sub_title']='Home';
        $data['h']=$this->Adminuser->select_Record('admin');
        $this->load->view('panel/header',$header);
        $this->load->view('panel/profile',$data);
        $this->load->view('panel/footer');

    }

    public function update_user_profile()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        $address = $this->input->post('address');
        $updateArray = array('username'=>$username,'email'=>$email,'contact'=>$contact,'address'=>$address);
         // print_r($id);
        // die();
        $this->Adminuser->update_global_Record('admin',$id,$updateArray);
        $this->session->set_flashdata('update','Your details has been updated');
        redirect(base_url().'Admin/Admin/user_profile');

    }

    public function user_password(){
        
        $header['title']='Dashboard';
        $header['sub_title']='Home';
        $data['h']=$this->Adminuser ->select_Record('admin');
        $this->load->view('panel/header',$header);
        $this->load->view('panel/update_password',$data);
        $this->load->view('panel/footer');

    }

    public function update_user_password()
    {   
        
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $new_password = $this->input->post('new_password');
        $con_password = $this->input->post('con_password');
        $check=1;
        
        if(empty($password))
        {
             $check=0;
           $this->session->set_flashdata('update','Please enter current password'); 
           
        }
        if(empty($new_password)&&$check)
        {  
             $check=0;
           $this->session->set_flashdata('update','Please enter new password'); 
        }
        if(empty($con_password)&&$check)
        {
            $check=0;
           $this->session->set_flashdata('update','Please enter confirm password'); 
        }
        
        $row=$this->db->get_where('admin',['id'=>$id,'password'=>md5($password)])->row();
        //echo $this->db->last_query();die;
        if(empty($row)&&$check)
        {
            $check=0;
            $this->session->set_flashdata('update','Please enter correct password');
        }
        
        if($new_password!=$con_password&&$check){
            $check=0; 
            $this->session->set_flashdata('update','New password and confirm password not match!');
        }
        //print_r($_POST);die;
        if($check)
        {
            $updateArray = array('password'=>md5($new_password));
            $this->Adminuser->update_global_Record('admin',$id,$updateArray);
            $this->session->set_flashdata('update','Your Psassword has been updated'); 
        }
        
        redirect(base_url().'Admin/Admin/user_password');
    }

    public function profile()
    {   
        $header['title']='Dashboard';
        $header['sub_title']='Profile';
        $data['users']=$this->db->get_where($this->tbl_admin, ['id'=>$this->userId])->row();
        
        $this->load->view('panel/header', $header);
        $this->load->view('panel/profile', $data);
        $this->load->view('panel/footer');
    }

    public function updateprofie()
    {
        $edit_id=$this->input->post('edit_id');
        $name=$this->input->post('name');
        // $email=$this->input->post('email');
        $contact_no=$this->input->post('contact_no');
        if(empty($name))
        {
            $result['status']=0;
            $result['message']='Please enter name';
            echo json_encode($result);die;
        }
        /*if(empty($email))
        {
            $result['status']=0;
            $result['message']='Please enter email';
            echo json_encode($result);die;
        }*/
        if(empty($contact_no))
        {
            $result['status']=0;
            $result['message']='Please enter contact no';
            echo json_encode($result);die;
        }

        $check=getValueByColumn($this->tbl_admin, 'email',['id != '=>$edit_id,'email'=>$email]);
        if(!empty($check))
        {
            $result['status']=0;
            $result['message']='Email already exist!';
            echo json_encode($result);die;
        }
        $data['name']=$name;
        // $data['email']=$email;
        $data['contact_no']=$contact_no;
        $this->db->update($this->tbl_admin, $data,['id'=>$edit_id]);
        $result['status']=1;
        $result['message']='Profile update successful';
        echo json_encode($result);die;

        
    }
    
    public function changepassword()
    {
        $header['title']='Dashboard';
        $header['sub_title']='Change Password';
        $this->load->view('panel/header',$header);
        $this->load->view('panel/change-password');
        $this->load->view('panel/footer');
    }

    public function updatepassword()
    {
        $old_password=$this->input->post('old_password');
        $new_password=$this->input->post('new_password');
        $repeat_password=$this->input->post('repeat_password');
        if(empty($old_password))
        {
            $result['status']=0;
            $result['message']='Please enter old password';
            echo json_encode($result);die;
        }
        if(empty($new_password))
        {
            $result['status']=0;
            $result['message']='Please enter new password';
            echo json_encode($result);die;
        }
        if(empty($repeat_password))
        {
            $result['status']=0;
            $result['message']='Please enter repeat password';
            echo json_encode($result);die;
        }
        $check=getValueByColumn($this->tbl_admin, 'id',['id'=>$this->userId,'password'=>$old_password]);
        if(empty($check))
        {
            $result['status']=0;
            $result['message']='Old password not currect!';
            echo json_encode($result);die;
        }

        if($repeat_password!=$new_password)
        {
            $result['status']=0;
            $result['message']='New password and repeat password not match!';
            echo json_encode($result);die;
        }
        $data['password']=$new_password;
        $this->db->update($this->tbl_admin, $data,['id'=>$this->userId]);
        $result['status']=1;
        $result['message']='Password update successful';
        echo json_encode($result);die;

    }
    public function logout()
    {
        $this->session->unset_userdata('usersData');
        redirect(base_url('panel'));
    }


    public function keys(){
     
        $header['title']='Save Keys Data';
        $header['sub_title']='Home';
        $data['text_data'] = $this->db->select('text_data')->get_where($this->tbl_key_desc, ['type'=>'Keywords'])->row('text_data');
        $data['category_tags'] = $this->db->select('text_data')->get_where($this->tbl_key_desc, ['type'=>'category-tags'])->row('text_data');
        
        $this->load->view('panel/header',$header);
        $this->load->view('panel/key-data', $data);
        $this->load->view('panel/footer');

    }
    public function save_key(){
     
        // $edit_id=$this->input->post('edit_id');
        $data['text_data'] = $this->input->post('text_data');
        $data2['text_data'] = $this->input->post('category_tags');

        /*if(empty($data['text_data'])){
          $result['status']=0;
          $result['message']='Text Data is required';
          echo json_encode($result);die; 
        }*/

        $this->db->update($this->tbl_key_desc, $data,['id'=>1]);
        $this->db->update($this->tbl_key_desc, $data2,['id'=>3]);
        $result['status']=1;
        $result['message'] = 'Tag Data update successful';
        echo json_encode($result);die;

    }


}
 ?>