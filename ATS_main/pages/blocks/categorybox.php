<div class="row-fluid category-box">

    <div class="span12">

        <h3 class="pull-left">Applying for: <span class="divider-vertical"></span></h3>

            

        <div class="<?php echo (isset($showbtn) && $showbtn)?'span8':'span10';  ?> categories-container pull-left"><?php
		

            $stmt=$db->query('SELECT c.id, c.title, c.remarks FROM '.$pre.'usercats uc INNER JOIN '.$pre.'categories c ON uc.catid = c.id  WHERE uc.status= 1 and uc.userid = '.$user->id);
			

            while($row=$stmt->fetch()) {

                echo <<< _html

                    <div data-item="$row[id]" class="well well-small pull-left current_label selected-category catpopover" data-original-title="$row[title]" data-toggle="popover" title="" data-content="$row[remarks]" data-placement="bottom" rel="popover" data-trigger="hover">

                        <label class="cstyle">$row[title]</label><i class="icon-remove" onclick="removeusercat('$row[id]', this)"></i>

                    </div>

_html;

            }?>

        </div><?php

		

        if(isset($showbtn) && $showbtn) { ?> 

        	<button onclick="redirect_personalinfo();" class="btn-primary Adele16 btn-large pull-right">Save & Continue</button><?php

		}?>



    </div>

</div>

