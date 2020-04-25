<div class="container">
  <h3 class="mt-3">list of peoples</h3>

  <div class="row">
    <div class="col-md-5 mt-3">
      <form action="<?= base_url('peoples') ?>" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search keyword" autocomplete="off" autofocus name="keyword">
          <div class="input-group-append">
            <input class="btn btn-success" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <h5>Result : <?= $total_rows; ?></h5>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($peoples)) : ?>
            <tr>
              <td colspan="4">
                <div class="alert alert-danger text-center" role="alert">
                  <strong>Data not found</strong>
                </div>
              </td>
            </tr>
          <?php endif; ?>
          <!-- ++$start = tambah satu dulu, baru tampilkan -->
          <?php $no = 1; ?>
          <?php foreach ($peoples as $p) : ?>
            <tr>
              <th><?= ++$start; ?></th>
              <td><?= $p['name']; ?></td>
              <td><?= $p['email']; ?></td>
              <td>
                <a href="" class="badge badge-warning">detail</a>
                <a href="" class="badge badge-success">edit</a>
                <a href="" class="badge badge-danger">delete</a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>

      <?= $this->pagination->create_links() ?>


    </div>
  </div>
</div>