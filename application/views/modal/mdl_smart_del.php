<div class="modal fade" id="mdl_smart_del" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal" role="document">
		<div class="modal-content">
			<div id="mdlhead" class="modal-header bg-danger text-white">
				<h5 id="headtitle" class="modal-title text-center col-12">Hapus Data Smartphone</h5>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" id="form_del_smart">
					<h5 class="text-center text-danger mb-4">Apakah Anda Yakin Ingin Menghapus Data Ini ?</h5>
					<div class="text-center">
						<input type="text" name="id" hidden>
						<img id="preview_del" style="height: 200px;width: auto;">
						<h4 class="font-weight-bold text-dark" id="smartphone_name"></h4>
					</div>
				</form>
			</div>
			<div class="modal-footer form-group justify-content-center">
				<button class="btn btn-sm btn-primary" id="del_smart">
					<i class="fas fa-trash"></i>&nbsp; Ya, Hapus
				</button>
				<button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
					<i class="fas fa-window-close"></i>&nbsp; Batal
				</button>
			</div>
		</div>
	</div>
</div>