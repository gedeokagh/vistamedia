<?php
define('URI', 'http://localhost/administrator/');
echo $_POST['myurl'];
echo $_FILES['fileToUpload']['name'];
// include ImageManipulator class
require_once( '../libs/ImageManipulator.php');
 
if ($_FILES['fileToUpload']['error'] > 0) {
    echo "Error: " . $_FILES['fileToUpload']['error'] . "<br />";
} else {
    // array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension = strrchr($_FILES['fileToUpload']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension, $validExtensions)) {
        $newNamePrefix = time() . '_';
        $manipulator = new ImageManipulator($_FILES['fileToUpload']['tmp_name']);
        // resizing to 200x200
        $newImage = $manipulator->resample(600, 400);
        // saving file to uploads folder
        $imgs=URI.'dataimg/' . $newNamePrefix . $_FILES['fileToUpload']['name'];
        $img='../dataimg/' . $newNamePrefix . $_FILES['fileToUpload']['name'];
        $manipulator->save($img);
        echo '<br>Normal : '.$imgs.'<br>';
        echo 'Done ...';
        $newImage = $manipulator->resample(200, 200);
        // saving file to uploads folder
        $thumbs=URI.'dataimg/Thumb_' . $newNamePrefix . $_FILES['fileToUpload']['name'];
        $thumb='../dataimg/Thumb_' . $newNamePrefix . $_FILES['fileToUpload']['name'];
        $manipulator->save($thumb);
        echo '<br>Thumb : '.$thumbs.'<br>';
        echo 'Done ...';
    } else {
        echo 'You must upload an image...';
    }
    
}