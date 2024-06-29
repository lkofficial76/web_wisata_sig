<?php 
namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{
    protected $table = 'wisata'; // nama tabel
    protected $primaryKey = 'kode_pos'; // primary key tabel
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $useAutoIncrement = false;
    // nama semua field pada tabel
    protected $allowedFields = ['kode_pos', 'kode_kecamatan', 'nama_wisata', 'alamat_wisata', 'harga_tiket', 'koordinat'];
    protected $skipValidation = true;

    public function getMarkers()
    {
        return $this->select('koordinat, kode_pos, nama_wisata, alamat_wisata, harga_tiket')->findAll();
    }
}
?>
