<?php
	include('sqld.php');

	session_start();

	date_default_timezone_set('PRC');

	$Name = $_POST['exampleInputName2'];

	$Pass = $_POST['exampleInputPass2'];

	$mysqli=sqli();

	if (empty($Name)) {

		echo "<script type='text/javascript'>

		window.alert('用户名不能为空');
		
		window.location.href='index.php';

		</script>";

		exit;

	}elseif (empty($Pass)) {

		echo "<script type='text/javascript'>

		window.alert('密码不能为空');
		
		window.location.href='index.php';

		</script>";

		exit;

	}else{

			$query = "select * from user where username='$Name'";

				$sqlld = $mysqli->query($query);

					if($sqlld->num_rows>0){

						//echo "用户名存在";
						
						$row = $sqlld->fetch_array();

							if ($row[2]==md5($Pass)) {

								$_SESSION['ID'] = $row[0];

								$LoginDATE = date('Y-m-d H:i:s');

								$query_1 = "update user set login_date='$LoginDATE',login_state='1' where id='$row[0]'";

								$sqli_1 = $mysqli->query($query_1);

								
								echo "<script type='text/javascript'>
								
								window.location.href='index.php';

								</script>";

							}else{

								echo "<script type='text/javascript'>

								window.alert('密码不正确');
								
								window.location.href='index.php';

								</script>";

							}

					}else{
						
							echo "<script type='text/javascript'>

							window.alert('用户名不存在');
							
							window.location.href='index.php';

							</script>";

					}
		}


				$sqlld -> free();
				
				$mysqli -> close();

?>