<div class="row justify-content-center py-2">
	<div class="col-md-12 mb-2">
		<div class="card shadow border-bottom-success shadow h-100 py-2 my-3" id="manual">
			<div class="card-header">
				<h6 class="font-weight-bold text-success text-center">Riwayat Pencarian Anda</h6>
			</div>
			<div class="card-body">
			<?php if ($status) { ?>
				<div class="table-responsive">
					<table class="table table-hover table-striped table-borderless" id="tab_log">
						<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>Waktu Perhitungan</th>
								<th>Merk</th>
								<th>Hasil Perhitungan</th>
							</tr>
						</thead>
						<tbody id="show_log">
						</tbody>
					</table>
				</div>
			<?php } else { ?>
				<div class="alert alert-danger text-center mb-5" role="alert">** Anda Belum Melakukan Pencarian, Silahkan melakukan pencarian terlebih dahulu **</div>
			<?php } ?>
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