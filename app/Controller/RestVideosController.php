<?php 

class RestVideosController extends AppController {

	public $uses = array('Video');
	public $components = array('RequestHandler');

	public function index() {
        $videos = $this->Video->find('all');
        $this->set(array(
            'videos' => $videos,
            '_serialize' => array('videos')
        ));
    }

    public function add() {
        $this->Video->create();
        if ($this->Video->save($this->request->data)) {
             $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function view($id) {
        $video = $this->Video->findById($id);
        $this->set(array(
            'video' => $video,
            '_serialize' => array('video')
        ));
    }

    public function edit($id) {
        $this->Video->id = $id;
        if ($this->Video->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->Video->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

}