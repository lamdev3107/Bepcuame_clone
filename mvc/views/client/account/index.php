<!-- pages-title-start -->
<?php 
		require_once "./mvc/core/redirect.php";
?>
 <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="">Trang chủ</a></li>
						<?php switch($tab){
							case 'myorders':
								echo '<li><span  class="mx-2"> / </span><a href="account/myorders" > Đơn hàng của tôi </a></li>';
								break;
							case 'profile':
								echo '<li><span  class="mx-2"> / </span><a href="account/profile" > Hồ sơ của tôi </a></li>';
								break;
							case 'changepassword':
								echo '<li><span  class="mx-2"> / </span><a href="account/changepassword" > Đổi mật khẩu </a></li>';
								break;
							case 'orderdetail':
							echo '
							<li><span  class="mx-2"> / </span><a href="account/myorders" > Đơn hàng của tôi </a></li>
							<li><span  class="mx-2"> / </span><a href="account/orderdetail" > Chi tiết đơn hàng  </a></li>';
							break;
						} ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- pages-title-end -->
<!-- cart content section start -->
<div class="container product-details-box  rounded overflow-hidden">
	<div class="row">
		<div class="sidebar  py-4 pe-4 col col-3 border-end " style="min-height: 400px">
			<div class="d-flex  align-items-center gap-3 pb-4 border-bottom">
				<img src="public/img/avatar.png" class="rounded-circle" style="width: 65px; height: 65px" alt="User Image" class="img-fluid">
				<div class="d-flex flex-column ">
					<h4 class="text-md mb-0">
							<?= $user['lastname'] . " " . $user['firstname'] ?>
					</h4>
					<p class=""><?= $user['email'] ?></p>
				</div>
			</div>

			<div class="flex w-100 d-flex flex-column">
				<a class="w-100 py-2 mt-2 d-flex align-items-center gap-2 active-text" style="font-size: 17px" href="account/profile">
					<span style="font-size: 27px" class="mdi mdi-account"></span>
					Hồ sơ của tôi</a>
				<a class="w-100 py-2 mt-2 d-flex align-items-center gap-2  <?php if(( $tab=="myorders" || $tab=="orderdetail"))   echo "active-text" ?>" style="font-size: 17px" href="account/myorders">
					<span  style="font-size: 27px" class="mdi mdi-cash-multiple"></span>
				Đơn hàng của tôi</a>
				<a class="w-100 py-2 mt-2 d-flex align-items-center gap-2 <?= $tab=="changepassword"  && "active-text" ?>" style="font-size: 17px" href="account/changepassword">
					<span style="font-size: 27px" class="mdi mdi-lock"></span>
				Đổi mật khẩu</a>
			</div>
		</div>
		<div class="col col-9 ps-4" style="min-height: 400px">

    		<?php
				require_once './mvc/views/client/account/'.$tab.'.php';
			?>
		</div>
	</div>
	
</div>
<script>
	let tab = <?= json_encode($tab) ?>;
	console.log("check tab", tab);
	$(document).ready(function(){
		$(".active-text").removeClass("active-text");
		$("a[href='account/"+tab+"']").addClass("active-text");
	})
</script>
<!-- cart content section end -->