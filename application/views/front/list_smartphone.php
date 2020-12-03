<div class="card shadow animated fadeInRightBig border-bottom-success shadow h-100 py-2 my-3" id="manual">
	<div class="card-header">
		<h5 class="font-weight-bold text-success text-center">List Smartphone</h5>
	</div>
	<div class="card-body" id="data_list">
		<!-- Isi -->
		<div class="row justify-content-center py-2">
			<div class="col-md-2 mb-4">
				<div class="card shadow h-100">
					<img class="card-img-top" src="https://github.com/fluidicon.png" alt="Smartphone">
					<div class="card-body">
						<p class="card-text">Merk & Harga.</p>
					</div>
					<div class="card-footer">
						<button class="btn btn-sm btn-block btn-outline-primary" onclick="">
							<i class="fas fa-eye"></i>&nbsp; Detail
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer text-center">
		<!-- <a href="<?= base_url('beranda') ?>" class="btn btn-danger btn-icon-split">
			<span class="icon text-white"><i class="fas fa-chevron-circle-up"></i></span>
			<span class="text">Kembali</span>
		</a> -->
		<a href="<?= base_url('find') ?>" class="btn btn-success btn-icon-split m-1">
			<span class="icon text-white"><i class="fas fa-search"></i></span>
			<span class="text">Cari Rekomendasi</span>
		</a>
	</div>
</div>