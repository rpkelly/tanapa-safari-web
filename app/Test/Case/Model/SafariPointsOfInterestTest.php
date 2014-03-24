<?php
App::uses('SafariPointsOfInterest', 'Model');

/**
 * SafariPointsOfInterest Test Case
 *
 */
class SafariPointsOfInterestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.safari_points_of_interest',
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
		$this->SafariPointsOfInterest = ClassRegistry::init('SafariPointsOfInterest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SafariPointsOfInterest);

		parent::tearDown();
	}

}
