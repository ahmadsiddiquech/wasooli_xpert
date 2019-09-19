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

      
         <li class="<?php if($curr_url == 'dashboard'){echo 'active';}    ?>">
                <a href="<?php $controller='dashboard'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-home"></em>
                   <span>Dashboard</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'cashier'){echo 'active';}    ?>">
              <a href="<?php $controller='cashier'; 
              echo ADMIN_BASE_URL . $controller ?>">
             <em class="fa fa-users"></em>
                <span>Cashier</span>
             </a>
          </li>
          <li class="<?php if($curr_url == 'customer'){echo 'active';}    ?>">
                <a href="<?php $controller='customer'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-flag"></em>
                   <span>Customer</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'user_log'){echo 'active';}    ?>">
                <a href="<?php $controller='user_log'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-calendar"></em>
                   <span>User Log</span>
                </a>
          </li>
       </ul>
       <!-- END sidebar nav-->
    </nav>
 </div>
 <!-- END Sidebar (left)-->
</aside>




