

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<<<<<<< HEAD
  <base href="http://192.168.1.2/IOT-Improve/" /> <!-- đường dẫn tuyệt đối -->
  <title>Giang Thành Đạt</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
=======
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="/" /> <!-- đường dẫn tuyệt đối -->
  <title>Website Quản Trị Trạm Quan Trắc Bãi Rác</title>

  <!-- Custom fonts for this template-->
  <link href="./public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./public/css/style.css">
  <!-- Custom styles for this template-->
  <link href="./public/css/sb-admin-2.min.css" rel="stylesheet">
>>>>>>> e9a1e4ca34a4ba28b6435b771e0b9be7f2858f01

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./public/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" ng-app="myIOTApp" ng-controller="DangNhapController">
<div class="login-box">
  <div class="login-logo">
    <a href="https://www.vnkgu.edu.vn/trang-chu.html"><b>ĐẠI HỌC KIÊN GIANG</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">HỆ THỐNG GIÁM SÁT CÁC KHU VỰC XỬ LÝ RÁC THẢI</p>

      <form class="form-group" ng-submit="DangNhap()">
        <div class="input-group mb-3">
          <input type="text" class="form-control" ng-model="user.tendangnhap" placeholder="Tài khoản">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" ng-model="user.matkhau" placeholder="Mật khẩu">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Lưu tài khoản này
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
        <div class="row">
          <div class="col-md-12">
            <div id="errorMessage" class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i>Thất bại</h5>Tài khoản hoặc mật khẩu không đúng, vui lòng kiểm tra lại!
            </div>
          </div>

        </div>
 
      <!-- <div class="social-auth-links text-center mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>Đăng nhập với tài khoản Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>Đăng nhập với tài khoản Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <!-- <a href="forgot-password.html">Quên mật khẩu</a> -->
      </p>
      <p class="mb-0">
        <a href="BaoMat/DangKy" class="text-center">Đăng ký thành viên mới</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- ANGULARJS -->
<script src="./public/angularjs/angular.js"></script>
<script src="./public/angularjs/angular-cookies.min.js"></script>
<!-- jQuery -->
<script src="./public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./public/js/adminlte.min.js"></script>

<!-- App -->
<script src="./app/app.js"></script>
<script src="./app/controllers/DangNhapController.js"></script>

<script src="./app/factory/accountmng.js"></script> 
</body>
</html>
