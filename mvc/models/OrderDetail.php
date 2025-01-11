<?php
require_once("BaseModel.php");
class OrderDetail extends BaseModel{
    private $table = 'order_details';

    public function addOrderDetail($dataArray){
        $insertedData = $this->add($this->table, $dataArray);
        return $insertedData;
    }
    public function getOrderDetailOfOrder($order_id){
        // $data =  $this-> select_array_join_table($this->table, 'products', 'order_details.product_id = products.id', 'LEFT', "*", ['order_id' => $order_id ]);
        $sql = "SELECT * FROM `order_details` as od
            LEFT JOIN `products` as p ON od.product_id = p.id
            WHERE od.order_id = $order_id";
        $query = $this->_query($sql);
        $data = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }
        return $data;

    }
     public function findOrderDetailById($id){
        $query = "select * from $this->table where id =$id";
        return $this->returnOne($this->_query($query));
    }
    public function deleteOrderDetail($id){
        $res = $this->delete($this->table, ['id' => $id]);
        if($res){
            return true;
        }
        return false;
    }

    public function updateOrderDetail($id, $dataArray){
        $res = $this->update($this->table, $dataArray, ['id' => $id]);
        
        if($res){
            return true;
        }
        return false;
    }
    function getAllOrderDetail(){
        return $this->select_array($this->table, "*");
    }
 
    function getUncompletedOrderDetailscount(){
        $query = "SELECT count(id) as count FROM $this->table  WHERE status = 0 ";
        $data = $this->returnOne($this->_query($query));
        return $data;
    }
    function getMonthlyRevenue($month){
        $query = "SELECT SUM(total_price) as count FROM orders WHERE MONTH(created_at) = $month And status = 'completed'";
        $data = $this->returnOne($this->_query($query));
        return $data;
    }
    function getYearlyRevenue($year){
        $query = "SELECT SUM(total_price) as count FROM orders WHERE YEAR(created_at) = $year And status = 'completed'";
        $data = $this->returnOne($this->_query($query));
        return $data;
    }
}