<?php

namespace Drupal\smile\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TrainingBlock' block.
 *
 * @Block(
 *  id = "training_block",
 *  admin_label = @Translation("Training block"),
 * )
 */
class TrainingBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $query = \Drupal::entityQuery('node')
      ->condition('status', 1)
      ->condition('changed', REQUEST_TIME, '<');
    $nids = $query->execute();

    $nodes = \Drupal::entityManager()->getStorage('node')->loadMultiple($nids);


    $build = [];
    $build['training_block']['#theme'] = 'training_block';
    $build['training_block']['#nodes'] = $nodes;

    return $build;
  }

}
