<?php

namespace Drupal\rsvplist;

use Drupal\Core\Database\Database;

/**
 * Class EnablerService.
 *
 * @package Drupal\rsvplist
 */
class EnablerService implements EnablerServiceInterface {

  /**
   * Constructor.
   */
  public function __construct() {

  }

  /**
   * @param $node \Drupal\node\Entity\Node
   */
  public function isEnabled($node) {
    if ($node->isNew()){
      return false;
    }

    $db = Database::getConnection()->select('rsvplist_enabled', 're');
    $db->fields('re', array('nid'));
    $db->condition('nid', $node->id());

    $res = $db->execute();

    return !empty($res->fetchCol());
  }

  /**
   * @param $node \Drupal\node\Entity\Node
   */
  public function setEnabled($node) {
    if (!$this->isEnabled($node)) {
      Database::getConnection()->insert('rsvplist_enabled')
        ->fields(['nid'], [$node->id()])
        ->execute();
    }

  }

  /**
   * @param $node \Drupal\node\Entity\Node
   */
  public function delEnabled($node) {
    if ($this->isEnabled($node)) {
      Database::getConnection()->delete('rsvplist_enabled')
        ->condition('nid', $node->id())
        ->execute();
    }
  }

}
