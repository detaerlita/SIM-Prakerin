<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($log_data as $log) {
      ?>
    <tr>
      <th scope="row">1</th>
      <td><?=$log['name'];?></td>
      <td><?=$log['tanggal'];?></td>
      <td><?=$log['deskripsi'];?></td>
      <td><a href="<?= base_url('pembimbing/pdf/'.$log['id_periksa']); ?>" target="_blank"><?= $log['file_download'];?></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 