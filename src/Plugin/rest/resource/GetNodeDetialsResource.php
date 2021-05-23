<?php

namespace Drupal\ax_site_information\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\ax_site_information\Controller\AxCustomNodeDetailsController;

/**
 * Provides a Demo Resource.
 *
 * @RestResource(
 *   id = "get_node_details",
 *   label = @Translation("Node Details"),
 *   uri_paths = {
 *     "canonical" = "/page_json/{requested_site_api}/{requested_nid}"
 *   }
 * )
 */
class GetNodeDetialsResource extends ResourceBase {

  /**
   * Responds to entity GET requests.
   */
  public function get($requested_site_api, $requested_nid) {

    // Calling the nodedetailapi function.
    $jsonresponse = AxCustomNodeDetailsController::nodedetailapi($requested_site_api, $requested_nid);
    return new ResourceResponse($jsonresponse);
  }

  /**
   * Function to remove the permission and make API available for all users.
   */
  public function permissions() {
    return [];
  }

}
