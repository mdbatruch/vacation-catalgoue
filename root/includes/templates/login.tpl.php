<!-- Login Modal -->
<div class="md-modal md-effect-16" id="modal-1">
	<div class="md-content">
		<h3>LOGIN</h3>
		<div id="login-modal-div">

			<form id="login-modal" 
				  action="index.php?action=login"
				  method="post">

				<ul id="login-modal-ul">
					<li id="login-error"></li>
					<li>
						<input id="login-username"
							   type="text" 
							   name="userName" 
							   placeholder="Username." 
							   size="30" required/>
					</li>
					<li>
						<input id="login-password"
							   type="password" 
							   name="password" 
							   placeholder="Password." 
							   size="30" required />
					</li>
					<li>
						<input type="submit" name="loginUser" value="login" />
					</li>
					<li>Or <a href="includes/templates/sign-up.tpl.php">sign up</a> quickly!</li>
				</ul>
			</form>
			<button class="md-close" id="login-modal-close">close</button>
		</div>
	</div>
</div>

<div class="container">
</div><!-- /container -->
<div class="md-overlay"></div><!-- the overlay element -->