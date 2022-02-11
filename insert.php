IN HTML
<form action = "Insert.php" method ="POST">

<?php
$Userid = $_POST[Userid];
$Password = $_POST[Password];
$CnfrmPass = $_POST[CnfrmPass];

if(!empty($Userid) || !empty($Password) || || !empty($CnfrmPass)){
       $host = "localhost";
	   $dbusername = "";
	   $dbpassword = "";
	   $dbname = "";

	   //create connection
	   $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

	   if (mysqli_connect_error()){
	   die('connect error('. mysqli_connect_errno().')'. mysqli_connect_error());
	   }
	   else{
	   $SELECT = SELECT Userid from "tablename" where Userid = ? Limit 1";
	   $INSERT = INSERT into "tablename" (Userid,Password,CnfrmPass)values(?,?,?);

	   //prepare statement
	   $stmt = $conn->prepare($SELECT),
	   $stmt->bind_param("s", $Userid);
	   $stmt->execute();
	   $stmt->bind_result($Userid);
	   $stmt->store_result();
	   $rnum=$stmt->num_rows;

	   if($rnum==0){
	       $stmt->close();

		   $stmt = $conn->prepare($INSERT);
		   $stmt = bind_param("iss",$Userid,$Password,$CnfrmPass);
		   $stmt->execute();
		   echo "New record inserted successfully";
	   } else{
	       echo "Record already exists";
	   }
	   $stmt->close();
	   $conn->close();
	}

}
?>
