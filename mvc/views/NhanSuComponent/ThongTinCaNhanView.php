  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" ng-controller="ThongTinCaNhanController">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin cá nhân</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="TongQuan">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thông tin cá nhân</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="./public/img/user2-160x160.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{accountInfor.hovaten}}</h3>
                <!-- <p class="text-muted text-center">Software Engineer</p> -->
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Tên đăng nhập:  </b>{{accountInfor.tendangnhap}} 
                  </li>
                  <li class="list-group-item">
                    <b>Vai trò:  </b> {{vaitro}}
                  </li>
                </ul>
                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->            
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active"  href="#tram" data-toggle="tab">Trạm xử lý rác</a></li>
                  <li class="nav-item"><a class="nav-link" ng-click="edit=false" href="#DiaChi" data-toggle="tab">Địa chỉ cá nhân</a></li>
                  <li class="nav-item"><a class="nav-link" ng-click="edit=false" href="#ChinhSua" data-toggle="tab">Chỉnh sửa thông tin</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="tram">
                    <!-- Post -->
                    <div class="post">                      
                       <div class="card">
                        <div class="card-header" style="background-color: #212529; color: #c2c7d0">
                          <h3 class="card-title">Danh sách trạm</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <div class="table-responsive">
                            <table class="table m-0" id="{{$index}}">
                              <thead>
                                <tr>
                                  <th width="5%">STT</th>  
                                  <th width="15%">Mã trạm</th>                         
                                  <th width="30%">Tên trạm</th>
                                  <th width="50%">Địa chỉ</th>                    
                                </tr>
                              </thead>
                              <tbody class="text-left">
                                <tr ng-repeat="item in TramList">
                                  <td>{{$index+1}}</td>
                                  <td>{{item.ma_tram}}</td>
                                  <td>{{item.ten_tram}}</td>
                                  <td >{{item.DiaChi}}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <a type="button"  class="btn float-right" style="background-color: #212529; color: #c2c7d0"  href="TramQuanTrac">Xem chi tiết...</a>
                        </div>
                        <!-- /.card-footer -->
                      </div>
                      <!-- /.card -->                                
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="DiaChi">    
                    <div class="card">
                      <div class="card-body">
                        <div class="d-md-flex">
                          <div class="p-1 flex-fill" style="overflow: hidden">
                            <!-- Map will be created here -->
                            <div id="map-custom" class="rounded" style="height: 450px; overflow: hidden">
                              <div class="map"></div>
                            </div>
                          </div>
                        </div><!-- /.d-md-flex --> 
                      </div>
                    </div>
                    <div class="card-footer">
                       <div class="form-group row">
                        <div class="offset-sm-10 col-sm-2">
                          <button type="button" ng-show="!edit" ng-click="enabelMapOnClick(true);edit=true" class="btn btn-primary float-right">Sửa</button>
                          <button type="button" ng-show="edit" ng-click="enabelMapOnClick(false);edit=false" class="btn btn-danger float-right">Hủy</button>
                          <button type="submit" ng-show="edit" ng-click="enabelMapOnClick(false);edit=false;updateAccount()"   class="btn btn-success float-right">Lưu</button>
                        </div>
                      </div>
                    </div>
           
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="ChinhSua">
                    <form class="form-horizontal" ng-submit="updateAccount()" >
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                        <div class="col-sm-10">
                          <input type="email" readonly ng-model="accountInfor.tendangnhap" class="form-control" id="inputName" placeholder="Chỉnh họ tên">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Họ và tên</label>
                        <div class="col-sm-10">
                          <input type="email" ng-disabled="!edit" ng-model="accountInfor.hovaten" class="form-control" id="inputName" placeholder="Chỉnh họ tên">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" ng-model="accountInfor.email" ng-disabled="!edit" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Ngày sinh</label>
                        <div class="col-sm-10">
                          <span class="form-control" readonly ng-show="!edit">
                            {{accountInfor.ngaysinh  | date:'dd/MM/yyyy' }}
                          </span>
                          <input type="date" class="form-control" ng-model="accountInfor.ngaysinh" ng-show="edit" id="inputName2" value="{{accountInfor.ngaysinh}}" placeholder="Ngày sinh"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">FaceBook</label>
                        <div class="col-sm-10">
                          <input class="form-control" ng-disabled="!edit" ng-model="accountInfor.fblink" id="inputExperience" placeholder="Facebook Link"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                          <input type="text" ng-disabled="!edit" ng-model="accountInfor.dienthoai" class="form-control" id="inputSkills" placeholder="Số điện thoại">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" ng-show="!edit" ng-click="edit=true" class="btn btn-primary">Sửa</button>
                          <button type="button" ng-show="edit" ng-click="edit=false" class="btn btn-danger">Hủy</button>
                          <button type="submit" ng-show="edit" ng-click="edit=false" class="btn btn-success">Lưu</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>