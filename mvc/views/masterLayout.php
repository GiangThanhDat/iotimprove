<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<base href="/" /> <!-- đường dẫn tuyệt đối -->
	<title>Website Quản Trị Trạm Quan Trắc Bãi Rác</title>

	<!-- Custom fonts for this template-->
	<link href="./public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="./public/css/style.css">
	<!-- Custom styles for this template-->
	<link href="./public/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Các biến toàn cục để xử lý javascript -->
	<script type="text/javascript">
	  const dataTableList = <?php if(array_key_exists("myList", $data)) echo $data['myList']; else echo "null"; ?>; // dữ liệu là một mảng javascript   
	  const model = "<?php echo $data['model']; ?>";
	  const attachLists = <?php if(array_key_exists("attachLists", $data)) echo json_encode($data['attachLists']); else echo "null"; ?>;
	  const obj = <?php if(array_key_exists("obj", $data)) echo $data['obj']; else echo "null"; ?>;
	  const attachObj = <?php if(array_key_exists("attachObj", $data)) echo $data['attachObj']; else echo "null"; ?>;
	</script>            	
	<!-- Bootstrap core JavaScript-->
	<script src="./public/vendor/jquery/jquery.min.js"></script>
	<script src="./public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="./public/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="./public/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="./public/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="./public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="./public/js/demo/main.js"></script>
	<!-- Page level plugins -->
	<script src="./public/vendor/chart.js/Chart.min.js"></script>
</head>
	
<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">		
		<!-- Sidebar -->
		<?php require_once VIEWS.'layout/sidebar.php' ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<?php require_once VIEWS.'layout/topbar.php' ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<?php require_once  VIEWS.$data['model-view'].'/'.$data['pages'].'.php'?>
				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->
			<!-- Footer -->
			<?php require_once	VIEWS.'layout/footer.php' ?>
			<!-- End of Footer -->
		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Bạn có thật sự muốn đăng xuất</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Nhấn "Logout" bên dưới để đăng xuất</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login/logout">Logout</a>
				</div>
			</div>
		</div>
	</div>

	
              <!-- /.container-fluid -->

</body>

</html>
