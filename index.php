<!DOCTYPE html>
<html>
<head>

<!-- 返回顶部 -->
<link rel="stylesheet" type="text/css" href="css/lrtk.css">

<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

<script type="text/javascript" src="js/jquery.js"></script>

<!-- 返回顶部 -->
<script type="text/javascript" src="js/js.js"></script>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/md5.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Jason Blog</title>

<style type="text/css">

	#Container{
	
		width:100%;
		margin:0 auto;   <--!设置整个窗口在浏览器中水平剧中-->

	}

	#Header{
		
		height:120px;
		background:#ededed;
		padding-top:1px;

	}

	#logo{

		padding-left:30px;
		padding-top:25px;
		padding-bottom:5px;
		background:#00F5FF;


	}

	#Content{

		height:overflow:auto;	//一般使用 overflow:auto; 自动适应高度。不指定高度默认1个字符高度。
		margin-top:20px; 
		background:#OFF;

	}

	#Content-Left{

		height:400px;
		width:300px;
		margin:20px;
		float:right;
		#background:#ededed;
		
	}

	#Content-Main{
		height:80%;
		width:800px;
		margin:50px;
		#background:#ededed;

	}

	#Footer{

		height:40px;
		margin-top:20px;
		background:#ededed;

	}

	.Clear{

		clear:both;

	}

	#right{ 
		text-align:right;
		#float:right;
		padding-right:15px;
	}

	#top{
		border-top-width:0px;
	}


	body{font-size:12px;}

	.frred{color:#FF0000; font-size:12px;}
	.frbule{color:#0066CC; font-size:12px;}
	.fgren{color:#339933; font-size:12px;}
	

</style>
</head>


<body>

<div id="code"></div>
<div id="code_img"></div>
<a id="gotop" href="javascript:void(0)"></a>

<center>

<div id="Container"> 

	<div id="Header" style="background-image:url()";>
			
	<!--	<div class="page-header">-->


	<h1>Jason **<small>啪啪已啪啪。</small></h1>

	<div id="right">

		<?php

			error_reporting(E_ALL &~E_NOTICE);

			session_start();

			$sid = $_SESSION['ID'];

			if ($sid!=null) {
				
				echo "<div class='btn-group' role='group' aria-label='..'>
						  <button type='button' class='btn btn-default' data-toggle='modal' data-target='#mylog'>发日志</button>
						  <button type='button' class='btn btn-default' data-toggle='modal' data-target='#myupdate' id='updd' onClick='upkkk()'>修改密码</button>
						  <button type='button' class='btn btn-default' onClick='out()'>退出</button>
						</div>";


			}else{

				echo "

					<form class='form-inline' method='POST' action='login.php' id='login'>

					  <div class='form-group'>

					    <label for='exampleInputName2'></label>

					    <input type='text' class='form-control' id='exampleInputName2' name='exampleInputName2' value='Jason' placeholder='Jason' readonly>
					 
					  </div>
					  
					  <div class='form-group'>
					   
					    <label for='exampleInputPass2'></label>
					    
					    <input type='password' class='form-control' id='exampleInputPass2' name='exampleInputPass2' placeholder='PassWord'>
					  
					  </div>
					  
					  <button type='submit' class='btn btn-default'>GO</button>
					
					</form>

				";

				}
		?>

	</div>
				<!-- Modal 密码修改 -->

			<form id="update" name="update" method="post" action="newpwd.php">

				<div class="modal fade" id="myupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Jason-修改密码</h4>
				      </div>
				      <div class="modal-body">
				        <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="旧密码" maxlength="16" onblur="oldpwd()" /><span id='spwd' class='ftpwd'></span>
				        <br />
				        <input type="password" class="form-control"	id="newpass" name="newpass" placeholder="新密码 6~16位 字母 数字" maxlength="16" onblur="newpwd()"><span id='srpwd' class='frbule'></span>
				        <br />
				        <input type="password" class="form-control" id="conpass" name="conpass" placeholder="重复密码" maxlength="16" onblur="conpwd()"><span id='fsrpwd' class='frbule'></span>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <input type="submit" class="btn btn-primary" onClick="return subcon()" value="提交" />
				      </div>
				    </div>
				  </div>
				</div>


				<!-- Modal 发日志 -->
				<div class="modal fade" id="mylog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Jason-编辑日志</h4>
				      </div>
				      <div class="modal-body">
				      	<input type="text" class="form-control" placeholder="日志标题" id="settitle" >
				      	<br />
				        <textarea class="form-control" style="resize:none" rows="20" placeholder="日志内容" id="setlog" ></textarea>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" class="btn btn-primary">提交</button>
				      </div>
				    </div>
				  </div>
				</div>

			</form>
	<!--	<ol class="breadcrumb">

	  	<li><a href="#">login</a></li>

		</ol>

		</div>	
			
		<div id="logo"></div>
		
	</div>  -->

	<div id="Content">
		
	<!--	<div id="Content-Left">Content-Left</div> -->

		<div id="Content-Main">

				<ul class="nav nav-pills">

				  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">HOME</a></li>

				  <li role="presentation"><a href="#tag" aria-controls="tag" role="tab" data-toggle="tab">TAG</a></li>

				  <li role="presentation"><a href="#i" aria-controls="i" role="tab" data-toggle="tab">I'AM</a></li>

				</ul>

				<div class='panel panel-default'>

					<div class="tab-content">

						<div role="tabpanel" class="tab-pane active" id="home">

							<div class='panel-body' >

							<div class='panel panel-default'>
						    	
						    	<?php  

						    		//header('Content-Type:text/html;charset=utf-8');

						    		include("sqld.php");

						    		$num = selnum();

						    		$cont = selcont();

						    		$cont_time = seltime();

						    		$y=0;

						    			for ($i=0; $i < $num; $i++) { 

						    				echo "

												

													<div class='panel-heading'>

													<dt>

												"; 

						    				print($cont[$i][0]);

						    				echo "
													
													</dt>

													<footer style='text-align: right'>Jason<cite title=''>-".$cont_time[$i][0]."</cite></footer>

						 						 	</div>

						  						";

					  						for (; $y <= $i; $y++) { 

							    				echo "<div class='panel-body'><dl><dt><dd><p class='text-left'>";

							    				print($cont[$y][1]);
							    				
							    				echo "</p></dd></dt></dl></div>";
						    				
						    				}
						    				
						    				
						    			}

										//echo $cont[0][0];
										//header();
						    		
						     	?>

						    </div>

						</div>

					</div>
								
								<div role="tabpanel" class="tab-pane" id="tag">
										tag
									</div>
								
								<div role="tabpanel" class="tab-pane" id="i">
										I'am
									</div>

				  </div>
						
			<!--           -->

									
		</div>

	</div>

	<div class="Clear"></div>
	
	<div id="Footer">http://www.bootcss.com <br/> @jason</div>

</div>

</center>

</body>

</html>

<script type="text/javascript">
	
	function out(){

		window.location.href='out.php';

	}

	var spwd = null;

	function upkkk(){

	$.ajax({

	      url: 'updatepwd.php',
	      type: 'POST',
	      dataType:'json',  
	      success: function(data){
	        spwd = data;
	       return spwd;
	      }

	    });

	}

	function oldpwd(){

		var fpwd=document.getElementById("oldpass");
		var ftpwd=document.getElementById("spwd");

		var md5fpwd = hex_md5(fpwd.value);

			 if(fpwd.value==""){

			 	ftpwd.className="frred";
				ftpwd.innerHTML="× 旧密码不可为空！";
				return false;

			 }else if(md5fpwd != spwd){

				ftpwd.className="frred";
				ftpwd.innerHTML="× 旧密码错误！";
				return false;

			}else{

				ftpwd.className="fgren";
				ftpwd.innerHTML="√ 旧密码验证通过！";			

			}
				return true;	

	}

	function newpwd(){

		var fpwd=document.getElementById("newpass");
		var ftpwd=document.getElementById("srpwd");

		var md5fpwd = hex_md5(fpwd.value);

			if(fpwd.value==""){

				ftpwd.className="frred";
				ftpwd.innerHTML="× 请输入新密码";
				return false;

			}else if (fpwd.value.length<6) {

				ftpwd.className="frred";
				ftpwd.innerHTML="× 密码不能少于6位！";
				return false;

			}else if(md5fpwd==spwd){

				ftpwd.className="frred";
				ftpwd.innerHTML="× 新密码不能与旧密码相同！";
				return false;

			}else{

				ftpwd.className="fgren";
				ftpwd.innerHTML="√密码可用！"	

			}
			return true;
	}

	function conpwd(){

		var fpwd=document.getElementById("newpass");
		var frpwd=document.getElementById("conpass");
		var ftrpwd=document.getElementById("fsrpwd");

			if(frpwd.value=="")
			{

				ftrpwd.className="frred";
				ftrpwd.innerHTML="× 再次输入新密码！"
				return false;

			}else if(frpwd.value!=fpwd.value){

				ftrpwd.className="frred";
				ftrpwd.innerHTML="× 俩次密码输入不一致，请重新输入！";
				return false;

			}else{

				ftrpwd.className="fgren";
				ftrpwd.innerHTML=" √ 密码输入正确"

			}
			return true;
	}

	function subcon(){

		if(oldpwd()){

			if(newpwd()){

				if(conpwd()){
					return true;
				}else{
					return false;
				}

			}else{
				return false;
			}
		}else{
			return false;
			
		}
		}

</script>