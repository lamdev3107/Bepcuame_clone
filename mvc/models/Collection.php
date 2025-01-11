<?php
require_once("BaseModel.php");
class Collection extends BaseModel{
    private $table = 'collections';
     function getAllCollection(){
        return $this->select_array($this->table, "*");
    }
    public function addCollection($dataArray){
        $query = $this->add($this->table, $dataArray);
        if($query){ return true;}
        else return false;
    }
    public function findCollection($id){
        $query = "select * from $this->table where id =$id";
        return $this->returnOne($this->_query($query));
    }
    public function findCollectionBySlug($slug){
       
        $query = "select * from $this->table where slug = '$slug' ";
        return $this->returnOne($this->_query($query));
    }
    public function getProductsOfCollection($id, $orderBy='p.created_at DESC',  $limit = 20, $offset=0){
        // $products = $this->select_array('products', '*', ['collection_id' => $id]);
        $sql = "SELECT p.id, p.name, p.slug, p.price, p.stock, p.image1, cp.product_id, cp.collection_id
        FROM products as p
        LEFT JOIN collection_products as cp
        ON p.id = cp.product_id
        WHERE cp.collection_id = $id
        ORDER BY $orderBy
        ";
        // LIMIT $limit, $offset
        $query = $this->_query($sql);
        $products = array();

        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $products[] = $row;
            }
        }

        return $products;
    }
    public function deleteCollection($id){
        $res = $this->delete($this->table, ['id' => $id]);
        if($res){
            return true;
        }
        return false;
    }
     public function updateCollection($id, $dataArray){
        $res = $this->update($this->table, $dataArray, ['id' => $id]);
        if($res){
            return true;
        }
        return false;
    }
    function getCollectionDetails($id){
        $query = $this->select_row($this->table,'*', ['id' =>  $id]);
        return $this->returnOne($query);
    }
     function getCollectionsLimit($a, $b){

        $data = array();
        $data = $this->select_array($this->table, '*', NULL ,  'created_at', $a, $b);
      
        return $data;
    }
    function getCollectionsCount(){
        $query = "SELECT count(id) as count FROM collections ";
        $data = $this->returnOne($this->_query($query));
        return $data;
    }

    function findProductByName($name, $collection_id, $listProductId){
        $collection_id = (int)$collection_id;
        $not_in_convert = 'NULL';
        if(count($listProductId) > 0){
            $not_in_convert = implode(',', $listProductId);
        }
        
        $sql = "SELECT DISTINCT p.id, p.name, p.slug, p.price, p.stock, p.image1, cp.product_id, cp.collection_id FROM products as p LEFT JOIN collection_products as cp ON p.id = cp.product_id WHERE p.name LIKE '%$name%' AND (cp.collection_id != $collection_id  OR ISNULL(cp.collection_id)) AND (cp.product_id NOT IN ($not_in_convert) OR ISNULL(cp.product_id))";
        $query = $this->_query($sql);
        $data = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }

        return $data;
    }
}