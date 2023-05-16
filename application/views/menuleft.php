 <!-- Sidebar -->
        <ul class="navbar-nav  sidebar bg-dark sidebar-dark accordion" id="accordionSidebar" >

        <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>">
    <div class="sidebar-brand-icon rotate-n-15">
     <!-- <i class="fas fa-laugh-wink"></i> -->
  </div>
  <div class="sidebar-brand-text mx-3"> <img src="<?php echo base_url('images');?>/taya_logo.png" width="50"></div>

</a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link txt-w" href="#">
                   <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>ผลิตภัณฑ์ทายะ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active ">

 
          



                <a class="nav-link collapsed txt-w" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>จัดการโปรโมชั่น</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      
                        <a class="collapse-item txt-sm"  href="<?php echo base_url('promotion');?>">รายการโปรโมชั่น</a>
                      
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link txt-w collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>รายการคิวอาร์โค้ด</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       
                        <a class="collapse-item txt-sm" href="<?php echo base_url('qrcode');?>">รายการคิวอาร์โค้ด</a>
                       
                    </div>
                </div>
            </li>

            <!-- Divider -->
       

            <!-- Heading -->
           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link txt-w collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>ตำแหน่งคิวอาร์โค้ด</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      
                        <a class="collapse-item txt-sm" href="<?php echo base_url('location');?>">ตำแหน่งคิวอาร์โค้ดทั้งหมด</a>
                       
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link txt-w" href="<?php echo base_url('userlist');?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>รายการผู้ใช้งาน</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link txt-w" href="<?php echo base_url('logout');?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>ออกจากระบบ</span></a>
            </li>

            <!-- Divider -->
          

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           

        </ul>
        <!-- End of Sidebar -->