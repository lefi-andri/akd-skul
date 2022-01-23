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
$route['default_controller'] = 'auth/login';
$route['404_override'] = 'auth/login';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = 'auth/login/index';
$route['logout'] = 'auth/login/logout';

$route['dashboard'] = 'site/dashboard/index';

// **********************************************************************
$route['siswa'] = 'site/siswa/index';
$route['siswa/add'] = 'site/siswa/add';
$route['siswa/edit/(:any)'] = 'site/siswa/edit/$1';
$route['siswa/page/(:num)'] = 'site/siswa/index/$1';
$route['siswa/hapus/(:any)'] = 'site/siswa/hapus/$1';

$route['siswa/search'] = 'site/siswa/search';
$route['siswa/search/(:any)'] = 'site/siswa/search/$1';
$route['siswa/search/(:any)/(:num)'] = 'site/siswa/search/$1/$2';

//***********************************************************************
$route['guru'] = 'site/guru/index';
$route['guru/add'] = 'site/guru/add';
$route['guru/edit/(:any)'] = 'site/guru/edit/$1';
$route['guru/page/(:num)'] = 'site/guru/index/$1';
$route['guru/hapus/(:any)'] = 'site/guru/hapus/$1';

$route['guru/search'] = 'site/guru/search';
$route['guru/search/(:any)'] = 'site/guru/search/$1';
$route['guru/search/(:any)/(:num)'] = 'site/guru/search/$1/$2';

//***********************************************************************
$route['mapel'] = 'site/mapel/index';
$route['mapel/add'] = 'site/mapel/add';
$route['mapel/edit/(:any)'] = 'site/mapel/edit/$1';
$route['mapel/page/(:num)'] = 'site/mapel/index/$1';
$route['mapel/hapus/(:any)'] = 'site/mapel/hapus/$1';

$route['mapel/search'] = 'site/mapel/search';
$route['mapel/search/(:any)'] = 'site/mapel/search/$1';
$route['mapel/search/(:any)/(:num)'] = 'site/mapel/search/$1/$2';

//***********************************************************************
$route['waktu'] = 'site/waktu/index';
$route['waktu/add'] = 'site/waktu/add';
$route['waktu/edit/(:any)'] = 'site/waktu/edit/$1';
$route['waktu/page/(:num)'] = 'site/waktu/index/$1';
$route['waktu/hapus/(:any)'] = 'site/waktu/hapus/$1';

$route['waktu/search'] = 'site/waktu/search';
$route['waktu/search/(:any)'] = 'site/waktu/search/$1';
$route['waktu/search/(:any)/(:num)'] = 'site/waktu/search/$1/$2';

//***********************************************************************
$route['kelas'] = 'site/kelas/index';
$route['kelas/add'] = 'site/kelas/add';
$route['kelas/edit/(:any)'] = 'site/kelas/edit/$1';
$route['kelas/hapus/(:any)'] = 'site/kelas/hapus/$1';

$route['kelas/search'] = 'site/kelas/search';
$route['kelas/search/(:num)'] = 'site/kelas/search/$1';

$route['kelas/siswa/(:any)'] = 'site/kelas/siswa/$1';
$route['kelas/add-siswa/(:any)'] = 'site/kelas/tambah_siswa/$1';
$route['kelas/add-siswa-act/(:any)'] = 'site/kelas/add_siswa_act/$1';

//***********************************************************************
$route['jadwal'] = 'site/jadwal/index';
$route['jadwal/add'] = 'site/jadwal/add';
$route['jadwal/edit/(:any)'] = 'site/jadwal/edit/$1';
$route['jadwal/hapus/(:any)'] = 'site/jadwal/hapus/$1';

$route['jadwal/search'] = 'site/jadwal/search';
$route['jadwal/search/(:num)'] = 'site/jadwal/search/$1';

$route['jadwal/filter'] = 'site/jadwal/filter';
$route['jadwal/filter/(:num)'] = 'site/jadwal/filter/$1';

//***********************************************************************
$route['nilai-siswa'] = 'site/nilai/index';
$route['nilai-siswa/add'] = 'site/nilai/add';
$route['nilai-siswa/aksi-nilai'] = 'site/nilai/aksi_nilai';

$route['nilai-un'] = 'site/nilai_un/index';
$route['nilai-un/add'] = 'site/nilai_un/add';
$route['nilai-un/edit/(:any)'] = 'site/nilai_un/edit/$1';
$route['nilai-un/hapus/(:any)'] = 'site/nilai_un/hapus/$1';

$route['nilai-un/search'] = 'site/nilai_un/search/$1';
$route['nilai-un/search/(:any)'] = 'site/nilai_un/search/$1';
$route['nilai-un/search/(:any)/(:num)'] = 'site/nilai_un/search/$1/$2';

//***********************************************************************
$route['pengaturan'] = 'site/pengaturan/index';












//***********************************************************************
$route['profile'] = 'usr/profile/index';
$route['jadwal-guru'] = 'usr/jadwal/index';

$route['upload-materi'] = 'usr/materi/index';
$route['upload-materi/upload'] = 'usr/materi/add_upload';
$route['upload-materi/download/(:num)'] = 'usr/materi/download_materi/$1';
$route['upload-materi/edit/(:num)'] = 'usr/materi/edit/$1';

$route['wali-kelas'] = 'usr/wali/index';
$route['wali-kelas/kelas/(:any)'] = 'usr/wali/kelas/$1';
$route['wali-kelas/kelas/(:any)'] = 'usr/wali/kelas/$1';
$route['wali-kelas/lapor-siswa/(:any)/(:any)'] = 'usr/wali/lapor_siswa/$1/$2';

$route['nilai'] = 'usr/nilai/index';
$route['nilai/aksi-nilai'] = 'usr/nilai/aksi_nilai';






//-------> NEW <------------------------
$route['materi-admin'] = 'site/materi/index';

$route['profile-siswa'] = 'siswa/profile/index';
$route['jadwal-siswa'] = 'siswa/jadwal/index';
$route['materi-siswa'] = 'siswa/materi/index';
$route['nilai-siswa1'] = 'siswa/nilai/index';

$route['upload-materi-admin'] = 'site/materi/index';
$route['upload-materi-admin/upload'] = 'site/materi/add_upload';
$route['upload-materi-admin/download/(:num)'] = 'site/materi/download_materi/$1';
$route['upload-materi-admin/edit/(:num)'] = 'site/materi/edit/$1';
$route['upload-materi-admin/hapus/(:any)'] = 'site/materi/hapus/$1';