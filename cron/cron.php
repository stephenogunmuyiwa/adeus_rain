<?php 




	$last_update = $db->query("SELECT value FROM meta_data WHERE meta='last-server-update'")->fetchArray(SQLITE3_ASSOC)['value'];

	if ($last_update=='' or @(time() - $last_update)>30 ) {
		if ($mode=='live') {
			exec("php /var/www/html/cron/post_sockets_summary.php &");	
		}
		$db->exec("UPDATE meta_data SET value='".time()."' WHERE meta='last-server-update'");
	}



 ?>