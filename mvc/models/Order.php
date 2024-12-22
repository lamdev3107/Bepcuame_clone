<?php
require_once("BaseModel.php");
class Order extends BaseModel{
    private $table = 'orders';

    public function addOrder($dataArray){
        $lastInsertData = $this->add($this->table, $dataArray);
        return $lastInsertData;
    }
    public function findOrder($id){
        $query = "select * from $this->table where id =$id";
        return $this->returnData($this->_query($query));
    }
    public function deleteOrder($id){
        $res = $this->delete($this->table, ['id' => $id]);
        if($res){
            return true;
        }
        return false;
    }

    public function getStatusStatistics(){
        $query = "SELECT COUNT(*) as count, status FROM $this->table GROUP BY status";

        $query = $this->_query($query);
        $statusStatistics = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $orders[] = $row;
            }
        }
        return $orders;
    }
    public function getTotalOrderCount(){
        $query = "SELECT COUNT(*) as total FROM $this->table ";
        $data = $this->returnData($this->_query($query));
        return $data;
    }

    public function getRevenueByMonth(){
        $sql = "SELECT 
                MONTH(date_received) AS month,
                SUM(total_price) AS total_sales
            FROM 
                `orders`
            WHERE 
                YEAR(date_received) = YEAR(CURDATE()) 
                AND MONTH(date_received) <= MONTH(CURDATE())
                AND status = 'completed'
            GROUP BY 
                MONTH(date_received)
            ORDER BY 
                MONTH(date_received);";
        $query = $this->_query($sql);
        $data = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }
        return $data;
        
    }
 
    public function getOrderByStatus($status){
        $sql = "select * from $this->table where status ='$status'";
        $query = $this->_query($sql);
        $orders = array();

        if($query){
            while ($row = mysqli_fetch_assoc($query)) {
                $orders[] = $row;
            }
        }
        return $orders;
    }
    function getAllOrder($whereArray = NULL){
        // print_r($whereArray);
        return $this->select_array($this->table, "*");
    }

    public function updateOrder($id, $dataArray){
        $res = $this->update($this->table, $dataArray, ['id' => $id]);
        
        if($res){
            return true;
        }
        return false;
    }

    function getUncompletedOrderscount(){
        $query = "SELECT count(id) as count FROM $this->table  WHERE status = 'completed' ";
        $data = $this->returnData($this->_query($query));
        return $data;
    }
    function getMonthlyRevenue($month){
        $query = "SELECT SUM(total_price) as count FROM orders WHERE MONTH(created_at) = $month And status = 'completed' ";
        $data = $this->returnData($this->_query($query));
        return $data;
    }
    function getYearlyRevenue($year){
        $query = "SELECT SUM(total_price) as count FROM orders WHERE YEAR(created_at) = $year And status = 'completed' ";
        $data = $this->returnData($this->_query($query));
        return $data;
    }
}