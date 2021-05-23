<?php

namespace Drupal\ax_site_information\Controller;

// Importing the Namespaces for Controller.
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

/**
 * Provides route responses for the ax_custom_node_details module.
 */
class AxCustomNodeDetailsController extends ControllerBase {

  /**
   * Function to fetch the details of Node.
   *
   * @param string $requested_site_api
   *   Site API Key.
   * @param int $requested_nid
   *   Node Id.
   */
  public static function nodedetailapi($requested_site_api, $requested_nid) {
    $data = [];
    $response = [];
    // If Requested Site API and Resquested Nid is Not null than proceed.
    if ($requested_site_api != "" && $requested_nid != "") {
      // Fetching the siteapikey from Site information form.
      $site_config_site_api = \Drupal::config('system.site')->get('siteapikey');
      // If requested Site API is not equal than stop execution.
      if ($requested_site_api != $site_config_site_api) {
        $data = "Invalid Site API Key";
      }
      else {
        // Load the node which is sent in the URL.
        $node = Node::load($requested_nid);
        // If node is present in the database than proceed.
        if (!empty($node)) {
          // Fetch the content type machine name.
          $node_type = $node->bundle();
          // Check if node is of type "page".
          if ($node_type == "ax_custom_page") {
            $data = $node;
          }
          else {
            $data = "Access Denied";
          }
        }
        else {
          $data = "Node Not Found";
        }
      }
    }
    else {
      $data = "No Site API Key or Nid Found in URL";
    }
    $response['data'] = $data;
    return $response;
  }

}
