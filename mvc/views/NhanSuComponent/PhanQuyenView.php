
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-controller="PhanQuyenController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cài đặt & phân quyền</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="TongQuan">Trang chủ</a></li>
              <li class="breadcrumb-item active">Phân quyền</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách nhân viên hệ thống</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          STT
                      </th>                    
                      <th></th>
                      <th style="width: 20%">
                          Tài khoản
                      </th>
                      <th style="width: 30%">
                          Tên nhân viên
                      </th>
                      <th>
                          Vai trò
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="(key, value) in ListAccount">
                      <td>
                        {{$index+1}}
                      </td>
                      <td><img   class="table-avatar" src="./public/img/avatar04.png" alt=""></td>                      
                      <td>
                          <a>
                            {{value.tendangnhap}}
                          </a>
                          <br/>
                          <small>
                              Đã tạo vào ngày : {{value.ngaytao}}
                          </small>
                      </td>
                      <td>
                        {{value.hovaten}}
                        
                      </td>
                      <td >
                        <select class="form-control">                          
                            <option value="1">Quản trị viên</option>
                            <option value="1">Giám sát viên</option>
                        </select>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="">
                              <i class="fas fa-user-lock">
                              </i>
                              Thêm vai trò
                          </a>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- Thêm Modal thêm vai trò -->
      


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
