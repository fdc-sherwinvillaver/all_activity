<?php  
/**
* ProductsController
*/
class ProductsController extends AppController {
	public $uses = array('ProductInformation','ProductPicture','UserPicture','User','ProductCart','Payments');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$profile_picture = $this->profilePicture();
		$product_count = $this->countProduct();
		$products_purchased = $this->countProductPurchased();
		$this->set(compact('product_count','profile_picture','products_purchased'));
	}

	public function sell(){
		$this->layout = 'bootstrap';
		if(!isset($this->Session->read('Auth')['User']['id'])){
			return $this->redirect($this->Auth->logout());
		}
	}

	public function ajaxRegProduct(){
		$this->autoRender = false;
		date_default_timezone_set('UTC');
		$is_upload = false;
		$is_Valid = true;
		$user_id = $this->Session->read('Auth')['User']['id'];
		if($this->request->is('post')){

			$data_validation = $this->data['ProductInformation'];

			foreach ($data_validation as $key => $value) {
				if($value == ""){
					$form_validation[$key] = "This data must not be empty";
					$is_Valid = false;
				}
				else{
					$form_validation[$key] = true;
				}
			}

			if(!array_key_exists("product_type",$data_validation)){
				$form_validation["product_type"] = "Please select type";
			}

			if(!array_key_exists("product_variation",$data_validation)){
				$form_validation["product_variation"] = "Please select variation";
			}

			if(!array_key_exists("product_variation_type",$data_validation)){
				$form_validation["product_variation_type"] = "Please select variation type";
			}

			if(!array_key_exists("product_picture",$data_validation)){
				$form_validation["product_picture"] = "Please upload picture";
			}
			if(!array_key_exists("product_colors",$data_validation)){
				$form_validation["product_colors"] = "Please select a color";
			}

			if($is_Valid != false){
				$files = $this->data['ProductInformation']['product_picture'];
				$array_data = $this->data;
				unset($array_data['ProductInformation']['product_picture']);
				unset($array_data['variation_type']);
				$array_data['ProductInformation']['product_price'] = (double)$array_data['ProductInformation']['product_price'];
				$array_data['ProductInformation']['product_variation_type'] = implode(',', $this->data['ProductInformation']['product_variation_type']);
				$array_data['ProductInformation']['product_colors'] = implode(',', $this->data['ProductInformation']['product_colors']);
				$array_data['ProductInformation']['user_id'] = $user_id;
				$path = AuthComponent::password($user_id);
				if($this->ProductInformation->save($array_data)){
					$product_id = $this->ProductInformation->getLastInsertID();
					if (!file_exists(WWW_ROOT . 'img/upload_folder' . DS . $path)) {
					    mkdir(WWW_ROOT . 'img/upload_folder' . DS . AuthComponent::password($user_id), 0777, true);
					}
					for($i = 0; $i < sizeof($files); $i++){
						$data['ProductPicture']['product_id'] = (int)$product_id;
						$ext = substr(strtolower(strrchr($files[$i]['name'], '.')), 1);
						$arr_ext = array('jpg', 'jpeg', 'gif','png');		
						if(in_array($ext, $arr_ext)) {
							$temp = explode('.',$files[$i]['name']);
							$newfilename = $i.$product_id.strtotime(date("Y-m-d H:i:s")).'.'.end($temp);
							$data['ProductPicture']['picture'] = $newfilename;
							if(move_uploaded_file($files[$i]['tmp_name'], WWW_ROOT .'img/upload_folder/'.$path. DS . $newfilename)){
								$is_upload = true;
							}
						}
						if($is_upload == true){
							$this->ProductPicture->create();
							$this->ProductPicture->save($data);
						}
					}
					echo json_encode(array('message' => 'success'));
				}
			}
			else{
				echo json_encode(array('message' => 'failed','form_validation' => $form_validation));
			}
		}
	}

	public function myproducts(){
		$this->layout = 'bootstrap';
		$user_id = $this->Session->read('Auth')['User']['id'];
		$myproducts = $this->ProductInformation->find('all',array(
			'joins' => array(
				array(
					'table' => 'product_pictures',
					'alias' => 'ProductPicture',
					'type' => 'INNER',
					'conditions' => array(
						'ProductInformation.product_id = ProductPicture.product_id'
					)
				)
			),
			'conditions' => array(
				'ProductInformation.user_id' => $user_id
			),
			'fields' => array(
				'MIN(ProductPicture.id)',
				'ProductInformation.product_name',
				'ProductInformation.product_description',
				'ProductInformation.product_price',
				'ProductInformation.product_type',
				'ProductInformation.product_quantity',
				'ProductInformation.product_variation_type',
				'ProductInformation.product_colors',
				'ProductPicture.picture',
			),
			'group' => array('ProductPicture.product_id')
		));
		$this->set(compact('myproducts'));
	}

	public function shop(){
		$this->layout = 'bootstrap';
		$products = $this->ProductPicture->find('all',array(
			'joins' => array(
				array(
					'table' => 'product_informations',
					'alias' => 'ProductInformation',
					'type' => 'INNER',
					'conditions' => array(
						'ProductInformation.product_id = ProductPicture.product_id'
					)
				),
				array(
					'table' => 'users',
					'alias' => 'User',
					'type' => 'INNER',
					'conditions' => array(
						'User.id = ProductInformation.user_id'
					)
				),
				array(
					'table' => 'user_pictures',
					'alias' => 'UserPicture',
					'type' => 'LEFT',
					'conditions' => array(
						'UserPicture.id = User.profpic_id'
					)
				)
			),
			'fields' => array(
				"MIN(ProductPicture.id)",
				"User.id",
				"User.first_name",
				"User.last_name",
				"User.middle_name",
				"UserPicture.picture as profile_picture",
				"ProductInformation.product_id",
				"ProductInformation.product_name",
				"ProductInformation.product_description",
				"ProductInformation.product_price",
				"ProductInformation.product_type",
				"ProductInformation.product_quantity",
				"ProductInformation.product_variation_type",
				"ProductInformation.product_colors",
				"ProductPicture.picture as product_picture"
			),
			'group' => array('ProductPicture.product_id')
		));
		$profile_picture = $this->profilePicture();
		$product_count = $this->countProduct();
		$this->set(compact('products'));
	}
	public function viewproduct($id = null){
		$this->layout = 'bootstrap';
		if(!$this->request->is('get')){
			throw new Exception("Error Processing Request", 1);
		}

		$product_datas = $this->ProductPicture->find('all',array(
			'joins' => array(
				array(
					'table' => 'product_informations',
					'alias' => 'ProductInformation',
					'type' => 'INNER',
					'conditions' => array(
						'ProductInformation.product_id = ProductPicture.product_id'
					)
				),
				array(
					'table' => 'users',
					'alias' => 'User',
					'type' => 'INNER',
					'conditions' => array(
						'User.id = ProductInformation.user_id'
					)
				),
				array(
					'table' => 'user_pictures',
					'alias' => 'UserPicture',
					'type' => 'LEFT',
					'conditions' => array(
						'UserPicture.id = User.profpic_id'
					)
				)
			),
			'fields' => array(
				"User.id",
				"User.first_name",
				"User.last_name",
				"User.middle_name",
				"UserPicture.picture as profile_picture",
				"ProductInformation.product_id",
				"ProductInformation.product_name",
				"ProductInformation.product_description",
				"ProductInformation.product_price",
				"ProductInformation.product_type",
				"ProductInformation.product_quantity",
				"ProductInformation.product_variation_type",
				"ProductInformation.product_colors",
				"ProductPicture.picture as product_picture"
			),
			'conditions' => array('ProductInformation.product_id' => $id)
		));

		$first_picture = $this->ProductPicture->find('all',array(
			'joins' => array(
				array(
					'table' => 'product_informations',
					'alias' => 'ProductInformation',
					'type' => 'INNER',
					'conditions' => array(
						'ProductInformation.product_id = ProductPicture.product_id'
					)
				),
				array(
					'table' => 'users',
					'alias' => 'User',
					'type' => 'INNER',
					'conditions' => array(
						'User.id = ProductInformation.user_id'
					)
				),
				array(
					'table' => 'user_pictures',
					'alias' => 'UserPicture',
					'type' => 'LEFT',
					'conditions' => array(
						'UserPicture.id = User.profpic_id'
					)
				)
			),
			'fields' => array(
				"MIN(ProductPicture.id)",
				"User.id",
				"User.first_name",
				"User.last_name",
				"User.middle_name",
				"UserPicture.picture as profile_picture",
				"ProductInformation.product_id",
				"ProductInformation.product_name",
				"ProductInformation.product_description",
				"ProductInformation.product_price",
				"ProductInformation.product_type",
				"ProductInformation.product_quantity",
				"ProductInformation.product_variation_type",
				"ProductInformation.product_colors",
				"ProductPicture.picture as product_picture"
			),
			'conditions' => array('ProductInformation.product_id' => $id),
			'group' => 'ProductPicture.product_id'
		));

		$this->set(compact('product_datas','first_picture'));
	}

	public function cart(){
		$this->autoRender = false;
		if($this->request->is('post')){
			$data = $this->ProductCart->find('first',array(
					'conditions' => array(
						'ProductCart.product_id' => $this->request->data['ProductCart']['product_id'],
						'ProductCart.user_id' => $this->request->data['ProductCart']['user_id'],
						'ProductCart.status' => 0
					)
				)
			);

			if(count($data) > 0){
				$quantity = $data['ProductCart']['quantity'] + $this->request->data['ProductCart']['quantity'];
				if($this->ProductCart->updateAll(array('quantity' => $quantity),array('product_id' => $this->request->data['ProductCart']['product_id'],'user_id' => $this->request->data['ProductCart']['user_id']))){
					return json_encode(array('message' => 'success'));
				}
			}
			else{
				$this->request->data['ProductCart']['order_id'] = 0;
				if($this->ProductCart->save($this->request->data)){
				 	return json_encode(array('message' => 'success'));
				}
			}
			
		}
	}

	public function cartlist(){
		$this->autoRender = false;
		$data = $this->ProductCart->find('all',array(
				'joins' => array(
					array(
						'table' => 'product_informations',
						'alias' => 'ProductInformation',
						'type' => 'INNER',
						'conditions' => array(
							'ProductCart.product_id = ProductInformation.product_id'
						)
 					)
				),
				'conditions' => array(
					'ProductCart.user_id' => $this->request->data['ProductCart']['user_id'],
					'ProductCart.status' => 0
				),
				'fields' => array('ProductCart.product_cart_id,ProductInformation.product_name,ProductInformation.product_price,ProductCart.quantity')
			)
		);
		return json_encode(array('cart' => $data,'count' => count($data)));
	}

	public function purchased(){
		$this->layout = 'bootstrap';
		$user_id = $this->Session->read('Auth')['User']['id'];
		$myPurchasedProducts = $this->Payments->find('all',array(
			'joins' => array(
				array(
					'table' => 'product_carts',
					'alias' => 'ProductCart',
					'type' => 'INNER',
					'conditions' => array(
						'Payments.order_id = ProductCart.order_id'
					)
				),
				array(
					'table' => 'product_informations',
					'alias' => 'ProductInformation',
					'type' => 'INNER',
					'conditions' => array(
						'ProductInformation.product_id = ProductCart.product_id'
					)
				),
				array(
					'table' => 'product_pictures',
					'alias' => 'ProductPicture',
					'type' => 'INNER',
					'conditions' => array(
						'ProductInformation.product_id = ProductPicture.product_id'
					)
				)
			),
			'conditions' => array(
				'Payments.user_id' => $user_id
			),
			'fields' => array(
				'ProductCart.order_id',
				'ProductInformation.user_id',
				'ProductInformation.product_description',
				'ProductInformation.product_name',
				'ProductInformation.product_price',
				'ProductInformation.product_type',
				'ProductCart.quantity',
				'ProductInformation.product_variation_type',
				'ProductInformation.product_colors',
				'ProductPicture.picture',
				'Payments.date'
			),
			'group' => array('ProductCart.order_id','ProductCart.product_id')
		));
		$this->set(compact('myPurchasedProducts'));
		// pr($myPurchasedProducts); exit;
	}
}
?>