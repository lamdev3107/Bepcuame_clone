

<!doctype html>
<html class="no-js" lang="vi-vn">

<head>
   
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bếp của mẹ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="public/img/logo.png">

    <base href="http://localhost/bepcuame/">

    <!-- Place icon.png in the root directory -->
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- all css here -->
    <!-- bootstrap v5.3.3css -->
    <link rel="stylesheet" href="public/css/bootstrap.css">

    <!-- Font-awesome icon -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  
    <!-- animate css -->
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- pe-icon-7-stroke -->
    <link rel="stylesheet" href="public/css/materialdesignicons.min.css">
    <!-- pe-icon-7-stroke -->
    <link rel="stylesheet" href="public/css/jquery.simpleLens.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="public/css/jquery-ui.min.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="public/css/meanmenu.min.css">
    <!-- date picker css -->
    <link rel="stylesheet" href="public/css/jquery.datetimepicker.min.css">

   
    <!-- summernote css -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->

    <!-- style css -->
    <link rel="stylesheet" href="public/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="public/css/responsive.css">
     <!-- owl.carousel css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.css" integrity="sha512-riTSV+/RKaiReucjeDW+Id3WlRLVZlTKAJJOHejihLiYHdGaHV7lxWaCfAvUR0ErLYvxTePZpuKZbrTbwpyG9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom css -->
    <link rel="stylesheet" href="public/css/custom.css">
        
    <!-- jquery latest version -->
    <script src="public/vendor/jquery/jquery.min.js"></script>


   
</head>

<body>
    
    <!-- header section start -->
    <?php
   require_once './mvc/views/client/header_footer/header.php'
    ?>
    <!-- header section end -->

    <!-- slider-section-start -->
    <?php
    require_once './mvc/views/client/'.$page.'.php';
    ?>
    <!-- slider section end -->

    <!-- footer section start -->
    <?php
    require_once './mvc/views/client/header_footer/footer.php';
    ?>


    <a target="_blank" href="https://www.facebook.com/messages/t/1607091752945435" class="position-fixed mess-logo" >
        <img src="public/img/about/messenger.png" alt="">
    </a>
    <?php
        if(isset($_SESSION['alert_message']) && $_SESSION['alert_message'] != ""){
    ?>
            <script>
                Swal.fire({
                icon: "<?php echo $_SESSION['alert_type']; ?>",
                title: "<?php  echo $_SESSION['alert_message']; ?>",
                showConfirmButton:  <?php echo isset($_SESSION['alert_timer']) && $_SESSION['alert_timer'] ? 'false' : 'true'; ?>,
                timer: <?php if (isset($_SESSION['alert_timer']) && $_SESSION['alert_timer']) echo 2000;  ?>
                });




              
            </script>
       
    <?php 
        unset($_SESSION['alert_message']);
        unset($_SESSION['alert_type']);
    }?>

    <!-- Messenger  -->
    <div class="box-chat position-fixed" >
        <div class="box-chat__header d-flex align-items-center justify-content-between" style="">
            <div class="img"></div>

        </div>
        <div class="box-chat__content">

        </div>
        <div class="box-chat__input ">
            <input type="text" id="input-chat" placeholder="Nhập tin nhắn...">
            <button class="btn btn-send"><i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
    

   
    <!-- modernizr js -->
    <script src="/public/js/modernizr-2.8.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="public/js/bootstrap.min.js"></script>
    
    <!-- countdown JS -->
    <script src="public/js/countdown.js"></script>

    <!-- owl.carousel js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
   
    <!-- simpleLens JS -->
    <script src="public/js/jquery.simpleLens.min.js"></script>
    <!-- jquery-ui js -->
    <script src="public/js/jquery-ui.min.js"></script>
    <!-- load-more js -->
    <script src="public/js/load-more.js"></script>
    <!-- plugins js -->
    <script src="public/js/plugins.js"></script>
    <!-- main js -->
    <script src="public/js/main.js"></script>
    <!-- datetime picker js -->
    <script src="public/vendor/jquery.datetimepicker.full.min.js"></script>


    <!-- sweetalert2 -->
      <!-- sweet-alert css -->
     <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css
    " rel="stylesheet">
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js
    "></script>

    <script>
        // ------------------- Cart Flow ----------------------------
    function plusCart(product){
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
             
            },
            error: function(err){
                alert('Thêm vào gi�� hàng thất bại!', err);
            }

        })
    }   
    function minusCart(product){
        let count = parseInt($(`.count-cart-${product.id}`).val());
        --count;
        if(count == 0){
            deleteProduct(product.id)
            return;
        }
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
                
            },
            error: function(err){
                $('.cart-action-btn[productId='+product.id+']').html(()=>{
                return `<button productId="' . $row['id'] . '"  onclick="addToCart({
                        'name': '${product.name}',
                        'slug': '${product.slug}',
                        'id': ${product.id},
                        'price': ${product.price},
                        'image1': '${product.image1}'
                    })" class="add-cart-btn p-2">
                        Chọn mua
                    </button>`;
                })
            }

        })
    }                             
    function deleteProduct(id) {
          $.ajax({
            url: "cart/deleteProduct",
            method: "POST",
            dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
            data: {
                id: parseInt(id), 
            },
			
            success: function(res){
                let products = res.data;
				let cartHTML = "";
				let cartHeaderHTML = renderCartHTML(res.data);
                
                $('.header-cart').html(() => {
                    return cartHeaderHTML;
                });
				let product = res.returnData;

			
				products.map((item) => {
					let thanhtien = parseInt(item.price) * parseInt(item.quantity);
        			thanhtien = Math.floor(thanhtien).format(0);
  
					cartHTML += `
						<div class="cart-item position-relative mb-3">
							<div class="d-flex align-items-center gap-2">
								<a style="width: 6%" href="javascript:void(0)" class="btn btn-delete"
									onclick="deleteProduct(${item.id})">
									<i class="fa-solid fa-xmark d-block"></i>
									
								</a>
								<a class="" style="width: 100px; height: 100px" href="product/${item.slug}">
									<img src="${item.image1}" alt="" class="object-fit-cover w-100 h-100" />
								</a>
							
								<div class=" me-3 text-start" style="flex: 1">
									<a href="product/${item.slug}" class="d-block text-start mb-1" style="font-size: 16px; font-weight: 500">
										${item.name}
									</a>
									
								</div>
								<div class="text-start">
									<span class="text-danger fw-bold me-2" style="font-size: 16px">${thanhtien}đ</span>

								</div>
								<div class="cart-action-btn" productId="${item.id}">
									<div class="update-cart-btn  d-flex align-items-center justify-content-between " style="min-width: 100px; margin: 0;">
										<button onclick="minusCartPage({
											'name': '${item.name}',
											'slug': '${item.slug}',
											'id': ${item.id},
											'price': ${item.price},
											'image1': '${item.image1}'
										})" class="minus-cart" style="width: 15%" style="background-color: transparent;">
											<i class="fa-solid fa-minus d-block w-100" style="font-size: 16px"></i>
										</button>
										
										<input disabled type="text"  class="count-cart-${item.id} form-control text-center"  min="1" value="${item.quantity}" style="width: 60px; text-align: center; user-select: none ; color: #008848; border:none "/>
										
										<button onclick="plusCartPage({
											'name': '${item.name}',
											'slug': '${item.slug}',
											'id': ${item.id},
											'price': ${item.price},
											'image1': '${item.image1}'
										})" class="plus-cart"  style="width: 15%" style="background-color: transparent;">
											<i class="fa-solid fa-plus d-block w-100" style="font-size: 16px"></i>
										</button>
									</div>
								</div>
							</div>
							
						</div>
						
					`
				})
				if(res.data.length === 0){
                	
					$('.cart-wrapper').html(
						() => {
							return `<p class="px-2" style="font-size: 18px">Bạn hiện chưa có sản phẩm nào trong giỏ hàng. Nhấn vào<a class="text-decoration-underline" style="color: #008848" href="collection/all">đây</a> để tiếp tục mua sắm
							</p>`
						}
					)
                    $('.cart-action-btn[productId='+product.id+']').html(()=>{
                        return `<button productId="' . $row['id'] . '"  onclick="addToCart({
                                'name': '${product.name}',
                                'slug': '${product.slug}',
                                'id': ${product.id},
                                'price': ${product.price},
                                'image1': '${product.image1}'
                            })" class="add-cart-btn p-2">
                                Chọn mua
                            </button>`;
                    })
					return;
				}
                // $('.cart-list').html(()=>{
                // 	return `${cartHTML}`;
                // })
				
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
                alert('Thêm vào gi�� hàng thất bại!', err);
            }

        })
    }


    function addToCart(product){
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
                Swal.fire({
                    // icon: "success",
                    text: "Thêm sản phẩm vào giỏ hàng thành công!",
                    imageUrl: res.returnData.image1,
                    imageWidth: 300,
                    // imageHeight: 200,
                    showConfirmButton: false,
                    timer: 1500
                });
                $('.cart-action-btn[productId='+res.returnData.id+']').html(()=>{
                    return `<div class="update-cart-btn d-flex align-items-center justify-content-stretch">
                    
                            <button onclick="minusCart({
                                'name': '${res.returnData.name}',
                                'slug': '${res.returnData.slug}',
                                'id': ${res.returnData.id},
                                'price': ${res.returnData.price},
                                'image1': '${res.returnData.image1}'
                            })" class="minus-cart" style="width: 15%; background-color: transparent;">
                            <i class="fa-solid fa-minus"></i>
                            </button>
                
                            <input disabled type="text" class="count-cart count-cart-${res.returnData.id} form-control text-center" min="1" value="${res.returnData.quantity}" style="width: 30px; text-align: center; user-select: none " />
                
                            <button onclick="plusCart({
                                'name': '${res.returnData.name}',
                                'slug': '${res.returnData.slug}',
                                'id': ${res.returnData.id},
                                'price': ${res.returnData.price},
                                'image1': '${res.returnData.image1}'
                            })" class="plus-cart"  style="width: 15%; background-color: transparent;">
                            <i class="fa-solid fa-plus"></i>
                            </button>
                
                        </div>`
                    });
                let cartHTML = renderCartHTML(res.data);
                $('.header-cart').html(() => {
                    
                    return cartHTML;

                });
                   

            },
            error: function(err){
                alert('Thêm vào giỏ hàng thất bại!', err);
            }

        })
    }


    function renderCartHTML(cartArray){
        let soluong = cartArray.length
        let thanhtien = cartArray.reduce((sum, item) => {
            return sum+= parseInt(item.quantity) * parseInt(item.price)
        }, 0)
        thanhtien = Math.floor(thanhtien).format(0);
        let cartList =  ""
        cartArray.map((item) => {
            cartList += `
                <div class="cart-item position-relative mb-3">
                <div class="d-flex align-items-start gap-2">
                    <a class="" style="width: 70px; height: 70px" href="product/${item.slug}">
                        <img src="${item.image1}" alt="" class="object-fit-cover w-100 h-100" />
                    </a>
                
                    <div class=" me-3 text-start" style="flex: 1">
                        <a href="product/${item.slug}" class="d-block text-start mb-1" style="font-size: 14px; font-weight: 500">
                            ${item.name}
                        </a>
                        <div class="text-start">
                            <span class="text-danger fw-bold" style="font-size: 14px">
                                ${Math.floor(item.price).format(0)}đ</span>
                            <span class="">x</span>
                            <span>${item.quantity}</span>

                        </div>
                    </div>

                    <a class="" href="javascript:void(0)" class="btn btn-delete"
                        onclick="deleteProduct(${item.id})">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
                
            </div>
            `
        })
        let cartDropdown = `<p>Giỏ hàng chưa có sản phẩm nào</p>`
        if(cartArray.length > 0){
            cartDropdown = ` 
                    <div class="cart-header-list overflow-auto px-3" style="max-height: 350px">
                        ${cartList}
                    </div>
                    <div class="text-start py-3 border-top mx-3">
                        <span>Tổng tiền tạm tính: <span class="text-danger fw-bold"> ${thanhtien}đ</span>

                    </div>
                    <a class=" d-block  p-2 rounded go-checkout-btn mx-3"  href="cart">Tiến hành thanh toán</a>
                `
        }
        let returnHTML = `
                <a  href="cart" class="cart d-flex align-items-center gap-2  " style="color:#008848">
                    <i class="mdi mdi-cart" style="font-size: 20px"></i>
                    <span style="text-wrap:nowrap">Giỏ hàng</span>
                    <span style="padding: 1px 6px;background-color:#fbc011;color: black;border-radius: 4px; font-size: 14px"  class="quantity">
                        ${soluong}
                    </span>  
                </a>
                <div class="cartdrop" style="cursor: default;">
                    ${cartDropdown}
                </div>
            `
        return returnHTML;
    }
  
    function formatMoney(__this) {
        let val = __this;
        // let num = val.replace(/[^\d]/g,"");
        let arr = val.split('.');
        let val_num = arr[0];
        let len = val_num.length;
        let result = '';
        let j = 0;
        for (let index = len; index > 0; index--) {
            j++;
            if (j % 3 == 1 && j != 1) {
                result = val_num.substr(index - 1, 1) + ',' + result;
            } else {
                result = val_num.substr(index - 1, 1) + result;
            }
        }
        return result
    }
    Number.prototype.format = function(n, x) {
        let re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
    }


    $(document).ready(function() {
        $('.picker').datetimepicker({
            autoclose: true,
            timepicker:false,
            datepicker:true,
            format:"d/m/Y",
            weeks: true
        })
        $.datetimepicker.setLocale('vi')
    })


      //Carosel/Slider management
    $(document).ready(function() {
        //----------Carousel ------------//
        function checkNavigation(event, prevBtn, nextBtn) {
            let items = event.item.count;        // Tổng số item
            let item = event.item.index;         // Vị trí hiện tại
            // Ẩn/Hiện nút Prev
            if (item === 0) {
                prevBtn.addClass("hidden");
            } else {
                prevBtn.removeClass("hidden");
            }
            // Ẩn/Hiện nút Next
            if (item === items - 1) {
                nextBtn.addClass("hidden");
            } else {
                nextBtn.removeClass("hidden");
            }
        }
        function controlCarousel(sliderObj, prevBtn, nextBtn) {
              // Nút Prev và Next hoạt động
            prevBtn.click(function() {
                sliderObj.trigger("prev.owl.carousel");
            });
            nextBtn.click(function() {
                sliderObj.trigger("next.owl.carousel");
            });
        }
        let popular_slider  =  $('.popular-carousel').owlCarousel({
            loop: false,
            margin: 28,
            nav: false,
            navRewind: true, 
            lazyLoad: true,
            navText: [
                "<i class='fa fa-caret-left'></i>",
                "<i class='fa fa-caret-right'></i>"
            ],
            autoplayHoverPause: true,
            onInitialized: (e) => checkNavigation(e, $(".custom-nav .prevBtn"), $(".custom-nav .nextBtn")),
            onChanged: (e) => checkNavigation(e, $(".custom-nav .prevBtn"), $(".custom-nav .nextBtn")),
            responsive: {
                0: {
                items: 1,
                slideBy:1
                },
                600: {
                items: 3,
                slideBy: 3
                },
                1000: {
                items: 4,
                slideBy: 4,
                }
            }
        })
      
        // ---- NEM SLIDER --------//
        let nem_slider =  $('.nem-carousel').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            navRewind: true, 
            lazyLoad: true,
            navText: [
                "<i class='fa fa-caret-left'></i>",
                "<i class='fa fa-caret-right'></i>"
            ],
            autoplayHoverPause: true,
            onInitialized: (e) => checkNavigation(e, $('.nem-prev'), $(".nem-next")),
            onChanged: (e) => checkNavigation(e, $('.nem-prev'), $(".nem-next")),
            responsive: {
                0: {
                items: 1,
                slideBy:1
                },
                600: {
                items: 2,
                slideBy: 2
                },
                1000: {
                items: 3,
                slideBy: 3,
                }
            }
        })
         // ------ BÁNH NGỌT -------//
        let doanvat_slider =  $('.doanvat-carousel').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            navRewind: true, 
            lazyLoad: true,
            navText: [
                "<i class='fa fa-caret-left'></i>",
                "<i class='fa fa-caret-right'></i>"
            ],
            autoplayHoverPause: true,
            onInitialized: (e) => checkNavigation(e, $('.doanvat-prev'), $(".doanvat-next")),
            onChanged: (e) => checkNavigation(e, $('.doanvat-prev'), $(".doanvat-next")),
            responsive: {
                0: {
                items: 1,
                slideBy:1
                },
                600: {
                items: 2,
                slideBy: 2
                },
                1000: {
                items: 4,
                slideBy: 4,
                }
            }
        })
        controlCarousel(popular_slider,$(".prevBtn"), $(".nextBtn"));
        controlCarousel(nem_slider, $(".nem-prev"), $(".nem-next"));
        controlCarousel(doanvat_slider, $(".doanvat-prev"), $(".doanvat-next"));


        
       
    });
    </script>
    
</body>

</html>