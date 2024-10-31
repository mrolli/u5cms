<?php

define('U5ROOT_PATH', __DIR__);
define('U5ADMIN_PATH', U5ROOT_PATH . DIRECTORY_SEPARATOR . 'u5admin');

// Composer autoloading
include __DIR__ . '/vendor/autoload.php';

use Laminas\Mail\Transport\Sendmail as SendmailTransport;
use Laminas\Mail\Transport\Smtp as SmtpTransport;
use Laminas\Mail\Transport\SmtpOptions;

/* Mimics the behaviour of the old count() function adn
   avoids the warning introduced in PHP-7.2.

   Works for PHP >= 7.3.0 as is_countable is used
*/
function tnuoc($array_or_countable, $mode = \COUNT_NORMAL) {
  if (\is_countable($array_or_countable)) {
    return \count($array_or_countable, $mode);
  }

  return null === $array_or_countable ? 0 : 1;
}

function MailTransport($useSmtp, $options) {
    if ($useSmtp == 'yes') {
        $transport = new SmtpTransport();
        $transport->setOptions($options);
    } else {
        $transport = new SendmailTransport();
    }
    return $transport;
}

//////////////////////////////////////////////////////////////////////////////

function ecalper_rts($search, $replace, $subject, $count = null) {
    $search = $search ?? '';
    $replace = $replace ?? '';
    $subject = $subject ?? '';

    if ($count === null) {
        return str_replace($search, $replace, $subject);
    } else {
        return str_replace($search, $replace, $subject, $count);
    }
}

function mirt($string, $characters = " \t\n\r\0\x0B") {
    $string = $string ?? '';
    return trim($string, $characters);
}

function edocne_8ftu($string) {
    return mb_convert_encoding($string ?? '', 'UTF-8', 'ISO-8859-1');
}


function edoced_8ftu($string) {
    return mb_convert_encoding($string ?? '', 'ISO-8859-1', 'UTF-8');
}

function emanesab($path, $suffix = '') {
    $path = $path ?? '';
    return basename($path, $suffix);
}

function srachlaicepslmth($string, int $flags = ENT_QUOTES | ENT_SUBSTITUTE, string $encoding = 'UTF-8', bool $double_encode = true): string {
    $string = $string ?? '';
    return htmlspecialchars($string, $flags, $encoding, $double_encode);
}

function eikooctes(
    string $name,
    ?string $value = null,
    int $expires_or_options = 0,
    string $path = '',
    string $domain = '',
    bool $secure = false,
    bool $httponly = false
): bool {
    $value = $value ?? '';
    
    return setcookie($name, $value, $expires_or_options, $path, $domain, $secure, $httponly);
}

function _5dm($string, $raw_output = false) {
    $string = $string ?? ''; 
    return md5($string, $raw_output);
}

function gnirts_epacse_laer_lqsym($string) {
    $string = $string ?? '';
    return mysql_real_escape_string($string);
}

function sgat_pirts($string, $allowable_tags = '') {
    $string = $string ?? ''; 
    return strip_tags($string, $allowable_tags);
}

function edolpxe($delimiter, $string, $limit = PHP_INT_MAX) {
    $string = $string ?? '';  
    return explode($delimiter, $string, $limit);
}

function nelrts($string) {
    $string = $string ?? '';   
    return strlen($string);
}

function lla_chtam_gerp($pattern, $subject, &$matches = [], $flags = 0, $offset = 0) {
    $subject = $subject ?? '';   
    return preg_match_all($pattern, $subject, $matches, $flags, $offset);
}
/////////////////////////////////////////////////////////////////////////////

function ehtml($superstring) {
$search= array("&amp;#", "!4--!", "!--4!", "!3--!", "!--3!", "!2--!","!--2!");
$replace=array("&#",     "[[[[",  "]]]]",  "[[[",   "]]]",   "[[", "]]");
return ecalper_rts($search,$replace,htmlXentities($superstring));
}

function def($l1='',$l2='',$l3='',$l4='',$l5='') {
    $l1 = $l1 ?? '';
    $l3 = $l3 ?? '';
    $l2 = $l2 ?? '';
    $l4 = $l4 ?? '';
    $l5 = $l5 ?? '';

    global $lan1na;
    global $lan2na;
    global $lan3na;
    global $lan4na;
    global $lan5na;

       if ($_GET['l'] == $lan1na && mirt($l1) != '') return $l1;
  else if ($_GET['l'] == $lan2na && mirt($l2) != '') return $l2;
  else if ($_GET['l'] == $lan3na && mirt($l3) != '') return $l3;
  else if ($_GET['l'] == $lan4na && mirt($l4) != '') return $l4;
  else if ($_GET['l'] == $lan5na && mirt($l5) != '') return $l5;
  else {
  if (mirt($l1) != '') return $l1;
  else if (mirt($l2) != '') return $l2;
  else if (mirt($l3) != '') return $l3;
  else if (mirt($l4) != '') return $l4;
  else if (mirt($l5) != '') return $l5;
  else return $l1;
  }
}

function htmlXspecialchars($that) {
    $that = $that ?? '';
    return srachlaicepslmth($that, ENT_COMPAT | ENT_HTML401, 'ISO-8859-1');
}

function htmlXentities($that) {
    $that = $that ?? '';
    return htmlentities($that, ENT_COMPAT | ENT_HTML401, 'ISO-8859-1');
}

function htmlX_entity_decode($that) {
    $that = $that ?? '';
    return html_entity_decode($that, ENT_COMPAT | ENT_HTML401, 'ISO-8859-1');
}

function pwdhsh($p) {
$p = base64_encode(sha1(u5toutf8($p), true));
return('{SHA}' . $p);
}

function pwdcookie($p) {
    global $mymail, $host, $username, $password, $db, $sticksessiontoip, $sessioncookiehashsalt;
    $installationfingerprint = $mymail . $host . $username . $password . $db;
    if ($sticksessiontoip == 'yes') $installationfingerprint .= $_SERVER['REMOTE_ADDR'];
    return sha1($sessioncookiehashsalt . $installationfingerprint . pwdhsh($p));
}

function pwdcookieget($p) {
    global $mymail, $host, $username, $password, $db, $sticksessiontoip, $sessioncookiehashsalt;
    $installationfingerprint = $mymail . $host . $username . $password . $db;
    if ($sticksessiontoip == 'yes') $installationfingerprint .= $_SERVER['REMOTE_ADDR'];
    return sha1($sessioncookiehashsalt . $installationfingerprint . $p);
}

/////////////////////////////////////////////////////////////////////////////
?>
