<?php

$targetfolder = "testupload/";
$targetfolder = $targetfolder . basename('2020.pdf');
$fileType = strtolower(pathinfo($targetfolder, PATHINFO_EXTENSION));
echo "<h2>$fileType</h2>";
$uploadOK = true;



if ($_FILES["cvPrueba"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOK = false;
}
if ($uploadOK == true) {
    if (move_uploaded_file($_FILES['cvPrueba']['tmp_name'], $targetfolder)) {

        echo "The file " . basename($_FILES['cvPrueba']['tmp_name']) . " is uploaded";
    } else {

        echo "Problem uploading file";
    }
}
