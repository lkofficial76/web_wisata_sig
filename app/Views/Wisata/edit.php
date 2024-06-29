<?php 
echo view('header');
echo view('sidebar');
?>
<main class="col-10 ms-sm-auto px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <h1 class="h4">Edit Data Wisata</h1>
    </div>
    <?php echo form_open('updatewisata'); ?>
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Kecamatan</label>
                <?php 
                echo form_hidden('id', $id);
                echo form_dropdown('kode_kecamatan', $kecamatanOptions, $query->kode_kecamatan, 'class="form-control"');
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
                    'placeholder' => 'Masukkan KODE POS Wisata',
                    'required' => 'required',
                    'value' => $query->kode_pos
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
                    'required' => 'required',
                    'value' => $query->nama_wisata
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
                    'required' => 'required',
                    'value' => $query->alamat_wisata
                ];
                echo form_input($alamat_wisata);
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga tiket</label>
                <?php 
                $harga_tiket = [
                    'name' => 'harga_tiket',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Harga Tiket',
                    'required' => 'required',
                    'value' => $query->harga_tiket
                ];
                echo form_input($harga_tiket);
                ?>
            <div class="mb-3">
                <label class="form-label">Koordinat Wisata</label>
                <?php 
                $koordinat = [
                    'name' => 'koordinat',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Contoh: -7.5134,109.0702',
                    'required' => 'required',
                    'value' => $query->koordinat
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
                echo anchor('wisata', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</main>
<?php echo view('footer'); ?>
