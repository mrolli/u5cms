<?php
require('connect.inc.php');

$sql_a="DELETE FROM nonces WHERE user='".mysql_real_escape_string(u5flatidn($_COOKIE['u']))."' OR user='".mysql_real_escape_string($_COOKIE['u'])."'";
$result_a=mysql_query($sql_a);

setcookie('u', '', 0, '/', '', $httpsisinuse, true);
setcookie('p', '', 0, '/', '', $httpsisinuse, true);
if(isset($u5samlsalt)&&$u5samlsalt!='') {
    foreach (array_keys($_COOKIE) as $key) {
        if (strpos($key, 'u5saml') === 0) {
            setcookie($key, '', 0, '/', '', $httpsisinuse, true);
        }
    }
    header('Location: /saml/logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>
<body>
<script>
if(opener)self.close();
else location.href='index.php?c=loggedout&u=<?php echo rawurlencode($_GET['u'] ?? '')?>';
</script>
</body>
</html>
