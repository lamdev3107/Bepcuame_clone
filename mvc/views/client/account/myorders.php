<h3 class="p-2 pb-4 border-bottom mb-4 text-uppercase" style="font-size: 28px; color: #222222; font-weight:500">Đơn hàng của tôi</h3>

<table class="table table-bordered table-responsive align-middle">
  <thead>
    <tr>
      <th scope="col"> <span>#Mã đơn hàng </span></th>
      <th scope="col"> <span>Tổng đơn (bao gồm phí ship) </span></th>
        <th scope="col"> <span>Ngày đặt hàng </span></th>
        <th scope="col"> <span>Ngày nhận hàng </span></th>
      <th scope="col"> <span>Hình thức thanh toán </span></th>
      <th scope="col"> <span>Trạng thái </span></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    if(count($orders) == 0){
      echo '
       <p class="px-2" style="font-size: 18px">Bạn hiện chưa có đơn hàng nào hàng. Nhấn vào
					<a class="text-decoration-underline ms-1" style="color: #008848" href="collection/all">đây</a> để tiếp tục mua sắm
				</p>
      ';
    }
    else
        foreach($orders as $order): ?>
        <tr>
          <td class="text-center" scope="row"><?= $order['id'] ?></td>
          <td class="text-center"><?= number_format($order['total_price']) ?>đ</td>
              <td class="text-center"><?= date("d/m/Y", strtotime($order['created_at'])) ?></td>
              <td class="text-center"><?= date("d/m/Y", strtotime($order['date_received'])) ?></td>
              <td class="text-center"><?php 
                  switch ($order['status']) {
                      case 'processing':
                      echo '
                          <span class="alert alert-warning text-nowrap rounded py-1 px-2">Chờ xử lý</span>
                      ';
                      // echo 'Chờ xử lý';
                      break;
                      case 'confirmed':
                      // echo 'Đã xác nhận';
                      echo '
                          <span class="alert alert-primary text-nowrap rounded py-1 px-2">Đã xác nhận</span>
                      ';
                      break;
                      case'shipped':
                      echo '
                          <span class="alert alert-info text-nowrap rounded py-1 px-2">Đang giao</span>
                      ';
                      break;
                      case 'completed':
                      echo '
                          <span class="alert alert-success text-nowrap rounded py-1 px-2">Đã nhận hàng</span>
                      ';
                      break;
                      case'returned':
                      echo '
                          <span class="alert alert-danger text-nowrap rounded py-1 px-2">Đơn hoàn trả</span>
                      ';
                      break;
                  }
                  ?></td>
          <td class="text-center"><a href="account/orderdetail/<?= $order['id'] ?>">
              <button class="btn btn-primary text-nowrap">Xem chi tiết</button>
          </a></td>
        <tr>
    <?php endforeach; ?>
    
    </tr>
    
  </tbody>
</table>