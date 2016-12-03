<?php 
$conn_string = "postgres://qpevunpbkpaeje:4gCdE7avETx_BP2BPg0V2a4qIz@ec2-54-221-245-174.compute-1.amazonaws.com:5432/dckvl1dlptjamr";
$dbconn4 = pg_connect($conn_string);
//connect to a database named "dcdhmp2hbn5ol8" on the host "ec2-174-129-223-35.compute-1.amazonaws.com" with a username and password
if(!$dbconn4){ 
	echo "Error : Unable to open database\n"; 
}

?>
