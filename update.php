<?php
	echo "bla";
	$output = shell_exec('/bin/bash update.sh');
	echo "<pre>$output</pre>";
?>