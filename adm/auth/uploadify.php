<?php require('Gregphoto_Image.php');
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/dev/balonparty/adm/auth/uploads'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_POST['timestamp'] .'-'. $_FILES['Filedata']['name'];
//
$targetFolderx = '/dev/balonparty/adm/auth/uploads/thumbs'; // Relative to the root
$targetPathx = $_SERVER['DOCUMENT_ROOT'] . $targetFolderx;
$targetFilex = rtrim($targetPathx,'/') . '/' . $_POST['timestamp'] .'-'. $_FILES['Filedata']['name'];
//
/*	
	$p = pathinfo($_FILES['Filedata']['name']);
  $newName = time() . "." . $p['extension'];
  $targetFile =  rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'] .'-'. $newName;
*/	
	// Validate the file type
	$fileTypes = array('jpg','JPG','jpeg','gif','GIF','png','PNG','bmp','BMP'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
//		
	$img = new Gregphoto_image($targetFile);
        $img->setMaxHeight(173);
        $img->setMaxWidth(130);
        $img->resize(Gregphoto_Image::BEST_FIT);
        $img->saveThumbnail($targetFilex);
        //$img1 = '/dev/balonparty/adm/auth/uploads/thumbs/'.$targetFile;
//	 
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>