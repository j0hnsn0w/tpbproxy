<?php

function remove_bloat($page)
{
	//Remove ads - all clean
	$page = preg_replace("@<script[^>]*?>.*?</script>@si","",$page); //no scripts
	$page = preg_replace('%<iframe.+?</iframe>%is', '', $page); //no iframes
	
	//$page = str_replace('&nbsp;Anonymous Download', '', $page);
	
	//fake ssl search bar
	//$page = str_replace('<input type="search" class="inputbox" title="Pirate Search" name="q" placeholder="Search here..." value="" /><input value="Pirate Search" type="submit" class="submitbutton" />', '<input type="search" title="Pirate Search" name="q" required placeholder="Search here..." value="" style="background-color:#ffffe0;" class="searchBox" /><input value="Pirate Search" type="submit" class="submitbutton" />', $page);

	//Designfix
	//$page = str_replace("Get this torrent", "DOWNLOAD TORRENT", $page);
	//$page = str_replace('<div style="clear:both;">(Problems with magnets links are fixed by upgrading your <a href="http://bitfalcon.tv" target="_blank">torrent client</a>!)</div>', '', $page);
	
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
	$page = str_replace("//rss.194.71.107.164/", "//anonymous.rs/rss.php?id=", $page); //change this
	
	//hide links that is not needed
	
	//$page = str_replace('<p id="footer" style="color:#666; font-size:0.9em; ">', '<p id="footer" style="color:#666; font-size:0.9em; display: none;">', $page); //hide stats in the footer
	//$page = str_replace('<p>', '<p style="display: none;">', $page); //hide links in the footer

	//hide bitcoin-litecoin-rss adresses
	//$page = str_replace('<br /><a href="http://bitcoin.org" target="_NEW">BitCoin</a>: <b><a href="bitcoin:1KeBs4HBQzkdHC2ou3gpyGHqcL7aKzwTve">1KeBs4HBQzkdHC2ou3gpyGHqcL7aKzwTve</a></b><br /><a href="http://litecoin.org" target="_NEW">LiteCoin</a>: <a href="litecoin:LiYp3Dg11N5BgV8qKW42ubSZXFmjDByjoV">LiYp3Dg11N5BgV8qKW42ubSZXFmjDByjoV</a><br /><br />', '', $page);
	
	//No rss footer
	//$page = str_replace('<a href="/rss" class="rss" title="RSS"><img src="/static/img/rss_small.gif" alt="RSS" /></a>', '', $page);
	//$page = str_replace('<span title="You are using SSL"><img src="/static/img/icon-https.gif"/></span>', '', $page);
	
	//dns prefetch
	//$page = str_replace('<link rel="dns-prefetch" href="//cdn1.adexprt.com/">', '<link rel="dns-prefetch" href="//thepiratebay.se/">', $page);
	//$page = str_replace('<link rel="dns-prefetch" href="//cdn2.adexprt.com/">', '<link rel="dns-prefetch" href="//anonymous.rs/">', $page);
	//$page = str_replace('<link rel="dns-prefetch" href="//cdn3.adexprt.com/">', '<link rel="dns-prefetch" href="//thepiratebay.se/">', $page);
	//$page = str_replace('<link rel="dns-prefetch" href="//cdn3.adexprts.com/">', '<link rel="dns-prefetch" href="//anonymous.rs/">', $page);
	//$page = str_replace('<link rel="dns-prefetch" href="//0427d7.se/">', '<link rel="dns-prefetch" href="//anonymous.rs/">', $page);
	//$page = str_replace('<link rel="dns-prefetch" href="//syndication.exoclick.com/">', '<link rel="dns-prefetch" href="//thepiratebay.se/">', $page);
	//$page = str_replace('<link rel="dns-prefetch" href="//main.exoclick.com/">', '<link rel="dns-prefetch" href="//anonymous.rs/">', $page);
	//$page = str_replace('<link rel="dns-prefetch" href="//cdn.bitfalcon.tv/">', '<link rel="dns-prefetch" href="//thepiratebay.se/">', $page);
	
	//ADS
	//$page = str_replace("<body>", "<body>", $page);
	//$page = str_replace("</body>", "</body>", $page);
	
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
