<?php

namespace Drupal\smile_entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Training feedback entity entities.
 *
 * @ingroup smile_entity
 */
class TrainingFeedbackEntityListBuilder extends EntityListBuilder {

  use LinkGeneratorTrait;

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Training feedback entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\smile_entity\Entity\TrainingFeedbackEntity */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.training_feedback_entity.edit_form', array(
          'training_feedback_entity' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
