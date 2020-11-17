
<?php 	
	$listMeasuresBySensor = json_decode($data['listMeasuresBySensor'],true);	
	$tram_dang_xem = json_decode($data['tram_obj'],true);
	$cambienObj = json_decode($data['cb_obj'],true);	
 ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div id="alert-success" class="alert alert-success alert-dismissible fade show text-center col-md-4" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Thêm thành công!!</strong><hr>
		</div>
		<div id="alert-fail" class="alert alert-danger alert-dismissible fade show text-center col-md-4" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Xẩy ra lổi, vui lòng kiểm tra lại</strong><hr>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<form id="add-from">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="tendailuong">Mả đại lượng</label>
						<input type="number" class="form-control" name="ma_dailuong" placeholder="Nhập mả">
					</div>
					<div class="form-group col-md-6">
						<label for="tendailuong">Tên đại lượng</label>
						<input type="text" class="form-control" name="ten_dailuong" placeholder="Nhập tên">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="donvitinh">Đơn vị</label>
						<select class="form-control ma_donvi"  name="ma_donvi">
							<option selected>chọn đơn vị...</option> 
						</select>     
					</div>					
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nguon-tren">Mức cảnh báo tối đa</label>
						<input type="number" class="form-control" name="nguon_tren" placeholder="nhập số nhé">
					</div>
					<div class="form-group col-md-6">
						<label for="nguon-duoi">Mức cảnh bao tối thiểu</label>
						<input type="number" class="form-control" name="nguon_duoi" placeholder="nhập số nhé">
					</div>			
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="mau-canh-bao">Màu cảnh báo</label>
						<input type="color" name="mau" id="mau-canh-bao" style="width: 100%">				
					</div>
			</div>
			<button type="submit" class="btn btn-primary col-md-12">Lưu</button>
		</form>				
	</div>
	<!-- Ảnh trang trí -->
	<div class="col-lg-6 mb-4">
		<!-- Illustrations -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Các đại lượng đã cài đặt cho cảm biến <?= json_decode($data['cb_obj'],true)['ten_cambien'] ?> tại trạm: <?= $tram_dang_xem['ma_tram'] ?> - <?= $tram_dang_xem['ten_tram'] ?></h6>
			</div>
			<div class="card-body">
			      <div class="table-responsive">
			        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			          <thead>
			            <tr>
			              <th>Mả đại lượng đo</th>
			              <th>Tên đại lượng đo</th>
			              <th>Tên đơn vị đo</th>
			              <th>Ngưỡn trên</th>
			              <th>Ngưỡn dưới</th>
			              <th>Màu cảnh báo</th>              
			              <th class="text-center">Delete</th>
			            </tr>
			          </thead>
			        <tbody>               
			        </tbody>
			      </table>
			    </div>				
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đơn vị đo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>          
      </div>
      <div class="modal-body">
        <select class="form-control" id="ma_donvi"> 
        </select>        
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-primary col-md-12" data-dismiss="modal" id="close-donvi">Lưu</button>
      </div>
    </div>

  </div>

</div>


<script type="text/javascript">
	const ma_tram = <?= $tram_dang_xem['ma_tram'] ?>;
	const ma_cb = <?= $cambienObj['ma_cambien'] ?>;
</script>
