<?php

/**
 * @file
 * Contains training_feedback_entity.page.inc.
 *
 * Page callback for Training feedback entity entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Training feedback entity templates.
 *
 * Default template: training_feedback_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_training_feedback_entity(array &$variables) {
  // Fetch TrainingFeedbackEntity Entity Object.
  $training_feedback_entity = $variables['elements']['#training_feedback_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
