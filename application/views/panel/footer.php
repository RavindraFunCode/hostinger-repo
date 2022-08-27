                 </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div> 
        <footer class="footer">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-12">
                      © <script>document.write(new Date().getFullYear())</script> <?php echo APP_NAME; ?> <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by SSAK.</span>
                  </div>
              </div>
          </div>
        </footer>          
      <!-- end main content-->
    </div>
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger">
              <h5 class="modal-title" id="myModalLabel">Confirm Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
          </div>
          <div class="modal-body">
            <p>are you sure you want to delete this?</p>
            <input type="hidden" id="delete_id">
            <input type="hidden" id="delete_url">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary waves-effect waves-light"onclick="confirm_delete();">OK</button>
          </div>
        </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- END layout-wrapper -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- JAVASCRIPT -->
      
    
    <!-- <script src="<?php echo base_url(); ?>assets/admin/js/pages/form-advanced.init.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/pages/form-advanced.init.js"></script>
    
    
    <script type="text/javascript">
      $(document).ready(function () {
          $('#datatable').DataTable();
      });
    </script>
    <script type="text/javascript">
      function confirm_delete()
      {
        let delete_id=$('#delete_id').val();
        let delete_url=$('#delete_url').val();
        $.ajax({
          type: "POST", 
          url: delete_url,
          dataType:'json',
          data: {'delete_id':delete_id}, 
          beforeSend:function()
          {},
          success:function(responce)
          {
            if(responce.status==0)
            {
              $.notify(responce.message, "warn",{arrowSize: 20});
            }else if(responce.status==1)
            {
              $('#deleteModal').modal('hide');
              $.notify(responce.message, "success",{arrowSize: 20});
              // location.reload();
              fill_datatable();
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

      }
      
    function _selectOption(selecter, vals){
        $(selecter).find('option').each(function(){
            var row = $(this);
            if(row.attr('value')==vals)
                row.attr('selected', 'selected');
            else
                row.removeAttr('selected');
        });
    }
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

      <?php if($this->session->flashdata('update')){ ?>
         Command: toastr["success"]('<?php echo $this->session->flashdata('update'); ?>');
      <?php } ?>

      <?php if($this->session->flashdata('error')){ ?>
         Command: toastr["error"]('<?php echo $this->session->flashdata('error'); ?>');
      <?php } ?>

      <?php if($this->session->flashdata('info')){ ?>
         Command: toastr["info"]('<?php echo $this->session->flashdata('info'); ?>');
      <?php } ?>

      $(function () {
       $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
    </body>
</html>