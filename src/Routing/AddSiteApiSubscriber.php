<?php

namespace Drupal\ax_site_information\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class AddSiteApiSubscriber extends RouteSubscriberBase {

  /**
   * Function to check if form is site_information_settings.
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Get the collection of the site information form.
    if (($route = $collection->get('system.site_information_settings')) && ($collection->get('system.site_information_settings')->getPath() == "/admin/config/system/site-information")) {
      $route->setDefault('_form', 'Drupal\ax_site_information\Form\AddSiteApiField');
    }
  }

}
