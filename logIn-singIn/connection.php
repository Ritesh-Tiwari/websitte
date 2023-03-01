
<?php
require_once('../manifest.php');

// $url        = 'http://vps191481.vps.ovh.ca';

$url        = url;
// print($url);
$url_auth   = $url . '/xmlrpc/2/common';
$url_exec   = $url . '/xmlrpc/2/object';

$db         = db;
$username   = username;
$password   = password;
// print($db);
// Ripcord can be cloned from https://github.com/poef/ripcord
require_once('../ripcord/ripcord.php');
$common = ripcord::client($url_auth);
$uid = $common->authenticate($db, $username, $password, array());
// $a = $common->version();
$models = ripcord::client($url_exec);
// print_r($a);
// echo "<br><br>";


?>