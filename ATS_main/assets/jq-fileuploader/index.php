<?php
// Include the uploader class

include "../../application.php";
require_once 'qqFileUploader.php';
$uploader = new qqFileUploader();

// Specify max file size in bytes.
$uploader->sizeLimit = $app->sizeLimit;
$uploader->allowedExtensions = explode(",", str_replace("'", "", $app->allowedExtensions));
$uploader->allowedmimes = explode(",", str_replace("'", "", $app->allowedmimes));
// Specify the input name set in the javascript.
$uploader->inputName = 'qqfile';

// If you want to use resume feature for uploader, specify the folder to save parts.
$uploader->chunksFolder = 'chunks';

// Call handleUpload() with the name of the folder, relative to PHP's getcwd()
$updir= TMP_DIR.'/'.date('Ymd')."/";
if (!is_dir($updir)) @mkdir($updir);

$result = $uploader->handleUpload($updir);

// To return a name used for uploaded file you can use the following line.
$result['uploadName'] = $uploader->getUploadName();

header("Content-Type: text/plain");
echo json_encode($result);