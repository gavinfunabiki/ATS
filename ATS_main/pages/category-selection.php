    <div class="container-fluid">

		<section class="row-fluid content-heading"><?php

			
			$cstate = 1;
			include("blocks/topnav.php");?>

            

            <div class="container-fluid">

                <div class="row-fluid content-heading">
            
                    <div class="span12">
            
                        <h1>Select the categories that you would like to apply for</h1>
            
                        <p>You may apply for up to X categories at once.</p>
            
            
            
                    </div>
            
                </div><?php
            
            
            
                $showbtn=true;
            
                include("blocks/categorybox.php"); ?>
            
            
            
                <div class="row-fluid box-container">
            
                    <div class="span12">
            
                        <ul class="thumbnails"><?php
            
                            $stmt=$db->query('select * from '.$pre.'categories where parent is null');
            
                            $i=1;
            
                            while($row=$stmt->fetch()) {
            
                                if($i%2==0) {
            
                                    $cls='pull-right';
            
                                } else {
									
									$cls='pull-left';
								}
            
                                $i++;
            
                                
            
                                echo <<< _html
								
									<li class="span6 $cls">
									
										<div class="thumbnail pull-left"><img src="media/thumbs/$row[image].jpg" alt="$row[title]" width="94" height="94" onclick = showsubcats($row[id])></div>
										
										<div class="category-wrapper pull-left">
										
											<h4 class="row-fluid">$row[title]</h4>
											
											<p class="category-desc Arial">
											
												$row[desc] <br />
											
												<a onclick = showsubcats($row[id]) class="thumbnail-footer">SELECT CATEGORIES</a>
											
											</p>
										
										</div>
										
									</li>          
_html;


/*                                    <li class="span3 $cls" onclick = showsubcats($row[id])>
            
                                        <div class="thumbnail" >
            
                                            <h5 class="row-fluid">$row[title]</h5>
            
                                            <div class="image-wrapper"><img src="media/thumbs/$row[image].png" alt="" class="row-fluid"></div>
            
                                            <p class="thumbnail-footer"></p>
            
                                        </div>
            
                                    </li>
*/  
                                
            
                            }?>
            
            
            
                        </ul>
            
                    </div>
                    
                    <div class="continue">

	                    <button onclick="redirect_personalinfo();" class="btn-primary Adele16 btn-large pull-right">Save & Continue</button>
    
                    </div>
            
                </div>
            
                <div class="clear"></div>
                
                <br /><br />
            
            </div>

        </section>

    </div>	

