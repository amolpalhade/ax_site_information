<?php

namespace Drupal\ax_site_information\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\SiteInformationForm;


class AddSiteApiField extends SiteInformationForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // fetching the config details of the site information form
    $site_config = $this->config('system.site');
    $form =  parent::buildForm($form, $form_state);
    // Adding the text field for SiteAPI key in the form
    $form['site_information']['siteapikey'] = [
      '#type' => 'textfield',
      '#title' => t('Site API Key'),
      '#default_value' => $site_config->get('siteapikey') ?: 'No API Key yet',
      '#description' => t("Enter the API Key"),
    ];
    $form['actions']['submit']['#value'] = t('Update Configuration');
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // fetching the config details of the site information form
    $this->config('system.site')
      ->set('siteapikey', $form_state->getValue('siteapikey'))
      ->save();
    parent::submitForm($form, $form_state);
    // Printing Message for User
    \Drupal::messenger()->deleteByType('status');
    \Drupal::messenger()->addStatus(t('Site API is set with value : @value',['@value' => $this->config('system.site')->get('siteapikey')]));
  }
}
