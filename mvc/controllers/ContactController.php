<?php
require_once "./mvc/core/redirect.php";
require_once 'GlobalController.php';

class ContactController extends Controller{
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
            'page'          => 'contact/index',
            'data_index'    => $data_index,
            'data_collection' => $data_collection
        ];
       $this->view('client/masterlayout', $data);
    }
    
    
}