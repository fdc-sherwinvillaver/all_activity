<?php  
/**
* 
*/
class ProductsController extends AppController {
	public function index() {
		
	}

	public function productLists(){
		$this->layout = '';
		$this->paginate = array(
		    'Product' => array(
		    	'fields' => array('Product.id','Product.product_id','Product.name','Product.description','Product.type'),
		        'limit' => 5,
		        'order' => array('Product.product_id' => 'asc')
		    )
		);
		$products = $this->paginate('Product');
		$this->set('products',$products);
	}
	
	public function add() {
		//checking if there is posted data
		if($this->request->is('post')) {
			$this->Product->create();
			if($this->Product->save($this->request->data)) {
				//setting flash on screen
				$this->Flash->success(__('Post was Added'));
				//redirect to index
				return $this->redirect(array('action' => '../users/index'));
			}
			$this->Flash->error(__('Unable to add your post.'));
		}
	}

	public function edit($id = null) {
		if(!$id){
			throw new NotFoundException(__('Invalid post'));
		}

		$product = $this->Product->findByProductId($id);
		if(!$product){
			throw new NotFoundException(__('Invalid post'));
		}

		if($this->request->is(array('post','put'))){
			$this->Product->id = $id;

			if($this->Product->save($this->request->data)){
				$this->Flash->success(__('Post was update'));
				//redirect to index
				return $this->redirect(array('action' => '../users/index'));
			}
			$this->Flash->error(__('Unable to update your post.'));
		}

		if (!$this->request->data) {
	        $this->request->data = $product;
	    }
	}

	public function delete($product_id){
		$this->autoRender = false;
		if(!$this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->Product->delete($this->request->params['pass'][0])) {
			$this->Flash->success(__('Post was deleted'));
			//redirect to index
			return $this->redirect(array('action' => '../users/index'));
		}
		$this->Flash->error(__('Unable to delete your post.'));
	}
}
?>