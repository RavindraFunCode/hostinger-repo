<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<!-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> -->
<style type="text/css">
    .show_img{
        display: none;
    }
    .table tbody tr td, .table tbody th td {
        white-space: normal;
        vertical-align: top;
    }

    table.dataTable thead>tr>th,
    table.dataTable tbody>tr>td {
        max-width: 100px !important;
        min-width: 100px !important;
    }

    table.dataTable thead>tr>th:nth-of-type(1),
    table.dataTable tbody>tr>td:nth-of-type(1) {
        max-width: 1px !important;
        min-width: 1px !important;
    }
    table.dataTable thead>tr>th:nth-of-type(2),
    table.dataTable tbody>tr>td:nth-of-type(2) {
        max-width: 40px !important;
        min-width: 40px !important;
    }
    table.dataTable thead>tr>th:nth-of-type(5),
    table.dataTable tbody>tr>td:nth-of-type(5) {
        max-width: 27px !important;
        min-width: 27px !important;
    }
    table.dataTable thead>tr>th:nth-of-type(4),
    table.dataTable tbody>tr>td:nth-of-type(4) {
        max-width: 27px !important;
        min-width: 27px !important;
    }
    .bootstrap-tagsinput .tag {
        color: black;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4>Category</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->
<!-- end row -->
<div class="row">
    
    <div class="col-xl-12">
        <div class="card">
            <div class="col-12 text-center">
                <div class="form-group">
                <a class="form-control btn btn-info" onclick="show_modal()" style="color:white;margin-top: -80px;margin-left: 800px;width: 120px;" href="javascript:void(0)">Add</a>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Category List</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <!-- <th>Image</th> -->
                            <th>Tags</th>
                            <th>Date/Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div class="modal fade" id="show-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0">
                <h5 class="modal-title" id="modal-title">Save Category</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-hidden="true"></button>

            </div>
            <div class="modal-body p-4">
                <form class="needs-validation" name="event-form" id="forms" novalidate method="post" enctype="multipart/form-data">
                    <div class="row" id="group-row-div">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input class="form-control" placeholder="Enter Category Name" type="text" name="category_name" id="category_name" required value=""  />
                                <input type="hidden" name="edit_id" id="edit_id" value="" />
                            </div>
                        </div>
                        <!-- <div class="col-8">
                            <div class="mb-3">
                                <label class="form-label">Attach Category Image</label>
                                <input class="form-control" type="file" name="attach_img" id="attach_img" required onchange="show_image(event)" />
                            </div>
                        </div>
                        <div class="col-4 show_img">
                            <div class="mb-3">
                                <label class="form-label">Image Preview</label>
                                <img src="" title="attach image" style="width: 50%;" id="load_img" class="form-control ">
                                
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Category Tags</label>
                                <input required type="text" value="" name="tags" id="tags" data-role="tagsinput" placeholder="Tags" class="form-control">
                                <!-- <textarea class="form-control" name="tags" id="tags" data-role="tagsinput" placeholder="Enter Category Tags"></textarea> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Category Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Category Description"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control" id="_status" name="disabled">
                                    <option value="0" >Active</option>
                                    <option value="1" >Inactive</option>
                                </select>
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
        </div> <!-- end modal-content-->
    </div> <!-- end modal dialog-->
</div>     
<script>
    var start = 1;
    var description = CKEDITOR.replace('description');
    /*description.on('change', function(ev) {
        console.log(CKEDITOR.instances['description'].getData());
    });*/
    $("#tags").next("div").find('input').tagsinput({
      trimValue: true,
      tagClass: 'tags-field',
      allowDuplicates: false/*,
      typeahead: {
        source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
      },
      freeInput: false*/
    });
    $(function () {
        fill_datatable();
    });
    $('.filter').on('change',function(){
        fill_datatable();
    });
    function fill_datatable()
    {
        $('#datatable').DataTable().destroy();
       var dataTable = $('#datatable').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "searching" : true,
        "bStateSave": true,
        "fnStateSave": function (oSettings, oData) {
            console.log(oSettings, oData);
            localStorage.setItem( 'dt', JSON.stringify(oData) );
        },
        "fnStateLoad": function (oSettings) {
            return JSON.parse( localStorage.getItem('dt') );
        },
        "ajax" :{
            url:"<?php echo base_url('panel/category/get_list');?>",
            type:"POST",
            data:{}
        },
        drawCallback: function(settings) {
            //here you can get response data
            // console.log(settings.json.start);
            // start = settings.json.start
        },
        "filter": true,
        "deferRender": true,
       });
    }
        
    function show_image(event) {
        $("#load_img").attr('src', URL.createObjectURL(event.target.files[0]));
        $(".show_img").show();
    }
    function show_modal(add=1) {
        if(add==1){
            $("#show-modal").modal('show');
        }else{
            $("#show-modal").modal('hide');
        }
        $(".bootstrap-tagsinput").find("span").each(function(){
            $(this).remove();
        });
        $("#forms")[0].reset();
        $("#edit_id").val('');
    }
    function edit(editid) {
        $.ajax({
            type: "POST", 
            url: '<?php echo base_url('panel/category/edit');?>',
            dataType:'json',
            data: {editid:editid},
            beforeSend:function()
            {},
            success:function(responce)
            {
              if(responce.status==0)
              {
               toastr.error(responce.message);
              }else if(responce.status==1)
              {
                show_modal();
                $("#edit_id").val(responce.edit_data.id);
                $("#category_name").val(responce.edit_data.category_name);
                
                // $("#tags").tagsinput(responce.edit_data.tags);
                $("#tags").next("div").find('input').val(responce.edit_data.tags);
                _selectOption("#_status", responce.edit_data.disabled);
                CKEDITOR.instances['description'].setData(responce.edit_data.description);
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
    }
    $("#forms").submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        formData.append("description", CKEDITOR.instances['description'].getData());
        // console.log(formData);
        $.ajax({
            type: "POST", 
            url: '<?php echo base_url('panel/category/save');?>',
            dataType:'json',
            data: formData, 
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
                show_modal(0);
                toastr.success(responce.message);
                fill_datatable();
                /*setTimeout(function(){
                    if($("#edit_id").val()=='')
                        localStorage.removeItem("dt");
                    window.location.href= window.location.href;
                }, 1000);*/
                
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
    function delete_data(delete_id)
    {
        $('#delete_id').val(delete_id);
        $('#delete_url').val('<?php echo base_url('panel/category/delete_item');?>');
        $('#deleteModal').modal('show');
    }
    
</script>


          