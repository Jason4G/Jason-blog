<?php

	include("sqld.php");
	session_start();
	
	$sid = $_SESSION['ID'];
	$mysqli = sqli();

	$query="select password from user where id='$sid'";

		$sqlld = $mysqli->query($query);

			if($sqlld->num_rows>0){

				while ($row = $sqlld->fetch_array()) {

					$pwd = $row[0];
					
				}
				
			}else{
				
					echo "无法查出结果！";

			}

			echo json_encode($pwd);

			$sqlld -> free();
			
			$mysqli -> close();


?>