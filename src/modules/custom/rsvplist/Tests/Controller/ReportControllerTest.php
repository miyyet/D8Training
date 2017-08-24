<?php

namespace Drupal\rsvplist\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the rsvplist module.
 */
class ReportControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "rsvplist ReportController's controller functionality",
      'description' => 'Test Unit for module rsvplist and controller ReportController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests rsvplist functionality.
   */
  public function testReportController() {
    // Check that the basic functions of module rsvplist.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
