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
    public function index(){
        $orderData = $this->OrderModel->getAllOrder("created_at ASC");

        $data = [
            'page'          => 'orders/index',
            'data'       => $orderData,
        ];
        $this->view('dashboard/dashboard-layout',$data);
    }
    public function detail(){
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $order = $this->OrderModel->findOrder($id);
        // $orderDetail = $this->OrderDetailModel->getOrderDetailOfOrder($id);
        // print_r($order);
        $data = [
            'page'          => 'orders/detail',
            'order'       => $order,
            // 'orderDetail' => $orderDetail,
        ];
        $this->view('dashboard/dashboard-layout',$data);
    }
    public function create_slug($string) {
        $slug = preg_replace('/[^a-zA-Z0-9_\-]/', '', strtolower($string));
        return $slug;
    }

    function confirmOrder(){
        $data = array(
            'id' => $_GET['id'],
            'status' => 1,
        );
        
        $this->OrderModel->update($data);
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
            print_r($_SESSION['alert_type']);
            $redirect = new redirect('dashboard/order');
          
        }

    }

    public function update(){
        $id = $_GET['id'];
        $order = $this->OrderModel->findOrder($id);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = array();
            $status = 0;
            if(isset($_POST['status'])){
                $status = $_POST['status'];
            }
            if($_FILES["image"]['name'] != ""){
                $image = "";
                $target_dir = "./public/img/order/";  // thư mục chứa file upload
                $target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên
                $status_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                if ($status_upload) { // nếu upload file không có lỗi 
                    $image =  $target_file;
                }
                $data = array(
                'name' =>    $_POST['name'],
                'image'  =>   $image,
                'slug' => HelperFunction::create_slug($_POST['name'])    ,
                'description' => $_POST['description'],
                'status' => $status,
                );
            }
            else{
                $data = array(
                'name' =>    $_POST['name'],
                'slug' => HelperFunction::create_slug($_POST['name'])    ,
                'description' => $_POST['description'],
                'status' => $status,
                );
            }
          
           
            $isUpdated = $this->OrderModel->updateOrder($id, $data);
            if($isUpdated){
                $_SESSION['alert_type'] = "success";
                $_SESSION['alert_message'] ="Cập nhật danh mục thành công!";
                $_SESSION['alert_timer'] = true;
                setcookie('noti-message', 'Cập nhật danh mục thành công!', time() + 2);
                setcookie('noti-type', 'success', time() + 2);
                $data = $this->OrderModel->findOrder($id);
                $redirect = new redirect('dashboard/order/update?id='.$id);
                return;
            }
            else{
                setcookie('noti-type', 'error', time() + 2);
                setcookie('noti-message', 'Câp nhật danh mục không thành công!', time() + 2);
                return;
            }
        }
        
        $data = [
            'page'          => 'orders/update',
            'data' => $order,
        ];
        $this->view('dashboard/dashboard-layout',$data);
    }
}

?>