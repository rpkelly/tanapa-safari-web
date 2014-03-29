<?php
/**
 * UserLogFixture
 *
 */
class UserLogFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'user_log';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 30, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'index'),
		'latitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,6'),
		'longitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,6'),
		'time' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'latitude' => 1,
			'longitude' => 1,
			'time' => 1395612812
		),
	);

}
