<!-- pages-title-start -->
 <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="text-left">
                        <li><a href="">Trang chủ</a></li>
                        <li><span  class="mx-2"> / </span class="mx-2">Liên hệ </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- pages-title-end -->
<!-- cart content section start -->
 <div class="product-details section-padding-top">
	 <div class="container product-details-box  rounded  pb-4">
        <h1 class="p-2 mb-5 text-center  mt-1 " style=" color: #222222; font-weight:500">HỆ THỐNG CỬA HÀNG</h1>
        <div class="row px-4 " style="margin-bottom: 32px">
            <div class="col-6 d-flex flex-column gap-3">
                <h3>Cơ sở 1</h3>
                <div class="about-text d-flex align-items-center justify-content-start">
                    <h4 class="my-0 me-2">
                        <i class="mdi mdi-map-marker"></i>
                        Địa chỉ: </h4>
                    <p class="m-0">Số 6, ngõ 171 Nguyễn Ngọc Vũ, Hà Nội</p>
                </div>
                <div class="about-text d-flex align-items-center justify-content-start">
                    <h4 class="my-0 me-2">
                        <i class="mdi mdi-phone"></i>
                        Đố điện thoại (Zalo): </h4>
                    <p class="m-0">024 3928 9833 </p>
                </div>
                <div class="about-text d-flex align-items-center justify-content-start">
                    <h4 class="my-0 me-2">
                        <i class="mdi mdi-email"></i>
                        Email: </h4>
                    <p class="m-0">bepcuame@gmail.com </p>
                </div>
            </div>
            <div class="col-6 d-flex flex-column gap-3" >
               
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3371.360779628908!2d105.75101807471295!3d20.97359098967221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532492e274d7%3A0xfabab8d42ab8c188!2zQuG6v3AgQ-G7p2EgTeG6uQ!5e1!3m2!1svi!2s!4v1731565434119!5m2!1svi!2s" class="w-100"  style="border:0; min-height: 300px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        
        <div class="row px-4">
            <div class="col-6 d-flex flex-column gap-3">
                <h3>Cơ sở 2</h3>
                <div class="about-text d-flex align-items-center justify-content-start">
                    <h4 class="my-0 me-2">
                        <i class="mdi mdi-map-marker"></i>
                        Địa chỉ: </h4>
                    <p class="m-0">Số 6, ngõ 171 Nguyễn Ngọc Vũ, Hà Nội</p>
                </div>
                <div class="about-text d-flex align-items-center justify-content-start">
                    <h4 class="my-0 me-2">
                        <i class="mdi mdi-phone"></i>
                        Đố điện thoại (Zalo): </h4>
                    <p class="m-0">024 3928 9833 </p>
                </div>
                <div class="about-text d-flex align-items-center justify-content-start">
                    <h4 class="my-0 me-2">
                        <i class="mdi mdi-email"></i>
                        Email: </h4>
                    <p class="m-0">bepcuame@gmail.com </p>
                </div>
            </div>
            <div class="col-6 d-flex flex-column gap-3" >
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1362.0935573126642!2d105.80603522382108!3d21.012150345358386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab6022b6dd2d%3A0x24d7dfb6ef5edb6d!2zNiBOZy4gMTcxIMSQLiBOZ3V54buFbiBOZ-G7jWMgVsWpLCBUcnVuZyBIb8OgLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1731570587106!5m2!1svi!2s" class="w-100"  style="border:0; min-height: 300px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
             >
            </div>
        </div>
        
		
	</div>
</div>

<script>
   $(document).ready(function() {
        //----------Carousel ------------//
        let about_slider  =  $('.about-slider').owlCarousel({
            loop: true,
            margin: 28,
            nav: false,
            dots: true,
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
                slideBy: 3
                },
                1000: {
                items: 1,
                slideBy: 4,
                }
            }
        })
        function checkNavigation(event, prevBtn, nextBtn) {
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