<?php

	session_start();


	if (count(get_included_files()) == 1 || basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))

		{header('HTTP/1.0 403 Forbidden'); exit();}

	define('ATS', 1);



	error_reporting(E_ALL);

	ini_set('display_errors', '1');

	ini_set('memory_limit', '256M');

	$mosConfig_locale_debug = 0;

	$mosConfig_locale_use_gettext = 0;



	$hostname = $_SERVER['SERVER_NAME'];

	$local = ($hostname == 'localhost');

	$testserver = ($hostname == 'advertency.pk');



	define('ROOT', str_replace("\\", "/", dirname(__FILE__)).'/');

	define('LIB_PATH', ROOT.'lib/');
	

	require_once(LIB_PATH.'defines.php');

	require_once(LIB_PATH.'functions.php');



	spl_autoload_register('autoload');

	set_error_handler('error_to_exception');

	set_exception_handler('global_exception_handler');



	if(!is_dir(TMP_DIR)) mkdir(TMP_DIR);

	if(!is_dir(LOG_DIR)) mkdir(LOG_DIR);



	/* Database connection */	

	$ini = '_local/dbinfo.ini';

	$parse = parse_ini_file ($ini, true);

	$driver = $parse ['driver'];

	$host = $parse ['host'];

	$dbname = $parse ['dbname'];

	$dbuser = $parse ['user'];

	$dbpass = $parse ['password'];

	$db = new PDO($driver.':host='.$host.';dbname='.$dbname, $dbuser, $dbpass, array(PDO::ATTR_PERSISTENT => true,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$pre = 'ats_';

	
	$formkey = new FormKey();

	$user = new UserManager($db);
	

	/*application settings*/

	$app = new Application();

	date_default_timezone_set($app->timezone);
	
	if(!$user->isLoggedIn() && !isset($_POST['SAMLResponse'])) {
		
		header('Location: '.$app->loginpath);
		
	}

?>