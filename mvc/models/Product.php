<?php
require_once("BaseModel.php");
class Product extends BaseModel{
    private $table = 'products';


    function getProductDetails($id){
        $query = "select * from $this->table where id =$id";
        return $this->returnData($this->_query($query));
    }
     function getProductsLimit($a, $b){
        $data = array();
        $data = $this->select_array($this->table, '*', NULL ,  'created_at', $a, $b);

        return $data;
    }
    function getProductsCount(){
        $query = "SELECT count(id) as count FROM products";
        $data = $this->returnData($this->_query($query));
        return $data;
    }
    public function updateProduct($id, $dataArray){
        $res = $this->update($this->table, $dataArray, ['id' => $id]);
        if($res){
            return true;
        }
        return false;
    }

    public function addProduct($dataArray){
        $query = $this->add($this->table, $dataArray);
        if($query){ return true;}
        else return false;
    }
    public function findProductBySlug($slug){
        $query = "select * from $this->table where slug = '$slug'";
        return $this->returnData($this->_query($query));
    }
    public function findProductById($id){
        $query = "select * from $this->table where id =$id";
        return $this->returnData($this->_query($query));
    }
    public function deleteProduct($id){
        $res = $this->delete($this->table, ['id' => $id]);
        if($res){
            return true;
        }
        return false;
    }
    public function getAllProduct( $orderby = NULL, $start=NULL, $limit=NULL){
        // $query = "select * from $this->table ORDER BY $orderby DESC ";
        $data = $this->select_array($this->table, '*', NULL, $orderby, $start, $limit);
        return $data;
    }

    function findProductByName($name){
        $sql = "SELECT id, name, slug, price, stock, image1  FROM products 
        WHERE name LIKE '%$name%' ";
        $query = $this->_query($sql);
        $data = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function findSameCollectionProduct($product_id){
        //Find list of product's collections
        $product_id = (int)$product_id;
        $sql1 = "SELECT DISTINCT `collection_id` FROM `collection_products` 
        WHERE `product_id` = 20";
        $query = $this->_query($sql1);
        $res1 = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $res1[] = $row;
            }
        }
        $whereInCollections = array();
        foreach(array_values($res1) as $item){
            $whereInCollections[] = (int)$item['collection_id'];
        }
        $whereInCollections = implode(', ', $whereInCollections);

        //Find list products having same collection
        $sql = "SELECT DISTINCT p.id, p.name, p.slug, p.price, p.image1, p.stock, cp.collection_id FROM `products` as p
        LEFT JOIN `collection_products` as cp ON cp.product_id = p.id
        WHERE  cp.collection_id IN ($whereInCollections) ";
        $query = $this->_query($sql);
        $res2 = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $res2[] = $row;
            }
        }


        return $res2;
    }
}