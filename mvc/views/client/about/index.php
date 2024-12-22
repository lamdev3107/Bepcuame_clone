<!-- pages-title-start -->
 <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="">Trang chủ</a></li>
                        <li><span  class="mx-2"> / </span class="mx-2">Giới thiệu </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- pages-title-end -->
<!-- cart content section start -->
 <div class="product-details section-padding-top">
	 <div class="container product-details-box  rounded">
        <h1 class="p-2 mb-4 text-center" style=" color: #222222; font-weight:500">Bếp của Mẹ </h1>

        <div class="row px-3 mb-5">
            <div class="col-12 col-lg-6 overflow-hidden p-4 " style="background-color:#ebfff6; border-radius: 20px ">
                <h2 style="font-size: 24px; color: #3f4761">Đôi lời giới thiệu</h2>
                <p style="color: #3f4761">Xuất phát điểm từ sở thích nấu ăn và làm bánh cho gia đình của người sáng lập, cùng sự trăn trở và băn khoăn về tình trạng đồ ăn uống không đảm bảo trong suốt thời gian dài. Bếp của Mẹ mong muốn tạo ra một địa chỉ tin cậy, nơi các quý khách hàng, các chị em tin yêu lựa chọn được đồ ăn cho gia đình mình mà hoàn toàn yên tâm và hài lòng. Trong mỗi sản phẩm của chúng tôi đều chứa đựng tình yêu,đam mê và sự tâm huyết,trân trọng khách hàng thể hiện qua sự tỉ mỉ chăm chút,…Chúng tôi muốn mang cái tâm của người đã làm mẹ gửi vào từng món ăn đưa tới khách hàng. Đó chính là lý do cái tên bếp của Mẹ ra đời.</p>
            </div>
            <div class="col-12 col-lg-6">
                <div class="owl-carousel-wrapper position-relative " style="">
                    <div class="owl-carousel about-slider">
                        <div class="item p-1"> 
                            <img src="public/img/about/about-1.png" class="overflow-hidden" style="border-radius: 20px"  alt="banner">
                        </div>
                        <div class="item p-1"> 
                            <img src="public/img/about/about-2.png" class="overflow-hidden" style="border-radius: 20px" alt="banner">
                        </div>
                        <div class="item p-1"> 
                            <img src="public/img/about/about-3.png" class="overflow-hidden" style="border-radius: 20px" alt="banner">
                        </div>
                        <div class="item p-1"> 
                            <img src="public/img/about/about-4.png" class="overflow-hidden" style="border-radius: 20px" alt="banner">
                        </div>
                        
                    </div>
                    <div class="custom-nav position-absolute" >
                        <button class="prevBtn about-next" class="hidden"><i class="fa-solid fa-angle-left"></i></i></button>
                        <button class="nextBtn about-prev"><i class="fa-solid fa-angle-right"></i></button>
                     </div>     
                </div>
            </div>
        </div>
          
        <!-- <div class="row">
            <h1 class="p-2 mb-4 text-center" style=" color: #222222; font-weight:500">Dịch vụ của chúng tôi </h1>
                <div class="cart-vertical d-flex flex-column gap-3 col col-sm-12 col-md-3 col-lg-24 mb-4"> 
                    <div class="img" width="70" height="70">
                        <img src="public/img/about/shield_icon.png" alt="">
                    </div>
                    <p>Sản phẩm tươi mới, cam kết chất lượng</p>

                </div>
        </div> -->
		
	</div>
</div>

<script>
   $(document).ready(function() {
        //----------Carousel ------------//
        let about_slider  =  $('.about-slider').owlCarousel({
            loop: true,
            margin: 28,
            nav: false,
            dots: false,
            autoplay: false,
            navRewind: true, 
            lazyLoad: true,
            navText: [
                "<i class='fa fa-caret-left'></i>",
                "<i class='fa fa-caret-right'></i>"
            ],
            autoplayHoverPause: true,
            onInitialized: (e) => checkNavigation(e, $(".about-next"), $(".about-prev")),
            onChanged: (e) => checkNavigation(e, $(".about-next"), $(".about-prev")),
            responsive: {
                0: {
                items: 1,
                slideBy:1
                },
                600: {
                items: 1,
                slideBy: 1
                },
                1000: {
                items: 1,
                slideBy: 1,
                }
            }
        })
        function checkNavigation(event , nextBtn, prevBtn ) {
            var items = event.item.count;        // Tổng số item
            var item = event.item.index;         // Vị trí hiện tại
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
   
        controlCarousel(about_slider, $(".about-prev"), $(".about-next"));


       
       
    });


	
</script>
<!-- cart content section end -->