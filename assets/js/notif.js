function notif_sukses() {
	swal({
		position: 'top-right',
		type: 'success',
		title: 'Berhasil Simpan Data',
		showConfirmButton: false,
		timer: 10
	});
}

function notif_gagal() {
	swal({
		position: 'top-right',
		type: 'error',
		title: 'Gagal Menyimpan Data',
		text: 'Terjadi Sebuah Kesalahan',
		showConfirmButton: false,
		timer: 2000
	});
}

function sukses_hapus() {
	swal({
		position: 'top-right',
		type: 'success',
		title: 'Berhasil Menghapus Data',
		showConfirmButton: false,
		timer: 1500
	});
}

function gagal_hapus() {
	swal({
		position: 'top-right',
		type: 'error',
		title: 'Gagal Menghapus Data',
		text: 'Terjadi Sebuah Kesalahan. Ada Kemungkinan Data Sedang Digunakan',
		showConfirmButton: false,
		timer: 2000
	});
}

function sukses_simpan_bantuan() {
	swal({
		type: 'success',
		title: 'Berhasil',
		text: 'Pengumuman Berhasil Disimpan',
		showConfirmButton: false,
		timer: 2500
	});
}

function sukses_reset() {
	swal({
		type: 'success',
		title: 'Berhasil',
		text: 'Data Berhasil Direset',
		showConfirmButton: false,
		timer: 2000
	});
}

function gagal_reset() {
	swal({
		type: 'error',
		title: 'Gagal Reset Data',
		text: 'Terjadi Sebuah Kesalahan',
		showConfirmButton: false,
		timer: 2000
	});
}

function sukses_login() {
	swal({
		type: 'success',
		title: 'Berhasil Masuk',
		showConfirmButton: false,
		timer: 2000
	});
}

function sukses_masuk(param) {
	swal({
		type: 'success',
		title: 'Berhasil Masuk Sebagai '+param,
		showConfirmButton: false,
		timer: 2000
	});
}

function gagal_login() {
	swal({
		type: 'error',
		title: 'Gagal Masuk',
		text: 'Username / Password Salah',
		showConfirmButton: false,
		timer: 2000
	});
}

function tidak_ditemukan() {
	swal({
		type: 'error',
		title: 'Gagal Masuk',
		text: 'Username / Password Tidak Ditemukan',
		showConfirmButton: false,
		timer: 2000
	});
}
