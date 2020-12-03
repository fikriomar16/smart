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
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/animate.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fa/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/sweetalert/dist/sweetalert2.css">
	<style type="text/css">
		body{
			/*background: #e7e8eb;*/
			background: url(<?= base_url('assets/img/bg.jpg') ?>);
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment:fixed;
			opacity: 0.98;
		}
	</style>
</head>
<body id="page-top">
	<?php $p = $this->uri->segment(1); ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="<?= base_url() ?>"><i class="fas fa-fw fa-balance-scale"></i>&nbsp; Recommendation System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php if($p == ''){echo "active";}elseif($p == 'beranda'){echo "active";} ?>">
					<a class="nav-link" href="<?= base_url('beranda') ?>"><i class="fas fa-fw fa-home"></i>&nbsp;Beranda <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fas fa-fw fa-ellipsis-h"></i>&nbsp;Selanjutnya</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<?php?>
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<p class=" d-lg-inline small"><i class="fas fa-fw fa-ellipsis-v"></i>&nbsp;Options</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Login
						</a>
						<a class="dropdown-item" href="#">
							<i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
							Ganti Password
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Keluar
						</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="m-0">
			<div class="card animated fadeInDown border-left-success shadow h-100 py-2 my-5">
				<div class="card-body">
					<center>
						<img class="m-4 img-fluid animated flash" src="<?= base_url('assets/img/logo_uty.png') ?>" style="height: 150px;">
						<h4 class="font-weight-bold">ANALISIS PERBANDINGAN METODE SMART DAN AHP PADA PENDUKUNG KEPUTUSAN PEMILIHAN SMARTPHONE ANDROID</h4>
						<hr>
						<h5 class="font-weight-bold">Universitas Teknologi Yogyakarta</h5>
						<hr>
						<p class="font-italic">5150411175 - M Fikri Omar</p>
						<a href="<?= base_url() ?>" class="btn btn-success btn-icon-split m-1">
							<span class="icon text-white"><i class="fas fa-chevron-circle-right"></i></span>
							<span class="text">Berikutnya</span>
						</a>
					</center>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
	<script src="<?= base_url() ?>assets/vendor/sweetalert/dist/sweetalert2.js"></script>
	<script type="text/javascript">
	</script>
</body>
</html>