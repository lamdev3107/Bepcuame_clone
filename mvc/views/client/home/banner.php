
<div class="container  main-container" style="margin-top: 40px">
    <div class="owl-carousel-wrapper position-relative">
      <div class="owl-carousel banner-slider">
        <?php  foreach ($banners as $row) { ?>
            <div class="item p-1"> 
              <img src="<?=$row['image'] ?>" class="" alt="banner">
            </div>
        <?php }?>
      </div>
        <div class="custom-nav position-absolute" >
          <button class="prevBtn banner-next" class="hidden"><i class="fa-solid fa-angle-left"></i></i></button>
          <button class="nextBtn banner-prev"><i class="fa-solid fa-angle-right"></i></button>
      </div>     
    </div>  
                      
</div>

<script>
   $(document).ready(function() {
        //----------Carousel ------------//
        let banner_slider  =  $('.banner-slider').owlCarousel({
            loop: true,
            margin: 28,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            navRewind: true, 
            lazyLoad: true,
            navText: [
                "<i class='fa fa-caret-left'></i>",
                "<i class='fa fa-caret-right'></i>"
            ],
            autoplayHoverPause: true,
            onInitialized: (e) => checkNavigation(e, $(".banner-next"), $(".banner-prev")),
            onChanged: (e) => checkNavigation(e, $(".banner-next"), $(".banner-prev")),
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
   
        controlCarousel(banner_slider, $(".banner-prev"), $(".banner-next"));


       
       
    });
</script>






 
