<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
    Quản lý danh mục
    </h6>
  </div>
  <div class="card-body overflow-auto" >
    <div class="d-flex justify-content-between align-items-end"> 
      <h6 class="text-primary">Danh sách danh mục</h6>
      <?php if (isset($_SESSION['user']) && ($_SESSION['user']['auth_id'] == 2 || $_SESSION['user']['auth_id'] == 3 )) { ?>
      <a href="dashboard/collection/add" type="button" class="btn btn-primary">Thêm mới</a>
    <?php } ?>
    </div>
    <hr>
    <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên</th>
          <th scope="col">Slug</th>
          <th scope="col">Hình Ảnh</th>
          <th scope="col">Trạng thái</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row) { ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['slug'] ?></td>
            <td>
              <img src="<?= $row['image'] ?>" height="60px">
            </td>
            <td><?= $row['status'] == 1 ? 'Hiển thị' : 'Ẩn'?></td>
            <td style="min-width: 130px">
              <a href="dashboard/collection/detail/?id=<?= $row['id'] ?>" style="width: 40px; height: 40px;" class="btn btn-info d-inline-flex justify-content-center align-items-center"><i style="font-size: 16px" class="fa-regular fa-eye"></i></a>
              <?php if (isset($_SESSION['user']) && ($_SESSION['user']['auth_id'] == 2 || $_SESSION['user']['auth_id'] == 3 )) { ?>
              <a href="dashboard/collection/update/?id=<?= $row['id'] ?>" style="width:40px; height: 40px" class="btn btn-warning"><i style="font-size: 20px" class="fa-regular fa-pen-to-square" ></i></a>
              <a href="dashboard/collection/delete/?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" style="width: 40px; height: 40px" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
              <?php }?>
              
            </td>
          </tr>
        <?php } ?>
    </table>
    <script>
      $(document).ready(function() {
        $('#dataTable').DataTable();
      });
    </script>
  </div>
</div>