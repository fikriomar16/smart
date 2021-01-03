<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'c_user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['beranda'] = 'c_user';
$route['help'] = 'c_user/helppage';
$route['bantuan'] = 'c_user/helppage';

$route['daftar'] = 'c_list';
$route['list'] = 'c_list';
$route['cek_hal/(:any)'] = 'c_list/listpage/$1';

$route['find'] = 'c_proses';
$route['cari'] = 'c_proses';
$route['get_data'] = 'c_proses/getdata';
$route['push_data'] = 'c_proses/pushdata';
$route['opsi'] = 'c_proses/options';
$route['pembobotan'] = 'c_proses/bobot';
$route['hasil'] = 'c_proses/result';
$route['hitung'] = 'c_proses/countdata';
$route['cari_log'] = 'c_proses/get_log';
$route['riwayat'] = 'c_proses/history';
$route['getsmart/(:any)'] = 'c_proses/select_smart/$1';
$route['getkriteria/(:any)'] = 'c_proses/select_kriteria/$1';

$route['masuk'] = 'c_login';
$route['login'] = 'c_login';
$route['mendaftar'] = 'c_login/register';
$route['cekusername'] = 'c_login/cekusername';
$route['daftar_akun'] = 'c_login/user_register';
$route['check'] = 'c_login/check_login';
$route['keluar'] = 'c_login/logout';
$route['logout'] = 'c_login/logout';

$route['smartphone'] = 'c_smartphone';
$route['ajax_list'] = 'c_smartphone/ajax';
$route['ajax_list_user'] = 'c_smartphone/ajax_user';
$route['list_smartphone'] = 'c_smartphone/get_smartphone';
$route['simpan_smartphone'] = 'c_smartphone/save_smartphone';
$route['pil_smart/(:any)'] = 'c_smartphone/select_smart/$1';
$route['del_smartphone'] = 'c_smartphone/delete_smartphone';

$route['admin'] = 'c_admin';

$route['kriteria'] = 'c_admin/datakriteria';
$route['perhitungan'] = 'c_admin/dataperhitungan';
$route['pertanyaan'] = 'c_admin/datapertanyaan';

$route['pengaturan'] = 'c_admin/settings';
$route['simpan_config'] = 'c_admin/update_config';
$route['simpan_bantuan'] = 'c_admin/update_help';
$route['reset_bantuan'] = 'c_admin/reset_help';

$route['addadmin'] = 'c_admin/adduser';
$route['list_admin'] = 'c_admin/get_admin';
$route['pil_admin/(:any)'] = 'c_admin/select_admin/$1';
$route['simpan_admin'] = 'c_admin/save_admin';
$route['del_admin/(:any)'] = 'c_admin/delete_admin/$1';

$route['list_user'] = 'c_admin/get_user';
$route['pil_user/(:any)'] = 'c_admin/select_user/$1';
$route['simpan_user'] = 'c_admin/save_user';
$route['del_user/(:any)'] = 'c_admin/delete_user/$1';

$route['list_kriteria'] = 'c_admin/get_kriteria';

$route['list_pertanyaan'] = 'c_admin/get_pertanyaan';
$route['pil_tanya/(:any)'] = 'c_admin/select_pertanyaan/$1';
$route['simpan_pertanyaan'] = 'c_admin/save_pertanyaan';

$route['list_perhitungan'] = 'c_admin/get_perhitungan';
