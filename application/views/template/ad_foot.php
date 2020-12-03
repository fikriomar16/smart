				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
	<script src="<?= base_url() ?>assets/js/notif.js"></script>
	<script src="<?= base_url() ?>assets/vendor/summernote/summernote-bs4.js"></script>
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

		<?php if ($p == 'smartphone') { ?>
		function previewImage() {
			document.getElementById("image-preview").style.display = "block";
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("foto").files[0]);

			oFReader.onload = function(oFREvent) {
				document.getElementById("image-preview").src = oFREvent.target.result;
			};
		};

		function konversi(angka) {
			var reverse = angka.toString().split('').reverse().join(''),
			ribuan = reverse.match(/\d{1,3}/g);
			ribuan = ribuan.join('.').split('').reverse().join('');
			return ribuan
		}
		<?php } ?>
		
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();

			<?php if ($p == 'smartphone') { ?>
			var tab_smart;
			tab_smart = $('#tab_smart').DataTable({
				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?= base_url('ajax_list')?>",
					"type": "POST"
				},
				"columnDefs": [{ 
					"targets": [ -1 ],
					"orderable": false
				}]
			});
			function reload_tab_smart()
			{
				tab_smart.ajax.reload(null,false);
			}
			$('#form_smart').submit(function (e) {
				e.preventDefault();
				var form = document.getElementById('form_smart');
				$.ajax({
					url: "<?= base_url('simpan_smartphone') ?>",
					type: "POST",
					data: new FormData(form),
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(data){
						$('#mdl_smart').modal('hide');notif_sukses();console.log(data);reload_tab_smart();
					},
					error: function(data){
						notif_gagal();
					}
				});
			})
			$('#del_smart').click(function () {
				$.ajax({
					type: "POST",
					url: "<?= base_url('del_smartphone') ?>",
					data: $('#form_del_smart').serialize(),
					success: function (data){
						$('#mdl_smart_del').modal('hide');
						sukses_hapus();
						reload_tab_smart();
					},
					error: function(data){
						notif_gagal();
					}
				});
			})
			$('#reload_tsmart').click(function () {
				reload_tab_smart();
			})
			// tampil_smartphone();
			function tampil_smartphone() {
				pop_det = 'data-toggle="tooltip" title="Detail Data"';
				pop_edt = 'data-toggle="tooltip" title="Edit Data"';
				pop_del = 'data-toggle="tooltip" title="Delete Data"';
				$.ajax({
					type: "ajax",
					url: "<?= base_url('list_smartphone') ?>",
					async: false,
					dataType: "json",
					success: function (data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html+= '<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td>'+data[i].merk+'</td>'+
							'<td>'+data[i].seri+'</td>'+
							'<td>'+data[i].display+'"</td>'+
							'<td>'+data[i].ram+' GB</td>'+
							'<td>'+data[i].rom+' GB</td>'+
							'<td>'+data[i].kamera_belakang+' MP / '+data[i].kamera_depan+' MP</td>'+
							'<td>'+data[i].cpu+' GHz</td>'+
							'<td>'+data[i].chipset+'</td>'+
							'<td>'+data[i].os+'</td>'+
							'<td>'+data[i].baterai+' mAh</td>'+
							'<td>Rp.'+konversi(data[i].harga)+'</td>'+
							'<td class="text-center">'+
							'<button class="btn btn-sm btn-primary m-1" onclick="det_smart('+
							data[i].id+
							');" '+pop_det+'><i class="fas fa-info-circle"></i></button>'+
							'<button class="btn btn-sm btn-warning m-1" onclick="edt_smart('+
							data[i].id+
							');" '+pop_edt+'><i class="fas fa-pen-square"></i></button>'+
							'<button class="btn btn-sm btn-danger m-1" onclick="del_smart('+
							data[i].id+
							');" '+pop_del+'><i class="fas fa-trash"></i></button>'+
							'</td>'+
							'</tr>';
						}
						$('#show_smart').html(html);
					}
				});
			}
			<?php } ?>

			<?php if ($p == 'pengaturan') { ?>
			$('#note_help').summernote({
				placeholder: 'Isi..',
				toolbar: [
				 ['style', ['bold', 'italic', 'underline']],
				 ['para', ['ul', 'ol', 'paragraph']],
				 ['height', ['height']]
				],
				height: 150
			});
			<?php } ?>
		});
	</script>
</body>
</html>