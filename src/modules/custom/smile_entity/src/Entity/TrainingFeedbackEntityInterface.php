<?php

namespace Drupal\smile_entity\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Training feedback entity entities.
 *
 * @ingroup smile_entity
 */
interface TrainingFeedbackEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Training feedback entity name.
   *
   * @return string
   *   Name of the Training feedback entity.
   */
  public function getName();

  /**
   * Sets the Training feedback entity name.
   *
   * @param string $name
   *   The Training feedback entity name.
   *
   * @return \Drupal\smile_entity\Entity\TrainingFeedbackEntityInterface
   *   The called Training feedback entity entity.
   */
  public function setName($name);

  /**
   * Gets the Training feedback entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Training feedback entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Training feedback entity creation timestamp.
   *
   * @param int $timestamp
   *   The Training feedback entity creation timestamp.
   *
   * @return \Drupal\smile_entity\Entity\TrainingFeedbackEntityInterface
   *   The called Training feedback entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Training feedback entity published status indicator.
   *
   * Unpublished Training feedback entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Training feedback entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Training feedback entity.
   *
   * @param bool $published
   *   TRUE to set this Training feedback entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\smile_entity\Entity\TrainingFeedbackEntityInterface
   *   The called Training feedback entity entity.
   */
  public function setPublished($published);

}
