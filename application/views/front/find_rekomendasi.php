<div class="card shadow animated fadeInDownBig border-bottom-primary shadow h-100 py-2 my-3" id="manual">
	<div class="card-header">
		<h6 class="font-weight-bold text-primary text-center">Cari Rekomendasi Smartphone</h6>
	</div>
	<div class="card-body">
		<!-- Isi -->
		<div class="table-responsive">
			<table class="table table-hover" id="tab_pilih">
				<form method="POST" enctype="multipart/form-data" id="form_cari">
					<thead class="thead-light">
						<tr>
							<th>
								<input type="checkbox" id="chk_boxes" class="custom-checkbox" label="check all">
							</th>
							<th>Smartphone</th>
							<th>RAM-ROM</th>
							<th>Camera</th>
							<th>Display</th>
							<th>CPU</th>
							<th>Chipset</th>
							<th>OS</th>
							<th>Baterai</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody id="show_pilih">
					</tbody>
				</form>
			</table>
		</div>
	</div>
	<div class="card-footer text-center">
		<button class="btn btn-primary btn-block" id="btn_cari">
			<i class="fas fa-check"></i>&nbsp;Tampilkan Hasil
		</button>
	</div>
</div>