<!-- pages-title-start -->
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="/">Trang chủ</a></li>
                        <li><span  class="mx-2"> / </span><a  href="collection/all"> Danh mục </a></li>
                        <li><span  class="mx-2"> / </span class="mx-2"><?= $collection['name'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- pages-title-end -->
<!-- products-view content section start -->
<section class="pages p-3 products-page section-padding-bottom">
	<div class="container " style="background-color: #fff">
		<div class="row">
			<!-- Category-left -->
			<div class="col  d-md-none d-lg-block col-lg-3  border-end">
				<?php require_once("left-sidebar.php") ?>
			</div>
			<div class="col col-sm-12 col-lg-9 ">
				<div class="">
					<div class="row">
						<div class="col-xs-12">
							<div class="p-2 clearfix ">
								<?php if($collection['image']!=""){ ?>
									<img src="<?= $collection['image']?>" alt="" class="img-fluid mt-3 mb-4">
                                <?php }?>
								<h3 class="mt-2">
									<?= $collection['name']?>
                                </h3>
								</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 ">
							<?php require_once("list-products.php") ?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- products-view content section end -->

<!-- Script cho trang collection  -->
 <script>
   	let listProducts = `<?php echo isset($collection_products) ? json_encode($collection_products) : '[]' ;?>`;
	listProducts = JSON.parse(listProducts);

	let cart = `<?php echo isset($_SESSION['cart']) ? json_encode($_SESSION['cart']) : '[]' ?>`;
	cart = JSON.parse(cart);
    function returnCartBtnHTML(cart, item){
        let html = '';
        if(cart){
            let cartArrays = Object.keys(cart);
            let index = cartArrays.findIndex((id) => item.id === id);
            if(index >= 0){
                html = ` <div class="update-cart-btn  d-flex align-items-center justify-content-stretch">
                    <button onclick="minusCart({
                        name: '${item.name}',
                        slug: '${item.slug}',
                        id: ${item.id},
                        price: ${item.price},
                        image1: '${item.image1}'
                    })" class="minus-cart" style="width: 15%" style="background-color: transparent;">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    
                    <input disabled type="text"  class="count-cart count-cart-${item.id} form-control text-center"  min="1" value=${cart[item.id]['quantity']} style="width: 30px; text-align: center; user-select: none "/>
                    
                    <button onclick="plusCart({
                        name: '${item.name}',
                        slug: '${item.slug}',
                        id: ${item.id},
                        price: ${item.price},
                        image1: '${item.image1}'
                    })" class="plus-cart"  style="width: 15%" style="background-color: transparent;">
                        <i class="fa-solid fa-plus"></i>
                    </button>
            </div>`
            }
            else{
                html = ` <button productId="${item.id}"  onclick=addToCart({
                    name: '${item.name}',
                    slug: '${item.slug}',
                    id: ${item.id},
                    price: ${item.price},
                    image1: '${item.image1}'
                })" class="add-cart-btn p-2">
                    Chọn mua
                </button>`;
            }
        }
        else{
            html = ` <button productId="${item.id}"  onclick="addToCart({
                name: '${item.name}',
                slug: '${item.slug}',
                id: ${item.id},
                price: ${item.price},
                image1: '${item.image1}'
            })" class="add-cart-btn p-2">
                Chọn mua
            </button>`;
        }
        // console.log('HTML:', html);
        return html;
    }

	function renderProductCard(listProduct){
		
		let html = listProducts.map((item, id) => {
			let btnCart = returnCartBtnHTML(cart, item);
			return `
				<div class="col-xs-12 col-sm-6 col-md-3 r-margin-top ">
					<div class="single-product  ">
						<a href="product/${item.slug}" class="product-f">
							<div style="padding-top: 100%" class="position-relative">
								<img src="${item.image1}" alt="Product Img" style="inset:0" class="position-absolute img-products h-100 w-100 object-fit-cover" />
							</div>
							<!-- <div class="actions-btn">
								<a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="mdi mdi-eye"></i></a>
							</div> -->
						</a>

						<a href="product/${item.slug}" class="product-dsc">
							<p>${item.name}</p>
							<span>${formatCurrency(item.price)} VNĐ</span>
						</a>
					
							<div class="cart-action-btn" productId="${item.id}">  
								${btnCart}  
							</div>
					</div>
				</div>`
		}).join("");
			// console.log("hello", html)

		$('.collection-products').html(html);
	}

    $(document).ready(function() {
        let urlArrays = window.location.href.split('/');
        let slug = urlArrays[urlArrays.length - 1];

        $('.price-filter').change(function() {
        
            // Lấy danh sách các giá trị checkbox được chọn
            const selectedFilters = $('.price-filter:checked').map(function() {
                return $(this).val();
            }).get();

            if(selectedFilters.length === 0){
                window.location.reload();
                return;
            }
       
          
            // Gửi AJAX request để lọc sản phẩm
            $.ajax({
                url: `collection/${slug}`, // Thay bằng URL API xử lý
                method: 'POST',         // Hoặc 'GET' tùy thuộc vào yêu cầu
                data: {
                    priceRanges: selectedFilters
                },
                dataType: 'json',  // Yêu cầu dữ liệu trả về dưới dạng JSON
                success: function(response) {
					// console.log(response);

                    // // Xử lý phản hồi từ server
                    if(response.data === null){
                        $('.collection-products').html('<p>Không có sản phẩm nào phù hợp</p>');
                        return;
                    }
					listProducts = response.data;
					renderProductCard(listProducts);
					
                },
                error: function(error) {
                    console.error('Error filtering products:', error);
                }
            });
        });
    });

	function sort_products( sort_type){
		// if(listProducts !== null){
			// if(sort_type !== 'newest')
			let sort_products = listProducts.sort(function(a, b){
				if(sort_type == 'name-asc'){
					return a.name - b.name;
				}
				else if(sort_type == 'name-desc'){
					return b.name - a.name;
				}
				else if(sort_type == 'price-asc'){
					return parseInt(a.price) - parseInt(b.price);
				}
				else if(sort_type == 'price-desc'){
					return parseInt(b.price) - parseInt(a.price);
				}
				
			});

			renderProductCard(cart);
		// }
		
	}

	function clickSortProduct(){
			console.log('sortProducts:', listProducts);

		let sort_type = document.querySelectorAll('.tab-link');
		for(let i = 0; i < sort_type.length; i++){
			let sort = sort_type[i].getAttribute('data-tab');
			sort_type[i].addEventListener('click', function(){
				for(let j= 0; j < sort_type.length; j++){
					sort_type[j].classList.remove('active');
				}
				sort_type[i].classList.add('active');
				sort_products(sort);
			})
		}
		

	}
	clickSortProduct();

    function goToAll(){
        let pathname = window.location.pathname;
        let homeCat = document.querySelectorAll('.collection-list li.home');
        console.log('check', pathname);
        if(pathname.includes("/bepcuame/collection/all")){
            homeCat.classList.add('active');
        }
        else{
            homeCat.classList.remove('active');
        }
        // let categories = document.querySelectorAll('.collection-list li');
            
        // categories.forEach((category) => {
        //     category.addEventListener('click', function(){
        //         console.log("check", window.location.href);
        //         if(category.className.includes('home')){
        //             category.classList.add('active');
        //         }
        //         let homeCat = document.querySelectorAll('.collection-list li.home');
        //             console.log(homeCat);
        //             homeCat.classList.remove('active');
             
        //     });
        // });
    }
    goToAll();
	

</script>