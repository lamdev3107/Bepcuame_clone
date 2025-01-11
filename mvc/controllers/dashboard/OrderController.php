<?php
require_once "./mvc/core/redirect.php";
require_once "./mvc/helper/HelperFunctions.php";

class OrderController extends Controller{
    private $OrderModel;
    private $OrderDetailModel;
    public function __construct(){
        $this->OrderModel = $this->model('Order');
        $this->OrderDetailModel = $this->model('OrderDetail');
    }
// Processing: Đơn hàng đang được xử lý.
// Completed: Đơn hàng đã hoàn tất.
// Failed: Đơn hàng không thành công (thường do lỗi thanh toán).
// Shipped: Đơn hàng đã đang giao.
// Returned: Đơn hàng đã bị trả lại.
    public function index(){
        
        $orderData = NULL;
        
        if(isset($_GET['status'])){
            $status = isset($_GET['status']) ? $_GET['status'] : NULL;
            if($status !== ""){
                $orderData = $this-> OrderModel->getOrderByStatus($status);
            }
            else{
                $orderData = $this->OrderModel->getAllOrder();
            }
        }
        else{
            $orderData = $this->OrderModel->getAllOrder();
        }
        $data = [
            'page'          => 'orders/index',
            'data'       => $orderData,
        ];
        $this->view('dashboard/dashboard-layout',$data);
    }
    public function detail(){
        $id = isset($_GET['id']) ? (int)$_GET['id'] : NULL;
        $order = $this->OrderModel->findOrder($id);
        $orderDetails = $this->OrderDetailModel->getOrderDetailOfOrder($id);
        $data = [
            'page'          => 'orders/detail',
            'order'       => $order,
            'orderDetails' => $orderDetails,
        ];
        $this->view('dashboard/dashboard-layout',$data);
    }
 

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $image = "";
		    $target_dir = "./public/img/order/";  // thư mục chứa file upload

            $target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên

            $status_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

            if ($status_upload) { // nếu upload file không có lỗi 
                $image =              $target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên

            }
            $status = 0;
            if(isset($_POST['status'])){
                $status = $_POST['status'];
            }
            $data = array(
                'name' =>    $_POST['name'],
                'image'  =>   $image,
                'slug' => HelperFunction::create_slug($_POST['name']),
                'description' => $_POST['description'],
                'status' => $status,
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $res = $this->OrderModel->addOrder( $data);
            if ($res === true) {
                $_SESSION['alert_type'] = "success";
                $_SESSION['alert_message'] ="Tạo mới danh mục thành công!";
                $_SESSION['alert_timer'] = true;
                $redirect = new redirect('dashboard/order');
                return;

            } else {
                setcookie('noti-type', 'error', time() + 2);
                setcookie('noti-message', 'Tạo danh mục không thành công!', time() + 2);
                
                return;
            }
            
        }

        $data = [
            'page'          => 'orders/add',
        ];
        $this->view('dashboard/dashboard-layout',$data);

    }

   
  
    public function delete()
    {   
        $id = $_GET['id'];
        $query = $this->OrderModel->deleteOrder($id);
        if($query){
            $_SESSION['alert_type'] = "success";
            $_SESSION['alert_message'] ="Xóa đơn hàng thành công!";
            $_SESSION['alert_timer'] = true;
            $redirect = new redirect('dashboard/order');
          
        }

    }
    public function delete_order_detail()
    {   
        $id = $_GET['id'];
        $query = $this->OrderDetailModel->deleteOrderDetail($id);
        if($query){
            $_SESSION['alert_type'] = "success";
            $_SESSION['alert_message'] ="Xóa sản phẩm khỏi đơn hàng thành công!";
            $_SESSION['alert_timer'] = true;
            // $redirect = new redirect('dashboard/order/update/?id='.$id);
          
        }

    }

    public function update_order_detail(){
        $id = isset($_GET['id']) ? (int)$_GET['id'] : NULL;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = array(
                'quantity'  =>   $_POST['quantity'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $res = $this->OrderDetailModel->updateOrderDetail($id, $data);
            if ($res === true) {
                echo "success";

            } else {
                echo "error";
            }
            return;
        }
    }
    public function update(){
        $id = isset($_GET['id']) ? (int)$_GET['id'] : NULL;
        //Trả về Order 
        $order = $this->OrderModel->findOrder($id);

        //Trả về OrderDetail gồm các thông tin mặt hàng
        $orderDetails = $this->OrderDetailModel->getOrderDetailOfOrder($id);

    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = array(
                'recepient_name'  =>   $_POST['name'],
                'status' => $_POST['status'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'date_received' => $_POST['date_received'],
                'time_received' => $_POST['time_received'],
                'note' => $_POST['note'],
                'total_price' => $_POST['total_price'],
              
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $res = $this->OrderModel->updateOrder($id, $data);
            if ($res === true) {
                echo "success";

            } else {
                echo "error";
            }
            return;
        }
        
        $data = [
            'page'          => 'orders/update',
            'order'       => $order,
            'orderDetails' => $orderDetails,
        ];
        //Gọi phương thức view, truyền vào đường dẫn đến file layout và data được sử dụng ở file view
        $this->view('dashboard/dashboard-layout',$data);
    }


}

?>