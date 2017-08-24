<?php

namespace Drupal\smile_entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Training feedback entity entity.
 *
 * @see \Drupal\smile_entity\Entity\TrainingFeedbackEntity.
 */
class TrainingFeedbackEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\smile_entity\Entity\TrainingFeedbackEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished training feedback entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published training feedback entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit training feedback entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete training feedback entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add training feedback entity entities');
  }

}
