<div class="m-0">
	<div class="card animated fadeInUpBig border-left-success shadow h-100 py-2 my-5">
		<div class="card-body">
			<center>
				<img class="m-4 img-fluid" src="<?= base_url('assets/img/sp1.png') ?>" style="height: 150px;">
				<?php $d = $detail_con->row(); ?>
				<h4 class="font-weight-bold"><?= $d->nama_aplikasi;?></h4>
				<hr>
				<h5 class="font-weight-bold"><?= $d->nama_instansi;?></h5>
				<hr>
				<p class="font-italic"><?= $d->alamat_instansi;?></p>
				<a href="<?= base_url('list') ?>" class="btn btn-success btn-icon-split m-1">
					<span class="icon text-white"><i class="fas fa-chevron-circle-right"></i></span>
					<span class="text">Berikutnya</span>
				</a>
			</center>
		</div>
	</div>
</div>