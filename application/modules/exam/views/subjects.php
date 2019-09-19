<!-- Page content-->
<div class="content-wrapper">
    <h3>
    <?php 
    $urlPath = $this->uri->segment(5);;
    echo ucwords(str_replace('%20',' ',$urlPath));
    ?>
    <a href="<?php echo ADMIN_BASE_URL . 'exam'; ?>"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a></h3>
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
                        <th>Subject Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th class="" style="width:300px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions</th>
                        <!-- <th>Save subjects</th> -->
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                $i = 0;
                                if (isset($subject_list)) {
                                    foreach ($subject_list as $key=>
                                            $new) {
                                        $i++;
                                        $marks_url = ADMIN_BASE_URL . 'exam/marks/' . $new['exam_id'].'/'.$new['subject_id'] . '/' . $new['subject_name'];
                                        $edit_url = ADMIN_BASE_URL . 'exam/subject_edit/' . $new['exam_id'].'/'.$new['subject_id'];
                                        ?>
                                        <td width='2%'><?php echo $i;?></td>
                                        <td><?php echo $new['subject_name']?></td>
                                        <td><?php echo $new['exam_date'] ?></td>
                                        <td><?php echo $new['exam_time'] ?></td>
                                        <td class="table_action">
                                        <?php
                                        echo anchor($marks_url, '<i class="fa fa-pencil"></i>', array('class' => 'action_edit btn blue c-btn','title' => 'Edit Exam Marks'));
                                        echo anchor($edit_url, '<i class="fa fa-pencil-square-o"></i>', array('class' => 'action_edit btn blue c-btn','title' => 'Edit Exam Subject'));
                                        ?>
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
$(document).ready(function() {
        $("#news_file").change(function() {
            var img = $(this).val();
            var replaced_val = img.replace("C:\\fakepath\\", '');
            $('#hdn_image').val(replaced_val);
        });
    });
</script>

