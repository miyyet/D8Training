<?php

namespace Drupal\smile_entity\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\smile_entity\Entity\TrainingFeedbackEntity;

/**
 * Class FeedbackForm.
 *
 * @package Drupal\smile_entity\Form
 */
class FeedbackForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'feedback_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['label'] = [
      '#type' => 'email',
      '#title' => $this->t('Label'),
      '#description' => $this->t('Label'),
      '#required' => TRUE,
    ];

    $form['feedback'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Feedback'),
      '#description' => $this->t('Feedback text area'),
      '#required' => TRUE,
    ];


    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    drupal_set_message($form_state->getValue('feedback'));

    TrainingFeedbackEntity::create([
        'name' => $form_state->getValue('label'),
        'field_feedback' => $form_state->getValue('feedback'),
      ]
    )->save();

  }

}
