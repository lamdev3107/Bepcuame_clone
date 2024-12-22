<!-- banner-start -->
<?php
require_once("banner.php")
?>

<!-- CÁ KHO BẾP CỦA MẸ -->
<section style="background-color:#ffc700" class="py-3 mt-5  products-two section-padding-top extra-padding-bottom" >
    <div class="container main-container rounded py-3" style="background-color: #fff">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-left">
                    <h3>Cá kho bếp của mẹ</h3>
                </div>
            </div>
        </div>
        <div class="wrapper">

            <div class="row ">
                <?php foreach ($cakho_collection as $row) { ?>
                    <div class="cart-vertical col col-sm-12 col-md-3 col-lg-24 mb-4"> 
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
            <a href="collection/ca-kho-bep-cua-me" class="w-100 mt-4 mb-3 d-flex justify-content-center ">
                <button id="load-more-one"  class="main-button">Xem tất cả</button>
            </a>
        </div>
    </div>

   
</section>


<!-- SẢN PHẨM BÁN CHẠY -->
<section class="single-products  products-two section-padding-top extra-padding-bottom" >
    <div class="container main-container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-left">
                    <h3>Sản phẩm bán chạy</h3>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="owl-carousel-wrapper position-relative">
                <div class="owl-carousel popular-carousel">
                    <?php foreach ($popular_collection as $row) { ?>
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
           
            </ul>

            <a href="collection/all" class="w-100 d-flex justify-content-center">
                <button id="load-more-one"  class="main-button">Xem tất cả</button>
            </a>
        </div>
    </div>

   
</section>

<div class="container main-container d-flex justify-content-center" style="margin-top: 64px; ">
  <img src="public/img/banners/section_hot_banner.png" alt="seperate-banner">
</div>

<!-- NEM BẾP CỦA MẸ -->
<section class="single-products  products-two section-padding-top extra-padding-bottom" >
    <div class="container main-container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-left">
                    <h3>Nem bếp của mẹ</h3>
                </div>
            </div>
        </div>
        <div class="wrapper row">
            <div class="col-lg-4">
                <a href="collection/nem-bep-cua-me">
                    <img src="public/img/collection/nem-bep-cua-me-collection.png" alt="">
                </a>
            </div>
            <div class="owl-carousel-wrapper col-lg-8 position-relative">
                
                <div class="owl-carousel nem-carousel">
                    <?php foreach ($nem_collection as $row) { ?>
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
                    <button class="prevBtn nem-prev" class="hidden"><i class="fa-solid fa-angle-left"></i></i></button>
                    <button class="nextBtn nem-next"><i class="fa-solid fa-angle-right"></i></button>
                </div>                       
            </div>
            <a href="collection/nem-bep-cua-me" class="w-100 d-flex justify-content-center">
                <button id="load-more-one"  class="main-button">Xem tất cả</button>
            </a>
        </div>
    </div>

   
</section>

<!-- Bánh tươi và đồ ăn vặt -->
<section class="single-products  products-two section-padding-top extra-padding-bottom" >
    <div class="container main-container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-left">
                    <h3>Bánh tươi và đồ ăn vặt</h3>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="owl-carousel-wrapper position-relative">
                <div class="owl-carousel doanvat-carousel">
                    <?php foreach ($popular_collection as $row) { ?>
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
                    <button class="prevBtn doanvat-prev" class="hidden"><i class="fa-solid fa-angle-left"></i></i></button>
                    <button class="nextBtn doanvat-next"><i class="fa-solid fa-angle-right"></i></button>
                </div>                       
            </div>    
             <a href="collection/kem-che-xoi-banh-cac-loai" class="w-100 d-flex justify-content-center">
                <button id="load-more-one"  class="main-button">Xem tất cả</button>
            </a>
        </div>
    </div>
</section>


<!-- Banner collection -->
<section class="single-products  products-two section-padding-top extra-padding-bottom" >
    <div class="container main-container">
        <div class="row">
           <a class="col-sm-6 col-md-4" href="collection/ca-kho-bep-cua-me">
                <img src="public/img/collection/ca-kho-bep-cua-me.png" alt="">
            </a>
            <a class="col-sm-6 col-md-4" href="collection/kem-che-xoi-banh-cac-loai">
                <img src="public/img/collection/do-an-vat-ngon-ngon.png" alt="">
            </a>
            <a class="col-sm-6 col-md-4" href="collection/nem-bep-cua-me">
                <img src="public/img/collection/nem-bep-cua-me.png" alt="">
            </a>
        </div>
    </div>
</section>

<!-- Dành riêng cho bạn -->
<section  class="py-3 mt-5  products-two section-padding-top extra-padding-bottom" >
    <div class="container main-container rounded py-3" >
        <div class="row">
            <div class="col-xs-12 d-flex justify-content-between align-items-start ">
                <div class="section-title text-left">
                    <h3>Dành riêng cho bạn</h3>
                </div>
                <div class="for-you-nav d-flex justify-content-start align-items-center gap-2 mt-2">
                    <button class="for-you-item active" data-tab="8">
                        Món mặn ăn cơm hàng ngày
                    </button>
                    <button class="for-you-item " data-tab="15">
                        Gia vị đồ khô
                    </button>
                    <button class="for-you-item " data-tab="16">
                        Trái cây
                    </button>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="row tab-collection">
                <?php foreach ($mon_man_collection as $row) { ?>
                    <div class="col col-sm-12 col-md-3 col-lg-24 mb-4"> 
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
           
            
           <a href="collection/mon-man-an-com-hang-ngay" class="tab-all w-100 mt-4 mb-3 d-flex justify-content-center ">
                <button id="load-more-one"  class="main-button">Xem tất cả</button>
            </a>
        </div>
    </div>

   
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- featured-products section end -->
<!-- quick view start -->
<?php
include_once("mvc/views/client/quickview.php");
?>
<!-- quick view end -->
<script>
  

    // ------------- Collection tabs ----------------------------//
    // Hàm kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    function getCartSessionArray(){
        let cartArray = [];
        let cart = <?php echo json_encode($_SESSION['cart']); ?>;
        for (const [key, value] of Object.entries(cart)) {
            cartArray.push(value);
        }
        return cartArray;
    }
    function isInCart(productId) {
        let cartArray = getCartSessionArray();
       
        return cartArray.some(item => parseInt(item.id) === parseInt(productId));
    }
    // Hàm tạo nút thêm vào giỏ hàng
    function createAddToCartButton(product) {
        return `
            <button productId="${product.id}" onclick="addToCart({
                                'name': '${product.name}',
                                'slug': '${product.slug}',
                                'id': ${product.id},
                                'price': ${product.price},
                                'image1': '${product.image1}'
                            })" class="add-cart-btn p-2">
                Chọn mua
            </button>
        `;
    }
    // Hàm tạo giao diện cập nhật giỏ hàng
    function createUpdateCartButtons(product, quantity) {
        console.log(product);
        return `
            <div class="update-cart-btn d-flex align-items-center justify-content-stretch">
                <button onclick="minusCart({
                                'name': '${product.name}',
                                'slug': '${product.slug}',
                                'id': ${product.id},
                                'price': ${product.price},
                                'image1': '${product.image1}'
                            })" class="minus-cart" style="width: 15%; background-color: transparent;">
                    <i class="fa-solid fa-minus"></i>
                </button>
                
               <input disabled type="text" class="count-cart count-cart-${product.id} form-control text-center" min="1" value="${quantity}" style="width: 30px; text-align: center; user-select: none " />
                
                <button onclick="plusCart({
                                'name': '${product.name}',
                                'slug': '${product.slug}',
                                'id': ${product.id},
                                'price': ${product.price},
                                'image1': '${product.image1}'
                            })" class="plus-cart" style="width: 15%; background-color: transparent;">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        `;
    }
    // Hàm hiển thị sản phẩm dựa trên trạng thái trong giỏ hàng
    function displayProduct(product) {
        let html = ''
        if (isInCart(product.id)) {
            let cartArray = getCartSessionArray();

            // Nếu sản phẩm đã có trong giỏ hàng, hiển thị giao diện cập nhật
            let item = cartArray.find(item => item.id === product.id);
            html += createUpdateCartButtons(product, item.quantity);
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, hiển thị nút chọn mua
            html +=  createAddToCartButton(product);
        }
        return html;
    }

    
    let tablinks = $(".for-you-item");
    let tabCollection = $(".tab-collection");
    let allBtn = $(".tab-all");
    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].addEventListener("click", function() {
            let current = document.querySelectorAll(".for-you-item.active");
            current[0].classList.remove("active");
            this.classList.add("active");
            let id = parseInt($(this).attr("data-tab"));
            $.ajax({
                url: "home/switch_collection",
                method: "POST",
                dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
                data: {
                    id: id, 
                },
                success: function(res){

                    let html = "";
                    res.map((item)=>{
                        html += `
                        <div class="col col-sm-12 col-md-3 col-lg-24 mb-3"> 
                            <div class="single-product  ">
                                <a href="product/${item.slug}" class="product-f">
                                    <div style="padding-top: 100%" class="position-relative">
                                        <img src="${item.image1}" alt="Product Img" style="inset:0" class="position-absolute img-products h-100 w-100 object-fit-cover" />
                                    </div>
                                </a>

                                <a href="product/${item.slug}" class="product-dsc">
                                    <p>${item.name}</p>
                                    <span>${Math.floor(item.price).format(0)} VNĐ</span>
                                </a>
                            
                                <div class="cart-action-btn" productId="${item.id}">
                                        ${displayProduct(item)}
                                
                                </div>
                            </div>
                        </div>
                        `
                    })

                    tabCollection.html(()=>{
                        return `${html}`
                        });
                },
                error: function(err){
                    alert('Thêm vào giỏ hàng thất bại!', err);
                }

            })
            if(i === 0){
                allBtn.attr('href', 'collection/mon-man-an-com-hang-ngay')
            }
            else if(i === 1){
                allBtn.attr('href', 'collection/gia-vi-do-kho');

            }
            else{
                allBtn.attr('href', 'collection/trai-cay-theo-mua');
            }
        });
    }


    
</script>