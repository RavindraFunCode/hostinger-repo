<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4>PNG Image </h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?> </li>
            </ol>
        </div>
    </div>
</div>

<!-- end row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title"><?php echo $title; ?></h4>
                    </div>
                </div>
                <form class="needs-validation" name="event-form" id="forms" novalidate method="post" enctype="multipart/form-data">
                    <div class="row" id="group-row-div">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Key Data</label>
                                <input class="form-control" placeholder="Enter Size Name" type="text" name="text_data" id="text_data" required value="<?php if(!empty($text_data)){ echo $text_data;} ?>"  />
                                <!-- <input type="hidden" name="edit_id" id="edit_id" value="<?php if(!empty($edit_item)){ echo $edit_item->id;} ?>" /> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Category Tags</label>
                                <textarea class="form-control" placeholder="Enter Category Tags" name="category_tags" id="category_tags" required ><?php if(!empty($category_tags)){ echo $category_tags;} ?></textarea>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6"> </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-primary" id="btn-save-event">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<script>
    var custome_base_url = "<?php echo base_url('panel/dashboard/');?>";
    
    $("#forms").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST", 
            url: custome_base_url+'save_key',
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
               toastr.error(responce.message);
              }else if(responce.status==1)
              {
                toastr.success(responce.message);
                <?php 
                    /*if(!empty($edit_item)){ 
                        echo "window.location.href ='".base_url('dashboard/catalogue/size/all')."';";
                    } else{
                        echo "window.location.href = window.location.href;";
                    }*/
                ?>
                
              }
            },
            error:function()
            {
              toastr.error('Something Went Wrong..');
            },
            complete:function()
            {
            }
        });
    });
</script>