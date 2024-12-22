<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
    Quản lý Banner
    </h6>
  </div>
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-end mb-4"> 
      <h6 class="text-primary">Danh sách Banner</h6>
      <?php if (isset($_SESSION['user']) && $_SESSION['user']['auth_id'] == 2) { ?>
      <a href="dashboard/banner/add" type="button" class="btn btn-primary">Thêm mới</a>
    <?php } ?>
    </div>
    <table class="table table-bordered"  width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Hình Ảnh</th>
          <th scope="col">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php  foreach ($banners as $row) { ?>
          <tr>
            <td class="pl-3"><?= $row['id'] ?></td>
            <td><img src="<?= $row['image'] ?>" class="object-fit-contain " style="width: 90%" alt="banner"/></td>
            <td class=" gap-2" style="width: 110px">
              <?php if (isset($_SESSION['user']) && $_SESSION['user']['auth_id'] == 2) { ?>
              <a  href="dashboard/banner/update/?id=<?= $row['id'] ?>" style="width:40px; height: 40px" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
              <a  href="dashboard/banner/delete/?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" style="width: 40px; height: 40px" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
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