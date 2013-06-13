    <div class="container-fluid">
		
		<?php 
			$active = 5;
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
                            <th>Ready for ADP</th>
                            <th>CS test</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <thead class="colfilters">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Date applied</th>
                            <th>Ready for ADP</th>
                            <th>CS test</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	
                        <?php
				
						$i = 0;
						
						while($i < 11) {
							?>
						<tr>
							<td>Lastname, Firstname<?php echo $i; ?></a><?php if($i == 6 || $i == 9) { echo '<img src="assets/img/flag.png" width="12" height="12" alt="Flagged" class="flagged" />'; } ?></td>
							<td>name@email.com</td>
							<td>category</td>
							<td>00/00/0000</td>
							<td>00/00/0000</td>
							<td>Pass</td>
							<td><a>Pro Info</a></td>
						</tr>
						<?php
							$i++;
						}
						?>
                        
                    </tbody>
                </table>
                
                
                
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

