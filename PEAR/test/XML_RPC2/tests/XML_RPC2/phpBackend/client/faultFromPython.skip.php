<?php
if (!function_exists('curl_init')) {
    print "Skip no CURI extension available";
}

$handle = @fopen("http://python.xmlrpc2test.sergiocarvalho.com:8765", "r");
if (!$handle) {
	echo("skip : The python XMLRPC server is not available !");
} else {
	fclose($handle);
}
?>
