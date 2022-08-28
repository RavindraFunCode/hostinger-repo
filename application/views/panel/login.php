<!doctype html>
<html lang="en">
<head> 
    <meta charset="utf-8" />
    <title><?php echo APP_NAME; ?> | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/site/lo-go.png')?>"> 
    
    <!-- Bootstrap Css -->
    <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  </head>

  <body  style="background-image: url('<?php echo base_url('assets/admin/farm-field-art-templates.jpeg'); ?>');width: 100%;">
    <div class="account-pages my-5 pt-sm-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                <?php echo $this->session->flashdata('error'); ?>  
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>        
            <?php endif; ?>
            <div class="card overflow-hidden">
              <div class="card-body pt-0">
                <h3 class="text-center mt-5 mb-4">
                  <a href="index.html" class="d-block auth-logo">
                    <img src="<?php echo base_url('assets/site/lo-go.png')?>" alt="" style="height:75px;border-radius: 50%;" class="auth-logo-dark">
                    <img src="<?php echo base_url('assets/site/lo-go.png')?>" alt="" style="height:75px;border-radius: 50%;" class="auth-logo-light">
                  </a>
                </h3>

                <div class="p-3">
                  <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                  <p class="text-muted text-center">Sign in to continue to <?php echo APP_NAME; ?>.</p>
                  <form class="form-horizontal mt-4"  action="<?php echo base_url('farms/login/auth');?>" method="POST" id="forms">
                      <div class="mb-3">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                      </div>
                      <div class="mb-3">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                      </div>
                      <div class="mb-3 row mt-4">
                          <div class="col-6">
                              <div class="form-check">
                              </div>
                          </div>
                          <div class="col-6 text-end">
                              <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                          </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- App js -->
    <script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/notify.js"></script>
    <script>
    $("#forms").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST", 
            url: '<?php echo base_url('panel/login/auth');?>',
            dataType:'json',
            data: $("#forms").serialize(), 
            beforeSend:function()
            {},
            success:function(responce)
            {
              if(responce.status==0)
              {
                $.notify(responce.message, "warn",{arrowSize: 20});
              }else if(responce.status==1)
              {
                $.notify(responce.message, "success",{arrowSize: 20});
                window.location.href=responce.redirect_url;
                //window.location.href='<?php echo base_url();?>farms/dashboard'
              }  
            },
            error:function()
            {
              $.notify("BOOM....!", "error");
            },
            complete:function()
            {
            }
        });
      })
    </script>
    <script type="text/javascript">
      toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
      //  Command: toastr["success"]('hello');
      <?php if($this->session->flashdata('success')){ ?>
         Command: toastr["success"]('<?php echo $this->session->flashdata('success'); ?>');
      <?php } ?>
      <?php if($this->session->flashdata('error')){ ?>
         Command: toastr["error"]('<?php echo $this->session->flashdata('error'); ?>');
      <?php } ?>
      <?php if($this->session->flashdata('info')){ ?>
         Command: toastr["info"]('<?php echo $this->session->flashdata('info'); ?>');
      <?php } ?>
    </script>
  </body>
</html>