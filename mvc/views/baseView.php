<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- đường dẫn tuyệt đối -->
  <base href="http://192.168.1.2/IOT-Improve/" /> 
   <!-- đường dẫn tuyệt đối -->
  <!-- <base href="http://localhost/IOT-Improve/" />  -->
  <title>Giang Thành Đạt</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./public/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="./public/css/style.css">

  <link rel="stylesheet" href="./public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="./public/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="./public/leaflet/leaflet.css">
  <link rel="stylesheet" href="./public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" ng-app="myIOTApp">
  <div class="wrapper">
    <?php require_once VIEWS.'layout/topbar.php' ?>
    <?php require_once VIEWS.'layout/sidebar.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <?php require_once  VIEWS.$data['component'].'/'.$data['pages'].'.php' ?>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php require_once  VIEWS.'layout/footer.php' ?>
  </div>
  <!-- ./wrapper -->
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="./public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="./public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./public/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="./public/js/demo.js"></script>

  <!-- PAGE ./public/plugins -->
  <!-- jQuery Mapael -->
  <script src="./public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="./public/plugins/raphael/raphael.min.js"></script>
  <script src="./public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="./public/plugins/jquery-mapael/maps/usa_states.min.js"></script>

  <!-- Moment -->
  <script src="./public/plugins/moment/moment.min.js"></script>
  <!-- datarangepicker -->
  <script src="./public/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="./public/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- Color Picker -->
  <script src="./public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- ChartJS -->
  <script src="./public/plugins/chart.js/Chart.min.js"></script>
  <!-- Select2 -->
  <script src="./public/plugins/select2/js/select2.full.min.js"></script>
  <!-- PAGE SCRIPTS -->
  <script src="./public/js/pages/dashboard2.js"></script>
  <!-- OPEN STREET MAP -->
  <script src="./public/leaflet/leaflet.js"></script>
  <!-- ANGULARJS -->
  <script src="./public/angularjs/angular.js"></script>
  <script src="./public/angularjs/angular-cookies.min.js"></script>


  <!-- AlaSQL -->
  <script src="./public/js/alasql.min.js"></script>
  <script src="./public/js/xlsx.core.min.js"></script>


  <!-- angular application - Controller-->
  <script src="./app/app.js"></script>

  <script src="./app/controllers/TongQuanController.js"></script>
  <script src="./app/controllers/TramQuanTracController.js"></script> 
  <script src="./app/controllers/ThongTinCaNhanController.js"></script>
  <script src="./app/controllers/PhanQuyenNguoiDungController.js"></script>
  <script src="./app/controllers/NhanSuController.js"></script>
  <script src="./app/controllers/PhanQuyenController.js"></script>
  <!-- angular provider - service -->
  <script src="./app/factory/Excel.js"></script>
  <script src="./app/factory/accountmng.js"></script>
</body>
</html>
