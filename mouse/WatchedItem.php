<?php
# Copyright (C) 2003 Brion Vibber <brion@pobox.com>
# http://www.mediawiki.org/
# 
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or 
# (at your option) any later version.
# 
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
# 
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
# http://www.gnu.org/copyleft/gpl.html

class WatchedItem {

	/* static */ function &fromUserTitle( &$user, &$title ) {
		$wl = new WatchedItem;
		$wl->mUser =& $user;
		$wl->mTitle =& $title;
		$wl->id = $user->getId();
		$wl->ns = $title->getNamespace() & ~1;
		$wl->ti = $title->getDBkey();
		$wl->eti = wfStrencode( $wl->ti );
		return $wl;
	}

	function watchKey() {
		global $wgDBname;
		return "$wgDBname:watchlist:user:$this->id:page:$this->ns:$this->ti";
	}
	
	function isWatched()
	{
		# Pages and their talk pages are considered equivalent for watching;
		# remember that talk namespaces are numbered as page namespace+1.
		global $wgMemc;
		$key = $this->watchKey();
		$iswatched = $wgMemc->get( $key );
		if( is_integer( $iswatched ) ) return $iswatched;
		
		$sql = "SELECT 1 FROM watchlist WHERE wl_user=$this->id AND wl_namespace=$this->ns AND wl_title='$this->eti'";
		$res = wfQuery( $sql, DB_READ );
		$iswatched = (wfNumRows( $res ) > 0) ? 1 : 0;
		$wgMemc->set( $key, $iswatched );
		return $iswatched;
	}

	function addWatch()
	{
		# REPLACE instead of INSERT because occasionally someone
		# accidentally reloads a watch-add operation.
		$sql = "REPLACE INTO watchlist (wl_user, wl_namespace,wl_title) VALUES ($this->id,$this->ns,'$this->eti')";
		$res = wfQuery( $sql, DB_WRITE );
		if( $res === false ) return false;
		
		global $wgMemc;
		$wgMemc->set( $this->watchkey(), 1 );
		return true;
	}

	function removeWatch()
	{
		$sql = "DELETE FROM watchlist WHERE wl_user=$this->id AND wl_namespace=$this->ns AND wl_title='$this->eti' LIMIT 1";
		$res = wfQuery( $sql, DB_WRITE );
		if( $res === false ) return false;
		
		global $wgMemc;
		$wgMemc->set( $this->watchkey(), 0 );
		return true;
	}

	/* static */ function duplicateEntries( $ot, $nt ) {
		global $wgMemc, $wgDBname;
		$oldnamespace = $ot->getNamespace() & ~1;
		$newnamespace = $nt->getNamespace() & ~1;
		$oldtitle = $ot->getDBkey();
		$newtitle = $nt->getDBkey();
		$eoldtitle = wfStrencode( $oldtitle );
		$enewtitle = wfStrencode( $newtitle );

		$sql = "SELECT wl_user FROM watchlist
			WHERE wl_namespace={$oldnamespace} AND wl_title='{$eoldtitle}'";
		$res = wfQuery( $sql, DB_READ, $fname );
		if( $s = wfFetchObject( $res ) ) {
			$sql = "REPLACE INTO watchlist (wl_user,wl_namespace,wl_title)
				VALUES ({$s->wl_user},{$newnamespace},'{$enewtitle}')";
			$key = "$wgDBname:watchlist:user:$s->wl_user:page:$newnamespace:$newtitle";
			$wgMemc->set( $key, 1 );
			while( $s = wfFetchObject( $res ) ) {
				$sql .= ",({$s->wl_user},{$newnamespace},'{$enewtitle}')";
				$key = "$wgDBname:watchlist:user:$s->wl_user:page:$newnamespace:$newtitle";
				$wgMemc->set( $key, 1 );
			}
			$res = wfQuery( $sql, DB_WRITE, $fname );
			if( $res === false ) return false; # db error?
		}
		return true;
	}


}

?>
