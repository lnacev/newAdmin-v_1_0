<?php 
require('inc/Gregphoto_Image.php');

  if(isset($_POST['file_upload'])){
  if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
    if ($_FILES['photo']['type'] == 'image/gif' ||
        $_FILES['photo']['type'] == 'image/jpeg' ||
        $_FILES['photo']['type'] == 'image/png') {
      $result = move_uploaded_file($_FILES['photo']['tmp_name'], 'to/'.$_FILES['photo']['name']);
      if ($result) {
        // generate thumbail for new image
        $img = new Gregphoto_image('to/'.$_FILES['photo']['name']);
        $img->setMaxHeight(200);
        $img->setMaxWidth(200);
        $img->resize(Gregphoto_Image::BEST_FIT);
        $img->saveThumbnail('to2/'.$_FILES['photo']['name']);
 
        $img2 = new Gregphoto_image('to/'.$_FILES['photo']['name']);
        $img2->setMaxHeight(250);
        $img2->setMaxWidth(250);
        $img2->resize(Gregphoto_Image::BEST_FIT);
        $img2->saveThumbnail('to3/'.$_FILES['photo']['name']);
        echo "everything went O.K.";
  
      } else {
        echo "error ocured!";
      }

    } else {
      echo "NOT an image!";
    }
  }
}
?>