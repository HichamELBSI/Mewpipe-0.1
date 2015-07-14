
<?php class HomesController extends AppController {

	public $uses = array('Video','Comment');
	public $helpers = array('SocialShare.SocialShare');


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','search','show');
	}

	public function index() {

		//$conditions_array['approved'] = 'yes';
		//$conditions_array['active'] = 'yes';
		//$conditions_array['inventory'] = -1;

		$this->paginate = array(
			//'conditions' => $conditions_array,
			'limit' => 10,
			'conditions' => array("Video.status " => 0),
			'order' => array(
	            'Video.views' => 'DESC'
	        )
			);
		$d['videos'] = $this->paginate('Video');

		$d['sharedVideos'] = $this->Video->find('all', 
			array('order' =>array('Video.share DESC'),'limit' => 10),
			array('conditions' => array(
					"Video.status " => 0
					))
		);
		
		$this->set($d);
		
		//$log = $this->Video->getDataSource()->getLog(false, false);
		//debug($log);

		$this->set('authUser', $this->Auth->user());

		if($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
	}

	public function search() {

		$d['searchvideos'] = $this->Video->find('all', array('conditions' => array(
    		"Video.status " => 0,
    		'OR' => array(
	    		array("Video.name LIKE" => "%".$this->request->data('Home')['search']."%"),
	    		array("Video.description LIKE" => "%".$this->request->data('Home')['search']."%")
		))),array('order' =>array('Video.views DESC')));

		$d['related'] = ($this->request->data('Home')['search']);
		$d['nbr'] = count($d['searchvideos']);;
		$this->set($d);
	}

	public function show() {
		
		$d['selected'] = current($this->Video->find('first', array('conditions' => array('Video.id' => $this->request->pass['0']))));
		$d['comments'] = $this->Comment->find('all', array('conditions' => array('Comment.videos_id' => $this->request->pass['0'])));
		if(isset($this->request->pass['1'])) {
			$d['relatedvideos'] = $this->Video->find('all',  array('limit'=>10, 'conditions' => array(
	    		"Video.status " => 0,
	    		'OR' => array(
		    		array("Video.name LIKE" => "%".$this->request->pass['1']."%"),
		    		array("Video.description LIKE" => "%".$this->request->pass['1']."%")
			))));
			$d['related'] = $this->request->pass['1'];
		} else {
			$d['relatedvideos'] = $this->Video->find('all',  array('limit'=>10,'conditions' => array(
	    		"Video.status " => 0,
	    		'OR' => array(
		    		array("Video.name LIKE" => "%"),
		    		array("Video.description LIKE" => "%")
			))));
			$d['related'] = "";
		}
		foreach ($this->request->pass as $key => $value) {
			/*if() {
				echo 'Déja partagé';
			} else {*/
				if($value == 'shared') {
					$d['selected']['share'] += 1;
					$this->Cookie->write('shared',
					    array('id' => $d['selected']['id'])
					);
					$this->Cookie->write('shared', $d['selected']['id']);
				}
			//}
		}

		$this->set('user',$this->Auth->user());
		$d['selected']['views'] += 1;
		$this->Video->save($d['selected']);
        $this->set($d);
	}

	public function upload() {
		
	}

} ?>