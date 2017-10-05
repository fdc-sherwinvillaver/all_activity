<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $ext = '.php';
	public $components = array(
		'Flash',
		'Paginator',
	    'DebugKit.Toolbar',
	    'Session',
	    'Cookie',
	    'Auth' => array(
	      'authenticate'=>array(
	        'Form'=>array(
	          'fields'=>array('email'=>'email','password'=>'password')
	        )
	      ),
	      'loginRedirect' => array('controller' => 'home', 'action' => '/'),
	      'logoutRedirect' => array('controller' => 'home', 'action' => 'login'),
	      'loginAction' => array('controller' => 'home', 'action' => 'login'),
	      'authError' => 'You must be logged in to view this page.',
	      'loginError' => 'Invalid Email or Password entered, please try again.'
	    )
  	);
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('register','ajaxRegister','ajaxLogin','shop','viewproduct','ajaxChangePassword','export');
	}

	public function countProduct(){
		if(isset($this->Session->read('Auth')['User']['id'])){
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
			return count($myproducts);
		}
	}

	public function countProductPurchased(){
		if(isset($this->Session->read('Auth')['User']['id'])){
			$user_id = $this->Session->read('Auth')['User']['id'];
			$myProductsPurchased = $this->Payments->find('all',array(
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
			return count($myProductsPurchased);
		}
	}

	public function profilePicture(){
		if(isset($this->Session->read('Auth')['User']['id'])){
			$user_id = $this->Session->read('Auth')['User']['id'];
			$profile_picture = $this->UserPicture->find('first',array(
				'join' => array(
					array(
						'table' => 'user_pictures',
						'alias' => 'UserPicture',
						'type' => 'INNER',
						'conditions' => array(
							'UserPicture.id = UserPicture.profpic_id'
						)
					)
				),
				'conditions' => array('UserPicture.user_id' => $user_id),
				'fields' => array('UserPicture.picture')
				)
			);
			return $profile_picture;
		}
	}
}
