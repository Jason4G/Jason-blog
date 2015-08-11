<?php
	
	function sqli(){
		
		$db_host="localhost";                                            //连接的服务器地址

		$db_user="text";                                                 //连接数据库的用户名

		$db_psw="123123";                                                //连接数据库的密码

		$db_name="test";                                          		 //连接的数据库名称

		$mysqli=new mysqli();

		$mysqli->connect($db_host,$db_user,$db_psw,$db_name);

		$mysqli -> query("SET NAMES utf8");

		return $mysqli;

	}

	function selnum(){									//查文本总数

		$mysqli=sqli();

		$query="select count(*) from show_content";

			$sqlld = $mysqli->query($query);

				if($sqlld->num_rows>0){

					$num = $sqlld->fetch_row();

					
				}else{
					
						echo "无法查出总条数！";

				}

				return $num[0];

				$sqlld -> free();
				
				$mysqli -> close();

	}

	function selcont(){											//显示文本

		$mysqli = sqli();

		$query = "select title,content from show_content order by id desc";

			$sqlld = $mysqli->query($query);

				if($sqlld->num_rows>0){

					while ($row = $sqlld->fetch_array()) {

						$cont_arr[] = $row;

						
						//print_r($cont_arr);

						//echo "<br/>";
						

					}
					
					
				}else{
					
						echo "没有文本数据！";

				}

				return $cont_arr;

				$sqlld -> free();
				
				$mysqli -> close();

	}
	
//selcont();


	function seltime(){									//查文本日期

		$mysqli=sqli();

		$query="select rel_time from show_content order by id desc";

			$sqlld = $mysqli->query($query);

				if($sqlld->num_rows>0){

					while ($row = $sqlld->fetch_array()) {

						$cont_time[] = $row;
						
					}
					
				}else{
					
						echo "无法查出日期！";

				}

				return $cont_time;

				$sqlld -> free();
				
				$mysqli -> close();

	}
	
?>