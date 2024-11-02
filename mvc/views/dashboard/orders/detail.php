<?php if(isset($data) and $data != null){ ?>
<a href="dashboard/order/confirmOrder/id=<?= $data['id'] ?>" class="btn btn-success">Duyệt hóa đơn</a>
<a href="dashboard/order/delete/id=<id=<?= $data['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
<?php } ?>
<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Tổng Đơn</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Ngày nhận</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $order['recepient_name'] ?></td>
            <td><?= $order['total_price'] ?> VNĐ</td>
            <td><?= $order['phone'] ?></td>
            <td><?= $order['address']  ?></td>
            <td><?= $order['date_received'] ?></td>
        </tr>
</table>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>