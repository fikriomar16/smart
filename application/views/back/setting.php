<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h4 mb-0 text-gray-800">Ubah Pengaturan</h1>
</div>

<div class="row justify-content-center">
	<div class="col">
		<div class="card border-bottom-primary shadow mb-4">
			<div class="card-header py-3">
				<h6 class="text-center m-0 font-weight-bold text-primary">Pengaturan</h6>
			</div>
			<div class="card-body">
				<?php $r = $detail_con->row(); ?>
				<form method="POST" id="form_setting">
					<div class="row my-2">
						<div class="col">
							<div class="form-group">
								<label>Nama Website</label>
								<input type="text" class="form-control" placeholder="Nama Website" name="nama_aplikasi" value="<?= $r->nama_aplikasi;?>">
							</div>
							<div class="form-group">
								<label>Nama Instansi</label>
								<input type="text" class="form-control" placeholder="Nama Instansi" name="nama_instansi" value="<?= $r->nama_instansi;?>">
							</div>
							<div class="form-group">
								<label>Alamat Instansi</label>
								<input type="text" class="form-control" placeholder="Alamat Instansi" name="alamat_instansi" value="<?= $r->alamat_instansi;?>">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" value="<?= $r->deskripsi;?>">
							</div>
						</div>
					</div>
				</form>
				<center>
					<button type="button" class="btn btn-sm btn-warning btn-icon-split m-2" onclick="$('#form_setting')[0].reset();">
						<span class="icon text-white"><i class="fas fa-undo-alt"></i></span>
						<span class="text">Reset</span>
					</button>
					<button class="btn btn-sm btn-success btn-icon-split m-2" id="simp_setting">
						<span class="icon text-white"><i class="fas fa-save"></i></span>
						<span class="text">Simpan Data</span>
					</button>
				</center>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">	
	<div class="col">
		<div class="card border-bottom-primary shadow mb-4">
			<div class="card-header py-3">
				<h6 class="text-center m-0 font-weight-bold text-primary">Edit Halaman Bantuan</h6>
			</div>
			<div class="card-body">
				<form method="POST" id="form_help">
					<textarea id="note_help" name="note_help"></textarea>
				</form>
				<center>
					<button class="btn btn-sm btn-primary btn-icon-split m-2" id="simp_setting">
						<span class="icon text-white"><i class="fas fa-paper-plane"></i></span>
						<span class="text">Simpan</span>
					</button>
					<button type="button" class="btn btn-sm btn-danger btn-icon-split m-2" onclick="$('#form_setting')[0].reset();">
						<span class="icon text-white"><i class="fas fa-eraser"></i></span>
						<span class="text">Bersihkan</span>
					</button>
				</center>
			</div>
		</div>
	</div>
</div>