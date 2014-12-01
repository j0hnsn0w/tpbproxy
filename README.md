tpbproxy
======
This script is made to "proxy" content from ThePirateBay.se

LICENCE
======
DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
		Version 2, December 2004

AUTHORS
======
@m0k1 - Main developer / Author 
@j0hnsn0w - Fixer

Nginx Rewrite
======
	if ($uri !~ "^/static/.*$"){
	set $rule_0 1;
	}
	if ($rule_0 = "1"){
	rewrite ^/([^/\.]+)?$ /index.php?x=/$1 last;
	}
	rewrite ^/([^/\.]+)/([^/]+)?$ /index.php?x=/$1/$2 last;
	rewrite ^/([^/\.]+)/([^/]+)/([^/]+)?$ /index.php?x=/$1/$2/$3 last;
	rewrite ^/([^/\.]+)/([^/]+)/([^/]+)/([^/]+)?$ /index.php?x=/$1/$2/$3/$4 last;
	rewrite ^/([^/\.]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)?$ /index.php?x=/$1/$2/$3/$4/$5 last;
	rewrite ^/([^/\.]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)?$ /index.php?x=/$1/$2/$3/$4/$5/$6 last;
