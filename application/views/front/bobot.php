<div class="row justify-content-center py-2 px-4 mb-4">
	<div class="col-md-6">
		<div class="card shadow animated fadeInDownBig border-bottom-info shadow h-100 py-2 my-3" id="manual">
			<div class="card-header">
				<h6 class="font-weight-bold text-info text-center">Pertanyaan</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" id="form_bobot">
				<div class="card-body">
					<div class="alert alert-info text-center mb-5" role="alert">** Dimohon untuk mengisi beberapa pertanyaan di bawah ini terlebih dahulu **</div>
					<?php
					$i = 1;
					foreach ($pertanyaan as $key => $row){
					?>
					<?php if ($row->kriteria != "Harga") { ?>
						<p><?= $i; ?>. <?= $row->pertanyaan; ?></p>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="bbt<?= $i ?>" name="bobot<?= $i ?>" class="custom-control-input" value="20">
							<label class="custom-control-label" for="bbt<?= $i ?>">Ya</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="bbt<?= $i ?><?= $i+1 ?>" name="bobot<?= $i ?>" class="custom-control-input" value="10">
							<label class="custom-control-label" for="bbt<?= $i ?><?= $i+1 ?>">Tidak</label>
						</div>
						<hr>
					<?php } else { ?>
						<p><?= $i; ?>. <?= $row->pertanyaan; ?></p>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="bbt<?= $i ?>" name="bobot<?= $i ?>" class="custom-control-input" value="10">
							<label class="custom-control-label" for="bbt<?= $i ?>">Ya</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="bbt<?= $i ?><?= $i+1 ?>" name="bobot<?= $i ?>" class="custom-control-input" value="20">
							<label class="custom-control-label" for="bbt<?= $i ?><?= $i+1 ?>">Tidak</label>
						</div>
						<hr>
					<?php } ?>
					<?php
					$i++;
					}
					?>

					<?php for ($i=0; $i < count($hp); $i++) { ?>
					<input type="text" name="hp[]" value="<?= $hp[$i] ?>" disabled hidden>
					<?php } ?>
				</div>
				<div class="card-footer text-center">
					<button class="btn btn-info btn-block" id="btn_bobot" type="submit">
						<i class="fas fa-check"></i>&nbsp;Tampilkan Hasil
					</button>
				</div>
			</form>
		</div>
	</div>
</div>