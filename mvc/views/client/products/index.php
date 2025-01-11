<!-- pages-title-start -->
<?php if ($data != null) { ?>
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="">Trang chủ</a></li>
                        <li><span  class="mx-2"> / </span><a  href="collection/all"> Sản phẩm </a></li>
                        <li><span  class="mx-2"> / </span class="mx-2"><?= $data['name'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- pages-title-end -->
    <!-- product-details-section-start -->
    <div class="product-details section-padding-top">
        <div class="container product-details-box mb-4">
            <div class="row single-list-view ">
                <div class="col-xs-12 col-sm-12 col-lg-5">
                    <div class="quick-image">
                        <div class = "product-imgs position-relative">
                            <div class = "img-display position-relative">
                                <div class = "img-showcase position-absolute inset-0">
                                    <?php if ($data['image1'] != null) { ?>
                                        <img src="<?= $data['image1'] ?>" alt="" >
                                    <?php } ?>
                                    <?php if ($data['image2'] !=  null) { ?>
                                        <img src="<?= $data['image2'] ?>" alt="" class="simpleLens-big-image">
                                    <?php } ?>
                                    
                                    <?php if ($data['image3'] != null) { ?>
                                        <img  src="<?= $data['image3'] ?>" alt="" class="simpleLens-big-image">
                                    <?php } ?>
                                    <?php if ($data['image4'] != null) { ?>
                                        <img  src="<?= $data['image4'] ?>" alt="" class="simpleLens-big-image">
                                    <?php } ?>
                                    
                                </div>
                            </div>
                            <div class = "img-select quick-thumb d-flex flex-nowrap product-slider gap-1 justify-content-center">
                                <?php if ($data['image1'] != null && $data['image2'] != null) { ?>
                                    <div class = "img-item">
                                        <img data-id = "1" src="<?= $data['image1'] ?>" alt="quick view" />
                                    </div>
                                <?php } ?>
                                <?php if ($data['image2'] != null) { ?>
                                    <div class = "img-item">
                                        <img data-id = "2" src="<?= $data['image2'] ?>" alt="quick view" />
                                    </div>
                                <?php } ?>
                                <?php if ($data['image3'] != null) { ?>
                                    <div class = "img-item">
                                        <img data-id = "3" src="<?= $data['image3'] ?>" alt="quick view" />
                                    </div> 
                                <?php } ?>
                                <?php if ($data['image4'] != null) { ?>
                                    <div  class = "img-item">
                                        <img data-id = "4" src="<?= $data['image4'] ?>" alt="quick view" />
                                    </div> 
                                <?php } ?>
                            </div>
                            <?php if ($data['image1'] != null && $data['image2'] != null) { ?>
                                <div class="image-gallery-nav position-absolute" >
                                    <button class="prevBtn img-prev" class="hidden"><i class="fa-solid fa-angle-left"></i></i></button>
                                    <button class="nextBtn img-next"><i class="fa-solid fa-angle-right"></i></button>
                                </div> 
                            <?php }   ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-7 p-2">
                    <h1 class="pt-3 ps-1"><?= $data['name'] ?></h1>
                    <div class="row px-3">
                        <div class="quick-right list-text  col-12 col-md-7 ps-0 pe-4">
                            <div class="d-flex align-items-center ">
                                <div class="d-flex align-items-center pe-2 gap-1 border-end border-dark text-nowrap">
                                    <p style="font-size:14px;" class="mr-1">Thương hiệu: </p>
                                    <p style="font-size:14px; color: #008848">Bếp của mẹ</p>
                                </div>
                                <div class="d-flex align-items-center ps-2 gap-1 ">
                                    <p style="font-size:14px;" class="mr-1 text-nowrap">Tình trạng: </p>
                                    <p style="font-size:14px; color: #008848"><?=$data['stock'] > 0 ? 'Còn hàng' : 'Hết hàng' ?></p>
                                </div>
                            </div>
                            
                            <div class="py-2 px-3 rounded my-3" style="background-color:#f1f1f1;">   
                                <h5 style=""><?=number_format($data['price'])?> VNĐ</h5>
                            </div>

                          

                            <p class="mt-3 mb-2">Số lượng:</p>
                            <div class="cart-action-btn w-100"  productId="<?=$data['id']?>">
                                <?php 
                                    echo 
                                            '<div style="margin: 0 !important" class="update-cart-btn w-100  d-flex align-datas-center justify-content-stretch">
                                                    <button onclick="decrease()" class="minus-cart" style="width: 15%" style="background-color: transparent;">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                    
                                                    <input disabled type="text"  class="count-cart count-cart-'.$data['id'].' form-control text-center"  min="1" value="1" style="width: 30px; text-align: center; user-select: none "/>
                                                    
                                                    <button onclick="increment()" class="plus-cart"  style="width: 15%" style="background-color: transparent;">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                            </div>' ;
                                ?>
                               
                                <button onclick="addToCartProduct({
                                                'name': '<?=$data['name'] ?>',
                                                'slug': '<?=$data['slug'] ?>',
                                                'id': <?=$data['id']  ?> ,
                                                'price': <?=$data['price']?>,
                                                'image1': '<?=$data['image1'] ?>'
                                            })" class="btn w-100 add-cart-product text-white fw-bold mt-4 px-5 py-2 " style="background-color:#fe5722; min-width: 33.333%">
                                    THÊM VÀO GIỎ HÀNG
                                </button>
                            </div>
                        </div>

                        <div class=" policy col-12 col-md-5 ">
                            <div class="border p-3 rounded mb-3">
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <img width="32" height="32" src="public/img/policy/policy-1.png" alt="policy-1">
                                        <div class="flex-1" style="font-size: 16px">
                                            100% ngon - sạch - đảm bảo chất lượng
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <img width="32" src="public/img/policy/policy-2.png" alt="policy-1">
                                        <div class="flex-1" style="font-size: 16px">
                                            Chứng nhận ATTP
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <img width="32" src="public/img/policy/policy-3.png" alt="policy-1">
                                        <div class="flex-1" style="font-size: 16px">
                                            Luôn luôn tươi mới
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <img width="32" src="public/img/policy/policy-4.png" alt="policy-1">
                                        <div class="flex-1" style="font-size: 16px">
                                            An toàn cho sức khỏe
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <img  src="public/img/policy/pay-method.png" alt="policy-1">
                         </div>
                     
                    </div>
                 
                </div>
            </div>
            <!-- single-product item end -->
            <!-- reviews area start -->
            
            <!-- reviews area end -->
        </div>

        <div class="container product-details-box mb-4 rounded overflow-hidden">
            <div class="row">
                <div class="col col-md-8 col-lg-9">
                    <p class="p-2" style="font-size: 24px; color: #222222; font-weight:500">Mô tả sản phẩm</p>
                    <div class=" p-2" >
                            <?php if($data['description'] == ""){ ?> 
                                <p style="font-size: 16px;">
                                    Chưa có thông tin mô tả sản phẩm
                                </p>

                            <?php }else{ ?>
                                    <?=$data['description']?>
                            <?php }?>          

                    </div>
                </div>
                <div class="col col-md-4 col-lg-3 pr-2 pl-1 border-start" >
                   <div style="background-color: #008848; font-size: 16px; color: #fff; border-radius: 4px"    class="w-100 mb-2 p-2  text-center ">
                    Có thể bạn sẽ thích
                    </div>

                    <?php 
                        foreach($all_products as $item){
                    ?>
                        <div  class=" rounded d-flex flex-column mb-1">
                            <div style="align-items:start" class=" card-horizontal p-2  d-flex  justify-content-between  rounded">
                                <a href="product/<?=$item['slug'] ?>" class="position-relative mt-1 d-inline-block" style="width:35%; padding-top:35%; flex-shrink: 0">
                                    <img class="position-absolute h-100 w-100" src="<?=$item['image1'] ?>" style="inset:0;object-fit: cover;" alt="">
                                </a>
                                <div  class=" h-100 d-flex flex-column align-items-between gap-2 ps-3" style="flex: 1">
                                    <div>
                                        <a href="product/<?=$item['slug'] ?>" class="mb-1 card-horizontal-name" style="font-size: 14px">
                                            <?=$item['name']?>
                                        </a>
                                        <p class="text-danger" style="font-weight: 600">  <?= number_format($item['price']) ?>đ</p>
                                    </div>
                                    <div class="cart-action-btn" productId="<?=$item['id']?>">
                                        <?php 
                                            //Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                                            if(isset($_SESSION['cart'])){
                                                $index = array_search($item['id'], array_column($_SESSION['cart'], 'id'));
                                                //array_column() Trích xuất một cột từ một mảng và trả về một mảng các giá trị của cột đó
                                                if($index === false){
                                                    echo '<button productId="' . $item['id'] . '"  onclick="addToCart({
                                                        name: \'' . $item['name'] . '\',
                                                        slug: \'' . $item['slug'] . '\',
                                                        id: ' . $item['id'] . ',
                                                        price: ' . $item['price'] . ',
                                                        image1: \'' . $item['image1'] . '\'
                                                    })" class="add-cart-btn  p-2 mx-0 w-100">
                                                        Chọn mua
                                                    </button>';
                                                }
                                                else{
                                                    echo 
                                                    '<div style="margin: 0 !important" class="update-cart-btn w-100  d-flex align-items-center justify-content-stretch">
                                                            <button onclick="minusCart({
                                                                name: \'' . $item['name'] . '\',
                                                                slug: \'' . $item['slug'] . '\',
                                                                id: ' . $item['id'] . ',
                                                                price: ' . $item['price'] . ',
                                                                image1: \'' . $item['image1'] . '\'
                                                            })" class="minus-cart" style="width: 15%" style="background-color: transparent;">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            
                                                            <input disabled type="text"  class="count-cart count-cart-'.$item['id'].' form-control text-center"  min="1" value='.$_SESSION['cart'][$item['id']]['quantity'].' style="width: 30px; text-align: center; user-select: none "/>
                                                            
                                                            <button onclick="plusCart({
                                                                name: \'' . $item['name'] . '\',
                                                                slug: \'' . $item['slug'] . '\',
                                                                id: ' . $item['id'] . ',
                                                                price: ' . $item['price'] . ',
                                                                image1: \'' . $item['image1'] . '\'
                                                            })" class="plus-cart"  style="width: 15%" style="background-color: transparent;">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                    </div>' ;
                                                }
                                            }
                                            else{
                                                echo '<button style="margin: 0 !important" productId="' . $item['id'] . '"  onclick="addToCart({
                                                    name: \'' . $item['name'] . '\',
                                                    slug: \'' . $item['slug'] . '\',
                                                    id: ' . $item['id'] . ',
                                                    price: ' . $item['price'] . ',
                                                    image1: \'' . $item['image1'] . '\'
                                                })" class="add-cart-btn p-2">
                                                    Chọn mua
                                                </button>';
                                            }
                                        
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                  
                </div>
            </div>
           
        </div>

         <section class="container product-details-box mb-4">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title mt-2">
                    <p class="p-2" style="font-size: 32px; color: #222222; font-weight:500">Sản phẩm tương tự</p>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <?php
                if(count($same_collection_products) <= 4 ){
            ?>
                    <?php
                        foreach ($same_collection_products as $row) { ?>
                        <!-- single product end -->
                        <div class="col-xs-12 col-sm-6 col-md-24 r-margin-top">
                            <div class="single-product  ">
                                <a href="product/<?= $row['slug']?>" class="product-f">
                                    <div style="padding-top: 100%">
                                        <img src="<?= $row['image1']?>" alt="Product Img" style="inset:0" class="position-absolute img-products h-100 w-100 object-fit-cover" />
                                    </div>
                                    <!-- <div class="actions-btn">
                                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="mdi mdi-eye"></i></a>
                                    </div> -->
                                </a>

                                <a href="product/<?= $row['slug']?>" class="product-dsc">
                                    <p><?= $row['name'] ?></p>
                                    <span><?= number_format($row['price']) ?> VNĐ</span>
                                </a>
                                <div class="cart-action-btn" productId="<?=$item['id']?>">
                                        <?php 
                                            //Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                                            if(isset($_SESSION['cart'])){
                                                $index = array_search($item['id'], array_column($_SESSION['cart'], 'id'));
                                                //array_column() Trích xuất một cột từ một mảng và trả về một mảng các giá trị của cột đó
                                                if($index === false){
                                                    echo '<button productId="' . $item['id'] . '"  onclick="addToCart({
                                                        name: \'' . $item['name'] . '\',
                                                        slug: \'' . $item['slug'] . '\',
                                                        id: ' . $item['id'] . ',
                                                        price: ' . $item['price'] . ',
                                                        image1: \'' . $item['image1'] . '\'
                                                    })" class="add-cart-btn  p-2 mx-0 w-100">
                                                        Chọn mua
                                                    </button>';
                                                }
                                                else{
                                                    echo 
                                                    '<div style="margin: 0 !important" class="update-cart-btn w-100  d-flex align-items-center justify-content-stretch">
                                                            <button onclick="minusCart({
                                                                name: \'' . $item['name'] . '\',
                                                                slug: \'' . $item['slug'] . '\',
                                                                id: ' . $item['id'] . ',
                                                                price: ' . $item['price'] . ',
                                                                image1: \'' . $item['image1'] . '\'
                                                            })" class="minus-cart" style="width: 15%" style="background-color: transparent;">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            
                                                            <input disabled type="text"  class="count-cart count-cart-'.$item['id'].' form-control text-center"  min="1" value='.$_SESSION['cart'][$item['id']]['quantity'].' style="width: 30px; text-align: center; user-select: none "/>
                                                            
                                                            <button onclick="plusCart({
                                                                name: \'' . $item['name'] . '\',
                                                                slug: \'' . $item['slug'] . '\',
                                                                id: ' . $item['id'] . ',
                                                                price: ' . $item['price'] . ',
                                                                image1: \'' . $item['image1'] . '\'
                                                            })" class="plus-cart"  style="width: 15%" style="background-color: transparent;">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                    </div>' ;
                                                }
                                            }
                                            else{
                                                echo '<button style="margin: 0 !important" productId="' . $item['id'] . '"  onclick="addToCart({
                                                    name: \'' . $item['name'] . '\',
                                                    slug: \'' . $item['slug'] . '\',
                                                    id: ' . $item['id'] . ',
                                                    price: ' . $item['price'] . ',
                                                    image1: \'' . $item['image1'] . '\'
                                                })" class="add-cart-btn p-2">
                                                    Chọn mua
                                                </button>';
                                            }
                                        
                                        ?>
                                    </div>

                                
                            </div>
                            
                            <!-- </a> -->
                        </div>
                        <!-- single product end -->
                        <?php }?>
            <?php } else { ?>
                <div class="owl-carousel-wrapper position-relative">
                    <div class="owl-carousel">
                        <?php foreach ($all_products as $row) { ?>
                            <div class="item p-1"> 
                                <div class="single-product  ">
                                    <a href="product/<?= $row['slug']?>" class="product-f">
                                        <div style="padding-top: 100%" class="position-relative">
                                            <img src="<?= $row['image1']?>" alt="Product Img" style="inset:0" class="position-absolute img-products h-100 w-100 object-fit-cover" />
                                        </div>
                                        <!-- <div class="actions-btn">
                                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="mdi mdi-eye"></i></a>
                                        </div> -->
                                    </a>

                                    <a href="product/<?= $row['slug']?>" class="product-dsc">
                                        <p><?= $row['name'] ?></p>
                                        <span><?= number_format($row['price']) ?> VNĐ</span>
                                    </a>
                                
                                    <div class="cart-action-btn" productId="<?=$row['id']?>">
                                        <?php 
                                            //Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                                            if(isset($_SESSION['cart'])){
                                                $index = array_search($row['id'], array_column($_SESSION['cart'], 'id'));
                                                //array_column() Trích xuất một cột từ một mảng và trả về một mảng các giá trị của cột đó
                                                if($index === false){
                                                    echo '<button productId="' . $row['id'] . '"  onclick="addToCart({
                                                        name: \'' . $row['name'] . '\',
                                                        slug: \'' . $row['slug'] . '\',
                                                        id: ' . $row['id'] . ',
                                                        price: ' . $row['price'] . ',
                                                        image1: \'' . $row['image1'] . '\'
                                                    })" class="add-cart-btn p-2">
                                                        Chọn mua
                                                    </button>';
                                                }
                                                else{
                                                    echo 
                                                    '<div class="update-cart-btn  d-flex align-items-center justify-content-stretch">
                                                            <button onclick="minusCart({
                                                                name: \'' . $row['name'] . '\',
                                                                slug: \'' . $row['slug'] . '\',
                                                                id: ' . $row['id'] . ',
                                                                price: ' . $row['price'] . ',
                                                                image1: \'' . $row['image1'] . '\'
                                                            })" class="minus-cart" style="width: 15%" style="background-color: transparent;">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            
                                                            <input disabled type="text"  class="count-cart count-cart-'.$row['id'].' form-control text-center"  min="1" value='.$_SESSION['cart'][$row['id']]['quantity'].' style="width: 30px; text-align: center; user-select: none "/>
                                                            
                                                            <button onclick="plusCart({
                                                                name: \'' . $row['name'] . '\',
                                                                slug: \'' . $row['slug'] . '\',
                                                                id: ' . $row['id'] . ',
                                                                price: ' . $row['price'] . ',
                                                                image1: \'' . $row['image1'] . '\'
                                                            })" class="plus-cart"  style="width: 15%" style="background-color: transparent;">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                    </div>' ;
                                                }
                                            }
                                            else{
                                                echo '<button productId="' . $row['id'] . '"  onclick="addToCart({
                                                    name: \'' . $row['name'] . '\',
                                                    slug: \'' . $row['slug'] . '\',
                                                    id: ' . $row['id'] . ',
                                                    price: ' . $row['price'] . ',
                                                    image1: \'' . $row['image1'] . '\'
                                                })" class="add-cart-btn p-2">
                                                    Chọn mua
                                                </button>';
                                            }
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                     <div class="custom-nav position-absolute" >
                        <button class="prevBtn" class="hidden"><i class="fa-solid fa-angle-left"></i></i></button>
                        <button class="nextBtn"><i class="fa-solid fa-angle-right"></i></button>
                    </div>                       
                </div>
            <?php } ?>       
                                
                    
	
            </div>
        </div>
    </section>
    </div>
    <!-- product-details section end -->
    <!-- related-products section start -->
   
<?php } else {
    require_once("Views/error-404.php");
} ?>
<!-- related-products section end -->
<!-- quick view start -->
<?php
require_once("mvc/views/client/quickview.php")
?>
<script>
    // window.fbAsyncInit = function() {
    //     FB.init({
    //         appId: '2652621865018691',
    //         xfbml: true,
    //         version: 'v7.0'
    //     });
    //     FB.AppEvents.logPageView();
    // };

    // (function(d, s, id) {
    //     var js, fjs = d.getElementsByTagName(s)[0];
    //     if (d.getElementById(id)) {
    //         return;
    //     }
    //     js = d.createElement(s);
    //     js.id = id;
    //     js.src = "https://connect.facebook.net/en_US/sdk.js";
    //     fjs.parentNode.insertBefore(js, fjs);
    // }(document, 'script', 'facebook-jssdk'));
    
     $(document).ready(function() {
        //----------Carousel ------------//
        let owl  =  $('.owl-carousel').owlCarousel({
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
            onInitialized: checkNavigation,
            onChanged: checkNavigation,
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
        function checkNavigation(event) {
            var items = event.item.count;        // Tổng số item
            var item = event.item.index;         // Vị trí hiện tại
            // Ẩn/Hiện nút Prev
            if (item === 0) {
                $(".custom-nav .prevBtn").addClass("hidden");
            } else {
                $(".custom-nav .prevBtn").removeClass("hidden");
            }

            // Ẩn/Hiện nút Next
            if (item === items - 1) {
                $(".custom-nav .nextBtn").addClass("hidden");
            } else {
                $(".custom-nav .nextBtn").removeClass("hidden");
            }
        }

        // Nút Prev và Next hoạt động
        $(".custom-nav .prevBtn").click(function() {
            owl.trigger("prev.owl.carousel");
        });
        $(".custom-nav .nextBtn").click(function() {
            owl.trigger("next.owl.carousel");
        });
    });

    //Image gallery
    const imgs = document.querySelectorAll('.img-select img');
    const imgBtns = [...imgs];
    const prevBtn = document.querySelector('.image-gallery-nav .prevBtn')
    const nextBtn = document.querySelector('.image-gallery-nav .nextBtn')
    let imgId = 1;
    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            console.log(imgId);

            slideImage();
        });
    });
    if(prevBtn && nextBtn){
         prevBtn.addEventListener('click', () => {
        if(imgId > 1){
            imgId--;
        }
        else{
            imgId = imgBtns.length;
        }
        slideImage();
    })
    nextBtn.addEventListener('click', () => {
        if(imgId < imgBtns.length){
            imgId++;
        }
        else{
            imgId = 1;
        }
        slideImage();
    })
    
    }
   
    function slideImage(){
        if(imgId == 1){
            prevBtn.classList.add('hidden');
        }
        else{
            prevBtn.classList.remove('hidden');
        }
        if(imgId == imgBtns.length){
            nextBtn.classList.add('hidden');
        }
        else{
            nextBtn.classList.remove('hidden');
        }
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }
    window.addEventListener('resize', slideImage);


    // ADD CART //
    function decrease(){
        let count = parseInt($(`.count-cart`).val());
        if(count == 1){
            count = 1;
            return;
        }
        --count;

        
        $(`.count-cart`).val(count);
    }
    function increment(){
        let count = parseInt($(`.count-cart`).val());
        ++count;
        
        $(`.count-cart`).val(count);
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
                <div class="cart-header-item position-relative mb-3">
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
                    <div class="cart-header-item overflow-auto px-3" style="max-height: 350px">
                        ${cartList}
                    </div>
                    <div class="text-start py-3 border-top mx-3">
                        <span>Tổng tiền tạm tính: <span class="text-danger fw-bold"> ${thanhtien}đ</span>

                    </div>
                    <a class=" d-block  p-2 rounded go-checkout-btn mx-3"  href="cart">Tiến hành đặt hàng</a>
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
    function addToCartProduct(product){
        let count = parseInt($(`.count-cart`).val());

        $.ajax({
            url: "cart/add",
            method: "POST",
            dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
            data: {
                id: product.id, 
                name: product.name, 
                slug: product.slug, 
                price: product.price,
                image1: product.image1, 
                quantity: count,
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

    
</script>
<!-- quick view end -->