<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($profile as $key) {
                $hiddenFields = array('id' => $key->id_username);
             ?>
            <?= form_open_multipart('admin/edit_peserta', '', $hiddenFields); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?=$key->email; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?=$key->name; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="mulai" class="col-sm-2 col-form-label">Tanggal Mulia</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="mulai" name="mulai" value="<?=$key->tanggal_pelaksanaan; ?>">
                    <?= form_error('mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="akhir" class="col-sm-2 col-form-label">Tanggal berakhir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="akhir" name="akhir" value="<?= $key->tanggal_berakhir; ?>">
                    <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>


            </form>
        <?php } ?>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 