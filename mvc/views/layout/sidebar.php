
<<<<<<< HEAD
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" ng-controller="PhanQuyenNguoiDungController">

  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="./public/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">Quản Lý Hệ Thống</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./public/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="NhanSu/CaNhan" class="d-block">{{accountInfor.hovaten}}</a>
      </div>
    </div>
=======
    	<!-- Sidebar - Brand -->
    	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    		<div class="sidebar-brand-icon rotate-n-15">
    			<i class="fas fa-laugh-wink"></i>
    		</div>
    		<div class="sidebar-brand-text mx-3">Quản Trắc Bãi Rác</div>
    	</a>

    	<!-- Divider -->
    	<hr class="sidebar-divider my-0">

    	<!-- Nav Item - Dashboard -->
    	<li class="nav-item">
    		<a class="nav-link" href="dashboard/index/10">
    			<i class="fas fa-fw fa-tachometer-alt"></i>
    			<span>Danh sách tổng quát - Cập nhật thời gian thực</span></a>
    		</li>

    		<!-- Divider -->
    		<hr class="sidebar-divider">

    		<!-- Heading -->
    		<div class="sidebar-heading">
    			Interface
    		</div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tramquantrac" aria-expanded="true" aria-controls="tramquantrac">
            <i class="fas fa-fw fa-cog"></i>
            <span>Trạm Quan trắc</span>
        </a>
        <div id="tramquantrac" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Quản lý các trạm</h6>
              <a class="collapse-item" href="admin/show/tramquantrac">Danh sách</a>
              <a class="collapse-item" href="admin/add/tramquantrac">Thêm mới</a>
          </div>
      </div>
    </li>      
      <!-- Nav Item - Pages Collapse Menu -->
<!--       <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tinh-tp" aria-expanded="true" aria-controls="tinh-tp">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tỉnh - Thành Phố</span>
        </a>
        <div id="tinh-tp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Quản lý tỉnh-thành phố:</h6>
              <a class="collapse-item" href="admin/show/tinhtp">Danh sách</a>
              <a class="collapse-item" href="admin/add/tinhtp">Thêm mới</a>
          </div>
      </div>
  </li> -->
  <!-- Nav Item - Utilities Collapse Menu -->
<!--   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cambien" aria-expanded="true" aria-controls="cambien">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Cảm biến</span>
    </a>
    <div id="cambien" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Quản lý các cảm biến:</h6>
        <a class="collapse-item" href="admin/show/cambien">Danh sách</a>
        <a class="collapse-item" href="admin/add/cambien">Thêm mới</a>
      </div>
    </div>
  </li> -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#donvi" aria-expanded="true" aria-controls="donvi">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Đơn vị đo</span>
      </a>
      <div id="donvi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Quản lý các đơn vị đo:</h6>
          <a class="collapse-item" href="admin/show/donvido">Danh sách</a>
          <a class="collapse-item" href="admin/add/donvido">Thêm mới</a>
        </div>
      </div>
    </li>
<!--     <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dailuong" aria-expanded="true" aria-controls="dailuong">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Đai lượng đo</span>
          </a>
          <div id="dailuong" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Quản lý các đại lượng đo:</h6>
              <a class="collapse-item" href="admin/show/dailuongdo">Danh sách</a>
              <a class="collapse-item" href="admin/add/dailuongdo">Thêm mới</a>              
            </div>
          </div>
    </li>  -->
   
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
<!--     <div class="sidebar-heading">
       Addons
    </div> -->
>>>>>>> e9a1e4ca34a4ba28b6435b771e0b9be7f2858f01

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="TongQuan" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
             Tổng Quan
           </p>
         </a>
       </li>
       <li class="nav-item">
        <a href="NhanSu" class="nav-link">
          <i class="nav-icon fas fa-address-card"></i>
          <p>
            Nhân Sự
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="TramQuanTrac" class="nav-link">
          <i class="nav-icon fas fa-broadcast-tower"></i>
          <p>
            Trạm Quan Trắc
          </p>
        </a>
      </li>          
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<<<<<<< HEAD
<!-- /.sidebar -->
</aside>
=======
</li>
 -->
<!-- Nav Item - Charts-->
<!-- <li class="nav-item">
   <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li> -->
<!--  Nav Item - Tables  -->
<!-- <li class="nav-item active">
    <a class="nav-link" href="tables.html">
     <i class="fas fa-fw fa-table"></i>
     <span>Tables</span></a>
 </li> -->

 <!-- Divider -->
 <hr class="sidebar-divider d-none d-md-block">

 <!-- Sidebar Toggler (Sidebar) -->
 <div class="text-center d-none d-md-inline">
     <button class="rounded-circle border-0" id="sidebarToggle"></button>
 </div>

</ul>
    <!-- End of Sidebar -->
>>>>>>> e9a1e4ca34a4ba28b6435b771e0b9be7f2858f01
