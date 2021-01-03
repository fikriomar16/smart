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
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/sweetalert/dist/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/summernote/summernote-bs4.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css">
	<script type="text/javascript">
	</script>
</head>
<body>
	<?php $p = $this->uri->segment(1); ?>
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
				<div class="sidebar-brand-icon rotate-15"><i class="fas fa-fw fa-mobile-alt"></i></div>
				<div class="sidebar-brand-text mx-1">&nbsp;Admin Page</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item <?php if($p=='admin'){echo "active";} ?>">
				<a class="nav-link" href="<?= base_url('admin') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<hr class="sidebar-divider">
			<div class="sidebar-heading">Master</div>
			<li class="nav-item <?php if($p=='smartphone'||$p=='kriteria'||$p=='pertanyaan'||$p=='perhitungan'){echo "active";} ?>">
				<a class="nav-link <?php if($p!='smartphone'||$p!='kriteria'||$p!='pertanyaan'||$p!='perhitungan'){echo "collapsed";} ?>" href="#" data-toggle="collapse" data-target="#InsertData" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-database"></i>
					<span>Master Data</span>
				</a>
				<div id="InsertData" class="collapse <?php if($p=='smartphone'||$p=='kriteria'||$p=='pertanyaan'||$p=='perhitungan'){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Inputkan Data :</h6>
						<a class="collapse-item <?php if($p=='smartphone'){echo "active";} ?>" href="<?= base_url('smartphone') ?>">
							<i class="fas fa-fw fa-angle-right"></i> Data Smartphone
						</a>
						<a class="collapse-item <?php if($p=='kriteria'){echo "active";} ?>" href="<?= base_url('kriteria') ?>">
							<i class="fas fa-fw fa-angle-right"></i> Data Kriteria
						</a>
						<a class="collapse-item <?php if($p=='pertanyaan'){echo "active";} ?>" href="<?= base_url('pertanyaan') ?>">
							<i class="fas fa-fw fa-angle-right"></i> Data Pertanyaan
						</a>
						<a class="collapse-item <?php if($p=='perhitungan'){echo "active";} ?>" href="<?= base_url('perhitungan') ?>">
							<i class="fas fa-fw fa-angle-right"></i> Data Perhitungan
						</a>
						<div class="collapse-divider"></div>
					</div>
				</div>
			</li>
			<hr class="sidebar-divider">
			<div class="sidebar-heading">Lainnya</div>
			<li class="nav-item <?php if($p=='addadmin'){echo "active";} ?>">
				<a class="nav-link" href="<?= base_url('addadmin') ?>">
					<i class="fas fa-fw fa-user-cog"></i>
					<span>Data Pengguna</span>
				</a>
			</li>
			<li class="nav-item <?php if($p=='pengaturan'){echo "active";} ?>">
				<a class="nav-link" href="<?= base_url('pengaturan') ?>">
					<i class="fas fa-fw fa-cogs"></i>
					<span>Pengaturan</span>
				</a>
			</li>
			<!-- <li class="nav-item">
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
			<hr class="sidebar-divider d-none d-md-block"> -->
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
								<span class="mr-2 d-none d-lg-inline text-gray-600 font-weight-bold">
									<i class="fas fa-user-circle"></i>  <?= $this->session->userdata('admin')['nama']; ?>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#" onclick="logout();">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Keluar
								</a>
							</div>
						</li>
					</ul>
				</nav>

				<div class="container-fluid">