<?php

namespace Drupal\smile_entity\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Training feedback entity entities.
 */
class TrainingFeedbackEntityViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['training_feedback_entity']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Training feedback entity'),
      'help' => $this->t('The Training feedback entity ID.'),
    );

    return $data;
  }

}
