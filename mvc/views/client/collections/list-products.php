
<div class="tab-links px-2">
	<span class="align-middle">Sắp xếp theo:</span>
	<p href="" class="tab-link active" data-tab="tab-1"> Mới nhất</p>
	<p class="tab-link" data-tab="name-asc">Tên A->Z</p>
	<p class="tab-link" data-tab="name-desc">Tên Z->A</p>
	<p class="tab-link" data-tab="price-asc">Giá tăng dần </p>
	<p  class="tab-link" data-tab="price-desc">Giá tăng dần </p> 

	
</div>
<div class="row collection-products">
	<?php 
	if(isset($collection_products) and $collection_products != NULL){
		foreach ($collection_products as  $row) {		
	?>
		<div class="col-xs-12 col-sm-6 col-md-3 r-margin-top ">
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
	<?php }}else{
		echo '<p> KHÔNG CÓ DỮ LIỆU </p>';}?>
</div>

