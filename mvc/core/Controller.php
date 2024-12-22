<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        foreach($data as $key => $value){
            $$key = $value;
        }
        //['key' => $value] => $key = $value;
        require_once "./mvc/views/".$view.".php";
    }

    function cart($array){
        $array_cart = [];
        if (isset($_SESSION['cart']))
        {
            if (array_key_exists($array['id'],$_SESSION['cart']))
            {
                 $_SESSION['cart'][$array['id']]['quantity'] += $array['quantity'];
            }
            else
            {
                 $_SESSION['cart'][$array['id']] = $array;
                 $_SESSION['cart'][$array['id']]['quantity'] = $array['quantity'];
            }
        }
        else
        {
             $_SESSION['cart'][$array['id']] = $array;
             $_SESSION['cart'][$array['id']]['quantity'] = $array['quantity'];
        }
        $array_cart = $_SESSION['cart'];
        if($_SESSION['cart'][$array['id']]['quantity']  <= 0){
            unset($_SESSION['cart'][$array['id']]);
            return;
        }
        return $array_cart; 
    }

}
?>