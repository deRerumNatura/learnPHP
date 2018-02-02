<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<!-- вывести ошибки -->
					<?php if(!empty($vars['auth_errors'])): ?>
						<div style="background: pink">
							<?php foreach($vars['auth_errors'] as $erroor) :?>
								<p><?php echo $erroor; ?></p>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<!-- ////////////////////////////////////////////////////// -->
					<form action="/account/register" method="post">
						<input type="text" name="login" placeholder="Name"/>
						<input type="email"  placeholder="Email Address"/>
						<input type="password" name="pass" placeholder="Password"/>
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
					<!-- ////////////////////////////////////////////////////// -->
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
	</section><!--/form-->