<?php class HomesController extends AppController {

	public $uses = array('Video');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','search','show');
	}

	public function index() {
		$d['video'] = current($this->Video->find('first'));
		$d['videos']= $this->Video->find('all');
		$this->set($d);
		$this->set('authUser', $this->Auth->user());
	}

	public function search() {
		$d['searchvideos'] = $this->Video->find('all',  array('conditions' => array('OR' => array(
    		array("Video.name LIKE" => "%".$this->request->data('Home')['search']."%"),
    		array("Video.description LIKE" => "%".$this->request->data('Home')['search']."%")
		))));
		$d['nbr'] = $this->Video->find('count',  array('conditions' => array('OR' => array(
    		array("Video.name LIKE" => "%".$this->request->data('Home')['search']."%"),
    		array("Video.description LIKE" => "%".$this->request->data('Home')['search']."%")
		))));
		$this->set($d);
	}

	public function show() {
		var_dump($this->request->pass['0']);
		$d['selected'] = current($this->Video->find('first', array('conditions' => array('Video.id' => $this->request->pass['0']))));
		$d['selected']['views'] += 1;
		$this->Video->save($d['selected']);
        $this->set($d);
	}
}

?>