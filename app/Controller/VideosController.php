<?php
class VideosController extends AppController {

	public $uses = array('Video');

	public function display() {}


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	function index() {
		$d['videos'] = $this->Video->find('all');
		$this->set($d);
	}
}
