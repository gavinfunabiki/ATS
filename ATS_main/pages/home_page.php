<?php
require_once(LIB_PATH . "exfunctions.php");
$stmt = $db->query('select resumeup from ' . $pre . 'users where id = ' . $user->id . ' limit 1');
list($resumeup) = $stmt->fetch();
?>

<div class="container-fluid">
	<section class="row-fluid content-heading">
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
				<div class="item active" style="background:url(assets/img/slide.jpg) center top no-repeat;">
					<div class="container wrapper1002">
						<div class="carousel-caption">
							<h1>Finally, earn money online doing what you love </h1>
							<hr>
							<p class="lead Arial">Join us as a professional on Pearl.com to share your expertise online. Work when you want, where you want and start earning money doing what you do best – helping people.</p>
							<a class="btn btn-large btn-primary" href="#">Apply now – it’s free</a>
							<div class="slide_arrow pull-right">
								<a href="#"><span class="arrow_in_slider pull-left"></span></a>
								<blockquote class="pull-left Adele16">
									<span class="block_start"></span>I love getting to help people all 
									over the globe and knowing I 
									made a difference in their lives.
									<span class="block_ends"></span>
								</blockquote>
								<p class="Arial">Norm S.,  Professional on <a href="www.pearl.com">Pearl.com</a> since 2009</p>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<img src="assets/img/slide.jpg" alt="">
					<div class="container wrapper1002">
						<div class="carousel-caption">
							<h1>Finally, earn money online doing what you love </h1>
							<hr>
							<p class="lead Arial">Join us as a professional on Pearl.com to share your expertise online. Work when you want, where you want and start earning money doing what you do best – helping people.</p>
							<a class="btn btn-large btn-primary" href="#">Apply now – it’s free</a>
							<div class="slide_arrow pull-right">
								<a href="#"><span class="arrow_in_slider pull-left"></span></a>
								<blockquote class="pull-left Adele16">
									<span class="block_start"></span>I love getting to help people all 
									over the globe and knowing I 
									made a difference in their lives.
									<span class="block_ends"></span>
								</blockquote>
								<p class="Arial">Norm S.,  Professional on <a href="www.pearl.com">Pearl.com</a> since 2009</p>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<img src="assets/img/slide.jpg" alt="">
					<div class="container wrapper1002">
						<div class="carousel-caption">
							<h1>Finally, earn money online doing what you love </h1>
							<hr>
							<p class="lead Arial">Join us as a professional on Pearl.com to share your expertise online. Work when you want, where you want and start earning money doing what you do best – helping people.</p>
							<a class="btn btn-large btn-primary" href="#">Apply now – it’s free</a>
							<div class="slide_arrow pull-right">
								<a href="#"><span class="arrow_in_slider pull-left"></span></a>
								<blockquote class="pull-left Adele16">
									<span class="block_start"></span>I love getting to help people all 
									over the globe and knowing I 
									made a difference in their lives.
									<span class="block_ends"></span>
								</blockquote>
								<p class="Arial">Norm S.,  Professional on <a href="www.pearl.com">Pearl.com</a> since 2009</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel_arrow">
				<div class="wrapper1002">
					<a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next"> </a>
				</div>
			</div>
		</div>
		<div class="inner_nav">
			<div class="container">
				<nav class="stickynav affix-top" data-spy="affix" data-offset-top="552">
					<ul class="nav">
						<li id="lnkhowitworks"><a class="scrollto" href="#ahowitworks" title="How it works">How it Works</a></li>
						<li id="lnkhowtoapply"><a class="scrollto" href="#ahowtoapply" title="How to apply">How to Apply</a></li>
						<li id="lnkfindspec"><a class="scrollto" href="#afindspec" title="Find your speciality">Find Your Speciality</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<section id="main" role="main">
			<div class="container">
				<a class="scrollpos" id="howitworks"></a>

				<section>
					<h3>It’s working from home, but better</h3>

					<div id="workwrap">
						<div id="workleft" class="span5">
							<div class="workitem Arial">
								<strong>Share your knowledge</strong><br />
								Join us in our mission to help people. With your expertise and 
								our easy-to-use platform, we can make a difference together. 
							</div>
							<div class="workitem Arial">
								<strong>Work on your own time</strong><br />
								Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor 
							</div>
							<div class="workitem Arial">
								<strong>Make money</strong><br />
								Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor Lorem Ipsum dolor 
							</div>
							<button class="getstarted btn-primary pull-left">Get Started - it's easy</button>
						</div>
						<div id="workright" class="pull-right span6">
							<img src="assets/img/workimg.jpg">
							<div id="works">
								<div class="topbox">
									<div class="boxtext Arial">
										<strong>Customers request help</strong><br />
										3,000+ questions per day<br />
										175+ categories & 30+ countries
									</div>
								</div>
								<div class="pull-left">
									<img src="assets/img/horizontal_arrow.png" alt="">
								</div>
								<div class="topbox Arial">
									<div class="boxtext">
										<strong>You respond & get paid</strong><br />
										Easy-to-use online Q&A tools<br />
										Save on overhead & travel time
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>

					<a class="btn-link back_top Arial pull-right" href="">Back to Top</a>
				</section>
			</div>
		</section>
		<section role="main" id="next_section">
			<div>
				<div class="container">
					<a class="scrollpos" id="howtoapply"></a>
					<section class="for_bg">
						<h3>Now accepting applications </h3>

						<p class="Arial">Apply in as little as 30 minutes. Finish in one session or start now and finish later – you can save your application at any time. </p><br />
						<div id="startedwrap">
							<div id="startedleft">
								<span class="green_bg Adele16">Apply in 4 easy steps</span>
								<div class="starteditem clearfix">
									<div class="itemimg Arial">Step1</div>
									<div class="itemtxt Arial">
										<strong>Select your Category</strong><br />
										Your qualifications are important to our customers
									</div>
								</div>
								<div class="starteditem clearfix">
									<div class="itemimg Arial">Step2</div>
									<div class="itemtxt Arial">
										<strong>Submit your information</strong><br />
										Name, location and other details we'll need to create your profile
									</div>
								</div>
								<div class="starteditem clearfix">
									<div class="itemimg Arial">Step3</div>
									<div class="itemtxt Arial">
										<strong>Complete Test</strong><br />
										Your expertise are valuable to us
									</div>
								</div>
								<div class="starteditem clearfix">
									<div class="itemimg Arial">Step4</div>
									<div class="itemtxt Arial">
										<strong>Submit Professional Credentials</strong><br />
										Name, location and other details we'll need to create your profile
									</div>
								</div>
								<div class="starteditem clearfix">
									<div class="itemimg Arial">Step5</div>
									<div class="itemtxt Arial">
										<strong>Approval</strong><br />
										Requirements vary by category. Start the <br>
										application to learn more.
									</div>
								</div>
							</div>

							<div id="startedright">
								<span class="green_bg Arial">Ready to apply?  You’ll need…</span>
								<ul>
									<li>
										<div class="starteditem clearfix">
											<div class="itemimg Arial col_black"><strong>Professional verification</strong></div>
											<div class="itemtxt Arial">
												Such as a diploma, state license, or certification
											</div>
										</div>
									</li>
									<li>
										<div class="starteditem clearfix">
											<div class="itemimg Arial"><strong>Personal identification</strong></div>
											<div class="itemtxt Arial">
												Such as Social Security number or passport number
											</div>
										</div>
									</li>
									<li>
										<div class="starteditem clearfix">
											<div class="itemimg Arial"><strong>Resume (optional)</strong></div>
											<div class="itemtxt Arial">
												Acceptable formats include .doc, <br>
												.docx, .pdf, .txt, and .rtf
											</div>
										</div>
									</li>
								</ul>



							</div>
						</div>
						<div class="clear"></div>
						<p class="Arial col_black "><strong>Start helping customers</strong></p>
						<p class="Arial">We respect your time, so we promise to review and respond to your application in a timely manner – 5-10 business days 
							for applicants in the USA/Canada and 5-20 business days for most others. Once approved, we’ll guide you every step of the way, 
							making it easy for you to help customers and get paid.</p>
						<div class="clear"></div>
						<button class="getstarted btn-primary pull-left">Get Started - it's easy</button>
						
					<a class="btn-link back_top Arial pull-right" href="">Back to Top</a>
					</section>

					<a class="scrollpos" id="findspec"></a>
					<section>
						<h3>You can join us in one or more of the categories</h3>

						Complete your application and lorem ipsum alot. Like this, lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
						lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum

						<div id="catwrap" class="clearfix">
							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>

							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat1.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>

							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat2.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>

							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat3.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>

							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat4.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>

							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat5.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>

							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat6.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>

							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat7.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>
							<div class="catitem clear">
								<div class="catimg"><img src="assets/img/cat8.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>
							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat9.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum<br>
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>
							<div class="catitem">
								<div class="catimg"><img src="assets/img/cat10.jpg"></div>
								<div class="cattxt">
									<strong>Doctors</strong><br>
									Lorem ipsum lorem ipsum
									<a href="#" class="btn-link">SEE ALL</a>
								</div>
							</div>
							<div class="clear">
								<button class="getstarted btn-primary pull-left" style="float:left;">Get Started - it's easy</button>
							</div>    
					</section>
				</div>
			</div>
		</section>

	</section>
</div>
<div class="partners">
	<div class="container">
		<ul>
			<li>As seen on...</li>
			<li><a href="#"><img src="assets/img/forbes.png" alt=""></a></li>
			<li><a href="#"><img src="assets/img/wall_street.png" alt=""></a></li>
			<li><a href="#"><img src="assets/img/tech_crunch.png" alt=""></a></li>
			<li><a href="#"><img src="assets/img/fox_business.png" alt=""></a></li>
			<li><a href="#"><img src="assets/img/all_digital.png" alt=""></a></li>
		</ul>
	</div>
</div>
<div class="footer">
	<span class="head_of_foot"></span>
	<div class="container">
		<div class="row_foot">
			<span class="span2">A satisfied customer says:</span>
			<span class="span6">"I won the case! Your response gave me the courage and confidence yo go into yesterday's audit ready to fight." -Raymond Y.</span>
			<div class="contact pull-right">
				<span class="Arial">Stay connected</span>
				<a href="#" class="fb"></a>
				<a href="#" class="tweet"></a>
				<a href="#" class="rss"></a>
			</div>
		</div>
		<div class="row_foot">
			<ul class="span3">
				<li><a href="#" class="btn-link">USING PEARL.COM</a></li>
				<li><a href="#" >How it works</a></li>
				<li><a href="#" >Meet the proffesionals</a></li>
				<li><a href="#" >The Pearls promise</a></li>
			</ul>
			<ul class="span3">
				<li><a href="#" class="btn-link">CUSTOMER CARE</a></li>
				<li><a href="#" >Help FAQs</a></li>
				<li><a href="#" >Term of Services</a></li>
				<li><a href="#" >Privacy &amp; Security</a></li>
			</ul>
			<ul class="span3">
				<li><a href="#" class="btn-link">GET TO KNOW US</a></li>
				<li><a href="#" >About Pearl.com</a></li>
				<li><a href="#" >Press room</a></li>
				<li><a href="#" >Careers</a></li>
				<li><a href="#" >Become a proffesional</a></li>
			</ul>
			<ul class="span3">
				<li><a href="#" class="btn-link">READ OUR BLOG</a></li>
				<li><a href="#" >Get helpfull articles and daily answers from the Wisdom Wire.</a></li>
				<li><a href="#" class="btn-link">Read now</a></li>
			</ul>
		</div>
		<div class="foot">
			<p class="pull-left Arial">&copy; 2012-2013 Pearl.com LLC. All right reserved. <a href="#" class="btn-link Arial"> Privacy Policy</a></p>
			<p class="pull-right">
				<a href="#"><img src="assets/img/truste.png" alt=""></a>
				<a href="#"><img src="assets/img/norton.png" alt=""></a>
			</p>
		</div>
	</div>
</div>
