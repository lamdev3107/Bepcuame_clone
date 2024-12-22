<?php
require_once "./mvc/core/redirect.php";
require_once "./mvc/helper/HelperFunctions.php";
require_once 'GlobalController.php';


class CollectionController extends Controller{
    private $CollectionModel;
    private $CollectionProductModel;
    private $ProductModel;
    private $GlobalController;

    public function __construct(){
        $this->GlobalController        = new GlobalController();
        $this->CollectionModel = $this->model('Collection');
        $this->CollectionProductModel = $this->model('CollectionProduct');
        $this->ProductModel = $this->model('Product');
    }
 
    public function index($param){
        $data_index = $this->GlobalController->indexCustomers();
        $data_collection = $this->CollectionModel->getAllCollection();
        $collection = $this->CollectionModel->findCollectionBySlug($param);
        $collection_products = $this->CollectionProductModel->getCollectionProductOfCollection($collection['id'], "created_at DESC", 40, 0);
        $all_products = $this->ProductModel->getAllProduct(NULL, 0, 8);
        $reference_products = $this->ProductModel->getAllProduct(NULL, 10, 18);


        $data = [
            'data_index'    => $data_index,
            'page'          => 'collections/index',
            'collection'       => $collection,
            'collection_products' => $collection_products,
            'data_collection'     => $data_collection,
            'all_products' => $all_products,
            'reference_products' => $reference_products,

        ];
        $this->view('client/masterlayout',$data);
    }
 
    public function all(){
        $data_index = $this->GlobalController->indexCustomers();
        $data_collection = $this->CollectionModel->getAllCollection();
        $all_products = $this->ProductModel->getAllProduct(NULL, 0, 50);
        $reference_products = $this->ProductModel->getAllProduct(NULL, 10, 18);

        $data = [
            'data_index'    => $data_index,
            'page'          => 'collections/all',
            'data_collection'       => $data_collection,
            'all_products'     => $all_products,
            'reference_products' => $reference_products
        ];
        $this->view('client/masterlayout',$data);
    }
  
   
}

?>