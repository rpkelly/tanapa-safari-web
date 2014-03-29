<?php
App::uses('Safari', 'Model');

/**
 * Safari Test Case
 *
 */
class SafariTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Safari = ClassRegistry::init('Safari');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Safari);

		parent::tearDown();
	}

}
