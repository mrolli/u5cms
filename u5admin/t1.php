<?php require_once('connect.inc.php') ?><input name="u5scrtytknfrfrms" type="hidden" value="<?php echo sha1($username.$password.$_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW'].date('Ymd')) ?>" />