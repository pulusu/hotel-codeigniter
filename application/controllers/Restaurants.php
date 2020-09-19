<?php
/* 
 * Generated by Ravikumar Pulusu 
 * www.tayatech.com
 */
 
class Restaurants extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Restaurant');
		$this->load->library('cart');
    }

 
	public function index()
	{		
	 if(!empty($_GET['city'])){
		$cat='';
		$city=$_GET['city'];
		$data['restaurants'] = $this->Restaurant->getShopRows_search($city,$cat);
		$data['restaurantscls'] = $this->Restaurant->getShopRows_searchclose($city,$cat);
		}else{
		$data['restaurants'] = $this->Restaurant->getShopRowswebuser();
		$data['restaurantscls'] = $this->Restaurant->getShopRowsclose();
		
	}
		 $data['mostpopular'] = $this->Restaurant->getmostpopularrest();
		 $data['csns'] = $this->Restaurant->getCuisinesRows();
		 $this->load->view('web/restaurants-web',$data);
	}
	public function Search($city ="",$cat=""){
	
	 $data['restaurants'] = $this->Restaurant->getShopRows_search($city,$cat);
	 $data['restaurantscls'] = $this->Restaurant->getShopRows_searchclose($city,$cat);
	 $data['mostpopular'] = $this->Restaurant->getmostpopularrest();
	 $data['csns'] = $this->Restaurant->getCuisinesRows();
	 $this->load->view('web/restaurants-web',$data);
			
	}
	function Gettimings($id){
	return $data['timings'] = $this->Restaurant->getShopRowsweb($id);

	}
	function Cuisine_name($id){
	$dataaa = $this->Restaurant->getCuisinesRows($id);	
	echo $dataaa['name']; //exit;
	}
	function getr_favrets($rid){
		$uid = $this->session->userdata('customer_id');
		$wwww = $this->Restaurant->get_favourite($rid,$uid);
		return $wwww['status']; //exit;
	}
	

}