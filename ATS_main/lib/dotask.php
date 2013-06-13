<?php

	include("../application.php");



	if($local) sleep(2);

	

	if(empty($_GET['task'])) {

		$output['error']='no task';

		echo json_encode($output);

		exit();

	}



	$task=$_GET['task'];

	$output=array();

	###########################################################################################################################

	if($task=='delfile') {

		if(!empty($_GET['nm'])) {

			@unlink(ROOT.$_GET['nm']);

			$output['success']="deleted";

		}

	###########################################################################################################################

	} elseif($task=='showsubcats') {

		if(!empty($_GET['parentid'])) {

			$parentid = $_GET['parentid'];



			$stmt=$db->query('select title from '.$pre.'categories where id='.$db->quote($parentid));

			list($parenttitle)=$stmt->fetch();



			ob_start();

			

			echo <<< _html

				<div class='mod-header'><h3>Select your categories within $parenttitle</h3></div>

				<br />

				<form onSubmit="return false;" class="form-inline clearfix" id="frmsubcats" action="lib/dotask.php?task=savecats">

					<input type="hidden" value ="$parentid" name = "parentid">

_html;

					$stmt=$db->prepare('select *, (select userid from '.$pre.'usercats where userid='.$user->id.' and catid=c.id) as sel from '.$pre.'categories c where parent=:parent');

					$stmt->execute(array('parent'=>$parentid));

					if($stmt->rowCount()!=0) {

						while($row=$stmt->fetch()) {

							$checked = ($row['sel']?'checked="checked"':'');

							

							echo <<< _html

								<div class="current_label">

									<label class="checkbox modalpopover cstyle" data-toggle="popover" data-trigger="hover" data-original-title="$row[title]" data-content="$row[remarks]" title="">

										<input type="checkbox" $checked value="$row[id]" title="$row[title]" name="categoryid[]" class="styled"  />

										$row[title]

									</label>

								</div>

_html;

						}	//end loop

					}

					echo <<< _html

				</form>

_html;



			$output['success']=ob_get_clean();

		}

	###########################################################################################################################

	} elseif($task=='savecats') {

		

		if($user->id<=0) {

			$output['error']='No user';

		} else {

			try {

				//first remove all the sub categories for this specific category

				$stmtpar=$db->prepare('DELETE FROM '.$pre.'usercats WHERE status = 1 and userid='.$user->id.' and catid in (select id from '.$pre.'categories where parent = :parent)');

				$stmt = $db->prepare('INSERT INTO '.$pre.'usercats (userid, catid) VALUES (:userid, :catid)');



				$db->beginTransaction();

				

				$stmtpar->execute(array('parent'=>$_POST['parentid']));

				if(isset($_POST['categoryid']) && count($_POST['categoryid'])>0) {

					foreach($_POST['categoryid'] as $catid)

						$stmt->execute(array('userid'=>$user->id, 'catid'=>$catid));

				}

				

				$db->commit();

				$output['success']="Saved";

			} catch (Exception $e) {

				if($db->inTransaction()) $db->rollBack();

				$output['error']=$e->getMessage();

			}

		}

		

	###########################################################################################################################

	} elseif($task=='savepersonalinfo') {

		if($formkey->validate()) {

			try {

				if(!isset($_POST['terms-and-conditions']) || (isset($_POST['terms-and-conditions']) && $_POST['terms-and-conditions']!='on'))

					throw new Exception ('You must agree to terms and conditions.');

				

				if(!empty($_POST['filename'])) { 

					$fn = ROOT.$_POST['filename'];

					$resumeup = is_file($fn);

				} else

					$resumeup = false;

				

				$db->beginTransaction();

				$stmt = $db->prepare("UPDATE ".$pre."users SET firstname=:firstname, lastname=:lastname, countryid=:countryid, wherehearid=:wherehearid, timezoneid=:timezoneid, resumeup=:resumeup, timeplan=:timeplan WHERE id=:id");

				$stmt->execute(array('id'=>$user->id,'firstname'=>$_POST['firstname'], 'lastname'=>$_POST['lastname'], 'countryid'=>$_POST['country'], 'wherehearid'=>(empty($_POST['wherehear'])?null:$_POST['wherehear']), 'timezoneid'=>$_POST['timezone'], 'resumeup'=>($resumeup?'0':'0'), 'timeplan'=>$_POST['timeplan']));

				
				
				$stmt = $db->prepare("UPDATE ".$pre."usercats SET status=:status WHERE userid=:userid AND status=1");

				$stmt->execute(array('status'=>2, 'userid'=>$user->id));
				
				

				$db->query('DELETE FROM '.$pre.'usertimes WHERE userid = '.$user->id);

				if($_POST['timeplan']==1) {

					$stmt = $db->prepare('INSERT INTO '.$pre.'usertimes(userid, timeid) VALUES (:userid, :timeid)');

					foreach($_POST['chk'] as $ut) {

						$stmt->execute(array('userid'=>$user->id, 'timeid'=>$ut));

					}

				}

				

				if(!empty($fn) &&  is_file($fn)) {

					$pathinfo = pathinfo(ROOT.$fn);


					$ext = isset($pathinfo['extension']) ? $pathinfo['extension'] : 'doc';
					
					$newfile = $app->uppath."resumes/".$user->id.".".$ext;

					rename($fn, $newfile);
					
					# Open a file to get the binary data
					$handle = fopen($newfile, "rb");
					$contents = fread($handle, filesize($newfile));
					fclose($handle);
				
					# Create SoapClient used to call the parse document method
					$client = new SoapClient("http://processing.resumeparser.com/ParsingTools.soap?wsdl");
				
					# Add your keys in here
					$product_code = "5356739b6e0a296acce7a4b607487a73";
				
					# Call the parse document method
					$result = $client->ParseDocNew($product_code, "Test.docx", base64_encode($contents), "", "", "", "");
				
					# Print results
					echo $result."\n";
					

				}

				$db->commit();

				$output['success']="Saved";

			} catch (Exception $e) {

				if($db->inTransaction()) $db->rollBack();

				$output['error']=$e->getMessage();

			}

		}

	###########################################################################################################################

	} elseif($task=='verifynetidme') {

		if($_POST['iptask']=='save_continue') {
			
//			$db->beginTransaction();

	//		$stmt = $db->prepare("UPDATE ".$pre."users SET firstname=:firstname, lastname=:lastname, countryid=:countryid, wherehearid=:wherehearid, timezoneid=:timezoneid, resumeup=:resumeup, timeplan=:timeplan WHERE id=:id");

		//	$stmt->execute(array('id'=>$user->id,'firstname'=>$_POST['firstname'], 'lastname'=>$_POST['lastname'], 'countryid'=>$_POST['country'], 'wherehearid'=>(empty($_POST['wherehear'])?null:$_POST['wherehear']), 'timezoneid'=>$_POST['timezone'], 'resumeup'=>($resumeup?'1':'0'), 'timeplan'=>$_POST['timeplan']));
			
			$soapClient = new SoapClient("https://webservices.beta.netidme.com/verify/v3/service.svc?wsdl",

			array('login' => $app->netidme_username, 
				  'password' => $app->netidme_password,
				  'trace' => 1,
				  'exceptions' => true));
				  
			$name = array (
				'Title' => $_POST['title'],
				'FirstName' => $_POST['firstname'],
				'MiddleNames' => $_POST['middlename'],
				'LastName' => $_POST['lastname']
			);
			
			$dob_seg = explode('/', $_POST['dob']);
			
			$dob = array (
				'DayOfBirth'=> $dob_seg[0],				
				'MonthOfBirth' => $dob_seg[1],				
				'YearOfBirth' => $dob_seg[2]				
			);
			
			$lineaddress = array(
				'Line1' => $_POST['address_line1'],
				'Line2' => $_POST['address_line2'],
				'Line3' => $_POST['address_line3']
			);
			
			
			$stmt = $db->query('select cc from '.$pre.'countries where id='.$_POST['country']);
			$row = $stmt->fetch();
			
			$Address = array (
				'LineFormatAddress' => $lineaddress,
				'PostalCode' => $_POST['zip'],
				'TwoLetterISOCountryCode'=> $row['cc']
			);
			
			
			$queryData = array(	
							'CustomerReferenceID' => 'UniqueCustomerReference', 
							'Name' => $name, 
							'DOB' => $dob, 
							'Address' => $Address
							//'IsMale' => 'true'
						 	);

			
			$VerificationData = array('VerificationData' => $queryData, 'ConfigurationProfileName' => $app->netidme_policy);
			$VerificationRequest = array('VerificationRequest' => $VerificationData);
			
			try {
			
				$result = $soapClient->__soapcall('Verify', array($VerificationRequest));
				
				if (is_soap_fault($result)) {
				  
					trigger_error('SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})', E_USER_ERROR);
				  
				} else {
				
					$IdentityCheckPassed = $result->VerifyResult->IdentityCheckPassed;
					
					if($IdentityCheckPassed == 1) {
					
						$questions = $result->VerifyResult->KBVQuestions->KBVQuestion;
						
						$questions['TransactionID'] = $result->VerifyResult->TransactionID;
						
						$output['success'] = $questions;
					
					} else {
					
						$output['success'] = 'Failed Verification One';
						
					}
					
				}
			} catch (Exception $e) {
				if (is_soap_fault($e)) {
					print_r($e);
				}
			}
			
			
		} elseif(isset($_POST['save_exit'])){
			
			$output['success']="Saved";
			
		}
				
	
	###########################################################################################################################

	} elseif($task=='verifynetidmequestions') {
		
		if($_POST['iptask']=='save_continue') {
			
			$soapClient = new SoapClient("https://webservices.beta.netidme.com/verify/v3/service.svc?wsdl",

			array('login' => $app->netidme_username, 
				  'password' => $app->netidme_password,
				  'trace' => 1,
				  'exceptions' => true));
			
			$answer1= array('QuestionNumber' => '1', 'QuestionAnswer' => $_POST['question_1']);
			$answer2= array('QuestionNumber' => '2', 'QuestionAnswer' => $_POST['question_2']);
			$answer3= array('QuestionNumber' => '3', 'QuestionAnswer' => $_POST['question_3']);
		   
			$answersArray = array($answer1, $answer2, $answer3);
			
			$KBVPackage = array('TransactionID' => $_POST['TransactionID'], 'KBVAnswers' => $answersArray);
			
			try {
			
				$result = $soapClient->__soapcall('AnswerQuestions',array($KBVPackage));
				
				if (is_soap_fault($result)) {
				  
					trigger_error('SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})', E_USER_ERROR);
				  
				} else {
				
					if($result->AnswerQuestionsResult == 'Pass') {
						
						$output['success'] = 'Successful Verification';
						
					} elseif($result->AnswerQuestionsResult == 'Fail') {
						
						$output['success'] = 'Failed Verification Two';
						
					}
					
				}
			} catch (Exception $e) {
				if (is_soap_fault($e)) {
					print_r($e);
				}
			}
		
		}
		
		
	###########################################################################################################################

	} elseif($task=='addedit') {

		

		if(empty($_GET['table'])) {

			$output['error']='Invalid data';

		} else {

			require_once(LIB_PATH."exfunctions.php"); 
			
			$formid = 'modalform'.rand();

			ob_start();?>
            
            <div style="padding:20px;">

            <form onsubmit="return false;" data-beforesubmit="" data-aftersubmit="onSuccess" action="lib/dotask.php?task=saveprofinfo" method="post" class="validate" style="display:none;">

                <input type="hidden" name="id" value="<?php echo (empty($_GET['id'])?'':$_GET['id']); ?>">

                <input type="hidden" name="userid" value="<?php echo $user->id; ?>">

                <input type="hidden" name="table" value="<?php echo $_GET['table']; ?>"><?php
				

				############################################### LICENSE FORM ############################################################################

				if($_GET['table']=='license') {

					if(!empty($_GET['id'])) {

						$stmt=$db->query('SELECT * FROM '.$pre.'userlicenses WHERE id = '.$_GET['id'].' limit 1');

						$row=$stmt->fetch();

					}?>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label text" for="txttitle">License Title/Type:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="title" id= "txttitle" type="text" value="<?php echo (isset($row['title'])?$row['title']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>





                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtnumber">License Number:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="number" id= "txtnumber"  type="text" value="<?php echo (isset($row['number'])?$row['number']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtauthority">Name of License Authority:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="authority" id= "txtauthority"  type="text" value="<?php echo (isset($row['authority'])?$row['authority']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>





                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtstate">State:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="state" id= "txtstate"  type="text" value="<?php echo (isset($row['state'])?$row['state']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtcountry">Country of License Authority:</label>

                        <div class="controls">

                            <select class="selectpicker input-xlarge country-selectbox " name="country">

                                <option value="" selected="selected">Select Country</option><?php

                                makeoptionslist('select id, title from '.$pre.'countries order by id', isset($row['country'])?$row['country']:'');?>

                            </select>

                           <p class="help-block"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtphone">Phone number of License Authority:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="phone" id= "txtphone"  type="text" value="<?php echo (isset($row['phone'])?$row['phone']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div><?php



				############################################### EDUCATION FORM ############################################################################

				} elseif($_GET['table']=='education') {

					if(!empty($_GET['id'])) {

						$stmt=$db->query('SELECT * FROM '.$pre.'usereducation WHERE id = '.$_GET['id'].' limit 1');

						$row=$stmt->fetch();

					}?>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtdegree">Degree:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="degree" id= "txtdegree" tabindex="1" type="text" value="<?php echo (isset($row['degree'])?$row['degree']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>





                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtmajor">Major Area:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="major" id= "txtmajor"  type="text" value="<?php echo (isset($row['major'])?$row['major']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>





                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtgrad_date">Graduation Date:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="grad_date" id= "txtgrad_date"  type="text" value="<?php echo (isset($row['grad_date'])?$row['grad_date']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtinstitute">School Name:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="institute" id= "txtinstitute"  type="text" value="<?php echo (isset($row['institute'])?$row['institute']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtcountry">Country:</label>

                        <div class="controls">

                            <select class="selectpicker input-xlarge country-selectbox " name="country">

                                <option value="" selected="selected">Select Country</option><?php

                                makeoptionslist('select id, title from '.$pre.'countries order by id', isset($row['country'])?$row['country']:'');?>

                            </select>

                           <p class="help-block"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtcity">City/Town of School:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="city" id= "txtcity"  type="text" value="<?php echo (isset($row['city'])?$row['city']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>





                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtstate">State/Region:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="state" id= "txtstate"  type="text" value="<?php echo (isset($row['state'])?$row['state']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>





                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtphone">School Phone Number:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="phone" id= "txtphone"  type="text" value="<?php echo (isset($row['phone'])?$row['phone']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div><?php

					

				############################################### EMPLOYMENT FORM ############################################################################

				} elseif($_GET['table']=='employment') {

					if(!empty($_GET['id'])) {

						$stmt=$db->query('SELECT * FROM '.$pre.'useremployment WHERE id = '.$_GET['id'].' limit 1');

						$row=$stmt->fetch();

					}?>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtemployer">Employer Name:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="employer" id= "txtemployer" tabindex="1" type="text" value="<?php echo (isset($row['employer'])?$row['employer']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txttitle">Position Title:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="title" id= "txttitle"  type="text" value="<?php echo (isset($row['title'])?$row['title']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txtfromdate">Start Date:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="fromdate" id= "txtfromdate"  type="text" value="<?php echo (isset($row['fromdate'])?$row['fromdate']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txttodate">End Date:</label>

                        <div class="controls">

                           <input class="input-xlarge text" name="todate" id= "txttodate"  type="text" value="<?php echo (isset($row['todate'])?$row['todate']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>
                    <div class="control-group" style="height:46px;">

                        <label class="black-shadow-text input-label span4 control-label" for="txttodate">Are you the owner of the company?</label>

                        <div class="controls">

                           <label class="checkbox span2"><input type="checkbox" class="styled"> Yes</label>
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>    
                    <div class="control-group" style="height:46px;">

                        <label class="black-shadow-text input-label span4 control-label" for="txttodate">Is this your current employer?</label>

                        <div class="controls">

                            <label class="checkbox span2"><input type="checkbox" class="styled"> Yes</label>
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>    
                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txttodate">Country</label>

                        <div class="controls">

                            <input class="input-xlarge text" name="todate" id= "txttodate"  type="text" value="<?php echo (isset($row['todate'])?$row['todate']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>    
                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txttodate">City/Town</label>

                        <div class="controls">

                            <input class="input-xlarge text" name="todate" id= "txttodate"  type="text" value="<?php echo (isset($row['todate'])?$row['todate']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>    
                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txttodate">State</label>

                        <div class="controls">

                            <input class="input-xlarge text" name="todate" id= "txttodate"  type="text" value="<?php echo (isset($row['todate'])?$row['todate']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>    
                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txttodate">Employer Phone Number</label>

                        <div class="controls">

                            <input class="input-xlarge text" name="todate" id= "txttodate"  type="text" value="<?php echo (isset($row['todate'])?$row['todate']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>    
                    <div class="control-group">

                        <label class="black-shadow-text input-label span4 control-label" for="txttodate">Employer Contact Name</label>

                        <div class="controls">

                            <input class="input-xlarge text" name="todate" id= "txttodate"  type="text" value="<?php echo (isset($row['todate'])?$row['todate']:''); ?>" />
                           
                           <p class="help-inline"></p>

                        </div>

                    </div>    
                        <?php

				}?>
             	
                <div class="modal-buttons clearfix">
                
                	<button type="submit" class="pull-right btn-primary">Save</button>
                    
                    <button class="btn-link pull-right" href="javascript:;" onClick="cancelform($('#<?php echo $formid ?>'));">Cancel</button>
                    
                </div>

			</form>
			
			</div><?php

			

			$output['success']=ob_get_clean();

		}

	###########################################################################################################################

	} elseif($task=='saveprofinfo') {

		

		$t=$_POST['table'];

		

		if($t=='license') {

			$table=$pre.'userlicenses';

			$required = array('title','number','authority');

		} elseif($t=='education') {

			$table=$pre.'usereducation';

			$required = array();

		} elseif($t=='employment') {

			$table=$pre.'useremployment';

			$required = array();

		}

		foreach($required as $r) {

			if(empty($_POST[$r])){
				
//				throw new Exception (ucwords($r).' is required.');

				break;

			}

		}

		

		if(empty($output['error'])) {

			require_once(LIB_PATH."exfunctions.php"); 

			if(empty($_POST['id'])) $id = -1; else $id=$_POST['id'];

			

			unset($_POST['id']);

			unset($_POST['table']);

			unset($_POST['formkey']);

			

			$ret=InsertUpdateData($table, $id, $_POST);

			

			if(isset($ret['success'])) {

				$id=$ret['success'];



				ob_start();

				

				if($t=='license') {

					$stmt=$db->query('SELECT ul.id, ul.title, ul.number, ul.authority, ul.state, c.title as country, ul.phone FROM '.$pre.'userlicenses AS ul INNER JOIN '.$pre.'countries AS c ON ul.country = c.id WHERE ul.id = '.$id);

					$row=$stmt->fetch();

					displaylicense($row);

				} elseif($t=='education') {

					$stmt=$db->query('SELECT ue.id, ue.degree, ue.major, ue.grad_date, ue.institute, ue.city, ue.state, c.title as country, ue.phone FROM '.$pre.'usereducation AS ue INNER JOIN '.$pre.'countries AS c ON ue.country = c.id WHERE ue.id = '.$id);

					$row=$stmt->fetch();

					displayEducation($row, 'Education');

				} elseif($t=='employment') {

					$stmt=$db->query('SELECT id, employer, address, fromdate, todate, title FROM '.$pre.'useremployment WHERE id = '.$id);

					$row=$stmt->fetch();

					displayEmployment($row, 'Employment');

				}

				

				$output['success']=ob_get_clean();

				

			} else

				$output['error']=$ret['error'];

		}


	###########################################################################################################################

	} elseif($task=='delprofinfo') {

		if(empty($_POST['id']) || empty($_POST['table'])) {

			$output['error']='Invalid data';

		} else {

			

			if($_POST['table']=='license')

				$table=$pre.'userlicenses';

			elseif($_POST['table']=='education')

				$table=$pre.'usereducation';

			elseif($_POST['table']=='employment')

				$table=$pre.'useremployment';



			if(!empty($table)) {

				$stmt = $db->prepare('DELETE from '.$table.' where id=:id');

				$stmt->execute(array('id'=>$_POST['id']));

				$output['success']="deleted";

			}

		}

	###########################################################################################################################

	} elseif($task=='delusercat') {

		

		if($user->id<=0 || empty($_POST['catid'])) {

			$output['error']='No user/category';

		} else {

			$stmt = $db->prepare('DELETE from '.$pre.'usercats where userid=:userid and catid=:catid and status =1');

			$stmt->execute(array('userid'=>$user->id, 'catid'=>$_POST['catid']));

			$output['success']="deleted";

		}
		
	###########################################################################################################################

	} elseif($task=='listsubcats') {
		
		$parentid = $_GET['parentid'];
		
		if(!$parentid) {

			ob_start();

			$stmt=$db->prepare('select * from '.$pre.'categories parent=$parentid');

			while($row=$stmt->fetch()) {

				echo <<< _html
				
					<option value="$row[id]">$row[title]</option>
					
_html;

			}
				
			$output['success']=ob_get_clean();
		
		}
			
		$output['error']='No parent category specified.';

	}

	

	if(empty($output)) $output['error']='Some error occured';

	echo json_encode($output);

?>