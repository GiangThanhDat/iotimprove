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
<body class="hold-transition register-page" ng-app="myIOTApp" ng-controller="DangKyController" >
<div class="register-box" >
  <div class="register-logo">
    <a href="https://www.vnkgu.edu.vn/trang-chu.html"><b>ĐẠI HỌC KIÊN GIANG</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">HỆ THỐNG GIÁM SÁT CÁC KHU VỰC XỬ LÝ RÁC THẢI</p>
      <form ng-submit="DangKy()">
        <div class="input-group mb-3">
          <input type="text" class="form-control" ng-model="newUser.hovaten" placeholder="Họ và tên người dùng" required="" 
          oninvalid="this.setCustomValidity('Bạn không thể để trống họ tên')"
          oninput="setCustomValidity('')"
          />
          <div class="input-group-append">
            <div class="input-group-text">              
              <span class="fas fa-signature"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" ng-model="newUser.email" placeholder="Email"
          required="" 
          oninvalid="this.setCustomValidity('Vui lòng cung cấp Email để tạo tài khoản')"
          oninput="setCustomValidity('')"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" ng-model="newUser.tendangnhap" placeholder="Tên đăng nhập" 
          ng-blur="checkDuplicateAccount()"
          required="" 
          oninvalid="this.setCustomValidity('Tên đăng nhập là bắt buộc và bạn phải ghi nhớ')"
          oninput="setCustomValidity('')"
          />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" ng-model="newUser.matkhau" placeholder="Mật khẩu"
          required="" 
          oninvalid="this.setCustomValidity('Mật khẩu là bắt buộc và bạn phải ghi nhớ')"
          oninput="setCustomValidity('')"
          />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" ng-keyup="checkPass()" class="form-control" ng-model="passwordCheck" placeholder="Gỏ lại mật khẩu">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div id="errorMessage" class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i>{{errorTitle}}</h5>
              {{errorMessage}}
            </div>
          </div>
          <div id="successMessage" class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>Thành công!</h5>Đăng ký tài khoản thành công, mời bạn <a href="BaoMat">Đăng nhập vào hệ thống</a>
          </div>
        </div>
 
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">Xác nhận đăng ký</label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  class="btn btn-primary btn-block">Đăng Ký</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!--  <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="BaoMat/DangNhap" class="text-center">Đã có tài khoản</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="./public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./public/js/adminlte.min.js"></script>

<!-- ANGULARJS -->
<script src="./public/angularjs/angular.js"></script>
<script src="./public/angularjs/angular-cookies.min.js"></script>

<script src="./app/app.js"></script>
<script src="./app/controllers/DangKyController.js"></script>
</body>
</html>
