<?php
/**
 * @package MediaWiki
 * @subpackage SpecialPage
 * @author Piotr Molski <moli@wikia-inc.com> for Wikia.com
 * @copyright (C) 2008, Wikia Inc.
 * @licence GNU General Public Licence 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is MediaWiki extension named Listusers.\n";
	exit( 1 ) ;
}

$wgExtensionCredits['specialpage'][] = array(
	"name" => "Local users",
	"description-msg" => "listusers-desc",
	"author" => "Piotr Molski"
);

/**
 * Messages
 */
$wgExtensionMessagesFiles["Listusers"] = __DIR__ . '/SpecialListusers.i18n.php';

/**
 * Helpers
 */
$wgAutoloadClasses['ListusersData']  = __DIR__ . '/SpecialListusers_helper.php';

/**
 * Hooks
 */
$wgAutoloadClasses['ListusersAjax'] = __DIR__ . '/SpecialListusers_ajax.php';
$wgAutoloadClasses['ListUsersHooks'] = __DIR__ . '/SpecialListusers_hooks.php';

$wgHooks['SpecialPage_initList'][] = 'ListUsersHooks::ActiveUsers';
$wgAjaxExportList[] = 'ListusersAjax::axShowUsers';

// This tries to write to a database that the devboxes don't have write-permission for.
if( empty( $wgDevelEnvironment ) ){
	$wgHooks['UserRights'][] = 'ListusersHooks::updateUserRights';
}

/**
 * Special pages
 */
$wgAutoloadClasses['ListUsers'] = __DIR__ . '/SpecialListusers_body.php';
$wgAutoloadClasses['SpecialListStaff'] = __DIR__ . '/SpecialListusers_body.php';
$wgAutoloadClasses['SpecialListVstf'] = __DIR__ . '/SpecialListusers_body.php';
$wgAutoloadClasses['SpecialListHelpers'] = __DIR__ . '/SpecialListusers_body.php';

$wgSpecialPages['Listusers'] = 'ListUsers';
$wgSpecialPages['Liststaff'] = 'SpecialListStaff';
$wgSpecialPages['Listvstf'] = 'SpecialListVstf';
$wgSpecialPages['Listhelpers'] = 'SpecialListHelpers';

// Only add Listusers to Special:SpecialPages
$wgSpecialPageGroups['Listusers'] = 'users';

/**
 * Rights
 */
$wgAvailableRights[] = 'listusers';
