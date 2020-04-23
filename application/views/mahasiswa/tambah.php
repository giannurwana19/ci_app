<div class="container">
  <div class="row mt-3">
    <div class="col-md-6">

      <div class="card">
        <div class="card-header">
          Form Tambah Data Mahasiswa
        </div>
        <div class="card-body">
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="jurusan">Example select</label>
              <select class="form-control" id="jurusan" name="jurusan">
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Kimia Murni">Kimia Murni</option>
                <option value="Teknik Keuangan">Teknik Keuangan</option>
                <option value="Teknik Transportasi Darat">Teknik Transportasi Darat</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
              </select>
              <button type="submit" class="btn btn-primary btn-sm mt-3 float-right" name="tambah">Tambah Data</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>