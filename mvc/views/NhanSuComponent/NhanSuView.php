  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-controller="NhanSuController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nhân sự</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="TongQuan">Trang chủ</a></li>
              <li class="breadcrumb-item active">Nhân sự</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch" ng-repeat="(key, value) in ListAccount">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Vai trò
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{value.hovaten}}</b></h2>
                      <!-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Địa chỉ: {{value.DiaChi}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>SĐT : {{value.dienthoai}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>Email : {{value.email}}</li>
                        <li class="small"><a href="https://{{value.fblink}}" target="_blank"><span class="fa-li"><i class="fab fa-lg fa-facebook-square"></i></i></span>FaceBook</li></a>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{value.avatar}}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">                      
                    <a href="" data-toggle="modal" data-target="#xemChiTietNhanVien" class="btn btn-sm btn-primary" ng-click="xemChiTiet(value)"><i class="fas fa-user"></i>  Xem thông tin..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
<!--           <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav> -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
      <!-- Modal xem chi tiết nhân viên -->
      <div class="row">
        <div class="col-md-12">
          <div class="modal fade" id="xemChiTietNhanVien">
            <div class="modal-dialog modal-xl" >
              <div class="modal-content">
                <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                  <h7 class="modal-title">Thông tin chi tiết</h7>
                  <button type="button" class="close" data-dismiss="modal" ng-click="edit=false" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active"  href="#tram" data-toggle="tab">Trạm xử lý rác</a></li>
                                <li class="nav-item"><a class="nav-link" ng-click="edit=false" href="#ChinhSua" data-toggle="tab">Thông tin</a></li>
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
                                            <tr ng-repeat="item in StationByUser">
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
                              <div class="tab-pane" id="ChinhSua">
                                <form class="form-horizontal" ng-submit="updateAccount()" >
                                  <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                                    <div class="col-sm-10">
                                      <input type="email" readonly ng-model="accountSelected.tendangnhap" class="form-control" id="inputName" placeholder="Chỉnh họ tên">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Họ và tên</label>
                                    <div class="col-sm-10">
                                      <input type="email" ng-disabled="!edit" ng-model="accountSelected.hovaten" class="form-control" id="inputName" placeholder="Chỉnh họ tên">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" ng-model="accountSelected.email" ng-disabled="!edit" id="inputEmail" placeholder="Email">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Ngày sinh</label>
                                    <div class="col-sm-10">
                                      <span class="form-control" readonly ng-show="!edit">
                                        {{accountSelected.ngaysinh  | date:'dd/MM/yyyy' }}
                                      </span>
                                      <input type="date" class="form-control" ng-model="accountSelected.ngaysinh" ng-show="edit" id="inputName2" value="{{accountSelected.ngaysinh}}" placeholder="Ngày sinh"/>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" readonly="" ng-model="accountSelected.DiaChi" id="inputExperience" />
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">FaceBook</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" ng-disabled="!edit" ng-model="accountSelected.fblink" id="inputExperience" placeholder="Facebook Link"/>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Số điện thoại</label>
                                    <div class="col-sm-10">
                                      <input type="text" ng-disabled="!edit" ng-model="accountSelected.dienthoai" class="form-control" id="inputSkills" placeholder="Số điện thoại">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                      <button type="button" ng-show="!edit" ng-click="edit=true" class="btn btn-primary">Sửa</button>

                                      <button type="button" ng-click="removeAccount()" class="btn btn-danger">Xóa</button>
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
                  </div>
                  <!-- card body -->
                  <div class="card-footer">
                    <input type="button" ng-click="edit=false" data-dismiss="modal" class="btn btn-danger float-right"  value="Đóng" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End - modal xem chi tiết nhân viên -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->