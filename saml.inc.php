<?php 
// do not include myfunction.inc.php here
if($_COOKIE['u5samlnonce']!=$u5samlnonce||!isset($_COOKIE['u5samlusername']))die('<script>location.href="saml/login.php?u='.rawurlencode($_GET['u']).'"</script>');
$founduserincookie=$_COOKIE['u5samlusername'];
$newautosamlpw=sha1($u5samlsalt.$founduserincookie.$password);

$scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
$scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);


////Backendusers
//Set new Password

//Set Logincookie
$sql_a="SELECT pw FROM accounts WHERE email='".gnirts_epacse_laer_lqsym(u5flatidnlower($founduserincookie))."'";
$result_a=mysql_query($sql_a);
if ($result_a==false) echo 'SQL_a-Query did not work!<p>'.mysql_error().'<p><font color=red>'.$sql_a.'</font><p>';
$num_a = mysql_num_rows($result_a);

if($num_a>0) {
    $row_a=mysql_fetch_array($result_a);
    if($row_a['pw']!=pwdhsh($newautosamlpw)) {
        $sql_a="UPDATE accounts SET pw='".gnirts_epacse_laer_lqsym(pwdhsh($newautosamlpw))."' WHERE email='".gnirts_epacse_laer_lqsym(u5flatidnlower($founduserincookie))."'";
        $result_a=mysql_query($sql_a);
        if ($result_a==false) die('SQL_a-Query failed!<p>'.mysql_error().'<p><font color=red>'.$sql_a.'</font><p>');

        if(mysql_affected_rows()>0)file_get_contents($scriptFolder.'/htaccess.php');
    }

    $_POST['u']=$founduserincookie;
    $_POST['p']=$newautosamlpw;
}
