<?php

	/*==================================

	Get data content and response headers 

	(given a url, follows all redirections on it and returned content and response headers of final url)

	@return    	array[0]    content

				array[1]    array of response headers

	==================================*/

	

	function getdata( $url, $authinfo, $javascript_loop = 0, $timeout = 0, $postdata = "" ) {

		$url = str_replace( "&amp;", "&", urldecode(trim($url)) );

		$ch = curl_init();



		$fields = '';

		if (!empty($postdata)) {

			foreach($postdata as $key => $value) { 

				$fields .= ($fields==''?'?':'&').$key . '=' . $value; 

			}



			curl_setopt($ch,CURLOPT_POST, count($postdata));

			curl_setopt($ch,CURLOPT_POSTFIELDS, urlencode($fields));

		}



		curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );

		curl_setopt( $ch, CURLOPT_URL, $url);

			

		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );

		curl_setopt( $ch, CURLOPT_ENCODING, "");

		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

		curl_setopt( $ch, CURLOPT_AUTOREFERER, true );

		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls

		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );

		curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );

		curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );

	

		curl_setopt($ch, CURLOPT_VERBOSE, TRUE);

		

		$headers = array(

		  "Expect:",

		  "X-ApiKey: 95074c8fb639b45aa0acc4c23bc7c4d2",

		  "Authorization: Basic ".$authinfo

		);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

		

		$content = curl_exec( $ch );

		$response = curl_getinfo( $ch );

		curl_close ( $ch );

	

		if ($response['http_code'] == 301 || $response['http_code'] == 302)		{

			ini_set("user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");

	

			if ( $headers = get_headers($response['url']) ) {

				foreach( $headers as $value ) {

					if ( substr( strtolower($value), 0, 9 ) == "location:" )

						return get_url( trim( substr( $value, 9, strlen($value) ) ) );

				}

			}

		}

	

		if (    ( preg_match("/>[[:space:]]+window\.location\.replace\('(.*)'\)/i", $content, $value) || preg_match("/>[[:space:]]+window\.location\=\"(.*)\"/i", $content, $value) ) &&

				$javascript_loop < 5 ) {

			return getdata( $value[1], $authinfo, $javascript_loop+1 );

		} else {

			return array( $content, $response );

		}

	}

	



	function makeoptionslist ($qry, $sel="", $idcol="id", $titlecol="title", $ret='first') {

		$selval=""; $seldone = false;

		global $db;

		$stmt=$db->query($qry);

		while($row=$stmt->fetch()) {

			if(!$seldone) { if(($ret=='first' && $selval=='') || $ret=='last') $selval = $row[$idcol]; }?>

			<option <?php if(!empty($sel) && $row[$idcol]==$sel) { $selval=$sel; $seldone=true; echo 'selected="selected"'; } ?> value="<?php echo $row[$idcol]; ?>" <?php if(isset($row['countryid'])) { echo 'class="country_'.$row['countryid'].'"'; } ?>><?php echo $row[$titlecol]; ?></option>

		<?php

		}

		return $selval;

	}



	function displayLicense($row) {

		echo <<< _html

			<div class="full_row" id="lic_$row[id]">

				<div class="edit_del pull-right">

					<p class="pull-right">

						<a class="edit_info btn-link Arial" href="javascript:void(0)" onClick="AddEditDialog('license', $row[id], 'lic_$row[id]')">Edit</a>

						<a class="delete_info btn-link Arial" href="javascript:void(0)" onClick="DeleteProfInfo('license', $row[id], 'lic_$row[id]')">Delete</a>

					</p>

				</div>

				<p class="col_black Arial">$row[title]</p>

				<ul>

					<li class="Arial"><span class="">License Number</span>$row[number]</li>

					<li class="Arial"><span class="">Name of License Authority</span>$row[authority]</li>

					<li class="Arial"><span class="">State of License Authority</span>$row[state]</li>

					<li class="Arial"><span class="">Country of License Authority</span>$row[country]</li>

					<li class="Arial"><span class="">Phone number of License Authority</span>$row[phone]</li>

				</ul>

			</div>

_html;

	}

	

	function displayEducation($row, $title) {

		echo <<< _html

			<div class="full_row" id="edu_$row[id]">

				<div class="edit_del pull-right">

					<p class="pull-right">

						<a class="edit_info btn-link Arial" href="javascript:void(0)" onClick="AddEditDialog('education', $row[id], 'edu_$row[id]')">Edit</a>

						<a class="delete_info btn-link Arial" href="javascript:void(0)" onClick="DeleteProfInfo('education',$row[id], 'edu_$row[id]')">Delete</a>

					</p>

				</div>

				<p class="col_black Arial">$title</p>



				<ul>

					<li class="Arial"><span class="">Degree</span>$row[degree]</li>

					<li class="Arial"><span class="">Major Area</span>$row[major]</li>

					<li class="Arial"><span class="">Graduation Date</span>$row[grad_date]</li>

					<li class="Arial"><span class="">School Name</span>$row[institute]</li>

				</ul>

				<ul>

					<li class="Arial"><span class="">Country</span>$row[country]</li>

					<li class="Arial"><span class="">City/Town of School</span>$row[city]</li>

					<li class="Arial"><span class="">State/Region</span>$row[state]</li>

					<li class="Arial"><span class="">School Phone Number</span>$row[phone]</li>

				</ul>

			</div>

_html;

	}

	

	function displayEmployment($row, $title) {

		echo <<< _html

			<div class="full_row" id="emp_$row[id]">

				<div class="edit_del pull-right">

					<p class="pull-right">

						<a class="edit_info btn-link Arial" href="javascript:void(0)" onClick="AddEditDialog('employment', $row[id], 'emp_$row[id]')">Edit</a>

						<a class="delete_info btn-link Arial" href="javascript:void(0)" onClick="DeleteProfInfo('employment',$row[id], 'emp_$row[id]')">Delete</a>

					</p>

				</div>

				<p class="col_black Arial">$title</p>

	

				<ul>

					<li class="Arial"><span class="">Employer Name</span>$row[employer]</li>

					<li class="Arial"><span class="">Position Title</span>$row[title]</li>

					<li class="Arial"><span class="">Start Date</span>$row[fromdate]</li>

					<li class="Arial"><span class="">End Date</span>$row[todate]</li>

				</ul>

				<ul>

					<li class="Arial"><span class="">Are you the owner of the company?</span><label><input type="checkbox" class="styled"> Yes</label></li>

					<li class="Arial"><span class="">Is this your current employer?</span><label><input type="checkbox" class="styled"> Yes</label></li>

				</ul>

				<ul>

					<li class="Arial"><span class="">Company Location</span></li>

					<li class="Arial"><span class="">Country</span>United States</li>

					<li class="Arial"><span class="">City/Town</span>San Francisco</li>

					<li class="Arial"><span class="">State</span>California</li>

				</ul>

				<ul>

					<li class="Arial"><span class="">Employer Phone Number</span>415-999-9999</li>

					<li class="Arial"><span class="">Employer Contact Name</span>John Brown</li>

				</ul>

	

			</div>

_html;

	}

	

	

	function InsertUpdateData($table, $id, $args) {

	

		if($id==-1) {

			$isnew=true;

			$columns = array();

		} else { 

			$isnew = false;

			$setqry = '';

		}



		$values = array();

		foreach($args as $k => $v ) {

			if($isnew)

				$columns[] = $k;

			else

				$setqry .= ($setqry==''?'':', ').$k.'=:'.$k;

			

			$values[':'.$k] = (empty($v)?null:$v);

		}

		

		global $db;

		

		try {

			$db->beginTransaction();

			

			if($isnew) {	//new row

				$stmt = $db->prepare("INSERT INTO ".$table."(".implode(', ',$columns).") VALUES (".implode(', ',array_keys($values)).")");

			} else {

				if(!empty($setqry)) {

					$stmt = $db->prepare("UPDATE ".$table." SET ".$setqry." WHERE id=:id");

					$values['id'] = $id;	//ad the id column to the array

				}

			}

			

			$stmt->execute($values);

			if($isnew) $id=$db->lastInsertId();

			

			$db->commit();

			return (array('success'=>$id));

			

		} catch (Exception $e) {

			if($db->inTransaction()) $db->rollBack();

			return (array('error'=>$e->getMessage()));

		}

	} 
	
	
	function getNextStep($step) {
		
		switch($step) {
			case '1':
				return '<a href="personal-information">Submit personal information</a>';
				break;
				
			case '2':
				return '<a href="professional-information">Submit professional information</a>';
				break;
				
			case '3':
				return '<a href="category-tests">Complete test</a>';
				break;
				
			case '4':
				return '<a href="identity-verification">Verify Personal information</a>';
				break;
				
			case '5':
				return '<a href="professional-verification">Submit professional information</a>';
				break;
				
		}
	}
	
?>