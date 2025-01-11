 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Thống Kê</h1>
   </div>

   <!-- Content Row -->
   <div class="row">

     <!-- Doanh thu tháng -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Danh thu tháng này</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($monthlyRevenueStatistic['count']) ?> VNĐ</div>
             </div>
             <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Doanh thu năm -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Danh thu năm nay</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($yearlyRevenueStatistic['count']) ?> VNĐ</div>
             </div>
             <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Số lượng khách hàng -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Khách hàng</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $userStatistic['count'] ?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-calendar fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!-- Số lượng nhân viên -->
     <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
           <div class="row no-gutters align-items-center">
             <div class="col mr-2">
               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nhân viên</div>
               <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $employeeStatistic['count'] ?></div>
             </div>
             <div class="col-auto">
               <i class="fas fa-calendar fa-2x text-gray-300"></i>
             </div>
           </div>
         </div>
       </div>
     </div>


    </div>

  <div class="row">
    <!-- Số lượng sản phẩm -->
    <div class="col-xl-3 col-md-6 mb-4 ">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sản phẩm</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$productsStatistic['count']?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4 ">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Danh mục</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$collectionsStatistic['count']?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu theo tháng (2025)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas class="chartjs-render-monitor" id="myAreaChart"></canvas>
                    </div>
                    <!-- <hr>
                    Styling for the area chart can be found in the
                    <code>/js/demo/chart-area-demo.js</code> file. -->
                </div>
            </div>

            <!-- Bar Chart -->
            <!-- <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu theo tháng</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>
                    Styling for the bar chart can be found in the
                    <code>/js/demo/chart-bar-demo.js</code> file.
                </div>
            </div> -->

        </div>


        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ tỉ lệ đơn hàng</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <!-- <hr>
                    Styling for the donut chart can be found in the
                    <code>/js/demo/chart-pie-demo.js</code> file. -->
                </div>
            </div>
        </div>
        
    </div>

  
  </div>
      <!-- Page level plugins -->
    <script src="public/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="public/js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="public/js/demo/chart-pie-demo.js"></script> -->
    <script src="public/js/demo/chart-bar-demo.js"></script>


    <!-- Pie Chart JS  -->
<script>
  //Pie chart
  let fetchedData = JSON.parse(`<?php print_r($statusStatistic)?>`);
  let dataLabels = [];
  let dataPercents = [];
  for(let i = 0; i < fetchedData.length; i++){
    switch(fetchedData[i]['status']){
      case 'processing':
        dataLabels.push("Chưa xử lý");
        dataPercents.push(parseInt(fetchedData[i]['count']))
        break;
      case 'confirmed':
        dataLabels.push("Đã xác nhận");
        dataPercents.push(parseInt(fetchedData[i]['count']))
        break;
      case 'shipped':
        dataLabels.push("Đang giao");
        dataPercents.push(parseInt(fetchedData[i]['count']))
        break;
      case 'completed':
        dataLabels.push("Hoàn thành");
        dataPercents.push(parseInt(fetchedData[i]['count']))
        break;
      default:
        dataLabels.push("Đơn hoàn trả");
        dataPercents.push(parseInt(fetchedData[i]['count']))
        break;
    }
  }
  (Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = "#858796";

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  let data = {
    labels: dataLabels,
    datasets: [
      {
        data: dataPercents,
        backgroundColor: ["#ffd930", "#2e59d9", "#36a2eb", "#17a673", "#fc8d62"],
        // hoverBackgroundColor: ["#2e59d9", "#17a673"],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      },
    ],
  };
  var myPieChart = new Chart(ctx, {
    type: "pie",
    data: data,

    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: true,
        yPadding: 15,
      },
      cutoutPercentage: 80,
    },
  });



  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  let revenueByMonths = JSON.parse(`<?php print_r($revenueByMonths)?>`);
  let dataBarLabels = [];
  let dataBarNumbers = [];
  for(let i = 0; i < revenueByMonths.length; i++){
    for(let j = 1; j <= 12; j++){
      if(revenueByMonths[i].month == j){
        dataBarLabels.push(`Tháng ${j}`);
        dataBarNumbers.push(parseInt(revenueByMonths[i]['total_sales']));
        break;
      }
    }
  }


  // // Bar Chart Example
  // var ctx = document.getElementById("myBarChart");
  // var myBarChart = new Chart(ctx, {
  //   type: 'bar',
  //   data: {
  //     labels: dataBarLabels,
  //     datasets: [{
  //       label: "Doanh số",
  //       backgroundColor: "#4e73df",
  //       hoverBackgroundColor: "#2e59d9",
  //       borderColor: "#4e73df",
  //       data: dataBarNumbers,
  //     }],
  //   },
  //   options: {
  //     maintainAspectRatio: false,
  //     layout: {
  //       padding: {
  //         left: 10,
  //         right: 25,
  //         top: 25,
  //         bottom: 0
  //       }
  //     },
  //     scales: {
  //       xAxes: [{
  //         time: {
  //           unit: 'tháng'
  //         },
  //         gridLines: {
  //           display: false,
  //           drawBorder: false
  //         },
  //         ticks: {
  //           maxTicksLimit: 6
  //         },
  //         maxBarThickness: 25,
  //       }],
  //       yAxes: [{
  //         ticks: {
  //           min: 0,
  //           max: 10000000,
  //           maxTicksLimit: 10,
  //           padding: 10,
  //           // Include a dollar sign in the ticks
  //           callback: function(value, index, values) {
  //             return   number_format(value) + "VNĐ";
  //           }
  //         },
  //         gridLines: {
  //           color: "rgb(234, 236, 244)",
  //           zeroLineColor: "rgb(234, 236, 244)",
  //           drawBorder: false,
  //           borderDash: [2],
  //           zeroLineBorderDash: [2]
  //         }
  //       }],
  //     },
  //     legend: {
  //       display: false
  //     },
  //     tooltips: {
  //       titleMarginBottom: 10,
  //       titleFontColor: '#6e707e',
  //       titleFontSize: 14,
  //       backgroundColor: "rgb(255,255,255)",
  //       bodyFontColor: "#858796",
  //       borderColor: '#dddfeb',
  //       borderWidth: 1,
  //       xPadding: 15,
  //       yPadding: 15,
  //       displayColors: false,
  //       caretPadding: 10,
  //       callbacks: {
  //         label: function(tooltipItem, chart) {
  //           var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
  //           return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + "VNĐ";
  //         }
  //       }
  //     },
  //   }
  // });

// Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels:dataBarLabels,
        datasets: [{
          label: "Earnings",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: dataBarNumbers,
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              max: 10000000,
              maxTicksLimit: 10,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return   number_format(value) + "VNĐ";
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + "VNĐ";
            }
          }
        }
      }
    });

</script>

 </div>