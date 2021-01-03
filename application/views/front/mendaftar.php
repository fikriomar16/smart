<script type="text/javascript">
</script>
<center><img class="img-fluid mt-4 animated flash" style="height: 75px;width: auto;" src="<?= base_url('assets/img/sp1.png') ?>"></center>
<div class="row justify-content-center py-2">
	<div class="col-md-4 mb-2">
		<div class="card shadow animated fadeInLeftBig border-bottom-info shadow h-100 py-2 my-3" id="manual">
			<div class="card-header">
				<h5 class="font-weight-bold text-info text-center">Mendaftar</h5>
			</div>
			<div class="card-body">
				<!-- Isi -->
				<form id="fdaftar" method="POST" autocomplete="off">
					<div class="form-group form-label-group">
						<label for="username" class="small">Masukkan Username</label>
						<input type="text" min="6" name="username" id="username" class="form-control text-center" placeholder="Masukkan Username" autofocus required="yes">
					</div>
					<div class="form-group form-label-group">
						<label for="password" class="small">Masukkan Password</label>
						<input type="password" min="6" name="password" id="password" class="form-control text-center" placeholder="Masukkan Password" required="yes">
					</div>
					<div class="form-group form-label-group">
						<label for="password_conf" class="small">Konfirmasi Password</label>
						<input type="password" name="password_conf" id="password_conf" class="form-control text-center" placeholder="Konfirmasi Password" required="yes">
					</div>
					<p class="text-danger text-center">Username dan Password minimal 6 karakter</p>
					<div class="form-group form-label-group">
						<label for="nama" class="small">Masukkan Nama</label>
						<input type="text" min="6" name="nama" id="nama" class="form-control text-center" placeholder="Masukkan Nama Lengkap" autofocus required="yes">
					</div>
				</form>
				<button class="btn btn-info btn-block" id="btn_fdaftar">
					<i class="fas fa-clipboard-list"></i>&nbsp;&nbsp;Buat Akun
				</button>
				<hr>
				<a href="<?= base_url('masuk') ?>">Sudah Memiliki Akun? Masuk</a>
			</div>
		</div>
	</div>
</div>