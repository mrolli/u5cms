<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED ^ E_USER_DEPRECATED);
if ($_SERVER['QUERY_STRING']!=str_replace('c=_search','',$_SERVER['QUERY_STRING'])) header("Location: ./?".$_SERVER['QUERY_STRING']);
setcookie('dgets', $_GET['s'], time()+3600*24*365*10,'/');
setcookie('dgetf', $_GET['f'], time()+3600*24*365*10,'/');
require('connect.inc.php');
require_once('u5admin/usercheck.inc.php');
require('u5admin/backendcss.php');
if ($_GET['s']>0) $andstatus='AND status = '.mysql_real_escape_string($_GET['s']);
else $andstatus='AND status < '.mysql_real_escape_string(5);
$toolate=30;
if ($_GET['s']==5) $andstatus.=' AND lastmut>'.(time()-$toolate*24*60*60);

  $_GET['f'] = preg_replace_callback(
    '/%u(.{4})/',
    function($match){
		return "&#".hexdec("x".$match[1]).",.";
    },
    $_GET['f']
  );

//xxxxxxxxxxxxxxxxx
if ($_GET['f']!='') {


$keywords=((str_replace('  ',' ',str_replace(' ',' ',trim($_GET['f'])))));



$keywords=str_replace('"',' ',$keywords);
$keywords=str_replace('"',' ',$keywords);
//$keywords=str_replace(',',' ',$keywords);
//$keywords=str_replace('.',' ',$keywords);
$keywords=str_replace('"',' ',$keywords);
//$keywords=str_replace('+',' ',$keywords);

$keywords=str_replace('  ',' ',$keywords);
$keywords=str_replace('  ',' ',$keywords);
$keywords=str_replace('  ',' ',$keywords);


  $keywords = preg_replace_callback(
    '/%u(.{4})/',
    function($match){
      return "&#".hexdec("x".$match[1]).";";
    },
    $keywords
  );


$keywords=explode(' ',trim($keywords));

$andfilter="AND (datacsv='' ";

for ($k=0;$k<count($keywords);$k++) {
$andfilter.="OR datacsv LIKE '%".mysql_real_escape_string(str_replace(';',',.',$keywords[$k]))."%' ";
$andfilter.="OR authuser LIKE '%".mysql_real_escape_string(str_replace(';',',.',$keywords[$k]))."%' ";
$andfilter.="OR ip LIKE '%".mysql_real_escape_string(str_replace(';',',.',$keywords[$k]))."%' ";
$andfilter.="OR notes LIKE '%".mysql_real_escape_string(str_replace(';',',.',$keywords[$k]))."%' ";
$andfilter.="OR humantime LIKE '%".mysql_real_escape_string(str_replace(';',',.',$keywords[$k]))."%' ";
}
$andfilter.=')';


}

if($_GET['id']>0)$sql_a="SELECT * FROM formdata WHERE formname='".mysql_real_escape_string($_GET['n'])."' AND id='".mysql_real_escape_string($_GET['id'])."'";
else $sql_a="SELECT * FROM formdata WHERE formname='".mysql_real_escape_string($_GET['n'])."' ORDER BY id DESC LIMIT 0,1";

$result_a=mysql_query($sql_a);

if ($result_a==false) {
echo 'SQL_a-Query failed!<p>'.mysql_error().'<p><font color=red>'.$sql_a.'</font><p>';
}

if ($_GET['s']==5) echo '<br><hr><center><small>Items are automatically removed from this recycle bin list '.$toolate.' days after their deletion was selected.</small></center><hr>';

$row_a = mysql_fetch_array($result_a);
$num_a = mysql_num_rows($result_a);

if($_GET['id']<1) {
$row_a['time']=time();
$row_a['humantime']=date('Y.m.d H:i:s');
$row_a['status']=1;	
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $_GET['n'].' '.$_GET['id']?> generic formdata editor</title>
<script src="u5admin/shortcut.js"></script>
<script>
shortcut.add("Ctrl+S",function() {
document.u5form.submit();
})
</script>
</head>
<body style="background:#f3f3f3">
<h1><?php echo $_GET['n'].' '.$_GET['id']?> generic formdata editor</h1>
<iframe style="visibility:hidden" width="0" height="0" frameborder="0" name="fvifr" src="fv.php"></iframe>
<form class="unibeform" name="u5form" action="<?php echo 'editformsave.php?a='.$_GET['a'].'&amp;id='.$_GET['id'].'&amp;ti='.$row_a['time'].'&amp;hu='.rawurlencode($row_a['humantime']).'&amp;st='.$row_a['status'].'&amp;n='.$_GET['n']?>" method="post" target="fvifr">
<input type="submit" value="save" /><p>
<input type="hidden" name="thanks" value="thanks" />
<?php
$h=explode(';',$row_a['headcsv']);
for($i=0;$i<count($h)-1;$i++) {
gen($h[$i]);
}
?>
<input type="submit" value="save" />
</form>
<?php
echo '<iframe width="0" height="0" frameborder="0" src="formdataedit2.php?n='.$_GET['n'].'&id='.$_GET['id'].'&a='.$_GET['a'].'"></iframe></body></html>';
function gen($field) {
$field=substr($field,1);
echo'<label>'.str_replace('_mandatory','*',$field).'</label><br><textarea rows="3" style="width:98%" type="text" name="'.$field.'"></textarea><p>';
}
?>