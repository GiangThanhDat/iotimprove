
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
        <a class="btn btn-primary btn-sm" href=""  data-toggle="modal" data-target="#PhanCong">
          Phân quyền
        </a>
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
              <th width="168">
                Vai trò
              </th>
              <th width="400">
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="(key, value) in ListAccount">
              <td>
                {{$index+1}}
              </td>
              <td><img   class="table-avatar" src="{{value.avatar}}" alt=""></td>                      
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
                <p ng-show="!phanCongEnable">{{value.ten_vaitro}}</p>
                <select  ng-show="phanCongEnable" class="form-control" ng-model="value.ma_vaitro" ng-options="item.ma_vaitro as item.ten_vaitro for item in listRoles" ng-change="getListTasksByRole(_ma_vaitro)" required >
                  <option disabled value="">chọn vai trò...</option>
                </select>                         
              </td>
              <td class="project-actions text-right" >
                <a class="btn btn-success btn-sm" href="" ng-show="!phanCongEnable"   ng-click="phanCongEnable=true;">
                  Phân công
                </a>
                <input type="button" ng-show="phanCongEnable" ng-click="phanCongEnable=false;updateAccount(value)" class="btn btn-primary btn-sm" value="Xác nhận" />
                <input type="button" ng-show="phanCongEnable" ng-click="phanCongEnable=false;getListAccount()" class="btn btn-warning btn-sm" value="Hoàn tác" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Thêm Modal thêm vai trò -->


    <!-- Modal - phân công -->
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="PhanCong">
          <div class="modal-dialog modal-lg" >
            <div class="modal-content">
              <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                <h7 class="modal-title">Phân công</h7>
                <button type="button" class="close" data-dismiss="modal" ng-click="edit=false" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Chọn vai trò</h4>
                    <div class="card-tools">
                     <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ThemVaiTro" href="">
                      <i class="fas fa-user-lock">
                      </i>
                      Thêm vai trò
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal">
                      <div class="form-group row">                          
                        <div class="col-sm-12">
                          <select class="form-control" ng-model="_ma_vaitro" ng-options="item.ma_vaitro as item.ten_vaitro for item in listRoles" ng-change="getListTasksByRole(_ma_vaitro)" required
                          oninvalid="this.setCustomValidity('Vui lòng chọn vai trò để phân công chức năng')" 
                          oninput="setCustomValidity('')" >
                          <option disabled value="">chọn vai trò...</option>
                        </select> 
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Phân công chức năng theo vai trò</h4>
                  <div class="card-tools">
                   <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ThemChucNang" href="">
                    <i class="fas fa-tasks"></i>
                  </i>
                  Thêm chức năng
                </a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-check form-check-inline" ng-repeat="item in listTasks">
                  <input class="form-check-input" type="checkbox" id="chucnang-{{item.ma_chucnang}}" value="{{item.ma_chucnang}}" ng-change="stateChanged()" ng-model="item.checked" ng-checked="item.checked" />
                  <label class="form-check-label" for="chucnang-{{item.ma_chucnang}}">{{item.ten_chucnang}}</label>
                </div>                     
              </div>
              <div class="card-footer">
                <div class="offset-sm-2 col-sm-10">                                      
                  <button ng-click="apDungPhanCong()" data-dismiss="modal" class="btn btn-primary float-sm-right">Áp dụng</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end - modal phân công -->

<!-- Modal vai trò -->
<div class="row">
  <div class="col-md-12">
    <div class="modal fade" id="ThemVaiTro">
      <div class="modal-dialog modal-md" >
        <div class="modal-content">
          <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
            <h7 class="modal-title">Thêm vai trò</h7>
            <button type="button" class="close" data-dismiss="modal" ng-click="edit=false" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <form class="form-horizontal" ng-submit="themVaiTro()" >
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-6 col-form-label">Mã vai trò</label>
                    <div class="col-sm-6">
                      <input type="text" readonly ng-model="role.ma_vaitro" class="form-control" id="inputName" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-6 col-form-label">Tên vai trò</label>
                    <div class="col-sm-6">
                      <input type="text" ng-model="role.ten_vaitro" class="form-control" id="inputName" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">                                      
                      <button type="submit" class="btn btn-primary float-sm-right">Lưu</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal vai trò -->
<!-- Modal chức năng -->
<div class="row">
  <div class="col-md-12">
    <div class="modal fade" id="ThemChucNang">
      <div class="modal-dialog modal-md" >
        <div class="modal-content">
          <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
            <h7 class="modal-title">Thêm chức năng</h7>
            <button type="button" class="close" data-dismiss="modal" ng-click="edit=false" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <form class="form-horizontal" ng-submit="themChucNang()" >
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-6 col-form-label">Mã chức năng</label>
                    <div class="col-sm-6">
                      <input type="text" readonly ng-model="task.ma_chucnang" class="form-control" id="inputName" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-6 col-form-label">Tên chức năng</label>
                    <div class="col-sm-6">
                      <input type="text" ng-model="task.ten_chucnang" class="form-control" id="inputName" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">                                      
                      <button type="submit" class="btn btn-primary float-sm-right">Lưu</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End - Modal chức năng -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
