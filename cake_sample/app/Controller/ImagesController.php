<?php  
/**
* 
*/
class ImagesController extends AppController
{
	public $uses = array('User');

	public function index(){
		$this->layout = 'layout2';

		$data = $this->User->find('all',array(
				'fields' => array('User.id','User.first_name','User.last_name','User.middle_name'),
				'limit' => 5,
				'order' => array('id')
			)
		);
		$this->set('users',$data);
	}

	public function infiniteScroll(){
		$this->autoRender = false;
		$offset = $this->request->data['offset'];
		$oldoffset = $this->request->data['oldoffset'];
		$data = $this->User->find('all',array(
				'fields' => array('User.id','User.first_name','User.last_name','User.middle_name'),
				'limit' => 5,
				'order' => array('id'),
				'offset' => $oldoffset,$oldoffset
			)
		);
		echo json_encode($data);
		// $this->set('users',$data);
	}
}
?>