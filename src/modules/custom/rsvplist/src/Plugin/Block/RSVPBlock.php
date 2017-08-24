<?php

namespace Drupal\rsvplist\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'RSVPBlock' block.
 *
 * @Block(
 *  id = "rsvp_block",
 *  admin_label = @Translation("Rsvpblock"),
 * )
 */
class RSVPBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return \Drupal::formBuilder()->getForm('\Drupal\rsvplist\Form\RSVPForm');
  }

  public function blockAccess(AccountInterface $account) {
    /** @var \Drupal\node\Entity\Node $node */
    $node = \Drupal::routeMatch()->getParameter('node');

    if (!$node){
      return AccessResult::allowedIfHasPermission($account, 'view rsvplist');
    }
    $nid = $node->nid->value;

    $enabler = \Drupal::service('rsvplist.enabler');
    if (is_numeric($nid)){
      if($enabler->isEnabled($node)) {
        return AccessResult::allowedIfHasPermission($account, 'view rsvplist');
      }
    }
    return AccessResult::forbidden();
  }

}
