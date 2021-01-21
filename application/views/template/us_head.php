<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Sistem Rekomendasi Smartphone Android merupakan sistem yang merekomendasikan kepada pengguna dalam menentukan Smartphone Android yang sesuai dengan kriteria pengguna.">
	<meta name="author" content="Fikri Omar">
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>
	<title><?= $title?></title>
	<link rel="icon" href="<?= base_url('assets/img/logo_uty2.png') ?>">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/sb-admin-2.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/animate.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fa/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/sweetalert/dist/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css">
	<style type="text/css">
		body{
			<?php
			$pf = $this->agent->platform();
			if ($pf=='Android'||$pf=='iOS') {
				$img='bgalt.jpg';
				$pd='px-1';
			} else {
				$img='bg.jpg';
				$pd='';
			}
			?>
			background: linear-gradient(0deg, rgba(41,67,138,0.19091386554621848) 0%, rgba(14,14,14,0.7035189075630253) 100%), url(<?= base_url('assets/img/'.$img) ?>);
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment:fixed;
			opacity: 0.98;
		}
	</style>
</head>
<body id="page-top" class="sb-nav-fixed">
	<?php $p = $this->uri->segment(1); ?>
	<nav class="sb-topnav navbar navbar-expand-lg navbar-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url() ?>"><i class="fas fa-fw fa-mobile-alt"></i>&nbsp; Sistem Rekomendasi</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?php if($p == '' || $p == 'beranda'){echo "active font-weight-bold";} ?>">
						<a class="nav-link" href="<?= base_url('beranda') ?>"><i class="fas fa-fw fa-home"></i>&nbsp;Beranda <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item <?php if($p == 'list' || $p == 'daftar'){echo "active font-weight-bold";} ?>">
						<a class="nav-link" href="<?= base_url('daftar') ?>"><i class="fas fa-fw fa-list"></i>&nbsp;List Smartphone</a>
					</li>
					<li class="nav-item <?php if($p == 'find' || $p == 'cari' || $p == 'pembobotan' || $p == 'opsi'){echo "active font-weight-bold";} ?>">
						<a class="nav-link" href="<?= base_url('opsi') ?>"><i class="fas fa-fw fa-search"></i>&nbsp;Cari Rekomendasi</a>
					</li>
					<li class="nav-item <?php if($p == 'help' || $p == 'bantuan'){echo "active font-weight-bold";} ?>">
						<a class="nav-link" href="<?= base_url('bantuan') ?>"><i class="fas fa-fw fa-info"></i>&nbsp;Bantuan</a>
					</li>
					<li class="nav-item <?php if($p == 'riwayat'){echo "active font-weight-bold";} ?>">
						<a class="nav-link" href="<?= base_url('riwayat') ?>"><i class="fas fa-fw fa-history"></i>&nbsp;Riwayat Pencarian</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<p class=" d-lg-inline small"><i class="fas fa-fw fa-ellipsis-v"></i>&nbsp;&nbsp;
								<?php
								if ($this->session->userdata('user')) {
									echo '<i class="fas fa-fw fa-user-circle"></i>&nbsp;'.$this->session->userdata('user')['nama'];
								} else {
									echo "Opsi";
								}
								?>
							</p>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<?php if ($this->session->userdata('user')) { ?>
								<a class="dropdown-item" href="#" id="btn_edt_user">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Ubah Pengaturan Akun
								</a>
							<?php } ?>
							<?php if ($this->session->userdata('admin')) { ?>
								<a class="dropdown-item" href="<?= base_url('admin') ?>">
									<i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
									Menuju Dashboard
								</a>
							<?php } elseif (!$this->session->userdata('user')) { ?>
								<a class="dropdown-item" href="<?= base_url('masuk') ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Login
								</a>
							<?php } ?>
							<div class="dropdown-divider"></div>
							<?php if ($this->session->userdata('admin') || $this->session->userdata('user')) { ?>
								<a class="dropdown-item" href="#" onclick="logout();">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Keluar
								</a>
							<?php } ?>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid <?= $pd ?>">
