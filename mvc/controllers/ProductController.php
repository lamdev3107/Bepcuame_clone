<?php
require_once "./mvc/core/redirect.php";
require_once "./mvc/helper/HelperFunctions.php";
require_once 'GlobalController.php';


class ProductController extends Controller{
    private $ProductModel;
    private $CollectionModel;
    private $PromotionModel;
    private $GlobalController;

    public function __construct(){
        $this->GlobalController        = new GlobalController();
        $this->ProductModel = $this->model('Product');
        $this->CollectionModel = $this->model('Collection');
        $this->PromotionModel = $this->model('Promotion');
    }
 
    public function index($param){
        $data_collection = $this->CollectionModel->getAllCollection();
        $product = $this->ProductModel->findProductBySlug($param);
        $same_collection_products = $this->ProductModel->findSameCollectionProduct($product['id']);
        $all_products = $this->ProductModel->getAllProduct(NULL, 0, 8);
        $data_index = $this->GlobalController->indexCustomers();

       
        
        $data = [
            'page'          => 'products/index',
            'data_index'    => $data_index,
            'data'       => $product,
            'data_collection'     => $data_collection,
            'same_collection_products' => $same_collection_products,
            'all_products' => $all_products
        ];
        $this->view('client/masterlayout',$data);
    }
 
  
   
}

?>