<!-- pages-title-start -->
<?php 
		require_once "./mvc/core/redirect.php";
?>
 <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="/">Trang chủ</a></li>
                        <li><span  class="mx-2"> / </span class="mx-2">Giỏ hàng (<?php if(isset($_SESSION['cart']) && $_SESSION !== NULL)	echo count($_SESSION['cart']);
							else{
						    echo "0";}
						?>)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- pages-title-end -->
<!-- cart content section start -->
 <div class="product-details section-padding-top">
	 <div class="container product-details-box  rounded overflow-hidden">
        <h3 class="p-2 mb-4" style="font-size: 24px; color: #222222; font-weight:500">Giỏ hàng</h3>

		<div class="cart-wrapper">

			<?php if(isset($data_index['cart']) && $data_index !== NULL && count($data_index['cart']) > 0){ ?>
				<div class="row">
					<div class="col col-md-8 ">
						<div class="cart-list">
							<?php foreach($data_index['cart'] as $key => $value){ ?>
							<div class="cart-item position-relative mb-3">
								<div class="d-flex align-items-center gap-2">
									<a style="width: 6%" href="javascript:void(0)" class="btn btn-delete"
										onclick="deleteProduct('<?= $value['id'] ?>')">
										<i class="fa-solid fa-xmark d-block"></i>
										
									</a>
									<a class="" style="width: 100px; height: 100px" href="product/<?=$value['slug']?>">
										<img src="<?=$value['image1']?>" alt="" class="object-fit-cover w-100 h-100" />
									</a>
								
									<div class=" me-3 text-start" style="flex: 1">
										<a href="product/<?=$value['slug']?>" class="d-block text-start mb-1" style="font-size: 16px; font-weight: 500">
											<?=$value['name']?>
										</a>
										
									</div>
									<div class="text-start">
										<span class="text-danger fw-bold me-2 product-total-price-<?=$value['id']?>" style="font-size: 16px"><?=number_format((int)$value['price'] * (int)$value['quantity'])?>đ</span>
	
									</div>
									<div class="cart-action-btn" >
										<div class="update-cart-btn  d-flex align-items-center w-100 justify-content-between " style="min-width: 100px; margin: 0;">
											<button onclick="minusCartPage({
												'name': '<?=$value['name'] ?>',
												'slug': '<?=$value['slug'] ?>',
												'id': <?=$value['id'] ?>,
												'price':  <?=$value['price'] ?>,
												'image1': '<?=$value['image1'] ?>'
											})" class="minus-cart" style="width: 15%" style="background-color: transparent;">
												<i class="fa-solid fa-minus d-block w-100" style="font-size: 16px"></i>
											</button>
											
											<input disabled type="text"  class="count-cart-<?=$value['id']?> form-control text-center"  min="1" value="<?=$_SESSION['cart'][$value['id']]['quantity']?>" style="width: 60px; text-align: center; user-select: none ; color: #008848; border:none "/>
											
											<button onclick="plusCartPage({
												'name': '<?=$value['name'] ?>',
												'slug': '<?=$value['slug'] ?>',
												'id': <?=$value['id'] ?>,
												'price':  <?=$value['price'] ?>,
												'image1': '<?=$value['image1'] ?>'
											})" class="plus-cart"  style="width: 15%" style="background-color: transparent;">
												<i class="fa-solid fa-plus d-block w-100" style="font-size: 16px"></i>
											</button>
										</div>
									</div>
								</div>
								
							</div>
							<?php } ?>
						</div>
						
						
						
					</div>
					<div class="col col-md-4 pr-2 pl-1 border-start " >
						<div class="d-flex justify-content-between mx-2">
							<label class="form-label" style="font-size: 16px">Tổng tiền</label>
							<div class="text-end">
								<label class="fw-bold form-label total-order-price" style="font-size: 17px">
									<?php 
										$total =  0;
										foreach($data_index['cart'] as $key => $value){
											$total += (int)$value['price'] * (int)$value['quantity'];
										}
										echo number_format($total, 0, '', '.') . 'đ'
									?>
								</label>
								</label>
							</div>
						</div>
						<button type="submit" onclick="goOrdering()" class="btn w-100 add-cart-product text-white fw-bold mt-4 px-5  " style="background-color:#fe5722; min-width: 33.333%" style="margin: 0">
							TIẾN HÀNH THANH TOÁN
						</button>
	
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
	$( "#datepicker" ).datepicker({
		dateFormat: "dd-mm-yy"
		,	duration: "fast"
	});

	function plusCartPage(product){
        let count = parseInt($(`.count-cart-${product.id}`).val());
        ++count;
        $(`.count-cart-${product.id}`).val(count);

        $.ajax({
            url: "cart/update",
            method: "POST",
            dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
            data: {
                id: product.id, 
                name: product.name, 
                slug: product.slug, 
                price: product.price,
                image1: product.image1, 
                quantity: 1
            },
            success: function(res){
                let cartHTML = renderCartHTML(res.data);
                $('.header-cart').html(() => {
                    return cartHTML;
                });
				$(`.product-total-price-${product.id}`).html(() =>{
					let thanhtien = parseInt(res.returnData.quantity) * parseInt(res.returnData.price);
					thanhtien = Math.floor(thanhtien).format(0);
					return `${thanhtien}đ`

				})
				$(`.total-order-price`).html(() => {
					let thanhtien = 0;
					for(let item of res.data){
                        thanhtien += parseInt(item.quantity) * parseInt(item.price);
                    }
					thanhtien = Math.floor(thanhtien).format(0);

                    return `${thanhtien}đ`
				})
             
            },
            error: function(err){
                alert('Thêm vào giỏ hàng thất bại!', err);
            }

        })
    }   
    function minusCartPage(product){
        let count = parseInt($(`.count-cart-${product.id}`).val());
		if(count == 1){
            deleteProductPage(product.id)
            return;
        }
        --count;
        $(`.count-cart-${product.id}`).val(count);

        

        $.ajax({
            url: "cart/update",
            method: "POST",
            dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
            data: {
                id: product.id, 
                name: product.name, 
                slug: product.slug, 
                price: product.price,
                image1: product.image1, 
                quantity: -1
            },
            success: function(res){
                let cartHTML = renderCartHTML(res.data);
                $('.header-cart').html(() => {
                    return cartHTML;
                });
					$(`.product-total-price-${product.id}`).html(() =>{
					let thanhtien = parseInt(res.returnData.quantity) * parseInt(res.returnData.price);
					thanhtien = Math.floor(thanhtien).format(0);
					return `${thanhtien}đ`

				})
				$(`.total-order-price`).html(() => {
					let thanhtien = 0;
					for(let item of res.data){
                        thanhtien += parseInt(item.quantity) * parseInt(item.price);
                    }
					thanhtien = Math.floor(thanhtien).format(0);

                    return `${thanhtien}đ`
				})
                
            },
            error: function(err){
               console.log(err);
            }

        })
    } 

	

	function goOrdering(){

		// $redirect = new redirect('cart/order');

		window.location.href = `cart/order`;
		$.ajax({
			url: "cart/order",
            method: "POST",
            dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
            data: {
                id: parseInt(), 
            },
		})
	}
</script>
<!-- cart content section end -->