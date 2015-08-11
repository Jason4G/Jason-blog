<!DOCTYPE html>

<html>

<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/md5.js"></script>

<head>
	<title></title>
</head>
<body>


     




<button type='button' class='btn btn-default' data-toggle='modal' data-target='#myupdate' id="updd" onClick="getpwd()">修改密码</button>



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
				        <input type="submit" class="btn btn-primary" onClick="return panduan()" value="提交" />
				      </div>
				    </div>
				  </div>
				</div>

</form> 

			
</body>
</html>


<style type="text/css">

body{font-size:12px;}

.frred{color:#FF0000; font-size:12px;}
.frbule{color:#0066CC; font-size:12px;}
.fgren{color:#339933; font-size:12px;}

</style>


<script type="text/javascript">

var spwd = null;

function getpwd(){

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

function panduan(){

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









