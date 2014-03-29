<?php
App::uses('SafariWaypoint', 'Model');

/**
 * SafariWaypoint Test Case
 *
 */
class SafariWaypointTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.safari_waypoint',
		'app.safari',
		'app.header_media',
		'app.footer_media'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SafariWaypoint = ClassRegistry::init('SafariWaypoint');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SafariWaypoint);

		parent::tearDown();
	}

}
