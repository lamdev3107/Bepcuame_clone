<?php
require_once "./mvc/core/redirect.php";
require_once 'GlobalController.php';

class CartController extends Controller{
    private $ProductModel;
    private $CollectionModel;
    private $OrderModel;
    private $OrderDetailModel;
    private $GlobalController;


    function __construct(){
        $this->ProductModel       = $this->model('Product');
        $this->GlobalController        = new GlobalController();
        $this->CollectionModel = $this->model('Collection');

        $this->OrderDetailModel   = $this->model('OrderDetail');
        $this->OrderModel         = $this->model('Order');
    }
    function index(){
        $data_collection = $this->CollectionModel->getAllCollection();
        $data_index = $this->GlobalController->indexCustomers();
        $data = [
            'page'          => 'cart/index',
            'data_index'    => $data_index,
            'data_collection' => $data_collection
        ];
       $this->view('client/masterlayout', $data);
    }
    function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = $this->ProductModel->findProductById($_POST['id']);

            if (isset($_SESSION['cart'][$product['id']])) {
                $quantity = $_SESSION['cart'][$product['id']]['quantity'];
                $array = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => (int)$_POST['quantity'] 
                ];
                $cart = $this->cart($array);
                $returnArray = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => (int)$_SESSION['cart'][$product['id']]['quantity']
                ];
                // echo json_encode(array_values($cart));
                $returnData = json_encode($returnArray);
                // echo $cart;
                $json = json_encode([
                    'returnData' => $returnArray,
                    'data'  => array_values($cart)
                ]);
                echo $json;

            }else{
                $array = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => (int)$_POST['quantity'] 
                ];
                $cart = $this->cart($array);
                $returnArray = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => (int)$_SESSION['cart'][$product['id']]['quantity']
                ];
                $returnData = json_encode($returnArray);
                // echo $cart;
                $json = json_encode([
                    'returnData' => $returnArray,
                    'data'  => array_values($cart)
                ]);
                echo $json;
            }
        }
       
    }

    function order(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order = array(
                'user_id' => $_POST['userId'],
                'recepient_name' => $_POST['name'],
                'date_received' => $_POST['date_received'],
                'time_received' => $_POST['time_received'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'pay_method' => $_POST['payment_method'],
                'total_price' => $_POST['total_price'],
                'note' => $_POST['note'],
                'return_reason' => "",
                'status' => 'processing'
            );
           
            foreach ($order as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $order[$key] = $value;
                }
            }
            $res = $this->OrderModel->addOrder( $order);
            if($res){
                $order_id  = $res['id'];
                foreach ($_SESSION['cart'] as $key => $value) {
                    $order_detail = [
                        'order_id' => $order_id,
                        'product_id' => $key,
                        'quantity' => $value['quantity'],
                        'price' => $value['price']
                    ];
                    $this->OrderDetailModel->addOrderDetail($order_detail);
                }
                unset($_SESSION['cart']);
                $json = json_encode([
                    'status' => 200,
                ]);
                echo $json;
            }
            // $order_id = $this->OrderModel->createOrder($order);
            
         
        }
        $data_collection = $this->CollectionModel->getAllCollection();
        $data_index = $this->GlobalController->indexCustomers();
        $data = [
            'page'          => 'cart/order',
            'data_index'    => $data_index,
            'data_collection' => $data_collection
        ];
        $this->view('client/masterlayout', $data);
    }

    function add(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = $this->ProductModel->findProductById($_POST['id']);

            if (isset($_SESSION['cart'][$product['id']])) {
                unset($_SESSION['cart'][$product['id']]);
                $array = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => (int)$_POST['quantity'] 
                ];
                $cart = $this->cart($array);
                $returnArray = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => (int)$_SESSION['cart'][$product['id']]['quantity']
                ];
                // echo json_encode(array_values($cart));
                $returnData = json_encode($returnArray);
                // echo $cart;
                $json = json_encode([
                    'returnData' => $returnArray,
                    'data'  => array_values($cart)
                ]);
                echo $json;

            }else{
                $array = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => (int)$_POST['quantity'] 
                ];
                $cart = $this->cart($array);
                $returnArray = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => (int)$_SESSION['cart'][$product['id']]['quantity']
                ];
                $returnData = json_encode($returnArray);
                // echo $cart;
                $json = json_encode([
                    'returnData' => $returnArray,
                    'data'  => array_values($cart)
                ]);
                echo $json;
            }
        }
    }
    function deleteproduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = $this->ProductModel->findProductById($_POST['id']);

            if (isset($_SESSION['cart'][$product['id']])) {
                $returnArray = [
                    'id' => $product['id'],
                    'name'      => $product['name'],
                    'slug'      => $product['slug'],
                    'image1'     => $product['image1'],
                    'price'     => $product['price'],
                    'quantity'       => 0
                ];
                if (isset($_SESSION['cart'][$product['id']])) {
                    unset($_SESSION['cart'][$product['id']]);
                }
                $json = json_encode([
                    'returnData' => $returnArray,
                    'data'  => array_values($_SESSION['cart'])
                ]);
                echo $json;
               
            }
             
        }
    }


    
}