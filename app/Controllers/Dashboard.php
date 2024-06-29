<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\WisataModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $kabupatenModel = new KabupatenModel(); 
        $data['kabupaten'] = $kabupatenModel->find(1); 
        
        $WisataModel = new WisataModel();
        $query = $WisataModel->findAll();

        $marker = [];
        foreach ($query as $data_wisata) {
            list($latitude, $longitude) = explode(',', $data_wisata->koordinat);
            $marker[] = [
                'latitude' => (float) $latitude,
                'longitude' => (float) $longitude,
                'kode_pos' => $data_wisata->kode_pos,
                'nama_wisata' => $data_wisata->nama_wisata,
                'alamat_wisata' => $data_wisata->alamat_wisata,
                'harga_tiket' => $data_wisata->harga_tiket,
            ];
        }

        $data['marker'] = json_encode($marker);
        echo view('dashboard', $data);
    }

    public function getData(){
        $kecamatan = new KecamatanModel();
        $kode_kecamatan = $this->request->getGet('kode_kecamatan');
        $data = $kecamatan->find($kode_kecamatan);

        if(!empty($data)){
            $hasil = '<tr><td width="45%">Kode Kecamatan</td><td>:</td><td>'.$data->kode_kecamatan.'</td></tr>'.
                    '<tr><td>Nama Kecamatan</td><td>:</td><td>'.$data->nama_kecamatan.'</td></tr>'.
                    '<tr><td>Jumlah Penduduk</td><td>:</td><td>'.number_format($data->jumlah_penduduk,0,',','.').' Jiwa</td></tr>'.
                    '<tr><td>Luas Wilayah</td><td>:</td><td>'.number_format($data->luas_wilayah,0,',','.').' Km<sup>2</sup></td></tr>';
        }else{
            $hasil = '<tr><td class="text-center" colspan="3">DATA TIDAK ADA !</td></tr>';
        }

        $respon = ['hasil' => $hasil];

        return $this->response->setJSON($respon);
    }
    
}
?>
