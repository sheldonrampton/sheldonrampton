<?php
# See skin.doc

class SkinArticleOnly extends Skin {

	function outputPage( &$out ) {
		global $wgDebugComments;
		
		wfProfileIn( "Skin::outputPage" );
		$this->initPage( $out );
#		$out->out( $out->headElement() );

#		$out->out( "\n<body" );
		$ops = $this->getBodyOptions();
		foreach ( $ops as $name => $val ) {
#			$out->out( " $name='$val'" );
		}
#		$out->out( ">\n" );
		if ( $wgDebugComments ) {
			$out->out( "<!-- Wiki debugging output:\n" .
			  $out->mDebugtext . "-->\n" );
		}
#		$out->out( $this->beforeContent() );

		$out->out( $out->mBodytext );

#		$out->out( $this->afterContent() );
		
		wfProfileClose();
#		$out->out( $out->reportTime() );

#		$out->out( "\n</body></html>" );
	}
	
	function getExternalLinkAttributes( $link, $text )
	{
		global $wgUser, $wgOut, $wgLang;

		$link = urldecode( $link );
		$link = $wgLang->checkTitleEncoding( $link );
		$link = str_replace( "_", " ", $link );
		$link = wfEscapeHTML( $link );

		$r = "";

		if ( 1 == $wgUser->getOption( "hover" ) ) {
			$r .= " title=\"{$link}\"";
		}
		return $r;
	}

	function getInternalLinkAttributes( $link, $text, $broken = false )
	{
		global $wgUser, $wgOut;

		$link = urldecode( $link );
		$link = str_replace( "_", " ", $link );
		$link = wfEscapeHTML( $link );

		$r = ""; 

		if ( 1 == $wgUser->getOption( "hover" ) ) {
			$r .= " title=\"{$link}\"";
		}
		return $r;
	}
	
	function getInternalLinkAttributesObj( &$nt, $text, $broken = false )
	{
		global $wgUser, $wgOut;

		$r = ""; 

		if ( 1 == $wgUser->getOption( "hover" ) ) {
			$r .= ' title ="' . $nt->getEscapedText() . '"';
		}
		return $r;
	}	

	# Pass a title object, not a title string
	function makeLinkObj( &$nt, $text= "", $query = "", $trail = "", $prefix = "" )
	{
		global $wgOut, $wgUser;
		if ( $nt->isExternal() ) {
			$u = $nt->getFullURL();
			if ( "" == $text ) { $text = $nt->getPrefixedText(); }
			$style = $this->getExternalLinkAttributes( $link, $text );

			$inside = "";
			if ( "" != $trail ) {
				if ( preg_match( "/^([a-z]+)(.*)$$/sD", $trail, $m ) ) {
					$inside = $m[1];
					$trail = $m[2];
				}
			}
			$retVal = "<a href=\"{$u}\"{$style}>{$text}{$inside}</a>{$trail}";
		} else {
			$inside = "";
			if ( "" != $trail ) {
				if ( preg_match( "/^([a-z]+)(.*)$$/sD", $trail, $m ) ) {
					$inside = $m[1];
					$trail = $m[2];
				}
			}
		    $retVal = "{$text}{$inside}{$trail}";
		}
		return $retVal;
	}

	
	
}
?>
