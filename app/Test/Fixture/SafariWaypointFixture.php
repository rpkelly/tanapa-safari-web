<?php
/**
 * SafariWaypointFixture
 *
 */
class SafariWaypointFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15, 'key' => 'primary'),
		'sequence' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 15),
		'latitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,6'),
		'longitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,6'),
		'safari_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'safari_id' => array('column' => 'safari_id', 'unique' => 0)
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
			'sequence' => 1,
			'latitude' => 1,
			'longitude' => 1,
			'safari_id' => 1
		),
	);

}
