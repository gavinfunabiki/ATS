<?php 

	require_once(LIB_PATH."exfunctions.php"); 

	$countryid = ""; ?>


    <div class="container-fluid">

        <section class="row-fluid content-heading"><?php 

		
			$cstate = 4;
            include("blocks/topnav.php"); ?>

    

            <div class="container-fluid">

                <div class="row-fluid content-heading">

                    <div class="span9 pull-left">

                        <h1>Identity verification</h1>

                        <p>Our third-party vendor, NetIDme (www.netidme.com), conducts your real-time identity verification.</p>

                    </div>

                    <div class="pull-right">

                        <a href="#" class="netidme"><img src="assets/img/netidme.png" alt="" /></a>

                    </div>

                </div>


                <form onSubmit="return false;" data-redirect="professional-verification" data-beforesubmit="NetIDMe_inprogress" data-aftersubmit="NetIDMe_success" action="lib/dotask.php?task=verifynetidme" method="post" class="validate"><?php

                    $formkey->display(); ?>

                    <div class="row-fluid box-container">

                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Country of residence</label>

                            <div class="control-group">

                                <div class="controls">

                                    <select class="selectpicker input-xlarge country-selectbox required" id="txtcountry" name="country">

                                        <option value="">Select Country</option>
										<option value="2" selected="selected">United States</option>
										
										<?php makeoptionslist('select id, title from '.$pre.'countries order by id', $countryid); ?>

                                    </select>

                                    <p class="help-inline"></p>

                                </div>

                            </div>

                        </div>
                        

                        
                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Title</label>

                            <div class="control-group">

                                <div class="controls">

                                    <select type="text" class="selectpicker input-xlarge country-selectbox" name="title">

                                        <option value="Mr">Mr.</option>

                                        <option value="Mrs">Mrs.</option>

                                        <option value="Miss">Miss.</option>

                                        <option value="Dr">Dr.</option>

                                    </select>

                                    <p class="help-inline"></p>

                                </div>

                            </div>

                        </div>

    

                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">First name</label>

                            <div class="control-group">

                                <div class="controls">

                                    <input type="text" class="text" name="firstname" value="Test" />                                    

                                </div>

                            </div>

                        </div>
                        
                        
                        
                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Middle name</label>

                            <div class="control-group">

                                <div class="controls">

                                    <input type="text" class="text" name="middlename" value="Ah" />

                                </div>

                            </div>

                        </div>

                        
                        
                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Last name</label>

                            <div class="control-group">

                                <div class="controls">

                                    <input type="text" class="text" name="lastname" value="Subject" />

                                </div>

                            </div>

                        </div>
                        
                        
                        <hr><br />


                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Date of birth</label>

                            <div class="control-group">

                                <div class="controls">

                                    <div class="input-append date date-picker" data-date="01/01/1990" data-date-format="mm/dd/yyyy" data-start-view="decade">

                                        <input class="text" type="text" value="01/01/1990" name="dob">

                                        <span class="add-on"><i class="icon-calendar"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Telephone number</label>

                            <div class="control-group">

                                <div class="controls">

                                    <input type="text" class="text" name="tel_phone" value="+1-666-123-4567" />

                                </div>

                            </div>

                        </div>



                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Social Security Number</label>

                            <div class="control-group">

                                <div class="controls inline_inputs">

                                    <input type="text" class="text" name="ssn1" value="123" /> - 

                                    <input type="text" class="text" name="ssn2" value="45" /> - 

                                    <input type="text" class="text" name="ssn3" value="6789" />

                                </div>

                            </div>

                        </div>

                        
                        <hr><br />


                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">House number</label>

                            <div class="control-group">

                                <div class="controls">

                                    <input type="text" class="text" name="address_line1" value="6 Test Street" />

                                </div>

                            </div>

                        </div>



                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Street name</label>

                            <div class="control-group">

                                <div class="controls">

                                    <input type="text" class="text" name="address_line2" value="TestTown" /><br>

                                </div>

                            </div>

                        </div>



                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Unit/Suite #</label>

                            <div class="control-group">

                                <div class="controls">

                                    <input type="text" name="address_apt" class="text" />

                                </div>

                            </div>

                        </div>



                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">City/Town</label>

                            <div class="control-group">

                                <div class="controls">

                                    <input type="text" class="text" name="address_line3" value="TestCity/Region" />
                                    
                                </div>

                            </div>

                        </div>



                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">State/Region</label>

                            <div class="control-group">

                                <div class="controls">

                                    <select type="text" class="selectpicker input-xlarge country-selectbox" name="state">

                                        <option>California</option>

                                        <option></option>

                                    </select>

                                </div>

                            </div>

                        </div>



                        <div class="clearfix field-row bottom_pad0">

                            <label class="black-shadow-text input-label span4">Zip/postal code</label>

                            <div class="control-group">

                                <div class="controls inline_inputs">

                                    <input type="text" class="text zip" name="zip" value="PB1123" />

                                </div>

                            </div>

                        </div>

                        
                        <hr><br />

						
                        <div class="continue">
							
                            <input type="hidden" name="iptask" id="iptask" value="save_continue" />
                            
                            <button name="save_continue" type="submit" class="btn-primary btn-large">Save & continue</button>

                        </div>


                        
                        <div class="continue">

                            <button name="save_exit" type="submit" class="btn-secondary btn-large">Save & exit</button>

                        </div>

                    </div>

	            </form>

			</div>

        </section>

    </div>



    <div class="modal fade hide verification_continue" id="wait" data-backdrop="static">

        <div class="modal-wrapper netidme-modal clearfix">

            <img src="assets/img/netid_big.png" alt="NetIDMe" width="178" height="29" />

            <p class="Adele16 black-shadow-text clearfix">NetIDme was unable to identify your identity.</p>

            <span class="Arial clearfix gray">Do you wish to review the information submitted or continue to the application status page?</span>

            <div class="continue inline-button">

                <button type="submit" class="btn-secondary Adele16 review" onclick="$('#wait').modal('hide'); window.location.href = window.location.href">Review</button>

                <button type="submit" class="btn-primary Adele16 next_cont" onclick="$('#wait').modal('hide'); window.location.href = 'status'">Continue</button>

            </div>

        </div>

    </div>



    <div class="modal fade hide verification_continue" id="unable" data-backdrop="static">

        <div class="modal-wrapper netidme-modal clearfix">

            <img src="assets/img/netid_big.png" alt="NetIDMe" width="178" height="29" />

            <p class="Adele16 black-shadow-text clearfix">NetIDme was unable to identify your identity.</p>

            <span class="Arial clearfix gray">Please proceed to the application status page.</span>

            <div class="continue">

                <button type="submit" class="btn-primary Adele16 next_cont" onclick="$('#unable').modal('hide'); window.location.href = 'status'">Continue</button>

            </div>

        </div>

    </div>



    <div class="modal fade hide verification_continue" id="success" data-backdrop="static">

        <div class="modal-wrapper netidme-modal clearfix">

            <img src="assets/img/netid_big.png" alt="NetIDMe" width="178" height="29" />

            <p class="Adelle black-shadow-text clearfix">NetIDme has successfully identified your ID</p>

            <span class="Arial clearfix gray">Please proceed to ADP professional verification</span>

            <div class="continue">

                <button type="submit" class="btn-primary Adele16 next_cont" onclick="$('#success').modal('hide');">Continue</button>

            </div>

        </div>

    </div>



    <div class="modal fade hide verification_continue" id="secure" data-backdrop="static">

        <div class="modal-wrapper netidme-modal clearfix">

            <img src="assets/img/netid_big.png" alt="NetIDMe" width="178" height="29" />

            <p class="Adele16 black-shadow-text clearfix">Your information has been<br />securely submitted to NetIDme</p>

            <img src="assets/img/ajax-loader.gif" alt="Please wait" width="30" height="30" class="topspace" /> 

            <p class="Arial gray">One moment please</p>

        </div>

    </div>