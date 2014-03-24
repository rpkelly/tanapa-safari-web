<?php
App::uses('AppController', 'Controller');
/**
 * ReportTypes Controller
 *
 * @property ReportType $ReportType
 * @property PaginatorComponent $Paginator
 */
class ReportTypesController extends AppController {

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
		$this->ReportType->recursive = 0;
		$this->set('reportTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReportType->exists($id)) {
			throw new NotFoundException(__('Invalid report type'));
		}
		$options = array('conditions' => array('ReportType.' . $this->ReportType->primaryKey => $id));
		$this->set('reportType', $this->ReportType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReportType->create();
			if ($this->ReportType->save($this->request->data)) {
				$this->Session->setFlash(__('The report type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ReportType->exists($id)) {
			throw new NotFoundException(__('Invalid report type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ReportType->save($this->request->data)) {
				$this->Session->setFlash(__('The report type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ReportType.' . $this->ReportType->primaryKey => $id));
			$this->request->data = $this->ReportType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ReportType->id = $id;
		if (!$this->ReportType->exists()) {
			throw new NotFoundException(__('Invalid report type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReportType->delete()) {
			$this->Session->setFlash(__('The report type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The report type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
