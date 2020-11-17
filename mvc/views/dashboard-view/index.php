<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header">			
			<select name="num_rows" id="num_rows" class="btn btn-primary btn-sm">			
				<option class="btn-sm btn-light">CHỌN SỐ DÒNG MUỐN HIỂN THỊ</option>
				<option class="btn-sm btn-light"   value="0">1</option>
				<option class="btn-sm btn-dark"    value="9">10</option>
				<option class="btn-sm btn-danger"   value="19">20</option>
				<option class="btn-sm btn-warning"  value="29">30</option>
				<option class="btn-sm btn-info" 	value="39">40</option>
				<option class="btn-sm btn-success"  value="59">50</option>
			</select>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-hover display" id="dashboard-table">
					<thead>
						<tr>
							<th>Trạm</th>
							<th>Cảm biến</th>
							<th>Đại lượng</th>
							<th>Giá trị</th>
							<th>Đơn vị</th>
							<th>Thời gian</th>				
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>				
			</div>
		</div>
	</div>	
</div>
<script type="text/javascript">
	const generalLoad = <?= $data['generalLoad'] ?>;
</script>
<script src="./public/js/demo/dashboardDatatable.js"></script>