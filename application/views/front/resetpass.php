<center><img class="img-fluid mt-4 animated flash" style="height: 75px;width: auto;" src="<?= base_url('assets/img/sp1.png') ?>"></center>
<div class="row justify-content-center py-2">
	<div class="col-md-4 mb-2">
		<div class="card shadow animated fadeInLeftBig border-bottom-danger shadow h-100 py-2 my-3" id="manual">
			<div class="card-header">
				<h5 class="font-weight-bold text-danger text-center">Lupa Password</h5>
			</div>
			<div class="card-body">
				<!-- Isi -->
				<form id="freset" method="POST" autocomplete="off">
					<div id="cek_user">
						<div class="form-group form-label-group">
							<label for="username" class="small">Masukkan Username</label>
							<input type="text" min="6" name="username" id="username" class="form-control text-center" placeholder="Masukkan Username" autofocus required="yes">
						</div>
					</div>
					<div id="confirm">
						<div class="form-group form-label-group">
							<label for="password" class="small">Masukkan Password</label>
							<input type="password" min="6" name="password" id="password" class="form-control text-center" placeholder="Masukkan Password" required="yes">
						</div>
						<div class="form-group form-label-group">
							<label for="password_conf" class="small">Konfirmasi Password</label>
							<input type="password" name="password_conf" id="password_conf" class="form-control text-center" placeholder="Konfirmasi Password" required="yes">
						</div>
						<p class="text-danger text-center">Password minimal 6 karakter</p>
					</div>
				</form>
				<button class="btn btn-info btn-block" id="btn_cek_user">
					<i class="fas fa-lock"></i>&nbsp;&nbsp;Konfirmasi User
				</button>
				<button class="btn btn-primary btn-block" id="btn_confirm">
					<i class="fas fa-sync"></i>&nbsp;&nbsp;Reset Password
				</button>
				<hr>
				<a href="<?= base_url('masuk') ?>">Sudah Memiliki Akun? Masuk</a>
			</div>
		</div>
	</div>
</div>