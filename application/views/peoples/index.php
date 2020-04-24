<div class="container">
  <div class="row mt-3">
    <div class="col-md-10">

      <h3>list of peoples</h3>
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