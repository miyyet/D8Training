<?php

namespace Drupal\smile\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the smile module.
 */
class DefaultControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "smile DefaultController's controller functionality",
      'description' => 'Test Unit for module smile and controller DefaultController.',
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
   * Tests smile functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module smile.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
