<?php
App::uses('AppController', 'Controller');
/**
 * SafariPointsOfInterests Controller
 *
 * @property SafariPointsOfInterest $SafariPointsOfInterest
 * @property PaginatorComponent $Paginator
 */
class SafariPointsOfInterestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SafariPointsOfInterest->recursive = 0;
		$this->set('safariPointsOfInterests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SafariPointsOfInterest->exists($id)) {
			throw new NotFoundException(__('Invalid safari points of interest'));
		}
		$options = array('conditions' => array('SafariPointsOfInterest.' . $this->SafariPointsOfInterest->primaryKey => $id));
		$this->set('safariPointsOfInterest', $this->SafariPointsOfInterest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SafariPointsOfInterest->create();
			if ($this->SafariPointsOfInterest->save($this->request->data)) {
				$this->Session->setFlash(__('The safari points of interest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The safari points of interest could not be saved. Please, try again.'));
			}
		}
		$safaris = $this->SafariPointsOfInterest->Safari->find('list');
		$this->set(compact('safaris'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SafariPointsOfInterest->exists($id)) {
			throw new NotFoundException(__('Invalid safari points of interest'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SafariPointsOfInterest->save($this->request->data)) {
				$this->Session->setFlash(__('The safari points of interest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The safari points of interest could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SafariPointsOfInterest.' . $this->SafariPointsOfInterest->primaryKey => $id));
			$this->request->data = $this->SafariPointsOfInterest->find('first', $options);
		}
		$safaris = $this->SafariPointsOfInterest->Safari->find('list');
		$this->set(compact('safaris'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SafariPointsOfInterest->id = $id;
		if (!$this->SafariPointsOfInterest->exists()) {
			throw new NotFoundException(__('Invalid safari points of interest'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SafariPointsOfInterest->delete()) {
			$this->Session->setFlash(__('The safari points of interest has been deleted.'));
		} else {
			$this->Session->setFlash(__('The safari points of interest could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
