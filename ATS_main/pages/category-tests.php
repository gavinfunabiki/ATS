<div class="container-fluid">

    <section class="row-fluid content-heading"><?php 
		
		$cstate = 3;
		include("blocks/topnav.php"); ?>


        <div class="container-fluid">

            <div class="row-fluid content-heading">

                <div class="span12 pull-left">

                    <h1>Please complete your subject matter & customer service skills tests</h1>

                    <p>In order to continue, you must complete at least one (1) subject matter test and your customer service skills test.</p>

                </div>

            </div>





            <div class="relative">

                 <?php include("blocks/categorybox.php"); ?>

            </div>





            <div class="accordion" id="accordion">



                <div class="accordion-group">

                    <div class="accordion-heading">

                        <a class="accordion-toggle Adelle extend" data-toggle="collapse" data-parent="#accordion" href="#acc_0">

                            <i class="icon-chevron-down icon-white pull-left"></i>
                            
                            <div class="accordion-title pull-left">Antiques & Appraisals: Antiques </div>
                            
                            <div class="accordion-subtext Arial pull-right">Attempts remaining for this test: 2</div>

                        </a>

                    </div>



                    <div id="acc_0" class="accordion-body collapse in">

                        <div class="accordion-inner">

                            <form onSubmit="return false;" data-redirect="professional-information" action="lib/dotask.php?task=savenetidmetest" method="post"><?php $formkey->display(); ?>

                                <div class="row-fluid box-container">

                                    <div>

                                        <p class="question Arial">Please read each question carefully before selecting your answer</p>
                                        
                                        <p class="question strong"><span>1.</span>What are the most common early 19th century bottle colors?</p>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_1" class="styled">

                                            Green, amber, clear

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_1" class="styled">

                                            Yellow, pink, green

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_1" class="styled">

                                            Cobalt, deep purple, clear

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_1" class="styled">

                                            Brown, lavender, milk glass

                                        </label>

                                    </div>

                                    <div>

                                        <p class="question strong"><span>2.</span>What is the earliest form of photography?</p>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_2" class="styled">

                                            Daguerreotype

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_2" class="styled">

                                            Ambrotype

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_2" class="styled">

                                            Carte-de-visite

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_2" class="styled">

                                            Albumen

                                        </label>

                                    </div>

                                    <div>

                                        <p class="question strong"><span>3.</span>What woods are the most common in antique furniture? </p>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_3" class="styled">

                                            Mahogany, walnut, cherry, maple and oak

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_3" class="styled">

                                            Hickory, chestnut, mahogany and oak

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_3" class="styled">

                                            Curly maple, black walnut, chestnut and oak

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_3" class="styled">

                                            Only native woods

                                        </label>

                                    </div>
                                    
                                    <div>

                                        <p class="question strong"><span>4.</span>What design technique is Moorcroft Pottery most famous for?</p>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_3" class="styled">

                                            Tube Lining

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_3" class="styled">

                                            Lustre Glaze

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_3" class="styled">

                                            Flambe

                                        </label>

                                        <label class="checkbox marginleft30 Arial">

                                            <input type="radio" value="" name="radio_3" class="styled">

                                            Enamel

                                        </label>

                                    </div>

                                    <div class="continue">

                                        <button type="submit" class="btn-primary btn-large margin-right score_test">Score my test</button>

                                        <button type="submit" class="btn-secondary btn-large margin-right">Save for later</button>

                                    </div>

                                </div>

                            </form>



                        </div>

                    </div>

                </div>



                <div class="accordion-group">

                    <div class="accordion-heading">

                        <a class="accordion-toggle Adelle" data-toggle="collapse" data-parent="#accordion" href="#acc_1">

                            <i class="icon-chevron-right icon-white pull-left"></i>
                            
                            <div class="accordion-title pull-left">Customer Service Skills </div>

                        </a>

                    </div>



                    <div id="acc_1" class="accordion-body collapse">

                        <div class="accordion-inner">

                            <form onSubmit="return false;" data-redirect="professional-information" action="lib/dotask.php?task=savenetidmetest" method="post"><?php $formkey->display(); ?>

                                <div class="row-fluid box-container">
                                	
                                    <div>
                                    	<p class="question Adele16">
                                        	This test is designed to showcase how you would help customers on Pearl.com.<br />
											After submitting your test, it will be reviewed and scored by our internal team.
                                        </p>
                                        
                                        <p class="question cstips Arial">
                                        	Read helpful tips before you begin
                                        </p>
                                        
                                        <p class="question Arial gray">
                                        	To write a great response, remember to:
                                        </p>
                                        
                                        <ul class="Arial cstipsul gray">
                                        	
                                            <li><strong>Be professional.</strong> Always use proper grammar, spelling and capitalization.</li>
                                            
                                            <li><strong>Begin with a greeting.</strong> If the situation warrants it, you may want to offer sympathy or reassure the customer.</li>
                                            
                                            <li><strong>Be accurate and informative.</strong> Build trust while helping your customer, and show us that you are a true expert in your field. </li>
                                            
                                            <li><strong>Use laymen’s terms.</strong> Many customers do not know much about your specialty, so we want to see you use simple terminology that anyone can understand.</li>
                                            
                                            <li><strong>End with a salutation.</strong> Say thank you or good-bye and let the customer know that you are available for any follow-up or clarification questions.</li>
                                        
                                        </ul>
                                    
                                    </div>
                                    
                                    <hr />
                                    
                                    <div>
                                    
                                        <div class="span9 pull-left">
                                        	<p class="question Adele16">1. Antiques & Appraisals: Antiques</p>
                                            <p class="question Arial gray">
                                                <strong>Customer question:</strong> I have a set of 8 very unusual wine goblets, the picture will tell you more. 
                                                They are mostly red, with red inside the stem. They are gold-rimmed, and 
                                                have a hand-painted flower on the outside. I would like to know what they 
                                                are worth since I have never seen anything like them. Thank you.
                                            </p>
                                            
                                            <p class="question Arial gray">
                                                Optional Information:
                                            </p>
                                            
                                            <p class="question Arial gray">
                                                Item's Current Condition: Excellent - no damage <br />
                                                What have you tried so far?: This is my first time in asking
                                            </p>
                                        </div>
                                        
                                        <div class="span3 pull-left">
                                        	<div class="picturewrap text-center">
	                                       		<img src="media/pictures/goblet.jpg" width="100" height="180" />
                                            </div>
                                            <p class="Arial text-center imgcaption">Caption goes here</p>
                                        </div>

                                        <textarea class="text customerquestion span12" placeholder="Type your response here..."></textarea>

                                    </div>

                                    <div class="continue">
                        
                                        <button type="submit" class="btn-primary btn-large" onclick="window.location.href = 'identity-verification';">Save & continue</button>
                                    
                                    </div>
                                    
                                    <div class="continue">
                                    
                                        <button type="submit" class="btn-secondary btn-large" onclick="window.location.href = 'status';">Save & exit</button>
                                    
                                    </div>

                                </div>

                            </form>



                        </div>

                    </div>

                </div>   

            </div>

        </div>

    </section>

</div>

