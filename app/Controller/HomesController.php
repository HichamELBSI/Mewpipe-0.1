<?php class HomesController extends AppController {

	public $uses = array('Video','Comment');

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
		$d['searchvideos'] = $this->Video->find('all',  array('conditions' => array(
    		"Video.status " => 0,
    		'OR' => array(
	    		array("Video.name LIKE" => "%".$this->request->data('Home')['search']."%"),
	    		array("Video.description LIKE" => "%".$this->request->data('Home')['search']."%")
		))));
		$d['related'] = ($this->request->data('Home')['search']);
		$d['nbr'] = count($d['searchvideos']);;
		$this->set($d);
	}

	public function show() {
		
		$d['selected'] = current($this->Video->find('first', array('conditions' => array('Video.id' => $this->request->pass['0']))));
		$d['comments'] = $this->Comment->find('all', array('conditions' => array('Comment.videos_id' => $this->request->pass['0'])));
		if(isset($this->request->pass['1'])) {
			$d['relatedvideos'] = $this->Video->find('all',  array('conditions' => array(
	    		"Video.status " => 0,
	    		'OR' => array(
		    		array("Video.name LIKE" => "%".$this->request->pass['1']."%"),
		    		array("Video.description LIKE" => "%".$this->request->pass['1']."%")
			))));
			$d['related'] = $this->request->pass['1'];
		} else {
			$d['relatedvideos'] = $this->Video->find('all',  array('conditions' => array(
	    		"Video.status " => 0,
	    		'OR' => array(
		    		array("Video.name LIKE" => "%"),
		    		array("Video.description LIKE" => "%")
			))));
			$d['related'] = "";
		}
		
		$this->set('user',$this->Auth->user());
		$d['selected']['views'] += 1;
		$this->Video->save($d['selected']);
        $this->set($d);
	}

} ?>