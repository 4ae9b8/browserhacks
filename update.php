<?php

	echo "test";

	$output = shell_exec('cd /var/www/beta.browserhacks.com/; git pull origin master;');
	echo "<pre>$output</pre>";

?>