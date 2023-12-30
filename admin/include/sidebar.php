<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <strong class="brand-text font-weight-light " style="text-decoration: none;" >AdminLTE</strong>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="admin_profile.php" class="d-block text-decoration-none"><b>Jayanta Pal</b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
        <li class="nav-header">Settings</li>
        <li class="nav-item">
            <a href="admin_profile.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="registered.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Registered Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="product.php" class="nav-link">
            <i class="fab fa-product-hunt"></i>
              <p>
                  &nbsp&nbsp Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="all_order.php" class="nav-link">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i><p>
                  &nbsp&nbsp Orders
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>