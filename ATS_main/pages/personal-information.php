<?php 

	require_once(LIB_PATH."exfunctions.php"); 

	$stmt= $db->query('select firstname, lastname, countryid, wherehearid, hearother, timezoneid, resumeup, timeplan from '.$pre.'users where id = '.$user->id.' limit 1');

	list($firstname, $lastname, $countryid, $wherehearid, $hearother, $timezoneid, $resumeup, $timeplan)=$stmt->fetch(); ?>

    

	<div class="container-fluid">

		<section class="row-fluid content-heading"><?php

			
			$cstate = 2;
			include("blocks/topnav.php");?>

            

            <div class="container-fluid">

				<div class="row-fluid content-heading<?php if($resumeup) echo " uploaded"; ?>">

                    <div class="span12">

                        <h1>Please enter your basic information and specify your schedule</h1>

                        <p>To get started, we would like some basic information. Specifying your schedule is recommended but not required.</p>

                    </div>

                </div>

                

                <form onSubmit="return false;" data-redirect="professional-information" data-beforesubmit="PersonalInfo_submit" data-aftersubmit="PersonalInfo_success" action="lib/dotask.php?task=savepersonalinfo" method="post" class="validate"><?php

                    $formkey->display(); 

					

					if(!$resumeup) {?>

                        <input type="hidden" name="filename" class="filename" id="filename" value="">

                        <div class="full-width-row">

                            <div id="uploadtext" class="Adele16 upload grey-shadow-text pull-left">

                                Upload a resume or CV&nbsp;

                            </div>

                            <div id="uploader"></div>

                        </div><?php

					}?>

                    

                    <div class="row-fluid box-container no-shadow">

						<div class="edit">

                            <div class="clearfix">

								<br /><br />

                                <div class="clearfix field-row bottom_pad0">

                                    <div class="control-group">

	                                    <label for="txtfirstname" class="black-shadow-text input-label span4">First Name</label> 

                                        <div class="controls">

                                            <input type="text" class="text required" name="firstname" id="txtfirstname" value="<?php echo $firstname; ?>"  data-msg-required="You must agree to the terms and conditions.">

                                            <p class="help-inline"></p>

                                        </div>

                                    </div>

                                </div>



                                <div class="clearfix field-row bottom_pad0">

                                    <div class="control-group">

	                                    <label for="txtlastname" class="black-shadow-text input-label span4">Last Name</label> 

                                        <div class="controls">

                                            <input type="text" class="text required" name="lastname" id="txtlastname" value="<?php echo $lastname; ?>">

                                            <p class="help-inline"></p>

                                        </div>

                                    </div>

                                </div>

                                

                                <div class="clearfix field-row">

                                    <div class="control-group">

	                                    <label for="txtcountry_chzn" class="black-shadow-text input-label span4">Country</label> 

                                        <div class="controls">

                                            <select class="selectpicker input-xlarge country-selectbox required" id="txtcountry" name="country" onchange="updatetimezones($(this).val(), 'timezone');">

                                                <option value="" selected="selected">Select Country</option><?php

                                                makeoptionslist('select id, title from '.$pre.'countries order by id', $countryid);?>

                                            </select>

		                                    <p class="help-inline"></p>

										</div>

                                    </div>

                                </div>





                                <div class="clearfix field-row">

                                    <div class="control-group">

	                                    <label for="txtcountry" class="black-shadow-text input-label span4">Where did you hear about us?</label> 

                                        <div class="controls">

                                            <select onChange="showhide('hearotherwrap', this, 99);toggleclass('txthearother', this, 99);" class="selectpicker input-xlarge hear-selectbox" name="wherehear">

                                                <option value="" selected="selected"></option><?php

                                                makeoptionslist('select id, title from '.$pre.'wherehear order by id', $wherehearid);?>

                                            </select>

		                                    <p class="help-inline"></p>

										</div>

                                    </div>

                                </div>



                                <div class="clearfix field-row <?php if($wherehearid!=99) echo 'hide'; ?> bottom_pad0" id="hearotherwrap">

                                    <div class="control-group">

	                                    <label for="txthearother" class="black-shadow-text input-label span4">Please describe</label> 

                                        <div class="controls">

                                            <input type="text" class="text" id="txthearother" name="hearother" value="<?php echo $hearother; ?>">

                                            <p class="help-inline"></p>

                                        </div>

                                    </div>

                                </div>

                                

                            </div>

                            <hr />

                            <div class="clearfix">

								<div class="content-heading no-border answers">

									<h1>When do you plan to answer questions on Pearl.com?</h1>
                                    
                                    <p>Knowing your schedule helps us match your availability with customer demand. It is OK if your schedule changes at a later date.</p>

                                </div>



                                <div class="clearfix field-row radios">

									<label class="checkbox Arial pull-left"><input onclick="showhide('timematrix', this, 1)" class="styled" type="radio" name="timeplan" <?php if($timeplan==1) echo 'checked="checked"'; ?> value="1">Yes, I know when I plan to answer questions <em>(recommended)</em>.</label>
                                    
                                    <label class="checkbox Arial pull-left"><input onclick="showhide('timematrix', this, 1)" class="styled" type="radio" name="timeplan" <?php if($timeplan==0) echo 'checked="checked"'; ?> value="0">I do not know when I will answer questions.</label>

                                </div>
                                

                                <div id="timematrix" class="Arial<?php if($timeplan==0) echo ' hide'; ?>">
                                
                                	<div class="clearfix field-row">

                                        <div class="control-group">
    
                                            <label for="timezone" class="black-shadow-text input-label span4">Your time Zone?</label> 
    
                                            <div class="controls">
    
                                                <select class="selectpicker input-xlarge required" name="timezone" id="timezone">
    
                                                    <option value="" selected="selected">Select Timezone</option><?php
    
                                                    makeoptionslist('select id, title, countryid from '.$pre.'timezones order by id', $timezoneid);?>
    
                                                </select>
    
                                                <p class="help-inline"></p>
    
                                            </div>
    
                                        </div>
    
                                    </div>
                                    
                                    <br />

                                    <div class="clearfix field-row">

                                        <div class="control-group">
                                        
                                        	<label for="txtcountry" class="black-shadow-text input-label span4">Your anticipated hours?</label> 
    
                                            <div class="controls">

                                                <div class="matrix span8"><?php
            
                                                    //$days=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');                                
            
                                                    $days=array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');                                
            
                                                    $times=array('12AM - 6AM', '6AM - 12PM', '12PM - 5PM', '5PM - 10PM', '10PM - 12PM');
            
                                                    
            
                                                    $stmt=$db->query('SELECT timeid FROM '.$pre.'usertimes WHERE userid = '.$user->id);
            
                                                    $arr=$stmt->fetchAll(PDO::FETCH_COLUMN);
            
                                                    
            
                                                    for($i=0;$i<=count($times);$i++) {?>
            
                                                        <div class="trow clear"><?php
            
                                                        if($i==0) {
            
                                                            echo '<div class="firstcol blank cell pull-left">&nbsp;</div>';
            
                                                            foreach($days as $day) {
            
                                                                echo '<div class="head cell pull-left">'.$day.'</div>';
            
                                                            }
            
                                                        } else {
            
                                                            for($j=0;$j<=count($days);$j++) {
            
                                                                if(in_array((int)($i.$j), $arr)) $sel='checked="checked"'; else $sel="";
            
                                                                echo '<div class="cell '.($j==0?'firstcol':'').' pull-left">'.($j==0?$times[$i-1]:'<input type="checkbox" name="chk[]" '.$sel.' value="'.$i.$j.'" class="matstyled" />').'</div>';
            
                                                            }
            
                                                        }?>
            
                                                        </div><?php
            
                                                    }?>
            
                                                </div>
                                            
                                            </div>
                                            
										</div>
                                        
                                    </div>

                                </div>

                            </div>



                            <div class="control-group clearfix Arial agreement relative">

                                <div class="controls">

                                    <label class="checkbox">

                                        <input type="checkbox" id="terms-and-conditions" name="terms-and-conditions" class="styled required" data-msg-required="You must agree to the terms and conditions." />

                                        <span class="us-privacy">I agree to the Professional Agreement and Terms of Service, and I confirm that I am at least 18 years old.</span>

                                        <span class="non-us-privacy">
											
                                            I agree to the Professional Agreement and Terms of Service, and I confirm that I am at least 18 years old. I also understand that the application information I am providing will be securely maintained in the United States.</span>

                                        </span>

                                    </label>

                                    <p class="help-block"></p>

                                </div>

                            </div>

                            <div class="continue">

                                <button type="submit" class="btn-primary btn-large">Save & continue</button>

                            </div>
                            
                            <div class="continue">

                                <button type="submit" class="btn-secondary btn-large" onclick="window.location.href='status'; return false; ">Save & Exit</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </section>

    </div>	
    
    <div class="modal fade hide verification_continue" id="wait" data-backdrop="static">

        <div class="modal-wrapper netidme-modal clearfix">

            <p class="Adele16 black-shadow-text clearfix">Your resume has been successfully uploaded and is being parsed</p>

            <img src="assets/img/ajax-loader.gif" alt="Please wait" width="30" height="30" class="topspace" /> 

            <p class="Arial gray">One moment please</p>

        </div>

    </div>