<?php  
/**
* Home Controller
*/
class HomeController extends AppController {
	
	public $uses = array('User','UserPicture','ProductInformation','ProductCart','Payments');

	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	function index(){
		$this->layout = 'bootstrap';
		if(!isset($this->Session->read('Auth')['User']['id'])){
			return $this->redirect($this->Auth->logout());
		}
		$profile_picture = $this->profilePicture();
		$product_count = $this->countProduct();
		$products_purchased = $this->countProductPurchased();
		$this->set(compact('product_count','profile_picture','products_purchased'));
	}

	function login(){
		$this->layout = 'bootstrap';
		if(isset($this->Session->read('Auth')['User']['id'])){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$profile_picture = $this->profilePicture();
		$product_count = $this->countProduct();
		$products_purchased = $this->countProductPurchased();
		$this->set(compact('product_count','profile_picture','products_purchased'));
	}

	function ajaxLogin(){
		$this->autoRender = false;
		$email = "";
		if($this->request->is('post')){
			$validation = $this->data['User'];
			$isValid = true;
			foreach ($validation as $key => $value) {
				if($value == ""){
					$form_validation[$key] = "This field must not be empty";
					$isValid = false;
				}
				else{
					$form_validation[$key] = true;
					if($key == 'email'){
						$email = $value;
					}
				}
			}

			if($email != ""){
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$isValid = false;
					$form_validation['email'] = "Email is not valid";
				}
			}

			if($isValid != false){
				$password = AuthComponent::password($this->data['User']['password']);
				$data = $this->User->find('all',array(
					'conditions' => array(
						'User.email' => $email,
						'User.password' => $password
					),
					'fields' => array('User.id','User.first_name','User.last_name','User.middle_name')
				));
				if(sizeof($data) > 0){
					$authenticate['email'] = $this->data['User']['email'];
					$authenticate['password'] = AuthComponent::password($this->data['User']['password']);
					$data[0]['User']['email'] = $authenticate['email'];
					$data[0]['User']['password'] = $authenticate['password'];
					$data[0]['User']['action'] = "home";
					if($this->Auth->login($data[0]['User'])){
						echo json_encode(array('message' => 'login_success'));
					}
				}
				else{
					$form_validation['password'] = 'Incorrect username and password';
					echo json_encode(array('message' => 'form_failed','form_validation' => $form_validation));
				}
			}
			else{
				echo json_encode(array('message' => 'form_failed','form_validation' => $form_validation));
			}
		}
	}

	public function logout() {
  		$this->redirect($this->Auth->logout());
  		exit;
 	}
	
}
?>