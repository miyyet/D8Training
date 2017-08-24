<?php

namespace Drupal\rsvplist\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class RSVPForm.
 *
 * @package Drupal\rsvplist\Form
 */
class RSVPForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rsvp_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $node = \Drupal::routeMatch()->getParameter('node');
    $nid = $node->id();
//    $nid = 10;

    $form['email'] = [
      '#title' => t('Email Address'),
      '#type' => 'textfield',
      '#size' => '25',
      '#description' => t('we\'ll send updates'),
      '#required' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
    ];
    $form['nid'] = [
      '#type' => 'hidden',
      '#value' => $nid,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('email');

    if ($value == !\Drupal::service('email.validator')->isValid($value)) {
      $form_state->setErrorByName('email', t('The email address is not valid'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    /** @var \Drupal\Core\Database\Connection $db */
    $db = \Drupal::service('database');

    $db->insert('rsvplist')
      ->fields([
        'mail' => $form_state->getValue('email'),
        'nid' => $form_state->getValue('nid'),
        'uid' => \Drupal::currentUser()->id(),
      ])
      ->execute();

    drupal_set_message('Thnk you bb');

  }

}
