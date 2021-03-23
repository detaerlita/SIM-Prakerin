<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($profile as $key) {
                     
                 $hiddenFields = array('id' => $key->id_username);
             ?>
            <?= form_open_multipart('user/edit', '', $hiddenFields); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?=$key->email?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $key->name; ?>">
                    <?= form_error('Nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tempat" class="col-sm-2 col-form-label">Tempat lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $key->tempat_lahir; ?>">
                    <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lhr" class="col-sm-2 col-form-label">Tanggal lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_lhr" name="tgl_lhr" value="<?= $key->tanggal_lahir; ?>">
                    <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="sekolah" class="col-sm-2 col-form-label">Sekolah asal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $key->asal_sekolah; ?>">
                    <?= form_error('sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $key->jurusan; ?>">
                    <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $key->kelas; ?>">
                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nonik" class="col-sm-2 col-form-label">Nomor Induk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nonik" name="nonik" value="<?= $key->nomor_induk; ?>">
                    <?= form_error('nonik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="agama" name="agama" value="<?= $key->agama; ?>">
                    <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_sekolah" class="col-sm-2 col-form-label">Alamat Sekolah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" value="<?= $key->alamat_sekolah; ?>">
                    <?= form_error('alamat_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_rumah" class="col-sm-2 col-form-label">Alamat Rumah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="<?= $key->alamat_rumah; ?>">
                    <?= form_error('alamat_rumah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nomor" class="col-sm-2 col-form-label">Nomor Telp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $key->no_telp; ?>">
                    <?= form_error('nomor', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_kos" class="col-sm-2 col-form-label">Alamat Kos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_kos" name="alamat_kos" value="<?= $key->alamat_kos; ?>">
                    <?= form_error('alamat_kos', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $key->image; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>


            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 