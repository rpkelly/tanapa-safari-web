<?php
/**
 * SafariPointsOfInterestFixture
 *
 */
class SafariPointsOfInterestFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'safari_points_of_interest';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'safari_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 255, 'key' => 'index'),
		'latitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,6'),
		'longitude' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,6'),
		'radius' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'safari_id' => 1,
			'latitude' => 1,
			'longitude' => 1,
			'radius' => 1
		),
	);

}
