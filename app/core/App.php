<?php


class App
{

    // This is default starting point controller/method/parameters setup
    protected $controller = 'playlist';
    protected $method = 'index';
    protected $params = [];
    protected $controllerFullName = 'PlaylistController';


    // for request like this home/user/Greg/39/April
    // give me home controller action/method user and parameters name age month

    public function __construct() {

        $request = $this->parseRequest();
        print_r($request);


        // Requested Controller (HomeController) $request[0]
        // check if requested controller exists
        if(file_exists('../app/controllers/' . $request[0] . 'Controller.php')) {


            // set controller to passed controller in the $request array
            $this->controllerFullName = $request[0].'Controller';

            // remove controller from parsed $request array
            unset($request[0]);
        } else {
            echo $request[0].'Controller.php  Doesnt exist';
            $location =DOMAIN.'playlist/index';
            header('Location: '.$location);
            exit;
        }

        // and call file controller dynamically e.g. Home
        // '../app/controllers/Home.php';
        require_once '../app/controllers/' . $this->controllerFullName. '.php';
        echo '<br/>current controller is: '.$this->controllerFullName;

        // create new object of class controller e.g. Home
        $this->controller = new $this->controllerFullName();


        // Requested Method (index) $request[1]
        // check if method exists in requested controller class
        if(isset($request[1])) {
            if(method_exists($this->controller, $request[1])) {
                //echo 'method exists';
                $this->method = $request[1];
                unset($request[1]);
            }

        }

        // rebase $url array - only parameters left and they should start from index 0 no 2
        // if the $request has any values (parameters are optional) then do rebase of $request otherwise set empty array

        if($request) {
            $this->params = array_values($request);
        } else {
            $this->params = [];
        }

        call_user_func_array([$this->controller, $this->method], $this->params);


    }

    public function parseRequest() {


        //echo $_SERVER['REQUEST_METHOD'].'<br />';


        if(isset($_GET['request'])) {
            // teg rid off white space and remove '/' from beginning and the end of request
            $request = trim($_GET['request'], '/');

            // make sure is $request and not something else
            $request = filter_var($request, FILTER_SANITIZE_URL);

            // explode by '/' to get contorller|method|parameters
            $request = explode('/', $request);

            return $request;
        }
    }

}