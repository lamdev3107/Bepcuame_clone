
    
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
    Danh sách đơn hàng
    </h6>
  </div>
  <div class="card-body table-responsive">
    
    <div class="tab-links">
        <a href="dashboard/order"  class="tab-link <?php if(!isset($_GET['status']) ){
          echo "active";
        } ?>" data-tab=""> Tất cả</a>
        <a href="dashboard/order/?status=processing" class="tab-link <?php if(isset($_GET['status']) && $_GET['status'] == 'processing'){
          echo "active";
        } ?>" data-tab="processing">Chờ xác nhận</a>
        <a href="dashboard/order/?status=confirmed"  class="tab-link <?php if(isset($_GET['status']) && $_GET['status'] == 'confirmed'){
          echo "active";
        } ?>" data-tab="confirmed">Đã xác nhận</a>
        <a href="dashboard/order/?status=shipped" class="tab-link <?php if(isset($_GET['status']) && $_GET['status'] == 'shipped'){
          echo "active";
        } ?>" data-tab="shipped">Đang giao </a>
        <a href="dashboard/order/?status=completed"  class="tab-link <?php if(isset($_GET['status']) && $_GET['status'] == 'completed'){
          echo "active";
        } ?>" data-tab="completed">Giao thành công </a> 
        <a href="dashboard/order/?status=returned" class="tab-link <?php if(isset($_GET['status']) && $_GET['status'] == 'returned'){
          echo "active";
        } ?>" data-tab="returned">Đơn hoàn trả</a> 
         
    </div>
    <table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên Khách Hàng</th>
          <th scope="col">Ngày đặt hàng</th>
          <th scope="col">Tổng tiền</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Thao tác</th>
        </tr>
      </thead>
      <tbody class="table-body">
        <?php foreach ($data as $row) { ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['recepient_name'] ?></td>
            <td class="text-nowrap flex-shrink-0"><?php
              $date = date("d/m/Y", strtotime($row['date_received']));
              // print_r($date);
              echo $date;
              // echo `<p class="flex-shrink-0 text-nowrap" > $date </p>`;
          
             ?></td>
            <td ><?= number_format($row['total_price']) ?>đ</td>
            <td style="min-width: 250px" class="flex-shrink-0"><?= $row['address'] ?></td>
            <td><?php 
              switch ($row['status']) {
                case 'processing':
                  echo '
                    <p class="alert-warning text-nowrap rounded py-1 px-2">Chờ xử lý</p>
                  ';
                  // echo 'Chờ xử lý';
                  break;
                case 'confirmed':
                  // echo 'Đã xác nhận';
                  echo '
                    <p class="alert-primary text-nowrap rounded py-1 px-2">Đã xác nhận</p>
                  ';
                  break;
                case'shipped':
                  echo '
                    <p class="alert-info text-nowrap rounded py-1 px-2">Đang giao</p>
                  ';
                  break;
                case 'completed':
                  echo '
                    <p class="alert-success text-nowrap rounded py-1 px-2">Giao thành công</p>
                  ';
                  break;
                case'returned':
                   echo '
                    <p class="alert-danger text-nowrap rounded py-1 px-2">Đơn hoàn trả</p>
                  ';
                  break;
              }
            ?></td>
            <td style="min-width: 154px; " class="flex-shrink-0" >
               <a href="dashboard/order/update/?id=<?= $row['id'] ?>" type="button" style="width:40px; height: 40px" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
              <a href="dashboard/order/detail/?id=<?= $row['id'] ?>" style="width: 40px; height: 40px;" class="btn btn-info d-inline-flex justify-content-center align-items-center"><i style="font-size: 16px" class="fa-regular fa-eye"></i></a>
              <a href="dashboard/order/delete/?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" style="width: 40px; height: 40px" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
            </td>
          </tr>
        <?php } ?>
    </table>
    <script>
      $(document).ready(function() {
        $('#dataTable').DataTable();
      });

      const tabLinks = document.querySelectorAll('.tab-link');
      const tabContents = document.querySelectorAll('.tab-content');

      tabLinks.forEach(link => {
        link.addEventListener('click', () => {
          // Remove active class from all links
          tabLinks.forEach(link => link.classList.remove('active'));
          let status = link.getAttribute('data-tab');
          $.ajax({
            url: `dashboard/order/?status=${status}`,
            method: "GET",
            dataType: 'json',  // Yêu cầu dữ liệu trả về dư��i dạng JSON
            data: {status: status},
            success: function(data){
              console.log('check data', data);
              let html= "";
              $('.table-body').html(() => {
                data.map((item) => {
                  html+= `<tr>
                        <td>${item.id}</td>
                        <td>${item.recepient_name}</td>
                        <td>${item.phone}</td>
                        <td>${ item.date_received.split('').reverse().join('')}</td>
                        <td> ${Math.floor(item.total_price).format(0)}đ</td>
                        <td>${item.address}</td>
                        <td>${(() => {
                          switch (item.status) {
                            case 'processing':
                              return 'Chờ xác nhận';
                              break;
                            case 'confirmed':
                              return 'Đã xác nhận';
                              break;
                            case'shipped':
                              return 'Đang giao';
                              break;
                            case 'completed':
                              return 'Giao thành công';
                              break;
                            case'returned':
                              return 'Đơn hoàn trả';
                              break;
                          }
                        })()}</td>
                        <td style="width: 130px">
                            <a href="dashboard/order/update/?id=${item.id}" type="button" style="width:40px; height: 40px" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="dashboard/order/detail/?id=${item.id}" style="width: 40px; height: 40px;" class="btn btn-info d-inline-flex justify-content-center align-items-center"><i style="font-size: 16px" class="fa-regular fa-eye"></i></a>
                            <a href="dashboard/order/delete/?id=${item.id}" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" style="width: 40px; height: 40px" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                                          </td>
                        `
                })
              return html;

              })
            },
            error: function( error) {
              console.log('Error:', error);
            }
          })
          // Add active class to clicked link
          link.classList.add('active');
          $('.table-body')
        

          
        });
      });
    </script>
  </div>
</div>