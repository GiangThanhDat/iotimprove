


<div class="content-wrapper" ng-controller="TramQuanTracController">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Quản Lý Các Khu Vực Trạm Quan Trắc</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="TongQuan">Home</a></li> -->
            <li class="breadcrumb-item active"><a href="TongQuan">Trạm Quan Trắc</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- right col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="card">
            <div class="card-header" style="background-color: #212529; color: #c2c7d0">
              <h3 class="card-title">Danh sách các Trạm xử lý rác thải trên bản đồ</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="d-md-flex">
                <div class="p-1 flex-fill" style="overflow: hidden">
                  <!-- Map will be created here -->
                  <div id="map" style="height: 500px; overflow: hidden">
                    <div class="map"></div>
                  </div>
                </div>
              </div><!-- /.d-md-flex -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->            
        </div>
        <!-- left col -->
        <div class="col-md-12">
         <div class="card">
          <div class="card-header" style="background-color: #212529; color: #c2c7d0">
            <h3 class="card-title">Danh sách các Trạm xử lý rác thải</h3>
            <div class="card-tools">
              <input ng-show="accountInfor.ma_vaitro==1" type="button" data-toggle="modal" data-target="#FormThemTram"  class="btn btn-tool btn-success" value="Thêm trạm mới">
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
                    <td><a href="" ng-click="xemChiTiet(item.ma_tram)">{{item.ten_tram}}</a></td>
                    <td class="text-truncate" style="max-width: 284px">{{item.DiaChi}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->            
      </div>
    </div>  


    <!-- Modal -->
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="ChiTietTram">
          <div class="modal-dialog modal-xl" >
            <div class="modal-content">
              <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                <h7 class="modal-title">Thông tin chi tiết</h7>
                <button type="button" class="close" data-dismiss="modal" ng-click="edit = false" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header border-transparent" style="background-color: #212529 ">
                        <h3 class="card-title" style="color: #c2c7d0">
                          Thông tin chung
                        </h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <!-- <div class="card"> -->
                          <!-- <div class="card-body"> -->
                            <!-- Color Picker -->
                            <div class="form-group row">
                              <label for="ma_tram" class="col-sm-4 col-form-label">Mã trạm</label>
                              <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="ma_tram" value="{{ChiTietTQT.ma_tram}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="ten_tram" class="col-sm-4 col-form-label">Tên trạm</label>
                              <div class="col-sm-8">
                                <input type="text" ng-disabled="!edit" class="form-control" id="ten_tram" ng-model="ChiTietTQT.ten_tram" />
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="ten_tram" class="col-sm-4 col-form-label">Địa chỉ</label>
                              <div class="col-sm-8">
                                <input type="text" ng-disabled="true" class="form-control" id="dia_chi" ng-model="ChiTietTQT.DiaChi" value="{{ChiTietTQT.DiaChi}}" >
                              </div>
                            </div>
                            <div class="form-group row" ng-show="accountInfor.ma_vaitro==1">
                              <label for="ten_tram" class="col-sm-4 col-form-label">Người quản lý</label>
                              <div class="col-sm-8" ng-show="!edit">
                                <input type="text" ng-disabled="true" class="form-control" id="nguoi_quan_ly" ng-model="ChiTietTQT.TenNguoiQuanLy" value="{{ChiTietTQT.TenNguoiQuanLy}}" >
                              </div>
                              <div class="col-sm-8" ng-show="edit">
                                <select class="form-control" ng-model="ChiTietTQT.taikhoan_quanly" ng-options="account.tendangnhap as account.hovaten for account in ListAccount">
                                  <option value="">Phân công người quản lý trạm này</option>
                                </select>
                              </div>
                            </div>                            
                          </div>   
                          <div class="card-footer" ng-show="accountInfor.ma_vaitro==1">
                            <input type="button" data-toggle="modal" data-target="#BoSungCamBien" class="btn btn-warning float-sm-left"  value="Bổ sung cảm biến">
                            <input type="button" ng-show="!edit" ng-click="edit=true;editClick()" name="" id="" class="btn btn-success float-sm-right"  value="Sửa">
                            <input type="button" name="" ng-show="edit" id="" class="btn btn-primary float-sm-right" data-dismiss="modal" ng-click="edit=false;updateTQT();editClick()" value="Lưu">
                            
                            <input type="button" name="" ng-show="edit" ng-click="edit=false;editClick()" id="" class="btn btn-danger float-sm-right" value="Hủy"/>
                            &nbsp;&nbsp;
                          </div>
                          <div class="card-footer" ng-show="accountInfor.ma_vaitro!=1">
                            <input type="button" data-toggle="modal" data-target="#BoSungCamBien" class="btn btn-warning float-sm-left"  value="Bổ sung cảm biến">
                          </div>
                          <!-- </div> -->

                          <!-- </div> -->
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="d-md-flex">
                          <div class="p-1 flex-fill" style="overflow: hidden">
                            <!-- Map will be created here -->
                            <div id="map-custom" class="rounded" style="height: 345px; overflow: hidden">
                              <div class="map"></div>
                            </div>
                          </div>
                        </div><!-- /.d-md-flex -->
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header border-transparent" style="background-color: #212529 ">
                            <h3 class="card-title" style="color: #c2c7d0">
                              Biểu đồ cập nhật số liệu thời gian thực thời điểm hiện tại
                            </h3>
                            <div class="card-tools">
                              <input type="button" readonly class="btn btn-tool" value="Cập nhật thời gian thực"/>
                              <input type="button" class="btn btn-tool" ng-click="realtimeCtr()"
                              value="{{realtimeBtn}}"/>
                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <!-- <div class="card"> -->
                              <!-- <div class="card-body"> -->
                                <div class="row">
                                  <div class="col-md-6" ng-repeat="item in listSensorByStation">
                                    <div class="card">
                                      <a href="" data-toggle="modal" data-target="#FormSuaCamBien" ng-click="chiTietCamBien(item)">
                                        <div class="card-body">
                                          <div class="form-group row">
                                            <div class="col border  rounded text-center"><label for=""> {{item.ten_cambien}}</label></div>
                                            <div class="col border  rounded text-center"><label for="">{{item.latesValue}} {{item.ten_donvi}}</label></div>
                                            <div class="col border  rounded text-center"><label for=""> {{item.latesDate}}</label></div>
                                            <div class="col border  rounded text-center"><label for=""> {{item.latesTime}}</label></div>
                                          </div>
                                          <div class="row">
                                            <div class="col border rounded text-center">
                                              <div class="progress progress-xs">                                                
                                                <div class="progress-bar" style="width:{{item.latesValue}}%; background-color:{{item.bgColor}}">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </a>
                                    </div>

                                    
                                    <div class="card">
                                      <div class="card-header border-transparent" style="background-color: #212529 ">
                                        <h3 class="card-title" style="color: #c2c7d0">
                                          Biểu đồ thời gian thực
                                        </h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                          </button>
                                        </div>
                                      </div>
                                      <div class="card-body">
                                        <div class="chart" id="wrapper-chart-{{item.ma_cambien}}">
                                          <canvas id="item-chart-{{item.ma_cambien}}" height="310" style="height: 310px;"></canvas>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- </div> -->
                                <!-- </div> -->

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- end - Modal -->


            <!-- Modal thêm trạm -->
            <div class="row">
              <div class="col-md-12">
                <div class="modal fade" id="FormThemTram">
                  <div class="modal-dialog modal-xl" >
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                        <h7 class="modal-title">Thông tin chi tiết</h7>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="card">
                                  <div class="card-header border-transparent" style="background-color: #212529 ">
                                    <h3 class="card-title" style="color: #c2c7d0">
                                      Thông tin chung
                                    </h3>
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <label for="ma_tram" class="col-sm-4 col-form-label">Mã trạm</label>
                                      <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="ma_tram" value="{{ChiTietTQT.ma_tram}}">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="ten_tram" class="col-sm-4 col-form-label">Tên trạm</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ten_tram" ng-model="ChiTietTQT.ten_tram" />
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="ten_tram" class="col-sm-4 col-form-label">Địa chỉ</label>
                                      <div class="col-sm-8">
                                        <input type="text" ng-disabled="true" class="form-control" id="dia_chi" ng-model="ChiTietTQT.DiaChi" value="{{ChiTietTQT.DiaChi}}" >
                                      </div>
                                    </div>    
                                    <div class="form-group row" ng-show="accountInfor.ma_vaitro==1">
                                      <label for="ten_tram" class="col-sm-4 col-form-label">Người quản lý</label>
                                      <div class="col-sm-8" >
                                        <select class="form-control" ng-model="ChiTietTQT.taikhoan_quanly" ng-options="account.tendangnhap as account.hovaten for account in ListAccount">
                                          <option value="">Phân công người quản lý trạm này</option>
                                        </select>
                                      </div>
                                    </div>                         
                                  </div>   
                                  <div class="card-footer">
                                    <input type="button" data-toggle="modal" data-target="#BoSungCamBien" class="btn btn-warning float-sm-left"  value="Bổ sung cảm biến">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="d-md-flex">
                                  <div class="p-1 flex-fill" style="overflow: hidden">
                                    <!-- Map will be created here -->
                                    <div id="map-for-add" class="rounded" style="height: 345px; overflow: hidden">
                                      <div class="map"></div>
                                    </div>
                                  </div>
                                </div><!-- /.d-md-flex -->
                              </div>
                            </div>
                          </div>
                          <!-- card body -->
                          <div class="card-footer">
                            <input type="button" ng-click="themTram()" class="btn btn-primary float-right"  value="Lưu" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End - modal thêm trạm -->
            <div class="row">
              <div class="col-md-12">
                <div class="modal fade" id="BoSungCamBien">
                  <div class="modal-dialog modal-lg" >
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                        <h7 class="modal-title">Cảm biến</h7>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card-header border-transparent" style="background-color: #212529 ">
                                <h3 class="card-title" style="color: #c2c7d0">
                                  Các cảm biến được lắp ở trạm {{ten_tram}}
                                </h3>
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool btn-success" data-toggle="modal" data-target="#FormThemCamBien" >Thêm cảm biến</button>
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="card-body">
                                <table class="table m-0">
                                  <thead>
                                    <tr>
                                      <th width="">STT</th>  
                                      <th width="">Mã cảm biến</th>                         
                                      <th width="">Tên cảm biến</th>
                                      <th>Đơn vị</th>
                                      <th>Thao tác</th>
                                    </tr>
                                  </thead>           
                                  <tbody class="text-left">                                    
                                    <tr ng-repeat="item in listSensorByStation">
                                      <td>{{$index+1}}</td>
                                      <td>{{item.ma_cambien}}</td>
                                      <td><a href="" data-toggle="modal" data-target="#FormSuaCamBien" ng-click="chiTietCamBien(item)">{{item.ten_cambien}}</a></td>
                                      <td><a href="" data-toggle="modal" data-target="#FormXemDonVi" ng-click="chiTietDonVi(item.ma_donvi)">{{item.ten_donvi}}</a></td>
                                      <td><a href="" ng-click="thaoCamBien(item)" class="btn btn-danger">Tháo</a></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal thêm cảm biến -->
              <div class="row">
                <div class="col-md-12">
                  <div class="modal fade" id="FormThemCamBien">
                    <div class="modal-dialog modal-lg" >
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                          <h7 class="modal-title">Thêm cảm biến</h7>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label">Mã cảm biến</label>
                                  <div class="col-sm-10">
                                    <input type="text" readonly class="form-control"  ng-model="ChiTietCamBien.ma_cambien">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="text" class="col-sm-2 col-form-label">Tên cảm biến</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" ng-model="ChiTietCamBien.ten_cambien">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="text" class="col-sm-2 col-form-label">Lắp ở trạm</label>
                                  <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" ng-model="ChiTietTQT.ten_tram">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="number" class="col-sm-2 col-form-label">Mức giá trị cao nhất</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" ng-model="ChiTietCamBien.nguon_tren">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="number" class="col-sm-2 col-form-label">Mức giá trị thấp nhất</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" ng-model="ChiTietCamBien.nguon_duoi">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="number" class="col-sm-2 col-form-label">Màu cảnh báo</label>
                                  <div class="col-sm-10">
                                    <input type="color" class="form-control" ng-model="ChiTietCamBien.mau">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="number" class="col-sm-2 col-form-label">Chọn đơn vị đo</label>
                                  <div class="col-sm-10">
                                    <select class="form-control" ng-model="ChiTietCamBien.ma_donvi" ng-options="item.ma_donvi as item.ten_donvi for item in listDonViDo"></select>
                                  </div>
                                </div>
                                
                              </div>
                              <div class="card-footer">
                                <input type="button" class="btn btn-primary" data-dismiss="modal" ng-click="ThemCamBien()" value="Lưu" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End - Modal thêm cảm biến -->
              <!-- Modal - sửa cam biến -->
              <div class="row">
                <div class="col-md-12">
                  <div class="modal fade" id="FormSuaCamBien">
                    <div class="modal-dialog modal-lg" >
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                          <h7 class="modal-title">Chi tiết cảm biến</h7>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label">Mã cảm biến</label>
                                  <div class="col-sm-10">
                                    <input type="text" readonly class="form-control"  ng-model="ChiTietCamBien.ma_cambien">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="text" class="col-sm-2 col-form-label">Tên cảm biến</label>
                                  <div class="col-sm-10">
                                    <input type="text" ng-disabled="CBEdit==false" class="form-control" ng-model="ChiTietCamBien.ten_cambien">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="text" class="col-sm-2 col-form-label">Lắp ở trạm</label>
                                  <div class="col-sm-10">
                                    <input type="text" ng-disabled="CBEdit==false" class="form-control" ng-model="ChiTietTQT.ten_tram">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="number" class="col-sm-2 col-form-label">Mức giá trị cao nhất</label>
                                  <div class="col-sm-10">
                                    <input type="text" ng-disabled="CBEdit==false" class="form-control" ng-model="ChiTietCamBien.nguon_tren">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="number" class="col-sm-2 col-form-label">Mức giá trị thấp nhất</label>
                                  <div class="col-sm-10">
                                    <input type="text" ng-disabled="CBEdit==false" class="form-control" ng-model="ChiTietCamBien.nguon_duoi">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="number" class="col-sm-2 col-form-label">Màu cảnh báo</label>
                                  <div class="col-sm-10">
                                    <input type="color" ng-disabled="CBEdit==false" class="form-control" ng-model="ChiTietCamBien.mau">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="number"  class="col-sm-2 col-form-label">Chọn đơn vị đo</label>
                                  <div class="col-sm-10">
                                    <select ng-disabled="CBEdit==false" class="form-control" ng-model="ChiTietCamBien.ma_donvi" ng-options="item.ma_donvi as item.ten_donvi for item in listDonViDo"></select>
                                  </div>
                                </div>
                                
                              </div>
                              <div class="card-footer">
                                <input type="button" ng-show="CBEdit==false" class="btn btn-success float-right" ng-click="CBEdit=true" value="Sửa" />
                                <input type="button" ng-show="CBEdit==true" class="btn btn-primary float-right" data-dismiss="modal" ng-click="updateCamBien();CBEdit=false" value="Lưu" />
                                <input type="button" ng-show="CBEdit==true" class="btn btn-danger float-right" ng-click="CBEdit=false" value="Trở về" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End - Modal sửa cảm biến -->
              <!-- Modal - xem đơn vị -->
              <div class="row">
                <div class="col-md-12">
                  <div class="modal fade" id="FormXemDonVi">
                    <div class="modal-dialog modal-md" >
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                          <h7 class="modal-title">Xem đơn vị</h7>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-header border-transparent" style="background-color: #212529 ">
                                  <h3 class="card-title" style="color: #c2c7d0"></h3>
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-success" data-toggle="modal" data-target="#FormThemDonVi" >Thêm đơn vị</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="card">
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-5 col-form-label text-center">Mã đơn vị</label>
                                          <div class="col-sm-7">
                                            <input type="text" readonly class="form-control"  ng-model="DonVi.ma_donvi">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="text" class="col-sm-5 col-form-label text-center">Tên đơn vị</label>
                                          <div class="col-sm-7">
                                            <input type="text" ng-disabled="DVEdit==false" class="form-control" ng-model="DonVi.ten_donvi">
                                          </div>
                                        </div>                               
                                      </div>
                                      <div class="card-footer">
                                        <input type="button" ng-show="DVEdit==false" class="btn btn-success float-right" ng-click="DVEdit=true" value="Sửa" />
                                        <input type="button" ng-show="DVEdit==true" class="btn btn-primary float-right" data-dismiss="modal" ng-click="updateDonVi();DVEdit=false" value="Lưu" />
                                        <input type="button" ng-show="DVEdit==true" class="btn btn-danger float-right" ng-click="DVEdit=false" value="Trở về" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End - modal xem đơn vị -->
              <!-- Modal - xem đơn vị -->
              <div class="row">
                <div class="col-md-12">
                  <div class="modal fade" id="FormThemDonVi">
                    <div class="modal-dialog modal-md" >
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                          <h7 class="modal-title">Thêm đơn vị</h7>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-header border-transparent" style="background-color: #212529 ">
                                  <h3 class="card-title" style="color: #c2c7d0"></h3>
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="card">
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-5 col-form-label text-center">Mã đơn vị</label>
                                          <div class="col-sm-7">
                                            <input type="text" readonly class="form-control"  ng-model="DonVi.ma_donvi">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="text" class="col-sm-5 col-form-label text-center">Tên đơn vị</label>
                                          <div class="col-sm-7">
                                            <input type="text"  class="form-control" ng-model="DonVi.ten_donvi">
                                          </div>
                                        </div>                               
                                      </div>
                                      <div class="card-footer">
                                        <input type="button" class="btn btn-primary float-right" data-dismiss="modal" ng-click="addDonVi()" value="Lưu" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End - modal xem đơn vị -->
            </div>
          </section>
        </div>



<!-- 
 -->