<?php
# Main wiki script; see design.doc
#

# Fudge the variable imports to work around oddness with
# magic_quotes_gpc being on and register_globals being off
function &fix_magic_quotes( &$arr ) {
	foreach( $arr as $key => $val ) {
		if( is_array( $val ) ) {
			fix_magic_quotes( $arr[$key] );
		} else {
			$arr[$key] = stripslashes( $val );
		}
	}
	return $arr;
}
if( get_magic_quotes_gpc() ) {
	fix_magic_quotes( $_COOKIE );
	fix_magic_quotes( $_ENV );
	fix_magic_quotes( $_GET );
	fix_magic_quotes( $_POST );
	fix_magic_quotes( $_REQUEST );
	fix_magic_quotes( $_SERVER );
	fix_magic_quotes( $_FILES );
}
if( get_magic_quotes_gpc() || !ini_get( "register_globals" ) ) {
	# Import or re-import the variables
	extract( $_REQUEST );
}

# Now that that's done, let's get on with business!
$wgRequestTime = microtime();

unset( $IP );
ini_set( "allow_url_fopen", 0 ); # For security...
include_once( "./LocalSettings.php" );

# Windows requires ';' as separator, ':' for Unix
$sep = ":";
ini_set( "include_path", "$IP$sep$include_path" );

include_once( "Setup.php" );

wfProfileIn( "main-misc-setup" );
OutputPage::setEncodings(); # Not really used yet

# Query string fields
#
global $action, $title, $search, $go, $target, $printable;
global $returnto, $diff, $oldid, $curid;

$title = $_REQUEST['title'];

# Placeholders in case of DB error
$wgTitle = Title::newFromText( wfMsg( "badtitle" ) );
$wgArticle = new Article($wgTitle);

$action = "view";
$wgOut->setPrintable();
$wgUser->mSkin = new SkinArticleOnly;

$wgTitle = Title::newFromURL( $title );

wfProfileOut( "main-misc-setup" );

if (1) {
	if ( Namespace::getMedia() == $wgTitle->getNamespace() ) {
		$wgTitle = Title::makeTitle( Namespace::getImage(), $wgTitle->getDBkey() );
	}	
	$wgArticle = new Article( $wgTitle );

	wfQuery("BEGIN", DB_WRITE);
			$wgOut->setSquidMaxage( $wgSquidMaxage );
			$wgArticle->$action();
	wfQuery("COMMIT", DB_WRITE);
}

$wgOut->output();
foreach ( $wgDeferredUpdateList as $up ) { $up->doUpdate(); }
logProfilingData();
wfDebug( "Request ended normally\n" );
?>
