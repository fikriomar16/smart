<?php
$id_smartphone = $hasil['id_smartphone'];
$result = array();
for ($i=0; $i < sizeof($hasil['perhitungan']); $i++) { 
	$result[$i] = [
		'id_smartphone' => $id_smartphone[$i],
		'final_score' => $hasil['perhitungan'][$id_smartphone[$i]]['final_score'][0]
	];
}
$temp_res = array_column($result, 'final_score');
array_multisort($temp_res, SORT_DESC, $result);
$temp_hasil = array();
for ($j=0; $j < sizeof($result); $j++) { 
	for ($k=0; $k < sizeof($hasil['perhitungan'][$result[$j]['id_smartphone']]['value_utilities']); $k++) { 
		$temp_hasil[$j][$k] = [
			'alternatif' => select_smart($result[$j]['id_smartphone']),
			'kriteria' => select_kriteria($hasil['id_kriteria'][$k]),
			'normalisasi' => $hasil['perhitungan'][$result[$j]['id_smartphone']]['normalisasi'][$k],
			'values_util' => $hasil['perhitungan'][$result[$j]['id_smartphone']]['value_utilities'][$k],
			'total' => $hasil['perhitungan'][$result[$j]['id_smartphone']]['total'][$k],
			'skor' => $hasil['perhitungan'][$result[$j]['id_smartphone']]['final_score'][0]
		];
	}
}
?>
<?php
$platform = $this->agent->platform();
if ($platform=="Android" || $platform=="iOS") {
	$cardsize = 'col-6';
	$size = 'small';
} else {
	$cardsize = 'col-md-3';
	$size = '';
}
?>
<div class="row justify-content-center mb-2">
	<div class="col-md-12">
		<div class="card shadow animated fadeInDownBig border-bottom-info shadow h-100 py-2 my-3" id="manual">
			<div class="card-header">
				<h6 class="font-weight-bold text-info text-center">Hasil Rekomendasi</h6>
			</div>
			<div class="card-body">
				<div class="row justify-content-center">
				<?php for ($j=0; $j < $limit; $j++) { ?>
				<?php $value = select_smart($result[$j]['id_smartphone']) ?>
					<div class="<?= $cardsize ?> <?= $size ?> mb-2">
						<div class="card shadow h-100">
							<div class="card-header">
								<h5 class="font-weight-bold text-center text-primary">Rangking <?= $j+1 ?></h5>
							</div>
							<div class="card-body">
								<center><img class="img-responsive img-fluid mb-5" src="<?= base_url('assets/img/smartphone/'.$value->foto) ?>" style="height: 125px;width: auto;"></center>
								<ul class="px-3 my-0">
									<li><?= $value->merk.' '.$value->seri ?></li>
									<li><?= $value->ram.' GB - '.$value->rom.' GB' ?></li>
									<li>Rp. <?= number_format($value->harga,0,',','.') ?></li>
								</ul>
							</div>
							<div class="card-footer">
								<p class="text-center text-primary font-weight-bold">Score : <?= number_format($result[$j]['final_score'],4) ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
			<div class="card-footer text-center">
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center py-2 mb-4">
	<div class="col-md-12">
		<div class="card shadow animated fadeInDownBig border-left-info shadow h-100 py-2 my-3">
			<div class="card-header">
				<h6 class="font-weight-bold text-info text-center">Rincian Perhitungan</h6>
			</div>
			<div class="card-body">
			<?php for ($k=0; $k < $limit; $k++) { ?>
			<?php $value = select_smart($result[$k]['id_smartphone']) ?>
				<div class="row">
					<div class="col-md-10">
						<h5>Rangking : <?= $k+1 ?></h5>
						<h4 class="font-weight-bold text-primary"><?= ' '.$value->merk.' '. $value->seri ?></h4>
					</div>
					<div class="col-md-2">
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-sm table-hover table-borderless table-striped">
						<thead class="thead-dark">
							<tr>
								<th>Kriteria</th>
								<th>Value Utilities</th>
								<th>Normalisasi</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
						<?php for($l = 0; $l < sizeof($temp_hasil[$k]); $l++) { ?>
							<tr>
								<td><?= $temp_hasil[$k][$l]['kriteria']->kriteria ?></td>
								<td><?= round($temp_hasil[$k][$l]['values_util'],4) ?></td>
								<td><?= number_format($temp_hasil[$k][$l]['normalisasi'],4) ?></td>
								<td><?= round($temp_hasil[$k][$l]['total'],4) ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-10">
					</div>
					<div class="col-md-2">
						<h5 class="text-danger"><?= 'Score : '.number_format($result[$k]['final_score'],4) ?></h5>
					</div>
				</div>
				<hr>
			<?php } ?>
			</div>
			<div class="card-footer text-center">
				<a class="btn btn-primary btn-block" href="<?= base_url('opsi') ?>">
					<i class="fas fa-search"></i> Cari Rekomendasi Lagi
				</a>
			</div>
		</div>
	</div>
</div>