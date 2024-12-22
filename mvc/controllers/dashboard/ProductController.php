<?php
require_once "./mvc/core/redirect.php";
require_once "./mvc/helper/HelperFunctions.php";


class ProductController extends Controller{
    private $ProductModel;
    private $PromotionModel;
    public function __construct(){
        $this->ProductModel = $this->model('Product');
        $this->PromotionModel = $this->model('Promotion');
    }
    public function index(){
        $productData = $this->ProductModel->getAllProduct("created_at ASC");
        $data = [
            'page'          => 'products/index',
            'products'       => $productData,
        ];
        $this->view('dashboard/dashboard-layout',$data);
    }
    public function detail(){
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $product = $this->ProductModel->findProductById($id);
        $data = [
            'page'          => 'products/detail',
            'product'       => $product,
        ];
        $this->view('dashboard/dashboard-layout',$data);
    }
    public function add(){
        $data_promotion = $this-> PromotionModel->getAllPromotion();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $status = 0; //Status == 0 means 
            if (isset($_POST['status'])) {
                $status = $_POST['status'];
            }
            $target_dir = "./public/img/products/";  // thư mục chứa file upload

            $image1 = "";
            if(isset($_FILES["image2"]["name"])){
                $target_file = $target_dir . basename($_FILES["image1"]["name"]); // link sẽ upload file lên
                $status_upload = move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file);
                if ($status_upload) { // nếu upload file không có lỗi 
                    $image1 =  $target_file;
                }
            }

            $image2 = "";
            if(isset($_FILES["image2"]["name"])){
                $target_file = $target_dir . basename($_FILES["image2"]["name"]); // link sẽ upload file lên
                $status_upload = move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file);
                if ($status_upload) { // nếu upload file không có lỗi 
                    $image2 =  $target_file;
                }
            }

            $image3 = "";
            if(isset($_FILES["image3"]["name"])){
                $target_file = $target_dir . basename($_FILES["image3"]["name"]); // link sẽ upload file lên
                $status_upload = move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file);
                if ($status_upload) { // nếu upload file không có lỗi 
                    $image3 =  $target_file;
                }
            }

            $image4 = "";
            if(isset($_FILES["image2"]["name"])){
                $target_file = $target_dir . basename($_FILES["image4"]["name"]); // link sẽ upload file lên
                $status_upload = move_uploaded_file($_FILES["image4"]["tmp_name"], $target_file);
                if ($status_upload) { // nếu upload file không có lỗi 
                    $image4 =  $target_file;
                }
            }

            $data = array(
                'name'  =>   $_POST['name'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3,
                'image4' => $image4,
                'slug' => HelperFunction::create_slug($_POST['name']),
                'promotion_id' =>  $_POST['promotion_id'],
                'description' =>  $_POST['description'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $res = $this->ProductModel->addProduct( $data);
            if ($res === true) {
                $_SESSION['alert_type'] = "success";
                $_SESSION['alert_message'] ="Tạo mới sản phẩm thành công!";
                $_SESSION['alert_timer'] = true;
                $redirect = new redirect('dashboard/product');
                return;

            } else {
                setcookie('noti-type', 'error', time() + 2);
                setcookie('noti-message', 'Tạo sản phẩm thất bại!', time() + 2);
                $redirect = new redirect('dashboard/product/add');

            }
           
        }

        $data = [
            'page'          => 'products/add',
            'data_promotion' => $data_promotion,
        ];
        $this->view('dashboard/dashboard-layout',$data);

    }
  
    public function delete()
    {   
        $id = $_GET['id'];
        $query = $this->ProductModel->deleteProduct($id);
        if($query){
            $_SESSION['alert_type'] = "success";
            $_SESSION['alert_message'] ="Xóa sản phẩm thành công!";
            $_SESSION['alert_timer'] = true;
            print_r($_SESSION['alert_type']);
            $redirect = new redirect('dashboard/product');
          
        }

    }

    public function update(){
        $id = $_GET['id'];
        $data_promotion = $this-> PromotionModel->getAllPromotion();
        $product = $this->ProductModel->findProduct($id);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $target_dir = "./public/img/products/";  // thư mục chứa file upload
            $image1 = "";
            $target_file = $target_dir . basename($_FILES["image1"]["name"]); // link sẽ upload file lên
            $status_upload = move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file);
            if ($status_upload) { // nếu upload file không có lỗi 
                $image1 =  $target_file;
            }

            $image2 = "";
            if(isset($_FILES["image2"]["name"])){
                $target_file = $target_dir . basename($_FILES["image2"]["name"]); // link sẽ upload file lên
                $status_upload = move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file);
                if ($status_upload) { // nếu upload file không có lỗi 
                    $image2 =   $target_file;
                }
            }
         

            $image3 = "";
            if(isset($_FILES["image3"]["tmp_name"])){
                $target_file = $target_dir . basename($_FILES["image3"]["name"]); // link sẽ upload file lên
                $status_upload = move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file);
                if ($status_upload) { // nếu upload file không có lỗi 
                    $image3 =   $target_file;
                }
            }
           

            $image4 = "";
            if(isset($_FILES["image4"]["name"])){
                $target_file = $target_dir . basename($_FILES["image4"]["name"]); // link sẽ upload file lên
                $status_upload = move_uploaded_file($_FILES["image4"]["tmp_name"], $target_file);
                if ($status_upload) { // nếu upload file không có lỗi 
                    $image4 =   $target_file;
                }
            }
           
         
            $data = array(
                'name'  =>   $_POST['name'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'slug' => HelperFunction::create_slug($_POST['name']),
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3,
                'image4' => $image4,
                'promotion_id' =>  $_POST['promotion_id'],
                'description' =>  $_POST['description'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $res = $this->ProductModel->updateProduct($id, $data);
            if ($res === true) {
                $_SESSION['alert_type'] = "success";
                $_SESSION['alert_message'] ="Cập nhật sản phẩm thành công!";
                $_SESSION['alert_timer'] = true;
                $redirect = new redirect('dashboard/product');
                return;

            } else {
                setcookie('noti-type', 'error', time() + 2);
                setcookie('noti-message', 'Tạo sản phẩm không thành công!', time() + 2);
                $redirect = new redirect('dashboard/product/update/?id='.$id);

                return;

            }
           
        }
        
        $data = [
            'page'          => 'products/update',
            'data_promotion' => $data_promotion,
            'data' => $product,
        ];
        $this->view('dashboard/dashboard-layout',$data);
    }
}

?>