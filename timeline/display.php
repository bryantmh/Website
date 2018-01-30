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
					<li><a href="./upload.php">Upload Photos</a></li>
					<li><a class="active" href="./display.php">View Timeline</a></li>
				</ul>
			</nav>
			<div id="body" class='grid-container'>
				<div class='main'>
					<?php
						if (!isset($_GET["year"]))
							$_GET["year"] = 2017;
						echo "<h2>".$_GET["year"]."</h2>\n";
						echo "<div class='photos'>\n";
							$dirname = "./".$_GET["year"]."/";
							$images = glob($dirname."*.*");

							foreach($images as $image) {
							    echo "<img src='".$image."'>\n";
							}
						echo "</div>";
					?>
				</div>
				<div class='sidebar'>
						<?php
							for ($i = 1995; $i < 2019; $i++)
								echo "<a href='/timeline/display.php?year=$i'>$i</a><br>\n";
						?>
				</div>
			</div>
			<footer>
				<a href="https://github.com/bryantmh/Website/tree/master/timeline">GitHub Repository</a>
			</footer>
		</div>
	</body>
</html>