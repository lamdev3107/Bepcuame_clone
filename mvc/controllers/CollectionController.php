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

        if (isset($_POST['priceRanges'])) {
            $this->filter_product($param);
            return;
        }
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
  
    public function filter_product($slug){
        $priceRanges = isset($_POST['priceRanges']) ? $_POST['priceRanges'] : [];
        // Tạo điều kiện WHERE dựa trên khoảng giá
        $conditions = [];
        foreach ($priceRanges as $range) {
            switch ($range) {
                case 'under-100k':
                    $conditions[] = "p.price < 100000";
                    break;
                case '100k-200k':
                    $conditions[] = "p.price BETWEEN 100000 AND 200000";
                    break;
                case '200k-300k':
                    $conditions[] = "p.price BETWEEN 200000 AND 300000";
                    break;
                case '300k-500k':
                    $conditions[] = "p.price BETWEEN 300000 AND 500000";
                    break;
                case '500k-1m':
                    $conditions[] = "p.price BETWEEN 500000 AND 1000000";
                    break;
                case 'above-1m':
                    $conditions[] = "p.price > 1000000";
                    break;
            }
        }

        // Ghép điều kiện thành câu WHERE
        $whereClause = implode(' OR ', $conditions);
        $collection = $this->CollectionModel->findCollectionBySlug($slug, $whereClause);
        $collection_products = $this->CollectionProductModel->filterProductByPrice($collection['id'], $whereClause);

        if($collection_products){
            // Trả về kết quả dưới dạng JSON
            echo json_encode([
                'success' => 'true',
                'data' => $collection_products
            ]);
        } else {
            // Trả về khi không có sản phẩm nào phù hợp
            echo json_encode([
                'success' => 'false',
                'data' => NULL
            ]);
        }
    }

}

?>