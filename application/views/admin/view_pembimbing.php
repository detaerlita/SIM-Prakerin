<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <table class="table table-striped">
  <thead>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Nomer Induk</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($profile as $key) {
      $hiddenFields = array('id' => $key->id);
      $i++;
     ?>
    <tr>
      <th scope="row"><?=$i;?></th>
      <td><?=$key->name?></td>
      <td><?=$key->nomor_induk?></td>
      <td>
            <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#<?=str_replace(" ","",$key->name);?>">delete</a></td>
    </tr>

    <!-- delete Modal-->
            <div class="modal fade" id="<?=str_replace(" ","",$key->name);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin hapus data?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Pilih OK jika ingin menghapus data.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('admin/delete/'.$key->id.'/view_pembimbing'); ?>">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

    <?php } ?>
  </tbody>
</table>

  
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 