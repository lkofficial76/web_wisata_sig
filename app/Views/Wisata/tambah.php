<?php 
echo view('header');
echo view('sidebar');
?>
<main class="col-10 ms-sm-auto px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <h1 class="h4">Tambah Data Wisata</h1>
    </div>
    <?php echo form_open('simpanwisata'); ?>
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Kecamatan</label>
                <?php 
                echo form_dropdown('kode_kecamatan', $kecamatanOptions, '', 'class="form-control"');
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">KODE POS</label>
                <?php 
                $kode_pos = [
                    'name' => 'kode_pos',
                    'type' => 'number',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan kode pos',
                    'required' => 'required'
                ];
                echo form_input($kode_pos);
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Wisata</label>
                <?php 
                $nama_wisata = [
                    'name' => 'nama_wisata',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Nama Wisata',
                    'required' => 'required'
                ];
                echo form_input($nama_wisata);
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Wisata</label>
                <?php 
                $alamat_wisata = [
                    'name' => 'alamat_wisata',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Alamat Wisata',
                    'required' => 'required'
                ];
                echo form_input($alamat_wisata);
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Tiket</label>
                <?php 
                $harga_tiket = [
                    'name' => 'harga_tiket',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Harga Tiket',
                    'required' => 'required'
                ];
                echo form_input($harga_tiket);
                ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Koordinat Wisata</label>
                <?php 
                $koordinat = [
                    'name' => 'koordinat',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Contoh: -7.5134,109.0702',
                    'required' => 'required'
                ];
                echo form_input($koordinat);
                ?>
            </div>
            <div>
                <?php 
                $simpan = [
                    'type' => 'submit',
                    'content' => 'Simpan',
                    'class' => 'btn btn-primary'
                ];
                echo form_button($simpan);
                echo anchor('kecamatan', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>
</main>
<?php echo view('footer'); ?>
