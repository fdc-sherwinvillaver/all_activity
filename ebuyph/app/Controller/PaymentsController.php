<?php  
/**
*PaymentsController 
*/
class PaymentsController extends AppController {
	public $uses = array('ProductInformation','ProductPicture','UserPicture','User','ProductCart','Payments');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$profile_picture = $this->profilePicture();
		$product_count = $this->countProduct();
		$products_purchased = $this->countProductPurchased();
		$this->set(compact('product_count','profile_picture','products_purchased'));
	}

	public function checkout(){
		$this->layout = 'bootstrap';
	}

	public function ajaxCheckOut(){
		$this->autoRender = false;
		$this->layout = 'bootstrap';
		$isValid = true;
		$isUpdated = false;
		$form_validation = "";
		$product_cart = "";
		$product_count = $this->request->data['Payments']['product_count'];
		if($product_count != 0){
			$array_data = $this->request->data['Payments'];
			for($i = 0; $i < $product_count; $i++){
				if($this->ProductCart->updateAll(array('status' => 1),array('product_cart_id' => $this->request->data['Payments']['product_id'.$i]))) {

				}
				$product_cart['product_id'.$i] = $array_data['product_id'.$i];
				unset($array_data['product_id'.$i]);
			}

			foreach ($array_data as $key => $value) {
				if($key == 'total_payment' || $key == 'total_quantity'){

				}
				else{
					if($value == ''){
						$form_validation[$key] = "This field must not be empty";
						$isValid = false;
					}
					else{
					}
				}
			}
			if($isValid == true){
				$order_count = $this->Payments->find('all');
				$order_id = count($order_count) + 1;
				unset($array_data['product_count']);
				unset($array_data['first_name']);
				unset($array_data['last_name']);
				unset($array_data['middle_name']);
				unset($array_data['email']);
				$array_data['order_id'] = $order_id;
				$array_data['date'] = date("Y-m-d h:i:sa");
				if($this->Payments->save($array_data)){
					for($x = 0; $x < $product_count; $x++){
						if($this->ProductCart->updateAll(array('order_id' => $order_id),array('product_cart_id' => $product_cart['product_id'.$x]))) {
							$isUpdated = true;
						}

						$product_quantity = $this->ProductCart->find('first',array(
								'conditions' => array(
									'ProductCart.product_cart_id' => $product_cart['product_id'.$x]
								),
								'field' => array('ProductCart.product_id')
							)
						);
						$product_information = $this->ProductInformation->find('first',array(
								'conditions' => array(
									'ProductInformation.product_id' => $product_quantity['ProductCart']['product_id']
								)
							)
						);
						$quantity = (int)$product_information['ProductInformation']['product_quantity'] - (int)$product_quantity['ProductCart']['quantity'];

						if($this->ProductInformation->updateAll(array('product_quantity' => $quantity),array('product_id' => $product_quantity['ProductCart']['product_id']))) {
							$isUpdated = true;
						}
					}
					if($isUpdated != false){
						return json_encode(array('message' => 'success'));
					}
					else{
						return json_encode(array('message' => 'failed'));
					}
				}
			}
			else{
				return json_encode(array('message' => 'failed', 'form_validation' => $form_validation));
			}
			
		}
		else{
			return json_encode(array('message' => 'failed', 'form_validation' => "Don't have items on cart"));
		}
	}
}
?>