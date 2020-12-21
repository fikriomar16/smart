<div class="modal fade" id="mdl_tanya" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal" role="document">
		<div class="modal-content">
			<div id="mdlhead" class="modal-header bg-info text-white">
				<h5 id="headtitle" class="modal-title text-center col-12"></h5>
			</div>
			<div class="modal-body">
				<form method="POST" id="form_tanya">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="pertanyaan">Pertanyaan :</label>
								<textarea class="form-control" id="pertanyaan" rows="3" name="pertanyaan"></textarea>
							</div>
							<input type="text" name="id_pertanyaan" id="id_pertanyaan" hidden>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer form-group justify-content-center">
				<button class="btn btn-sm btn-success" id="simp_tanya">
					<i class="fas fa-save"></i>&nbsp; Simpan
				</button>
				<button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
					<i class="fas fa-window-close"></i>&nbsp; Batal
				</button>
			</div>
		</div>
	</div>
</div>