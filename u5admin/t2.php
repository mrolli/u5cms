<?php if($_POST['u5scrtytknfrfrms']!=sha1($username.$password.$_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW'].date('Ymd'))&&$_POST['u5scrtytknfrfrms']!=sha1($username.$password.$_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW'].date('Ymd',time()-60*60*24)))die('<script>alert("TThe transaction could not be executed, probably because the form from which the transaction originated has been open for far too long. In most cases, a simple re-save will not help, but you can proceed as follows: If you have done valuable work in the affected form and are now unable to save it, copy the form content into a local editor program and then reload the page.");history.go(-1)</script>') ?>