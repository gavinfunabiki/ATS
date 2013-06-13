<?php
require_once(LIB_PATH . "exfunctions.php");

$stmt = $db->query('select resumeup from ' . $pre . 'users where id = ' . $user->id . ' limit 1');

list($resumeup) = $stmt->fetch();
?>



<div class="container-fluid">

    <section class="row-fluid content-heading"><?php 
	
		$cstate = 4;
		include("blocks/topnav.php"); ?>



        <div class="container-fluid">

            <div class="row-fluid content-heading">

                <div class="span10 pull-left">

                    <h1>Professional Information Verification</h1>

                    <p>Our third-party vendor, ADP (www.adp.com), will conduct your professional verification. 

                        Work experience, licensing and/or education information will be submitted to ADP for 

                        verification. Typically, for the US and Canada, this verification is completed within 5-10 

                        business days, whereas it wil take longer for international verification.</p>

                </div>

                <div class="pull-right adp">

                    <a href="#"><img src="assets/img/adp.png" width="91" height="42" alt=""></a>

                </div>

            </div>



            <form data-redirect="personal-verification" action="" method="post" id="professional_info" data-novalidate="yes" ><?php
$formkey->display();



if (!$resumeup) {
    ?>

                <?php }
                ?>





                <div class="heading Adele16 col_black send_adp">

                    Licencing

                </div>

                <div class="row-fluid fluid license">

                    <div id="licensewrap">

                        <div class="full_row" id="">

                            <div class="edit_del pull-right">

                                <p class="pull-right">

                                    <a class="edit_info btn-link Arial" href="javascript:void(0)" onClick="AddEditDialog('license', $row[id], 'lic_$row[id]')">Edit</a>

                                </p>

                            </div>

                            <ul>

                                <li class="Arial"><span class="">License Title/Type</span>MD</li>

                                <li class="Arial"><span class="">License Number</span>AB435</li>

                                <li class="Arial"><span class="">Name of License Authority</span>Ontario Royal Medical College</li>

                                <li class="Arial"><span class="">Country of License Authority</span>Canada</li>

                                <li class="Arial"><span class="">Phone number of License Authority</span>416-999-9999</li>

                            </ul>

                        </div>

                    </div>

                </div>



                <div class="heading Adele16 col_black">

                    Education

                </div>

                <div class="row-fluid fluid edu">

                    <div id="educationwrap">

                        <div class="full_row" id="">

                            <div class="edit_del pull-right">

                                <p class="pull-right">
                                
                                    <a class="edit_info btn-link Arial" href="javascript:void(0)" onClick="AddEditDialog('education', $row[id], 'edu_$row[id]')">Edit</a>

                                </p>

                            </div>

                            <ul>

                                <li class="Arial"><span class="">Degree</span>degree</li>

                                <li class="Arial"><span class="">Major Area</span>major</li>

                                <li class="Arial"><span class="">Graduation Date</span>2013-11-12</li>

                                <li class="Arial"><span class="">School Name</span>sch</li>

                                <li class="Arial"><span class="">Country</span>United States</li>

                                <li class="Arial"><span class="">City/Town of School</span>city</li>

                                <li class="Arial"><span class="">State/Region</span>state</li>

                                <li class="Arial"><span class="">School Phone Number</span>1212</li>

                            </ul>

                        </div>

                    </div>

                </div>



                <div class="heading Adele16 col_black">

                    Employment

                </div>



                <div class="row-fluid fluid employ">



                    <div id="employmentwrap">

                        <div class="full_row" id="">

                            <div class="edit_del pull-right">

                                <p class="pull-right">
                                
                                    <a class="edit_info btn-link Arial" href="javascript:void(0)" onClick="AddEditDialog('employment', $row[id], 'emp_$row[id]')">Edit</a>

                                </p>

                            </div>

                            <ul>

                                <li class="Arial"><span class="">Employer Name</span>UCSF</li>

                                <li class="Arial"><span class="">Position Title</span>MD-PhD</li>

                                <li class="Arial"><span class="">Start Date</span>MM/DD/YYY</li>

                                <li class="Arial"><span class="">End Date</span>MM/DD/YYY</li>

                            </ul>

                            <ul>

                                <li class="Arial"><span class="">You are the owner of the company</span></li>

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

                    </div>

                </div>

                <div class="box-container row-fluid prof_bottom">

                    <div>

                        <label class="Arial">

                            <input type="checkbox" class="styled" />

                            You have my permission to submit information to ADP.

                        </label>

                        <div class="buttons">

                            <button class="btn-primary Adele16 btn-large pull-right submit" onclick="window.location.href = 'status'; return false; ">SUBMIT</button>

                            <button class="btn-primary Adele16 btn-large pull-right submit">SAVE FOR LATER</button>

                        </div>

                    </div>

                </div>

            </form>
            
        </div>

    </section>

</div>

<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue" id="wait">

    <div class="modal-wrapper clearfix">

        <div>

            <img src="assets/img/adp.png" alt="" class="netid" />

        </div>

        <div>

            <p class="Adele16 black-shadow-text span3 clearfix">Your information will be securely submitted to ADP</p>

        </div>

        <img src="assets/img/ajax-loader.gif"> 

        <p class="ajax_loader_text"><span class="span3 pull-right Arial">One moment please</span></p>

    </div>

</div>