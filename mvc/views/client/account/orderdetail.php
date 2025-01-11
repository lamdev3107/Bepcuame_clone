
<div class="d-flex align-items-center">
    <h3 class="p-2 w-100 pb-4 border-bottom mb-4 text-uppercase" style="font-size: 28px; color: #222222; font-weight:500">Chi tiết đơn hàng tôi</h3>
</div>

<div class="row ">
    <div class="col-md-10">
        <div class="form-group d-flex align-items-center gap-2 mb-3">
            <p class="mb-0"><strong>Mã đơn hàng: </strong></p>
            <p class="mb-0"><?= $order['id']?></p>
        </div>
        <!-- <p class="mb-3"><strong>Trạng thái: </strong> <?php 
            switch ($order['status']) {
                case 'processing':
                echo 'Chờ xác nhận';
                break;
                case 'confirmed':
                echo 'Đã xác nhận';
                break;
                case'shipped':
                echo 'Đang giao';
                break;
                case 'completed':
                echo 'Giao thành công';
                break;
                case'returned':
                echo 'Đơn hoàn trả';
                break;
            }
        ?></p> -->
        <div class="form-group d-flex align-items-center gap-2 mb-3">
            <p class="mb-0"><strong>Người nhận hàng: </strong></p>
            <p class="mb-0"><?= $order['recepient_name']?></p>
        </div>
        <div class="form-group d-flex align-items-center gap-2 mb-3">
            <p class="mb-0"><strong>Số điện thoại: </strong></p>
            <p class="mb-0"><?= $order['phone']?></p>
        </div>
          <div class="form-group d-flex align-items-center gap-2 mb-3">
            <p class="mb-0"><strong>Ngày đặt hàng: </strong></p>
            <p class="mb-0"><?= date("d/m/Y", strtotime($order['created_at'])) ?></p>
        </div>
        <div class="form-group d-flex align-items-center gap-2 mb-3">
            <p class="mb-0"><strong>Ngày nhận hàng: </strong></p>
            <p class="mb-0"><?= date("d/m/Y", strtotime($order['date_received'])) ?></p>
        </div>
        <div class="form-group d-flex align-items-center gap-2 mb-3" style="width: 350px">
            <p class="mb-0 text-nowrap"><strong>Thời gian nhận hàng: </strong></p>
            <p class="mb-0"><?=$order['time_received']?></p>
        </div>
        <?php if(trim($order['note']) !==""){ ?> 
            <div class="form-group">
                <p class="mb-1"> <strong>Ghi chú: </strong>  </p>
                <p class="mb-0"><?php var_dump($order['note'])?></p>

            </div>
        <?php }?>
        <div class="form-group d-flex align-items-center gap-2 mb-3">
            <p class="mb-0 text-nowrap"><strong>Địa chỉ: </strong></p>
            <p class="mb-0"><?=$order['address']?></p>
        </div>
        
        <p class="mb-2"><strong>Sản phẩm: </strong></p>
    </div>
</div>


<table class="table table-bordered table-striped align-middle mb-3"  width="100%" cellspacing="0">
<thead>
    <tr>
    <th scope="col">Mã sản phẩm</th>
    <th scopt="col">Tên sản phẩm</th>
    <th scope="col">Hình ảnh </th>
    <th scope="col">Giá thành</th>
    <th scope="col">Số lượng</th>
    <!-- <th scope="col">Thao tác</th> -->
    
    </tr>
</thead>
<tbody>
    <?php
    foreach ($orderDetails as $row) { ?>
    <tr>
        <td style="text-align: center; max-width: fit-content"><?= $row['product_id'] ?></td>
        <td style="text-align: center"><?= $row['name'] ?></td>
        <td style="text-align: center">
        <img src="<?= $row['image1'] ?>" height="60px">
        </td>
        <td  style="text-align: center"><?= number_format($row['price']) ?></td>
        <td style="text-align: center">
            <?= $row['quantity'] ?>
        </td>

        
    </tr>
    <?php } ?>
</tbody>
</table>
<p class="mb-4">
    <strong>Tổng đơn: </strong> <span class="total-price"><?= number_format($order['total_price'])?> </span>VNĐ (đã bao gồm phí ship)
</p>
       