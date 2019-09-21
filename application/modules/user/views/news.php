<!-- Page content-->

<div class="content-wrapper">

    <h3>User<a href="user/create"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New</button></a></h3>

    <div class="container-fluid">

        <!-- START DATATABLE 1 -->

        <div class="row">

            <div class="col-lg-12">

                <div class="panel panel-default">

                    <div class="panel-body">

                    <table id="datatable1" class="table table-striped table-hover table-body">

                        <thead class="bg-th">

                        <tr class="bg-col">

                        <th class="sr">S.No</th>

                        <th>User Name</th>

                        <th>Phone</th>

                        <th>Designation</th>

                        <th class="" style="width:300px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions</th>

                        </tr>

                        </thead>

                        <tbody>

                                <?php

                                $i = 0;

                                if (isset($news)) {

                                    foreach ($news->result() as

                                            $new) {

                                        $i++;

                                        $edit_url = ADMIN_BASE_URL . 'user/create/' . $new->user_id ;

                                        $delete_url = ADMIN_BASE_URL . 'user/delete/' . $new->user_id;

                                        ?>

                                    <tr id="Row_<?=$new->user_id?>" class="odd gradeX " >

                                        <td width='2%'><?php echo $i;?></td>

                                        <td><?php echo $new->user_name  ?></td>

                                        <td><?php echo $new->phone ?></td>

                                        <td><?php echo $new->designation ?></td>

                                        <td class="table_action">

                                        <a class="btn yellow c-btn view_details" rel="<?=$new->user_id?>"><i class="fa fa-list"  title="See Detail"></i></a>

                                        <?php

                                        echo anchor($edit_url, '<i class="fa fa-edit"></i>', array('class' => 'action_edit btn blue c-btn','title' => 'Edit User'));

                                        echo anchor('"javascript:;"', '<i class="fa fa-times"></i>', array('class' => 'delete_record btn red c-btn', 'rel' => $new->user_id, 'title' => 'Delete user'));
                                        ?>
                                        </td>
                                    </tr>
                                    <?php } ?>    
                                <?php } ?>
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    <!-- END DATATABLE 1 -->
    </div>
</div>    

<script type="text/javascript">

$(document).ready(function(){
    $(document).on("click", ".view_details", function(event){
    event.preventDefault();
    var id = $(this).attr('rel');
    $.ajax({
        type: 'POST',
        url: "<?php ADMIN_BASE_URL?>user/detail",
        data: {'id': id},
        async: false,
        success: function(test_body) {
        var test_desc = test_body;
        $('#myModal').modal('show')
        $("#myModal .modal-body").html(test_desc);
        }
    });
});



    /*///////////////////////// end for code detail //////////////////////////////*/


$(document).off('click', '.delete_record').on('click', '.delete_record', function(e){
    var id = $(this).attr('rel');

    e.preventDefault();
    swal({
        title : "Are you sure to delete the selected user?",
        text : "You will not be able to recover this user!",
        type : "warning",
        showCancelButton : true,
        confirmButtonColor : "#DD6B55",
        confirmButtonText : "Yes, delete it!",
        closeOnConfirm : false
    },
    function () {
           $.ajax({
                type: 'POST',
                url: "<?php echo ADMIN_BASE_URL?>user/delete",
                data: {'id': id},
                async: false,
                success: function() {
                location.reload();
                }
            });
    swal("Deleted!", "user has been deleted.", "success");
  });
});
});

</script>