<?php 
	#session_start();
	include('Users.php');
	$allUser = new AllUser;
	$error['error']='';
	$_SESSION['patientAssoc']="";
	$_SESSION['doctorAssoc']="";
	
	if($_POST){
        session_start();
		$error=$allUser->loginValidation($_POST);
		$_SESSION['userAssoc']=$allUser->getAssocRowFromUser();
		if($error['error']==''){
			if($allUser->isPatient()){
				$_SESSION['patientAssoc']=$allUser->getAssocRowFromPatient();
			} else {
				$_SESSION['doctorAssoc']=$allUser->getAssocRowFromDoctor();
			}
			header('Location: home.php');
		}
	}
?>
<html>
	<head>
		<?php include('bootstrapIncluder.php');?>
		<?php //include('connection.php');?>
		<style>
         body { background-image: url("cover.jpg"); background-color: #cccccc; } 
        
        </style>
		
	</head>
	<body>
			<div   class="col-sm-10 col-sm-offset-5 col-md-4 col-md-offset-4 main">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
                       <div class="text-primary">
                          <h1 class="title">WELCOME TO DOCTOR-PATIENT APPOINTMENT SYSTEM</h1>
                       </div>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						
						

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label"><p class="text-primary">Username</p></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input required type="text" class="form-control" name="u_name" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label"><p class="text-primary">Password</p></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input required type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<?php if($error['error']!=""){echo($error['error']);} ?>
						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
						</div>
						<div align="center" class="login-register">
				            <div class="btn btn-basic"></div><a href="registration.php" >Register</a>
				         </div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>