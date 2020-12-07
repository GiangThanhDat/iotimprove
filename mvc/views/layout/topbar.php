
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" ng-controller="PhanQuyenNguoiDungController">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>  
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="">
            <!-- <i class="far fa-bell"></i>   -->
            <i class="fas fa-cog"></i>
            <!-- drop icon -->
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <span class="dropdown-item dropdown-header"></span> -->
            <div class="dropdown-divider"></div>
            <a href="NhanSu/CaNhan" class="dropdown-item">
              <!-- avartar của người quản lý -->
              <!-- <i class="fas fa-envelope mr-2"> -->
                <i class="fas fa-user mr-2"></i>
              </i> 
              Thông tin cá nhân
              <span class="float-right text-muted text-sm"></span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="NhanSu/PhanQuyen" ng-show="checkRoles('Cài đặt & phân quyền')" class="dropdown-item">
              <i class="fas fa-users-cog mr-2"></i>
              Cài đặt & phân quyền
              <!-- <span class="float-right text-muted text-sm"></span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="BaoMat/DangXuat" class="dropdown-item">              
              <i class="fas fa-sign-out-alt mr-2"></i>
              Đăng xuất
              <!-- <span class="float-right text-muted text-sm">2 days</span> -->
            </a>
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->