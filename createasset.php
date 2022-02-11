<?php 
session_start();
require "connection.php";

$UserName = "";
$PIN = "";
$AssetType = "Equities";
$AssetSubType = "Shares";
$AssetNo = "";
$Denomination = "";
$FaceValue = "";
$FromDate = date('m/d/Y');
$MaturityDate = date('m/d/Y');
$Remarks = "";
$errors = array();

//if user signup button
if(isset($_POST['signup']))
{
    $UserName = mysqli_real_escape_string($con, $_POST['UserName']);
	$PIN = mysqli_real_escape_string($con, $_POST['PIN']);
    
    $AssetNo = mysqli_real_escape_string($con, $_POST['AssetNo']);
	$Denomination = mysqli_real_escape_string($con, $_POST['Denomination']);
	$FaceValue = mysqli_real_escape_string($con, $_POST['FaceValue']);
	$FromDate = mysqli_real_escape_string($con, $_POST['FromDate']);
	$MaturityDate = mysqli_real_escape_string($con, $_POST['MaturityDate']);
    $Remarks = mysqli_real_escape_string($con, $_POST['Remarks']);
	              
	$pin_check = "SELECT * FROM user_assetdetails WHERE PIN = '$PIN'";
    $res = mysqli_query($con, $pin_check);
    if(mysqli_num_rows($res) > 0)
	{
        $errors['PIN'] = "Your unique PIN already exists!";
    }
    if(count($errors) === 0)
	{

        $Balance = "1000";
		
        $insert_data = "INSERT INTO user_assetdetails (VaultID, UserName, PIN, AssetType, AssetSubType, AssetNo, Denomination, Facevalue, Balance, FromDate, MaturityDate, Remarks)
                        values(NULL,'$UserName','$PIN','$AssetType','$AssetSubType','$AssetNo','$Denomination','$FaceValue','$Balance','$FromDate','$MaturityDate','$Remarks')";
        $data_check = mysqli_query($con, $insert_data);
       
               $info = "You have successfully created an Asset";
	
 header('location: AssetRedirect.php');

                exit();
                
       
    }

}
?>