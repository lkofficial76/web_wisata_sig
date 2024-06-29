<?php
namespace App\Controllers;
use App\Models\KecamatanModel;
use App\Models\WisataModel;

class Wisata extends BaseController{
    public function index(){
        $this->tampil();
    }
    public function tampil(){
        $wisata = new WisataModel();
        $data['query'] = $wisata->select('wisata.*, kecamatan.nama_kecamatan AS kecamatan')
                                ->join('kecamatan', 'kecamatan.kode_kecamatan = wisata.kode_kecamatan')
                                ->findAll();
        $data['msg'] = session()->getFlashdata('msg');
        echo view('wisata/tampil', $data);
    }
    

    public function tambah(){
        $kecamatan = new KecamatanModel();
        $kecamatan = $kecamatan->findAll();
        $kecamatanOptions = array();
        $kecamatanOptions[''] = 'belum dipilih';

        foreach($kecamatan as $row){
            $kecamatanOptions[$row->kode_kecamatan] = strtoupper($row->nama_kecamatan);
            }

            $data['kecamatanOptions'] = $kecamatanOptions;  
            return view('wisata/tambah',$data);
    }
    public function edit($kode_pos){
        $kecamatan = new KecamatanModel();
        $kecamatan = $kecamatan->findAll();
        $kecamatanOptions = array();
        $kecamatanOptions[''] = 'belum dipilih';
        foreach($kecamatan as $row){
        $kecamatanOptions[$row->kode_kecamatan] = strtoupper($row->nama_kecamatan);
        }
        $data['kecamatanOptions'] = $kecamatanOptions;
        
            $wisata = new WisataModel();
            $data['query'] = $wisata->find($kode_pos);
            $data['id'] = $kode_pos;
            return view('wisata/edit',$data);
    }
    public function simpan(){
        $wisata = new WisataModel();
        $data_wisata = [
            'kode_pos'=>$this->request->getVar('kode_pos'),
            'kode_kecamatan'=>$this->request->getVar('kode_kecamatan'),
            'nama_wisata'=>$this->request->getVar('nama_wisata'),
            'alamat_wisata'=>$this->request->getVar('alamat_wisata'),
            'harga_tiket'=>$this->request->getVar('harga_tiket'),
            'koordinat'=>$this->request->getVar('koordinat')
        ];
        $wisata->insert($data_wisata);
        if($wisata->affectedRows() > 0){
            // persiapkan pesan jika insert berhasil
            $msg='<div class="alert alert-primary" role="alert">Data berhasil disimpan !
            </div>';
            }else{
            // persiapkan pesan jika insert gagal
            $msg='<div class="alert alert-danger" role="alert">Data gagal disimpan 
            !</div>';
            }

            session()->setFlashdata('msg', $msg);
            return redirect()->to('wisata');
    }
    public function update(){
        $wisata = new WisataModel();
        //mengambil input hidden id dari form edit
        $id = $this->request->getVar('id');
        
        $data_wisata = [
            'kode_pos'=>$this->request->getVar('kode_pos'),
            'kode_kecamatan'=>$this->request->getVar('kode_kecamatan'),
            'nama_wisata'=>$this->request->getVar('nama_wisata'),
            'alamat_wisata'=>$this->request->getVar('alamat_wisata'),
            'harga_tiket'=>$this->request->getVar('harga_tiket'),
            'koordinat'=>$this->request->getVar('koordinat')
        ];
            $wisata->update($id,$data_wisata);
            if($wisata->affectedRows() > 0){
            $msg='<div class="alert alert-primary" role="alert">Data berhasil disimpan !
            </div>';
            }else{
            $msg='<div class="alert alert-danger" role="alert">Data gagal disimpan 
            !</div>';
            }
            session()->setFlashdata('msg', $msg);
            return redirect()->to('wisata');
    }
    public function hapus($kode_pos){
        $wisata = new WisataModel();
        $wisata->delete(['kode_pos' => $kode_pos]);
        if($wisata->affectedRows() > 0){
        $msg='<div class="alert alert-primary" role="alert">Data berhasil dihapus 
        !</div>';
        }else{
        $msg='<div class="alert alert-danger" role="alert">Data gagal dihapus 
        !</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('wisata');
    }
}
?>



        




        

