<?php

function remove_bloat($page)
{
	//Remove ads - all clean
	$page = preg_replace("@<script[^>]*?>.*?</script>@si","",$page); //no scripts
	$page = preg_replace('%<iframe.+?</iframe>%is', '', $page); //no iframes
	
	$page = str_replace('&nbsp;Anonymous Download', '', $page);
	
	//fake ssl search bar
	$page = str_replace('<input type="search" class="inputbox" title="Pirate Search" name="q" placeholder="Search here..." value="" /><input value="Pirate Search" type="submit" class="submitbutton" />', '<input type="search" title="Pirate Search" name="q" required placeholder="Search here..." value="" style="background-color:#ffffe0;" class="searchBox" /><input value="Pirate Search" type="submit" class="submitbutton" />', $page);

	//Designfix
	$page = str_replace("Get this torrent", "DOWNLOAD TORRENT", $page);
	$page = str_replace('<div style="clear:both;">(Problems with magnets links are fixed by upgrading your <a href="http://bitfalcon.tv" target="_blank">torrent client</a>!)</div>', '', $page);
	
	//SearchFix
	$page = str_replace("/s/", "/search.php", $page);
	
	//CharFix
	$page = str_replace('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>', '<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">', $page);
	$page = str_replace('amp;', '', $page);

	//Fix static link
	$page = str_replace("http://static.thepiratebay.se", "static", $page);
	$page = str_replace('https://static.thepiratebay.se', '/static', $page);
	$page = str_replace("//static.thepiratebay.se", "static", $page);
	$page = str_replace("//static.thepiratebay.org", "static", $page);
	$page = str_replace("http://torrents.thepiratebay.se/", "gettorrent.php?torrent=", $page);
	$page = str_replace("//torrents.thepiratebay.se/", "gettorrent.php?torrent=", $page);
	$page = str_replace("https://thepiratebay.se", "http://anonymous.rs", $page); //change this
	$page = str_replace("http://thepiratebay.se", "http://anonymous.rs", $page); //change this
	$page = str_replace("http://thepiratebay.org", "http://anonymous.rs", $page); //change this
	$page = str_replace("https://thepiratebay.org", "http://anonymous.rs", $page); //change this
	
	//Proxy the images
	//$page = str_replace("image.bayimg.com/","/img.php?i=", $page);
	//$page = str_replace("proxy.bayimg.com/","/img.php?i=", $page);
	
	//RSS Proxy fix
	$page = str_replace("http://rss.thepiratebay.se/", "/rss.php?id=", $page);
	$page = str_replace("//rss.194.71.107.81/", "//anonymous.rs/rss.php?id=", $page); //change this
	
	//Remove links that is not needed
	$page = str_replace("var urlToShow", "var Nothing", $page);
	$page = str_replace("setCookie(name, value)", "setCookieGone(name, value)", $page);
	$page = str_replace("getCookie(name)", "getCookieGone(name)", $page);
	
	$page = str_replace('<a href="/login" title="Login">Login</a> |', '', $page);
	$page = str_replace('<a href="/register" title="Register">Register</a> |', '', $page);
	$page = str_replace('<a href="/language" title="Select language">Language / Select language</a> |', '', $page);
	$page = str_replace('<a href="/about" title="About">About</a> |', '', $page);
	$page = str_replace('<a href="/legal" title="Legal threats">Legal threats</a> |', '', $page);
	$page = str_replace('<a href="/blog" title="Blog">Blog</a>
			<br />', '', $page);
	
	$page = str_replace('<a href="/contact" title="Contact us">Contact us</a> |', '', $page);
	$page = str_replace('<a href="/policy" title="Usage policy">Usage policy</a> |', '', $page);
	$page = str_replace('<a href="/downloads" title="Downloads">Downloads</a> |', '', $page);
	$page = str_replace('<a href="http://www.promobay.org/" title="Promo" target="_NEW">Promo</a> |', '', $page);
	$page = str_replace('<a href="/doodles" title="Doodles">Doodles</a> |', '', $page);
	$page = str_replace('<a href="/tags" title="Tag Cloud">Tag Cloud</a> |', '', $page);
	$page = str_replace('<a href="http://suprbay.org/" title="Forum" target="_blank">Forum</a> |', '', $page);
	$page = str_replace('<a href="http://piratebrowser.com/" title="PirateBrowser" target="_blank"><strong>PirateBrowser</strong></a>
			<br />', '', $page);
	
	$page = str_replace('<a href="http://bayfiles.net" title="Bayfiles" target="_blank">Bayfiles</a> |', '', $page);
	$page = str_replace('<a href="http://bayimg.com" title="BayImg" target="_blank">BayImg</a> |', '', $page);
	$page = str_replace('<a href="http://pastebay.net" title="PasteBay" target="_blank">PasteBay</a> |', '', $page);
	$page = str_replace('<!-- <a href="https://twitter.com/tpbdotorg" title="Twitter" target="_blank">Follow TPB on Twitter</a> | -->', '', $page);
	$page = str_replace('<a href="https://www.facebook.com/ThePirateBayWarMachine" title="Facebook" target="_blank">Follow TPB on Facebook</a>
			<br />', '', $page);
	
	$page = str_replace("<a href=\"http://bayporn.me\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://bayporn.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://bayporn.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://bayporn.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://bayporn.in\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://bayporn.info\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://themusicbay.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://themusicbay.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://themusicbay.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://themusicbay.info\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://torrindex.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://torrindex.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://torrindex.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://torrindex.info\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://torrindex.in\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://sharereactor.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://sharereactor.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://sharereactor.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://sharereactor.info\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://tvbay.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://tvbay.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://tvbay.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://thebootlegbay.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://thebootlegbay.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://thebootlegbay.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://thebootlegbay.info\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://thevideobay.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://thevideobay.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://thevideobay.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://thevideobay.info\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://torrentfiles.in\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://torrentfiles.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://torrentfiles.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://torrentfiles.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://scenerelease.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://scenerelease.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://scenerelease.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://thetvbay.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://thetvbay.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://thetvbay.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://suprbay.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://suprbay.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://suprbay.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	$page = str_replace("<a href=\"http://superbay.net\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://superbay.org\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	$page = str_replace("<a href=\"http://superbay.com\" title=\"Proxy\" target=\"_blank\">Proxy</a> |", "", $page);
	
	//bitcoin-litecoin-rss adresses
	$page = str_replace('<br /><a href="http://bitcoin.org" target="_NEW">BitCoin</a>: <b><a href="bitcoin:1KeBs4HBQzkdHC2ou3gpyGHqcL7aKzwTve">1KeBs4HBQzkdHC2ou3gpyGHqcL7aKzwTve</a></b><br /><a href="http://litecoin.org" target="_NEW">LiteCoin</a>: <a href="litecoin:LiYp3Dg11N5BgV8qKW42ubSZXFmjDByjoV">LiYp3Dg11N5BgV8qKW42ubSZXFmjDByjoV</a><br /><br />', '', $page);
	
	//No rss footer
	$page = str_replace('<a href="/rss" class="rss" title="RSS"><img src="/static/img/rss_small.gif" alt="RSS" /></a>', '', $page);
	$page = str_replace('<span title="You are using SSL"><img src="/static/img/icon-https.gif"/></span>', '', $page);
	
	//dns prefetch
	$page = str_replace('<link rel="dns-prefetch" href="//cdn1.adexprt.com/">', '<link rel="dns-prefetch" href="//thepiratebay.se/">', $page);
	$page = str_replace('<link rel="dns-prefetch" href="//cdn2.adexprt.com/">', '<link rel="dns-prefetch" href="//anonymous.rs/">', $page);
	$page = str_replace('<link rel="dns-prefetch" href="//cdn3.adexprt.com/">', '<link rel="dns-prefetch" href="//thepiratebay.se/">', $page);
	$page = str_replace('<link rel="dns-prefetch" href="//cdn3.adexprts.com/">', '<link rel="dns-prefetch" href="//anonymous.rs/">', $page);
	$page = str_replace('<link rel="dns-prefetch" href="//0427d7.se/">', '<link rel="dns-prefetch" href="//anonymous.rs/">', $page);
	$page = str_replace('<link rel="dns-prefetch" href="//syndication.exoclick.com/">', '<link rel="dns-prefetch" href="//thepiratebay.se/">', $page);
	$page = str_replace('<link rel="dns-prefetch" href="//main.exoclick.com/">', '<link rel="dns-prefetch" href="//anonymous.rs/">', $page);
	$page = str_replace('<link rel="dns-prefetch" href="//cdn.bitfalcon.tv/">', '<link rel="dns-prefetch" href="//thepiratebay.se/">', $page);
	
	//ADS
	$page = str_replace("<body>", "<body>", $page);
	$page = str_replace("</body>", "</body>", $page);
	
	//Switch view not yet supported
	$page = str_replace("<a href=\"/switchview.php?view=s\">Single</a>", "<a href=\"#\" onClick=\"alert('This feature is not yet supported.')\">Single</a>", $page);
	$page = str_replace("<div class=\"detailartist\"", "<div class=\"detailartist\" style=\"display:none; visibility:hidden;\"", $page);
	//Remove detailed artist info that doesnt work
	$page = str_replace("ajax_details_artinfo.php", "", $page);
	return $page;
}

function get_data($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
//	curl_setopt($ch, CURLOPT_USERAGENT, 'TMB Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_ENCODING, "");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_MAXCONNECTS, 320);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function search_curl($url)
{
	$ch      = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	$header = curl_exec($ch);
	$retVal = array();
	$fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $header));
	foreach ($fields as $field)
	{
		if (preg_match('/([^:]+): (.+)/m', $field, $match))
		{
			$match[1] = preg_replace('/(?<=^|[\x09\x20\x2D])./e', 'strtoupper("\0")', strtolower(trim($match[1])));
			if (isset($retVal[$match[1]]))
			{
				$retVal[$match[1]] = array(
					$retVal[$match[1]],
					$match[2]
				);
			}
			else
			{
				$retVal[$match[1]] = trim($match[2]);
			}
		}
	}
	if (isset($retVal['Location']))
	{
		$data = $retVal['Location'];
	}
	else
	{
		$data = $_GET[$urlKey];
	}
	curl_close($ch);
	return $data;
}

?>
