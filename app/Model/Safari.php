<?php
App::uses('AppModel', 'Model');
/**
 * Safari Model
 *
 * @property HeaderMedia $HeaderMedia
 * @property FooterMedia $FooterMedia
 */
class Safari extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'safari';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'HeaderMedia' => array(
			'className' => 'Media',
			'foreignKey' => 'header_media_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FooterMedia' => array(
			'className' => 'Media',
			'foreignKey' => 'footer_media_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
