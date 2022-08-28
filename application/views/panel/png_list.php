<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
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
        max-width: 30px !important;
        min-width: 30px !important;
    }
    table.dataTable thead>tr>th:nth-of-type(5),
    table.dataTable tbody>tr>td:nth-of-type(5) {
        max-width: 30px !important;
        min-width: 30px !important;
    }
    /*table.dataTable thead>tr>th:nth-of-type(5),
    table.dataTable tbody>tr>td:nth-of-type(5) {
        max-width: 27px !important;
        min-width: 27px !important;
    }
    table.dataTable thead>tr>th:nth-of-type(4),
    table.dataTable tbody>tr>td:nth-of-type(4) {
        max-width: 27px !important;
        min-width: 27px !important;
    }*/
    /*table.dataTable thead>tr>th:nth-of-type(3),
    table.dataTable tbody>tr>td:nth-of-type(3) {
        max-width: 27px !important;
        min-width: 27px !important;
    }*/
    .bootstrap-tagsinput .tag {
        color: black;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4>PNG Image</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active">PNG Image</li>
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
                <h4 class="card-title">PNG Image List</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>PNG</th>
                            <th>Name</th>
                            <th>Tags</th>
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
                <h5 class="modal-title" id="modal-title">Save PNG Image</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-hidden="true"></button>

            </div>
            <div class="modal-body p-4">
                <form class="needs-validation" name="event-form" id="forms" novalidate method="post" enctype="multipart/form-data">
                    <div class="row" id="group-row-div">
                        <div class="col-8">
                            <div class="mb-3">
                                <label class="form-label">Attach Image</label>
                                <input class="form-control" type="file" name="image" id="image_name" required onchange="show_image(event)" />
                                <input type="hidden" name="old_img" value="" id="old_img">
                            </div>
                        </div>
                        <div class="col-4 show_img">
                            <div class="mb-3">
                                <label class="form-label">Image Preview</label>
                                <img src="" title="attach image" style="width: 50%;" id="load_img" class="form-control ">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Image Name</label>
                                <input class="form-control" placeholder="Enter Image Name" type="text" name="name" id="name" required value=""  />
                                <input type="hidden" name="edit_id" id="edit_id" value="" />
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Image Tags</label>
                                <textarea class="form-control" name="tag" id="tag" data-role="tagsinput" placeholder="Enter Image Tags"></textarea>
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
    // var description = CKEDITOR.replace('description');
    /*description.on('change', function(ev) {
        console.log(CKEDITOR.instances['description'].getData());
    });*/
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
            localStorage.setItem( 'dt', JSON.stringify(oData) );
            console.log(localStorage.getItem( 'dt'));

        },
        "fnStateLoad": function (oSettings) {
            return JSON.parse( localStorage.getItem('dt') );
        },
        "ajax" :{
            url:"<?php echo base_url('panel/pngimage/get_list');?>",
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
            $(".show_img").hide();
        }else{
            $("#show-modal").modal('hide');
        }
        $("#forms")[0].reset();
        $("#edit_id").val('');
        _selectOption("#category_Id", 0);
    }
    function edit(editid) {
        $.ajax({
            type: "POST", 
            url: '<?php echo base_url('panel/pngimage/edit');?>',
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
                var d = responce.edit_data;
                $("#edit_id").val(d.id);

                $("#old_img").val(d.image);
                $("#load_img").attr('src', '<?php echo base_url('uploads/png-thumb/');?>'+d.image);
                $(".show_img").show();
                $("#name").val(d.name);
                $("#tag").val(d.tag);
                _selectOption("#_status", responce.edit_data.disabled);
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
              if(responce.status==0)
              {
               toastr.error(responce.message);
              }else if(responce.status==1)
              {
                show_modal(0);
                toastr.success(responce.message);
                fill_datatable();                
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
        $('#delete_url').val('<?php echo base_url('panel/pngimage/delete_item');?>');
        $('#deleteModal').modal('show');
    }
    
</script>


          