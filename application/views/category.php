
    <!-- mainHeadingHead -->
    <!-- <header class="mainHeadingHead position-relative bgCover w-100 d-flex text-white" style="min-height: 0px;">
        <div class="mhhAlignHolder d-flex w-100 align-items-center position-relative">
            <div class="container py-6 covor-text1">
                <form action="javascript:void(0)" class="">
                    <div class="input-group1 d-flex">
                        <input type="text" class="search-input form-control navbar-collapse justify-content-md-end" placeholder="Search…" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" onclick="search(this.value)" oninput="search(this.value)">
                        <div class="input-group-appendq">
                            <button class="btn btn-secondary search-data" type="button">
                                <i class="icomoon-search"><span class="sr-only">search</span></i>
                            </button>
                        </div>
                        <ul class="dropdown-menu" id="result-data" style="width: 90%;">
                            <li class="items">No Category Found...</li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </header> -->
    <!-- shopContentBlock -->
    <section class="shopContentBlock pt-7 pb-7 pb-md-9 pt-lg-10 pb-lg-14 pt-xl-16 pb-xl-22">
        <div class="container-fluid">
            <!-- sorterHead -->
            <div class="row align-items-md-center">
                <div class="col-12 col-md-8">
                    <h1>PNG Hacker's Category</h1>
                </div>
                
            </div>
            <!-- <header class="sorterHead text-center text-md-left text-gray777 mb-7 mb-md-10">
                <div class="row align-items-md-center">
                    <div class="col-12 col-md-8">
                        <p class="m-2 m-md-0">Showing 1-16 of 20 Products</p>
                    </div>
                    <div class="col-12 col-md-4 text-md-right">
                        <select class="chosenSelect csSelect" data-placeholder="Default Shorting">
                            <option value=""></option>
                            <option value="1">A-Z</option>
                            <option value="2">Z-A</option>
                        </select>
                    </div>
                </div>
            </header> -->
            <div class="row">
                <?php 
                    foreach ($category as $key => $value) {
                        $url = base_url('welcome/index/'.$value['slug']."/1");
                        // $url = base_url('welcome/index')."?category=".$value['slug'];
                        // $url = base_url('welcome/pngs/'.$value['slug']);
                        // $url = base_url('welcome/pngs/'.encryptor('encrypt', $value['id']));
                ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <!-- shopItemColumn -->
                    <article class="shopItemColumn position-relative mb-6 mb-lg-9 mb-xl-13 mx-auto">
                        <div class="imgHolder position-relative mb-4 overflow-hidden">
                            <a href="<?php echo $url; ?>" target="_blank" class="all-imgs">
                                <img src="<?php echo base_url('uploads/category/'.$value['category_img']); ?>" class="img-fluid w-100 img-bg-color" alt="image description">
                            </a>
                            <a href="<?php echo $url; ?>" target="_blank" class="sicBtnCart fontAlter font-weight-bold position-absolute btn btn-secondary text-uppercase d-block w-100">View</a>
                        </div>
                        <h3 class="mb-2">
                            <a href="<?php echo $url; ?>" target="_blank"><?php echo $value['category_name'] ?></a>
                        </h3>
                    </article>
                </div>
                <?php } ?>
            </div>
            <!-- btnHolder -->
            <!-- <footer class="btnHolder text-center">
                <a href="single-product.html" class="btn laodMore btn-outline-light bdr2 btnMidMinWidth">Load More</a>
            </footer> -->
        </div>
    </section>

    <script type="text/javascript">
        function search(text){
            $.ajax({
               url:"<?php echo base_url('welcome/search') ?>",
               method:"POST",
               dataType:'html',
               data:{text:text},
               cache:false,
               success:function(response){
                    $("#result-data").html(response);
               }
            });
        }
        $(document).on('click', '.search-data', function(){
            var text = $(".search-input").val();
            if(text!=''){
                var url = "<?php echo base_url('welcome/pngs?png_search=') ?>"+text;
                window.location = url;
            }
        });
    </script>