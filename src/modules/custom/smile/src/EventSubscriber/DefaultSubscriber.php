<?php

namespace Drupal\smile\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class DefaultSubscriber.
 *
 * @package Drupal\smile
 */
class DefaultSubscriber implements EventSubscriberInterface {


  /**
   * Constructor.
   */
  public function __construct() {

  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events['kernel.request'] = ['kernel_request'];

    return $events;
  }

  /**
   * This method is called whenever the kernel.request event is
   * dispatched.
   *
   * @param GetResponseEvent $event
   */
  public function kernel_request(Event $event) {
    drupal_set_message('Event kernel.request thrown by Subscriber in module smile.', 'status', TRUE);
  }

}
