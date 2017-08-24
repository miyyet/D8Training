<?php

namespace Drupal\smile\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\smile\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($myparam) {

//        \Drupal::service('event_dispatcher')->dispatch(
//          'smile.default'
//        );

    $query = \Drupal::entityQuery('node')
      ->condition('status', 1)
      ->condition('changed', REQUEST_TIME, '<');
    $nids = $query->execute();

    $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);



    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello with parameter(s): @myparam', ['@myparam' => $myparam]),
    ];
  }

}
