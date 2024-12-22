<?php 
class App{
    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];

    function __construct(){
        $arrayURL = $this->urlProcess();
        //VD: dashboard/order/update/?id=23 => array([0] => 'dashboard', [1] => 'order', [2] => 'update') 
        
        //Controller handle
        if ($arrayURL != NULL) {
            //Dashboard flow
            if($arrayURL[0] == 'dashboard'){
                if (isset($arrayURL[1])){
                    if(file_exists("./mvc/controllers/dashboard/".ucwords($arrayURL[1])."Controller.php")) {
                        $this->controller = ucwords($arrayURL[1])."Controller";
                        require_once "./mvc/controllers/dashboard/".ucwords($arrayURL[1])."Controller.php";
                        if (class_exists($this->controller)) {
                            unset($arrayURL[0]);
                            unset($arrayURL[1]);

                        }
                    }
                }
                else{
                    $new_controller = ucwords($arrayURL[0])."Controller";
                    $this->controller = $new_controller;
                    require_once "./mvc/controllers/dashboard/".$new_controller.".php";
                    if (class_exists($this->controller)) {
                        unset($arrayURL[0]);
                        unset($arrayURL[1]);
                    }
                
                }
                //Khởi tạo lớp controller
                $this->controller = new $this->controller;

                //Method handle
                if (isset($arrayURL[2])) { //Nếu tồn tại method thì gán
                    if (method_exists($this->controller,$arrayURL[2])) {
                        $this->method = $arrayURL[2];
                        unset($arrayURL[2]);
                    }
                }
                else{
                    if (method_exists($this->controller,'index')) {
                        $this->method = 'index';
                    }
                    else{
                        require_once "./mvc/views/client/error-404.php";
                        return;
                    }
                }
            }

            //Client flow
            else{
                if (file_exists("./mvc/controllers/".ucwords($arrayURL[0])."Controller.php")) {
                    $this->controller = ucwords($arrayURL[0])."Controller";
                    require_once "./mvc/controllers/".$this->controller.".php";
                    if (class_exists($this->controller)) {
                        unset($arrayURL[0]);
                    }
                }
                else{
                    $this->controller =  $this->controller."Controller";
                    require_once "./mvc/controllers/".$this->controller.".php";
                }
                $this->controller = new $this->controller;
                 //Method handle
                if (isset($arrayURL[1])) { //Nếu tồn tại method thì gán
                    if (method_exists($this->controller,$arrayURL[1])) {
                        $this->method = $arrayURL[1];
                        unset($arrayURL[1]);
                    }
                }
                else{
                    if (method_exists($this->controller,'index')) {
                        $this->method = 'index';
                    }
                    else{
                        require_once "./mvc/views/client/error-404.php";
                        return;
                    }
                }
            }
         
        }
        else{
            // require_once "./mvc/controllers/".$this->controller.".php";
            require_once "./mvc/views/client/error-404.php";
            return;
        }
        // => Truy cập được vào file
     
        //Param handle
        $this->params = $arrayURL ? array_values($arrayURL) : [];

        //Gọi hàm
        call_user_func_array([$this->controller,$this->method],$this->params);

    }


    function urlProcess(){
        $url = '';
        if (isset($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        }
        else{
            $url = '/';
        }
        return explode("/",filter_var(trim($url,"/")));
        //Trả về associative array các thành phần của URL
    }
}