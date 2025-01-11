
<header class="header ">
    <div class="container-fluid header-top  header-sticky bg-white">
        <div class="w-100 container mx-auto row text-center h-100 d-flex align-items-center h-100">

            <div class=" h-100 col-lg-2 d-flex justify-content-left align-items-center ">
                <a href="home" class="d-block  nav-logo"><img src="public/img/logo.png" alt="Sellshop" /></a>
                <div class="navbar-sticky d-none h-100 d-flex justify-content-left align-items-center position-relative ">
                    <div class="menu-icon pe-4 fw-bold" style="font-size: 20px">&#9776; <span style="font-size: 16px"> Danh mục</span> </div>
                    <ul class="menu-sticky position-absolute "> 
                        <li class="pt-2"><a href="">Trang chủ</a></li>
                        <li class="dropdown-sticky">
                            <a href="collection/all" class="dropdown-toggle">Menu Bếp của Mẹ &#9654;</a>
                            <div class="dropdown-content">
                                <?php    
                                    foreach ($data_collection as $row) { ?>
                                    <a href="collection/<?=$row['slug']?>">
                                        <?=$row['name']?>
                                    </a>
                                <?php  } ?> 
                               
                            </div>
                        </li>
                        <li><a href="about">Giới thiệu</a></li>
                        <li><a href="contact">Liên hệ</a></li>
                        <li><a href="news">Tin tức</a></li>
                        <li class="pb-2"><a href="service">Chăm sóc khách hàng</a></li>
                    </ul>
                </div>
        
                
            </div>
            <div class="col-lg-5  header-search">
                <form action="home" method="post" class="position-relative header-form">
                    <input onblur=""  class="w-100 h-100 header-search-input" type="text" placeholder="Tìm kiếm sản phẩm..." name="keyword"/>
                    <button class="search-button" type="submit"><i class="mdi mdi-magnify"></i></button>
                    
                    <div class="search-drop d-none" style="cursor: default;">
                        <!-- <p class="fw-bold px-2 py-3 text-start border-bottom">Kết quả tìm kiếm cho <span class="text-danger keyword fw-bold">dfasdf</span></p> -->
                    
                    </div>
                </form>
            </div>
            
            <div class=" col-lg-5 d-flex align-items-center justify-content-end gap-4">
                <div class="d-flex align-items-center h-100 ">
                    <a class="mr-3" style="margin-right: 12px; font-size: 20px ;background-color: #73ba4a ; border-radius: 50%; width:28px; height: 28px; color: #fff" >
                        <i class="mdi mdi-phone"></i>
                    </a>
                    <ul class="d-flex flex-column align-items-start">
                  
                        <li style="font-size: 15px; font-style: bold; text-wrap:nowrap">Hỗ trợ khách hàng</li>
                        <li style="font-size: 15px; font-weight: bold ">0785466688</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center h-100 ">
                    <a class="mr-3 " style="margin-right: 12px; font-size: 20px ;background-color: #73ba4a ; border-radius: 50%; width:28px; height: 28px; color: #fff" >
                        <i class="mdi mdi-account"></i>
                    </a>
                    <?php  
                        if(isset($_SESSION['user']) ){ 
                    ?>
                        <ul class=" account-box d-flex flex-column align-items-start  position-relative">
                            <li class="account-box__item ">
                                <span style="font-size: 15px; font-weight:bold; text-wrap:nowrap"><?=$_SESSION['user']['lastname']?> <?=$_SESSION['user']['firstname']?></span>
                            </li>
                            <ul class=" account-box-menu flex-column align-items-start position-absolute " >
                                <li style="padding: 4px 0; margin-top:6px">
                                    <a href="account/profile">Tài khoản</a>
                                 </li>
                                 <li style="padding: 4px 0; ">
                                    <a href="account/myorders">Đơn hàng của tôi</a>
                                 </li>
                                  <?php
                                    if(isset($_SESSION['user']) && ($_SESSION['user']['auth_id'] == 2|| $_SESSION['user']['auth_id'] == 3)){ ?>
                                    <li style="padding: 4px 0;"><a href="dashboard">Trang quản lý</a></li>
                                <?php } ?>
                                <li style="padding: 4px 0 8px 0; margin-bottom: 6px">
                                    <a href="account/logout">Đăng xuất</a>
                                </li>
                               
                            </ul>
                        </ul>
                      
                    <?php }else{ ?>
                    <ul class="d-flex flex-column align-items-start">
                        <li style="font-size: 14px; text-wrap:nowrap"><a href="account/login">Đăng nhập</a></li>
                        <li style="font-size: 12px ; text-wrap:nowrap"><a href="account/register">Đăng ký</a></li>
                    </ul>
                    <?php } ?>
                    </ul>
                </div>
                <button id="burger" class="header-cart position-relative d-flex align-items-center justify-content-center" >
                    <a  href="cart" class="cart d-flex align-items-center gap-2  " style="color:#008848">
                        <?php 
                            $soluong = 0;
                            $thanhtien = 0;
                                if(isset($data_index['cart'])){
                            foreach ($data_index['cart'] as $key => $value) {
                                $soluong +=1;
                                $thanhtien += (int)$value['price'] * $value['quantity'];
                            }}
                        ?>
                        <i class="mdi mdi-cart" style="font-size: 20px"></i>
                        <span style="text-wrap:nowrap">Giỏ hàng</span>
                        <span style="padding: 1px 6px;background-color:#fbc011;color: black;border-radius: 4px; font-size: 14px"  class="quantity">
                            <?=$soluong?> 
                        </span>  
                    </a>
                    <div class="cartdrop" style="cursor: default;">
                        
                        <?php if(isset($data_index['cart']) && $data_index !== NULL && count($data_index['cart']) > 0){ ?>
                            <div class="cart-header-list overflow-auto px-3" style="max-height: 350px">
                                <?php foreach($data_index['cart'] as $key => $value){ ?>
                                    <div class="cart-item position-relative mb-3">
                                        <div class="d-flex align-items-start gap-2">
                                            <a class="" style="width: 70px; height: 70px" href="product/<?=$value['slug']?>">
                                                <img src="<?=$value['image1']?>" alt="" class="object-fit-cover w-100 h-100" />
                                            </a>
                                        
                                            <div class=" me-3 text-start" style="flex: 1">
                                                <a href="product/<?=$value['slug']?>" class="d-block text-start mb-1" style="font-size: 14px; font-weight: 500">
                                                    <?=$value['name']?>
                                                </a>
                                                <div class="text-start">
                                                    <span class="text-danger fw-bold" style="font-size: 14px"><?=number_format((int)$value['price'])?>đ</span>
                                                    <span class="">x</span>
                                                    <span><?=$value['quantity'] ?></span>

                                                </div>
                                            </div>

                                            <a class="" href="javascript:void(0)" class="btn btn-delete"
                                                onclick="deleteProduct('<?= $value['id'] ?>')">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                        </div>
                                        
                                    </div>
                                <?php } ?>

                            </div>
                           
                               
                            <div class="text-start py-3 border-top mx-3">
                                <span>Tổng tiền tạm tính: <span class="text-danger fw-bold"> <?=number_format($thanhtien)?> VNĐ</span>

                            </div>
                            <a class=" d-block  p-2 rounded go-checkout-btn mx-3"  href="cart">Tiến hành đặt hàng</a>

                        <?php  }else{ ?>
                            <p>Giỏ hàng chưa có sản phẩm nào</p>
                        <?php }?>
                </button>
                
            </div>
           
        </div>
    </div>
    
	
    <div class="container-fluid g-0 text-center " style="background-color: #008848; height: 50px; margin-top: 86px">
        <nav class="mainmenu main-container container">
            <?php  if($data_collection !== NULL) ?>
            <ul>

                <li class="mainmenu-item"><a href="/">Trang chủ</a></li>
                </li>
                <li class="mainmenu-item">
                    <a href="collection/all">Menu Bếp của mẹ
                        <i style="font-size: 20px" class="mdi mdi-chevron-down"></i>
                    </a>
                    <ul class="magamenu">
                        <?php    
                            foreach ($data_collection as $row) { ?>
                            <li>
                                <a href="collection/<?=$row['slug']?>">
                                    <?=$row['name']?>
                                </a>
                            </li>
                         <?php  } ?> 
                    </ul>
                </li>
                <li class="mainmenu-item"><a href="about">Giới thiệu</a></li>
                <li class="mainmenu-item"><a href="contact">Liên hệ</a></li>
                <li class="mainmenu-item"><a href="news">Tin tức</a></li>
                 <li class="mainmenu-item"><a href="service">Chăm sóc khách hàng</a></li>
            </ul>
        </nav>
        <!-- mobile menu start -->
        <!-- <div class="mobile-menu-area">
            <div class="mobile-menu">
                <nav id="dropdown">
                    <ul>
                        <li><a href="/">Trang chủ</a>
                        </li>
                        <li><a href="?act=shop">Cửa hàng</a>
                            <ul>
                            <?php $i = 1; foreach ($data_chitietDM as $row) { ?>
                                <li>
                                    <a href="?act=shop&sp=<?=$i?>"><h5><?= $data_danhmuc[$i-1]['TenDM'] ?></h5></a>
                                    <ul>
                                        <?php foreach ($row as $value) { ?>
                                        <li><a href="?act=shop&sp=<?=$value['MaDM']?>&loai=<?=$value['TenLSP']?>"><?=$value['TenLSP']?></a></li>
                                        <?php }?>
                                    </ul>
                                </li>
                            <?php $i++; } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="?act=checkout">Thanh Toán</a>
                        </li>
                        <li><a href="?act=about">Giới thiệu</a></li>
                        <li><a href="?act=contac">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
          -->
    </div>
   
<script>

    //Header sticky
    window.onscroll = function () {
        var header = document.querySelector(".header-sticky");
        let logo = document.querySelector(".nav-logo");
        let stickyMenu = document.querySelector(".navbar-sticky")
        if (window.pageYOffset > 0) {
            header.classList.add("sticky");
            header.classList.remove("container");
            logo.classList.add("d-none");
            stickyMenu.classList.remove("d-none");

            
        } else {
            header.classList.remove("sticky");
            logo.classList.remove("d-none");
            header.classList.add("container");
            stickyMenu.classList.add("d-none");



        }
    };
    // Search Product
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
    function findProductByName(name){
        // console.log(name);
        $.ajax({
            
            url: "home/search_product",
            method: "POST",
            dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
            data: {
                query: name, 
            },
            error: function(err){
                console.log("Lỗi tìm kiếm sản phẩm", err);
            },
            success: function(products) {
                $('.search-drop').empty();
                $('.search-drop').html(() => {
                    if(products.length > 0){
                        return ` 
                        <p class="fw-bold px-2 py-3 text-start border-bottom">Kết quả tìm kiếm cho <span class="text-danger keyword fw-bold">${name}</span></p>
                        <div class="overflow-auto pr-2" style="max-height: 350px">
                            ${products.map(product => (
                            `<a href="product/${product.slug}" class="p-2 d-flex align-items-start gap-2 border-bottom">
                                
                                <div  style="width: 70px; height: 70px">
                                    <img src="${product.image1}" alt="" class="object-fit-cover w-100 h-100" />
                                </div>
                                <div class="text-start " style="flex: 1">
                                    <p class="fw-bold mb-1">${product.name}</p>
                                    <span class="text-danger fw-bold" style="font-size: 14px">${Math.floor(product.price).format(0)}đ</span>
                                </div>
                                
                            </a>`)
                            ).join(' ')}
                    </div>`
                       
                    }else{
                        return `<p class="fw-bold px-2 py-3 text-start border-bottom">Không tìm thấy kết quả phù hợp với từ khóa <span class="text-danger keyword fw-bold">${name}</span></p> `;
                    }       
                    }
                );
                
            }
        });
    }
    $(document).ready(function(){
        let inputSearch = $('.header-search-input')
       
        inputSearch.on('input', function() {
            let query = $(this).val();
            // setTimeout(() => {
                if (query !== '') {
                    findProductByName(query);
                    $('.search-drop').removeClass('d-none');

                } else {
                    $('.search-drop').addClass('d-none');

                }
            // }, 1000)
        });

        document.addEventListener('click', (e) => {
            if(!document.querySelector('.search-drop').contains(e.target) && !document.querySelector('.header-search-input').contains(e.target)){
                $('.search-drop').removeClass('d-none');
                $('.search-drop').addClass('d-none');
            }
                
        })
        
        // $('.header-search-input').on('blur', function() {
        //    $(this).val("");
        //     $('.search-drop').addClass('d-none');

        // });


     
    });



</script>
</header>