 <!-- Sidebar -->
  
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Bếp của mẹ</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Divider -->
  <hr class="sidebar-divider">


  <!-- Nav Item - Pages Collapse Menu -->
  <?php if (isset($_SESSION['user']) && $_SESSION['user']['auth_id'] == 2) { ?>
  <li class="nav-item">
    <a class="nav-link" href="dashboard">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Thống kê</span></a>
  </li>
  <?php } ?>
  <!-- Nav Item - Charts -->
  <?php if (isset($_SESSION['user']) && $_SESSION['user']['auth_id'] == 2) { ?>
  

  <!-- <li class="nav-item">
      <a href="dashboard/user" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Quản lý Tài khoản</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="dashboard/user">Danh sách tài khoản</a>
          </div>
      </div>
  </li> -->
    <li class="nav-item">
    <a class="nav-link" href="dashboard/user">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý tài khoản</span></a>
  </li>
  <?php } ?>
  <!-- Nav Item - Tables -->

  <li class="nav-item">
    <a class="nav-link" href="dashboard/product">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý Sản phẩm</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="dashboard/collection">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý Danh mục</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard/order" data-toggle="collapse" data-target="#collapseTwo">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý đơn hàng</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class=" collapse-inner rounded">
              <a class="collapse-item"  href="dashboard/order">Danh sách đơn hàng</a>
          </div>
           <div class="collapse-inner rounded">
            <a class="collapse-item"  href="dashboard/order/statistic">Thống kê đơn hàng</a>
        </div>
    </div>
    <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
       
    </div> -->
  </li>
  
<!-- 
  <li class="nav-item">
    <a class="nav-link" href="?mod=danhmuc">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý danh mục sản phẩm</span></a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link" href="dashboard/banner">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý Banner</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="dashboard/promotion">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý khuyến mãi</span></a>
  </li>
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline absolute bottom-0">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<script>
const tabLinks = document.querySelectorAll('.nav-link');
const tabContents = document.querySelectorAll('.tab-content');
const collapseItems = document.querySelectorAll('.collapse-item');
let url = "<?php
  function getUrl(){
      if (isset($_SERVER['PATH_INFO'])) {
          $url = $_SERVER['PATH_INFO'];
      }
      else{
          $url = '/';
      }
      echo $url;
  }
  getUrl();
  ?>"
url = url.slice(1);

collapseItems.forEach((item) => {
  let href = item.getAttribute('href');
  if(href == url){
    item.classList.add('active');
    let tabId = item.getAttribute('href').slice(1);
    tabContents.forEach(tab => {
      if(tab.id == tabId){
        tab.classList.add('show');
        tab.classList.add('active');
      }else{
        tab.classList.remove('show');
        tab.classList.remove('active');
      }
    })
  }
})
tabLinks.forEach(link => {
    
    let href = link.getAttribute('href');
    
    if(url.includes(href) ){
      tabLinks.forEach(link => link.classList.remove('active'));
      link.classList.add('active');
        $(`.collapse-item[href="${href}"]`).addClass('active');
        // $(`.nav-link collapsed[href="${href}"]`).addClass('active');

    }
  
});
</script>
<!-- End of Sidebar -->