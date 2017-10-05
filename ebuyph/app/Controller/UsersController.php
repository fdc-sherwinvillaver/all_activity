<?php  
/**
* UsersController
*/
class UsersController extends AppController {
	public $uses = array('UserPicture','User','ProductInformation','Payments');

	public $helper = array('Html','Form','Csv');

	public function beforeFilter(){
		parent::beforeFilter();
		$profile_picture = $this->profilePicture();
		$product_count = $this->countProduct();
		$products_purchased = $this->countProductPurchased();
		$this->set(compact('product_count','profile_picture','products_purchased'));
	}
	function register(){
		$this->layout = 'bootstrap';
		
	}

	public function export(){
		$this->set('users',$this->User->find('all'));
		$this->layout = null;
	    $this->autoLayout = false;
	    Configure::write('debug','0');
	}

	

	function ajaxRegister(){
		$profpic_id = "";
		$user_id = "";
		$password = "";
		$confpassword = "";
		$email = "";
		$this->autoRender = false;
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
					if($key == 'password'){
						$password = $value;
					}
					else if($key == 'confpassword'){
						$confpassword = $value;
					}
					else if($key == 'email'){
						$email = $value;
					}
					else{
					}
				}
			}

			if($password != "" && $confpassword != ""){
				if($password != $confpassword){
					$isValid = false;
					$form_validation['passnotmatch'] = "Password and Confirm password not match";
				}
				else{
					if(strlen($password) < 8 && strlen($confpassword) < 8){
						$isValid = false;
						$form_validation['password'] = "Password must be 8 letters above";
					}
				}
			}
			else{
				$form_validation['passnotmatch'] = true;
			}
			
			if($email != ""){
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$isValid = false;
				$form_validation['email'] = "Email is not valid";
				}
				else{
					$data = $this->User->find('count',array(
						'conditions' => array('User.email' => $email)
						)
					);

					if($data > 0){
						$isValid = false;
						$form_validation['email'] = "Email is not available";
					}
				}
			}

			if($isValid != false){
				if(!empty($this->data)){

					if(!empty($this->data['User']['profile_pic']['name'])){
						$file = $this->data['User']['profile_pic'];
						$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
						$arr_ext = array('jpg', 'jpeg', 'gif','png');
						if(in_array($ext, $arr_ext)) {
							if(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/upload_folder' . DS . $file['name'])){
								$userpicture['UserPicture']['picture'] = $file['name'];
								if($this->UserPicture->save($userpicture)){
									$profpic_id = $this->UserPicture->getLastInsertID();
								}
								$array_data = $this->data['User'];
								unset($array_data['profile_pic']);
								$array_data['id'] = $profpic_id;
								$array_data['password'] = AuthComponent::password($this->data['User']['password']);
								if($this->User->save($array_data)){
									$user_id = $this->User->getLastInsertID();
									if($this->UserPicture->updateAll(array('id' => $user_id),array('id' => $profpic_id))){
										return json_encode(array('message' => 'success'));
									}
									else{
										return json_encode(array('message' => 'failed'));
									}
								}
								else{
									return json_encode(array('message' => 'failed'));
								}
							}
							else{
								return json_encode(array('message' => 'failed'));
							}
						}
						else{
							return json_encode(array('message' => 'failed'));
						}
					}
					else {
						$userpicture['UserPicture']['picture'] = "";
						if($this->UserPicture->save($userpicture)){
							$profpic_id = $this->UserPicture->getLastInsertID();

						}
						else{
							return json_encode(array('message' => 'failed'));
						}
						$array_data = $this->data['User'];
						unset($array_data['profile_pic']);
						$array_data['profpic_id'] = $profpic_id;
						$array_data['password'] = AuthComponent::password($this->data['User']['password']);
						if($this->User->save($array_data)){
							$user_id = $this->User->getLastInsertID();
							if($this->UserPicture->updateAll(array('user_id' => $user_id),array('id' => $profpic_id))){
								return json_encode(array('message' => 'success'));
							}
							else{
								return json_encode(array('message' => 'failed'));
							}
						}
						else{
							return json_encode(array('message' => 'failed'));
						}
					}
				}
				else{
					return json_encode(array('message' => 'failed'));
				}
			}
			else{
				echo json_encode(array('message' => 'failed','form_validation' => $form_validation));
			}
		}
	}

	public function changepassword(){
		$this->layout= 'bootstrap';
	}

	public function ajaxChangePassword(){
		$this->autoRender = false;
		$isValid = true;
		$data = $this->User->find('all',array(
				'conditions' => array(
					'User.id' => $this->Session->read('Auth')['User']['id']
				)
			)
		);
		$array_data = $this->request->data['User'];
		foreach ($array_data as $key => $value) {
			if($value == ''){
				$form_validation[$key] = 'This field must not be empty';
				$isValid = false;
			}
			else{
				$form_validation[$key] = true;
			}
		}
		if($isValid != false){
			if(count($data) > 0){
				if($data[0]['User']['password'] == AuthComponent::password($this->request->data['User']['password'])){
					if(AuthComponent::password($this->request->data['User']['new-password']) == AuthComponent::password($this->request->data['User']['confirm-password'])) {
						$newPassword = AuthComponent::password($this->request->data['User']['new-password']);
						$this->User->id = $this->Session->read('Auth')['User']['id'];
						$array_data['password'] = AuthComponent::password($this->request->data['User']['new-password']);
						unset($array_data['new-password']);
						unset($array_data['confirm-password']);
						if($this->User->save($array_data)){
							return json_encode(array('message' => 'success'));
						}
					}
					else{
						return json_encode(array('message' => 'failed','form_validation' => array('confirm-password' => 'Password not match')));
					}
				}
				else{
					return json_encode(array('message' => 'failed','form_validation' => array('password' => "Incorrect password")));
				}
			}
			else{
				return json_encode(array('message' => 'failed','form_validation' => 'Incorrect Password'));
			}
		}
		else{
			return json_encode(array('message' => 'failed','form_validation' => $form_validation));
		}
	}
}
?>