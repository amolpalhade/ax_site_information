# AX Site Information

CONTENTS OF THIS FILE
---------------------
 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Example URL to fetch the node details using Site API key

# Introduction:
 * AX Site Information is the custom module used for altering the
 Site information form and fetch the node details depend on the
 Site API key.

# Requirements:
 * RESTful Web Services:
    Exposes entities and other resources as RESTful web API.

# Installation:
 * Install as you would normally install a Drupal module.

# Configuration:
  * After installation of the module, Login as Administrator.
  * Navigate to /admin/config/system/site-information
  * Enter the value in the Site API Key field.
  * Update the Configuration.

# Example URL to fetch the node details using Site API key:
  * ```http://localhost/page_json/FOOBAR12345/17```
    - Here 'FOOBAR12345' is siteapikey and '17' is node id.
