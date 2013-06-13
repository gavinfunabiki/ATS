<?php 	
	require_once(LIB_PATH."exfunctions.php"); 	
	$stmt= $db->query('select resumeup from '.$pre.'users where id = '.$user->id.' limit 1');	
	
	list($resumeup)=$stmt->fetch(); 
	
?>			

        <div class="container-fluid">
            <section class="row-fluid content-heading">
                <?php		
					$cstate = 2;		
                    include("blocks/topnav.php");
                ?>
                <div class="container-fluid">
                    <div class="row-fluid content-heading">
                        <div class="span12 pull-left">
                            <h1>Professional Information</h1>						
                            <p>
                            	Please enter all the required information to complete the registration.
                                Lorem ipsum dolor sit amet, lorem ipsum dolor sit amet lorem ipsum dolor sit amet.
                            </p>					
                        </div>
                    </div>
                    
                    <div class="relative">
                    
					<?php					
						include("blocks/categorybox.php"); 
					?>			
                    
                    </div>
                    
                    <form onSubmit="return false;" data-redirect="personal-verification" action="" method="post" >
					<?php
                    	$formkey->display(); 										
						
						if(!$resumeup) {?>						
                        
                        <input type="hidden" name="filename" class="filename" value="">						
                        
                        <div class="full-width-row">							
                        	<div id="uploadtext" class="Adele16 upload grey-shadow-text pull-left">								
                            	Upload a resume or CV&nbsp;							
                            </div>							
                            <div id="uploader"></div>						
                        </div>
						
					<?php					
						}
					?>										
                    
                    <div class="heading Adele16 col_black">Licencing</div>					
                    <div class="row-fluid fluid license">						
                    	<div id="licensewrap">
						
						<?php			
							
							$stmt=$db->query('SELECT ul.id, ul.title, ul.number, ul.authority, ul.state, c.title as country, ul.phone FROM '.$pre.'userlicenses AS ul INNER JOIN '.$pre.'countries AS c ON ul.country = c.id WHERE ul.userid = '.$user->id);
							
							// 	For when we have a defined list of licenses							
							//	$stmt=$db->query('SELECT ul.id, lt.title AS lictype, ul.title, ul.number, ul.authority, ul.state, c.title as country, ul.phone FROM '.$pre.'userlicenses AS ul INNER JOIN '.$pre.'licensetypes AS lt ON ul.type = lt.id INNER JOIN '.$pre.'countries AS c ON ul.country = c.id WHERE ul.userid = '.$user->id);						
							
							while($row=$stmt->fetch()) {							
								displayLicense($row);						
							}?>						
                        
                        </div>							
                        
                        <div>							
                        	<a class="btn-link add Arial" href="javascript:void(0)" onClick="AddEditDialog('license')">Add other licenses</a>						
                        </div>					
                    </div>										
                    
                    <div class="heading Adele16 col_black">Education</div>					
                    
                    <div class="row-fluid fluid edu">						
                    	<div id="educationwrap">
						
						<?php						
							$i=1;						
							$stmt=$db->query('SELECT ue.id, ue.degree, ue.major, ue.grad_date, ue.institute, ue.city, ue.state, c.title as country, ue.phone FROM '.$pre.'usereducation AS ue INNER JOIN '.$pre.'countries AS c ON ue.country = c.id WHERE ue.userid = '.$user->id);						
							
							while($row=$stmt->fetch()) {							
								displayEducation($row, 'Education #'.$i);							
								$i++;						
							}
						?>						
                        
                        </div>							
                        
                        <div>							
                        	<a class="btn-link add Arial" href="javascript:void(0)" onClick="AddEditDialog('education')">Add other education</a>						
                        </div>					
                    </div>										
                    
                    <div class="heading Adele16 col_black">Employment</div>						
                    
                    <div class="row-fluid fluid employ">												
                    	<div id="employmentwrap">
							<?php						
								$i=1;						
								$stmt=$db->query('SELECT id, employer, address, fromdate, todate, title FROM '.$pre.'useremployment WHERE userid = '.$user->id);						
								while($row=$stmt->fetch()) {							
								displayEmployment($row, 'Employment #'.$i);							
								$i++;						
								}
							?>						
                            </div>												
                            
                            <div>							
                            	<a class="btn-link add Arial" href="javascript:void(0)" onClick="AddEditDialog('employment')">Add other employment</a>						
                            </div>								
                            
                            <div class="continue"><button class="btn-primary btn-large" onclick="window.location.href = 'category-tests';">Save & continue</button></div>
                            
                            <div class="continue"><button class="btn-secondary btn-large" onclick="window.location.href = 'status'; return false; ">Save & exit</button></div>	
                        </form>	
                    </div>		
                </div>		
            </section>	
        </div>		
        
        
        
        <!--<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue cont2" id="wait">		<div class="modal-wrapper clearfix">			<img src="assets/img/netid_big.png" alt="" class="netid" />			<p class="Adele16 black-shadow-text clearfix">NetIDme was unable to identify your identity.</p>			<span class="Arial clearfix gray">Do you wish to review the information submitted or continue to the application status page?</span>			<div class="continue inline-button">				<button type="submit" class="btn Adele16 review">Review</button>				<button type="submit" class="btn Adele16 next_cont">Continue</button>			</div>		</div>	</div>	<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue cont2" id="unable">		<div class="modal-wrapper clearfix">			<img src="assets/img/netid_big.png" alt="" class="netid" />			<p class="Adele16 black-shadow-text clearfix">NetIDme was unable to identify your identity.</p>			<span class="Arial clearfix gray">Please proceed to the application status page.</span>			<div class="continue">				<button type="submit" class="btn Adele16 next_cont">Continue</button>			</div>		</div>	</div>	<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue cont2" id="success">		<div class="modal-wrapper clearfix">			<img src="assets/img/netid_big.png" alt="" class="netid" />			<p class="Adele16 black-shadow-text clearfix">NetIDme has successfully identified your ID</p>			<span class="Arial clearfix gray">Please proceed to ADP professional verification</span>			<div class="continue">				<button type="submit" class="btn Adele16 next_cont">Continue</button>			</div>		</div>	</div>	<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue" id="secure">		<div class="modal-wrapper clearfix">			<img src="assets/img/netid_big.png" alt="" class="netid" />			<p class="Adele16 black-shadow-text span3 clearfix">Your information has been securely submitted to NetIDme</p>			<img src="assets/img/ajax-loader_30.gif"> 			<p class="ajax_loader_text"><span class="span3 pull-right Arial">One moment please</span></p>		</div>	</div>-->