<div class="modal fade" id="mdl_addadmin" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg cascading-modal" role="document">
		<div class="modal-content">
			<div id="mdlhead" class="modal-header bg-info text-white">
				<h5 id="headtitle" class="modal-title text-center col-12">Tambah Data</h5>
			</div>
			<div class="modal-body">
				<form method="POST" id="form_addmin">
					<div class="row">
						<div class="col">
							<input type="text" class="form-control" name="id_admin" placeholder="ID Admin" hidden>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" placeholder="Username">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer form-group justify-content-center">
				<button class="btn btn-sm btn-success" id="simp_addmin">
					<i class="fas fa-save"></i>&nbsp; Simpan
				</button>
				<button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
					<i class="fas fa-window-close"></i>&nbsp; Batal
				</button>
			</div>
		</div>
	</div>
</div>