<?php

namespace Drupal\ax_site_information\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\ax_site_information\Controller\AxCustomNodeDetailsController;

/**
 * Provides a Demo Resource
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
  * @return \Drupal\rest\ResourceResponse
  */
 public function get($requested_site_api,$requested_nid) {
   // Calling the nodeDetailAPI function
   $jsonresponse = AxCustomNodeDetailsController::nodeDetailAPI($requested_site_api,$requested_nid);
   return new ResourceResponse($jsonresponse);
   //return $jsonresponse;
 }
  public function permissions() {
    return [];
  }
}
