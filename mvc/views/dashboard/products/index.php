<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
    Quản lý sản phẩm
    </h6>
  </div>
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-end"> 
      <h6 class="text-primary">Danh sách sản phẩm</h6>
      <a href="dashboard/product/add" type="button" class="btn btn-primary">Thêm mới</a>
    </div>
    <hr>
    <table class="table table-bordered table-striped align-middle" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">Mã sản phẩm</th>
          <th scopt="col">Tên sản phẩm</th>
          <th scopt="col">Slug</th>
          <th scope="col">Hình ảnh </th>
          <th scope="col">Giá thành</th>
          <th scope="col">Số lượng</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $row) { ?>
          <tr>
            <td style="vertical-align: middle"><?= $row['id'] ?></td>
            <td style="vertical-align: middle"><?= $row['name'] ?></td>
            <td style="vertical-align: middle"><?= $row['slug'] ?></td>
            <td style="vertical-align: middle">
              <img src="<?= $row['image1'] ?>" height="60px">
            </td>
            <td style="vertical-align: middle"><?= number_format($row['price']) ?>đ</td>
            <td style="vertical-align: middle"><?= $row['stock'] ?></td>
            <td  style="padding: 8px 20px; width: 100px; vertical-align:middle">
               
                <a href="dashboard/product/update/?id=<?= $row['id'] ?>" type="button" style="width:40px; height: 40px" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                
                <a href="dashboard/product/delete/?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" style="width: 40px; height: 40px" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
              
              </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <script>
      $(document).ready(function() {
        $('#dataTable').DataTable();
      });
    </script>
    </div>
  </div>