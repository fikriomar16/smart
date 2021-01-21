<style type="text/css">
	.btn-image:before {
		content: "";
		width: 17px;
		height: 17px;
		display: inline-block;
		margin-right: 5px;
		vertical-align: text-top;
		background-color: transparent;
		background-position : center center;
		background-repeat:no-repeat;
	}
	.image-btn:before{
		background-image : url(https://pbs.twimg.com/profile_images/1295283628872568832/bL9i6lY0_400x400.jpg) !important;
		background-size: cover;
		border-radius: 50%;
	}
</style>
<?php
$d = $detail_con->row();
$session = $this->session->userdata('user');
if ($session) { $url = base_url('list'); } else { $url = base_url('login'); }
?>
<div class="m-0">
	<div class="row justify-content-center py-2 my-5 px-5">
		<div class="col-md-4 mb-2">
			<div class="card border-0 animated fadeInDownBig shadow-lg">
				<img class="card-img-top img-fluid shadow-lg" src="<?= base_url('assets/img/sp.jpg') ?>">
				<div class="card-body">
					<center>
						<h4 class="font-weight-bold text-primary py-3"><?= $d->nama_aplikasi;?></h4>
						<h5 class="font-weight-bold"><?= $d->nama_instansi;?></h5>
						<p class="font-italic"><?= $d->alamat_instansi;?></p>
						<a href="<?= $url ?>" class="btn btn-primary btn-icon-split m-1">
							<span class="icon text-white"><i class="fas fa-chevron-circle-right"></i></span>
							<span class="text">Berikutnya</span>
						</a>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div class="fixed-bottom justify-content-center">
		<a class="btn btn-dark text-white float-right btn-image image-btn m-3" href="https://github.com/fikriomar16/" target="_blank">
			Project
		</a>
	</div>
</div>
<?php if($flash): ?>
<div class="flash-data" data-type="<?= $flash['type']; ?>" data-title="<?= $flash['title']; ?>"></div>
<?php endif; ?>