<div class="modal fade" id="mdl_smart" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl cascading-modal" role="document">
		<div class="modal-content">
			<div id="mdlhead" class="modal-header bg-info text-white">
				<h5 id="headtitle" class="modal-title text-center col-12">Data Smartphone</h5>
			</div>
			<form method="POST" enctype="multipart/form-data" id="form_smart">
				<div class="modal-body">
					<div class="row">
						<div class="col-6">
							<input type="text" name="id" class="form-control" hidden>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Merk Smartphone</label>
										<input type="text" name="merk" class="form-control" autofocus>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Seri Smartphone</label>
										<input type="text" name="seri" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Display</label>
										<input type="number" min="5.0" step="0.1" name="display" class="form-control">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Os</label>
										<input type="text" name="os" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>RAM</label>
										<input type="text" name="ram" class="form-control">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>ROM</label>
										<input type="text" name="rom" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Kamera Belakang</label>
										<input type="text" name="kamera_belakang" class="form-control">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Kamera Depan</label>
										<input type="text" name="kamera_depan" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>CPU</label>
								<input type="text" name="cpu" class="form-control">
							</div>
							<div class="form-group">
								<label>Chipset</label>
								<input type="text" name="chipset" class="form-control">
							</div>
							<div class="form-group">
								<label>Baterai</label>
								<input type="text" name="baterai" class="form-control">
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input type="number" name="harga" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col text-center">
							<div class="form-group">
								<label>Foto Smartphone</label>
								<input type="file" name="foto" class="form-control" accept="image/*" id="foto" onchange="previewImage();">
								<small>(.jpg atau .png | Max 2MB)</small>
								<center>
									<p hidden id="det_image"></p>
									<img id="image-preview" style="height: 200px;width: auto;">
								</center>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer form-group justify-content-center">
					<button class="btn btn-sm btn-success" id="sim_smart" type="submit">
						<i class="fas fa-save"></i>&nbsp; Simpan
					</button>
					<button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="fas fa-window-close"></i>&nbsp; Batal
					</button>
				</div>
			</form>
		</div>
	</div>
</div>