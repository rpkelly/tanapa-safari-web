<?php
App::uses('UserLog', 'Model');

/**
 * UserLog Test Case
 *
 */
class UserLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_log',
		'app.user',
		'app.report',
		'app.report_type',
		'app.report_media'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserLog = ClassRegistry::init('UserLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLog);

		parent::tearDown();
	}

}
