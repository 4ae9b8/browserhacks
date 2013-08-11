<?php
	echo "bla test";

	$output = shell_exec('/bin/bash update.sh');
	echo "<pre>$output</pre>";
?>