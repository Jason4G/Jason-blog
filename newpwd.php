<?php

	include("sqld.php");
	session_start();
	
	$sid = $_SESSION['ID'];
	$mysqli = sqli();

	$newpass = md5($_POST['newpass']);

	$query_1 = "update user set password='$newpass' where id='$sid'";

	$sqlid=$mysqli->query($query_1);

	if(!$sqlid){

		echo "<script type='text/javascript'>

			alert('变更失败!');
			window.location.href='index.php';

		</script>";

	}else{

		if($mysqli->affected_rows>0){

			echo "<script type='text/javascript'>

				alert('变更成功!');
				window.location.href='index.php';

			</script>";

		}else{

			echo "<script type='text/javascript'>

				alert('执行成功！变更失败!');
				window.location.href='index.php';

			</script>";

		}

	}

	$mysqli -> close();


?>