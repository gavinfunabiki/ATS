	<div class="inner"><?php
		$errCodes=array('0'=>'Undefined', 
					'101'=>'Session Expired', 
					'400'=>'Bad Request', 
					'401'=>'Authorization Required', 
					'402'=>'Payment Required (not used yet)', 
					'403'=>'Forbidden', 
					'404'=>'Not Found', 
					'405'=>'Method Not Allowed', 
					'406'=>'Not Acceptable (encoding)', 
					'407'=>'Proxy Authentication Required', 
					'408'=>'Request Timed Out', 
					'409'=>'Conflicting Request', 
					'410'=>'Gone', 
					'411'=>'Content Length Required', 
					'412'=>'Precondition Failed', 
					'413'=>'Request Entity Too Long', 
					'414'=>'Request URI Too Long', 
					'415'=>'Unsupported Media Type', 
					'500'=>'Internal Server Error', 
					'501'=>'Not Implemented', 
					'502'=>'Bad Gateway', 
					'503'=>'Service Unavailable', 
					'504'=>'Gateway Timeout', 
					'505'=>'HTTP Version Not Supported');
	$er=(empty($_GET['e'])?(empty($err_class)?0:$err_class):$_GET['e']);
	echo ('<p class="element">The following error occured while accessing the document.<br>'.$er.':'.$errCodes[$er].'</p>'); 
	?>
	</div>
