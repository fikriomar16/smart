<div class="card shadow animated fadeInRightBig border-bottom-success shadow h-100 py-2 my-3" id="manual">
	<div class="card-header">
		<h5 class="font-weight-bold text-success text-center">List Smartphone</h5>
	</div>
	<div class="card-body">
		<!-- Isi -->
		<?php
		$platform = $this->agent->platform();
		if ($platform=="Android" | $platform=="iOS") {
			$cardsize = 'col-6';
			$imgsize = '';
		} else {
			$cardsize = 'col-md-2';
			$imgsize = '';
		}
		?>
		<div class="row justify-content-center py-2" id="data_list">
			<!-- <div class="<?= $cardsize; ?> mb-2">
				<div class="card shadow h-100">
					<center>
						<img class="card-img-top img-responsive img-fluid" src="https://github.com/fluidicon.png" alt="Smartphone" <?= $imgsize;  ?>>
					</center>
					<div class="card-body">
						<p class="card-text">Merk & Harga.</p>
					</div>
					<div class="card-footer">
						<button class="btn btn-sm btn-block btn-outline-primary" onclick="">
							<i class="fas fa-eye"></i>&nbsp; Detail
						</button>
					</div>
				</div>
			</div> -->
		</div>
		<div id='pagination'></div>
	</div>
	<div class="card-footer text-center">
		<a href="<?= base_url('find') ?>" class="btn btn-success btn-icon-split m-1">
			<span class="icon text-white"><i class="fas fa-search"></i></span>
			<span class="text">Cari Rekomendasi</span>
		</a>
	</div>
</div>