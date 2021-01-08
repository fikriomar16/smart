<center><img class="img-fluid mt-4 animated flash" style="height: 75px;width: auto;" src="<?= base_url('assets/img/sp1.png') ?>"></center>
<div class="row justify-content-center py-2">
	<div class="col-md-4 mb-2">
		<div class="card shadow animated fadeInLeftBig border-bottom-primary shadow h-100 py-2 my-3" id="manual">
			<div class="card-header">
				<h5 class="font-weight-bold text-primary text-center">Masuk</h5>
			</div>
			<div class="card-body">
				<!-- Isi -->
				<form id="flogin" method="POST" autocomplete="off">
					<div class="form-group form-label-group">
						<label for="username" class="small">Username</label>
						<input type="text" name="username" id="username" class="form-control text-center" placeholder="Username" autofocus required="yes">
					</div>
					<div class="form-group form-label-group">
						<label for="password" class="small">Password</label>
						<input type="password" name="password" id="password" class="form-control text-center" placeholder="Password" required="yes">
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Masuk Sebagai :</label>
								<div class="custom-control custom-radio">
									<input type="radio" name="login_as" id="as_user" value="user" class="custom-control-input">
									<label class="custom-control-label" for="as_user">Pengguna</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" name="login_as" id="as_admin" value="admin" class="custom-control-input">
									<label class="custom-control-label" for="as_admin">Admin</label>
								</div>
							</div>
						</div>
					</div>
				</form>
				<button class="btn btn-primary btn-block" id="btn_flogin">
					<i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Masuk
				</button>
				<hr>
				<a href="<?= base_url('resetpass') ?>" class="float-right">Lupa Password ?</a>
				<a href="<?= base_url('mendaftar') ?>">Belum Memiliki Akun? Daftar Sekarang !</a>
			</div>
			<!-- <div class="card-footer text-center">
				<a href="<?= base_url('beranda') ?>" class="btn btn-sm btn-danger btn-icon-split">
					<span class="icon text-white"><i class="fas fa-chevron-circle-up"></i></span>
					<span class="text">Kembali</span>
				</a>
			</div> -->
		</div>
	</div>
</div>