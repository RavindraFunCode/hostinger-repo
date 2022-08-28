<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// get column value by condition
if(!function_exists('getValueByColumn'))
{
    function getValueByColumn($table,$field,$where)
    {   $ci =& get_instance();
        $ci->load->database();
        $ci->db->select($field);
        $row=$ci->db->get_where($table,$where)->row_array();
        if(!empty($row))
        {
            return $row[$field];
        }else{
            return '';
        }
    }
}
if(!function_exists('getColumnSum'))
{
    function getColumnSum($table,$condition, $column){
        $ci =& get_instance();
        $ci->load->database();
        return $ci->db->select_sum($column)->get_where($table,$condition)->row_array()[$column];
    }
}
if(!function_exists('doUpload'))
{
    function doUpload($input,$dir){
        $ci =& get_instance();
        $uploadPath=FCPATH.'/uploads/'.$dir;
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, TRUE);
            //echo "The directory $f_name was successfully created.";
        }

        $config['upload_path']="./uploads/".$dir;
        $config['allowed_types']='gif|jpg|png';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = FALSE;
        $ci->load->library('upload',$config);
        $ci->upload->initialize($config);
        if($ci->upload->do_upload($input)){
            $data = $ci->upload->data();
            $result=array('status'=>1,'file_name' =>$data['file_name']);
        }else{
            $result=array('status'=>0,'file_name' =>$ci->upload->display_errors());
        }
        return $result;
    }
}
if(!function_exists('removeFile'))
{
    function removeFile($file,$dir)
    {   
        $url=FCPATH .'uploads/'.$dir.'/'.$file;
        if(file_exists($url))
        {
            @unlink($url);
        }
    }
}

if(!function_exists('encryptor'))
{
    function encryptor($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'SSAK';
        $secret_iv = 'MNG';
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        //do the encyption given text/string/number
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}

if(!function_exists('get_files'))
{
    function get_files($dir,$input)
    {
        $url=FCPATH .'/uploads/'.$dir.'/'.$input;
        if(is_file($url))
        {
            $resutl=base_url('uploads/'.$dir.'/'.$input);
        }else{
            $resutl=base_url('uploads/no-image.png');
        }
        return $resutl;
    }
}
if(!function_exists('genImageSlug'))
{
    function genImageSlug($slug)
    {
        $ci =& get_instance();
        $ci->load->database();
        // $ci->db->select($field);
        $row=$ci->db->get_where("tbl_images", ['slug'=>$slug])->row();
        if(!empty($row))
        {
            $last_id = $ci->db->select("*")->limit(1)->order_by('id',"DESC")->get("tbl_images")->row()->id;
            return $slug."-".($last_id+100);
        }else{
            return $slug;
        }
    }
}
if(!function_exists('cleanImageSlug'))
{
    function cleanImageSlug($slug)
    {
        $ci =& get_instance();
        $ci->load->database();
        // $ci->db->select($field);
        $row=$ci->db->get_where("tbl_images", ['slug'=>$slug])->row();
        if(!empty($row))
        {
            return true;
        }else{
            return false;
        }
    }
}
if(!function_exists('get_admin_id')) 
{
    function get_admin_id()
    {   $ci =& get_instance();
        $manageData=$ci->session->userdata('usersData');
        return $manageData->id;
    }
}
// check user login
if(!function_exists('is_login'))
{
    function is_login()
    {   $ci =& get_instance();
        $adminData=$ci->session->userdata('usersData');
        if(!$adminData)
        {
            return redirect(base_url('panel'));
        }
    }
}
//remove special characters
if (!function_exists('remove_special_characters')) {
    function remove_special_characters($str, $is_slug = false)
    {
        $str = trim($str);
        $str = str_replace('#', '', $str);
        $str = str_replace(';', '', $str);
        $str = str_replace('!', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('(', '', $str);
        $str = str_replace(')', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('\'', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('?', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        $str = str_replace('|', '', $str);
        $str = str_replace('~', '', $str);
        $str = str_replace('&', '', $str);
        $str = str_replace(',', '', $str);
        if ($is_slug == true) {
            $str = strtolower($str);
            $str = str_replace(" ", '-', $str);
            $str = str_replace("'", '', $str);
        }
        return $str;
    }
}
//tags
if (!function_exists('clean_tags')) {
    function clean_tags($tag)
    {
        $array_tag = explode("," , $tag);
        $new_arr = [];
        foreach ($array_tag as $key => $value) {
            $new_arr[] = trim($value, " ");
        }
        return implode(",", $new_arr);
    }
}
if (!function_exists('getPNGImageURL')) {
    function getPNGImageURL($url)
    {
        return "https://pngimages.in/".$url;
    }
}

?>