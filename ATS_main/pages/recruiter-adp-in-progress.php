    <div class="container-fluid">
		
		<?php 
			$active = 3;
			include('admin/recruiter-header.php'); 
		?>
        
        <div class="row-fluid">
	        <div class="span12 tablewrap">
            
            	<table class="table table-striped table-bordered table-white-bordered responsive" id="tableint">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Date applied</th>
                            <th>ADP began</th>
                            <th>Order #</th>
                            <th>Actions<div class="colfil toggle_button"></div></th>
                        </tr>
                    </thead>
                    <thead class="colfilters">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Date applied</th>
                            <th>ADP began</th>
                            <th>Order #</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	
                        <?php
				
						$i = 0;
						
						while($i < 11) {
							?>
						<tr id="catrow<?php echo $i; ?>">
							<td><a>Lastname, Firstname<?php echo $i; ?></a></td>
							<td>name@email.com</td>
							<td>category<?php echo $i; ?></a><?php if($i == 3 || $i == 7) { echo '<img src="assets/img/catexpand.png" width="12" height="12" alt="View all categories" class="expandicon" rel="catexpand" />'; } ?></td>
							<td>00/00/0000</td>
							<td>00/00/0000</td>
							<td>12345678</td>
							<td width="90px">
                            	<select class="input-small" style="margin-bottom:0px;" id="action<?php echo $i; ?>" name="actionstatus">
                                    <option value="" selected="selected">Status</option>
                                    <option value="">Accept</option>
                                    <option value="">Reject</option>
                                    <option value="">Waitlist</option>
                                </select>
                                <?php
									if($i == 3 || $i == 7) {
								?>
								
									<div class="catexpand" style="display:none;">
										<table cellpadding="5" cellspacing="0" border="0" width="100%" class="expandedtable">
                                        	<tr>
                                            	<td>Lastname, Firstname<?php echo $i; ?></td>
                                                <td>Family one</td>
                                                <td>firstchild</td>
                                                <td>Pending</td>
                                                <td>Date of final status: 5/10/2013</td>
                                            </tr>
                                            <tr>
	                                            <td>Lastname, Firstname<?php echo $i; ?></td>
                                            	<td>Family two</td>
                                                <td>secondchild</td>
                                                <td>Pending</td>
                                                <td>Date of final status: 4/7/2013</td>
                                            </tr>
                                            <tr>
                                            	<td>Lastname, Firstname<?php echo $i; ?></td>
                                                <td>Family two</td>
                                                <td>thirdchild</td>
                                                <td>Pending</td>
                                                <td>Date of final status:3/10/2012</td>
                                            </tr>
                                        </table> 
									</div>
								
								<?php
									}
								?>
                            </td>
						</tr>
                        <?php
							$i++;
						}
						?>
                        
                    </tbody>
                </table>
                
                
                
            </div>
            
            <div class="pagecontrols">
                <button class="btn-primary btn-large pull-right">Save</button>
                <div><a>Cancel</a></div>
            </div>
            
        </div>

        <div class="clear"></div>
        
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

    </div>

