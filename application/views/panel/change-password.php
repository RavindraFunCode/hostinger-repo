
<!-- Default box -->
<div class="card">
<div class="card-header">
    <h3 class="card-title">Change Password</h3>
    <div class="card-tools">
    </div>
</div>
<?php //print_r($users); ?>
<div class="card-body">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">
            <form action="<?php echo base_url('panel/dashboard/updatepassword');?>" method="post" id="forms" enctype="multipart/form-data"> 
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="repeat_password">Repeat Password</label>
                    <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Repeat Password">
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

<script>
$("#forms").submit(function(event) {
        event.preventDefault();
		$.ajax({
	            type: "POST", 
	            url: '<?php echo base_url('panel/dashboard/updatepassword');?>',
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