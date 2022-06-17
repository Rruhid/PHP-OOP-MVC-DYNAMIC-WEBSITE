<?php
 

function show ($stuff){   // function just for checking parameters  


	echo "<pre>";
	
	print_r ($stuff);
	echo "</pre>";
	

}


 class app {

 	protected $controller = '_404';
 	protected $method = 'index';

    function __construct(){

    	   $arr = $this->getURL();

    	 $filename = "../app/controllers/".ucfirst($arr[0]).".php";

 
           // var_dump ($filename);

    	if (file_exists($filename))
    	{

    		require $filename;
    		$this->controller = $arr[0];
    		unset($arr[0]);


    	} else {

    	 require  "../app/controllers/".$this->controller.".php";

    	}

		$mycontroller = new $this->controller();

		//var_dump($mycontroller);

		$mymethod = $arr[1] ?? $this->method;   // if method not exists 

			if(!empty($arr[1])){

				if(method_exists($mycontroller, strtolower($mymethod))){

					$this->method = strtolower($mymethod);
					unset($arr[1]);

					call_user_func_array([$mycontroller, $this->method], $arr);

				}
			}
				
			$arr=array_values($arr);
				show($arr);

     
    }

    private function getURL(){

    	$url = $_GET['url']  ?? 'home';
    	$url = filter_var ($url, FILTER_SANITIZE_URL);
    	$arr = explode ('/', $url);
    	return $arr;
    }

 }

 $app = new App();

 