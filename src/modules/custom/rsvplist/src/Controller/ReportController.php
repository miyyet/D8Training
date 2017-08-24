<?php

namespace Drupal\rsvplist\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

/**
 * Class ReportController.
 *
 * @package Drupal\rsvplist\Controller
 */
class ReportController extends ControllerBase {


  protected function load() {
    $select = Database::getConnection()->select('rsvplist', 'r');
    $select->join('users_field_data', 'u', 'r.uid = u.uid');
    $select->join('node_field_data', 'n', 'r.nid = n.nid');
    $select->addField('u', 'name', 'username');
    $select->addField('n', 'title');
    $select->addField('r', 'mail');

    $entries = $select->execute()->fetchAll(\PDO::FETCH_ASSOC);
    return $entries;
  }

  /**
   * Report.
   *
   * @return string
   *   Return Hello string.
   */
  public function report() {

    $content = [];
    $content['message'] = [
      '#markup' => 'List of rsvp events',
    ];

    $headers = ['Name', 'Node title', 'Email'];

    $rows = [];
    foreach($entries = $this->load() as $entry){
      $rows[] = $entry;
    }

    $content['table'] = [
      '#type' => 'table',
      '#header' => $headers,
      '#rows' => $rows,
      '#empty' => 'No one no Oooooone'
    ];

    $content['#cache']['max-age'] = 0;
    return $content;
  }

}
