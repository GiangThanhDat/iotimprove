<div class="content-wrapper" ng-controller="TongQuanController">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tổng Quan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="TongQuan">Home</a></li> -->
            <li class="breadcrumb-item active"><a href="TongQuan">Tổng quan</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->  
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon text-white"><i class="fas fa-broadcast-tower"></i></span>

            <div class="info-box-content text-white">
              <span class="info-box-text ">Số trạm</span>
              <span class="info-box-number">{{TramQuanTracList.length}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="fas fa-laptop-house"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Số lượng cảm biến</span>
              <span class="info-box-number">{{SoCamBien}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-balance-scale-right"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Số đại lượng đo được</span>
              <span class="info-box-number">8</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="fas fa-sort-amount-down-alt"></i></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Thời gian</span>
              <span class="info-box-number">{{ clock  | date:'HH:mm:ss'}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- right col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="card">
             <div class="card-header border-transparent" style="background-color: #212529 ">
              <h3 class="card-title" style="color: #c2c7d0">Danh sách các Trạm xử lý rác thải trên bản đô</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="d-md-flex">
                <div class="p-1 flex-fill" style="overflow: hidden">
                  <!-- Map will be created here -->
                  <div id="map" style="height: 310px; overflow: hidden">
                    <div class="map"></div>
                  </div>
                </div>
              </div><!-- /.d-md-flex -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->            
        </div>
        <!-- /.col -->



        <!-- 
        tableList  = [
          {
            ten_cambien: DHT11,
            ten_dailuong: Nhiệt Độ,
            data :[
              {
                giatri:32,
                donvido:°C,
                thoigian:thu 2
              },
              {
                giatri:32,
                donvido:°C,
                thoigian:thu 3
              },...
            ]
          },
          {
            ten_cambien: DHT11,
            ten_dailuong: Độ Ẩm,
            data :[
              {
                giatri:30,
                donvido:%,
                thoigian:thu 2
              },
              {
                giatri:32,
                donvido:°C,
                thoigian:thu 3
              },...
            ]
          }
        ]
      -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Thống kê dạng biểu đồ</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
<!--                   <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div> -->
<!--                   <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                   <div class="card">
                    <div class="card-header border-transparent" style="background-color: #212529 ">
                      <h3 class="card-title" style="color: #c2c7d0">
                        Số liệu trung bình từ {{ngayDau| date:'dd/MM/yyyy' }}  - {{ngayCuoi|date:'dd/MM/yyyy'}} tại : {{chiTietTramQuanTrac.ten_tram}}
                      </h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0"> 
                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="myChart" height="310" style="height: 310px;"></canvas>
                      </div>
                      <!-- /.chart-responsive -->                         
                      <div class="form-check form-check-inline">
                        <label class="form-check-label" >Các dạng hiển thị :</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" ng-model="chartTypes" value="line" ng-change="changeTypeChart(chartTypes);fillChartShow=true" id="line" name="chartTypes" checked="true" >     
                        <label class="form-check-label" for="line">Line</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" ng-model="chartTypes" value="radar" ng-change="changeTypeChart(chartTypes);fillChartShow=true" id="radar" name="chartTypes" >     
                        <label class="form-check-label" for="radar">Radar</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" ng-model="chartTypes" value="bar" ng-change="changeTypeChart(chartTypes);fillChartShow=false" id="bar" name="chartTypes"  >     
                        <label class="form-check-label" for="bar">Bar</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" ng-model="chartTypes" value="pie" ng-change="changeTypeChart(chartTypes);fillChartShow=false" id="pie" name="chartTypes" >     
                        <label class="form-check-label" for="pie">Pie</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" ng-model="chartTypes" value="doughnut" ng-change="changeTypeChart(chartTypes);fillChartShow=false" id="doughnut" name="doughnut" checked="true" >     
                        <label class="form-check-label" for="doughnut">Doughnut</label>
                      </div>
                    </div>
                  </div> 
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Trạm xử lý</label>
                    <div class="input-group">
                      <select class="form-control float-left" ng-options="item.ten_tram for item in TramQuanTracList" ng-model="Tram" id="TramXuLy" ng-change="chonTram()">
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Móc thời gian</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="button" class="form-control float-right" id="daterange-btn">
                    </div>  
                    <!-- /.input group -->
                  </div>    
                  <div class="form-group" ng-show="fillChartShow">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" ng-model="fill" ng-change="fillChart()" class="custom-control-input" id="fillSwitch">
                      <label class="custom-control-label" for="fillSwitch">Tô màu</label>
                    </div>
                  </div>

                  <!-- /.col -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="card">

            <div class="card-header" style="background-color: #212529 ">
              <h5 class="card-title" style="color: #c2c7d0">Thông kê dạng bảng - số liệu trung bình từ {{ngayDau| date:'dd/MM/yyyy' }}  - {{ngayCuoi|date:'dd/MM/yyyy'}} tại : {{chiTietTramQuanTrac.ten_tram}}</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row" >                
                <div class="col-md-6" ng-repeat="danhsach in DanhSachThongKeCacDaiLuong">
                  <!-- TABLE: LATEST ORDERS -->
                  <div class="card">
                    <div class="card-header border-transparent" style="background-color: #212529 ">
                      <h3 class="card-title" style="color: #c2c7d0">{{danhsach.CamBien.ten_cambien}}</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table m-0">
                          <thead>
                            <tr>
                              <th>Giá trị đo trung bình</th>  
                              <th>Thanh mức độ</th>                         
                              <th>Ngày</th>
                            </tr>
                          </thead>
                          <tbody class="text-left">                            
                            <tr ng-repeat="data in danhsach.data">
                              <td><span class="badge " ng-class="{'{{data.bgColor}}':true}">{{data.giatri}} {{danhsach.CamBien.ten_donvi}}</span></td>
                              <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar  " ng-class="{'{{data.bgColor}}':true}"  style="width:{{data.giatri}}%"></div>
                                </div>
                              </td>                   
                              <td><a href="" ng-click="xemChiTiet(danhsach.CamBien.ma_cambien,data.thoigian)" alt="xem chi tiết">{{data.thoigian}}</a></td>
                            </tr>                        
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                      <!-- Table for export exel -->
                        <table hidden  class="table table-bordered table-striped mb-0 m-0"  id="{{danhsach.CamBien.ma_cambien}}">
                          <thead>
                            <tr class="text-center">
                              <th colspan="3">BẢNG THỐNG KÊ TỪ {{ngayDau| date:'dd/MM/yyyy' }}-{{ngayCuoi|date:'dd/MM/yyyy'}}</th>
                            </tr>
                            <tr>
                              <td >Trạm</td>
                              <td colspan="2">{{chiTietTramQuanTrac.ten_tram}}</td>
                            </tr> 

                            <tr>
                              <td>Cảm biến</td>
                              <td colspan="2">{{danhsach.CamBien.ten_cambien}}</td>
                            </tr>
                            <tr class="text-left">
                              <th>Giá trị</th>
                              <th>Đơn vị</th>
                              <th>Thời gian</th>
                            </tr> 
                          </thead>
                          <tbody>
                            <tr ng-repeat="data in danhsach.data">
                              <td>{{data.giatri}}</td>
                              <td>{{danhsach.CamBien.ten_donvi}}</td>
                              <td>{{data.thoigian}}</td>
                            </tr>
                          </tbody>
                        </table>
                          <!-- /.table for export -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <a href="" ng-click="exportToExcel(danhsach.CamBien.ma_cambien,danhsach.CamBien.ten_cambien)" class="btn btn-sm btn-success float-right">Xuất Excel</a>
                    </div>
                    <!-- /.card-footer -->
                  </div>

                  <!-- /.card -->
                </div>          
                <!-- bang tong hop -->
                <table hidden id="bang-tong-hop" class="table table-bordered table-striped mb-0 m-0">
                 <thead>
                  <tr class="text-center">
                    <th colspan="6">THỐNG KÊ TỔNG HỢP</th>
                  </tr>
                  <tr class="text-left">
                    <th>Tên trạm</th>
                    <th>Cảm biến</th>
                    <th>Giá trị</th>
                    <th>Đơn vị</th>
                    <th>Ngày</th>
                    <th>Giờ</th>
                  </tr> 
                </thead>
                <tbody>
                  <tr ng-repeat="value in DuLieuTongHop">
                    <td>{{value.ten_tram}}</td>
                    <td>{{value.ten_cambien}}</td>
                    <td>{{value.giatri}}</td>
                    <td>{{value.ten_donvi}}</td>
                    <td>{{value.ngay}}</td>  
                    <td>{{value.gio}}</td>  
                  </tr>
                </tbody>
              </table>
              <!-- end bang tong hop -->
            </div>
            </div>
              <div class="card-footer clearfix justify-content-right ">
                <a href="" data-toggle="modal" data-target="#cau-hinh-mail" class="btn btn-md btn-warning float-left">Hẹn giờ gửi mail tổng hợp</a>
                <a href="" ng-click="TongHop()" class="btn btn-md btn-primary float-right">Tổng hợp</a>
              </div>
              <!-- /.card-footer -->
          </div>
        </div>
      </div>

      <!-- Modal cấu hình mail -->
      <div class="row">
          <div class="col-md-12">
            <div class="modal fade" id="cau-hinh-mail">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                    <h7 class="modal-title">Cấu hình gửi mail</h7>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row">
                      <label for="to" class="col-sm-4 col-form-label">Email nhận</label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control" id="to" value="{{accountInfor.email}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="hengio" class="col-sm-4 col-form-label">Hẹn giờ gửi</label>
                      <div class="col-sm-8">
                        <input type="time" value="{{accountInfor.thoigiantonghop}}" class="form-control" id="hengio" ng-model="gioHen" />
                      </div>
                    </div>
                  </div>
                  <div class="card-footer clearfix">
                    <a href="" ng-click="apDungHenGio()" class="btn btn-sm btn-success float-right">Áp dụng</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- ./Modal cấu hình mail -->

      <!-- Modal -->
      <div class="row">
          <!-- <button type="button" class="btn btn-default" data-toggle="modal" ng-click="xemChiTiet()">
            Launch Extra Large Modal
          </button> -->
          <div class="col-md-12">
            <div class="modal fade" id="ChiTietTheoNgay">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #212529; color: #c2c7d0">
                    <h7 class="modal-title">Số liệu đo lường ngày {{NgayXem}}</h7>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   <div class="row">
                    <div class="col-md-7">
                      <div class="card">
                        <div class="card-header border-transparent" style="background-color: #212529 ">
                          <h3 class="card-title" style="color: #c2c7d0">
                            Biểu đồ trung bình trong ngày
                          </h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">                      
                          <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="detailChart" height="310" style="height: 310px;"></canvas>
                          </div>
                          <!-- /.chart-responsive -->   
                        </div>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-5">
                      <div class="row">
                        <div class="col border  rounded"><label for="">Tên trạm</label></div>
                        <div class="col border rounded">{{ChiTietThongKeTheoNgay.TramQuanTrac.ten_tram}}</div>
                      </div>
                      <div class="row">
                        <div class="col border  rounded"><label for="">Tên cảm biến</label></div>
                        <div class="col border rounded">{{ChiTietThongKeTheoNgay.CamBien.ten_cambien}}</div>
                      </div>
                      <div class="row">
                        <div class="col border rounded"><label for="">Tên đơn vị</label></div>
                        <div class="col border rounded">{{ChiTietThongKeTheoNgay.CamBien.ten_donvi}}</div>
                      </div>

                      <div class="row">
                        <div class="col border rounded"><label for="">Giá trị cao nhất cho phép</label></div>
                        <div class="col border rounded">{{ChiTietThongKeTheoNgay.CamBien.nguon_tren}}</div>
                      </div> 
                      <div class="row">
                        <div class="col border rounded"><label for="">Giá trị thấp nhất cho phép</label></div>
                        <div class="col border rounded">{{ChiTietThongKeTheoNgay.CamBien.nguon_duoi}}</div>
                      </div>
                      <div class="row">
                        <div class="col border rounded"><label for="">Màu sắc cảnh báo</label></div>
                        <div class="col border rounded">
                          <input disabled="true" type="color" style="width: 100%" value="{{ChiTietThongKeTheoNgay.CamBien.mau}}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col border rounded"><label for="">Xem trung bình theo</label></div>
                        <div class="col border rounded">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input ng-pristine ng-untouched ng-valid ng-empty" type="radio" 
                            ng-model="doChiTiet" value="HH"  id="avg-times" name="avg-view" ng-change="xemChiTiet(ChiTietThongKeTheoNgay.CamBien.ma_cambien,NgayXem,doChiTiet)" >     
                            <label class="form-check-label" for="avg-times">Giờ</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input ng-pristine ng-untouched ng-valid ng-empty" type="radio"  ng-model="doChiTiet" value="HH:mm" id="avg-mins" name="avg-view" checked="true" ng-change="xemChiTiet(ChiTietThongKeTheoNgay.CamBien.ma_cambien,NgayXem,doChiTiet)">     
                            <label class="form-check-label" for="avg-mins">Phút</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input ng-pristine ng-untouched ng-valid ng-empty" type="radio"    ng-model="doChiTiet" value="HH:mm:ss"  id="avg-seconds" name="avg-view" ng-change="xemChiTiet(ChiTietThongKeTheoNgay.CamBien.ma_cambien,NgayXem,doChiTiet)">     
                            <label class="form-check-label" for="avg-seconds">Giây</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.row -->
                  <!-- row -->
                  <div class="row">
                    <div class="col-md-12">
                      <!-- TABLE: LATEST ORDERS -->
                      <div class="card">
                        <div class="card-header border-transparent" style="background-color: #212529 ">
                          <h3 class="card-title" style="color: #c2c7d0">
                            Bảng thống kê
                          </h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <div class="table-responsive" style="position: relative;height:350px ;overflow: auto;">
                            <table class="table table-bordered table-striped mb-0 m-0">
                              <thead>
                                <tr>
                                  <th>Giá trị đo</th>  
                                  <th>Thanh mức độ</th>                         
                                  <th>Thời điểm</th>
                                </tr>
                              </thead>
                              <tbody class="text-left">
                                <tr ng-repeat="item in ThongKeTheoNgay">
                                  <td>{{item.giatri}} {{ChiTietThongKeTheoNgay.CamBien.ten_donvi}}</td>
                                  <td>
                                    <div class="progress progress-xs">
                                      <div class="progress-bar " style="width:{{item.giatri}}%;background-color: {{item.bgColor}}"></div>
                                    </div>
                                  </td>                   
                                  <td>{{item.time}}</td>
                                </tr>                        
                              </tbody>
                            </table>
                          </div>
                          <!-- /.table-responsive -->
                          <!-- Table for export exel -->
                          <table hidden="true" class="table table-bordered table-striped mb-0 m-0" id="BangChiTiet">
                            <thead>
                              <tr class="text-center">
                                <th colspan="3">BẢNG THỐNG KÊ NGÀY {{NgayXem}}</th>
                              </tr>
                              <tr>
                                <td >Trạm </td>
                                <td colspan="2">{{ChiTietThongKeTheoNgay.TramQuanTrac.ten_tram}}</td>
                              </tr> 
                              <tr>
                                <td>Cảm biến</td>
                                <td colspan="2">{{ChiTietThongKeTheoNgay.CamBien.ten_cambien}}</td>
                              </tr>
                              <tr class="text-left">
                                <th>Giá trị</th>
                                <th>Đơn vị</th>
                                <th>Thời gian</th>
                              </tr> 
                            </thead>
                            <tbody>
                              <tr ng-repeat="item in ThongKeTheoNgay">
                                <td>{{item.giatri}}</td>
                                <td>{{ChiTietThongKeTheoNgay.CamBien.ten_donvi}}</td>
                                <td>{{item.time}}</td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- /.table for export -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                          <a href="" ng-click="exportToExcel('BangChiTiet',ChiTietThongKeTheoNgay.CamBien.ten_cambien)" class="btn btn-sm btn-success float-right">Xuất Excel</a>
                        </div>
                        <!-- /.card-footer -->
                      </div>
                      <!-- /.card -->
                    </div>  
                  </div>
                  <!-- /.row -->
                </div>
                <div class="modal-footer justify-content-right">
                  <button type="button" class="btn" style="background-color:#212529;color: #c2c7d0" data-dismiss="modal">Đóng</button>                    
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
      </div>
      

    </section>
    <!-- /.content -->
  </div>


