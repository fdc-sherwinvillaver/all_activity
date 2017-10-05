<?php  
/**
* 
*/
class PostsController extends AppController{

	public function index(){
		
	}

	function postLists(){
		$this->autoRender = false;
		$this->layout = '';
		$datas = $this->Post->find('all');
		return json_encode($datas);
	}


	public function add(){
		$this->autoRender = false;
		$this->layout = '';
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		
		$data['Post']['title'] = $request->data->Post->title;
		$data['Post']['body'] = $request->data->Post->body;
		$data['Post']['author'] = $request->data->Post->author;

		if($this->request->is('post')){
			$this->Post->create();
			if($this->Post->save($data)){
				return json_encode(array('message' => 'success'));
			}
		}
	}

	public function update(){
		$this->autoRender = false;
		$this->layout = '';
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$data['Post']['id'] = $request->data->Post->id;
		$data['Post']['title'] = $request->data->Post->title;
		$data['Post']['body'] = $request->data->Post->body;
		$data['Post']['author'] = $request->data->Post->author;

		if($this->request->is('post')){
			$this->Post->id = $data['Post']['id'];
			if($this->Post->save($data)){
				return json_encode(array('message' => 'success'));
			}
		}
	}

	public function edit($id = null){
		// if(!$id) {
		// 	throw new Exception("Error Processing Request", 1);
		// }
		// $post = $this->Post->findById($id);
		// if(!$post){
		// 	throw new Exception("Error Processing Request", 1);
		// }
		// if($this->request->is('put')){
		// 	$this->Post->id = $id;
		// 	if($this->Post->save($this->request->data)){
		// 		$this->Flash->set("Post has been updated", array(
		// 		    'element' => 'success',
		// 		    'key' => 'Message'
		// 		));
		// 	}
		// 	$this->redirect(array('action' => 'index'));
		// }
		// if(!$this->request->data){
		// 	$this->request->data = $post;
		// }
	}

	public function delete(){
		$this->autoRender = false;
		$this->layout = '';
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$data['Post']['id'] = $request->data->Post->id;
		$id = $data['Post']['id'];
		
		if(!$this->request->is('post')){
			throw new Exception("Error Processing Request", 1);
		}

		if($this->Post->delete($id)){
			return json_encode(array('message' => 'success'));
		}
	}
}
?>