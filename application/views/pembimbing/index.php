<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <?php foreach ($profile as $key) {
                     ?>
                     <table>
                         <tr>
                             <td>No.Induk</td>
                             <td>: <?= $key->nomor_induk; ?></td>
                         </tr>
                         <tr>
                             <td>Nama</td>
                             <td>: <?= $key->name; ?></td>
                         </tr>
                         <tr>
                             <td>Email</td>
                             <td>: <?= $key->email; ?></td>
                         </tr>
                         <tr>
                             <td>Tempat, tanggal Lahir</td>
                             <td>: <?= $key->tempat_lahir.", ".$key->tanggal_lahir; ?></td>
                         </tr>
                         <tr>
                             <td>Agama</td>
                             <td>: <?= $key->agama; ?></td>
                         </tr>
                         <tr>
                             <td>Alamat</td>
                             <td>: <?= $key->alamat_rumah; ?></td>
                         </tr>
                         <tr>
                             <td>No.Telp</td>
                             <td>: <?= $key->no_telp; ?></td>
                         </tr>
                     </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 