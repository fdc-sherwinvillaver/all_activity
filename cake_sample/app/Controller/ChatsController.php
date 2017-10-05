<?php  
/**
* 
*/
class ChatsController extends AppController {
	public $uses = array('User');
	public function index(){
		$this->layout = 'bootstrap';
		$data = $this->Session->read('Auth')['User'];
		$users = $this->User->find('all',array(
			'conditions' => array('User.status' => 0),
			'fields' => array('User.first_name','User.last_name','User.middle_name')
			)
		);
		$this->set(compact('data','users'));
	}
}
?>