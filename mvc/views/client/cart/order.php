<!-- pages-title-start -->

<div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="">Trang chủ</a></li>
                        <li><a href="cart"><span  class="mx-2"> / </span class="mx-2">Giỏ hàng</a></li>
                        <li><span  class="mx-2"> / </span class="mx-2">Thông tin đặt hàng </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- pages-title-end -->
<!-- cart content section start -->
 =<div class="product-details section-padding-top">
	<div class="container product-details-box  rounded overflow-hidden">
        <h3 class="p-2 mb-4" style="font-size: 24px; color: #222222; font-weight:500">Thông tin giao hàng</h3>

		<div class="cart-wrapper">

			<?php if(isset($data_index['cart']) && $data_index !== NULL && count($data_index['cart']) > 0){ ?>
				<div class="row">
					<div class="col col-md-7 ">
						<form class="mx-4"  >
							<div class="form-alert"></div>
							<div class="row mb-4">
								<div class="col-12 col-lg-6" class="form-group">
									<label for="" class="mb-2 fw-bold" style=" font-size: 15px">Người nhận</label>
									<input 
									name="name"
									type="text" 
									required
									class="form-control" id="=" placeholder="Nhập đầy đủ họ và tên..."/>
								</div>
								<div class="col-12 col-lg-6">
									<label for="" class="mb-2 fw-bold" style=" font-size: 15px">Số điện thoại</label>
									<input type="text" name="phone" required class="form-control" id="" placeholder="Nhập số điện thoại...">
								</div>
							</div>
							
							<div class="row mb-3">
								<label for="" class="mb-2 fw-bold" style=" font-size: 15px">Địa chỉ nhận hàng</label>
								<div class="col-12 col-lg-4">
									<select id="tinh" style="max-height: 150px; overflow: auto" name="province" class="form-select " required title="Chọn Tỉnh Thành">
										<option selected>Chọn tỉnh/thành</option>
										
									</select>
									
								</div>
								<div class="col-12 col-lg-4">
									<select id="quan" name="district" class="form-select" required title="Chọn Quận Huyện">
										<option selected>Chọn quận/huyện</option>
									
									</select>
								</div>
								<div class="col-12 col-lg-4">
									<select id="phuong" required name="ward" class="form-select" title="Chọn Phường Xã">
										<option selected>Chọn phường/xã</option>
										
									</select>
								</div>
								
							</div>
							<div class="col-12 mb-4">
								<input type="text" name="address" 
								required
								class="form-control" placeholder="Nhập địa chỉ chi tiết của bạn (Số nhà, đường,...)">
							</div>

							<div   class="row mb-3">
								<div class="form-group  col-12 col-lg-6">
									<label class="form-label fw-bold" style="font-size: 15px" for="datepicker">Ngày nhận hàng
									</label>	
									<input 
									required
									name="date_received" id="datepicker" type="text" placeholder="Chọn ngày nhận" class="form-control picker" autocomplete="off">
		
								</div>
								<div class="form-group col-12 col-lg-6">
									<div class="form-label fw-bold" style="font-size: 15px">
										Thời gian nhận hàng
									</div>
									<select class="form-select" required name="time_received" aria-label="Default select example">
										<option value="Càng sớm càng tốt" selected>Càng sớm càng tốt</option>
										<option value="Sáng: 08h00 - 12h00">Sáng: 08h00 - 12h00</option>
										<option value="Chiều: 14h00 - 18h00">Chiều: 14h00 - 18h00</option>
										<option value="Tối: 19h00 - 21h00">Tối: 19h00 - 21h00</option>
									</select>
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="col-12 " class="form-group">
									<label for="" class="mb-1 fw-bold" style=" font-size: 15px">Phương thức thanh toán</label>
									<div class="form-checkk">
										<input class="form-check-input me-2" value="cash" name="payment_method" type="radio"  id="flexRadioDefault2" checked>
										<label 
										style="font-size: 15px"
										class="form-check-label" for="flexRadioDefault2">
											Thanh toán khi giao hàng (COD)
										</label>
									</div>
									<!-- <div class="form-checkk">
										<input class="form-check-input me-2" value="card" type="radio" name="payment_method" id="flexRadioDefault2" >
										<label 
										style="font-size: 15px"
										class="form-check-label" for="flexRadioDefault2">
											Chuyển khoản qua ngân hàng
										</label>
									</div> -->
								</div>
							</div>

							<div class="form-group col-12 mb-4">
								<div class="form-label fw-bold" style="font-size: 15px">
									Ghi chú đơn hàng
								</div>
								<textarea name="note" id="" class="form-control w-100">
								</textarea>
							</div>

							<div class="d-flex justify-content-between align-items-center">
								<a href="cart" class="" style="font-size: 15px">
									<i class="fa-solid fa-angle-left"></i>
									Giỏ hàng
								</a>
								<button type="button" onclick="createOrder()" class="btn btn-primary px-2 py-2">
									Hoàn tất đơn hàng
								</button>
							</div>
						</form>
					</div>
					<div class="col col-md-5 px-3 border-start " >
						<div class="cart-list">
								<?php foreach($data_index['cart'] as $key => $value){ ?>
								<div class="cart-item position-relative mb-4">
									<div class="d-flex align-items-center gap-2">
										<a class=" position-relative" style="width: 65px; height: 65px" href="product/<?=$value['slug']?>">
											<img src="<?=$value['image1']?>" alt="" class="rounded  object-fit-cover w-100 h-100" />
											<p style="width: 22px; height: 22px; font-size: 12px; line-height: 100%; top: -8px; right: -8px; background-color: #fcbe10" class="position-absolute   p-1 rounded-circle text-center align-items-center fw-bold"><?=$value['quantity'] ?></p>
										</a>
									
										<div class=" me-3 text-start" style="flex: 1">
											<a href="product/<?=$value['slug']?>" class="d-block text-start mb-1" style="font-size: 16px; font-weight: 500">
												<?=$value['name']?>
											</a>
											
										</div>
										<div class="text-start">
											<span class="text-danger fw-bold me-2 product-total-price-<?=$value['id']?>" style="font-size: 16px"><?=number_format((int)$value['price'] * (int)$value['quantity'])?>đ</span>
		
										</div>
									
									</div>
									
								</div>
								<?php } ?>
							</div>
		
							<div class="d-flex flex-column  justify-content-between py-3 mx-2 border-top border-bottom">
								<div class="d-flex justify-content-between">
									<label class="form-label" style="font-size: 16px">Tạm tính </label>
									<div class="text-end">
										<label class="fw-bold form-label total-order-price" style="font-size: 16px">
											<?php 
												$total =  0;
												foreach($data_index['cart'] as $key => $value){
													$total += (int)$value['price'] * (int)$value['quantity'];
												}
												echo number_format($total, 0, '', '.') . 'đ'
											?>
										</label>
										
									</div>
								</div>
								<div class="d-flex justify-content-between">
									<label class="form-label" style="font-size: 16px">Phí vận chuyển </label>
									<div class="text-end">
										<label class="fw-bold form-label total-order-price" style="font-size: 16px">
											+ 30.000đ
										</label>
										
									</div>
								</div>
							</div>
							
							<div class="d-flex justify-content-between mx-2 py-3">
									<label class="form-label fw-bold" style="font-size: 17px">Tổng tiền </label>
									<div class="text-end">
										<label class="fw-bold form-label total-order-price" style="font-size: 17px">
											<?php 
												$total =  0;
												foreach($data_index['cart'] as $key => $value){
													$total += (int)$value['price'] * (int)$value['quantity'] ;
													
												}
												$total += 30000; // thêm phí vận chuyển
												echo number_format($total, 0, '', '.') . 'đ'
											?>
										</label>
										
									</div>
								</div>
		
						</div>
						
					</div>
			<?php } else{ ?>
				<p class="px-2" style="font-size: 18px">Bạn hiện chưa có sản phẩm nào trong giỏ hàng. Nhấn vào
	
					<a class="text-decoration-underline" style="color: #008848" href="collection/all">đây</a> để tiếp tục mua sắm
				</p>
	
			<?php } ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		//Lấy tỉnh thành
		$.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm',function(data_tinh){	       
			if(data_tinh.error==0){
				$.each(data_tinh.data, function (key_tinh,val_tinh) {
					$("#tinh").append('<option  value="'+val_tinh.id+'">'+val_tinh.full_name+'</option>');
					$("#tinh").attr('data_id', val_tinh.id);

				});
				$("#tinh").change(function(e){
					var idtinh=$(this).val();
					console.log($(this));
					//Lấy quận huyện
					$.getJSON('https://esgoo.net/api-tinhthanh/2/'+idtinh+'.htm',function(data_quan){	       
						if(data_quan.error==0){
							$("#quan").html('<option value="0">Quận Huyện</option>');  
							$("#phuong").html('<option value="0">Chọn quận/huyện</option>');   
							$.each(data_quan.data, function (key_quan,val_quan) {
								$("#quan").append('<option value="'+val_quan.id+'">'+val_quan.full_name+'</option>');
								$("#quan").attr('data_id', val_quan.id);

							});
							//Lấy phường xã  
							$("#quan").change(function(e){
								var idquan=$(this).val();
								$.getJSON('https://esgoo.net/api-tinhthanh/3/'+idquan+'.htm',function(data_phuong){	       
									if(data_phuong.error==0){
										$("#phuong").html('<option value="0">Chọn phường/xã</option>');   
										$.each(data_phuong.data, function (key_phuong,val_phuong) {
											$("#phuong").append('<option value="'+val_phuong.id+'">'+val_phuong.full_name+'</option>');
										});
									}
								});
							});
							
						}
					});
				});   
				
			}
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
	function createOrder(){
		let idphuong = $("#phuong").val();
		let dataLocation = "";
		let userId = parseInt("<?php echo $_SESSION['user']['id']?>");
		console.log("<?php echo $_SESSION['user']['id']?>");
		let total_price = "<?php  	
			$total =  0;
			foreach($data_index['cart'] as $key => $value){
				$total += (int)$value['price'] * (int)$value['quantity'] ;
				
			}
			$total += 30000; 
			echo $total;
		?>"
		$.getJSON('https://esgoo.net/api-tinhthanh/5/'+idphuong+'.htm',function(data){
			dataLocation = data.data.full_name;
			if($('input[name="name"]').val() == "" || $('input[name="phone"]').val()=="" || $('input[name="date_received"]').val() =="" || $('select[name="time_received"]').val() =="" || $('input[name="payment_method"]').val() =="" || dataLocation == ""){
				$('.form-alert').html(() => {
					return `<div class="alert alert-warning" role="alert">
						Vui lòng điền đầy đủ thông tin đơn hàng!
						</div>`
				})
				return;
			}
			$.ajax({
				url: 'cart/order',
				// dataType: 'json',
				type: 'POST',
				data: {
					userId: userId,
					name: $('input[name="name"]').val(),
					phone: $('input[name="phone"]').val(),
					address: $('input[name="address"]').val() + ", " + dataLocation,
					date_received: convertToMySQLDate($('input[name="date_received"]').val()),
					time_received: $('select[name="time_received"]').val(),
					note: $('textarea[name="note"]').val(),
					payment_method: $('input[name="payment_method"]').val(),
					total_price: total_price,
					
				
				},
				success: function(response){

					Swal.fire({
						icon: "success",
						title: "Đặt hàng thành công!",
						showConfirmButton: false,
						timer: 1500
					});
					setTimeout(() => {
						window.location.href = "cart";

					}, 1800)
				},
				error: function(error){
					console.log("error", error);
				}
			})
		})
		
	}
</script>
<!-- cart content section end -->