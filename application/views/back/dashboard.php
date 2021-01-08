<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h4 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Smartphone</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_smartphone ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-mobile fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Kriteria</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kriteria ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-sign fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Perhitungan</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_perhitungan ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-calculator fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Paling Banyak Dicari</div>
						<div class="h6 mb-0 font-weight-bold text-gray-800">
						<?php if ($most_freq == false) {
							echo "Tidak Ada Data";
						} else {
							echo $most_freq->merk.' '.$most_freq->seri.' ('.$most_freq->id_smartphone.'x Dicari)';
						}
						?>						
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Paling Banyak Dicari</div>
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
							</div>
							<div class="col">
								<div class="progress progress-sm mr-2">
									<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div> -->

</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card border-bottom-primary shadow mb-4">
			<div class="card-header py-3">
				<h6 class="text-center m-0 font-weight-bold text-primary"><i class="fas fa-chart-line fa-fw"></i>  Perolehan Data</h6>
			</div>
			<div class="card-body">
				<canvas id="myChart" width="350" height="110"></canvas>
			</div>
		</div>
	</div>
</div>