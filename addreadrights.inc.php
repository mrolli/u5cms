<?php 
if($_GET['c']=='' && $_GET['n']!='') $_GET['c']=$_GET['n']; 
$sql_a="SELECT content_1, content_2, content_3, content_4, content_5 FROM resources WHERE name='".mysql_real_escape_string($_GET['c'])."'";
$result_a=mysql_query($sql_a);
if ($result_a==false) {
echo 'SQL_a-Query failed!<p>'.mysql_error().'<p><font color=red>'.$sql_a.'</font><p>';
}
$row_a = mysql_fetch_array($result_a);
$cmdstring=$row_a['content_1'].$row_a['content_2'].$row_a['content_3'].$row_a['content_4'].$row_a['content_5'];

if (strpos($cmdstring,'TOADDITEMS_LOGINS_SAME_AS_[')>1) {
$loginsfrompage=explode('TOADDITEMS_LOGINS_SAME_AS_[',$cmdstring);
$loginsfrompage=explode(']',$loginsfrompage[1]);
$thatpage=trim($loginsfrompage[0]);
require('login.inc.php');
require('checkaddself.inc.php');
}

else {
require_once('u5admin/usercheck.inc.php');
if ($formdataRqHIADRI!='no') require('u5admin/accadmin.inc.php');
}
?>