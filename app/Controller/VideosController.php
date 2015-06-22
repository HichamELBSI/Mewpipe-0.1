<?php
	class VideosController extends AppController {

		public $uses = array('Video');

		function index() {
			$d['video'] = current($this->Video->find('all'));
			debug($d['video']);
			$this->set($d);
		}
	}
?>