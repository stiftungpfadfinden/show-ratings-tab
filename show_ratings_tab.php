<?php

require_once 'show_ratings_tab.civix.php';
// phpcs:disable
use CRM_ShowRatingsTab_ExtensionUtil as E;

// phpcs:enable

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
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function show_ratings_tab_civicrm_postInstall(): void {
  _show_ratings_tab_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function show_ratings_tab_civicrm_uninstall(): void {
  _show_ratings_tab_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function show_ratings_tab_civicrm_enable(): void {
  _show_ratings_tab_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function show_ratings_tab_civicrm_disable(): void {
  _show_ratings_tab_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function show_ratings_tab_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _show_ratings_tab_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function show_ratings_tab_civicrm_entityTypes(&$entityTypes): void {
  _show_ratings_tab_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function show_ratings_tab_civicrm_preProcess($formName, &$form): void {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function show_ratings_tab_civicrm_navigationMenu(&$menu): void {
//  _show_ratings_tab_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _show_ratings_tab_civix_navigationMenu($menu);
//}
