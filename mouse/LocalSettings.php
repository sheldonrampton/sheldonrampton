<?php
# Local settings work like this: the file LocalSettings.sample
# should be copied to LocalSettings.php in the source directory
# and edited for your local file system settings and software
# configuration preferences. The install script will copy it to
# the installation path, but a copy should also remain in the
# source tree so that maintenance scripts can refer to it (you
# may want to make it a symbolic link after installation). 

# Developers: Do not check LocalSettings.php into CVS! Make
# changes to LocalSettings.sample instead.

# Note that you will find many more settings in 
# includes/DefaultSettings.php - if you want to change any of
# them, copy the variables into LocalSettings.php, and change them
# here, otherwise your settings will be overwritten with your
# next update.

# The most important setting is here: $IP is the installation
# path for the software. In the example below, the htdocs
# dir should be set as the DocumentRoot in the httpd.conf 
# configuration file of Apache. To put it more simply:
# The directory below needs to be accessible in some way
# through your web browser.
#
$IP = "/usr/www/users/rampton/drupal6/mouse";


## Don't change this bit; install.php needs it.
#
if ( ! isset( $DP ) ) { $DP = $IP; }
include_once( "$DP/DefaultSettings.php" );

## Please customize!
#
$wgSitename         = "Steal This Mouse";

# You can customize a lot of URLs and paths, but you will
# almost certainly want to customize the following.  The

# Normally the server will be auto-detected, but you can
# force the base URL. Don't forget http:// (or https://)!
#
$wgServer           = "http://www.sheldonrampton.com/mouse";

## The location of the main script, you need this to be correct!
#
$wgScriptPath	    = "http://www.sheldonrampton.com/mouse";
$wgScript           = "{$wgScriptPath}/wiki.phtml";
$wgRedirectScript   = "{$wgScriptPath}/redirect.phtml";

# ArticlePath one is especially useful if you want to use
# mod_redirect to make page-viewing URLs look static.
#
#####$wgArticlePath      = "{$wgScript}/$1";
$wgArticlePath      = "{$wgScript}?title=$1";
# $wgArticlePath     = "/wiki/$1"; # Prettier if you're setup for it

## Normally you don't need to change these once the above are set...
#
$wgStyleSheetPath   = "{$wgScriptPath}/style";
$wgStyleSheetDirectory = "{$IP}/style";

$wgUploadPath       = "{$wgScriptPath}/upload";
$wgUploadDirectory	= "{$IP}/upload";
$wgLogo				= "http://www.sheldonrampton.com/mouse/images/steamboatwillie.gif";

## Preferably these addresses should be able to receive mail asking for help
#
$wgEmergencyContact = "sheldon@prwatch.org";
$wgPasswordSender	= "Steal This Mouse Mail <apache@" . getenv( "SERVER_NAME" ) . ">";

# MySQL settings
#
# The user you specify here DOES NOT NEED TO EXIST.
# It is created by the installation script, if
# you have root privileges on your database.
#
# IF on the other hand you have only limited privs
# on your DB and have to do a manual install, use
# your existing username and password. Be sure this
# file doesn't get left around on the web legible...
#
# $wgDBsqluser is used for queries through the 
# web interface. It is also created by the script.
# Unlike the regular user, it has no write 
# permissions and can not access passwords.
#
$wgDBserver         = "db52c.pair.com";
$wgDBname           = "rampton_mouse";
$wgDBuser           = "rampton_3_w";
$wgDBpassword       = "daXpNMDV"; # Use a better password! ;)
$wgDBsqluser        = "rampton_3";
$wgDBsqlpassword	= "YfHvQDmp";

## Advanced DB settings
#
$wgDBminWordLen		= 3;	 # Match this to your MySQL fulltext

## Set these to true to turn on some optimizations when using
## MySQL 4.x:
#
$wgDBmysql4			= true;
$wgEnablePersistentLC	= true;

## You can customize the interface messages through the wiki;
## see [[MediaWiki:All pages]]. (This requires a sysop account.)
## This causes a performance hit, though; if you don't need it,
## feel free to turn it off:
#
# $wgUseDatabaseMessages = false;

## Set $wgUseImageResize to true if you want to enable dynamic
## server side image resizing ("Thumbnails")
# 
# $wgUseImageResize		= true;

## Resizing can be done using PHP's internal image libraries
## or using ImageMagick. The later supports more file formats
## than PHP, which only supports PNG, GIF, JPG, XBM and WBMP.
##
## Set $wgUseImageMagick to true to use Image Magick instead
## of the builtin functions
#
# $wgUseImageMagick		= true;
# $wgImageMagickConvertCommand    = "/usr/bin/convert";

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
# $wgUseTeX			= true;
# $wgMathPath         = "{$wgUploadPath}/math";
# $wgMathDirectory    = "{$wgUploadDirectory}/math";
# $wgTmpDirectory     = "{$wgUploadDirectory}/tmp";

$wgLocalInterwiki   = $wgSitename;

## If you want a non-English wiki, add a line like this
# $wgLanguageCode = "de";

## Character encoding: normally auto-selected by the language.
## English, German, Danish, Dutch, French, Spanish, and Swedish
## will be in ISO-8859-1 by default, all other languages in
## UTF-8 encoding. UTF-8 is more flexible, but some older browsers
## have trouble with it. You can force an English-language wiki
## to UTF-8 by uncommenting the lines below. The other languages
## mentioned above might not work properly this way without
## additional tweaking.
#
# $wgInputEncoding	= "UTF-8";
# $wgOutputEncoding	= "UTF-8";

## Extremely high-traffic wikis may want to disable
## some database-intensive features here:
#
# $wgDisableTextSearch = true;
# $wgDisableCounters = true;
# $wgMiserMode		= true;

## The following three config variables are used to define
## the rights of users in your system. 
#
# If wgWhitelistEdit is set to true, only logged in users
# are allowed to edit articles.
# If wgWhitelistRead is set to true, only logged in users
# are allowed to read articles.
#
# wgWhitelistAccount lists user types that can add user accounts:
# "key" => 1 defines permission if user has right "key".
#
# Typical setups are:
#
# Everything goes (this is the default behaviour):
# $wgWhitelistEdit = false;
# $wgWhitelistRead = false;
# $wgWhitelistAccount = array ( "user" => 1, "sysop" => 1, "developer" => 1 );
#
# Invitation-only closed shop type of system
# $wgWhitelistEdit = true;
# $wgWhitelistRead = true;
# $wgWhitelistAccount = array ( "user" => 0, "sysop" => 1, "developer" => 1 );
#
# Public website, closed editorial team
# $wgWhitelistEdit = true;
# $wgWhitelistRead = false;
# $wgWhitelistAccount = array ( "user" => 0, "sysop" => 1, "developer" => 1 );


# Squid-related settings
#
# Enable/disable Squid
# $wgUseSquid = true;
# If you run Squid3 with ESI support, enable this (default:false):
# $wgUseESI = true;
# Internal server name as known to Squid, if different
# $wgInternalServer = 'http://yourinternal.tld:8000';
# Cache timeout for the squid, will be sent as s-maxage (without ESI) or 
# Surrogate-Control (with ESI). Without ESI, you should strip out s-maxage in the Squid config.
# 18000 seconds = 5 hours, more cache hits with 2678400 = 31 days
# $wgSquidMaxage = 18000;
# A list of proxy servers (ips if possible) to purge on changes
# don't specify ports here (80 is default)
# $wgSquidServers = array('127.0.0.1');
?>
