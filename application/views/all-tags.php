<style type="text/css">
    .mt-1 .tags-home a {
        color: #141313;
        text-decoration: none;
    }
</style>
<article class="ourMissionBlock  pb-3 pb-md-9  pb-lg-13  pb-xl-22"><!-- pt-6 pt-md-9 pt-lg-12 pt-xl-20 -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 offset-md-2x">
                <div class="px-xl-5">
                    <!-- headingHead -->
                    <header class="headingHead text-center">
                        <h1 class="mb-3"><?php echo $title; ?></h1>
                        <div class="eabDescrText eabDescrTextII text-gray888 fontSerif">
                            <div class="mt-1">
                                <?php 
                                    // echo $png['tag']; 
                                    // $text_data = getValueByColumn($this->tbl_key_desc, 'text_data',['id'=>1]);
                                    // $text_data = implode(",", $all_tags);
                                    // print_r($text_data);
                                    foreach ($all_tags as $key => $value) {
                                        if(empty($value))
                                            continue;
                                ?>
                                <span class="tags"><a href="<?php echo base_url('welcome/query/'.trim(ucwords($value))) ?>" class="tags-a"><?php echo trim(ucwords($value)); ?></a></span>
                                <?php 
                                    }
                                ?>
                                <!-- <span class="tags-home"><a href="https://pngimages.in/welcome/query/Celebrities" class="tags-a">Celebrities 1</a></span>
                                <span class="tags-home"><a href="https://pngimages.in/welcome/query/Celebrities" class="tags-a">Celebrities 2</a></span>-->
                            </div>
                        </div>
                    </header>
                </div>
            </div>
        </div>
    </div>
</article>