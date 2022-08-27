
    <!-- shopContentBlock -->
    <section class="shopContentBlock pt-7 pb-7 pb-md-9 pt-lg-10 pb-lg-14 pt-xl-16 pb-xl-22">
        <div class="container-fluid">
           
            <div class="row align-items-md-center">
                <div class="col-12 col-md-8">
                    <h1><?php echo $title; ?></h1>
                </div>
                
            </div>
            <div class="row grid image-section">
                <div class="grid-sizer"></div>
                                
            </div>
            <!-- btnHolder -->
            <footer class="btnHolder text-center load_data_message">
                <a href="javascript:void(0)" class="btn btn btn-warning laodMore btn-outline-light bdr2 btnMidMinWidth">Please Wait.....</a>
            </footer>
        </div>
    </section>


<script type="text/javascript">
    var category = '';
    var search = <?php echo !empty($this->uri->segment(3)) ? "'".$this->uri->segment(3)."'" : 0; ?>;
    var page = <?php echo !empty($this->uri->segment(4)) ? "'".$this->uri->segment(4)."'" : 1; ?>;
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
          $.ajax({
           url:"<?php echo base_url('welcome/loadall/') ?>"+page,
           method:"POST",
           dataType:'json',
           data:{page:page, category:category, search:search, load:"query"},
           cache:false,
           success:function(response)
           {
            if(response.status == 0)
            {
                $('.load_data_message').html('');
                $('.image-section').append("<p class='text-center'>No Image Found.....</p>");
            } else  {
                // $('.image-section').append(response.html);
                // $('.load_data_message').html(response.pagination);
                var url = response.url, thumb_url = response.thumb_url, html = '';
                var images = response.images;
                var pagination = response.pagination;
                for (var i = 0; i < images.length; i++) {
                    
                    html +=' <div class="grid-item col-sm-12 col-md-4"> <a href="'+url+images[i].slug+'"> <div class="img_box p-2" style=" height:'+images[i].height+'px; " > <img alt="'+images[i].tag+'" class="lozad" data-src="'+thumb_url+images[i].image+'"/> </div><div class="dt-box"> <h1 class="image-name" style="font-size:15px;text-transform: capitalize;">'+images[i].name+'</h1> </div></a> </div>';
                }
                $('.image-section').append(html);
                $('.load_data_message').html(pagination);
            }
           },
           complete:function(){
           
            imagegalleryJS();
            _lazy_load12();
           }
          });

        }
    });
   
</script>