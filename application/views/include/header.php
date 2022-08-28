<!DOCTYPE html>
<html lang="en">
    <head>
                 
        <!-- <meta name="msvalidate.01" content="64A2D97AB500D0990AADED1927F23575" /> -->
        <!-- set the encoding of your site -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        
         
        <!-- set the page title -->
        <title><?php echo ucwords($subtitle); //current_url()=="https://pnghacker.in/" ? "PNG Images With Transparent Background Free Download" : ($subtitle ? $subtitle : ''); ?> Transparent Background Free Download - Love2PNG</title>
        <link rel="canonical" href="<?php echo current_url(); ?>" />
        <link rel="icon" href="<?php echo base_url(); ?>assets/site/favicon-50x50px.png" type="image/x-icon" />
        <?php
            
            $description_data=getValueByColumn('tbl_key_desc','text_data', ['type'=>"description","disabled"=>0]);
            $tags=getValueByColumn('tbl_key_desc','text_data', ['type'=>"Keywords","disabled"=>0]);

            $isSlug=$this->uri->segment(2);
            $slug=$this->uri->segment(3);
            $con['disabled']=0;
            // $tags='';
            if($isSlug=="show"){
                $catData = getValueByColumn($this->tbl_images,'tag', ['slug'=>$slug]);
                // $category_Id = getValueByColumn('tbl_images','category_Id', ['slug'=>$slug]);
                // $description_data = strip_tags(getValueByColumn('tbl_category','description', ['id'=>$category_Id]));
                $tags = !empty($png['tag']) ? $png['tag'] : '';
            }else{
                if($isSlug=="index" && !empty($this->uri->segment(4))){
                    $con['slug']=$slug;
                    $catData = '';//$this->Index_model->get_Record('tbl_category', $con);
                    $tags = !empty($catData) ? $catData['tags'] : '';
                }
                if($isSlug=="pngs"){
                    $description_data = !empty($catData) ? strip_tags($catData['description']) : '';
                }
            }
            $description_data = str_replace("&nbsp;", " ", $description_data);
            
        ?>
        <meta name = "keywords" content = "<?php echo $tags ? $tags : ''; ?><?php  //echo $Keywords_data?$Keywords_data:''; ?> " />
        <?php if(isset($page_for) && current_url()==$page_for){ ?>
        <meta name="description" content=" <?php echo $description_data?$description_data:''; ?>">
        <?php } ?>

        <?php if(isset($isSlug) && $isSlug=="show"){ ?>
        <meta name="description" content=" You Can Free Download Png Transparent Images <?php echo $png['name'] ?>. The Image's Backgroud is Transparent And In PNG (Portable Network Graphics) Format. ">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?php echo ucwords($png['name']); ?> Free Transparent PNG Download - PNG Images">
        <meta property="og:description" content="You Can Free Download Png Transparent Images <?php echo $png['name'] ?> The Image's Backgroud is Transparent And In PNG (Portable Network Graphics) Format." >
        <meta property="og:url" content="<?php echo current_url(); ?>">
        <meta property="og:site_name" content="love2png.com">
        <meta property="og:image" content="<?php echo getPNGImageURL('uploads/png-thumb/'.$png['image']) ?>">
        <meta name="twitter:card" content="summary">
        <meta property="twitter:title" content="<?php echo $png['name'] ?> Free Transparent PNG Download - PNG Images">
        <meta property="twitter:description" content="You Can Free Download Png Images Free Download <?php echo $png['name'] ?>" >
        <meta property="twitter:image" content="<?php echo getPNGImageURL('uploads/png-thumb/'.$png['image']) ?>">
        <?php } ?>
        
        
        <!-- inlcude google archivo & lora font cdn link -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;family=Lora:ital,wght@0,400;0,700;1,400;1,700&amp;family=Muli:ital@0;1&amp;family=Merriweather&amp;display=swap" rel="stylesheet" /> -->
        <!-- include the site bootstrap stylesheet -->

        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" /> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- include the site stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/my-style.css" />
        <!-- include the site responsive stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css" />
        

        <!-- include jQuery library -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        
        <script src="https://unpkg.com/imagesloaded@4.1.4/imagesloaded.pkgd.js"></script>
        <script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
         
    
        
        <style type="text/css">
            
        </style>
    </head>
<body style=""><!-- background-color: #cdcdcd; -->
    <!-- pageWrapper -->
    <div id="pageWrapper">
        <div class="phStickyWrap phVii w-100" style="height: 90px;">
            <!-- pageHeader -->
            <header id="pageHeader" class="position-absolute w-100 bg-white">
                <!-- htTopBar -->
                
                <!-- hdHolder -->
                <div class="hdHolder1 headerFixer1">
                    <div class="container">
                        <!-- navbar -->
                        <nav class="navbar navbar-expand-md navbar-light d-block px-0 pt-2 pb-2 pt-md-2 pb-md-2 pt-lg-4 pb-lg-5">
                            <div class="row">
                                <div class="col-7 col-sm-3 col-lg-2">
                                    <!-- logo -->
                                    <div class=" logoVii mt-lg-1">
                                        <a href="<?php echo base_url() ?>">
                                            <!-- <h1 style="font-size: 22px;">PNG Hacker</h1> -->
                                            <img src="<?php echo base_url(); ?>assets/site/logo-150x50px.png" class="img-fluid" alt="PNG || Art &amp; History">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-5 col-sm-9 col-lg-10 position-static d-flex justify-content-end pt-lg-1">
                                    
                                    <!-- navbar collapse -->
                                    <div class="collapse navbar-collapse pageNavigationCollapse pageNavigationCollapseVii justify-content-md-end" id="pageNavigationCollapse">
                                        <form action="javascript:void(0)" class="" style="margin: auto;<?php echo current_url()==base_url() ? "display: none;" : "" ; ?>">
                                            <div class="input-group1 d-flex" style="position: relative;">
                                                <input type="search" onsearch="search_text()" class="search-input form-control navbar-collapse justify-content-md-end" placeholder="Search…" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="border-radius: 11px;"  >
                                                <!-- onclick="search(this.value)" oninput="search(this.value)" -->
                                                <div class="input-group-appendq">
                                                    <button class="btn btn-secondary search-data" type="button" style="border-radius: 9px;" >
                                                        <i class="icomoon-search"><span class="sr-only">search</span></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- mainNavigation -->
                                        <ul class="navbar-nav mainNavigation mainNavigationVii text-capitalize">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url(); ?>" role="button">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url('welcome/all_tags'); ?>" role="button">Category</a>
                                            </li>

                                            <li class="nav-item dropdown" >
                                                <a class="nav-link" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
                                               
                                                <div class="dropdown-menu mndDropMenu mndDropMenuSmall p-0">
                                                    
                                                    <ul class="list-unstyled mnDropList mb-0 pt-1 pb-1 pt-md-4 pb-md-6">
                                                        <li><a target="_self" href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
                                                        <li><a target="_self" href="<?php echo base_url('about-us'); ?>">About Us</a></li>
                                                        <li><a target="_self" href="<?php echo base_url('terms-condition'); ?>">Terms & Condition</a></li>
                                                        <li><a target="_self" href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex align-items-center ml-3 ml-lg-6">
                                        
                                        <a href="javascript:void(0);" class="hdMenuOpener position-relative ml-4 d-none d-md-block">
                                            <span class="icnBar position-absolute"><span class="sr-only">menu</span></span>
                                        </a>
                                        <!-- navbar toggler -->
                                        <button class="navbar-toggler pgNavOpener pgNavOpenerVii position-absolute" type="button" data-toggle="collapse" data-target="#pageNavigationCollapse" aria-controls="pageNavigationCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"><span class="sr-only">menu</span></span>
                                        </button>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
        <main>
            <!-- mainHeadingHead -->
            <header class="mainHeadingHead position-relative bgCover w-100 <?php echo current_url()==base_url() ? "d-flex" : "" ; ?> d-md-none1 text-white" style="/*min-height: 0px;*/background: rgb(18,221,10);
background: linear-gradient(90deg, rgba(18,221,10,1) 0%, rgba(8,161,144,1) 24%, rgba(6,175,99,1) 50%, rgba(3,206,166,0.9923319669664741) 76%, rgba(0,212,255,1) 100%); min-height: 510px; <?php echo current_url()!=base_url() ? "display: none;" : "" ; ?>">
<!-- background-image: url(<?php echo base_url('assets/images/img113.jpg'); ?>); -->
                <div class="mhhAlignHolder d-flex w-100 align-items-center position-relative">
                    <div class="container py-6 covor-text1">
                        <form action="javascript:void(0)" class="">
                            <div class="input-group1 d-flex position-relative">
                                <input type="search" onsearch="search_text_m()" class="search-input-m form-control navbar-collapse justify-content-md-end" placeholder="Search…" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="border-radius: 11px;" ><!-- onclick="search(this.value)"xyz -->
                                <div class="input-group-appendq">
                                    <button class="btn btn-secondary search-data-m" type="button"  style="border-radius: 9px;" >
                                        <i class="icomoon-search"><span class="sr-only">search</span></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-1 text-center">
                            <?php 
                                // echo $png['tag']; 
                                $text_data = getValueByColumn($this->tbl_key_desc, 'text_data',['id'=>1]);
                                $text_data = explode(",", $text_data);
                                // print_r($text_data);
                                foreach ($text_data as $key => $value) {
                                    if(empty($value))
                                        continue;
                            ?>
                            <span class="tags-home"><a href="<?php echo base_url('welcome/query/'.trim(ucwords($value))) ?>" class="tags-a"><?php echo trim(ucwords($value)); ?></a></span>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </header>