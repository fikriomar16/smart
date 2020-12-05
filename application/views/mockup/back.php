<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= $title?></title>
	<link rel="icon" href="<?= base_url('assets/img/logo_uty.png') ?>">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/sb-admin-2.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fa/css/all.css">
</head>
<body>
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
				<div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-fw fa-balance-scale"></i></div>
				<div class="sidebar-brand-text mx-1">&nbsp;Recommendation System</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item active">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<hr class="sidebar-divider">
			<div class="sidebar-heading">Master</div>
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#InsertData" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-database"></i>
					<span>Insert Data</span>
				</a>
				<div id="InsertData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Inputkan Data :</h6>
						<a class="collapse-item" href="#">Data 1</a>
						<a class="collapse-item" href="#">Data 2</a>
						<div class="collapse-divider"></div>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-cogs"></i>
					<span>Setting</span>
				</a>
			</li>
			<hr class="sidebar-divider">
			<div class="sidebar-heading">Lainnya</div>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-envelope-open-text"></i>
					<span>Lainnya 1</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="far fa-fw fa-list-alt"></i>
					<span>Lainnya 2</span>
				</a>
			</li>
			<hr class="sidebar-divider d-none d-md-block">
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
					<div class="d-sm-flex align-items-center justify-content-between">
						<h5 class="mb-0 text-gray-800"></h5>
					</div>
					<ul class="navbar-nav ml-auto">
						<div class="topbar-divider d-none d-sm-block"></div>
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">User Name</span>
								<img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/user.png">
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profil
								</a>
								<a class="dropdown-item" href="#">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Pengaturan
								</a>
								<a class="dropdown-item" href="#">
									<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
									Log Aktivitas
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Keluar
								</a>
							</div>
						</li>
					</ul>
				</nav>

				<div class="container-fluid"></div>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
	<script type="text/javascript">
	</script>
</body>
</html>