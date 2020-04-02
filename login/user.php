<?php include('index1.php') ?>
<!DOCTYPE html>
<html>	
<head>
<title>Student Login And Registration Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Coupled Login Form Bootstrap Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href="../css/fonts.googleapis.com/css?family=Montserrat:400,500,700,800,800" rel="stylesheet">
<!--//webfonts-->

</head>
<body>
<!-- section -->
<section class="register">
	
		<h1>LOGIN & REGISTRATION FORM</h1>
		<div class="register-right">
			<div class="register-in">
			<h3>Please Login Here</h3>
    <form class="form" action="user.php" method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="alert alert-error"><?php include('errors.php'); ?></div>

						<div class="fields-grid">
								<div class="styled-input">
								<input type="text" name="username" required/>
								<label>username</label>
								<span></span>
							</div>
							<!--<div class="styled-input">-->
							  <table>
							      <tr><td><label style="color:white">DOB:&nbsp; </label></td><td> <input type="date" name="dob" value="<?php echo date('dd-mm-yy');?>"/></td></tr>
							  </table>
							<!--</div>-->
						<br/><br/>
							<div class="styled-input">
								<input type="password" name="password" required/>
								<label>Password</label>
								<span></span>
							</div>
							
							<div class="styled-input">
								<input type="password" name="password2" required/>
								<label>Retype Password</label>
								<span></span>
							</div>
							
							<div class="clear"> </div>
							 
						</div>
						<div class="w3_lgn">
						<input type="submit" value="LOGIN" name="signup">
						</div>
					</form>
			</div>
		</div>
		<div class="register-right">
			<div class="register-in">
				<h2>Register Here</h2>
								<div class="register-form">
    <form class="form" action="user.php" method="post" enctype="multipart/form-data" autocomplete="off">
<div class="alert alert-error"><?php include('errors.php'); ?></div>

					<div class="fields-grid">
							
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="username" required=/> 
								<label>User Name</label>
								<span></span>
							</div>
							<!--<div class="styled-input agile-styled-input-top">-->
							<!--	<input type="text" name="dob" required=/> -->
							<!--	<label>DOB</label>-->
							<!--	<span></span>-->
							<!--</div>-->
							<table>
							      <tr><td><label style="color:white">DOB:&nbsp; </label></td><td> <input type="date" name="dob" value="<?php echo date('dd-mm-yy');?>"/></td></tr>
							  </table>
							  	<br/><br/>
							<div class="styled-input">
								<input type="text" name="email" required=/>
								<label>Email</label>
								<span></span>
							</div>
							
							<div class="styled-input">
								<input type="password" name="password" required=/>
								<label>Password</label>
								<span></span>
							</div>
							
							<div class="styled-input">
								<input type="password" name="password2" required=/>
								<label>Retype Password</label>
								<span></span>
							</div>
							
							<div class="clear"> </div>
							
						</div>
						<div class="w3_lgn1">
						<input type="submit" value="SIGN UP" name="register">
						</div>
					</form>
			
				</div>
			</div>
			<div class="clear"> </div>
		</div>
	<div class="clear"> </div>
	
</section>		
	<!-- copyright -->
	<p class="agile-copyright">&copy  PRIDIP Technology And Solution. All Rights Reserved | Design by Dipan & Pritam</p>
	<!-- //copyright -->

<!-- //section -->

</body>
</html>