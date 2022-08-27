<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<!-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> -->
<style type="text/css">
    .show_img{
        display: none;
    }
    .bootstrap-tagsinput .tag {
        color: black;
    }
    .single-rows {
        margin-bottom: 10px;
        border-radius: 10px;
        padding: 10px;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4>PNG Image </h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active">Add PNG Image </li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->
<!-- end row -->
<div class="row">
    
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Upload PNG Image</h4>
                <form class="needs-validation" name="event-form" id="forms" novalidate method="post" enctype="multipart/form-data">
                    <div class="row" id="group-row-div">
                        
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">PNG Images</label>
                                <input type="file" class="form-control" name="images[]" id="images" multiple onchange="showImages(event)" />
                            </div>
                        </div>
                        <div class="col-lg-9 ">
                            <label>Tags</label>
                            <textarea id="all_tags" class="form-control" placeholder="Enter Tags"></textarea>
                        </div>
                        <div class="col-lg-3 ">
                            <button type="button" class="btn btn-info" id="apply-tag-btn" style="margin-top:30px;">Apply Tags to all</button>
                        </div>
                        <div class="form-group img-preview">
                            <!-- <div class="row">
                                <div class="col-lg-4 ">
                                    <img src="<?php echo base_url(); ?>uhdAdmin/images/uploading.gif" class="img-fluid img-thumbnail" width="75%"  />
                                    <span class="img-caption">Uploading</span>
                                </div>
                                <div class="col-lg-8 ">
                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <label>Name</label>
                                            <textarea name="name[]" class="form-control" placeholder="Enter Image Name"></textarea>
                                            <input type="text" name="name[]" class="form-control" placeholder="Enter Image Name">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label>Tags</label>
                                            <input type="text" name="tag[]" class="form-control" placeholder="Enter Image Tag">
                                        </div>
                                        <div class="col-lg-12 ">
                                            <label>Description</label>
                                            <textarea name="description[]" class="form-control" placeholder="Enter Image Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                        </div>
                        
                    </div>
                    <div class="row mt-2">
                        <div class="col-6"> 
                            <img src="<?php echo base_url(); ?>uhdAdmin/images/uploading.gif" class="float-right m-l-10 uploader" width="30%" id="imgup" style="display: none;" />
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-primary" id="btn-save-event">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
    
<script>
    var start = 1;
    var cat_tags = '';
    var file_length = 0;
    var names_arr = [];
    // var description = CKEDITOR.replace('description');
    function showImages(event) {
        var html = '';
        var description_section = '';//<div class="col-lg-12 "> <label>Description</label>  <textarea name="description[]" class="form-control" placeholder="Enter Image Description" id="description'+i+'"></textarea> </div>
        file_length = event.target.files.length;
        for (var i = 0; i < event.target.files.length; i++) {
            var imgname = event.target.files[i].name;
            // if(imgname.match(/.png/)==".png")
                imgname = imgname.replace(/.{0,4}$/, '');
            if(cat_tags==null)
                cat_tags='';
            
            html += '<div class="row single-rows"><div class="col-lg-4 "><img src="'+URL.createObjectURL(event.target.files[i])+'" class="img-fluid img-thumbnail" width="75%"  /><br><span class="img-caption">Status:Pending to Upload</span></div><div class="col-lg-8 "><div class="row"><div class="col-lg-12 "><label>Name</label><textarea name="name[]" id="name'+i+'" class="form-control" placeholder="Enter Image Name" rows="4" >'+imgname+'</textarea></div> <div class="col-lg-12 "><label>Tags</label><input type="text" data-role="tagsinput" name="tag[]" value="'+cat_tags+'" id="tag'+i+'" class="form-control categories-tags" placeholder="Enter Image Tag"></div>'+description_section+'</div> </div></div>';
            //<a href="javascript:void(0)" class="paste-btn btn-info">Paste</a>
            //<textarea name="tag[]" id="tag'+i+'" class="form-control categories-tags" placeholder="Enter Image Tag" rows="4">'+cat_tags+'</textarea>
            //<input type="text" name="name[]" id="name'+i+'" class="form-control" placeholder="Enter Image Name" value="'+imgname+'">
        }
        $(".img-preview").html(html);
        $(".categories-tags").next("div").find('input').tagsinput({
          trimValue: true,
          tagClass: 'tags-field',
          allowDuplicates: false
        });
    }
    $(".categories-tags").next("div").find('input').tagsinput({
      trimValue: true,
      tagClass: 'tags-field',
      allowDuplicates: false
    });
    $("#forms").submit(function(event) {
        event.preventDefault();
        var totalfiles = document.getElementById('images').files.length;
        /*if($("#category_Id").val()==0){
            toastr.error("Please Select Category");
            return false;
        }*/
        if(totalfiles > 0 ){
            uploading(true);
            sendData(0);
        }
    });
    function sendData(key_index){
        key_index = parseInt(key_index);
        var formData = new FormData();
        formData.append("image", document.getElementById('images').files[key_index]);
        formData.append("name", $("#name"+key_index).val());
        formData.append("tag", $("#tag"+key_index).val());
        // formData.append("description", $("#description"+key_index).val());
        // formData.append("category_Id", $("#category_Id").val());
        var this_row = $("#name"+key_index).parents(".single-rows");
        $.ajax({
            type: "POST", 
            url: '<?php echo base_url('panel/pngimage/save');?>',
            dataType:'json',
            data: formData, 
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function()
            {},
            success:function(responce)
            {
                // console.log(responce);
                try{
                    if(responce.status==0)
                    {
                        toastr.error(responce.message);
                        this_row.css('background-color', 'indianred');
                        this_row.find('.img-caption').html("Status: "+$("#name"+key_index).val()+" Failed to Upload");
                    }else if(responce.status==1)
                    {
                        toastr.success(responce.message);
                        this_row.css('background-color', 'seagreen');
                        this_row.find('.img-caption').html("Status: "+$("#name"+key_index).val()+" Image Uploaded");
                    }
                }catch(e){
                    toastr.error(responce.message);
                }
                var next_item = document.getElementById('images').files[key_index+1];
                if(next_item){
                    sendData(parseInt(key_index)+1);
                } else{
                    $("#forms")[0].reset();
                    uploading(false);
                    // setTimeout(function(){ window.location = "<?php //echo base_url('admin/pageload/pngUploads');?>"; }, 1000);
                }
            },
            error:function()
            {
              toastr.error('Something Went Wrong..');
              var next_item = document.getElementById('images').files[key_index+1];
                if(next_item)
                    sendData(parseInt(key_index)+1);
            },
            complete:function()
            {
            }
        });
    }

    /*$(document).on("click", "paste-btn", function(){
        console.log("jquery");
    });

    document.getElementById("paste-btn").addEventListener("click", ()=>{
        console.log("js");
        let pasteArea = document.getElementByClass("categories-tags");
        pasteArea.value='';

        navigator.clipboard.readText()
        .then((text)=>{
            pasteArea.value = text;
        });
    });*/

    function uploading(status){
        if(status){
            $("#imgup").css("display", "block");
            $("#upbtn").hide();
        }else{
            $("#imgup").css("display", "none");
            $("#upbtn").show();
        }
    }
    
    $(document).on("click", "#apply-tag-btn", function(){
        var tags = $("#all_tags").val();
        tags_arr = tags.split(",").map(element => element.trim()).filter(element => element !== '');
        
        if(tags_arr.length<=0){
            alert(" No Tags found, Please Enter Tags");
            return false;
        }
        if(file_length<=0){
            alert(" No image Selected, Please Select image");
            return false;
        }
        for (var i = 0; i < file_length; i++) {
            $("#tag"+i).val(shuffle(tags_arr).toString());
        }
    });
    function shuffle(array) {
      let currentIndex = array.length,  randomIndex;
    
      // While there remain elements to shuffle.
      while (currentIndex != 0) {
    
        // Pick a remaining element.
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;
    
        // And swap it with the current element.
        [array[currentIndex], array[randomIndex]] = [
          array[randomIndex], array[currentIndex]];
      }
    
      return array;
    }
</script>


          