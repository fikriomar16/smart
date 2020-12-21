<div class="row justify-content-center py-2 px-4">
	<div class="col-md-6 mb-2">
		<div class="card shadow animated flash border-left-danger shadow h-100 py-2 my-3" id="manual">
			<div class="card-header">
				<h6 class="font-weight-bold text-danger text-center">Bantuan</h6>
			</div>
			<?php $d = $detail_con->row(); ?>
			<div class="card-body">
				<!-- Isi -->
				<?= $d->halaman_bantuan;?>
			</div>
			<div class="card-footer text-center">
				<a href="<?= base_url('beranda') ?>" class="btn btn-danger btn-icon-split">
					<span class="icon text-white"><i class="fas fa-chevron-circle-up"></i></span>
					<span class="text">Kembali</span>
				</a>
				<a href="<?= base_url('find') ?>" class="btn btn-primary btn-icon-split m-1">
					<span class="icon text-white"><i class="fas fa-list"></i></span>
					<span class="text">Cari Rekomendasi</span>
				</a>
			</div>
		</div>
	</div>
</div>