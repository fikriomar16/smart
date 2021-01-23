	</div>
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
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
		function konversi(angka) {
			var reverse = angka.toString().split('').reverse().join(''),
			ribuan = reverse.match(/\d{1,3}/g);
			ribuan = ribuan.join('.').split('').reverse().join('');
			return ribuan
		}

		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip({
				placement : 'right'
			});
		<?php if($p == '' || $p == 'beranda'): ?>
		<?php if($flash): ?>
			const flashType = $('.flash-data').data('type');
			const flashTitle = $('.flash-data').data('title');
			if (flashType || flashTitle) {
				const Notif = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 4000
				});
				Notif.fire({
					type: flashType,
					title:flashTitle
				});
			}
			console.log(flashTitle+' dan '+flashType);
		<?php endif; ?>
		<?php endif; ?>
		<?php if($this->session->userdata('user')): ?>
			$('#btn_edt_user').click(function () {
				var id_user = "<?= $this->session->userdata('user')['id_user'] ?>";
				$.ajax({
					type: "ajax",
					url: "<?= base_url('pil_user/') ?>"+id_user,
					async: false,
					dataType: "json",
					success: function (data) {
						document.getElementById("mdlheaduser").classList.remove('bg-info');
						document.getElementById("mdlheaduser").classList.add('bg-primary');
						$('#headtitleuser').text('Edit Data');
						$('#mdl_adduser').modal('show');
						$('[name="id_user"]').val(data.id_user);
						$('[name="username_user"]').val(data.username);
						$('[name="password_user"]').val(data.password);
						$('[name="nama_user"]').val(data.nama);
					},
					error: function (data) {
						swal('Terdapat Kesalahan');
					}
				});
			});
			$('#simp_adduser').click(function () {
				var username = $('[name="username_user"]').val();
				var password = $('[name="password_user"]').val();
				var nama = $('[name="nama_user"]').val();
				if (username==''||password==''||nama=='') {
					swal('Lengkapi Data Terlebih Dahulu');
				} else {
					$.ajax({
						type: "POST",
						url: "<?= base_url('simpan_user') ?>",
						data: $('#form_adduser').serialize(),
						success: function (data){
							$('#mdl_adduser').modal('hide');
							toast_sukses_simpan();
						},
						error: function(data){
							toast_gagal_simpan();
						}
					});
				}
			});
		<?php endif; ?>
			function nocaps_space() {
				const user = document.getElementById('username');
				user.addEventListener('input', function() {
					let start = this.selectionStart;
					let end = this.selectionEnd;

					const current = this.value
					const corrected = current.replace(/\s/g, "").toLowerCase();
					this.value = corrected;

					if (corrected.length < current.length) --end;
					this.setSelectionRange(start, end);
				});
			}
			<?php if ($p == 'mendaftar') { ?>
				$('#btn_fdaftar').prop('disabled', true);
				var password_conf = $('#password_conf');
				var password = $('#password');
				var username = $('#username');
				var nama = $('#nama');
				password.on('keyup',function () {
					if (password.val().length<6) {
						password.removeClass("is-valid");
						password.addClass("is-invalid");
					} else {
						password.removeClass("is-invalid");
						password.addClass("is-valid");
					}
				});
				password_conf.on('keyup',function () {
					if (password.val() == password_conf.val()) {
						password_conf.removeClass("is-invalid");
						password_conf.addClass("is-valid");
					} else {
						password_conf.removeClass("is-valid");
						password_conf.addClass("is-invalid");
					}
				});
				username.on('keyup',function () {
					$.ajax({
						type: "POST",
						url: "<?= base_url('cekusername') ?>",
						data: $('#fdaftar').serialize(),
						success: function (data) {
							if (data || username.val()=='' || username.val().length<6) {
								username.removeClass("is-valid");
								username.addClass("is-invalid");
							} else {
								username.removeClass("is-invalid");
								username.addClass("is-valid");
							}
						}
					});
				});
				nocaps_space();
				nama.on('keyup',function () {
					if (nama.val() == '') {
						nama.removeClass("is-valid");
						nama.addClass("is-invalid");
					} else {
						nama.removeClass("is-invalid");
						nama.addClass("is-valid");
					}
				});
				$('input').on('keyup',function () {
					if ($('.is-valid').length>3) {
						$('#btn_fdaftar').prop('disabled', false);
					} else {
						$('#btn_fdaftar').prop('disabled', true);
					}
				});
				$('#btn_fdaftar').click(function () {
					$.ajax({
						type: "POST",
						url: "<?= base_url('daftar_akun') ?>",
						data: $('#fdaftar').serialize(),
						success: function (data) {
							Swal.fire({
								type: 'success',
								title: 'Berhasil Mendaftar',
								text: 'Harap Tunggu, Sedang Mengalihkan Halaman',
								showConfirmButton: false,
								timer: 2000
							});
							setTimeout('window.location = "<?= base_url('login') ?>"; ',2000);
						}
					});
				});
			<?php } ?>

			<?php if ($p == 'login'  || $p == 'masuk') { ?>
				nocaps_space();
				$('#btn_flogin').click(function () {
					var user = $('#username').val();
					var pass = $('#password').val();
					var as = $('input[type=radio]:checked').length;
					if (user == '' || pass == '') {
						Swal('Username / Password Tidak Boleh Kosong','','error');
					} else if (as < 1) {
						Swal('Pilih Masuk Sebagai :','','warning');
					} else {
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
					}
				});
			<?php } ?>
			<?php if ($p == 'resetpass') { ?>
				var password_conf = $('#password_conf');
				var password = $('#password');
				var username = $('#username');
				nocaps_space();
				form1();
				function form1() {
					$('#btn_confirm').prop('hidden', true);
					$('#btn_confirm').prop('disabled', true);
					$('#btn_cek_user').prop('disabled', true);
					$('#confirm').prop('hidden', true);
				}
				function form2() {
					$('#confirm').prop('hidden', false);
					$('#cek_user').prop('hidden', true);
					$('#btn_confirm').prop('hidden', false);
					$('#btn_cek_user').prop('hidden', true);
				}
				username.on('keyup',function () {
					$.ajax({
						type: "POST",
						url: "<?= base_url('cekusername') ?>",
						data: $('#freset').serialize(),
						success: function (data) {
							if (data) {
								$('#btn_cek_user').prop('disabled', false);
							} else {
								$('#btn_cek_user').prop('disabled', true);
							}
						}
					});
				});
				$('#btn_cek_user').click(function () {
					form2();
				});
				password.on('keyup',function () {
					if (password.val().length<6) {
						password.removeClass("is-valid");
						password.addClass("is-invalid");
					} else {
						password.removeClass("is-invalid");
						password.addClass("is-valid");
					}
				});
				password_conf.on('keyup',function () {
					if (password.val() == password_conf.val()) {
						password_conf.removeClass("is-invalid");
						password_conf.addClass("is-valid");
					} else {
						password_conf.removeClass("is-valid");
						password_conf.addClass("is-invalid");
					}
				});
				$('input').on('keyup',function () {
					if ($('.is-valid').length>1) {
						$('#btn_confirm').prop('disabled', false);
					} else {
						$('#btn_confirm').prop('disabled', true);
					}
				});
				$('#btn_confirm').click(function () {
					$.ajax({
						type: "POST",
						url: "<?= base_url('confpass') ?>",
						data: $('#freset').serialize(),
						success: function (data) {
							Swal.fire({
								type: 'success',
								title: 'Berhasil Mereset Password',
								text: 'Harap Tunggu, Sedang Mengalihkan Halaman',
								showConfirmButton: false,
								timer: 2000
							});
							setTimeout('window.location = "<?= base_url('login') ?>"; ',2000);
						},
						error: function (data) {
							console.log(data);
						}
					});
				});
			<?php } ?>

			<?php if ($p == 'list' || $p == 'daftar') { ?>
				cari_merk();
				function cari_merk() {
					$.ajax({
						type:"ajax",
						url: "<?= base_url('by_merk') ?>",
						async: false,
						dataType: "json",
						success: function (data) {
							var opsi = '';
							var i;
							for(i = 0; i < data.length; i++){
								opsi+= '<option value="'+data[i].merk+'">'+data[i].merk+'</option>';
							}
								$('#cari_merk').append(opsi);
						}
					});
				}
				$('[name="filter"],[name="cari_merk"]').change(function () {
					filterform(0);
				});
				$('#pagination').on('click','a',function(e){
					e.preventDefault(); 
					var pageno = $(this).attr('data-ci-pagination-page');
					filterform(pageno);
				});
				filterform(0);
				function filterform(page) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('cek_hal/') ?>"+page,
						data: $('#form_filter').serialize(),
						dataType: "json",
						success: function (data){
							$('#pagination').empty();
							$('#pagination').html(data.pagination);
							content(data.result,data.row);
						},
						error: function(data){
							// console.log(data);
						}
					});
				}
				function content(result,sno){
					var platform = "<?= $this->agent->platform() ?>";
					var imgsize,cardsize,text;
					if (platform == "Android" || platform == "iOS") {
						cardsize = 'col-6';
						imgsize = ' style="height: 100px;width: auto;"';
						text = 'class="small px-2 my-0"';
					} else {
						cardsize = 'col-md-2';
						imgsize = ' style="height: 125px;width: auto;"';
						text = 'class="px-3 my-0"';
					}
					sno = Number(sno);
					$('#data_list').empty();
					var isi = '';
					for(index in result){
						var id = result[index].id;
						var merk = result[index].merk;
						var seri = result[index].seri;
						var harga = result[index].harga;
						var foto = result[index].foto;
						var ram = result[index].ram;
						var rom = result[index].rom;
						sno+=1;
						isi+= '<div class="'+cardsize+' mb-2">'+
						'<div class="card shadow h-100">'+
						'<center>'+
						'<img class="card-img-top img-responsive img-fluid" src="<?= base_url("assets/img/smartphone/") ?>'+foto+'" alt="Smartphone" '+imgsize+'>'+
						'</center>'+
						'<div class="card-body">'+
						'<ul '+text+'>'+
						'<li>'+merk+' '+seri+'</li>'+
						'<li>'+ram+' GB - '+rom+' GB</li>'+
						'<li>Rp. '+konversi(harga)+'</li>'+
						'</ul>'+
						'</div>'+
						'<div class="card-footer">'+
						'<button class="btn btn-sm btn-block btn-primary" onclick="det_smart('+id+')">'+
						'<i class="fas fa-eye"></i>&nbsp; Detail'+
						'</button>'+
						'</div>'+
						'</div>'+
						'</div>';
						$('#data_list').html(isi);
					}
				}
			<?php } ?>

			<?php if ($p == 'find' || $p == 'cari') { ?>
				$('#btn_cari').prop('disabled', true);
				tampil_daftar();
				function set_tab() {
					tab_pilih.search('').draw();
					$('#tab_pilih_length select').val('-1').trigger('change');
				}
				$('#chk_boxes').click(function(){
					if (this.checked) {
						set_tab();
						$('[name="hp[]"]').each(function() {
							this.checked = true;
						});
					} else {
						$('[name="hp[]"]').each(function() {
							this.checked = false;
						});
					}
				});
				$('table').on('change', '[type=checkbox]', function () {
					// $('#tab_pilih').dataTable().fnFilter('');
					set_tab();
					if ($(":checkbox:checked").length < 2) {
						$('#btn_cari').prop('disabled', true);
					} else {
						$('#btn_cari').prop('disabled', false);
					}
					// alert($(":checkbox:checked").length);
					// var $this = $(this);
					// var row = $this.closest('tr');
					// if ($this.prop('checked')){ // move to top
					// 	row.insertBefore( row.parent().find('tr:first-child'));
					// } else { // move to bottom
					// 	row.insertAfter( row.parent().find('tr:last-child'));
					// }
				});
				$('#tab_pilih [name="hp[]"]').click(function () {
					$.ajax({
						type: "POST",
						url: "<?= base_url('push_data') ?>",
						data: $('#tab_pilih input:checked').serialize(),
						success: function (data){
							console.log(data);
						},
						error: function(data){
							// toast_gagal_simpan();
						}
					});
				});
				var tab_pilih;
				tab_pilih = $('#tab_pilih').DataTable({
					"columnDefs": [{ 
						"targets": [ -1,0 ],
						"orderable": false
					}],
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
					"oLanguage": {
						"oPaginate": {					
							"sFirst": "Awal",
							"sLast": "Akhir",
							"sNext": "Selanjutnya",
							"sPrevious": "Sebelumnya"
						},
						"sSearch": "Cari :",
						"sSearchPlaceholder": "",
						"sZeroRecords": "Data Tidak Ditemukan",
						"sLengthMenu": "Tampilkan _MENU_   data",
						"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
						"sInfoEmpty": "Tidak Ada Data Ditemukan",
						"sInfoFiltered": "(disaring dari _MAX_ total data)"
					}				
				});
				function tampil_daftar() {
					var platform = "<?= $this->agent->platform() ?>";
					$.ajax({
						type: "ajax",
						url: "<?= base_url('list_smartphone') ?>",
						async: false,
						dataType: "json",
						success: function (data) {
							var html = '';
							var i;
							if (platform == "Android" || platform == "iOS") {
								for (i = 0; i < data.length; i++) {
									html+= '<tr class="my-auto">'+
									'<td>'+
									'<div class="custom-control custom-checkbox">'+
									'<input type="checkbox" class="custom-control-input" value="'+data[i].id+'" id="chk_boxes'+data[i].id+'" name="hp[]" onchange=""/>'+
									'<label class="custom-control-label" for="chk_boxes'+data[i].id+'"></label>'+
									'</div>'+
									'</td>'+
									'<td>'+
									data[i].merk+' '+data[i].seri+
									'</td>'+
									'<td>'+data[i].ram+' GB - '+data[i].rom+' GB'+'</td>'+
									'<td>'+data[i].kamera_belakang+' MP / '+data[i].kamera_depan+' MP</td>'+
									'<td>'+data[i].cpu+' GHz</td>'+
									'<td>'+data[i].baterai+' mAh</td>'+
									'<td>Rp.'+konversi(data[i].harga)+'</td>'+
									'<td class="text-center">'+
									'<button class="btn btn-sm btn-primary" type="button" onclick="det_smart('+data[i].id+')" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-eye"></i></button>'+
									'</td>'+
									'</tr>';
								}
							} else {
								for (i = 0; i < data.length; i++) {
									html+= '<tr>'+
									'<td class="pl-3">'+
									'<div class="custom-control custom-checkbox">'+
									'<input type="checkbox" class="custom-control-input" value="'+data[i].id+'" id="chk_boxes'+data[i].id+'" name="hp[]" onchange=""/>'+
									'<label class="custom-control-label" for="chk_boxes'+data[i].id+'"></label>'+
									'</div>'+
									'</td>'+
									'<td>'+
									data[i].merk+' '+data[i].seri+
									'</td>'+
									'<td>'+data[i].ram+' GB - '+data[i].rom+' GB'+'</td>'+
									'<td>'+data[i].kamera_belakang+' MP / '+data[i].kamera_depan+' MP</td>'+
									'<td>'+data[i].display+'"</td>'+
									'<td>'+data[i].cpu+' GHz</td>'+
									'<td>'+data[i].chipset+'</td>'+
									'<td>'+data[i].os+'</td>'+
									'<td>'+data[i].baterai+' mAh</td>'+
									'<td>Rp.'+konversi(data[i].harga)+'</td>'+
									'<td class="text-center">'+
									'<button class="btn btn-sm btn-primary" type="button" onclick="det_smart('+data[i].id+')" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-eye"></i></button>'+
									'</td>'+
									'</tr>';
								}
							}
							$('#show_pilih').html(html);
						}
					});
					$('#tab_pilih thead tr th').addClass("align-middle");
					$('#show_pilih tr td').addClass("align-middle");
				}
				$('#btn_cari').click(function () {
					$.ajax({
						type: "POST",
						url: "<?= base_url('get_data') ?>",
						data: $('#tab_pilih input:checked').serialize(),
						success: function (data){
							console.log(data);
						},
						error: function(data){
							// toast_gagal_simpan();
						}
					});
				});
			<?php } ?>	

			<?php if ($p == 'pembobotan') { ?>
				$('#btn_bobot').prop('disabled', true);
				$('#form_bobot').on('change','[type="radio"]', function () {
					if ($('input[type=radio]:checked').length > 8) {
						$('#btn_bobot').prop('disabled', false);
					} else {
						$('#btn_bobot').prop('disabled', true);
					}
				});
				// $('#btn_bobot').click(function () {
				// 	$.ajax({
				// 		type: "POST",
				// 		url: "<?= base_url('hitung') ?>",
				// 		data: $('#form_bobot').serialize(),
				// 		success: function (data){
				// 			console.log(data);
				// 			// setTimeout('window.location = "<?= base_url('hasil') ?>"; ',1000);
				// 		},
				// 		error: function(data){
				// 			// toast_gagal_simpan();
				// 		}
				// 	});
				// });
			<?php } ?>
			<?php if ($p == 'riwayat') { ?>
				tampil_log();
				var tab_log;
				tab_log = $('#tab_log').DataTable();
				function tampil_log() {
					$.ajax({
						type: "ajax",
						url: "<?= base_url('cari_log') ?>",
						async: false,
						dataType: "json",
						success: function (data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html+= '<tr>'+
								'<td>'+(i+1)+'</td>'+
								'<td>'+data[i].tanggal+'</td>'+
								'<td>'+data[i].merk+' '+data[i].seri+'</td>'+
								'<td>'+data[i].skor_akhir+'</td>'+
								'</tr>';
							}
							$('#show_log').html(html);
						}
					});
				}
			<?php } ?>
		});
	</script>
</body>
</html>