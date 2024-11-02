

<!doctype html>
<html class="no-js" lang="vi-vn">

<head>
   
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bếp của mẹ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="public/img/logo.png">

    <link rel="apple-touch-icon" href="public/apple-touch-icon.png">
    <base href="http://localhost/bepcuame/">

    <!-- Place icon.png in the root directory -->
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <!-- all css here -->
    <!-- bootstrap v5.3.3css -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- animate css -->
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- pe-icon-7-stroke -->
    <link rel="stylesheet" href="public/css/materialdesignicons.min.css">
    <!-- pe-icon-7-stroke -->
    <link rel="stylesheet" href="public/css/jquery.simpleLens.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="public/css/jquery-ui.min.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="public/css/meanmenu.min.css">
    <!-- nivo.slider css -->
    <link rel="stylesheet" href="public/css/nivo-slider.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <!-- style css -->
    <link rel="stylesheet" href="public/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="public/css/responsive.css">
    <!-- modernizr js -->
    <script src="/public/js/vendor/modernizr-2.8.3.min.js"></script>

       <!-- footer section end -->
    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="public/js/vendor/jquery-1.12.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="public/js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="public/js/owl.carousel.min.js"></script>
    <!-- meanmenu js -->
    <script src="public/js/jquery.meanmenu.js"></script>
    <!-- countdown JS -->
    <script src="public/js/countdown.js"></script>
    <!-- nivo.slider JS -->
    <script src="public/js/jquery.nivo.slider.pack.js"></script>
    <!-- simpleLens JS -->
    <script src="public/js/jquery.simpleLens.min.js"></script>
    <!-- jquery-ui js -->
    <script src="public/js/jquery-ui.min.js"></script>
    <!-- load-more js -->
    <script src="public/js/load-more.js"></script>
    <!-- plugins js -->
    <script src="public/js/plugins.js"></script>
    <!-- main js -->
    <script src="public/js/main.js"></script>

    <!-- sweetalert2 -->
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js
    "></script>
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css
    " rel="stylesheet">

   
</head>

<body>
    
    <!-- header section start -->
    <?php
   require_once './mvc/views/client/header_footer/header.php'
    ?>
    <!-- header section end -->

    <!-- slider-section-start -->
    <?php
    require_once './mvc/views/client/'.$page.'.php';
    ?>
    <!-- slider section end -->

    <!-- footer section start -->
    <?php
    require_once './mvc/views/client/header_footer/footer.php';
    ?>
    
    <?php
        if(isset($_SESSION['alert_message']) && $_SESSION['alert_message'] != ""){
    ?>
            <script>
                Swal.fire({
                icon: "<?php echo $_SESSION['alert_type']; ?>",
                title: "<?php  echo $_SESSION['alert_message']; ?>",
                showConfirmButton:  <?php echo isset($_SESSION['alert_timer']) && $_SESSION['alert_timer'] ? 'false' : 'true'; ?>,
                timer: <?php if (isset($_SESSION['alert_timer']) && $_SESSION['alert_timer']) echo 2000;  ?>
                });
            </script>
       
    <?php 
        unset($_SESSION['alert_message']);
        unset($_SESSION['alert_type']);
    }?>
    
    <!-- Bootstrap script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>