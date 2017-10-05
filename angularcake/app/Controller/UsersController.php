<?php  
/**
* 
*/
class UsersController extends AppController {
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('login','posts');
	}

	public function index() {
		if(!isset($this->Session->read('Auth')['User']['id'])){
			return $this->redirect($this->Auth->logout());
		}
		$data = $this->Session->read('Auth')['User'];
		$this->set('user',$data);
	}

	public function usersList() {
		$this->layout = '';
		$this->paginate = array(
		    'User' => array(
		    	'fields' => array('User.id','User.first_name','User.last_name','User.middle_name'),
		        'limit' => 5
		    )
		);
		$datausers = $this->paginate('User');
		$this->set('users',$datausers);
	}


	public function add() {

		
		// if($this->request->is('post')) {
			// $this->autoRender = false;
		// 	$this->User->create();
		// 	if($this->User->save($this->request->data)){
		// 		$this->Flash->success('User Added');
		// 		return $this->redirect(array('action' => 'index'));
		// 	}
		// 	$this->Flash->error(__('User Not Added'));
		// }
	}


	public function login(){
		if(isset($this->Session->read('Auth')['User']['id'])){
			$this->redirect($this->Auth->redirectUrl());
		}
		if($this->request->is('post')){
			$username = $this->request->data['User']['username'];
			$password = AuthComponent::password($this->request->data['User']['password']);
			if($username != "" && $password != ""){
				$conditions = array(
					'User.username' => $username,
					'User.password' => $password
				);

				$data = $this->User->find('first',array(
					'conditions' => $conditions
				));

				if(isset($data['User'])){

	     			if($this->Auth->login($data['User'])){
						$this->redirect($this->Auth->redirectUrl());
					}
				}
				else{
				 	$message = 'Username or Password is incorrect';
					$this->Flash->set($message, array(
					    'element' => 'error',
					    'key' => 'Message'
					));
				}
			}
			else{
				$message = 'Fill out all fields';
				$this->Flash->set($message, array(
				    'element' => 'error',
				    'key' => 'Message'
				));
			}
		}
	}

	public function logout() {
	  	return $this->redirect($this->Auth->logout());
 	}

	public function ajaxAdd(){
		$this->autoRender = false;
		if($this->request->is('post')) {
			$this->User->create();
			$data = $this->request->data;
			$data['User']['created_date'] = date('Y-m-d');
			$data['User']['created_ip'] = '192.168.11.11';
			if($this->User->save($data)){
				return json_encode(array("message" => "success"));
			}
		}

		$errors = $this->User->validationErrors;
		$error = array();
		$errorfields = array();
		foreach($errors as $key => $value){
			array_push($errorfields,$key);
			$error[$key] = $value;
		}
		echo json_encode(array('message' => 'error','errors' => $error,'error_fields' => $errorfields));
	}


	public function edit($id = null) {
		$user = $this->User->findById($id);

		if(!$user){
			throw new NotFoundException(__('Invalid post'));
		}

		if(!$this->request->data) {
			$this->request->data = $user;
		}
	}

	public function ajaxEdit(){
		$this->autoRender = false;
		
		if($this->request->is(array('post','put'))) {
			if($this->User->save($this->request->data)) {
				return json_encode(array("message" => "success"));
			}
		}

		$errors = $this->User->validationErrors;
		$error = array();
		$errorfields = array();
		foreach($errors as $key => $value){
			array_push($errorfields,$key);
			$error[$key] = $value;
		}
		echo json_encode(array('message' => 'error','errors' => $error,'error_fields' => $errorfields));
	}


	public function delete($id) {
		if(!$this->request->is('get')){
			throw new MethodNotAllowedException();
		}

		if($this->User->delete($id)){
			$this->Flash->success(__('User Deleted'));
			return $this->redirect(array('action' => '/index'));
		}
		$this->Flash->success(__('User not Deleted'));
	}
}

?>