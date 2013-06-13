<?php
	define ('DS', DIRECTORY_SEPARATOR);
	if($local) {
		define( 'DEBUG', true);
	} else {
		define( 'DEBUG', true);
	}

	define('TMP_DIR', ROOT.($local?'_local/':'').'temp/');
	define('LOG_DIR', ROOT.($local?'_local/':'').'logs/');
	
?>