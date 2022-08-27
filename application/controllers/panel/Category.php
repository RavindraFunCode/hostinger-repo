<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Category  extends MY_Controller 
{  
  function __construct()
  {
        parent::__construct();
      $this->load->model('Admin_model');
      $userData = $this->session->userdata('usersData');
      $this->userId=$userData->id;
      $this->tbl="category";
  }
   
  public function index($id=''){
    $header['title']='Category';
    $header['sub_title']='Home'; 
    $data = array();
    $this->load->view('panel/header',$header);
    $this->load->view('panel/category', $data);
    $this->load->view('panel/footer');
  }


  public function save()
  {
    $edit_id=$this->input->post('edit_id');
    $data['category_name'] = $this->input->post('category_name');
    $data['tags'] = $this->input->post('tags');
    $data['description'] = $this->input->post('description');
    $data['disabled'] = $this->input->post('disabled');
    // $attach_img=$_FILES['attach_img'];
    
    if(empty($data['category_name'])){
      $result['status']=0;
      $result['message']='Category Name is required';
      echo json_encode($result);die; 
    }
    if(empty($data['tags'])){
      $result['status']=0;
      $result['message']='Tags is required';
      echo json_encode($result);die; 
    }
    if(empty($data['description'])){
      $result['status']=0;
      $result['message']='Description is required';
      echo json_encode($result);die;
    }
    
    /*if(!empty($attach_img['name']))
		{
			$row=doUpload('category_img' ,'category');
			if($row['status'])
			{
				$data['category_img']=$row['file_name'];
        if(!empty($edit_id)) {
          $old_img = $this->db->get_where('category', ['id'=>$edit_id])->row();
				  $this->removeFile($old_img->category_img,'category');
        }
			}else{
				$result['status']=0;
				$result['message']=$row['file_name'];
				echo json_encode($result);die;	
			}
		}*/

    if(!empty($edit_id))
    {
      $edit_id=encryptor('decrypt',  $edit_id);
      $this->db->update($this->tbl, $data,['id'=>$edit_id]);
      $result['status']=1;
      $result['message']='Category update successful';
    }else{
      $data['addedBy']=$this->userId;
      $this->db->insert($this->tbl, $data);
      $result['status']=1;
      $result['message']='Category add successful';
    }
    echo json_encode($result);die;  
  }

  public function get_list()
  {
    $column = array('category_name','category_img','tags','description');
    $search_column=array('category_name','tags','description');
    $query = " SELECT * FROM  ".$this->tbl." ";
    // $query .=" WHERE farm_id='".$this->userId."' ";

    if(isset($_POST['search']['value'])&&!empty($_POST['search']['value']))
    {
      foreach ($search_column as $key=> $value) {
        $query .= ($key==0?" AND ":" OR ");
        $query .= $value ." LIKE '%".$_POST['search']['value']."%' ";
      }
    }

    if(isset($_POST['order']))
    {
       $query .= ' ORDER BY  '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }
    else
    {
       $query .= ' ORDER BY id DESC ';
    }
    $number_filter_row= $this->db->query($query)->num_rows();
    if(isset($_POST["length"])&&$_POST["length"] != -1)
    {
      $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $result =$this->db->query($query)->result();
    $data = array();
    foreach ($result as $key => $val) {
      $sub_array = array();

      $sub_array[] = ++$key;
      $sub_array[] = wordwrap($val->category_name,13,"<br>");
      // $sub_array[] = '<img src="'.get_files("category", $val->category_img).'" title="'.$val->category_name.'" style="width: 70%;">';
      // $sub_array[] = implode(",", explode(",",$val->tags));
      $sub_array[] = wordwrap(character_limiter(implode(", ", explode(",",$val->tags)),90),30,"<br>");
      // $sub_array[] = $val->description;
      $sub_array[] = $val->create_on;

      $sub_array[] = '
      <div>
      
        <a href="javascript:void(0);" class="btn btn-xs btn-secondary" style="border-radius: 0px;" onclick="edit(`' .encryptor('encrypt',  $val->id) . '`)"> <i class="fas fa-edit"></i></a>

        <a id="' . $val->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;" onclick="delete_data(`'.encryptor('encrypt',  $val->id).'`);"> 
        <i class="fas fa-trash-alt"></i> </a>
      </div>';
      $data[] = $sub_array;
    }

    $output = array(
             "start"         =>  intval($_POST['start']),
             "query"         =>  $query,
             "draw"         =>  intval($_POST["draw"]),
             "recordsTotal"     =>  $this->db->get_where($this->tbl)->num_rows(),
             "recordsFiltered"  =>  $number_filter_row,
             "data"         =>  $data
            );
    echo json_encode($output);
  }

  public function delete_item() {
      $delete_id=$this->input->post('delete_id');
      $delete_id=encryptor('decrypt', $delete_id);
      $data = $this->db->get_where($this->tbl, ['id'=>$delete_id])->row();
      if(empty($data)) {
          $result['status']=0;
          $result['message']='Category not Found.....';
          echo json_encode($result);die; 
      }
      if($data->category_img){
        removeFile($data->category_img, 'category');
      }
      $row=$this->db->delete($this->tbl, ['id'=>$delete_id]);
      if($row) {
          $result['status']=1;
          $result['message']='Your Category has been deleted';
      }else{
          $result['status']=0;
          $result['message']='Your Category not deleted';
      }
      echo json_encode($result);die;  
  }
  public function edit() {
      $editid=$this->input->post('editid');
      $edit_id=encryptor('decrypt', $editid);
      $data = $this->db->get_where($this->tbl, ['id'=>$edit_id])->row();
      if($data) {
          $data->id = $editid;
          $result['status']=1;
          $result['edit_data']=$data;
          $result['message']='';
      }else{
          $result['status']=0;
          $result['message']='Something went wrong';
      }
      echo json_encode($result);die;  
  }
}
 ?>