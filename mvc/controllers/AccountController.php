<?php
require_once "./mvc/core/redirect.php";

class AccountController extends Controller{
    private $UserModel;
    private $OrderModel;
    private $CollectionModel;
    private $OrderDetailModel;
    public function __construct(){
        $this->CollectionModel = $this->model('Collection');
        $this->UserModel = $this->model('User');
        $this->OrderModel = $this->model('Order');
        $this->OrderDetailModel = $this->model('OrderDetail');
    }
    function profile(){
        $data_collection = $this->CollectionModel->getAllCollection();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $gender = 'Nam';
            if($_POST['gender'] !== 'Chọn giới tính'){
                $gender = $_POST['gender'];
            }
            $data = array(
                'lastname' =>    $_POST['lastname'],
                'firstname'  =>   $_POST['firstname'],
                'gender' => $gender,
                'phone' => $_POST['phone'],
                'address'  =>   $_POST['address'],
                'birthday' => $_POST['birthday'],
                'email' => $_POST['email'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $res = $this->UserModel->updateUser($_SESSION['user']['id'], $data);
            if ($res === true) {
                $redirect = new redirect('account/profile');
                $_SESSION['alert_type'] = "success";
                $_SESSION['alert_message'] ="Cập nhật tài khoản thành công!";
                $_SESSION['alert_timer'] = true;
                return;

            } 
            
        }
        if(isset($_SESSION['user'])){
            $user = $this->UserModel->findUser($_SESSION['user']['id']);
            $this->view('client/masterlayout',[
                'tab' => 'profile',
                'page'          => 'account/index',
                'data_collection'     => $data_collection,
                'user' => $user,
            ]);
            return;
        }
        $this->view('client/masterlayout',[
            'tab' => 'profile',
            'page'          => 'account/index',
            'data_collection'     => $data_collection,
        ]);
    }


    function myorders(){
        $data_collection = $this->CollectionModel->getAllCollection();
        $user = $this->UserModel->findUser($_SESSION['user']['id']);
        $orders = $this -> OrderModel -> findOrderOfUser($_SESSION['user']['id']);
        // $orders = "";
        $this->view('client/masterlayout',[
            'tab' => 'myorders',
            'page'          => 'account/index',
            'data_collection'     => $data_collection,
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    function changepassword(){
        $data_collection = $this->CollectionModel->getAllCollection();
        $user = $this->UserModel->findUser($_SESSION['user']['id']);
        $orders = $this -> OrderModel -> findOrderOfUser($_SESSION['user']['id']);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $password = md5($_POST['password']);
            if($user['password'] != $password){
                $redirect = new redirect('account/changepassword');
                setcookie('noti-type', 'error', time() + 2);
                setcookie('noti-message', 'Mật khẩu hiện tại không chính xác, Vui lòng nhập lại!', time() + 2);
                return;
            }
            else{
                $new_password = md5($_POST['new_password']);
                $data = array(
                    'password' => $new_password,
                );
                $res = $this->UserModel->updateUser($_SESSION['user']['id'], $data);
                if ($res === true) {
                    $redirect = new redirect('account/changepassword');
                    $_SESSION['alert_type'] = "success";
                    $_SESSION['alert_message'] ="Đổi mật khẩu thành công!";
                    $_SESSION['alert_timer'] = true;
                    return;
                } 
            }
            
         
            if ($user !== NULL) {
                if($user['auth_id'] == 2 || $user['auth_id'] ==3){
                    $_SESSION['user'] = $user;
                    $redirect = new redirect('dashboard/');
                    return;
                }else{
                    $_SESSION['user'] = $user;
                    $redirect = new redirect('/');
                    $this->view('client/masterlayout',[
                        'page'          => 'account/login',
                        'categories'     => $data_collection,
                    ]);
                    return;
                }
            } else {
                setcookie('noti-message', 'Tài khoản hoặc mật khẩu không chính xác', time() + 2);
                setcookie('noti-type', 'error', time() + 2);
                $redirect = new redirect('account/login');
            }
                        
        }
        $this->view('client/masterlayout',[
            'tab' => 'changepassword',
            'page'          => 'account/index',
            'data_collection'     => $data_collection,
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    function orderdetail($id){
        $data_collection = $this->CollectionModel->getAllCollection();
        $order = $this->OrderModel->findOrder($id);
        $user = $this->UserModel->findUser($_SESSION['user']['id']);
        $orderDetails = $this->OrderDetailModel->getOrderDetailOfOrder($id);
        $this->view('client/masterlayout',[
            'tab' => 'orderdetail',
            'page'          => 'account/index',
            'data_collection'     => $data_collection,
            'order' => $order,
            'user' => $user,
            'orderDetails' => $orderDetails,
        ]);
    }
    function login(){
        $data_collection = $this->CollectionModel->getAllCollection();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if (strpos($email, "'") != false) {
                $email = str_replace("'", "\'", $email);
            }
            $user = $this->UserModel->login($email, $password);
         
            if ($user !== NULL) {
                if($user['auth_id'] == 2 || $user['auth_id'] ==3){
                    $_SESSION['user'] = $user;
                    $redirect = new redirect('dashboard/');
                    return;
                }else{
                    $_SESSION['user'] = $user;
                    $redirect = new redirect('/');
                    $this->view('client/masterlayout',[
                        'page'          => 'account/login',
                        'categories'     => $data_collection,
                    ]);
                    return;
                }
            } else {
                setcookie('noti-message', 'Tài khoản hoặc mật khẩu không chính xác', time() + 2);
                setcookie('noti-type', 'error', time() + 2);
                $redirect = new redirect('account/login');
            }
                        
        }
        $this->view('client/masterlayout',[
            'page'          => 'account/login',
            'data_collection'     => $data_collection,
            // 'data_index'    => $data_index,
        ]);
    }





    function register(){
        $data_collection = $this->CollectionModel->getAllCollection();
        $check1 = 0;
        $data_check = $this->UserModel->getAllUser();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            foreach ($data_check as $element) {
                if ( $element['email'] == $_POST['email']) {
                    $check1 = 1;
                }
            }
            $data = array(
                'lastname' =>    $_POST['lastname'],
                'firstname'  =>   $_POST['firstname'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'password' => md5($_POST['password']),
                'auth_id' =>  1,
                'status'  =>  1,
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            
            if ($check1 == 0) {
                $res = $this->UserModel->addUser( $data);
                if ($res === true) {
                    $_SESSION['alert_type'] = "success";
                    $_SESSION['alert_message'] ="Đăng ký tài khoản thành công thành công, Vui lòng đăng nhập lại!";
                    $_SESSION['alert_timer'] = true;
                    $redirect = new redirect('account/login');

                    return;

                } else {
                    setcookie('noti-type', 'error', time() + 2);
                    setcookie('noti-message', 'Đăng ký tài khoản  thất bại!', time() + 2);
                }
            } 
            } else {
                setcookie('noti-type', 'error', time() + 2);
                setcookie('noti-message', 'Tài khoản đã tồn tại, Vui lòng nhập lại!', time() + 2);

            }
        $this->view('client/masterlayout',[
            'page'          => 'account/register',
            'data_collection'     => $data_collection,
        ]);
    }
    function logout(){
        unset($_SESSION['user']);
        $redirect = new redirect('index');
        session_destroy();

    }

   
    
    function update(){

        // if (isset($_POST['password'])) {
        //     $data = array(
        //         'Ho' =>    $_POST['Ho'],
        //         'Ten'  =>   $_POST['Ten'],
        //         'GioiTinh' => $_POST['GioiTinh'],
        //         'SDT' => $_POST['SĐT'],
        //         'Email' =>    $_POST['Email'],
        //         'DiaChi'  =>   $_POST['DiaChi'],
        //     );
        //     foreach ($data as $key => $value) {
        //         if (strpos($value, "'") != false) {
        //             $value = str_replace("'", "\'", $value);
        //             $data[$key] = $value;
        //         }
        //     }
        //     $this->login_model->update_account($data);
        // } else {
        //     if ($_POST['MatKhauMoi'] == $_POST['MatKhauXN']) {
        //         if (md5($_POST['MatKhau']) == $_SESSION['user']['MatKhau']) {
        //             $data = array(
        //                 'MatKhau' => md5($_POST['MatKhauMoi']),
        //             );
        //             $this->login_model->update_account($data);
        //         } else {
        //             setcookie('doimk', 'Mật khẩu không đúng', time() + 2);
        //         }
        //     } else {
        //         setcookie('doimk', 'Mật khẩu mới không trùng nhau', time() + 2);
        //     }
        // }
        // header('location: ?act=taikhoan&xuli=account#doitk');
    }
}
