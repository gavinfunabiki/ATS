    <div class="container-fluid">
		
		<?php 
			$active = 0;
			include('admin/recruiter-header.php'); 
		?>
        
        <section class="row-fluid content-heading selectcatwrap">
        <form onSubmit="return false;">

            <div class="container">
				<div class="row-fluid content-heading no-border">
                    <div class="span12">
                        <h1>Manage categories - Pediatrics</h1>
                    </div>
                </div>

                <div class="row-fluid box-container no-shadow arial">
                    <div class="span6 pull-left">
                        <div class="row-fluid">
                            <div class="span6">JA category name</div>
                            <div class="span6">Pediatrics</div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">JA parent category </div>
                            <div class="span6">Medical</div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">Pearl category name</div>
                            <div class="span6">Pediatrics</div>
                        </div>
                    </div>
                    
                    <div class="span6 pull-right">
                        <div class="clearfix">

                            <div class="clearfix field-row">

                                <div class="control-group">

                                    Select another category to work on

                                </div>

                            </div>
                            
                            <div class="clearfix field-row">

                                <div class="control-group">

                                    <label for="txtcatfam" class="black-shadow-text input-label span5">Category family</label> 

                                    <div class="controls">

                                        <select class="selectpicker input-xlarge catfam-selectbox required" id="txtcatfam" name="catfam" onchange="listsubcats('#txtcategory',$(this).val());">

                                            <option value="" selected="selected">Select category family</option>
                                            
                                            <?php
                                                $stmt=$db->query('select * from '.$pre.'categories where parent is null');
                                                
                                                while($row=$stmt->fetch()) {
                                                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                                                }
                                            ?>

                                        </select>

                                        <p class="help-inline"></p>

                                    </div>

                                </div>

                            </div>
                            
                            <div class="clearfix field-row">

                                <div class="control-group">

                                    <label for="txtcategory" class="black-shadow-text input-label span5">Category</label> 

                                    <div class="controls">

                                        <select class="selectpicker input-xlarge category-selectbox required" id="txtcategory" name="category">

                                            <option value="" selected="selected">Select a category family</option>

                                        </select>

                                        <p class="help-inline"></p>

                                    </div>

                                </div>

                            </div>
                            
                        </div>

                        <div class="continue span11">
                            
                            <button type="submit" class="btn-primary btn-large">Continue</button>

                        </div>

                    </div>

                </div>
                
	            <br /><br />

            </div>
            
            <div class="heading Adele16 col_black spilt_header">

                Category metadata

            </div>
            
            <div class="container">

                <div class="row-fluid box-container no-shadow arial">
                
                    <div class="span6 pull-left">
                        <div class="row-fluid">
                            <div class="span4">Select a category family</div>
                            <div class="control-group span8">
                            	<select class="selectpicker input-xlarge catfam-selectbox required" id="txtcatfamnew" name="catfamnew">

                                    <option value="" selected="selected">Select category family</option>
                                    
                                    <?php
                                        $stmt2=$db->query('select * from '.$pre.'categories where parent is null');
                                        
                                        while($row2=$stmt2->fetch()) {
                                            echo '<option value="'.$row2['id'].'">'.$row2['title'].'</option>';
                                        }
                                    ?>

                                </select>
                            </div>
                        </div>
                        
                        <br />
                        
                        <div class="row-fluid">
                            <div class="span12"><strong>Minimum requirements:</strong></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3 nopadding-right">Must have:</div>
                            <div class="span9 nopadding-left">
                            	<div class="row-fluid"><label><input name="reqfilter" checked="checked" type="radio" value="" class="styled" /> Atleast one of</label></div>
                                <blockquote>
                                    <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> a license (relevant to the category)</label></div>
                                    <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Education infomration (degree)</label></div>
                                    <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> # of years of employment; 2</label></div>
                                </blockquote>
                                
                                <div class="row-fluid"><label><input name="reqfilter" type="radio" value=""  class="styled" /> One of these</label></div>
                                 <blockquote>
                                    <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> a license (relevant to the category)</label></div>
                                    <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Education infomration (degree)</label></div>
                                    <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> # of years of employment; 2</label></div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    
                    <div class="span6 pull-right">
                        <div class="row-fluid">
                            <div class="span12"><strong>ATS steps:</strong></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3 nopadding-right">Include:</div>
                            <div class="span9 nopadding-left">
                            	<div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> NetIDMe (personal verification)</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> ADP (professional verification)</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Subject matter test</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Customer service test</label></div>
                            </div>
                        </div>
                        
                        <br />
                        
                        <div class="row-fluid">
                            <div class="span12"><strong>License info:</strong></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3 nopadding-right">Types:</div>
                            <div class="span9 nopadding-left">
                            	<div class="row-fluid"><a>LicenseTypeName</a></div>
                                <div class="row-fluid"><a>LicenseTypeName</a></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
            <div class="heading Adele16 col_black spilt_header">

                Subject matter questions

            </div>
            
            <div class="container">
            	<div class="row-fluid box-container no-shadow arial">
                	<div class="span12">
                        <div class="row-fluid">
                            <strong>Minimum number of questions to display to applicant: 1</strong>
                            <div class="pull-right"><a class="edit_info" style="padding-left:20px">edit</a></div>
                        </div>
                        
                        <br /><br />
                        
                        <div class="row-fluid">
                            <strong>Subject matter questions</strong>
                        </div>
                        
                        <br />
                    </div>

                    <div>
                        <div class="row-fluid">
                        	<div class="span2 nopadding-left">Question 1:</div>
                            <div class="span10 nopadding-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius augue vel risus viverra lobortis. Donec vitae erat eros. Quisque varius augue vel risus.</div>
                        </div>
                        <div class="row-fluid">
                        	<div class="span2 nopadding-left">Correct answer:</div>
                            <div class="span10 nopadding-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius augue vel risus viverra lobortis. </div>
                        </div>
                        
                        <br />
                        
                        <div class="row-fluid">
                        	<div class="span2 nopadding-left">Question 2:</div>
                            <div class="span10 nopadding-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius augue vel risus viverra lobortis. Donec vitae erat eros. Quisque varius augue vel risus.</div>
                        </div>
                        <div class="row-fluid">
                        	<div class="span2 nopadding-left">Correct answer:</div>
                            <div class="span10 nopadding-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius augue vel risus viverra lobortis. </div>
                        </div>
                        
                        <br />
                        
                        <div class="row-fluid">
                        	<div class="span2 nopadding-left">Question 3:</div>
                            <div class="span10 nopadding-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius augue vel risus viverra lobortis. Donec vitae erat eros. Quisque varius augue vel risus.</div>
                        </div>
                        <div class="row-fluid">
                        	<div class="span2 nopadding-left">Correct answer:</div>
                            <div class="span10 nopadding-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius augue vel risus viverra lobortis. </div>
                        </div>
                        
                        <br />
                        
                        <div class="row-fluid">
                        	<div class="span2 nopadding-left">Question 4:</div>
                            <div class="span10 nopadding-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius augue vel risus viverra lobortis. Donec vitae erat eros. Quisque varius augue vel risus.</div>
                        </div>
                        <div class="row-fluid">
                        	<div class="span2 nopadding-left">Correct answer:</div>
                            <div class="span10 nopadding-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius augue vel risus viverra lobortis. </div>
                        </div>
                    </div>
                    
                    <br />
                    
                    <div class="continue">
                        <button type="submit" class="btn-primary btn-large">Save & apply</button>
                    </div>
                    
                </div>
            </div>
            
		</form>
        </section>

        <div class="clear"></div>
        
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

    </div>

