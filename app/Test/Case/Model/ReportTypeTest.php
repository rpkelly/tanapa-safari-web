<?php
App::uses('ReportType', 'Model');

/**
 * ReportType Test Case
 *
 */
class ReportTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.report_type',
		'app.report',
		'app.user',
		'app.report_media'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ReportType = ClassRegistry::init('ReportType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ReportType);

		parent::tearDown();
	}

}
