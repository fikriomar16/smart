<script type="text/javascript">
	function mdl_smart() {
		document.getElementById("mdlhead").classList.remove('bg-warning');
		document.getElementById("mdlhead").classList.add('bg-info');
		$('#headtitle').text('Tambah Data Smartphone');
		$('#mdl_smart').modal('show');
		$('#form_smart')[0].reset();
		document.getElementById("image-preview").src = "";
		$('#image-preview').removeAttr('src');
	}	
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
	function edt_smart(id) {
		$.ajax({
			type: "ajax",
			url: "<?= base_url('pil_smart/') ?>"+id,
			async: false,
			dataType: "json",
			success: function (data) {
				document.getElementById("mdlhead").classList.remove('bg-info');
				document.getElementById("mdlhead").classList.add('bg-warning');
				$('#headtitle').text('Edit Data Smartphone');
				$('#mdl_smart').modal('show');
				$('[name="id"]').val(data.id);
				$('[name="seri"]').val(data.seri);
				$('[name="merk"]').val(data.merk);
				$('[name="display"]').val(data.display);
				$('[name="os"]').val(data.os);
				$('[name="ram"]').val(data.ram);
				$('[name="rom"]').val(data.rom);
				$('[name="kamera_belakang"]').val(data.kamera_belakang);
				$('[name="kamera_depan"]').val(data.kamera_depan);
				$('[name="cpu"]').val(data.cpu);
				$('[name="chipset"]').val(data.chipset);
				$('[name="baterai"]').val(data.baterai);
				$('[name="harga"]').val(data.harga);
				document.getElementById("image-preview").src = "<?= base_url('assets/img/smartphone')."/" ?>"+data.foto;
			},
			error: function (data) {
				swal('Terdapat Kesalahan');
			}
		});
	}
	function del_smart(id) {
		$.ajax({
			type: "ajax",
			url: "<?= base_url('pil_smart/') ?>"+id,
			async: false,
			dataType: "json",
			success: function (data) {
				$('#mdl_smart_del').modal('show');
				$('[name="id"]').val(data.id);
				document.getElementById("preview_del").src = "<?= base_url('assets/img/smartphone')."/" ?>"+data.foto;
				$('#smartphone_name').text(data.merk+' '+data.seri);
			},
			error: function (data) {
				swal('Terdapat Kesalahan');
			}
		});
	}
</script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h4 mb-0 text-gray-800">Data Smartphone</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card border-left-primary shadow mb-4">
			<div class="card-header py-3">
				<h6 class="text-center m-0 font-weight-bold text-primary">Data Smartphone</h6>
			</div>
			<div class="card-body">
				<button type="button" class="btn btn-info btn-icon-split btn-sm mb-4" onclick="mdl_smart()" data-toggle="tooltip" data-placement="right" title="Tambah Data">
					<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
					<span class="text">Tambah</span>
				</button>
				<button type="button" class="btn btn-primary btn-icon-split btn-sm mb-4" id="reload_tsmart" data-toggle="tooltip" data-placement="right" title="Reload Tabel">
					<span class="icon text-white-50"><i class="fas fa-sync"></i></span>
					<span class="text">Reload</span>
				</button>
				<script type="text/javascript"></script>
				<div class="table-responsive">
					<table class="table table-hover table-striped table-sm" id="tab_smart">
						<thead class="thead-light">
							<tr>
								<th>No</th>
								<th>Merk</th>
								<th>Seri</th>
								<th>Display</th>
								<th>RAM</th>
								<th>ROM</th>
								<th>Kamera</th>
								<th>CPU</th>
								<th>Chipset</th>
								<th>OS</th>
								<th>Baterai</th>
								<th>Harga</th>
								<th class="text-center">Opsi</th>
							</tr>
						</thead>
						<tbody id="show_smart">
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer"></div>
		</div>
	</div>
</div>