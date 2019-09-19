<div class="page-content-wrapper">
  <div class="page-content"> 
    <div class="content-wrapper">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3>
        <?php 
        if (empty($update_id)) 
                    $strTitle = 'Add exam Subject';
                else 
                    $strTitle = 'Edit exam Subject';
                    echo $strTitle;
                    ?>
                    <a href="<?php echo ADMIN_BASE_URL . 'exam/subjects/'.$this->uri->segment('4');?>"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a>
       </h3>             
            
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless">
          <div class="tab-content">
          <div class="panel panel-default" style="margin-top:-30px;">
         
            <div class="tab-pane  active" >
              <div class="portlet box green ">
                
                <div class="portlet-body form " style="padding-top:15px;"> 
                  
                  <!-- BEGIN FORM-->
                        <?php
                        // print_r($news);exit();
                        $attributes = array('autocomplete' => 'off', 'id' => 'form_sample_1', 'class' => 'form-horizontal');
                        if (empty($update_id)) {
                            $update_id = 0;
                        } else {
                            $hidden = array('hdnId' => $update_id, 'hdnActive' => $news['status']); ////edit case
                        }
                        if (isset($hidden) && !empty($hidden))
                            echo form_open_multipart(ADMIN_BASE_URL . 'exam/submit_subject_edit/' . $this->uri->segment('4').'/'. $this->uri->segment('5'), $hidden);
                        else
                            echo form_open_multipart(ADMIN_BASE_URL . 'exam/submit_subject_edit/' . $this->uri->segment('4').'/'. $this->uri->segment('5'), $attributes);
                        ?>
                  <div class="form-body">
                    
               <div class="row" style="margin-top:15px;">
                       <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                                                        $data = array(
                                                        'name' => 'subject_name',
                                                        'id' => 'subject_name',
                                                        'class' => 'form-control',
                                                        'type' => 'text',
                                                        'readonly' => 'true',
                                                        'required' => 'required',
                                                        'tabindex' => '1',
                                                        'value' => $news['subject_name'],
                                                        'data-parsley-maxlength'=>TEXT_BOX_RANGE
                                                        );
                                                        $attribute = array('class' => 'control-label col-md-4');
                                                        ?>
                                                        
                          <?php echo form_label('Subject Name<span style="color:red">*</span>', 'subject_name', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?>  <span id="message"></span></div>
                        </div>
                      </div>

                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                                                        $data = array(
                                                        'name' => 'total_marks',
                                                        'id' => 'total_marks',
                                                        'class' => 'form-control',
                                                        'type' => 'number',
                                                        'required' => 'required',
                                                        'tabindex' => '1',
                                                        'value' => $news['total_marks'],
                                                        'data-parsley-maxlength'=>TEXT_BOX_RANGE
                                                        );
                                                        $attribute = array('class' => 'control-label col-md-4');
                                                        ?>
                                                        
                          <?php echo form_label('Total Marks<span style="color:red">*</span>', 'total_marks', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?>  <span id="message"></span></div>
                        </div>
                      </div>
                      </div>
                    <div class="row">
                      <div class="col-sm-5">
                        <div class="form-group">
                          <?php
                                                        $data = array(
                                                        'name' => 'exam_date',
                                                        'id' => 'exam_date',
                                                        'class' => 'form-control datetimepicker2',
                                                        'type' => 'text',
                                                        'placeholder' => 'Select Date',
                                                        'tabindex' => '6',
                                                        'required' => 'required',
                                                        'data-parsley-maxlength'=>TEXT_BOX_RANGE,
                                                       'value' => $news['exam_date'],
                                                        );
                                                        $attribute = array('class' => 'control-label col-md-4');
                                                        ?>
                          <?php echo form_label('Exam Date<span style="color:red">*</span>', 'exam_date', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div><div class="col-sm-5">
                        <div class="form-group">
                          <?php
                                                        $data = array(
                                                        'name' => 'exam_time',
                                                        'id' => 'exam_time',
                                                        'class' => 'form-control datetimepicker4',
                                                        'type' => 'text',
                                                        'placeholder' => 'Select Time',
                                                        'tabindex' => '6',
                                                        'required' => 'required',
                                                        'data-parsley-maxlength'=>TEXT_BOX_RANGE,
                                                       'value' => $news['exam_time'],
                                                        );
                                                        $attribute = array('class' => 'control-label col-md-4');
                                                        ?>
                          <?php echo form_label('Exam Time<span style="color:red">*</span>', 'exam_time', $attribute); ?>
                          <div class="col-md-8"> <?php echo form_input($data); ?> </div>
                        </div>
                      </div>
                      
                    </div>
                </div>
                </div>



                  <div class="form-actions fluid no-mrg">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-offset-2 col-md-9" style="padding-bottom:15px;">
                       <span style="margin-left:40px"></span> <button type="submit" id="button1" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Save</button>
                        <a href="<?php echo ADMIN_BASE_URL . 'exam/subjects/'.$this->uri->segment('4'); ?>">
                        <button type="button" class="btn green btn-default" style="margin-left:20px;"><i class="fa fa-undo"></i>&nbsp;Cancel</button>
                        </a> </div>
                    </div>
                  </div>
                </div>
                
                <?php echo form_close(); ?> 
                <!-- END FORM--> 
                
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<script>

    $(document).ready(function() {
        $("#news_file").change(function() {
            var img = $(this).val();
            var replaced_val = img.replace("C:\\fakepath\\", '');
            $('#hdn_image').val(replaced_val);
        });
    });



</script>