
</main>
    <!-- ftAreaWrap -->
    <div class="ftAreaWrap bg-secondary text-gray888">
        <!-- footerAside -->
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
          <!-- Section: Social media -->
          <section
            class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
          >
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
              <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
              <a href="https://www.facebook.com/PNG-hacker-100713109103117" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://pin.it/7jpTjjS" class="me-4 text-reset">
                <i class="fab fa-pinterest"></i>
              </a>
              <a href="https://www.instagram.com/pnghackert/" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
            <!-- Right -->
          </section>
          <!-- Section: Social media -->

          <!-- Section: Links  -->
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas "></i>PNG Images
                  </h6>
                  <p>
                   Welcome to <a href="<?php echo base_url(); ?>" class="text-reset">png images</a> . You Can easily Download Free Png Image With Transparent Background. 
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    LEGAL
                  </h6>
                  <p>
                    <a href="<?php echo base_url('terms-condition'); ?>" class="text-reset">Terms and Condition</a>
                  </p>
                  <p>
                    <a href="<?php echo base_url('privacy-policy'); ?>" class="text-reset">Privacy Policy</a>
                  </p>
                  <!--   <p>
                    <a href="#!" class="text-reset">Orders</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Help</a>
                  </p> -->
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    INFORMATION
                  </h6>
                  <p>
                    <i class="fas fa-envelope me-3"></i>
                    <a href="mailto:contact@pngimages.in">contact@pngimages.in</a>
                  </p>
                  <p>
                    <a href="<?php echo base_url('about-us'); ?>" class="text-reset">About us</a>
                  </p>
                  <p>
                    <a href="<?php echo base_url('contact-us'); ?>" class="text-reset">Contact us</a>
                  </p>
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row -->
            </div>
          </section>
          <!-- Section: Links  -->

          <!-- Copyright -->
          <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            <p class="mb-2"> <a href="<?php echo base_url(); ?>">PNG Images</a> &copy; <?=date("Y")?>. All Rights Reserved</p>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- pageFooter -->
      
    </div>
    </div>
    <!-- include bootstrap popper JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <!-- include bootstrap JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- include custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jqueryCustom.js"></script>
    <!-- include fontawesome kit -->
    <script src="<?php echo base_url(); ?>assets/kit.fontawesome.com/391f644c42.js"></script>
 
    <script type="text/javascript">
        
        $(document).on('click keyup', '.search-data', function(){
            var text = $(".search-input").val();
            if(text!=''){
                var url = "<?php echo base_url('welcome/query/') ?>"+text;
                // var url = "<?php //echo base_url('welcome/pngs?png_search=') ?>"+text;
                window.location = url;
            }
        });
        $(document).on('click keyup', '.search-data-m', function(){
            var text = $(".search-input-m").val();
            if(text!=''){
                var url = "<?php echo base_url('welcome/query/') ?>"+text;
                // var url = "<?php //echo base_url('welcome/pngs?png_search=') ?>"+text;
                window.location = url;
            }
        });
        function search_text(){
            $('.search-data').click();
        }
        function search_text_m(){
            $('.search-data-m').click();
        }
        function _lazy_load12(){
            var observer = lozad('.lozad', {
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
            observer.observe();
        }
       
        _lazy_load12();
                 // Initialize library
 
    

    </script>
    
</body>

</html>