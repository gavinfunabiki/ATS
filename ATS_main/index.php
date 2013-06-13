<?php

    if(empty($_GET['page'])) 

		$page='category-selection'; 

	else  {

		$page=strtolower($_GET['page']);

	}
	

	include("application.php");
	
	$admincheck = str_split($page, 9);

	if($admincheck[0] == 'recruiter') {
		
		$admin = 99;
	
	} else {
		
		$admin = 0;
	
	}

	$app->title = 'ATS - '.ucwords(str_replace('-', ' ', $page));

	include('pages/blocks/header.php'); 
	
?>

<div class="padding20">

	<section id="pagecontent" class="<?php if($admin != 99) echo 'wrapper1002'; ?>" role="content">
		
	<?php

		if(file_exists('pages/'.$page.'.php'))

			include('pages/'.$page.'.php');

		else {

			$err_class = '404';

			include('pages/error.php'); 

		}
			
	?>

	</section>

</div>
    
<?php

    include('pages/blocks/footer.php');

    include('foot.php'); 

?>



