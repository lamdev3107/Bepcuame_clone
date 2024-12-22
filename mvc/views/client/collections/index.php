<!-- pages-title-start -->
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="?act=home">Trang chủ</a></li>
                        <li><span  class="mx-2"> / </span><a  href="collection/index"> Danh mục </a></li>
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
