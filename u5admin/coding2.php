<?php require_once('connect.inc.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php require('backendcss.php'); ?></head>
<body bgcolor="#339900" text="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
if ($cssRqHIADRI!='no') require('accadmin.inc.php');
require('archivecheck.inc.php');
require('delcheck.inc.php');

if ($_POST['name']=='htmltemplate') {
$teststr=$_POST['content_d'];
$teststr=str_replace("\t",' ',$teststr);
$teststr=str_replace("\r",' ',$teststr);
$teststr=str_replace("\n",' ',$teststr);
$teststr=str_replace('  ',' ',$teststr);
$teststr=str_replace('  ',' ',$teststr);
$teststr=str_replace('  ',' ',$teststr);
$teststr=str_replace('  ',' ',$teststr);
if (strpos(strtolower('xxx'.$teststr),'<body id=\"body\"')>1) die('<script>alert("ERROR: Cannot save because your server automatically adds slashes. Solve this problem by setting $quotehandling=\'on\' in config.php in the CMS directory on your server.")</script>');
if (strpos(strtolower('xxx'.$teststr),'<body id="body"')<1) die('<script>alert("ERROR: Cannot save htmltemplate because it is not containing a correct body tag. The body tag MUST have the id body as first attribute like this: <body id=\"body\">")</script>');
}

$sql_a="SELECT operator,ip,lastmut FROM resources WHERE name='".mysql_real_escape_string($_POST['name'])."'";
$result_a=mysql_query($sql_a);
if ($result_a==false) {
echo 'SQL_a-Query failed!<p>'.mysql_error().'<p><font color=red>'.$sql_a.'</font><p>';
}
$row_a = mysql_fetch_array($result_a);

if ($_POST['coco']<$row_a['lastmut'] && (($checksaveversionconflictinbackend!='none'&&$checksaveversionconflictinbackend!='foreign')||($checksaveversionconflictinbackend=='foreign'&&trim(u5flatidnlower($row_a['operator']))!=trim(u5flatidnlower($_SERVER['PHP_AUTH_USER'])))) ) {
$conflict='(!)';
?>
<div style="display:none" id="e"><?php echo str_replace('<','',str_replace('>','',$row_a['operator'])) ?></div>
<script>
msgconflict='CONFLICT(!)\n\nYour data has been saved only in the section �text versions� but it is not functional.\n\nReason: '+document.getElementById('e').innerHTML+' has saved this data in a new version during your editing session (at <?php echo date('Y-m-d H:i:s',$row_a['lastmut'])?>).\n\nPlease find your changes in the section �text versions� and merge it manually into '+document.getElementById('e').innerHTML+'\'s work.';
</script>
<?php
}

else {
$conflict='';
require('delold.php');
$sql_a="INSERT INTO resources (name,content_d,content_e,content_f,title_d,title_e,title_f,desc_d,desc_e,desc_f,key_d,key_e,key_f,logins,hidden,operator,ip,lastmut,deleted,typ) VALUES
(
'".mysql_real_escape_string($_POST['name'])."',
'".mysql_real_escape_string($_POST['content_d'])."',
'".mysql_real_escape_string($_POST['content_e'])."',
'".mysql_real_escape_string($_POST['content_f'])."',
'".mysql_real_escape_string($_POST['title_d'])."',
'".mysql_real_escape_string($_POST['title_e'])."',
'".mysql_real_escape_string($_POST['title_f'])."',
'".mysql_real_escape_string($_POST['desc_d'])."',
'".mysql_real_escape_string($_POST['desc_e'])."',
'".mysql_real_escape_string($_POST['desc_f'])."',
'".mysql_real_escape_string($_POST['key_d'])."',
'".mysql_real_escape_string($_POST['key_e'])."',
'".mysql_real_escape_string($_POST['key_f'])."',
'".mysql_real_escape_string($_POST['logins'])."',
0,
'".mysql_real_escape_string(u5flatidnlower($_SERVER['PHP_AUTH_USER']))."',
'".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."',
'".time()."',$deleted,'".mysql_real_escape_string($_GET['typ'])."')";


$result_a=mysql_query($sql_a);

if ($result_a==false) {
die('SQL_a-Query failed!<p>'.mysql_error().'<p><font color=red>'.$sql_a.'</font><p>');
}

else echo "<script>parent.document.getElementById('changes').value=0;parent.document.getElementById('savebutton').style.background='lightgreen';parent.document.getElementById('bodyid').style.background='#335C33'</script>";

} // else if coco

$sql_a="INSERT INTO resources_log (name,content_d,content_e,content_f,title_d,title_e,title_f,desc_d,desc_e,desc_f,key_d,key_e,key_f,logins,hidden,operator,ip,lastmut,deleted,typ) VALUES
(
'".mysql_real_escape_string($_POST['name'])."',
'".mysql_real_escape_string($_POST['content_d'])."',
'".mysql_real_escape_string($_POST['content_e'])."',
'".mysql_real_escape_string($_POST['content_f'])."',
'".mysql_real_escape_string($_POST['title_d'])."',
'".mysql_real_escape_string($_POST['title_e'])."',
'".mysql_real_escape_string($_POST['title_f'])."',
'".mysql_real_escape_string($_POST['desc_d'])."',
'".mysql_real_escape_string($_POST['desc_e'])."',
'".mysql_real_escape_string($_POST['desc_f'])."',
'".mysql_real_escape_string($_POST['key_d'])."',
'".mysql_real_escape_string($_POST['key_e'])."',
'".mysql_real_escape_string($_POST['key_f'])."',
'".mysql_real_escape_string($_POST['logins'])."',
0,
'".mysql_real_escape_string($_SERVER['PHP_AUTH_USER'].$conflict)."',
'".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."',
'".time()."','$deleted','".mysql_real_escape_string($_GET['typ'])."')";


$result_a=mysql_query($sql_a);

if ($result_a==false) {
die('SQL_a-Query failed!<p>'.mysql_error().'<p><font color=red>'.$sql_a.'</font><p>');
}

require('putcss.inc.php');

trxlog('code'.$conflict.' '.$_POST['name']);
?>
<div style="margin:-2px 0 0 2px;white-space: nowrap;" onmouseover="this.title=this.innerHTML" onclick="alert(this.innerHTML)">saved <?php echo $_POST['name']?></div>
<script>
if (parent && parent.opener && parent.opener.parent && parent.opener.parent.save) parent.opener.parent.save.location.href='done.php?n=<?php echo $conflict ?>updated <?php echo $_POST['name']?>';
//setTimeout("history.go(-1)",1111);
if (parent && parent.form1.coco) parent.form1.coco.value='<?php echo time() ?>';
</script>
<?php
if ($conflict!='') echo "
<script>
parent.document.getElementById('changes').value=0;
setTimeout(\"foundconflict()\",1);
function foundconflict() {
alert(msgconflict);
top.location.href=top.location.href;
window.open('textversions.php?c=".$_POST['name']."','_blank','toolbar=0,location=0,status=1,screenX=1000,screenY=0,top=0,left=1000,menubar=0,scrollbars=1,resizable=1,width=640,height=500');
}
</script>";
?>
</body>
</html>
