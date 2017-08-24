<?php

namespace Drupal\rsvplist\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class RSVPSettingsForm.
 *
 * @package Drupal\rsvplist\Form
 */
class RSVPSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'rsvplist.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rsvp_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('rsvplist.settings');

    $types = node_type_get_names();

    $form['rsvplist_types'] = [
      '#title' => t('The content type to enable RSVP'),
      '#type' => 'checkboxes',
      '#description' => t('Description bla bla bla'),
      '#default_value' => $config->get('allowed_types'),
      '#options' => $types,
    ];

    $form['array_filter'] = ['#type' => 'value', '#value' => TRUE];

    return parent::buildForm($form, $form_state);
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
    $allowed_types = array_filter($form_state->getValue('rsvplist_types'));
    sort($allowed_types);


    $this->config('rsvplist.settings')
      ->set('allowed_types', $allowed_types)
      ->save();
    parent::submitForm($form, $form_state);
  }

}
