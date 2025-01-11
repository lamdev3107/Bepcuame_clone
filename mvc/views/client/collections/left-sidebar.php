<div class="sidebar left-sidebar">
    <div class="s-side-text border-bottom">
        <div class="border-bottom">
            <div class="sidebar-title clearfix">
                <h4 class="floatleft">Danh mục</h4>
            </div>
            <div class="filter-sidebar">
                <div class="filter-section px-2 py-2">
                    <div class="collection-list">
                        <li class="home"  ><a href="collection/all"><i class="mdi mdi-menu-right"></i>Tất cả</a></li>
                        <?php foreach ($data_collection as $row) {?>
                            <li class="<?=$row['id'] == $collection['id'] ? 'active' : ''  ?>"><a href="collection/<?=$row['slug']?>"><i class="mdi mdi-menu-right"></i><?=$row['name']?></a></li>
                        <?php  }?>
                    </div>
                    
                </div>
            </div>
        </div>
        <div >
            <div class="sidebar-title clearfix">
                <h4 class="floatleft">Mức giá</h4>
            </div>
            <div class="filter-sidebar">
                <div class="filter-section price-filters px-2 py-2">
                    <div class="form-check form-check-custom">
                        <input type="checkbox" class="price-filter" id="price1"  value="under-100k" >
                        <label for="price1" class="form-check-label" >
                            Giá dưới 100.000đ
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input type="checkbox" class="price-filter" id="price2"  value="100k-200k" >
                        <label for="price2" class="form-check-label" >
                            100.000đ - 200.000đ
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input type="checkbox" class="price-filter" id="price3"  value="200k-300k" >
                        <label for="price3" class="form-check-label" >
                            200.000đ - 300.000đ
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input type="checkbox" class="price-filter" id="price4"  value="300k-500k" >
                        <label for="price4" class="form-check-label" >
                            300.000đ - 500.000đ
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input type="checkbox" class="price-filter" id="price5"  value="500k-1m" >
                        <label for="price5" class="form-check-label" >
                            500.000đ - 1.000.000đ
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input type="checkbox" class="price-filter" id="price6"  value="above-1m" >
                        <label for="price6" class="form-check-label" >
                            Giá trên 1.000.000đ
                        </label>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class=" py-3">
            <div style="background-color: #008848; font-size: 16px; color: #fff; border-radius: 4px"    class="w-100 mb-2 p-2  text-center ">
                Có thể bạn sẽ thích
            </div>
            <?php 
            foreach ($reference_products as $item) {?>
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
                                                '<div class="update-cart-btn w-100  d-flex align-items-center justify-content-stretch">
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
                                            echo '<button productId="' . $item['id'] . '"  onclick="addToCart({
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

<script>

</script>

