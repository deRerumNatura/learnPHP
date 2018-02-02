<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<!-- вывести ошибки -->
					<?php if(!empty($vars['auth_errors'])): ?>
						<div style="background: pink">
							<?php foreach($vars['auth_errors'] as $erroor) :?>
								<p><?php echo $erroor; ?></p>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<!-- ////////////////////////////////////////////////////// -->
					<form action="/account/login" method="post">
						<input type="text" name="login" placeholder="Name" />
						<input type="password" name="pass" placeholder="Password" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Keep me signed in
						</span>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
					<!-- ////////////////////////////////////////////////////// -->
				</div><!--/login form-->
			</div>
		</div>
	</div>
	</section><!--/form-->

<?php if (empty($_SESSION['login'])): ?>
	<form method="post" action="/account/login" >
		<input placeholder="login" type="text" name="login"/>
		<input placeholder="pass" type="text" name="pass" />
		<input type="submit" value="login" name="log_in"/>
	</form>
<?php else: ?>
	<form method="post" action="/account/logout" >
		<input type="submit" name="logout" value="logout">
	</form>
<?php endif ?>

