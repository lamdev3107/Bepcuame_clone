<?php
require_once("BaseModel.php");
class CollectionProduct extends BaseModel{
    private $table = 'collection_products';

    public function addCollectionProduct($dataArray){
        $query = $this->add($this->table, $dataArray);
        if($query){ return true;}
        else return false;
    }
    public function findCollectionProduct($id){
        $query = "select * from $this->table where id =$id";
        return $this->returnOne($this->_query($query));
    }
    public function deleteCollectionProduct($dataWhere){
        $res = $this->delete($this->table, $dataWhere);
        if($res){
            return true;
        }
        return false;
    }
 
    function getCollectionProductOfCollection($collection_id, $orderBy="created_at DESC"){
        $sql = "SELECT * FROM $this->table as cp
        LEFT JOIN products AS p ON cp.product_id = p.id
        WHERE cp.collection_id = $collection_id
        ORDER BY $orderBy";
        $query = $this->_query($sql);
        $data = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function filterProductByPrice($collection_id,  $filterWhere){
        $collection_id = (int)$collection_id;
        $sql = "SELECT * FROM $this->table as cp
        LEFT JOIN products AS p ON cp.product_id = p.id
        WHERE cp.collection_id = $collection_id AND ($filterWhere)
        ORDER BY created_at DESC";
        $query = $this->_query($sql);
        $data = NULL;
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }

        return $data;
        // return ['sql' => $sql];
    }

    function getProductIdsOfCollection($collectionId){
        $sql = "SELECT product_id FROM $this->table WHERE collection_id = $collectionId";
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