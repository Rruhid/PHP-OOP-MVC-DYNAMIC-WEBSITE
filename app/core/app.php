<?php



class app {
    protected $controller = '_404';
	protected $method = 'index';

   function __construct(){

    //print_r($_GET);

          $arr = $this->getURL();

        $filename = "../app/controllers/".ucfirst($arr[0]).".php";


          // var_dump ($filename);

       if (file_exists($filename))
       {

           require $filename;
           $this->controller = $arr[0];
           unset($arr[0]);


       }  else {

        require  "../app/controllers/".$this->controller.".php";

       }

       $mycontroller = new $this->controller();

       

       $mymethod = $arr[1] ?? $this->method;   // if method not exists 

           if(!empty($arr[1])){

               if(method_exists($mycontroller, strtolower($mymethod))){

                   $this->method = strtolower($mymethod);
                   unset($arr[1]);

                

               }
           }    

            //show($arr);
         //  var_dump($mycontroller);
           $arr = array_values($arr);
           call_user_func_array([$mycontroller,$this->method], $arr); 
      
 
    
   }

   private function getURL(){

       $url = $_GET['url']  ?? 'home';
       $url = filter_var ($url, FILTER_SANITIZE_URL);
       $arr = explode ('/', $url);
       return $arr;
   }

}

 