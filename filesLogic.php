<?php
require "connection.php";
require 'lib/aes.php';
require 'lib/aesctr.php';
$sql = "SELECT * FROM files";
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
	$time = date("d-m-Y")."-".time();
  $filename = $_FILES['myfile']['name'];
  $file = $_FILES['myfile']['tmp_name'];
  $filename = $filename ;
    $size = $_FILES['myfile']['size'];
$key = $_POST['key'];
$date = $_POST['expirydate'];
$docType = $_POST['DocumentType'];
$docName = $_POST['DocumentName'];
$comment = $_POST['comments'];
$namaFile = file_get_contents($_FILES['myfile']['tmp_name']);
$encFile = AesCtr::encrypt($namaFile,$key,128);
$encryptedFolder = file_put_contents("encryptedFolder/".($_FILES['myfile']['name']), $encFile);
$docTypeCnt;
if ($docType =="1")
{
    $docTypeCnt="Personal";
}
else if ($docType =="2")
{
    $docTypeCnt="Legal";
}
else 
{
    $docTypeCnt="Others";
}
if ($encryptedFolder) {
	echo "-----------";
	
	 if ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        
            $sql = "INSERT INTO files (name, size, downloads,UNIQUEKEY,expirydate ,DocumentType ,DocumentName ,comments ) VALUES ('$filename',$size, 1,$key,'$date','$docTypeCnt','$docName','$comment')";
            if (mysqli_query($con, $sql)) {
                echo "File Has Been Encrypted------------";
               
            }
}
}
}
$key;
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'decryptedFolder/' . $file['name'];
	$key=$file['UNIQUEKEY'];
	$namaFile = file_get_contents('encryptedFolder/' . $file['name']);
$encFile = AesCtr::decrypt($namaFile,$key,128);
$encryptedFolder = file_put_contents('decryptedFolder/' . $file['name'], $encFile);

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('encryptedFolder/' . $file['name']));
        readfile('decryptedFolder/'. $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($con, $updateQuery);
		unlink($filepath);
        exit;
    }
	

}
?>