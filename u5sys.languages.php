<?php
require_once('chglang.inc.php'); 
require_once('globals.inc.php');

if ($_GET['l']==$lan5na) {
    $lancode=$lan5na;
    $nbsp='';
    if ($lan1name!='' && $lan2name!='' && $lan3name!='' && $lan4name!='') $nbsp='&nbsp;&nbsp;&nbsp;';
    if($u5showlinkofactivelanguageinmetanavi=='yes')$lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
    else $lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>';
}

else if ($_GET['l']==$lan4na) {
    $lancode=$lan4na;
    $nbsp='';
    if ($lan1name!='' && $lan2name!='' && $lan3name!='' && $lan5name!='') $nbsp='&nbsp;&nbsp;&nbsp;';
    if($u5showlinkofactivelanguageinmetanavi=='yes')$lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
    else $lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
}

else if ($_GET['l']==$lan3na) {
$lancode=$lan3na;
$nbsp='';
if ($lan1name!='' && $lan2name!='' && $lan4name!='' && $lan5name!='') $nbsp='&nbsp;&nbsp;&nbsp;';
if($u5showlinkofactivelanguageinmetanavi=='yes')$lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
else $lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
}

else if ($_GET['l']==$lan2na) {
$lancode=$lan2na;
//$lancode=$lan3na;
$nbsp='';
if ($lan1name!='' && $lan3name!='' && $lan4name!='' && $lan5name!='') $nbsp='&nbsp;&nbsp;&nbsp;';
if($u5showlinkofactivelanguageinmetanavi=='yes')$lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
else $lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
}

else {
$lancode=$lan1na;
//$lancode=$lan3na;
$nbsp='';
if ($lan3name!='' && $lan2name!='' && $lan4name!='' && $lan5name!='') $nbsp='&nbsp;&nbsp;&nbsp;';
if($u5showlinkofactivelanguageinmetanavi=='yes')$lanswitch='<a href="'.chglang($lan1na).'">'.$lan1name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
else $lanswitch='<a href="'.chglang($lan3na).'">'.$lan3name.'</a>'.$nbsp.'<a href="'.chglang($lan2na).'">'.$lan2name.'</a>'.$nbsp.'<a href="'.chglang($lan4na).'">'.$lan4name.'</a>'.$nbsp.'<a href="'.chglang($lan5na).'">'.$lan5name.'</a>';
}

if (key_exists('p', $_GET) && $_GET['p']=='2') $lanswitch='';
echo $lanswitch;
?>
