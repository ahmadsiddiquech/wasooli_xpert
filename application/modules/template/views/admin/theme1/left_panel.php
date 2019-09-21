<?php    
	$curr_url = $this->uri->segment(2);
	$active="active";
  $role_id = $this->session->userdata('user_data')['role_id'];
?>
<!-- sidebar-->
<aside class="aside" >
 <!-- START Sidebar (left)-->
 <div class="aside-inner" >
    <nav data-sidebar-anyclick-close="" class="sidebar">
       <!-- START sidebar nav-->
       <ul class="nav page-sidebar-menu">
          <!-- Iterates over all sidebar items-->

        <?php if($role_id==1){ ?>
        <li class="<?php if($curr_url == 'organizations'){echo 'active';}    ?>">
                <a href="<?php $controller='organizations'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-users"></em>
                   <span>Organizations</span>
                </a>
          </li>
        <?php } elseif ($role_id != 1) { ?>
         <li class="<?php if($curr_url == 'dashboard'){echo 'active';}    ?>">
                <a href="<?php $controller='dashboard'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-home"></em>
                   <span>Dashboard</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'user'){echo 'active';}    ?>">
              <a href="<?php $controller='user'; 
              echo ADMIN_BASE_URL . $controller ?>">
             <em class="fa fa-users"></em>
                <span>User</span>
             </a>
          </li>
          <li class="<?php if($curr_url == 'customer'){echo 'active';}    ?>">
                <a href="<?php $controller='customer'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-user"></em>
                   <span>Customer</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'invoice'){echo 'active';}    ?>">
                <a href="<?php $controller='invoice'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-file-text"></em>
                   <span>Invoice</span>
                </a>
          </li>
        <?php } ?>
       </ul>
       <!-- END sidebar nav-->
    </nav>
 </div>
 <!-- END Sidebar (left)-->
</aside>




