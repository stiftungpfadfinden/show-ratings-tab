<?php

require_once 'show_ratings_tab.civix.php';

use CRM_ShowRatingsTab_ExtensionUtil as E;

/**
 * Display a link to archive a case on the manage case screen
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterContent/
 */
function show_ratings_tab_civicrm_alterContent(&$content, $context, $tplName, &$object) {
  if ($object instanceof CRM_Case_Page_Tab && CRM_Core_Permission::check('access all cases and activities')) {
    $caseId = $object->get('id');
    $contactId = $object->getVar('_contactId');
    Civi::resources()->addBundle('bootstrap3');

    $smarty = CRM_Core_Smarty::singleton();
    $smarty->pushScope(['caseId' => $caseId]);
    $smarty->pushScope(['contactId' => $contactId]);
    $subContent = $smarty->fetch("CRM/ShowRatingsTab/CasePageTab.tpl");
    $smarty->popScope();

    $content .= $subContent;
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function show_ratings_tab_civicrm_config(&$config): void {
  _show_ratings_tab_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function show_ratings_tab_civicrm_install(): void {
  _show_ratings_tab_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function show_ratings_tab_civicrm_enable(): void {
  _show_ratings_tab_civix_civicrm_enable();
}
