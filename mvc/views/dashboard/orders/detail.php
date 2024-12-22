        
<?php

if(isset($order) and $order != null){ 
    
    ?>

        
<div class="card shadow mb-4">
   
    <div class="card-header d-flex align-items-center gap-2 py-3">
         <a href="dashboard/order" class="text-primary" style="background-color: transparent; border:none">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h6 class="m-0 font-weight-bold text-primary">
        Chi tiết đơn hàng
        </h6>
    </div>
    
    <div class="card-body position-relative">  
        <?php if (isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-success">
                <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
            </div>
        <?php } ?>
        <div class="position-absolute  top-5 d-flex justify-content-end align-items-center mb-3" style="right: 20px; ">
            
        <?php } ?>
        </div>
        <div class="row ">
            <div class="col-md-10">
                <p><strong>Mã đơn hàng: </strong><?= $order['id']?></p>
                <p><strong>Trạng thái: </strong> <?php 
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
                ?></p>

                <p><strong>Tên khách hàng: </strong><?= $order['recepient_name']?></p>
                <p><strong>Số điện thoại: </strong><?= $order['phone']?></p>
                <p><strong>Ngày nhận: </strong><?=  date("d-m-Y", strtotime($order['date_received']))?></p>
                <p><strong>Thời gian nhận hàng: </strong><?= $order['time_received'] ?></p>
                <p><strong>Địa chỉ: </strong><?= $order['address']  ?></p>
                <p><strong>Sản phẩm: </strong></p>
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
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($orderDetails as $row) { ?>
                <tr>
                    <td style="vertical-align: middle"><?= $row['id'] ?></td>
                    <td style="vertical-align: middle"><?= $row['name'] ?></td>
                    <td style="vertical-align: middle">
                    <img src="<?= $row['image1'] ?>" height="60px">
                    </td>
                    <td style="vertical-align: middle"><?= number_format($row['price']) ?>đ</td>
                    <td style="vertical-align: middle"><?= $row['quantity'] ?></td>
                   
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <p><strong>Tổng đơn: </strong> <?= number_format($order['total_price'])?> VNĐ (bao gồm phí ship)</p>
        <?php if($order['note'] !==""){ ?> 
            <p>Ghi chú: <?= $order['note'] ?> </p>
        <?php }?>
       

    </div>
    
</div>

