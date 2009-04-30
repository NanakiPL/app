<?php

/**
 * @package MediaWiki
 * @addtopackage maintenance
 */

ini_set( "include_path", dirname(__FILE__)."/../../../../../maintenance/" );
require_once( "commandLine.inc" );
require_once( "closeWiki.inc" );

$setup = isset( $options[ "setup" ] ) ? true : false;
$maintenance = new CloseWikiMaintenace( );
$maintenance->execute( $setup );
