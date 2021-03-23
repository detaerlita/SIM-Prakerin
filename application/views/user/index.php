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
                    <table>
                        <?php foreach ($profile as $key) {
                     ?>
                        <tr>
                          <td>Email address</td>
                          <td>: <?=$key->email?></td>
                        <tr/>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td>: <?=$key->name?></td>
                        <tr/>
                        <tr>
                          <td>Tempat, tanggal Lahir</td>
                          <td>: <?=$key->tempat_lahir.", ".$key->tanggal_lahir?></td>
                        <tr/>
                        <tr>
                          <td>Sekolah Asal</td>
                          <td>: <?=$key->asal_sekolah?></td>
                        <tr/>
                        <tr>
                          <td>Jurusan</td>
                          <td>: <?=$key->jurusan?></td>
                        <tr/>
                        <tr>
                          <td>Kelas</td>
                          <td>: <?=$key->kelas?></td>
                        <tr/>
                        <tr>
                          <td>Nomor Induk</td>
                          <td>: <?=$key->nomor_induk?></td>
                        <tr/>
                        <tr>
                          <td>Agama</td>
                          <td>: <?=$key->agama?></td>
                        <tr/>
                        <tr>
                          <td>Alamat Sekolah</td>
                          <td>: <?=$key->alamat_sekolah?></td>
                        <tr/>
                        <tr>
                          <td>Alamat Rumah</td>
                          <td>: <?=$key->alamat_rumah?></td>
                        <tr/>
                        <tr>
                          <td>Nomor Telepon</td>
                          <td>: <?=$key->no_telp?></td>
                        <tr/>
                        <tr>
                          <td>Alamat Kos</td>
                          <td>: <?=$key->alamat_kos?></td>
                        <tr/>
                        <tr>
                          <td>Tanggal Pelaksanaan</td>
                          <td>: <?=$key->tanggal_pelaksanaan." - ".$key->tanggal_berakhir?></td>
                        <tr/>
                    <?php };?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 