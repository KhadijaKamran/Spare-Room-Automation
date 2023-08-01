<?php 
$pathPrefix="";
if ($pageName!="Dashboard"){
  $pathPrefix="";
}
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $pathPrefix?>index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $pathPrefix?>index.php" class="brand-link">
      <center><img width=220 height=125 src="logo.png" alt="HMOFLOW Logo"/></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="<?php echo $pathPrefix?>spareroom_account_update.php" class="nav-link">
            <i class="fa fa-user nav-icon"></i>
              <p>
                SpareRoom Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Preferences
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $pathPrefix?>ad_refresh_settings.php" class="nav-link">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Ads Renew Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $pathPrefix?>messages_settings.php" class="nav-link">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Messages Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $pathPrefix?>area_settings.php" class="nav-link">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Area Settings</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo $pathPrefix?>stats.php" class="nav-link">
            <i class="fa fa-chart-line nav-icon"></i>
              <p>
                Statistics
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo $pathPrefix?>logs.php" class="nav-link">
            <i class="fa fa-clipboard-list nav-icon"></i>
              <p>
                Logs
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo $pathPrefix?>logout.php" class="nav-link">
            <i class="fa fa-sign-out-alt nav-icon"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>