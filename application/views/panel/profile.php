<section class="content">
    <!-- Default box -->
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Profile</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>
    <?php //print_r($users); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
            </div> 
            <div class="col-6">
                <form action="<?php echo base_url('panel/dashboard/updateprofie');?>" method="post" id="forms" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?php echo $users->name; ?>">
                        <input type="hidden" name="edit_id" value="<?php echo $users->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input readonly type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $users->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact</label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact" value="<?php echo $users->contact_no; ?>">
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-info" value="Save">
                    </div>
                    
                </form>
            </div>
        </div>
       
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<script>
$("#forms").submit(function(event) {
        event.preventDefault();
		$.ajax({
	            type: "POST", 
	            url: '<?php echo base_url('panel/dashboard/updateprofie');?>',
	            dataType:'json',
                data: new FormData(this), 
                contentType: false,
                cache: false,
                processData:false,
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
                    location.reload();
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