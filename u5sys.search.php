<?php 
require_once('connect.inc.php');
$siteandintranet='';
if (substr($_GET['c'],0,1)=='!' || $_GET['c']=='_searchsi') $siteandintranet='si';
?>
<form id="frm_Search" name="fsearch" method="get" action="javascript:location.href='index.php?c=_search<?php echo $siteandintranet ?>&amp;l=<?php echo $_GET['l']?>&amp;q='+escape(document.fsearch.q.value.replace(/ /g,',').replace(/\+/g,','))" onsubmit="return isterm()">
  <input type="hidden" name="l" value="<?php echo $_GET['l']?>" />
  <input type="hidden" name="c" value="_search" />

  <input onfocus="if (this.value=='Site + Intranet') this.value=this.value.replace(/Site \+ Intranet/g,'');document.getElementById('search_Input').style.color='black';document.getElementById('search_Input').style.fontStyle='normal';" id="search_Input" type="text" name="q" value="" />
  <input onclick="document.getElementById('search_Input').value=document.getElementById('search_Input').value.replace(/Site \+ Intranet/g,'')" id="search_Submit" title="<?php echo def($recherche_d,$recherche_e,$recherche_f) ?>" type="submit" class="btnSubmit" alt="search" value="" />
</form>
<script type="text/javascript">
function isterm() {
if (document.fsearch.q.value.replace(/ /g,'')=='') {
valert=jQuery('<textarea />').html("<?php echo def($term_d,$term_e,$term_f)?>").text();
alert(valert);
document.fsearch.q.focus();
return false;
}
}
document.fsearch.q.value=unescape('<?php echo (str_replace('  ',' ',str_replace(',',' ',trim($_GET['q']))))?>');
if (document.fsearch.q.value=='' && '<?php echo substr($_GET['c'],0,1) ?>'=='!') {
document.getElementById('search_Input').style.color='#aaa';
document.getElementById('search_Input').style.fontStyle='italic';
document.fsearch.q.value='Site + Intranet';
}
</script>
