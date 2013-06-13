<?php

	include_once("../application.php");
	include_once(LIB_PATH."exfunctions.php");

	//get fresh data from server
	$output=getdata($app->apiurl.'experts/4a79958bd5b64ac394377841b62586c3/categories.json', 'U2FsbWFuLkhpamF6aTpTYWxtYW4=');
	
	$rh= $output[1];		//response headers
	if($rh['http_code']==200) {		//Status OK
		$data= $output[0];
		$json_a=json_decode($data,true);
	
		$Categories = $json_a['Categories'];
		$length = count($Categories);
	
		if ($length>0) {
			$db->query("DELETE FROM ".$pre."categories");
			$stmt=$db->prepare("INSERT INTO ".$pre."categories (catid, name, parent) VALUES (:catid, :name, :parent)");
		
			foreach ($Categories as $cat) {
				$stmt->execute(array('catid'=>$cat['Id'], 'name'=>$cat['Name'], 'parent'=>($cat['ParentId'] == ""?null:$cat['ParentId'])));
			}
		}
	}
	
	echo "successfully done.";
?>