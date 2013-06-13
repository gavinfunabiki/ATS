
                    <div class="row-fluid box-container">
                    
                        <div>
                        
					<?php 
                    
                        $questions = $_REQUEST['q']; 
						
						echo '<input type="hidden" name="TransactionID" value="'.$questions['TransactionID'].'" />';
						
						unset($questions['TransactionID']);
                        
                        foreach($questions as $question) {
                            
                            ?>
                            
                            <p class="question strong"><span><?php echo $question['Number']; ?>.</span><?php echo $question['QuestionText']; ?></p>
                            
                            <?php
                            
							$answers = $question['QuestionAnswers'];
							$answers = $answers['string'];
							
							$i=1;
							
							foreach($answers as $list) {
								?>
                                	
                                    <label class="checkbox marginleft30 Arial">

                                        <input type="radio" value="<?php echo $i; ?>" name="question_<?php echo $question['Number']; ?>" class="styled">
        
                                        <?php echo $list; ?>
        
                                    </label>
                                
                                <?php
								
								$i++;
							}
							
                        }
                        
                    ?>


                        </div>

                        <div class="continue">
                        	
                            <input type="hidden" name="iptask" id="iptask" value="save_continue" />

                            <button type="submit" class="btn-primary btn-large">Save & continue</button>

                        </div>
                        
                        <div class="continue">

                            <button type="submit" class="btn-secondary btn-large">Save & Exit</button>

                        </div>
                        
					</div>
                    
                    <script>
						$('input.styled').stylize({
							width : 14, 
							height : 14
						});
					</script>

						