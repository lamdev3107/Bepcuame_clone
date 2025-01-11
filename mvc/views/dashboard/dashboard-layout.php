<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang quản lý</title>
  <base href="http://localhost/bepcuame/">
  <link rel="shortcut icon" type="image/x-icon" href="public/img/logo.png">

  <!-- Font-awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom fonts for this template-->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- summernot -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <!--bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- date picker css -->
  <link rel="stylesheet" href="public/css/jquery.datetimepicker.min.css">

  <link href="public/css/./sb-admin-2.css" rel="stylesheet" type="text/css">

  <!-- SweetAlert CSS -->
  <link href="
  https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css
    " rel="stylesheet">

  <script src="public/vendor/jquery/jquery.min.js"></script>

</head>

<body style="padding: 0 !important" >
  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php require_once('menu.php') ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php require_once('header.php') ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php
            require_once './mvc/views/dashboard/'.$page.'.php';
          ?>
               
         
        </div>
                  <!-- End of Main Content -->
          <?php require_once('footer.php') ?>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
          <!-- sweetalert2 -->
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js
    "></script>
 
      <?php
        if(isset($_SESSION['alert_message']) && $_SESSION['alert_message'] != ""){
          print_r($_SESSION['alert_message']);
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
      <!-- Bootstrap core JavaScript-->
  <script src="public/vendor/jquery/jquery.min.js"></script>
  <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="public/js/sb-admin-2.min.js"></script>
   <!-- summernote-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <!-- Data table -->
  <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <!-- datetime picker js -->
  <script src="public/vendor/jquery.datetimepicker.full.min.js"></script>
    <script>
  $(document).ready(function() {
      $('.picker').datetimepicker({
          autoclose: true,
          timepicker:false,
          datepicker:true,
          format:"d/m/Y",
          weeks: true
      })
      $.datetimepicker.setLocale('vi')
  })

  function formatMoney(__this) {
        let val = __this;
        // let num = val.replace(/[^\d]/g,"");
        let arr = val.split('.');
        let val_num = arr[0];
        let len = val_num.length;
        let result = '';
        let j = 0;
        for (let index = len; index > 0; index--) {
            j++;
            if (j % 3 == 1 && j != 1) {
                result = val_num.substr(index - 1, 1) + ',' + result;
            } else {
                result = val_num.substr(index - 1, 1) + result;
            }
        }
        return result
    }
    Number.prototype.format = function(n, x) {
        let re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
    }
  </script>
</body>

</html>