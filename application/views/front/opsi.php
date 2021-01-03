<div class="row justify-content-center py-2 px-4">
	<div class="col-md-12 mb-2">
		<div class="card shadow animated flash border-left-success shadow h-100 py-2 my-3" id="manual">
			<div class="card-header">
				<h6 class="font-weight-bold text-success text-center">Pilih Opsi</h6>
			</div>
			<div class="card-body">
				<div class="row justify-content-center">
					<div class="col-md-4 mb-2">
						<div class="card border-primary">
							<img class="img-fluid card-img-top" style="height: 220px;width: auto;object-fit: cover;" src="<?= base_url('assets/img/sp2.jpg') ?>">
							<div class="card-body">
								<h4 class="card-title text-primary">Bandingkan Beberapa Smartphone</h4>
								<p class="card-text">
									Bandingkan terlebih dahulu beberapa smartphone yang ingin anda cari untuk mendapatkan hasil rekomendasi smartphone yang diinginkan.
								</p>
								<a href="<?= base_url('cari') ?>" class="btn btn-primary btn-icon-split float-right">
									<span class="icon text-white"><i class="fas fa-chevron-circle-right"></i></span>
									<span class="text">Cari Rekomendasi</span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-2">
						<form method="POST" enctype="multipart/form-data" id="form_direct" action="pembobotan">
							<div class="card border-info">
								<img class="img-fluid card-img-top" style="height: 220px;width: auto;object-fit: cover;object-position: -20% 0;" src="<?= base_url('assets/img/sp.jpg') ?>">
								<div class="card-body">
									<h4 class="card-title text-info">Langsung Menuju Pembobotan</h4>
									<p class="card-text">
										Tidak perlu memilih berbagai smartphone untuk dibandingkan, anda bisa langsung menjawab beberapa pertanyaan untuk mendapatkan hasil rekomendasi smartphone yang diinginkan.
									</p>
									<?php for ($i=0; $i < count($smartphone); $i++) { ?>
									<input type="text" name="hp[]" value="<?= $smartphone[$i]->id ?>" hidden>
									<?php } ?>
									<button class="btn btn-info float-right" id="btn_cari">
										<i class="fas fa-rocket"></i>&nbsp;Menuju Pembobotan
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<a href="<?= base_url('beranda') ?>" class="btn btn-success btn-icon-split">
					<span class="icon text-white"><i class="fas fa-chevron-circle-up"></i></span>
					<span class="text">Kembali</span>
				</a>
			</div>
		</div>
	</div>
</div>