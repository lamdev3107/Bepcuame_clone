<?php
require_once "./mvc/core/redirect.php";
require_once 'GlobalController.php';

class AboutController extends Controller{
    private $ProductModel;
    private $OrderDetailModel;
    private $CollectionModel;
    private $OrderModel;
    private $GlobalController;


    function __construct(){
        $this->ProductModel       = $this->model('Product');
        $this->GlobalController        = new GlobalController();
        $this->CollectionModel = $this->model('Collection');

        // $this->OrderDetailModel   = $this->model('OrderDetail');
        $this->OrderModel         = $this->model('Order');
    }
    function index(){
        $data_collection = $this->CollectionModel->getAllCollection();
        $data_index = $this->GlobalController->indexCustomers();
        $data = [
            'page'          => 'about/index',
            'data_index'    => $data_index,
            'data_collection' => $data_collection
        ];
       $this->view('client/masterlayout', $data);
    }
    // function update(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $product = $this->ProductModel->findProductById($_POST['id']);

    //         if (isset($_SESSION['cart'][$product['id']])) {
    //             $quantity = $_SESSION['cart'][$product['id']]['quantity'];
    //             $array = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => (int)$_POST['quantity'] 
    //             ];
    //             $cart = $this->cart($array);
    //             $returnArray = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => (int)$_SESSION['cart'][$product['id']]['quantity']
    //             ];
    //             // echo json_encode(array_values($cart));
    //             $returnData = json_encode($returnArray);
    //             // echo $cart;
    //             $json = json_encode([
    //                 'returnData' => $returnArray,
    //                 'data'  => array_values($cart)
    //             ]);
    //             echo $json;

    //         }else{
    //             $array = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => (int)$_POST['quantity'] 
    //             ];
    //             $cart = $this->cart($array);
    //             $returnArray = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => (int)$_SESSION['cart'][$product['id']]['quantity']
    //             ];
    //             $returnData = json_encode($returnArray);
    //             // echo $cart;
    //             $json = json_encode([
    //                 'returnData' => $returnArray,
    //                 'data'  => array_values($cart)
    //             ]);
    //             echo $json;
    //         }
    //     }
       
    // }

    // function add(){
    //      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $product = $this->ProductModel->findProductById($_POST['id']);

    //         if (isset($_SESSION['cart'][$product['id']])) {
    //             unset($_SESSION['cart'][$product['id']]);
    //             $array = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => (int)$_POST['quantity'] 
    //             ];
    //             $cart = $this->cart($array);
    //             $returnArray = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => (int)$_SESSION['cart'][$product['id']]['quantity']
    //             ];
    //             // echo json_encode(array_values($cart));
    //             $returnData = json_encode($returnArray);
    //             // echo $cart;
    //             $json = json_encode([
    //                 'returnData' => $returnArray,
    //                 'data'  => array_values($cart)
    //             ]);
    //             echo $json;

    //         }else{
    //             $array = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => (int)$_POST['quantity'] 
    //             ];
    //             $cart = $this->cart($array);
    //             $returnArray = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => (int)$_SESSION['cart'][$product['id']]['quantity']
    //             ];
    //             $returnData = json_encode($returnArray);
    //             // echo $cart;
    //             $json = json_encode([
    //                 'returnData' => $returnArray,
    //                 'data'  => array_values($cart)
    //             ]);
    //             echo $json;
    //         }
    //     }
    // }
    // function deleteproduct(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $product = $this->ProductModel->findProductById($_POST['id']);

    //         if (isset($_SESSION['cart'][$product['id']])) {
    //             $returnArray = [
    //                 'id' => $product['id'],
    //                 'name'      => $product['name'],
    //                 'slug'      => $product['slug'],
    //                 'image1'     => $product['image1'],
    //                 'price'     => $product['price'],
    //                 'quantity'       => 0
    //             ];
    //             if (isset($_SESSION['cart'][$product['id']])) {
    //             // $qty = $_SESSION['cart'][$product['id']]['qty'];
    //                 unset($_SESSION['cart'][$product['id']]);
               
    //             }
    //             $json = json_encode([
    //                 'returnData' => $returnArray,
    //                 'data'  => array_values($_SESSION['cart'])
    //             ]);
    //             echo $json;
               
    //         }
             
    //     }
    // }
    
}