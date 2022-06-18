<?php 

/**
 * 
 */
 
class  Home extends Controller 
{
	  

public function index() {

	$db = new Database();
	//$db->create_tables();

	$res = $db->query("select * from users");

	//show($res);


	$data['title'] = "sdfsdf sdf";
		
	$this -> view('home', $data);


	}


	public function edit() {
		echo "home editing";
	}


	public function delete() {
		echo "home deleting";
	}
 

}

?>