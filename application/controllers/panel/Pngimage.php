<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class PngImage  extends MY_Controller 
{  
    function __construct()
    {
      parent::__construct();
      $userData = $this->session->userdata('usersData');
      $this->userId=$userData->id;
    }
   
    public function index($id=''){
        $header['title']='PNG Image';
        $header['sub_title']='Home'; 
        $data = array();
        $this->load->view('panel/header',$header);
        $this->load->view('panel/png_list', $data);
        $this->load->view('panel/footer');
    }
    public function add(){
        $header['title']='Add PNG Image';
        $header['sub_title']='Home'; 
        $data = array();
        $this->load->view('panel/header',$header);
        $this->load->view('panel/png_add', $data);
        $this->load->view('panel/footer');
    }

    public function save() {
        $edit_id = $this->input->post('edit_id');
        // $data['category_Id'] = $this->input->post('category_Id');
        $data['name'] = trim($this->input->post('name'));
        $data['tag'] = clean_tags($this->input->post('tag'));
        // $data['slug'] = preg_replace('/[0-9\@\.\,\;\" "()]+/', '-', strtolower($data['name']));
        $data['slug'] = remove_special_characters($data['name'], true);
        $data['slug'] = genImageSlug($data['slug']);
        // $data['slug'] = preg_replace('/ /i', '-', strtolower($data['name']));
        if(empty($edit_id)){
            $img = doUpload('image', 'png');
            if ($img['status']) {
                $data['image'] = $img['file_name'];
                $imageTemp = $_FILES["image"]["tmp_name"]; 
                $fileName = $data['image'];//basename($_FILES["images"]['name']); 
                $imageUploadPath = "uploads/png-thumb/".$fileName;
                $compressedImage = $this->compressImage($imageTemp, $imageUploadPath, $fileName);

                $thum_url = base_url('uploads/png-thumb/'.$data['image']);
                $img_info = getimagesize($thum_url);
                $height = $img_info[1];
                $data['height'] = $height;

                $this->db->insert($this->tbl_images, $data);
                $result['status'] = 1;
                $result['message'] = $img['file_name']. " PNG Image Uploaded";
            } else {
                $result['status'] = 0;
                $result['message'] = $img['file_name'];
            }
            echo json_encode($result);die;
        }else{
            $edit_id=encryptor('decrypt', $edit_id);
            $image = $_FILES['image'];
            if (!empty($image['name'])) {
                $row = doUpload('image', 'png');
                
                if ($row['status']) {
                    $data['image'] = $row['file_name'];
                    $imageTemp = $_FILES["image"]["tmp_name"]; 
                    $fileName = $data['image'];//basename($_FILES["images"]['name']); 
                    $imageUploadPath = "uploads/png-thumb/".$fileName;
                    $compressedImage = $this->compressImage($imageTemp, $imageUploadPath, $fileName);

                    $thum_url = base_url('uploads/png-thumb/'.$data['image']);
                    $img_info = getimagesize($thum_url);
                    $height = $img_info[1];
                    $data['height'] = $height;
                    
                    if (!empty($edit_id)) {
                        $old_image = $this->input->post('old_img');
                        removeFile($old_image, 'png');
                        removeFile($old_image, 'png-thumb');
                    }
                } else {
                    $result['status'] = 0;
                    $result['message'] = $row['file_name'];
                    echo json_encode($result); die;
                }
            }
            
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->update($this->tbl_images, $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'PNG Image update successfully';

            echo json_encode($result); die;
        }
    }
    function compressImage($source, $destination, $fileName) { 
        $filename=$source;
        $imgInfo = getimagesize($source); 
        // print_r($$imgInfo);die;
        $mime = $imgInfo['mime'];

        list($width_orig, $height_orig) = getimagesize($filename);
        //echo $width_orig;
        // Get new dimensions
        $nwidth=350;
        $nheight=($height_orig/$width_orig)*$nwidth;
        // $nwidth=$width_orig/4;
        // $nheight=$height_orig;// /4;

        $newimage=imagecreatetruecolor($nwidth, $nheight);
        if($mime=='image/jpeg') {
            // code...
            $source=imagecreatefromjpeg($filename);
            imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width_orig, $height_orig);
            $file_name=time().'.jpg';
            imagejpeg($newimage, $destination);

        }else if($mime=='image/png') {
            $source=imagecreatefrompng($filename);
            //transparency png
            imagealphablending($newimage, false);
            imagesavealpha($newimage, true);
            $transparency = imagecolorallocatealpha($newimage, 255, 255, 255, 127);
            imagefilledrectangle($newimage, 0, 0, $nwidth, $nheight, $transparency);

            imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width_orig, $height_orig);

            $file_name=$fileName.'.png';
            imagepng($newimage, $destination);

        }elseif($mime=='image/gif') {

            $source=imagecreatefromgif($filename);
            //transparency png
            /*imagealphablending($newimage, false);
                imagesavealpha($newimage, true);
               $transparency = imagecolorallocatealpha($newimage, 255, 255, 255, 127);
            imagefilledrectangle($newimage, 0, 0, $nwidth, $nheight, $transparency);
            */

            imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width_orig, $height_orig);

            $file_name=time().'.gif';
            imagegif($newimage, $destination);

        }

    }

  public function get_list()
  {
    $column = array('id', 'name', 'image', 'tag');
    $search_column=array('name','tag');
    $query = " SELECT * FROM  ".$this->tbl_images." ";
    $query .=" WHERE id>'0' ";

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
      $sub_array[] = '<img src="'.get_files("png-thumb", $val->image).'" title="'.$val->name.'" style="width: 70%;">';
      
      $sub_array[] = wordwrap(character_limiter(implode(", ", explode(",",$val->name)),90),30,"<br>");
      $sub_array[] = wordwrap(character_limiter(implode(", ", explode(",",$val->tag)),90),30,"<br>");

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
       "recordsTotal"     =>  $this->db->get_where($this->tbl_images)->num_rows(),
       "recordsFiltered"  =>  $number_filter_row,
       "data"         =>  $data
      );
    echo json_encode($output);
  }

  public function delete_item() {
      $delete_id=$this->input->post('delete_id');
      $delete_id=encryptor('decrypt', $delete_id);
      $data = $this->db->get_where($this->tbl_images, ['id'=>$delete_id])->row();
      if(empty($data)) {
          $result['status']=0;
          $result['message']='PNG Image not Found.....';
          echo json_encode($result);die; 
      }
      if($data->image){
        removeFile($data->image, 'png');
        removeFile($data->image, 'png-thumb');
      }
      $row=$this->db->delete($this->tbl_images, ['id'=>$delete_id]);
      if($row) {
          $result['status']=1;
          $result['message']='Your PNG Image has been Deleted';
      }else{
          $result['status']=0;
          $result['message']='PNG Image not Deleted';
      }
      echo json_encode($result);die;  
  }
  public function edit() {
      $editid=$this->input->post('editid');
      $edit_id=encryptor('decrypt', $editid);
      $data = $this->db->get_where($this->tbl_images, ['id'=>$edit_id])->row();
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