    <div class="container-fluid">
		
		<?php 
			$active = 0;
			include('admin/recruiter-header.php'); 
		?>
        
        <section class="row-fluid content-heading selectcatwrap">

            <div class="container">
				<div class="row-fluid content-heading no-border">
                    <div class="span12">
                        <h1>Manage categories</h1>
                    </div>
                </div>

                

                <form onSubmit="return false;">
				
				<?php
                    $formkey->display(); 
				?>

                    <div class="row-fluid box-container no-shadow">
						<div class="edit">
                            <div class="clearfix">

                                <div class="clearfix field-row">

                                    <div class="control-group">

	                                    <label class="black-shadow-text input-label span3">New categories</label> 

                                        <div class="controls arial">

                                            <a>First new category</a>, <a>Second new category</a>

										</div>

                                    </div>

                                </div>
                                
                                <div class="clearfix field-row">

                                    <div class="control-group">

	                                    <label for="txtcatfam" class="black-shadow-text input-label span3">Category family</label> 

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

	                                    <label for="txtcategory" class="black-shadow-text input-label span3">Category</label> 

                                        <div class="controls">

                                            <select class="selectpicker input-xlarge category-selectbox required" id="txtcategory" name="category">

                                                <option value="" selected="selected">Select a category family</option>

                                            </select>

		                                    <p class="help-inline"></p>

										</div>

                                    </div>

                                </div>
                                
                            </div>

                            <div class="continue span6">
                                
                                <button type="submit" class="btn-primary btn-large" onclick="window.location = 'recruiter-manage-category'">Continue</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

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

