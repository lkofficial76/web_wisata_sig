<?php
namespace Config;
$routes = Services::routes();
$routes->setDefaultNamespace('App\Controllers');
// controller default yang dipanggil 
// pertama kali saat aplikasi dijalankan
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
// routing URL Controller Dashboard
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('getdata', 'Dashboard::getdata');
$routes->get('dashboard/getdata', 'Dashboard::getdata');
$routes->get('dashboard/getgeojson', 'Dashboard::getgeojson');
// routing URL Controller Kecamatan
$routes->get('kecamatan','Kecamatan::index');
$routes->get('tambahkecamatan','Kecamatan::tambah');
$routes->get('editkecamatan/(:any)','Kecamatan::edit/$1');
$routes->get('hapuskecamatan/(:any)','Kecamatan::hapus/$1');
$routes->post('simpankecamatan','Kecamatan::simpan');
$routes->post('updatekecamatan','Kecamatan::update');
// routing URL Controller Sekolah
$routes->get('wisata','Wisata::index');
$routes->get('tambahwisata','Wisata::tambah');
$routes->get('editwisata/(:num)','Wisata::edit/$1');
$routes->get('hapuswisata/(:num)','Wisata::hapus/$1');
$routes->post('simpanwisata','Wisata::simpan');
$routes->post('updatewisata','Wisata::update');
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
 require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
?>