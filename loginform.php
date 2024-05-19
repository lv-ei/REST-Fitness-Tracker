<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/Login.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</head>

<body>
	<div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
		<div class="background-container">
			<div class="left-pane" style="background-image: url(assets/img/bg/bg3.png);"></div>
			<div class="center-pane" style="background-image: url(assets/img/bg/bg4.png);">
				<div class="lightning"></div>
			</div>
			<div class="right-pane" style="background-image: url(assets/img/bg/bg5.png);"></div>
		</div>
	</div>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form method="POST" action="regis.php">
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="https://twitter.com/CanopyFit"><i class="fab fa-twitter"></i></a>
					<a href="https://short.com.vn/Zg3f"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.instagram.com/canopyfit/"><i class="fab fa-instagram"></i></a>
				</div>
				<span>or use your email for registration</span>
				<input name="name" type="text" placeholder="Name" />
				<input name="email" type="email" placeholder="Email" />
				<input name="password" type="password" placeholder="Password" />
				<input name="phone" type="text" placeholder="Phone Number" /><br>
				<button type="submit" name="signup-button" class="signup-button">Sign Up</button>
			</form> 
		</div>
		<div class="form-container sign-in-container">
			<form method="POST" action="login.php">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="https://twitter.com/CanopyFit"><i class="fab fa-twitter"></i></a>
					<a href="https://short.com.vn/Zg3f"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.instagram.com/canopyfit/"><i class="fab fa-instagram"></i></a>
				</div>
				<span>or use your account</span>
				<input name="email" type="email" placeholder="Email" />
				<input name="password" type="password" placeholder="Password" />
				<a href="#">Forgot your password?</a>
				<button type="submit" name="signin-button" class="signin-button">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>


	<script src="./assets/js/Login.js"></script>
	<script>
		const leftPane = document.querySelector('.left-pane');
		const centerPane = document.querySelector('.center-pane');
		const rightPane = document.querySelector('.right-pane');
		const speed = 5;   // Tốc độ chạy ảnh

		// Vị trí ban đầu
		leftPane.style.top = `-${leftPane.offsetHeight}px`;
		rightPane.style.top = `-${rightPane.offsetHeight}px`;
		centerPane.style.top = `${window.innerHeight}px`;

		function moveImages() {
			// Vị trí hiện tại
			const leftPaneTop = parseInt(leftPane.style.top);
			const centerPaneTop = parseInt(centerPane.style.top);
			const rightPaneTop = parseInt(rightPane.style.top);

			// Ảnh ngoài xuống
			leftPane.style.top = `${leftPaneTop + speed}px`;
			rightPane.style.top = `${rightPaneTop + speed}px`;

			// Ảnh giữa lên
			centerPane.style.top = `${centerPaneTop - speed}px`;

			if (leftPaneTop >= window.innerHeight - leftPane.offsetHeight) {
				leftPane.style.top = `${window.innerHeight - leftPane.offsetHeight}px`;
			}
			if (centerPaneTop <= 0) {
				centerPane.style.top = `0px`;
			}
			if (rightPaneTop >= window.innerHeight - rightPane.offsetHeight) {
				rightPane.style.top = `${window.innerHeight - rightPane.offsetHeight}px`;
			}
		}
		setInterval(moveImages, 10);
	</script>
</body>

</html>