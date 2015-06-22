<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
<<<<<<< HEAD

	public $uses = array('Video');

	public function display() {
=======
>>>>>>> 097a5017f4b7350673293bee1c0710ed48650e69

    public function display() {

<<<<<<< HEAD
	function index() {

			$d['video'] = current($this->Video->find('first'));
			$d['videos'] = $this->Video->find('all');

			$this->set($d);
		}

=======
    }
>>>>>>> 097a5017f4b7350673293bee1c0710ed48650e69
}
