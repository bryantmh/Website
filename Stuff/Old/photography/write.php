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
					<li><a class="active" href="./write.php">Write</a></li>
					<li><a href="./upload.php">Upload Photos</a></li>
					<li><a href="./display.php">View Timeline</a></li>
				</ul>
			</nav>
			<div id="body" class='grid-container'>
				<div class='main'>
					<form name="form" accept-charset="UTF-8" lang="en-US" method="post" action="" onSubmit="false">
						<fieldset>
							<legend for="time">When is this journal entry for?</legend>
							<select name="Month" id="month">
								<option value="noInput">Month</option>
								<option value="noInput">----</option>
								<option value="Jan">Jan</option>
								<option value="Feb">Feb</option>
								<option value="Mar">Mar</option>
								<option value="Apr">Apr</option>
								<option value="May">May</option>
								<option value="Jun">Jun</option>
								<option value="Jul">Jul</option>
								<option value="Aug">Aug</option>
								<option value="Sep">Sep</option>
								<option value="Oct">Oct</option>
								<option value="Nov">Nov</option>
								<option value="Dec">Dec</option>
							</select>&nbsp;/&nbsp;
							<select name="Year" id="year">
								<option value="noInput">Year</option>
								<option value="noInput">----</option>
								<?php
									for ($i = 1995; $i < 2019; $i++)
										echo "<option value='$i'>$i</option>\n";
								?>
							</select>
						</fieldset><br><br>
						<fieldset>
							<legend for="content">What would you like to say?</legend>
								<textarea rows="16"></textarea>
							</select>
						</fieldset><br>
						<button style="margin-left: 1em;" name="submit" id="submit">Submit</button>
					</form>
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