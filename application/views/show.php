<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6178541ce87608001264615a&product=inline-share-buttons" async="async"></script>

<?php $a='a'; if($a=='b'){ ?>
	<!-- mainHeadingHead -->
    <header class="mainHeadingHead position-relative bgCover w-100 d-flex d-md-none  text-white" style="min-height: 0px;">
        <!-- style="background-image: url(<?php echo base_url(); ?>assets/site/banner-new.png);" -->
        <div class="mhhAlignHolder d-flex w-100 align-items-center position-relative">
            <div class="container py-6 covor-text1">
               
                <form action="javascript:void(0)" class="">
                    <div class="input-group1 d-flex position-relative">
                        <input type="text" class="search-input form-control navbar-collapse justify-content-md-end" placeholder="Search…" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" onclick="search(this.value)" oninput="search(this.value)">
                        <div class="input-group-appendq">
                            <button class="btn btn-secondary search-data" type="button">
                                <i class="icomoon-search"><span class="sr-only">search</span></i>
                            </button>
                        </div>
                        <ul class="dropdown-menu result-data" id="result-data" style="width: 100%;position: absolute;will-change: transform;top: 100%;left: 0px;">
                            <li class="items">No Category Found...</li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </header>
<?php } ?>
	<!-- productContentBlock -->
	<article class="productContentBlock pt-7 pt-md-9 pt-lg-13 pt-xl-10">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-12 col-md-6">
					<img src="<?php echo getPNGImageURL('uploads/png-thumb/'.$png['image']); ?>" class="imgbg p-2 img-bg-color1" alt="<?php echo $png['tag']; ?>">
						<h1 class="h2Medium mb-1 text-center" style="word-break: break-all; font-family: inherit; font-size: 18px" ><?php echo ucwords($png['name']); ?> Free Download</h1>
				</div>
				<div class="col-12 col-md-6">
					<!-- prDecriptionWrap -->
					<div class="prDecriptionWrap pl-xl-10">
					    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2759346348826079" crossorigin="anonymous"></script>
						<!-- display01 -->
						<ins class="adsbygoogle"
						     style="display:block"
						     data-ad-client="ca-pub-2759346348826079"
						     data-ad-slot="6220076189"
						     data-ad-format="auto"
						     data-full-width-responsive="true"></ins>
						<script>
						     (adsbygoogle = window.adsbygoogle || []).push({});
						</script>
				<?php
				   $url1 = getPNGImageURL('uploads/png/'.$png['image']);
                     $img_info = getimagesize($url1);
				?>
				
						<p class="mb-4">You Can Free Download Png Images Free Download <?php echo $png['name']; ?> The Image's Backgroud is Transparent And In PNG (Portable Network Graphics) Format.</p>
						<p><a href="https://creativecommons.org/licenses/by-nc/4.0/">Licenses</a></p>
						<p>Non-Commercial use</p>
						<p>Dimension: <?php echo "$img_info[0]"?>px <strong>X</strong> <?php echo "$img_info[1]"?>px </p>
				<!--		 <p>Download File Size: <?php echo filesize(getPNGImageURL('uploads/png/'.$png['image']));  ?></p> -->
						<!-- carterWrap -->
					<div class="carterWrap d-sm-flex mb-6 mb-md-10">
							<button type="button" id = "download-file" class="btn btn-success rounded btnMidMinWidth ">Download this PNG</button>

                            <a href="<?php echo getPNGImageURL('uploads/png/'.$png['image']) ?>" id = "download" class="btn btn-success rounded btnMidMinWidth " download="PNGImage_<?php echo $png['image'] ?>" style = "visibility: hidden;">Ready to Download</a>
                         
						</div>
<!--						<div class="d-flex position-relative">
							btnShare
							<div class="sharethis-inline-share-buttons"></div>
							
						</div>-->
						<div class="mt-1">
							<h2>Tags</h2>
							<?php 
								
								$tags = explode(",", $png['tag']);
								
								foreach ($tags as $key => $value) {
									if(empty($value))
										continue;
							?>
							<span class="tags"><a href="<?php echo base_url('welcome/query/'.trim(ucwords($value))) ?>" class="tags-a"><?php echo trim(ucwords($value)); ?></a></span>
							<?php 
								}
							?>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</article>
	<!-- onlineShopBlock -->
	<section class="onlineShopBlock pt-3 pb-5 pt-lg-6 pb-lg-10 pt-xl-9 pb-xl-15">
		<div class="container-fluid">
			<!-- topHeadingHead -->
			<header class="topHeadingHead mb-8">
				<h2 class="h2Medium">Related Images</h2>
			</header>
			<div class="row grid">
                <div class="grid-sizer"></div>
				<?php 
                    foreach ($latest as $key => $value) {
                    	$url = getPNGImageURL('uploads/png-thumb/'.$value['image']);
                    	$img_info = getimagesize($url);
                ?>
                <div class="grid-item" >
                    <a href="<?php echo base_url().'welcome/show/'.$value['slug'] ?>" ><!-- target="_blank" -->
                        <div class="img_box p-2">
                          <img  class="lozad"  data-src="<?=$url?>" style="width:<?php echo $img_info[0]; ?>px ; height: <?php echo $img_info[1]; ?>px ;" >
                        </div>
                        <div class="dt-box">
                            <h3 class="image-name"><?php echo $value['name'] ?></h3>
                        </div>
                    </a>
                </div>
				<?php } ?>
				
			</div>
		</div>
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2759346348826079"
     crossorigin="anonymous"></script>
    <ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-6t+ed+2i-1n-4w"
     data-ad-client="ca-pub-2759346348826079"
     data-ad-slot="9149114558"></ins>
     <script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</section>

	<script type="text/javascript">
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
	        imagegalleryJS();
	    });
	    
	</script>
	
	<script type="text/javascript">
    // Total seconds to wait
   var seconds = 07;

    var downloadButton = document.getElementById("download-file");
    var download1 = document.getElementById("download");
    

    downloadButton.addEventListener("click", download_button_event);
     var newElement = document.createElement("p");
     

    function download_button_event() {

       
        newElement.id = "countdown_seconds";
        newElement.innerHTML = "Automatically file will be downloaded in 07 seconds.";

        downloadButton.parentNode.replaceChild(newElement, downloadButton);
        
        download_timer();

    }

    function download_timer() {

        seconds = seconds - 1;

        if (seconds < 0) {
            // Download link

download1.parentNode.replaceChild(download, newElement);
           download1.style.visibility= "visible";
           
        } else {

            // Update remaining seconds
            document.getElementById("countdown_seconds").innerHTML = "Please wait " + seconds + " seconds.";
            // Countdown wait time is 1 second
            window.setTimeout("download_timer()", 1000);
        }
    }
    
    /*var observer = lozad('.lozad', {
        threshold: 0.1,
        enableAutoReload: true,
        load: function(el) {
            el.src = el.getAttribute("data-src");
            el.onload = function() {
               
            }
        }
    })
  
    window.onload = function () {
        setTimeout(function () {
         
        }, 3000)
    }
    observer.observe();*/
    
    /*function _lazy_load(){
        
    }
    _lazy_load();*/


</script>