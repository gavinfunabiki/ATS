<?php

	if (count(get_included_files()) == 1 || basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))

		{header('HTTP/1.0 403 Forbidden'); exit();}

?>



    <!--[if lt IE 9]>

      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->



	<script src="<?php echo $app->jspath; ?>jquery-1.9.1.min.js"></script>

	<script src="<?php echo $app->jspath; ?>jq-checkboxes.js"></script>

	<script src="<?php echo $app->jspath; ?>jquery.validate.min.js"></script>

	<script src="<?php echo $app->root; ?>assets/bootstrap/js/bootstrap.min.js"></script>

	<script src="<?php echo $app->root; ?>assets/bs-modal/js/bootstrap-modalmanager.js"></script>

	<script src="<?php echo $app->root; ?>assets/bs-modal/js/bootstrap-modal.js"></script>

	<script src="<?php echo $app->root; ?>assets/bs-datepicker/js/bootstrap-datepicker.js"></script>

	<script src="<?php echo $app->root; ?>assets/jq-fileuploader/js/iframe.xss.response-3.4.1.js"></script>

	<script src="<?php echo $app->root; ?>assets/jq-fileuploader/js/jquery.fineuploader-3.4.1.min.js"></script>

	<script src="<?php echo $app->root; ?>assets/jq-chosen/chosen.jquery.min.js"></script>
    
    <script src="<?php echo $app->root; ?>assets/bs-datatables/js/jquery.dataTables.min.js"></script>
    
    <script src="<?php echo $app->root; ?>assets/bs-datatables/js/jquery.dataTables.columnFilter.js"></script>
    
    <script src="<?php echo $app->root; ?>assets/bs-datatables/js/tabletools.js"></script>

    <script src="<?php echo $app->root; ?>assets/js/bootbox.js"></script>

    <script>

		var globaljsvars = {

			sizeLimit:<?php echo $app->sizeLimit; ?>,

			allowedExtensions:[<?php echo $app->allowedExtensions; ?>]

		}

    </script>



    <script src="<?php echo $app->jspath; ?>script.js"></script>

    

</body>

</html>