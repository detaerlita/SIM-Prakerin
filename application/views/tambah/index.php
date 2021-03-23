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
        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="InputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama Lengkap</label>
    <input type="text" class="form-control" id="InputNama">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tempat Lahir</label>
    <input type="text" class="form-control" id="InputTempatLahir">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tanggal Lahir</label>
    <input type="text" class="form-control" id="InputTanggalLahir">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Sekolah Asal</label>
    <input type="text" class="form-control" id="InputSekolah">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Jurusan</label>
    <input type="text" class="form-control" id="InputJurusan">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kelas</label>
    <input type="text" class="form-control" id="InputKelas">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nomor Induk</label>
    <input type="text" class="form-control" id="InputNomorInduk">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Agama</label>
    <input type="text" class="form-control" id="InputAgama">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat Sekolah</label>
    <input type="text" class="form-control" id="InputAlamatSekolah">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat Rumah</label>
    <input type="text" class="form-control" id="InputAlamatRumah">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nomor Telepon</label>
    <input type="text" class="form-control" id="InputNomorTelepon">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat Kos</label>
    <input type="text" class="form-control" id="InputAlamatKos">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tanggal Pelaksanaan</label>
    <input type="text" class="form-control" id="InputTanggalPelaksanaan">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 