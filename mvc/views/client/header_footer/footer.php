
<div class="container-fluid" style="background-color: #f8f8f8">
     <div class="row mx-5" action="account/register">
        <div class="col-sm-8 mx-auto px-5">
            <div class="main-input py-5 new-customer" id="dangky">
                <div class="log-title mb-3 text-center">
                    <p style="font-style: bold; font-size: 20px ">Đăng ký nhận tin</p>
                </div>
                <form  method="post" action="account/register-email">
                    <div class="mb-2" class="position-relative " style="position: relative; border:none">
                        <input  type="email" name="email" class="form-control py-2" placeholder="Nhập địa chỉ email..." >
                        <button type="submit" class="btn btn-warning rounded-left-0 rounded-right position-absolute top-0 bottom-0"  style="z-index: 20; right:0;">Đăng ký</button>

                    </div>
                
                </form>
            
            </div>
        </div>
    </div>
</div>
<footer class="footer-two">
    <!-- footer-top area start -->
    <div class="footer-top section-padding">
        <div class="footer-dsc">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>Về chúng tôi</h4>
                            </div>
                            <div class="footer-text">
                                <p class="my-2">Bếp của Mẹ - Sạch ngon từ tấm lòng và sự tận tâm của mẹ.</p>
                                <ul>
                                    <li class="mb-2">
                                        <i class="mdi mdi-map-marker"></i>
                                        <p>Địa chỉ: Số 6, ngõ 171 Nguyễn Ngọc Vũ, Hà Nội</p>
                                    </li>
                                    <li class="mb-2">
                                        <i class="mdi mdi-phone"></i>
                                        <p>Số điện thoại: 0785466688</p>
                                    </li>
                                    <li class="mb-2">
                                        <i class="mdi mdi-email"></i>
                                        <p>Email: bepcuame@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xs-6 col-sm-3 col-md-3 wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>Tài khoản</h4>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a class="footer-menu__link" href="account"><i class="mdi mdi-menu-right"></i>Tài khoản</a></li>
                                    <li><a class="footer-menu__link" href="cart"><i class="mdi mdi-menu-right"></i>Giỏ Hàng</a></li>
                                    <li><a class="footer-menu__link" href="account/login"><i class="mdi mdi-menu-right"></i>Đăng Nhập</a></li>
                                    <li><a class="footer-menu__link" href="checkout"><i class="mdi mdi-menu-right"></i>Thanh Toán</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-xs-6 col-sm-3 col-md-4 wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>Menu bếp của mẹ</h4>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <?php foreach ($data_collection as $row) { ?>
                                    <li><a class="footer-menu__link" href="collection/<?=$row['slug']?>"><i class="mdi mdi-menu-right"></i><?=$row['name']?></a></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 r-margin-top wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>Mạng xã hội</h4>
                            </div>
                            <div class="clearfix instagram">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbepcuame26%2F&tabs=timeline&width=340&height=331&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="331" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                <!-- <ul>
                                    <li><a href="#"><img src="public/img/footer/in1.png" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="public/img/footer/in2.png" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="public/img/footer/in3.png" alt="Instagram" /></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top area end -->
    <!-- footer-bottom area start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <p class="text-center">&copy; Bếp của mẹ clone by Lam Tran.</p>
                </div>
               
            </div>
        </div>
    </div>
    <!-- footer-bottom area end -->
</footer>