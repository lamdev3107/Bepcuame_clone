        
<?php

if(isset($order) and $order != null){ 
    
    ?>

        
<div class="card shadow mb-4">
   
    <div class="card-header d-flex align-items-center gap-2 py-3">
        <a href="dashboard/order" class="text-primary" style="background-color: transparent; border:none">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h6 class="m-0 font-weight-bold text-primary">
        Cập nhật đơn hàng
        </h6>
    </div>
    
    <div class="card-body position-relative">  
        <?php if (isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-success">
                <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
            </div>
        <?php } ?>
        <div class="position-absolute  top-5 d-flex justify-content-end align-items-center mb-3" style="right: 20px; ">
            <form class="form d-flex align-items-center gap-2 mr-2">
                <label for="order-status" class="mr-2 text-nowrap text-primary " style=" font-size: 16px; font-weight:700">Thay đổi trạng thái</label>
                <select id="order-status"  name="status" class="form-select rounded " style="width:170px; padding: 6px 8px" required >
            
                    <?php  
                        $status_options = array("processing" => "Chờ xác nhận","confirmed" => "Đã xác nhận", "shipped" => "Đang giao", "completed" => "Giao thành công",  "returned" => "Đơn hoàn trả");
                        echo $order['status'];
                        foreach ($status_options as $key => $value) {
                            if($key == $order['status']) 
                                echo '<option selected value="'.$key.'">'.$value.'</option>';
                            else{
                                echo '<option value="'.$key.'">'.$value.'</option>';
                            }
                        }
                    ?>
                    
                </select>
            </form>
            
            <!-- <a href="dashboard/order/confirmOrder/?id=<?= $order['id'] ?>" class="btn btn-success mr-2">Thay đổi trạng thái</a> -->
            <a href="dashboard/order/delete/?id=<?= $order['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
        <?php } ?>
        </div>

        <div class="row ">
            <form method="post" action="order/update" class="col-md-10">
                <div class="form-group d-flex align-items-center gap-2">
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
                <div class="form-group d-flex align-items-center gap-2">
                    <p class="mb-0"><strong>Tên khách hàng: </strong></p>
                    <input style="width: 272px"
                    class="form-control"  name="name" value="<?= $order['recepient_name']?>">
                    
                </div>
                <div class="form-group d-flex align-items-center gap-2">
                    <p class="mb-0"><strong>Số điện thoại: </strong></p>
                    <input
                    style="width: 272px"
                     class="form-control"  name="phone" value="<?= $order['phone']?>">
                    
                </div>
                <div class="form-group d-flex align-items-center gap-2">
                    <p class="mb-0"><strong>Ngày nhận hàng: </strong></p>
                    <input 
                    style="width: 272px"
                    required
                    value="<?= date("d/m/Y", strtotime($order['date_received'])) ?>"
                    name="date_received" id="datepicker" type="text" placeholder="Chọn ngày nhận"  class="form-control picker" autocomplete="off"/>
                    
                </div>
                <div class="form-group d-flex align-items-center gap-2 " style="width: 350px">
                    <p class="mb-0 text-nowrap"><strong>Thời gian nhận hàng: </strong></p>
                    <select style="width: 300px" class="form-select" required name="time_received" aria-label="Default select example" value="<?=$order['time_received']?>">
                        <?php 
                            $array = ["Càng sớm càng tốt", "Sáng: 08h00 - 12h00","Chiều: 14h00 - 18h00","Tối: 19h00 - 21h00" ];
                            for($i = 0; $i < count($array); $i++){
                                if($order['time_received'] == $array[$i]){
                                   ?>
                                    <option selected value="<?php echo $array[$i]?>"><?php echo $array[$i]?></option>
                                    <?php
                                }
                                else{
                                     ?>
                                    <option value="<?php echo $array[$i]?>"><?php echo $array[$i]?></option>
                                    <?php
                                }
                            }
                        ?>
                        
                    </select>
                    
                </div>
                <div class="form-group">
                    <p class="mb-2"><strong>Địa chỉ: </strong></p>
                    <input class="form-control" name="address" id="" value="<?= $order['address']  ?>"></input>
                </div>
              
                <p><strong>Sản phẩm: </strong></p>
            </form>
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
                    <td style="vertical-align: middle"><?= $row['product_id'] ?></td>
                    <td style="vertical-align: middle"><?= $row['name'] ?></td>
                    <td style="vertical-align: middle">
                    <img src="<?= $row['image1'] ?>" height="60px">
                    </td>
                    <td  style="vertical-align: middle"><?= number_format($row['price']) ?></td>
                    <td style="vertical-align: middle">
                        <input data-id="<?=$row['id']?>" style="width: 50px" type="number" min="1" onchange=" onChangeQuantity()" value="<?= $row['quantity'] ?>">
                    </td>

                 
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <p><strong>Tổng đơn: </strong> <span class="total-price"><?= number_format($order['total_price'])?> </span>VNĐ (bao gồm phí ship)
        </p>
        <?php if($order['note'] !==""){ ?> 
            <div class="form-group">
                <p class="mb-1"> <strong>Ghi chú: </strong>  </p>
                <input name="note" id="" class="form-control" value="<?= $order['note'] ?>"></input>
            </div>
        <?php }?>
       
       <button type="button" onclick="updateOrder(<?=$order['id']?>)" class="btn btn-primary float-right">Lưu cập nhật</button>
    </div>
             
</div>
<script>
  
    function onChangeQuantity() {
        let totalPrice = 0;
        let inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach(input => {
            let price = Number(input.parentNode.previousElementSibling.innerHTML.replace(/,/g, ''))
            totalPrice += parseInt(input.value) * price
        });
        totalPrice += 30000;
        document.querySelector('.total-price').innerHTML = `${Math.floor(totalPrice).format(0)} `;
    }
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });
    });


// Create Order
	function convertToMySQLDate(dateString) {
		// Chuyển chuỗi "27/01/2023" sang định dạng Date của JavaScript
		const parts = dateString.split('/'); // Tách chuỗi dựa trên "/"
		const day = parseInt(parts[0], 10);
		const month = parseInt(parts[1], 10) - 1; // Tháng bắt đầu từ 0 trong JS
		const year = parseInt(parts[2], 10);

		// Tạo đối tượng Date
		const jsDate = new Date(year, month, day);
		// Chuyển sang định dạng MySQL (YYYY-MM-DD HH:MM:SS)
		const mysqlDate = jsDate.toISOString().slice(0, 19).replace('T', ' ');

		return mysqlDate;
	}

    function updateOrder(orderId){
        let status = $('select[name="status"]').val();
        //Update order-details
        let inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach(input => {
            let quantity = Number(parseInt(input.value)) ;
            let orderDetailId = parseInt(input.getAttribute('data-id'));
            
            $.ajax({
                url: `dashboard/order/update_order_detail/?id=${orderDetailId}`,
                // dataType: 'json',
                type: 'POST',
                data: {
                    quantity: quantity,
                },
                success: function(response){
                    console.log(response);
                    if(response === "success"){
                        Swal.fire({
                            icon: "success",
                            title: "Cập nhật đơn hàng chi tiết thành công!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                    else{
                        Swal.fire({
                            icon: "error",
                            title: "Cập nhật đơn hàng chi tiết thất bại!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                },
                error: function(error){
                    console.log("error", error);
                }
            })
        });
        $.ajax({
            url: `dashboard/order/update/?id=${orderId}`,
            // dataType: 'json',
            type: 'POST',
            data: {
                status: status,
                name: $('input[name="name"]').val(),
                phone: $('input[name="phone"]').val(),
                address: $('input[name="address"]').val(),
                date_received: convertToMySQLDate($('input[name="date_received"]').val()),
                time_received: $('select[name="time_received"]').val(),
                note: $('input[name="note"]').val(),
                total_price: $('.total-price').text().replace(/,/g, ''),
            
            },
            success: function(response){
                if(response === "success"){
                    setTimeout(() => {
                        window.location.href= `dashboard/order/?status=${status}`

                    }, 1500);
                    Swal.fire({
                        icon: "success",
                        title: "Cập nhật đơn hàng thành công!",
                        showConfirmButton: false,
                        timer: 1500
                    });

                }
                else{
                     Swal.fire({
                        icon: "error",
                        title: "Cập nhật đơn hàng thất bại!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }

            },
            error: function(error){
                console.log("error", error);
            }
        })
		

        
	}
</script>



