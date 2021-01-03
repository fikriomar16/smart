<div class="modal fade" id="mdl_smart" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl cascading-modal" role="document">
		<div class="modal-content">
			<div id="mdlhead" class="modal-header bg-info text-white">
				<h5 id="headtitle" class="modal-title text-center col-12">Data Smartphone</h5>
			</div>
			<form method="POST" enctype="multipart/form-data" id="form_smart">
				<div class="modal-body">
					<div class="row justify-content-center">
						<div class="col-4">
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
										<input type="number" min="4" name="os" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>RAM</label>
										<input type="number" min="1" name="ram" class="form-control">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>ROM</label>
										<input type="number" min="16" name="rom" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Kamera Belakang</label>
										<input type="text" name="kamera_belakang" class="form-control" id="backcam">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Kamera Depan</label>
										<input type="text" name="kamera_depan" class="form-control" id="frontcam">
									</div>
								</div>
							</div>
						</div>
						<div class="col-3">
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
								<input type="number" min="3000" name="baterai" class="form-control">
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input type="number" min="1000000" name="harga" class="form-control">
							</div>
						</div>
						<div class="col-3 text-center">
							<div class="form-group">
								<label>Foto Smartphone</label>
								<div class="custom-file">
									<input type="file" name="foto" class="form-control custom-file-input" accept="image/*" id="foto" onchange="previewImage();">
									<label class="custom-file-label" for="foto">Pilih Foto</label>
									<small>(.jpg atau .png | Max 2MB)</small>
								</div>
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