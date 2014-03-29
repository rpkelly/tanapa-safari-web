<?php
App::uses('AppController', 'Controller');
/**
 * SafariWaypoints Controller
 *
 * @property SafariWaypoint $SafariWaypoint
 * @property PaginatorComponent $Paginator
 */
class SafariWaypointsController extends AppController {

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
		$this->SafariWaypoint->recursive = 0;
		$this->set('safariWaypoints', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SafariWaypoint->exists($id)) {
			throw new NotFoundException(__('Invalid safari waypoint'));
		}
		$options = array('conditions' => array('SafariWaypoint.' . $this->SafariWaypoint->primaryKey => $id));
		$this->set('safariWaypoint', $this->SafariWaypoint->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SafariWaypoint->create();
			if ($this->SafariWaypoint->save($this->request->data)) {
				$this->Session->setFlash(__('The safari waypoint has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The safari waypoint could not be saved. Please, try again.'));
			}
		}
		$safaris = $this->SafariWaypoint->Safari->find('list');
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
		if (!$this->SafariWaypoint->exists($id)) {
			throw new NotFoundException(__('Invalid safari waypoint'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SafariWaypoint->save($this->request->data)) {
				$this->Session->setFlash(__('The safari waypoint has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The safari waypoint could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SafariWaypoint.' . $this->SafariWaypoint->primaryKey => $id));
			$this->request->data = $this->SafariWaypoint->find('first', $options);
		}
		$safaris = $this->SafariWaypoint->Safari->find('list');
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
		$this->SafariWaypoint->id = $id;
		if (!$this->SafariWaypoint->exists()) {
			throw new NotFoundException(__('Invalid safari waypoint'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SafariWaypoint->delete()) {
			$this->Session->setFlash(__('The safari waypoint has been deleted.'));
		} else {
			$this->Session->setFlash(__('The safari waypoint could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
