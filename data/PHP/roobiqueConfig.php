<?php
	session_start();
	set_time_limit(128);
	ini_set('default_socket_timeout', 300);

	define('clientID', '68ceae6503354d5ba3ec7a3fd9c7e5ee');
	define('clientSecret', '78a876ee5b3445f3ba1ddfe531768361');
	define('websiteURL', 'http://roobique.com');
	define('redirectURI', 'http://dev.roobique.com/login/instagram');