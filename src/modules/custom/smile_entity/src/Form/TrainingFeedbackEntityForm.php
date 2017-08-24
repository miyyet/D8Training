<?php

namespace Drupal\smile_entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Training feedback entity edit forms.
 *
 * @ingroup smile_entity
 */
class TrainingFeedbackEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\smile_entity\Entity\TrainingFeedbackEntity */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Training feedback entity.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Training feedback entity.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.training_feedback_entity.canonical', ['training_feedback_entity' => $entity->id()]);
  }

}
