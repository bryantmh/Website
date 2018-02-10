<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./timeline.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<title>Timelines</title>
	</head>
	<body>
		<div id="container">
			<nav>
				<div><i class="fa fa-3x fa-long-arrow-right" aria-hidden="true"></i><h1>BryantHinton.com</h1></div>
				<ul>
					<li><a class="active" href="./">Home</a></li>
					<li><a href="./start.html">Getting Started</a></li>
					<li><a href="./write.php">Write</a></li>
					<li><a href="./upload.html">Upload Photos</a></li>
					<li><a href="./display.php">View Timeline</a></li>
				</ul>
			</nav>
			<div id="body" class='grid-container' style="grid-gap: 4em;">
				<div class='main'>
					<h2>Timelines</h2>
					<p style="text-align: center;">Welcome to Timelines: An app combining the best of photo management with writing in your journal</p>
					<?php
						echo "<div class='photos'>\n";
							$dirname = "./Home/";
							$images = glob($dirname."*.*");

							foreach($images as $image) {
							    echo "<img src='".$image."'>\n";
							}
						echo "</div>";
					?>
				</div>
				<div class='sidebar' style="width: 15em; padding: 2em; text-align: left; max-height: 350px;">
					<p style=""><b>Login</b></p>
					<form>
						<label for="Username">Username<br></label>
						<input name="username" id="Username"><br>
						<label for="Password">Password<br></label>
						<input name="password" id="Password"><br><br>
						<button name="login" id="Login">Login</button>
						<br><br>
						<p><b>Don't have a login?<br>Create one now!<br>It's easy and free</b></p>
						<button name="register" id="Register">Register</button>
					</form>
				</div>
			</div>
			<footer>
			</footer>
		</div>
	<body>
</html>