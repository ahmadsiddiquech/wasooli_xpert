<?php $this->load->view('front/theme1/header');?> <!--HEADER-->





<!-- PAGE CONTENT PANEL STARTS HERE-->

<section>
	<?php 

        if(!isset($view_file)){
            $viiew_file = '';
        }

        $path = 'front/'.$view_file;

        $this->load->view($path);
    ?>
</section>
<?php $this->load->view('front/theme1/footer');?>