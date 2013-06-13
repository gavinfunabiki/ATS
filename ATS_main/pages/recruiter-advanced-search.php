    <div class="container-fluid">
		
		<?php 
			$active = 0;
			include('admin/recruiter-header.php'); 
		?>
        
        <section class="row-fluid content-heading selectcatwrap Arial">
        <form onSubmit="return false;">

            <div class="container">
				<div class="row-fluid content-heading no-border">
                    <div class="span12">
                        <h1>Advanced search</h1>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                    	<div class="span2">
	                        <label class="pull-right input-label"> Keywords: </label>
                        </div>
                        <div class="span10">
	                        <input type="text" class="rectext" style="width:90%" />
                        </div>
                    </div>
                </div>
                
	            <br /><br />

            </div>
            
            <div class="heading Adele16 col_black spilt_header">

                Personal & professional information

            </div>
            
            <div class="container">

                <div class="row-fluid">
                
                    <div class="span6 pull-left">
                        <div class="row-fluid">
                            <div class="span12"><strong>Personal</strong></div>
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>Name/Username/ Display name:</label></div>
                                <div class="span8 nopadding-left"><input type="text" class="rectext pull-right" style="width:90%" /></div>
                            </div>
                            <div class="row-fluid">
								<div class="span4 nopadding-right"><label>Email address:</label></div>
                                <div class="span8 nopadding-left"><input type="text" class="rectext pull-right" style="width:90%" /></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="span6 pull-right">
                        <div class="row-fluid">
                            <div class="span12"><strong>Location</strong></div>
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>City:</label></div>
                                <div class="span8 nopadding-left"><input type="text" class="rectext pull-right" style="width:90%" /></div>
                            </div>
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>US States:</label></div>
                                <div class="span8 nopadding-left">
                                	<select class="pull-right" style="width:95%">
                                    	<option>Select a state</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>Region:</label></div>
                                <div class="span8 nopadding-left"><input type="text" class="rectext pull-right" style="width:90%" /></div>
                            </div>
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>Country:</label></div>
                                <div class="span8 nopadding-left"><input type="text" class="rectext pull-right" style="width:90%" /></div>
                            </div>
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>Zip/Postal code:</label></div>
                                <div class="span8 nopadding-left"><input type="text" class="rectext pull-right" style="width:90%" /></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
            <br />
            
            <div class="heading Adele16 col_black spilt_header">

                ATS Categories

            </div>
            
            <div class="container">
            	<div class="row-fluid">
                
                    <div class="span6 pull-left">
                        <div class="row-fluid">
                            <div class="span12"><strong>Category</strong></div>
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>Category family:</label></div>
                                <div class="span8 nopadding-left">
                                	<select class="pull-right" style="width:95%">
                                    	<option>All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>Category:</label></div>
                                <div class="span8 nopadding-left">
                                	<select class="pull-right" style="width:95%">
                                    	<option>Select a category</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row-fluid control-group">
								<div class="span4 nopadding-right"><label>Category status:</label></div>
                                <div class="span8 nopadding-left">
                                	<div class="span6 nopadding-right">
            	                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> In-progress</label></div>
        	                            <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Waitlisted</label></div>
    	                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Accepted</label></div>
	                                    <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Rejected</label></div>
                                    </div>
                                    <div class="span6 nopadding-right">
            	                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Self opt-out</label></div>
        	                            <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Warned</label></div>
    	                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Pearl removed</label></div>
	                                    <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Pearl cat modifi</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12"><strong>Applicant status</strong></div>
                            <div class="row-fluid control-group">
                                <div class="span4 nopadding-right"><label>Category status:</label></div>
                                <div class="span8 nopadding-left">
                                    <div class="span6 nopadding-right">
                                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Existing</label></div>
                                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Banned</label></div>
                                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Newbie</label></div>
                                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Legacy</label></div>
                                    </div>
                                    <div class="span6 nopadding-right">
                                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> New applicant</label></div>
                                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Aged applicant</label></div>
                                        <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Ex-applicant</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="span6 pull-right">
                        <div class="row-fluid">
                            <div class="span12"><strong>ATS process</strong></div>
                            <div class="span12 control-group">
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Selected categories</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Submitted time/days for working</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Submitted professional info</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Completed subject matter test</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Completed customer service test</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Completed NetIDMe</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Completed ADP</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Completed final recruiter review</label></div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                        	<div class="span12"><strong>Select the days and times that applicants said they would work on:</strong></div>
                        	<div id="timematrix">
                                <div class="matrix span12"><?php
                                    $days=array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');                                
                                    $times=array('12AM - 6AM', '6AM - 12PM', '12PM - 5PM', '5PM - 10PM', '10PM - 12PM');
                                    for($i=0;$i<=count($times);$i++) {?>
                                        <div class="trow clear"><?php
                                        if($i==0) {
                                            echo '<div class="firstcol blank cell pull-left">&nbsp;</div>';
                                            foreach($days as $day) {
                                                echo '<div class="head cell pull-left">'.$day.'</div>';
                                            }
                                        } else {
                                            for($j=0;$j<=count($days);$j++) {
                                                echo '<div class="cell '.($j==0?'firstcol':'').' pull-left">'.($j==0?$times[$i-1]:'<input type="checkbox" name="chk[]" value="'.$i.$j.'" class="matstyled" />').'</div>';
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
            
            <br /><br />
            
            <div class="heading Adele16 col_black spilt_header">

                Display selections

            </div>
            
            <div class="container">
            	<div class="row-fluid">
                	<div class="span12 pull-left">
                        <div class="row-fluid">
                            <div class="span12"><strong>Display in the results</strong></div>
                            <div class="span5 control-group">
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> License info</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Education info</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Employment info</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Subject matter test results</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> Customer service test results</label></div>
                            </div>
                            <div class="span5 control-group">
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> NetIDMe information</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> NetIDMe verification status</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> ADP verification status</label></div>
                                <div class="row-fluid"><label><input type="checkbox" value="" class="styled" /> IP address</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5 pull-right">
                        <label style="width:60%;" class="pull-left">Don't show any applicants who have not had activity since:</label> <input type="text" class="rectext pull-right" style="width:30%" value="mm/dd/yyyy" />
                    </div>
                </div>
                
                <br />
                
                <div class="row-fluid">
                    <div class="span5 pull-right">
	                	<div class="pull-right">
                        	<button type="submit" class="btn-primary btn-large" onclick="window.location = 'recruiter-search-results'">Search</button>
                    	</div>
                        <div class="pull-right" style="margin-top:20px; margin-right:20px;">
                        	<a>Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            
		</form>
        </section>

        <div class="clear"></div>

        <br />

    </div>

