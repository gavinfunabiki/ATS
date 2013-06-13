<?php
	if (count(get_included_files()) == 1 || basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))
		{header('HTTP/1.0 403 Forbidden'); exit();}


	function error_to_exception( $code, $message, $file, $line, $context ) {
		throw new ErrorOrWarningException( $code, $message, $file, $line, $context );
	}
	
	function dump_exception(Exception $ex) {
		$file = $ex->getFile();
		$line = $ex->getLine();
	
		if (file_exists($file)) {
			$lines = file( $file );
		}?>
		
		<html>
		<head>
			<title><?php echo $ex->getMessage(); ?></title>
			<style>
			#wrapper {
				width : 960px;
				margin : auto;
				position:relative;
			}
			
			ul.code {
				border : inset 1px;
			}
			
			ul.code li {
				white-space: pre-wrap;      /* CSS3 */   
				white-space: -moz-pre-wrap; /* Firefox */    
				white-space: -pre-wrap;     /* Opera <7 */   
				white-space: -o-pre-wrap;   /* Opera 7 */    
				word-wrap: break-word;      /* IE */
				
				list-style-type : none;
				font-family : monospace;
			}
			
			ul.code li.line {
				color : red;
			}
			
			table.trace {
				width : 100%;
				border-collapse : collapse;
				border : solid 1px black;
			}
			table.thead tr {
				background : rgb(240,240,240);
			}
			table.trace tr.odd {
				background : white;
			}
			table.trace tr.even {
				background : rgb(250,250,250);
			}
			table.trace td {
				padding : 2px 4px 2px 4px;
			}
            </style>
		</head>
		<body>
        	<div id="wrapper">
			<h1>Uncaught <?php echo get_class( $ex ); ?></h1>
			<h2><?php echo $ex->getMessage(); ?></h2>
			<p>
				An uncaught <?php echo get_class( $ex ); ?> was thrown on line <?php echo $line; ?> of file <?php echo basename( $file ); ?> that prevented further execution of this request.
			</p>
			<h2>Where it happened:</h2>
			<?php if ( isset($lines) ) : ?>
			<code><?php echo $file; ?></code>
			<ul class="code">
				<?php for( $i = $line - 1; $i < $line + 1; $i ++ ) : ?>
					<?php if ( $i > 0 && $i < count( $lines ) ) : ?>
						<?php if ( $i == $line-1 ) : ?>
							<li class="line"><?php echo str_replace( "\n", "", $lines[$i] ); ?></li>
						<?php else : ?>
							<li><?php echo str_replace( "\n", "", $lines[$i] ); ?></li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endfor; ?>
			</ul>
			<?php endif; ?>
	
			<?php if ( is_array( $ex->getTrace() ) ) : ?>
			<h2>Stack trace:</h2>
				<table class="trace">
					<thead>
						<tr>
							<td>File</td>
							<td>Line</td>
							<td>Class</td>
							<td>Function</td>
							<td>Arguments</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach ( $ex->getTrace() as $i => $trace ) : ?>
						<tr class="<?php echo $i % 2 == 0 ? 'even' : 'odd'; ?>">
							<td><?php echo isset($trace[ 'file' ]) ? basename($trace[ 'file' ]) : ''; ?></td>
							<td><?php echo isset($trace[ 'line' ]) ? $trace[ 'line' ] : ''; ?></td>
							<td><?php echo isset($trace[ 'class' ]) ? $trace[ 'class' ] : ''; ?></td>
							<td><?php echo isset($trace[ 'function' ]) ? $trace[ 'function' ] : ''; ?></td>
							<td>
								<?php if( isset($trace[ 'args' ]) ) : ?>
									<?php foreach ( $trace[ 'args' ] as $i => $arg ) : ?>
										<span title="<?php echo @var_export( $arg, true ); ?>"><?php echo gettype( $arg ); ?></span>
										<?php echo $i < count( $trace['args'] ) -1 ? ',' : ''; ?> 
									<?php endforeach; ?>
								<?php else : ?>
								NULL
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			<?php else : ?>
				<pre><?php echo $ex->getTraceAsString(); ?></pre>
			<?php endif; ?>
            </div>
		</body>
		</html><?php // back in php
	}

	function global_exception_handler( $ex ) {
		// send email of dump to administrator?...
		// if we are in debug mode we are allowed to dump exceptions to the browser.
		if ( defined( 'DEBUG' ) && DEBUG == true ) {
			ob_start();
			dump_exception( $ex );
			$dump = ob_get_clean();
			echo $dump;
		} else {// if we are in production we give our visitor a nice message without all the details.
			header("Location: /home/www/ats/pages/error.php");//TODO update the path
		}
		exit;
	}	

	########## class autoloader function, this includes all the classes that are needed by the script ###################################
	function autoload($class) {
		require(ROOT.'lib/classes/' . $class . '.class.php');
	}

	########## get mime type of file ###################################
	function mime($file, $mime=false) {
		if(!file_exists($file)) return '';
		
		$file_info = new finfo(FILEINFO_MIME);	// object oriented approach!
		$mime_type = $file_info->buffer(file_get_contents($file)); 
		
		if(!$mime)
			return ($mime_type) ;
		else {
			$parts = explode(";", $mime_type);
			$mime=$parts [0];
			$parts = explode("/", $mime);
			$filetype=$parts [0];
			$mime=$parts [1];

			return $mime;
		}
	}
	
	#-#############################################
	# logs the string to a file
	function writelog($str, $fn='log.txt') {
		$fp = fopen(LOG_DIR.$fn, "a+");
		fwrite($fp, $str."\r\n");
		fclose($fp);
	}	
?>