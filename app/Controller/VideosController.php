<?php
class VideosController extends AppController {

	public $uses = array('Video');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function edit() {

		$id = ($this->request->params['pass']['0']);
		$d['video'] = current($this->Video->find('first', array('conditions' => array('Video.id' => $id))));
		$this->set($d);
		if(!empty($this->request->data)) {
			$d['video']['name'] = $this->request->data['Video']['name'];
			$d['video']['description'] = $this->request->data['Video']['description'];
			$d['video']['status'] = $this->request->data['Video']['status'];
			$d['video']['users_id'] = $this->Auth->user()['id'];
			if ($this->Video->save($d['video'])) {
				$this->redirect('/users/user');
			}
		}
		
	}

	public function del() {
		$this->Video->delete($this->request->params['pass']['0']);
		$this->redirect('/users/user');
	}

	
}
