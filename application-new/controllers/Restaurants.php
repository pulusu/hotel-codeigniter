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
		 $data['restaurants'] = $this->Restaurant->getShopRows();
		 $data['csns'] = $this->Restaurant->getCuisinesRows();
		 $this->load->view('web/restaurants-web',$data);
	}
	public function view($shop = "7")
	{
		echo $shop; exit;
		 $update = $this->Restaurant->getShopRows($id);
		
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
