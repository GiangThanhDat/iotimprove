<?php 	
	$masterController = new controller;								
	$CamBienModel = $masterController->model("cambien");
	$DaiLuongModel = $masterController->model("dailuongdo");

	$cambienList = json_decode($CamBienModel->listAll(),true);
	$dailuongList = json_decode($DaiLuongModel->listAll(),true);
	$sensorMeasuresList = json_decode($data['sensorMeasuresList'],true);
	$sensorsStationList = json_decode($data['sensorsStationList'],true);
	$unitsList = json_decode($data['unitsList'],true);
	$tram_dang_xem = json_decode($data['tram_obj'],true);
	$ma_tram = $tram_dang_xem['ma_tram'];

?>
<div class="container-fluid">
	<hr>
	<div class="row">
		<div class="col-sm-6  col-md-4">
			<a  href="collect/addCB/<?= $ma_tram ?>" >
				<button type="button" class="btn btn-outline-primary" style="width: 311.7px">
					Bổ sung cảm biến
				</button>
			</a>	
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="btn-group">
				<button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="setting" value="1">
					<!-- <i class="fa fa-cog"></i> -->
					Bổ sung đại lượng theo cảm biến
				</button>
				<ul class="dropdown-menu pull-right" style="padding: 10px 10px">
					<?php foreach ($sensorsStationList as $cb): ?>
						<li>
							<a href="collect/addDL/<?= $ma_tram ?>/<?= $cb['ma_cambien'] ?>">
								<button class="btn btn-outline-secondary bt-sm" style="width: 280px;">
									<?= $cb['ten_cambien'] ?>
								</button>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
		<div class="col-7"></div>
	</div>
	<hr>
	<!-- <div class="row"> -->
		<div class="card-columns ">
			<?php foreach ($sensorMeasuresList as $value): ?>
				<?php 
			// prepare data
			// print_r($CamBienModel->getByKey($value['ma_cambien']));			
			// print_r($DaiLuongModel->getByKey($value['ma_dailuong']));
				$cambienObj = json_decode($CamBienModel->getByKey($value['ma_cambien']),true);
				$dailuongObj = json_decode($DaiLuongModel->getByKey($value['ma_dailuong']),true);		
				$ma_cambien = $cambienObj['ma_cambien'];
				$ma_dailuong = $dailuongObj['ma_dailuong'];

				?>			
				<!-- style="width: 610px;" -->
				<div class="card text-white text-center" style="width:auto;height: 300px;"	> 
					<div class="card-header bg-success">
						<div class="row">
							<div class="col-md-10 bg-white text-black rounded">
								<p style="color: black;">Bảng Giá Trị-Đo Lường</p>
								<!-- <p style="color: black;"><?= $ma_cambien ?>_<?= $ma_dailuong ?></p> -->
							</div>
							<div class="col-md-2" style="text-align:right">
								<div class="">
									<button type="label" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="setting" value="1">
										<i class="fa fa-cog"></i>
									</button>
									<ul class="dropdown-menu pull-right" style="padding: 10px 10px">
										<li>
											<form action="collect/editDL/<?= $ma_tram ?>/<?= $ma_dailuong ?>" method="POST">
												<div class="input-group">
													<span class="input-group-addon">Mức cảnh báo trên</span>
													<input type="number" step="any" name="nguon_tren" required="" value="<?= $dailuongObj['nguon_tren'] ?>">
													<span class="input-group-addon">Mức cảnh báo dưới</span>
													<input type="number" step="any" name="nguon_duoi" required="" value="<?= $dailuongObj['nguon_duoi'] ?>">
												</div>			
												<div class="input-group">
													<span class="input-group-addon">Màu sắc cảnh báo</span>
													<input type="color" value="<?= $dailuongObj['mau'] ?>" name="mau" required="" style="width:100%">
												</div>	
												<br>
												<input class="btn btn-primary" value="Lưu lại" type="submit">
											</form>
										</li>
									</ul>
								</div>
							</div>						
						</div>
					</div>
					<div class="card-body text-white">
						<table class="table responsive border">
							<tr>
								<th class="border"><p class="card-text"><?= $cambienObj['ten_cambien'] ?></p>
								</th>
								<th class="	border"><?= $dailuongObj['ten_dailuong'] ?></th>
							</tr>
							<tr bgcolor="" >
								<th>
									<p class="card-text" id="val_<?= $ma_tram ?>_<?= $ma_cambien ?>_<?= $ma_dailuong ?>"></p>									
								</th>
								<th >
									<p class="card-text" id="dv_<?= $ma_tram ?>_<?= $ma_cambien ?>_<?= $ma_dailuong ?>"><?= $dailuongObj['ten_donvi'] ?></p>
								</th>
							</tr>
							<tr>
								<th colspan="2" class="text-center">
									<p class="card-text " id="time_<?= $ma_tram ?>_<?= $ma_cambien ?>_<?= $ma_dailuong ?>"></p>
								</th>
							</tr>
						</table>							
					</div>	
					<div class="card-footer bg-info">
						<a href="collect/chart/<?= $ma_tram ?>/<?= $ma_cambien ?>/<?= $ma_dailuong ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
					</div>				
				</div>	
			<?php endforeach ?>
		</div>
	<!-- </div> -->
	<hr>
</div>
<script type="text/javascript">
	const idStation = <?= $ma_tram ?>;
	const sensorMeasuresList = <?= $data['sensorMeasuresList'] ?>;
</script>
<script src="./public/js/demo/loadData.js"></script>
