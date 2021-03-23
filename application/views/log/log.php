<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($profile as $key) {                     
                 $hiddenFields = array('id' => $key->id_username);
          }?>
          <?= form_open_multipart('user/log', '', $hiddenFields); ?>
            
            <div class="form-group row">
                <label for="tgl" class="col-sm-2 col-form-label">Tanggal upload</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl" name="tgl" >
                    <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="des" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="des" name="des" >
                    <?= form_error('des', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Upload file</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label selected" for="image"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>


            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 