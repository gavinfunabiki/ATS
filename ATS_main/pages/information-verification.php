    <div class="container-fluid">
		<section class="row-fluid content-heading"><?php
	
			include("blocks/topnav.php");?>
				
			<div class="container-fluid">
				<div class="row-fluid content-heading">
					<div class="span7 pull-left">
						<h1>Personal Information Verification</h1>
						<p>Our third-party vendor, NetIDme (www.netidme.com), conducts your real-time identity verification.</p>
					</div>
					<div class="pull-right">
						<a href="#" class="netidme"><img src="assets/img/netidme.png" alt="" /></a>
					</div>
				</div>

                <form onSubmit="return false;" data-redirect="professional-information" action="lib/dotask.php?task=savenetidmetest" method="post"><?php
                    $formkey->display(); ?>
				
                    <div class="row-fluid box-container">
                        <div>
                            <p class="question Arial">Which number goes with your address on South 8th Street?</p>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_1" class="styled">
                                615
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_1" class="styled">
                                947
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_1" class="styled">
                                969
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_1" class="styled">
                                103943
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_1" class="styled">
                                1880
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_1" class="styled">
                                None of the above
                            </label>
                        </div>
                        <div>
                            <p class="question Arial">Where was your social security number issued?</p>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_2" class="styled">
                                California
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_2" class="styled">
                                New Mexico
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_2" class="styled">
                                Mississippi
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_2" class="styled">
                                Vermont
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_2" class="styled">
                                Michigan
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_2" class="styled">
                                None of the above
                            </label>
                        </div>
                        <div>
                            <p class="question Arial">In which month were you born?</p>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_3" class="styled">
                                October
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_3" class="styled">
                                March
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_3" class="styled">
                                January
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_3" class="styled">
                                August
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_3" class="styled">
                                April
                            </label>
                            <label class="checkbox Arial">
                                <input type="radio" value="" name="radio_3" class="styled">
                                None of the above
                            </label>
                        </div>
                        <div class="continue">
                            <button type="submit" class="btn-primary btn-large">Continue</button>
                        </div>
                    </div>
				</form>
			</div>
		</section>
	</div>
	<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue cont2" id="wait">
		<div class="modal-wrapper clearfix">
			<img src="img/netid_big.png" alt="" class="netid" />
			<p class="Adele16 black-shadow-text clearfix">NetIDme was unable to identify your identity.</p>
			<span class="Arial clearfix gray">Do you wish to review the information submitted or continue to the application status page?</span>
			<div class="continue inline-button">
				<button type="submit" class="btn Adele16 review">Review</button>
				<button type="submit" class="btn Adele16 next_cont">Continue</button>
			</div>
		</div>
	</div>
	<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue cont2" id="unable">
		<div class="modal-wrapper clearfix">
			<img src="img/netid_big.png" alt="" class="netid" />
			<p class="Adele16 black-shadow-text clearfix">NetIDme was unable to identify your identity.</p>
			<span class="Arial clearfix gray">Please proceed to the application status page.</span>
			<div class="continue">
				<button type="submit" class="btn Adele16 next_cont">Continue</button>
			</div>
		</div>
	</div>
	<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue cont2" id="success">
		<div class="modal-wrapper clearfix">
			<img src="img/netid_big.png" alt="" class="netid" />
			<p class="Adele16 black-shadow-text clearfix">NetIDme has successfully identified your ID</p>
			<span class="Arial clearfix gray">Please proceed to ADP professional verification</span>
			<div class="continue">
				<button type="submit" class="btn Adele16 next_cont">Continue</button>
			</div>
		</div>
	</div>
	<div class="confirmbox pearl-modal modal hide modal-buttons verification_continue" id="secure">
		<div class="modal-wrapper clearfix">
			<img src="img/netid_big.png" alt="" class="netid" />
			<p class="Adele16 black-shadow-text span3 clearfix">Your information has been securely submitted to NetIDme</p>
			<img src="img/ajax-loader_30.gif"> 
			<p class="ajax_loader_text"><span class="span3 pull-right Arial">One moment please</span></p>
		</div>
	</div>
	</div>