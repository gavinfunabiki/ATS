<?php

	if (count(get_included_files()) == 1 || basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	
		header('HTTP/1.0 403 Forbidden'); exit();
		
	}

?>



<!DOCTYPE html>

<!--[if IEMobile 7]><html class="iem7 oldie>"><![endif]-->

<!--[if (IE 7)&!(IEMobile)]><html class="ie7 oldie" lang="en"><![endif]-->

<!--[if (IE 8)&!(IEMobile)]><html class="ie8 oldie" lang="en"><![endif]-->

<!--[if (IE 9)&!(IEMobile)]><html class="ie9" lang="en"><![endif]-->

<!--[if (gt IE 9)|(gt IEMobile 7)]><html class="no-js" lang="en"><![endif]-->


<!-- Head =================================================================================================-->

<head>

	<meta charset="utf-8">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">



	<title><?php if(!empty($app->title)) echo $app->title; ?></title>

    <meta name="author" content="advertency.pk" />

    <meta name="distribution" content="global" />

    <meta name="copyright" content="&copy; 2013 ATS. All rights reserved." />

    <meta name="description" content="" />		

    <meta name="keywords" content="" />

	<meta name="HandheldFriendly" content="True">

	<meta name="MobileOptimized" content="320">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



	<!-- For all browsers -->

    <link rel="stylesheet" media="screen" href="<?php echo $app->root; ?>assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" media="screen" href="<?php echo $app->root; ?>assets/bootstrap/css/bootstrap-responsive.min.css">

	<link rel="stylesheet" media="screen" href="<?php echo $app->root; ?>assets/jq-fileuploader/css/fineuploader-3.4.1.css">

    <link rel="stylesheet" media="screen" href="<?php echo $app->root; ?>assets/jq-chosen/jquery.chosen.css">

    <link rel="stylesheet" media="screen" href="<?php echo $app->root; ?>assets/bs-modal/css/bootstrap-modal.css">

    <link rel="stylesheet" media="screen" href="<?php echo $app->root; ?>assets/bs-datepicker/css/bootstrap-datepicker.css">
    
    <link rel="stylesheet" media="screen" href="<?php echo $app->root; ?>assets/bs-datatables/css/datatables.css">
    
    <link rel="stylesheet" media="screen" href="<?php echo $app->root; ?>assets/bs-datatables/css/tabletools.css">



	<!--[if IE 7]>

    	<link rel="stylesheet" media="screen" href="<?php echo $app->csspath; ?>ie7.css">

	<![endif]-->

        

	<!-- our custom css -->

	<link rel="stylesheet" media="print" href="<?php echo $app->csspath; ?>print.css?v=1">

    <link rel="stylesheet" media="screen" href="<?php echo $app->csspath; ?>default.css?v=1">



	<!-- For progressively larger displays -->

	<link rel="stylesheet" media="only all and (max-width: 479px)" href="<?php echo $app->csspath; ?>320.css?v=1">

	<link rel="stylesheet" media="only all and (min-width: 480px) and (max-width: 767px)" href="<?php echo $app->csspath; ?>480.css?v=1">

	<link rel="stylesheet" media="only all and (min-width: 768px) and (max-width: 979px)" href="<?php echo $app->csspath; ?>768.css?v=1">

	<link rel="stylesheet" media="only all and (min-width: 980px) and (max-width: 1199px)" href="<?php echo $app->csspath; ?>980.css?v=1">

	<link rel="stylesheet" media="only all and (min-width: 1200px)" href="<?php echo $app->csspath; ?>1200.css?v=1">

	<!-- For Retina displays -->

	<link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="<?php echo $app->csspath; ?>2x.css?v=1">



	<!-- JavaScript at bottom except for Modernizr -->

	<script src="<?php echo $app->jspath; ?>modernizr.custom.js"></script>



	<!-- For Modern Browsers -->

	<link rel="shortcut icon" href="<?php echo $app->imgpath; ?>favicons/favicon.png">

	<!-- For everything else -->

	<link rel="shortcut icon" href="<?php echo $app->imgpath; ?>favicons/favicon.ico">

	<!-- For retina screens -->

	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $app->imgpath; ?>favicons/apple-touch-icon-retina.png">

	<!-- For iPad 1-->

	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $app->imgpath; ?>favicons/apple-touch-icon-ipad.png">

	<!-- For iPhone 3G, iPod Touch and Android -->

	<link rel="apple-touch-icon-precomposed" href="<?php echo $app->imgpath; ?>favicons/apple-touch-icon.png">



    <!-- iOS web-app metas -->

    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">



	<!-- Microsoft clear type rendering -->

	<meta http-equiv="cleartype" content="on">



	<!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx 

	<meta name="application-name" content="Ajwasoft Template">

	<meta name="msapplication-tooltip" content="Cross-platform template.">

	<meta name="msapplication-starturl" content="http://www.pear.com/ats/">

	<!-- These custom tasks are examples, you need to edit them to show actual pages 

	<meta name="msapplication-task" content="name=Agenda;action-uri=http://www.pearl.com/ats/agenda.html;icon-uri=http://www.pearl.com/ats/img/favicons/favicon.ico">

	<meta name="msapplication-task" content="name=My profile;action-uri=http://www.pearl.com/ats/profile.html;icon-uri=http://www.pearl.com/ats/img/favicons/favicon.ico"><!---->

</head>


<?php

	if(empty($_GET['page'])) {
	
		$bodyClass=""; else $bodyClass=$_GET['page'];
	
	}

?>



<body class="clearfix <?php echo $bodyClass; ?>">

	<div id="mediaquery-checker"></div>

    <noscript class="alert alert-danger">Your browser does not support JavaScript! Some features won't work as expected...</noscript>

	<!-- Prompt IE 6 users to install Chrome -->

	<!--[if lt IE 7]>

    	<p class="message red-gradient simpler">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>

	<![endif]-->

	<div class="page-container">

    
