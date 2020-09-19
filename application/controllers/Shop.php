<?php
/* 
 * Generated by Ravikumar pulusu 
 *
 */
 
class Shop extends CI_Controller{
    function __construct()
    {
        parent::__construct();
		if($this->session->userdata('Shopid')== null ){ redirect('Shop_login');}
        $this->load->model('Restaurant');
		$this->load->library('session');

		
    }
	function Paymentinfo($id=""){
		
		$data['orders_details'] = $this->Restaurant->getOrders($id);
		$this->load->view('shop/paymentsinfo-shop',$data);
	}
	function Paymentsinfoday($id=""){
		$data['orders_details'] = $this->Restaurant->getOrdersbydayshops($id);
		$this->load->view('Shop/paymentsinfoday-shop',$data);
	}
	function location(){
		$this->load->view('location');		
	}	
	function UploadImage(){
				$config['upload_path'] = 'uploads/images';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = time().$_FILES['avatar']['name']; 
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('avatar')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                   echo $picture = 'not upload'; exit; 
                }
				return $picture;

	}
	function index(){
		redirect('Shop/dashboard');
    }
    function OrderStatus(){
			$orderid = $this->input->post('orderid');
			$userData = array(
                'rid_status' => strip_tags($this->input->post('status')),               
            );
	
	$update = $this->Restaurant->UpdateOrderstatus($userData,$orderid);
		redirect('Shop/dashboard');
	}
	
    function dashboard(){
		
	if(!empty($_POST)){
	$usn = $this->input->post('email');
	$pwd = $this->input->post('password');
	$query = $this->Restaurant->Shop_login($usn,$pwd);
	$shop_id = $query['id'];
	$shop_name = $query['name'];
	$sess_array = array('id' => $query['id'],'shopname' => $query['name'],'email'=> $query['email']);
	$this->session->set_userdata('Shopid', $shop_id);
	$this->session->set_userdata('Shopname', $shop_name);
	$session_shop = $this->session->userdata['Shopid']; // exit;
	}
	if($this->session->userdata('Shopid')== null ){ redirect('Shop_login');}
	$shpid = $this->session->userdata('Shopid');
	$data['orders'] = $this->Restaurant->getOrders_shop($shpid);
	$data['orders_today'] = $this->Restaurant->getOrderstoday($shpid);
	$data['orders_month'] = $this->Restaurant->getOrdersbymonth($shpid);
	$this->load->view('Shop/shop-dashboard',$data);
	}
	function Forgotpassword(){
		 $mail = $this->input->post('email'); 
		$dataa = $this->Restaurant->getShopRowsbyemail($mail);
		if($dataa){
			$otpn = mt_rand(100000, 999999);
		$dataa = array(
				'phone' => $this->input->post('email'),
				'otp_code' => $otpn,
				);
		$message="Storkks OTP: ".$otpn;		
        $otp_id = $this->Restaurant->Insert_Otp($dataa);	
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
		$this->email->set_header('Content-type', 'text/html'); //must add this line

		$this->email->from('storkks2018@gmail.com', 'Storkks');
		$this->email->to($mail);
		$this->email->subject("Forgot Password For Storkks");
		$this->email->message($message);
		$emailll = $this->email->send();
		$data['msg']="1";
		}else{
		$data['msg']="2";
		}
		echo json_encode($data);
	}
	function VerifyOTP(){
		$mobile = $this->input->post('email');
		$otp = $this->input->post('otp');
        $otp_id = $this->Restaurant->VerifyOTP($mobile,$otp); //exit
		if($otp_id['id']){
				$uid = $otp_id['id'];
				$data = array('verified' => 1,);
				$userupdate = $this->Restaurant->Update_otp_status($data,$uid);
			$data['msg'] = "1";
		}else{
			$data['msg'] = "2";
		}
	echo json_encode($data);
		
	}
	function ChangePassword(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$dataa = array('password' => md5($password),);
		 $updateee = $this->Restaurant->UpdateShopPassword($dataa,$email); 
		if($updateee){
			$data['msg'] = "1";
		}else{
			$data['msg'] = "2";
		}
		echo json_encode($data);
	}
	function ChangePasswordbyid(){
		$id = $this->input->post('shopid');
		$password = $this->input->post('password');
		$dataa = array('password' => md5($password),);
		 $updateee = $this->Restaurant->UpdateShopPasswordbyid($dataa,$id); 
		if($updateee){
			$data['msg'] = "1";
		}else{
			$data['msg'] = "2";
		}
		echo json_encode($data);
	}
	function ChangePwd(){
		if(!empty($_POST)){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$dataa = array('password' => md5($password),);
		 $updateee = $this->Restaurant->UpdateShopPassword($dataa,$email); 
		if($updateee){
			$data['msg'] = "1";
		}else{
			$data['msg'] = "2";
		}
		echo json_encode($data);
		}
		$this->load->view('Shop/shop-changepassword');
	}
	function getShops($id){
	return $data['shops'] = $this->Restaurant->getShopRows($id);
	}
	function getAddress_byid($id){
		return $data['address'] = $this->Restaurant->get_address($id);
	}
	function getcustomer($id){
		return $data['people'] = $this->Restaurant->getusers($id);
	}
	function Dispatcher(){
		if($this->session->userdata['Shopid']== null ){ redirect('Shop_login');}	
		$this->load->view('shop/Shop-dashboard');
	}
	function Register(){
	
	if(!empty($_POST)){
		//	echo '<pre>'; print_r($_POST); echo '</pre>'; exit;
				$userData = array(
                'name' => strip_tags($this->input->post('name')),
               //'Cuisine' => implode(",",$_POST['cuisine_id']),
                'phone' => strip_tags($this->input->post('phone')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'resturant_opens' => $this->input->post('hours_opening'),
                'resturant_close' => $this->input->post('hours_closing'),
               // 'shop_logo' => $picture,
               //'pure_veg' =>  strip_tags($this->input->post('pure_veg')),
               // 'min_amount' =>  strip_tags($this->input->post('offer_min_amount')),
               // 'offer_percentage' =>  strip_tags($this->input->post('offer_percent')),
               //  'estimated_delivery_time' =>  strip_tags($this->input->post('estimated_delivery_time')),
                'description' =>  strip_tags($this->input->post('description')),
                'address' =>  strip_tags($this->input->post('address')),
                'latitude' =>  strip_tags($this->input->post('latitude')),
                'longitude' =>  strip_tags($this->input->post('longitude')),
                'status' =>  strip_tags($this->input->post('status'))
               // 'everyday' =>  strip_tags($this->input->post('everyday')),
            
            );
		 $insert = $this->Restaurant->insert($userData);
		if($insert){
			//	echo "Thanks for register will get back to you soon";
				redirect('Shop');

			}
	}
		$this->load->view('shop/shop-signup');
	}	
	function Addcategory(){
	if(!empty($_POST)){
	if(!empty($_FILES['avatar']['name'])){
		$picture = $this->UploadImage(); //exit;
		}else{
			$picture = 	$this->input->post('avatarimage');
		}
		$pos = $this->input->post('position');
		$userData = array(
                'cat_name' => strip_tags($this->input->post('name')),
                'cat_description' => strip_tags($this->input->post('description')),
			    'restaurant_id' => strip_tags($this->input->post('shop_id')),
			    'cat_opens' => strip_tags($this->input->post('cat_opens')),
			    'cat_close' => strip_tags($this->input->post('cat_close')),
                'status' => strip_tags($this->input->post('status')),
                'cat_order' => strip_tags($this->input->post('position')),
              //  'cat_image' =>$picture
                );
		$insert = $this->Restaurant->InsertCategory($userData);
		if($insert){
			$sessid = $this->session->userdata['Shopid']; 
			$getall = $this->Restaurant->getCategory_up($insert,$pos);
			$ic =$pos;
			foreach($getall as $p ){
				$icc = $ic+1;
				$catData= array(                
				'cat_order' => $icc,
            );
			$cidd = $p['id'];
			$updatsse = $this->Restaurant->UpdateCategoryinc($catData,$cidd);
			$ic++;
			}
			$this->session->set_flashdata('msg','Succussfully  Category  Created'); 
			redirect('Shop/Category');
			}else{
			$this->session->set_flashdata('msg','Failed Category  Created');
			redirect('Shop/Category');
			}
	}
	$this->load->view('shop/add-categorie');
	}
	function Category(){
		
	if($this->session->userdata['Shopid']== null ){ redirect('Shop_login');}	
	$data['category'] = $this->Restaurant->getCategory();	
	$this->load->view('shop/list-categories',$data);
	}
	function Categoryname($id){
	$catname = $this->Restaurant->getCategoryname($id);
	echo $catname; //exit;
	}
	function EditCategory($id){
	$data['category'] = $this->Restaurant->getCategory($id);		
	if(!empty($_POST)){
	//	echo '<pre>'; print_r($_POST); echo '</pre>';	 exit;
	if(!empty($_FILES['avatar']['name'])){
				$picture = $this->UploadImage();
			}else{
				$picture = strip_tags($this->input->post('avatarimage'));
			}
			$pos = $this->input->post('position');
	$userData = array(
                'cat_name' => strip_tags($this->input->post('name')),
                'cat_description' => strip_tags($this->input->post('description')),
                'status' => strip_tags($this->input->post('status')),
                'cat_opens' => strip_tags($this->input->post('cat_opens')),
                'cat_close' => strip_tags($this->input->post('cat_close')),
				'cat_order' => strip_tags($this->input->post('position')),
                'cat_image' =>$picture
            );
		//	print_r($userData); exit;
	$update = $this->Restaurant->UpdateCategory($userData,$id);
		if($update){
			$sessid = $this->session->userdata['Shopid']; 
			$getall = $this->Restaurant->getCategory_up($id,$pos);
			//print_r($getall); exit;

			$ic =$pos;
			foreach($getall as $p ){
				$icc = $ic+1;
				$catData= array(                
				'cat_order' => $icc,
            );
			$cidd = $p['id'];
			$updatsse = $this->Restaurant->UpdateCategoryinc($catData,$cidd);
			$ic++;
			}
			//exit;
		//	print_r($getall); exit;
			$this->session->set_flashdata('msg','Succussfully  Category Updated'); 
			redirect('Shop/Category');
		}else{
			$this->session->set_flashdata('msg','Failed Category Updated'); 
			redirect('Shop/Category');
		}
	}
	$this->load->view('shop/add-categorie',$data);
	}
	function Categorydelete($id){
		$efected = $this->Restaurant->Catdelete($id);
		if($efected){
			 $this->session->set_flashdata('catdelete','Succussfully  Category deleted'); 
		}
		redirect('shop/Category');
	}
	function Addonscat(){
		$data['addons'] = $this->Restaurant->getAddonscat();	
		$this->load->view('shop/list-addons-cat',$data);
	}
	function AddAddonscat(){
	if(!empty($_POST)){
	
	$userData = array(
                'restaurant_id' => strip_tags($this->input->post('shop_id')),
                'restaurant_name' => strip_tags($this->input->post('shop_name')),
                'addon_cat_name' => strip_tags($this->input->post('name')),
                'status' => strip_tags($this->input->post('status'))
            );
	$Insert = $this->Restaurant->InsertAddonscat($userData);
	if($Insert){
		$this->session->set_flashdata('addondelete','Succussfully  Addon Category Created'); 
		redirect('Shop/Addonscat');
			}else{
		$this->session->set_flashdata('addondelete','Failed Create');
		redirect('Shop/Addonscat');
	 }
	}
		$this->load->view('shop/add-addons-category');
	}
	function EditAddoncat($id){
	$data['addons'] = $this->Restaurant->getAddonscat($id);		

	if(!empty($_POST)){
	$userData = array(
                'addon_cat_name' => strip_tags($this->input->post('name')),
                'status' => strip_tags($this->input->post('status'))
            );
	$update = $this->Restaurant->UpdateAddonscat($userData,$id);
	if($update){
		$this->session->set_flashdata('addondelete','Succussfully  Addon Updated'); 
		redirect('Shop/Addonscat');
	}else{
		$this->session->set_flashdata('addondelete','Failed  Addon Updated'); 
		//echo "failed Create"; exit;		
	 }
	}
		$this->load->view('shop/add-addons-category',$data);		
	}
	function CatAddondelete($id){
		$efected = $this->Restaurant->catAddondelete($id);
		if($efected){
		 $this->session->set_flashdata('addondelete','Succussfully  Addon deleted'); 
		}
		redirect('shop/Addonscat');
	}	
	function Addons(){
		$data['addons'] = $this->Restaurant->getAddons();	
		$this->load->view('shop/list-addons',$data);
	}
	function Addondelete($id){
		$efected = $this->Restaurant->Addondelete($id);
		if($efected){
		 $this->session->set_flashdata('addondelete','Succussfully  Addon deleted'); 
		}
		redirect('shop/Addons');
	}
	function EditAddon($id){
	$data['addons'] = $this->Restaurant->getAddons($id);		

	if(!empty($_POST)){
	$userData = array(
                'addon_name' => strip_tags($this->input->post('name')),
                'cat_addon' => strip_tags($this->input->post('cat_addon')),
                'price' => strip_tags($this->input->post('price')),
                'status' => strip_tags($this->input->post('status'))
            );
	$update = $this->Restaurant->UpdateAddons($userData,$id);
	if($update){
		$this->session->set_flashdata('addondelete','Succussfully  Addon Updated'); 
		redirect('Shop/Addons');
	}else{
		$this->session->set_flashdata('addondelete','Failed  Addon Updated'); 
		//echo "failed Create"; exit;		
	 }
	}
		$data['addonscat'] = $this->Restaurant->getAddonscat();
		$this->load->view('shop/add-addons',$data);		
	}

	function AddAddons(){
	if(!empty($_POST)){
	
	$userData = array(
                'restaurant_id' => strip_tags($this->input->post('shop_id')),
                'restaurant_name' => strip_tags($this->input->post('shop_name')),
                'addon_name' => strip_tags($this->input->post('name')),
                'price' => strip_tags($this->input->post('price')),
                'cat_addon' => strip_tags($this->input->post('cat_addon')),
                'status' => strip_tags($this->input->post('status'))
            );
	$Insert = $this->Restaurant->InsertAddons($userData);
	if($Insert){
		$this->session->set_flashdata('addondelete','Succussfully  Addon Created'); 
		redirect('Shop/Addons');
			}else{
		$this->session->set_flashdata('addondelete','Failed Create');
		redirect('Shop/Addons');
	 }
	}	$data['addonscat'] = $this->Restaurant->getAddonscat();
		$this->load->view('shop/add-addons',$data);
	}
	function Products(){
	if($this->session->userdata['Shopid']== null ){ redirect('Shop_login');}		
		$data['products'] = $this->Restaurant->getproducts();	
		$this->load->view('shop/list-products',$data);
	}
	function Productdelete($id){
	if($this->session->userdata['Shopid']== null ){ redirect('Shop_login');}
		$data['products'] = $this->Restaurant->Product_delete($id);	
		redirect('Shop/Products');
		
	}
	function EditProduct($id){
				if($this->session->userdata['Shopid']== null ){ redirect('Shop_login');}		
					$data['products'] = $this->Restaurant->getproducts($id);	
				if(!empty($_POST)){
				if(!empty($_FILES['avatar']['name'])){
				$picture = $this->UploadImage();	
				}else{
					$picture = strip_tags($this->input->post('avatarimage'));
				}
	if(!empty($_POST['addons'])){
	$adns=implode(",",$_POST['addons']);
	$adprice = '';
		 $cats = explode(",", $adns);
		$result = '';
		foreach($cats as $cat) {
		$idd = trim($cat);
		$cus = $this->Restaurant->getAddons($idd);
		$result[].= $cus['cat_addon'];
		}
		$aaaa=array_unique($result);
		$adoncat = implode(",",$aaaa);

	
	}else{
	$adns="";	
	$adprice="";
	}
	$price = $this->input->post('price');
	$taxpercentage = $this->input->post('tax');
	$tax = ($taxpercentage / 100) * $price;
	$taxwithprice = $price + $tax;	
				$userData = array(
							'product_name' => strip_tags($this->input->post('name')),
							'description' => strip_tags($this->input->post('description')),
							'category' => strip_tags($this->input->post('category')),
							'status' => strip_tags($this->input->post('status')),
							'product_Order' => strip_tags($this->input->post('product_position')),
							'is_featured' => strip_tags($this->input->post('featured')),
							'featured_position' => strip_tags($this->input->post('featured_position')),
							//'discount' => strip_tags($this->input->post('discount')),
							//'discount_type' => strip_tags($this->input->post('discount_type')),
							 'pure_veg' => strip_tags($this->input->post('pure_veg')),
							'price' => $taxwithprice,
							'tax' => $taxpercentage,
							'productprice' => $price,
							'addons' =>$adns,
							'addons_cat' =>$adoncat,
							'product_image' =>$picture,
							'featured_image' =>$picture
						);
				 $update = $this->Restaurant->updateProduct($userData,$id); 
				
				if($update){
				$this->session->set_flashdata('msg','Succussfully Product Updated'); 
				redirect('Shop/Products');
				}else{
			$this->session->set_flashdata('msg','Failed Product Updated'); 
			redirect('Shop/Products');			 }
				}
					$data['addons'] = $this->Restaurant->getAddons();	
					$data['category'] = $this->Restaurant->getCategory();
					$this->load->view('shop/add-product',$data);
	}
	function AddProducts(){
	if($this->session->userdata['Shopid']== null ){ redirect('Shop_login');}		
	if(!empty($_POST)){
	
	if(!empty($_FILES['avatar']['name'])){
	$picture = $this->UploadImage();	
	}
	if(!empty($_FILES['avatar']['name'])){
	$picture = $this->UploadImage();	
	}
	$rshopid =$this->session->userdata['Shopid'];
	$rshopname =$this->session->userdata['Shopname'];
	if(!empty($_POST['addons'])){
	$adns=implode(",",$_POST['addons']);
	$adprice = '';
	 $cats = explode(",", $adns);
		$result = '';
		foreach($cats as $cat) {
		$id = trim($cat);
		$cus = $this->Restaurant->getAddons($id);
		$result[].= $cus['cat_addon'];
		}
		$aaaa=array_unique($result);
		$adoncat = implode(",",$aaaa);
		
	
	}else{
	$adns="";	
	$adoncat="";
	}
	$price = $this->input->post('price');
	$taxpercentage = $this->input->post('tax');
	$tax = ($taxpercentage / 100) * $price;
	$taxwithprice = $price + $tax;
	$userData = array(
                'restaurant_id' => $rshopid,
                'restaurant_name' => $rshopname,
                'product_name' => strip_tags($this->input->post('name')),
                'description' => strip_tags($this->input->post('description')),
                'category' => strip_tags($this->input->post('category')),
                'status' => strip_tags($this->input->post('status')),
                'pure_veg' => strip_tags($this->input->post('pure_veg')),
                'm_product_opens' => strip_tags($this->input->post('m_product_opens')),
                'm_product_close' => strip_tags($this->input->post('m_product_close')),
                'e_product_opens' => strip_tags($this->input->post('e_product_opens')),
                'e_product_close' => strip_tags($this->input->post('e_product_close')),
                'price' => $taxwithprice,
                'tax' => $taxpercentage,
                'productprice' => $price,
                'addons' =>$adns,
                'addons_cat' =>$adoncat,
                'product_image' =>$picture,
                'featured_image' =>$picture
            );
	$Insert = $this->Restaurant->InsertProduct($userData);
	if($Insert){
		$this->session->set_flashdata('msg','Succussfully Product Created'); 
		redirect('Shop/Products');
	}else{
		$this->session->set_flashdata('msg','Failed Product Created'); 
		redirect('Shop/Products');
		 }
	}
		$data['addons'] = $this->Restaurant->getAddons();	
		$data['category'] = $this->Restaurant->getCategory();
		$this->load->view('shop/add-product',$data);
	}	
	function Profile(){
		$shopid =	$this->session->userdata['Shopid']; 
		$data['time'] = $this->Restaurant->getShoptimings($shopid);
		$data['profile'] = $this->Restaurant->getShopRows($shopid);	
	if(!empty($_POST)){
	//echo '<pre>'; print_r($_POST); echo '</pre>'; exit;	
	if(!empty($_FILES['avatar']['name'])){
				$picture = $this->UploadImage();
						}else{
						$picture =	strip_tags($this->input->post('shoplg'));
						}
	if(!empty($_POST['cuisine_id'])){
		$cui_id =implode(",",$_POST['cuisine_id']);
	}else{
		$cui_id = "";
	}					
				$userData = array(
                'name' => strip_tags($this->input->post('name')),
             //   'Cuisine' => $cui_id,
                'phone' => strip_tags($this->input->post('phone')),
                'email' => strip_tags($this->input->post('email')),
               // 'password' => md5($this->input->post('password')),
                'm_resturant_opens' => $_POST['m_hours_opening'],
                'm_resturant_close' => $_POST['m_hours_closing'],
                'e_resturant_opens' => $_POST['e_hours_opening'],
                'e_resturant_close' => $_POST['e_hours_closing'],
            //    'pure_veg' =>  strip_tags($this->input->post('pure_veg')),
                'shop_logo' =>  $picture,
                'min_amount' =>  strip_tags($this->input->post('delivery_min_amount')),
				'min_amount_offer' =>  strip_tags($this->input->post('offer_min_amount')),
                'discount' =>  strip_tags($this->input->post('discount')),
                'offer_percentage' =>  strip_tags($this->input->post('offer_percent')),
                'estimated_delivery_time' =>  strip_tags($this->input->post('estimated_delivery_time')),
                'description' =>  strip_tags($this->input->post('description')),
                'address' =>  strip_tags($this->input->post('address')),
                'latitude' =>  strip_tags($this->input->post('latitude')),
                'longitude' =>  strip_tags($this->input->post('longitude')),
             //   'status' =>  strip_tags($this->input->post('status')),
                'everyday' =>  strip_tags($this->input->post('day'))         
            );

		 $update = $this->Restaurant->updateShop($userData,$shopid);
		 $timingsdata = array(
               // 'rid' => $insert,
                'm_morning_open' => $_POST['m-hours_opening']['MON'],
                'm_morning_close' => $_POST['m-hours_closing']['MON'],
                'm_evening_open' => $_POST['e-hours_opening']['MON'],
                'm_evening_close' => $_POST['e-hours_closing']['MON'],
                't_morning_open' => $_POST['m-hours_opening']['TUE'],
                't_morning_close' => $_POST['m-hours_closing']['TUE'],
                't_evening_open' => $_POST['e-hours_opening']['TUE'],
                't_evening_close' => $_POST['e-hours_closing']['TUE'],
                'w_morning_open' =>  $_POST['m-hours_opening']['WED'],
                'w_morning_close' => $_POST['m-hours_closing']['WED'],
                'w_evening_open' =>  $_POST['e-hours_opening']['WED'],
                'w_eveningclose' =>  $_POST['e-hours_closing']['WED'],
                'th_morning_open' =>  $_POST['m-hours_opening']['THU'],
                'th_morning_close' =>  $_POST['m-hours_closing']['THU'],
                'th_evening_open' =>  $_POST['e-hours_opening']['THU'],
                'th_evening_close' =>  $_POST['e-hours_closing']['THU'],
                'f_morning_open' =>  $_POST['m-hours_opening']['FRI'],
                'f_morning_close' =>  $_POST['m-hours_closing']['FRI'],
                'f_evening_open' =>  $_POST['e-hours_opening']['FRI'],
                'f_evening_close' =>  $_POST['e-hours_closing']['FRI'],
				's_morning_open' =>  $_POST['m-hours_opening']['SAT'],
                's_morning_close' =>  $_POST['m-hours_closing']['SAT'],
                's_evening_open' =>  $_POST['e-hours_opening']['SAT'],
                's_evening_close' =>  $_POST['e-hours_closing']['SAT'],
				'sun_morning_open' =>  $_POST['m-hours_opening']['SUN'],
                'sun_morning_close' =>  $_POST['m-hours_closing']['SUN'],
                'sun_evening_open' =>  $_POST['e-hours_opening']['SUN'],
                'sun_evening_close' =>  $_POST['e-hours_closing']['SUN'],
            
            );
			 $inserttimings = $this->Restaurant->UpdateShoptimings($timingsdata,$shopid);
		if($update){
			$this->session->set_flashdata('Update','Succussfully Profile Updated'); 
			redirect('Shop/profile');
		}else{
		$this->session->set_flashdata('Updateerror','Profile Updated Failed'); 
		}
	}
		
		$data['csns'] = $this->Restaurant->getCuisinesRows();

		$this->load->view('shop/shop-profile',$data);
	}
	function Orderscountnew(){
	$shpid = $this->session->userdata('Shopid');
	$data['orders'] = $this->Restaurant->getOrders_shopnew($shpid);
	$shoporders = $this->Restaurant->getOrders_shopnew($shpid);
	$data['shoporders']=count($shoporders);
	echo json_encode($data);
	}
	function Orderscount(){
	$shpid = $this->session->userdata('Shopid');
	$data['orders'] = $this->Restaurant->getOrders_shopnew($shpid);
	$shoporders = $this->Restaurant->getOrders_shopnew($shpid);
	$data['shoporders']=count($shoporders);
	echo json_encode($data);
	}
	function Deliveries(){
	$shpid = $this->session->userdata('Shopid');
	$data['orders'] = $this->Restaurant->getOrders_shop($shpid);
		$this->load->view('shop/list-deliveries',$data);
	}
	function Order_detail($id=""){
		$data['orders_details'] = $this->Restaurant->getOrders_details($id);
		$this->load->view('shop/order-details',$data);
	}
	function Deliver_detail($id=""){
		$data['orders_details'] = $this->Restaurant->getOrders_details($id);
		$this->load->view('shop/order-details',$data);
	}

	function Users(){
		$data['pages'] = $this->Restaurant->getusers();
		$this->load->view('users-list', $data);
	}
	function EditUser($id){
		$data['people'] = $this->Restaurant->getusers($id);
		
	if(!empty($_POST)){
	        if(!empty($_FILES['avatar']['name'])){
				$picture = $this->UploadImage();
			}else{
				
			$picture = $this->input->post('avatarimage');	
			}
		$userData = array(
                'first_name' => strip_tags($this->input->post('name')),
                'phone' => strip_tags($this->input->post('phone_number')),
                'email' => strip_tags($this->input->post('email')),
                //'password' => md5($this->input->post('password')),
                'profile_image' => $picture,
                'country_code' =>  strip_tags($this->input->post('country_code')),
               
            );
		$insert = $this->Restaurant->UpdateUsers($userData,$id);
		if($insert){
			//echo "Thanks for register will get back to you soon".$insert; exit;
			redirect('Admin/Users');
		}else{
			echo "failed Create"; exit;
		}
		
	}	
	$this->load->view('add-user', $data);}
	function AddUser(){
	if(!empty($_POST)){
	        if(!empty($_FILES['avatar']['name'])){
				$picture = $this->UploadImage();
			}
			$userData = array(
                'first_name' => strip_tags($this->input->post('name')),
                'phone' => strip_tags($this->input->post('phone_number')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'profile_image' => $picture,
                'country_code' =>  strip_tags($this->input->post('country_code')),
               
            );
		$update = $this->Restaurant->InsertUsers($userData);
		if($update){
			redirect('Admin/Users');
		}else{
			echo "failed Create"; exit;
		}
	}
	$this->load->view('add-user');
	}
	


}