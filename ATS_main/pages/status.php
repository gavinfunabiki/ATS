<?php

require_once(LIB_PATH . "exfunctions.php");

?>



<div class="container-fluid">

	<section class="row-fluid content-heading">

		<div class="container-fluid">

			<div class="row-fluid content-heading page_heading">

				<div class="span7 pull-left">

					<h1>Categories</h1>

				</div>

			</div>



            <form action="">

				<table class="table">

					<thead>

						<tr class="heading">

							<th>Category</th>

							<th>Next Steps</th>

							<th>Don't apply to this category</th>

						</tr>

					</thead>

					<tbody>
                    
                    <?php
						
						$stmt = $db->query('select catid,status from ' . $pre . 'usercats where userid = ' . $user->id);

						while($row = $stmt->fetch()) {
							
							$getcat = $db->query('select title from '.$pre.'categories where id = '.$row['catid']);
							
							list($cattitle) = $getcat->fetch();
						
					?>

						<tr>

							<td><?php echo $cattitle; ?></td>

							<td><?php echo getNextStep($row['status']); ?></td>

							<td class="remove_item"><a href="#"><i class="icon-remove"></i></a></td>

						</tr>
                    
					<?php
						}
					?>


					</tbody>

				</table>



				<div class="row-fluid fluid license">
					<br />
					<a class="btn-link apply Arial" href="category-selection">Apply to more categories</a>

					<br /><br /><br />

                    <div>
                        <div class="well pull-left Arial span8">
                        	                            
                            <input type="hidden" name="filename" class="filename" value="">

                                <div id="uploadtext" class="Adele16 upload grey-shadow-text pull-left" style="width:430px">
    
                                    Please select a picture to upload as your profile picture:
    
                                </div>
    
                                <div id="uploader"></div>
                        
                        </div>
                        
                        <div class="pull-left Arial span4" style="margin-left:20px; margin-top:10px;">
	                        Once your application is accepted, you can change this picture by logging into your account. Lorem ipsum dolor lorem ipsum.
                        </div>
                    </div>
                    
				</div>            
                
				<div class="heading Adele16 col_black">

					Invite a friend to become a professional

				</div>

				<div class="span7 fluid_box pull-left">

					<div class="clearfix field-row bottom_pad0">

						<label class="black-shadow-text input-label span6">Full name</label>

						<div class="control-group">

							<div class="controls">

								<input type="text" class="text" name="" placeholder="Salman Hijazi" />

								<p class="help-block"></p>

							</div>

						</div>

					</div>

					<div class="clearfix field-row bottom_pad0">

						<label class="black-shadow-text input-label span6">Email address</label>

						<div class="control-group">

							<div class="controls">

								<input type="text" class="text" name="" placeholder="salman@advertency.pk"/>

								<p class="help-block"></p>

							</div>

						</div>

					</div>

					<div class="clearfix field-row bottom_pad0">

						<label class="black-shadow-text input-label span6">Category recommendation</label>

						<div class="control-group">

							<div class="controls">

								<select class="selectpicker input-xlarge country-selectbox">

									<option>Select an options</option>

									<option></option>

								</select>

								<p class="help-block"></p>

							</div>

						</div>

					</div>

					<div class="continue">

						<button type="submit" class="btn-primary Adele16 next_cont">Send Invite</button>

					</div>

				</div>

				<div class="span4 status_img pull-left">

					<div>

						<img src="media/thumbs/4.png" alt="" class="row-fluid">

					</div>

					<p class="Adele16 col_black black-shadow-text">About becoming a Pearl professional</p>

					<p class="Arial">Lorem Ipsum lorem ipsum lorem ipsum lorem 

						ipsum lorem ipsum lorem ipsum lorem ipsum

						lorem ipsum lorem ipsum lorem ipsum lorem 

						ipsum lorem ipsum lorem ipsum lorem ipsum

						lorem ipsum lorem ipsum lorem ipsum lorem 

						ipsum lorem ipsum lorem ipsum lorem ipsum.</p>

					<!--					<div class="continue">

											<button type="submit" class="btn Adele16 next_cont">Edit</button>

										</div>-->

				</div>

			</form>

		</div>

	</section>

</div>

<div class="modal hide fade in" aria-hidden="false">

	<div class="modal-wrapper clearfix">

		<div class="contentwrap">

			<div class="content"><p class="sure">Are you sure you want to remove this category from your selection?</p></div>

			<div class="modal-buttons">

				<button data-handler="1" class="pull-right btn-primary confirm" >Confirm</button>

				<button data-handler="0" data-dismiss="modal" class="btn-link pull-right margin-right6" >Close</button>

			</div>

		</div>

	</div>

</div>