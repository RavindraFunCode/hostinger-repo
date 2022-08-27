<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Web_Controller {

	function __construct(){
		parent::__construct();
        // Per page limit 
        $this->perPage = 40; 
        $this->load->library('pagination');
        // $this->load->model('Index_model');
	}

    public function index(){
        $data['title'] = "PNG Images With Transparent Background Free Download";
        $data['subtitle'] = $data['title'];
        $data['page_for'] = base_url();

        $this->load->view('include/header', $data);
        $this->load->view('index', $data);
        $this->load->view('include/footer');
    }

    public function all_tags(){
        $data['title'] = "All Category";
        $data['subtitle'] = $data['title'];
        
        $all_tags = $this->db->select('text_data')->get_where($this->tbl_key_desc, ['type'=>'category-tags'])->row('text_data');
        // $all_tags = $this->db->select('tag')->get_where('tbl_images', ['status'=>1])->result();
        // $tags_str = '';

        // foreach ($all_tags as $key => $value) {

        //     $tags_str = $tags_str.','.$value->tag;
        // }
        // $tags_arr = explode(",", $tags_str);
        $tags_arr = explode(",", $all_tags);

        $tags_arr = array_unique($tags_arr);
        sort($tags_arr);

        $data['all_tags'] = $tags_arr;

        $this->load->view('include/header', $data);
        $this->load->view('all-tags', $data);
        $this->load->view('include/footer');
    }
    
    public function query($search=null){
        if($search==null){
            redirect(base_url());
        }
        $search = str_replace("%20", " ", $search);
        $data['title'] = $search;
        $data['subtitle'] = $data['title'];

        $this->load->view('include/header', $data);
        $this->load->view('all-images', $data);
        $this->load->view('include/footer');
    }
    public function category(){
        $data['category'] = $this->db->get_where('category', ['disabled'=>0])->result_array();
        $header['title'] = "PNG Hacker";
        $header['subtitle'] = "PNG Hacker";
        $this->load->view('include/header', $header);
        $this->load->view('category', $data);
        $this->load->view('include/footer');
    }
    
    public function show($slug=''){
        $data['png'] = $slug!='' ? $this->db->get_where($this->tbl_images, ['slug'=>$slug, 'status'=>1])->row_array():[];
        if(empty($data['png'])){
            redirect(base_url('404'));
        }
        $data['description'] = '';
        $this->db->order_by('id', 'desc');
        $this->db->limit('52');
        // $data['latest'] = $this->db->get_where($this->tbl_images, ['status'=>1])->result_array();

        $this->db->where('status = 1');
        $tag_array = explode(",", $data['png']['tag']);
        if(count($tag_array)>2){
            $index_of_random_tag = array_rand($tag_array, 3);//count($tag_array)
            $single_random_tag = $tag_array[$index_of_random_tag[0]];
            // print_r($index_of_random_tag);die;
        }else{
            $single_random_tag = $tag_array[0];
        }
        if(strpos($single_random_tag, " ")){
            $this->db->where('find_in_set("'.$single_random_tag.'",  tag ) <> 0');
        }else{
            $this->db->where('find_in_set("'.$single_random_tag.'",  REPLACE(tag, " ", "") ) <> 0');
        }
        
        $data['latest'] = $this->db->get_where($this->tbl_images)->result_array();
        // echo $this->db->last_query();die;
        
        $data['title'] = "PNG Hacker";
        $data['subtitle'] = $data['png']['name'];
        $this->load->view('include/header', $data);
        $this->load->view('show', $data);
        $this->load->view('include/footer');
    }
    public function loadall(){

        $start = $this->input->post('page');
        $search = $this->input->post('search');
        $load = $this->input->post('load');

        $this->db->order_by('id', 'RANDOM');
        $con['status']=1;
        $url = '';
        /*if(isset($category) && !empty($category)){
            $con['category_Id']=getValueByColumn('category', 'id', ['slug'=>$category, 'disabled'=>0]);
            $url .= "/".$category;
        }*/
        // $this->db->where("id > ", 0]);
        if(!empty($search)){
            $search = str_replace("%20"," ",$search);
            $url .= "/".$search;
            // $this->db->where(" MATCH (tag) AGAINST('$search' IN NATURAL LANGUAGE MODE ) ");
            //MATCH (tag) AGAINST ('holi'  IN NATURAL LANGUAGE MODE)
            // $this->db->like('tag', $search, 'after');
            if(strpos($search, " ")){
                $this->db->where('find_in_set("'.$search.'",  tag ) <> 0');
            }else{
                $this->db->where('find_in_set("'.$search.'",  REPLACE(tag, " ", "") ) <> 0');
            }
        }

        $this->db->limit($this->perPage, ($start==1?0:($start>1 ? $start-1 : $start))*$this->perPage);
        $images = $this->db->select("name, slug, image, tag, height")->get_where($this->tbl_images, $con)->result_array();
        // $qry2 = $this->db->last_query();
        if(!empty($search)){
            if(strpos($search, " ")){
                $this->db->where('find_in_set("'.$search.'",  tag ) <> 0');
            }else{
                $this->db->where('find_in_set("'.$search.'",  REPLACE(tag, " ", "") ) <> 0');
            }
            // $this->db->where(" MATCH (tag) AGAINST('$search' IN NATURAL LANGUAGE MODE ) ");
            // $this->db->like('tag', $search);
        }
        $count = $this->db->select("id")->get_where($this->tbl_images, $con)->num_rows();
        // $qry1 = $this->db->last_query();

        $pagination = $this->_pagination($count, $url, $start, $load);

        $html = '';
        // $start = microtime(true);
        // foreach ($images as $key => $value) {
            
        //     $url = base_url('welcome/show/'.$value['slug']);
            
        //     $thum_url = base_url('uploads/png-thumb/'.$value['image']);
        //     $img_info = getimagesize($thum_url);
        //     //src="'.base_url('uploads/png-thumb/'.$value['image']).'"
            
        //     $html .=' <div class="grid-item col-sm-12 col-md-4">
        //                 <a href="'.$url.'">
        //                     <div class="img_box p-2" style ="  height:'.$img_info[1].'px; " >
        //                       <img  alt="'.$value['tag'].'" class="lozad" data-src="'.base_url('uploads/png-thumb/'.$value['image']).'"  />
        //                     </div>
        //                     <div class="dt-box">
        //                         <h1 class="image-name" style="font-size:15px;">'.ucfirst($value['name']).'</h1>
        //                     </div>
        //                 </a>
        //               </div>';/* target="_blank"*/
        // }
        // $time_elapsed_secs = microtime(true) - $start;
        $res['status'] = !empty($images)?1:0;
        $res['html'] = $html;
        $res['images'] = $images;
        $res['url'] = base_url('welcome/show/');
        $res['thumb_url'] = $thum_url = getPNGImageURL('uploads/png-thumb/');

        // $res['qry1'] = $qry1;
        // $res['qry2'] = $qry2;
        // $res['time_elapsed_secs'] = $time_elapsed_secs;
        /*
        $res['search'] = $search;
        */
        
        $res['pagination'] = $pagination;
        echo json_encode($res);

    }
    function _pagination($totalRec, $category, $start, $load){
        $config['base_url']    = base_url().'welcome/'.$load.$category;
        // $config['page_query_string'] = TRUE;//enabling query string with $_GET
        // $config['enable_query_strings'] = TRUE; 
        // $config['query_string_segment'] = $category.'page';
        $config['uri_segment'] = 3;//$start; 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage;

        $config["use_page_numbers"] = TRUE;
        $config["num_links"] = 6;

        // Pagination link format 
        $config['full_tag_open'] ='<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] = '<li class="page-item page-link">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev page-item page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item page-link">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item page-link" style="display:none">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active page-item page-link">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item page-link">';
        $config['num_tag_close'] = '</li>';

        // Initialize pagination library 
        $this->pagination->initialize($config); 
        return $this->pagination->create_links();
    }
    
    /*public function updateData(){
        $this->db->where("height IS NULL");
        $images = $this->db->limit(1200)->select("image, id")->get_where($this->tbl_images)->result_array();
        // print_r($images);die;
        foreach ($images as $key => $value) {
            
            $thum_url = base_url('uploads/png-thumb/'.$value['image']);
            $img_info = getimagesize($thum_url);
            $height = $img_info[1];
            $data['height'] = $height;
            $this->db->update($this->tbl_images, $data,['id'=>$value['id']]);
            // $this->db->set("height", $height );
            // $this->db->where('id', $value->id);
            // $this->db->update($this->tbl_images);
            // $this->db->update(["height"=>$height ])->where($this->tbl_images, ['id'=>$value->id]);
        }   
        echo "Done: ".count($images);

    }*/
    public function search(){
        $text = $this->input->post('text');

        // $this->db->limit(10);
        $this->db->like('tag', $text);
        $this->db->or_like('name', $text);
        $images = $this->db->get_where('images', ['type'=>1, 'disabled'=>'0'])->result_array();
        // echo $qry = $this->db->last_query();die;
        $html = '';
        foreach ($images as $key => $value) {
            $url = base_url('welcome/show/'.$value['id']);
            $html .=' <li class="items"><a href="'.$url.'">'.$value['name'].'</a></li>';
        }
        echo empty($text) || empty($images) ? '<li>No data found...</li>' : $html;die;

    }

    public function download(){ //not in use
        $file = $_GET['f'];

        header("Expires: 0");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $basename = pathinfo($file, PATHINFO_BASENAME);

        header("Content-type: application/".$ext);
        // tell file size
        header('Content-length: '.filesize($file));
        // set file name
        header("Content-Disposition: attachment; filename=\"$basename\"");
        readfile($file);
        // Exit script. So that no useless data is output.
        exit;
    }
    public function sitemap(){
        $data['sitemap'] = $this->db->get_where($this->tbl_sitemap, ['status'=>1])->result();
        // $data['categories'] = $this->db->select('slug')->get_where('category', ['disabled'=>0])->result();
        // $this->db->limit('4', '701');
        $data['pngs'] = $this->db->select('slug')->get_where($this->tbl_images, ['status'=>1])->result();
        // echo "<pre>";
        // print_r($data['pngs']);die;
        $this->load->view('sitemap', $data);
    }
    public function error_404()
    {
        header("HTTP/1.0 404 Not Found");
        $data['heading'] = "Error 404";
        $data['message'] = "Error 404 Page Not Found...";
        $data['keywords'] = "error,404";
        $data['title'] = "404 Page Not Found...";
        $data['subtitle'] = $data['title'];//"PNG Hacker";
        $this->load->view('include/header', $data);
        $this->load->view('error_404', $data);
        $this->load->view('include/footer');
    }
    public function privacy_policy()
    {
        $data['title'] = "Privacy Policy";
        $data['subtitle'] = $data['title'];//"PNG Hacker";
        $this->load->view('include/header', $data);
        $this->load->view('privacy_policy', $data);
        $this->load->view('include/footer');
    }
    public function terms_condition()
    {
        $data['title'] = "Terms & Conditions";
        $data['subtitle'] = $data['title'];//"PNG Hacker";
        $this->load->view('include/header', $data);
        $this->load->view('terms_condition', $data);
        $this->load->view('include/footer');
    }
    public function contact_us()
    {
        $data['title'] = "Contact Us";
        $data['subtitle'] = $data['title'];//"PNG Hacker";
        $this->load->view('include/header', $data);
        $this->load->view('contact-us', $data);
        $this->load->view('include/footer');
    }
    public function about_us()
    {
        $data['title'] = "About Us";
        $data['subtitle'] = $data['title'];//"PNG Hacker";
        $this->load->view('include/header', $data);
        $this->load->view('about-us', $data);
        $this->load->view('include/footer');
    }
}