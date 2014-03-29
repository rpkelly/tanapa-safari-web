<?php
App::uses('AppController', 'Controller');
/**
 * Safaris Controller
 *
 * @property Safari $Safari
 * @property PaginatorComponent $Paginator
 */
class SafarisController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('safaris', $this->paginate());
		$this->set('_serialize', array('safaris'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Safari->exists($id)) {
			throw new NotFoundException(__('Invalid safari'));
		}
		$options = array('conditions' => array('Safari.' . $this->Safari->primaryKey => $id));
		$this->set('safari', $this->Safari->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Safari->create();
			if ($this->Safari->save($this->request->data)) {
				$this->Session->setFlash(__('The safari has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The safari could not be saved. Please, try again.'));
			}
		}
		$headerMedia = $this->Safari->HeaderMedia->find('list');
		$footerMedia = $this->Safari->FooterMedia->find('list');
		$this->set(compact('headerMedia', 'footerMedia'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Safari->exists($id)) {
			throw new NotFoundException(__('Invalid safari'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Safari->save($this->request->data)) {
				$this->Session->setFlash(__('The safari has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The safari could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Safari.' . $this->Safari->primaryKey => $id));
			$this->request->data = $this->Safari->find('first', $options);
		}
		$headerMedia = $this->Safari->HeaderMedia->find('list');
		$footerMedia = $this->Safari->FooterMedia->find('list');
		$this->set(compact('headerMedia', 'footerMedia'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Safari->id = $id;
		if (!$this->Safari->exists()) {
			throw new NotFoundException(__('Invalid safari'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Safari->delete()) {
			$this->Session->setFlash(__('The safari has been deleted.'));
		} else {
			$this->Session->setFlash(__('The safari could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));

	}
}
