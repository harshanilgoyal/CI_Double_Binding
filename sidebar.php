<!-- Side Navbar -->

<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="dp/<?php echo $_SESSION['id'] ?>
.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $_SESSION['name']?></h2><span><?php echo $_SESSION['des'] ?></span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>G</strong><strong class="text-primary">S</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li ><a href="index.php"> <i class="icon-home"></i>Home                             </a></li>
            <li ><a href="inside.php"> <i class="fa fa-plus"></i>New Proposal                             </a></li>
            <li ><a href="#"> <i class="fa fa-database"></i>View Proposals                             </a></li>
            
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Edit Database</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Modules</a></li>
                <li><a href="#">Inverters</a></li>
                <li><a href="#">Structure</a></li>
              </ul>
            </li>

            <li><a href="login.php?logout=1"> <i class="fa fa-sign-out"></i>LogOut                             </a></li>
            </ul>
        </div>
        
    </nav>