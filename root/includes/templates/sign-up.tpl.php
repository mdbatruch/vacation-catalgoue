<?php
include("../functions.inc.php");
include("../config.inc.php");
include("../connect.inc.php");

$page_title = 'Sign Up';

if(isset($_POST['signup-username'])){
	addUser($database, $_POST['signup-username'], $_POST['signup-email'], $_POST['signup-password']);
};

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />

		<title>Vacation Spot - <?php echo $page_title;?></title>

		<!-- main stylesheet link -->
		<link rel="stylesheet" href="../../css/style.css" />

		<!-- HTML5Shiv: adds HTML5 tag support for older IE browsers -->
		<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<![endif]-->
	</head>

	<body>

		<main>
			<div id="contain_signUp">

				<a id="backHome" href="../../index.php">
					<img id="backHome_button" 
						 src="../../images/button-backHome.png" 
						 alt="button" />Back Home
				</a>

				<h2>Welcome</h2>
				<p>Create your own account and begin your vocation plans.</p>

				<div id="user_icon">
					<!--PAM: ADD IMG FOR USER ICON ??-->
					<img scr="" alt="" />
				</div>

				<form id="signUp_form" 
					  action="sign-up.tpl.php"
					  method="post">

					<p>NOTE : <span class="error">* Required Field</span></p>

					<ul>
						<li>
							<span class="error">
								<?php // echo $errors['userName'];?>
							</span>

							<input id="userName"
								   type="text" 
								   name="signup-username" 
								   placeholder="Please enter your user name." 
								   size="30" required />
						</li>
						<li>
							<span class="error">
								<?php // echo $errors['email'];?>
							</span>

							<input type="email" 
								   name="signup-email" 
								   placeholder="Please enter your email address."
								   size="30" required />

							<span class="error">*</span>
						</li>
						<li>
							<span class="error">
								<?php // echo $errors['password'];?>
							</span>

							<input type="password" 
								   name="signup-password" 
								   placeholder="Please enter your password." 
								   size="30" required />

							<span class="error">*</span>
						</li>

						<!--
<li>
<span class="error">
<?php // echo $errors['confirm_password'];?>
</span>

<input type="confirmPassword" 
name="confirmPassword" 
placeholder="Please confirm your password." size="30" />

<span class="error">*</span>
</li>
-->

						<li>
							<input type="submit" name="submit" value="Create An Account" />
						</li>
					</ul>
				</form>
			</div>
		</main>

	</body>
</html>