<?php

namespace Drupal\ax_site_information\Controller;
// Importing the Namespaces for Controller
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Provides route responses for the ax_custom_node_details module.
 */
class AxCustomNodeDetailsController extends ControllerBase {
   /**
   * Function to fetch the details of Node
   * @param - Site API Key
   * @param - node Id
   */
   public function nodeDetailAPI($requested_site_api,$requested_nid){
     $data = array();
     $response = array();
     // if Requested Site API and Resquested Nid is Not null than proceed
     if($requested_site_api!= "" && $requested_nid!= ""){
       //fetching the siteapikey from Site information form
       $site_config_site_api = \Drupal::config('system.site')->get('siteapikey');
       // if requested Site API is not equal than stop execution
       if($requested_site_api != $site_config_site_api){
         return new JsonResponse(array("error" => "Invalid Site API Key"), 200, ['Content-Type'=> 'application/json']);
       }else{
         // Load the node which is sent in the URL
         $node = Node::load($requested_nid);
         // if node is present in the database than proceed
         if(!empty($node)){
           // fetch the content type maching name
           $node_type = $node->bundle();
           // Check if node is of type "page"
           if($node_type == "ax_custom_page"){
             return new JsonResponse($node->toArray(), 200, ['Content-Type'=> 'application/json']);
           }else{
             return new JsonResponse(array("error" => "access denied"), 401, ['Content-Type'=> 'application/json']);
           }
         }else{
           return new JsonResponse(array("error" => "Node not found"), 200, ['Content-Type'=> 'application/json']);
         }
       }
     }else{
       return new JsonResponse(array("error" => "No Site API Key or Nid Found in URL"), 200, ['Content-Type'=> 'application/json']);
     }
  }
}

?>
