	</div>
	<script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
	<script src="<?= base_url() ?>assets/js/notif.js"></script>
	<script src="<?= base_url() ?>assets/vendor/sweetalert/dist/sweetalert2.js"></script>
	<script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
	<script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
	<?php $p = $this->uri->segment(1); ?>
	<script type="text/javascript">
		function logout() {
			Swal.fire({
				confirmButtonClass: 'btn btn-success m-2',
				cancelButtonClass: 'btn btn-danger m-2',
				buttonsStyling: false,
				showCancelButton: true,
				title: 'Yakin ingin keluar ?',
				type: 'warning',
				confirmButtonText: '<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Ya !',
				cancelButtonText: '<i class="fas fa-times"></i>&nbsp;&nbsp;Batal'
			}).then((result) => {
				if (result.value) {
					window.location.replace('<?= base_url('logout') ?>');
				}
			})
		}

		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip({
				placement : 'right'
			});

			<?php if ($p == 'login'  || $p == 'masuk') { ?>
			$('#btn_flogin').click(function () {
				$.ajax({
					type: "POST",
					url: "<?= base_url('check') ?>",
					data: $('#flogin').serialize(),
					success: function (data){
						if (data == 'benar') {
							sukses_login();
							setTimeout('window.location = "<?= base_url('admin') ?>"; ',1000);
						} else {
							gagal_login();
						}
					},
					error: function(data){
						console.log(data);
					}
				});
			})
			<?php } ?>

			<?php if ($p == 'list' || $p == 'daftar') { ?>
				var data_list;
			<?php } ?>

			<?php if ($p == 'find' || $p == 'cari') { ?>
				var tab_pilih;
				tab_pilih = $('#tab_pilih').DataTable();
			$('.chk_boxes').click(function(){
				$('.chk_boxes1').attr('checked',this.checked)
			})
			<?php } ?>
		});
	</script>
</body>
</html>