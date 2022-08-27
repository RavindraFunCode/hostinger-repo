
    <!-- shopContentBlock -->
    <section class="shopContentBlock pt-7 pb-7 pb-md-9 pt-lg-10 pb-lg-14 pt-xl-16 pb-xl-22">
        <div class="container-fluid">
            <!-- sorterHead -->
            
            <div class="row align-items-md-center">
                <div class="col-12 col-md-12 mt-1">
                    <h1 style=" font-size: 26px;"><?php echo $title; ?></h1>
                    <?php for ($i=0; $i < 0; $i++) { 
                        ?>

                    <span class="tags-home"><a href="https://love2png.com/welcome/query/Celebrities" class="tags-a">Celebrities <?php echo $i; ?></a></span>
                    <?php } ?>
                </div>
                
            </div>
            <div class=" grid image-section">
                <div class="grid-sizer"></div>
                
            </div>
            <!-- btnHolder -->
            <footer class="btnHolder text-center load_data_message">
                <a href="javascript:void(0)" class="btn btn btn-warning laodMore btn-outline-light bdr2 btnMidMinWidth">Please Wait.....</a>
            </footer>
        </div>
    </section>

    <script type="text/javascript">
        var page, category, search='';
        var seg3 = <?php echo !empty($this->uri->segment(3)) ? "'".$this->uri->segment(3)."'" : 0; ?>;
        var seg4 = <?php echo !empty($this->uri->segment(4)) ? "'".$this->uri->segment(4)."'" : "'Not'"; ?>;
        if(seg4=='Not'){
            page = seg3;
            category = '';
        }else{
            category = seg3;
            page = seg4;
        }
        /*function getMeta(url, callback) {
            var img = new Image();
            img.src = url;
            img.onload = function() { callback(this.width, this.height); }
        } 
        var _height = 0;*/
        
        $(document).ready(function(){
            var $container = $('#container').masonry(); 
            function imagegalleryJS(){
                // console.log("image loaded");
                var $grid = $('.grid').imagesLoaded( function() {
                  $grid.masonry({
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    columnWidth: '.grid-sizer'
                  }); 
                });
            }
            
            load_data();
            function load_data()
            {
                // console.log(start , limit);
              $.ajax({
               url:"<?php echo base_url('welcome/loadall/') ?>"+page,
               method:"POST",
               dataType:'json',
               data:{page:page, category:category, search:search, load:"index"},
               cache:false,
               success:function(response)
               {
                if(response.status == 0)
                {
                    $('.load_data_message').html('');
                    $('.image-section').append("<p class='text-center'>No Image Found.....</p>");
                    
                } else  {
                    // start = response.endstart;
                    var url = response.url, thumb_url = response.thumb_url, html = '';
                    var images = response.images;
                    var pagination = response.pagination;
                    for (var i = 0; i < images.length; i++) {
                        /*getMeta(
                            thumb_url+images[i].image,
                            function(width, height) { _height = height }
                        );*/
                        html +=' <div class="grid-item col-sm-12 col-md-4"> <a href="'+url+images[i].slug+'"> <div class="img_box p-2" style=" height:'+images[i].height+'px; " > <img alt="'+images[i].tag+'" class="lozad" data-src="'+thumb_url+images[i].image+'"/> </div><div class="dt-box"> <h1 class="image-name" style="font-size:15px;text-transform: capitalize;">'+images[i].name+'</h1> </div></a> </div>';
                    }
                    $('.image-section').append(html);
                    $('.load_data_message').html(pagination);
                    // action = "inactive";
                }
               },
               complete:function(){
               
                imagegalleryJS();
                _lazy_load12();
                // setTimeout(imagegalleryJS(), 2000);
               }
              });

            }
        });

    </script>