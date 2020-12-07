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
				$('#pagination').on('click','a',function(e){
					e.preventDefault(); 
					var pageno = $(this).attr('data-ci-pagination-page');
					loadPagination(pageno);
				});
				loadPagination(0);
				function loadPagination(pagno){
					$.ajax({
						type: "ajax",
						url: "<?= base_url('cek_hal/') ?>"+pagno,
						async: false,
						dataType: "json",
						success: function(data){
							$('#pagination').empty();
							$('#pagination').html(data.pagination);
							content(data.result,data.row);
							console.log(data);
						},
						error: function(data){
							console.log(data);
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
				tampil_daftar();
				$('#chk_boxes').click(function(){
					if (this.checked) {
						$('[name="hp[]"]').each(function() { 
							this.checked = true;
						});
					} else {
						$('[name="hp[]"]').each(function() {
							this.checked = false;
						});
					}
				});
				// $('#show_pilih tr').click(function() {
				// 	$(':checkbox',this).trigger('click');
				// 	if ($(':checkbox',this).is(':checked')) {
				// 		$(this).addClass('bg-secondary text-white');
				// 	} else {
				// 		$(this).removeClass('bg-secondary text-white');
				// 	}
				// });
				var tab_pilih;
				tab_pilih = $('#tab_pilih').DataTable();
				function tampil_daftar() {
					$.ajax({
						type: "ajax",
						url: "<?= base_url('list_smartphone') ?>",
						async: false,
						dataType: "json",
						success: function (data) {
							var html = '';
							var i;
							for (i = 0; i < data.length; i++) {
								html+= '<tr class="my-auto">'+
								'<td>'+
								'<div class="custom-control custom-checkbox">'+
								'<input type="checkbox" class="custom-control-input" value="'+data[i].id+'" id="chk_boxes'+data[i].id+'" name="hp[]" onchange=""/>'+
								'<label class="custom-control-label" for="chk_boxes'+data[i].id+'"></label>'+
								'</div>'+
								'</td>'+
								'<td>'+
								'<button class="btn btn-sm btn-block btn-secondary float-left" onclick="det_smart('+data[i].id+')">'+data[i].merk+' '+data[i].seri+'</button>'+
								// data[i].merk+' '+data[i].seri+
								'</td>'+
								'<td>'+data[i].ram+' GB - '+data[i].rom+' GB'+'</td>'+
								'<td>'+data[i].kamera_belakang+' MP / '+data[i].kamera_depan+' MP</td>'+
								'<td>'+data[i].display+'"</td>'+
								'<td>'+data[i].cpu+' GHz</td>'+
								'<td>'+data[i].chipset+'</td>'+
								'<td>'+data[i].os+'</td>'+
								'<td>'+data[i].baterai+' mAh</td>'+
								'<td>Rp.'+konversi(data[i].harga)+'</td>'+
								'</tr>';
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
							swal(data);
						},
						error: function(data){
							notif_gagal();
						}
					});
				})
			<?php } ?>	
		});
	</script>
</body>
</html>