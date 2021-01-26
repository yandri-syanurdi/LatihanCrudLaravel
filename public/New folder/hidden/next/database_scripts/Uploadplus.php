<?php
// --- FYI ---
// Change your login information, database name, etc. ...
// Storing vars from post
$fileName = $_POST['fileName'];
$fileType = $_POST['fileType'];
$uploaderID = $_POST['uploaderID'];


$dateInfo = getdate();
$year = $dateInfo['year'];
$month = $dateInfo['mon'];
$date = $dateInfo['mday'];


$uploadDate = "$year-$month-$date";

ini_set('display_errors', 1);
$link = mysqli_connect('localhost', 'root', '', 'next');


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "INSERT INTO files (name, type, uploader, uploadDate) VALUES ('$fileName', '$fileType', '$uploaderID', '$uploadDate')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
    echo "fileName, uploaderID: ";
    echo "$fileName";
    echo $uploaderID;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>
