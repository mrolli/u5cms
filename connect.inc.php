<?php
if(date('Y')>2024)error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED ^ E_USER_DEPRECATED);
header('X-XSS-Protection: 0');
ini_set('default_charset','iso-8859-1');
ini_set('magic_quotes_gpc', 'Off');
require_once('myfunctions.inc.php');
require_once('mysql.php');
include('config.php');
require_once('san.inc.php');
require_once('u5admin/u5idn.inc.php');

$httpsisinuse = eval($evaluateifhttpsisinuse);
if ($forcehttpsonfrontend=='yes' && !$httpsisinuse) {
    $url=ecalper_rts($searchforthisinhttpsurl,$replacewiththisinhttpsurl,'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    header('Location: ' . $url);
    echo "<script>location.href='$url'</script>";
    exit;
} else {
    $httpsisinuse = false;
}
if (isset($_GET['l']) && !is_null($_GET['l'])) $_GET['l']=srachlaicepslmth($_GET['l']);
if ($quotehandling=='on') include('quotehandling.inc.php');

function connect_to_db() {
include('config.php');

   $connected = @mysql_connect($host,$username,$password);

   if (!$connected) {
       die('Not connected to DB. Help: '.$mymail);
       exit;
       }

   $dbready = @mysql_select_db($db);

   if (!$dbready) {
      die('DB not ready. Help: '.$mymail);
      }

$sql_a="SET NAMES latin1";
$result_a=mysql_query($sql_a);
if ($result_a==false) {
echo 'SQL_a-Query failed!<p>'.mysql_error().'<p><font color=red>'.$sql_a.'</font><p>';
}

}
connect_to_db();
include('u5admin/trxlog.inc.php');
require_once('globals.inc.php');