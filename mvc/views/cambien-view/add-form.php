<?php 
$listSensorsByStation = json_decode($data['listSensorsByStation'],true);
$tram_dang_xem = json_decode($data['tram_obj'],true);
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
		<div class="col-md-4"></div>
		<div id="list-all-alert-success" class="alert alert-success alert-dismissible fade show text-center col-md-4" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Cập nhật thành công!!</strong><hr>
		</div>
		<div id="list-all-alert-fail" class="alert alert-danger alert-dismissible fade show text-center col-md-4" role="alert">
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
						<label for="ten_cambien">Mả cảm biến</label>
						<input type="number" class="form-control" name="ma_cambien" id="ma_cambien" placeholder="Nhập số">
					</div>					
					<div class="form-group col-md-6">
						<label for="ten_cambien">Tên cảm biến</label>
						<input type="text" class="form-control" name="ten_cambien" id="ten_cambien" placeholder="Nhập tên">
					</div>
				</div>
				<!-- Illustrations -->
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="text-center">
							<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="./public/img/undraw_button_style_70y7.svg" alt="">
						</div>					
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
					<h6 class="m-0 font-weight-bold text-primary">Danh sách cảm biến đã lắp tại trạm: <?= $tram_dang_xem['ma_tram'] ?> - <?= $tram_dang_xem['ten_tram'] ?></h6>
				</div>
				<div class="card-body">	
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Mả cảm biến</th>
									<th>Tên cảm biến</th>              
									<th class="text-center">remove</th>			              
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

	<script type="text/javascript">
		const ma_tram = <?= $tram_dang_xem['ma_tram'] ?>
	</script>

