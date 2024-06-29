<?php
namespace App\Controllers;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
class Kecamatan extends BaseController {
    public function index() {
        $this->tampil();
    }

    public function tampil() {
        $kecamatan = new KecamatanModel();
        $data['query'] = $kecamatan->findAll();
        $data['msg'] = session()->getFlashdata('msg');
        echo view('kecamatan/tampil', $data);
    }

    public function tambah() {
        $kabupaten = new KabupatenModel();
        $kabupaten = $kabupaten->findAll();
        $kabupatenOptions = array();

        $kabupatenOptions[''] = 'belum dipilih';
        foreach($kabupaten as $row) {
            $kabupatenOptions[$row->id_kabupaten] = strtoupper($row->nama_kabupaten);
        }
        $data['kabupatenOptions'] = $kabupatenOptions;
        return view('kecamatan/tambah', $data);
    }

    public function edit($kode_kecamatan) {
        $kabupatenModel = new KabupatenModel();
        $kabupaten = $kabupatenModel->findAll();
        $kabupatenOptions = array();
        $kabupatenOptions[''] = 'belum dipilih';
        foreach ($kabupaten as $row) {
            $kabupatenOptions[$row->id_kabupaten] = strtoupper($row->nama_kabupaten);
        }
        $data['kabupatenOptions'] = $kabupatenOptions;
    
        $kecamatanModel = new KecamatanModel();
        $data['query'] = $kecamatanModel->find($kode_kecamatan);
        $data['id'] = $kode_kecamatan;
    
        return view('kecamatan/edit', $data);
    }
    
    

    public function simpan() {
        $kecamatanModel = new KecamatanModel();
        $data_kecamatan = [
            'kode_kecamatan' => $this->request->getVar('kode_kecamatan'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'nama_kecamatan' => $this->request->getVar('nama_kecamatan'),
            'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
            'luas_wilayah' => $this->request->getVar('luas_wilayah')
        ];
        $kecamatanModel->insert($data_kecamatan);
        if($kecamatanModel->affectedRows() > 0){
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kecamatan');
    }

    public function update() {
        $kecamatanModel = new KecamatanModel();
        $id = $this->request->getVar('id');
        
        $data_kecamatan = [
            'kode_kecamatan' => $this->request->getVar('kode_kecamatan'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'nama_kecamatan' => $this->request->getVar('nama_kecamatan'),
            'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
            'luas_wilayah' => $this->request->getVar('luas_wilayah')
        ];
        
        $kecamatanModel->update($id, $data_kecamatan);
        
        if ($kecamatanModel->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kecamatan');
    }
    

    public function hapus($kode_kecamatan) {
        $kecamatan = new KecamatanModel();
        $kecamatan->delete(['kode_kecamatan' => $kode_kecamatan]);
        if($kecamatan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';    
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus atau data tidak ditemukan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kecamatan');
    }
    
}
?>
