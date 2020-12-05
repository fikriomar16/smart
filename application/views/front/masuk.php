<center><img class="img-fluid mt-4 animated flash" style="height: 50px;width: auto;" src="<?= base_url('assets/img/sp1.png') ?>"></center>
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
		</form>
		<button class="btn btn-primary center" id="btn_flogin">
			<i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Masuk
		</button>
	</div>
	<div class="card-footer text-center">
		<a href="<?= base_url('beranda') ?>" class="btn btn-sm btn-danger btn-icon-split">
			<span class="icon text-white"><i class="fas fa-chevron-circle-up"></i></span>
			<span class="text">Kembali</span>
		</a>
	</div>
</div>