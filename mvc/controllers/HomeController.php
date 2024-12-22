<?php
require_once 'GlobalController.php';

class HomeController extends Controller{
    private $ProductModel;
    private $CollectionModel;
    private $CollectionProductModel;
    private $BannerModel;
    private $GlobalController;
    public function __construct(){
        $this->GlobalController        = new GlobalController();

        $this->ProductModel  = $this->model('Product');
        $this->CollectionModel = $this->model('Collection');
        $this->CollectionProductModel = $this->model('CollectionProduct');
        $this->BannerModel = $this->model('Banner');
    }
    
    function index(){
        $data_index = $this->GlobalController->indexCustomers();

        $data_collection = $this->CollectionModel->getAllCollection();
        
        $cakho_collection = $this -> CollectionModel->getProductsOfCollection(10, 'p.created_at DESC', 10,0);
        $popular_collection = $this-> ProductModel->getAllProduct("created_at DESC", 0, 10);
        $nem_collection = $this -> CollectionModel -> getProductsOfCollection(13, 'p.created_at DESC', 8, 0);
        $mon_man_collection = $this-> CollectionModel -> getProductsOfCollection(8, "p.created_at DESC", 10, 0);
        $doanvat_collection = $this-> CollectionModel -> getProductsOfCollection(14, "p.created_at DESC", 10, 0);
        $gia_vi_collection = $this-> CollectionModel -> getProductsOfCollection(15, "p.created_at DESC", 10, 0);
        $trai_cay_collection = $this-> CollectionModel -> getProductsOfCollection(16, "p.created_at DESC", 10, 0);
        $banners = $this-> BannerModel->getAllBanner();

        $data = [
            'page'          => 'home/index',
            'data_index'    => $data_index,
            'data_collection'     => $data_collection,
            'cakho_collection' => $cakho_collection,
            'popular_collection' => $popular_collection,
            'nem_collection' => $nem_collection,
            'gia_vi_collection' => $gia_vi_collection,
            'mon_man_collection' => $mon_man_collection,
            'trai_cay_collection' => $trai_cay_collection,
            'doanvat_collection' => $doanvat_collection,
            'banners' => $banners,
        ];
       $this->view('client/masterlayout',$data);
    }
    function switch_collection(){
        $collection_id = $_POST['id'];
        $products = $this-> CollectionModel -> getProductsOfCollection($collection_id, "p.created_at DESC", 10, 0);
        echo json_encode($products);
    }

    function search_product(){
        $name = $_POST['query'];
        $products = $this-> ProductModel -> findProductByName($name);
        echo json_encode($products);
    }
}