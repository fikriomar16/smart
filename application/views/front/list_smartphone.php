<script type="text/javascript">
	function det_smart(id) {
		$.ajax({
			type: "ajax",
			url: "<?= base_url('pil_smart/') ?>"+id,
			async: false,
			dataType: "json",
			success: function (data) {
				Swal.fire({
					title: data.merk+' '+data.seri,
					imageUrl: '<?= "assets/img/smartphone/"?>'+data.foto,
					imageHeight: 150,
					html:
					'<hr>'+
					'<div class="text-left small">'+
					'<ul>'+
					'<li>Display: '+data.display+'"</li>'+
					'<li>OS: '+data.os+'</li>'+
					'<li>RAM: '+data.ram+' GB</li>'+
					'<li>ROM: '+data.rom+' GB</li>'+
					'<li>Kamera: '+data.kamera_belakang+' MP / '+data.kamera_depan+'MP</li>'+
					'<li>CPU: '+data.cpu+' GHz</li>'+
					'<li>Chipset: '+data.chipset+'</li>'+
					'<li>Baterai: '+data.baterai+' mAh</li>'+
					'<li>Harga: Rp.'+konversi(data.harga)+'</li>'+
					'</ul>'+
					'</div>'
				})
			}
		});
	}
</script>
<?php
$platform = $this->agent->platform();
if ($platform=="Android" || $platform=="iOS") {
	$cardsize = 'col-6';
	$imgsize = '';
	$size = 'small';
	$btn = 'btn-sm';
} else {
	$cardsize = 'col-md-2';
	$imgsize = '';
	$size = '';
	$btn = '';
}
?>
<div class="card shadow animated fadeInRightBig border-left-primary shadow h-100 py-2 my-3" id="manual">
	<div class="card-header">
		<h6 class="font-weight-bold text-primary text-center">List Smartphone</h6>
	</div>
	<div class="card-body">
		<div class="<?= $size ?> row py-2" id="fltr">
			<div class="col">
				<form enctype="multipart/form-data" id="form_filter" method="POST">
					<div class="form-group row justify-content-center">
						<label for="filter" class="col-sm-2 col-form-label">Urutkan : </label>
						<div class="col-sm-3">
							<select name="filter" id="filter" class="custom-select form-control">
								<option value="" selected> --- </option>
								<option value="harga_rendah">Harga Terendah</option>
								<option value="harga_tinggi">Harga Tertinggi</option>
								<option value="ram_rendah">Memori Terendah</option>
								<option value="ram_tinggi">Memori Tertinggi</option>
								<option value="rom_rendah">Kapasitas Penyimpanan Terendah</option>
								<option value="rom_tinggi">Kapasitas Penyimpanan Tertinggi</option>
							</select>
						</div>
						<label for="cari_merk" class="col-sm-2 col-form-label">Cari Merk : </label>
						<div class="col-sm-3">
							<select name="cari_merk" id="cari_merk" class="custom-select form-control">
								<option value="" selected> --- </option>
							</select>
						</div>
					</div>
				</form>
			</div>
		</div>
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
		<div class="float-right align-content-center" id='pagination'></div>
	</div>
	<div class="card-footer text-center">
		<a href="<?= base_url('opsi') ?>" class="btn btn-primary btn-icon-split m-1 <?= $btn ?>">
			<span class="icon text-white"><i class="fas fa-search"></i></span>
			<span class="text">Cari Rekomendasi</span>
		</a>
	</div>
</div>