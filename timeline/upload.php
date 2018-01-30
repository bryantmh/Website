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
					<li><a href="./">Home</a></li>
					<li><a href="./start.html">Getting Started</a></li>
					<li><a href="./write.php">Write</a></li>
					<li><a class="active" href="./upload.php">Upload Photos</a></li>
					<li><a href="./display.php">View Timeline</a></li>
				</ul>
			</nav>
			<div id="body" class='grid-container' style="grid-gap: 4em;">
				<div class='main'>
					<h2>Upload a Photo</h2>
					<form name="form" accept-charset="UTF-8" lang="en-US" method="post" action="" onSubmit="false">
						<label for="File">Select a file to upload</label><br><br>
						<input name="file" id=File type="file">
						<button style="margin-left: 1em;" name="submit" id="submit">Submit</button>
					</form>
					
				</div>
				<div class='sidebar'>
					<?php
						for ($i = 1995; $i < 2019; $i++)
						echo "<a href=''>$i</a><br>\n";
					?>
				</div>
			</div>
			<footer>
			</footer>
		</div>
	<body>
</html>
