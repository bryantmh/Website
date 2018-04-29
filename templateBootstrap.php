<?php
$title = $title ?? '';
$pageName = $pageName ?? '';
$navLinks = $navLinks ?? [];
$body = $body ?? '';
$header = $header ?? '';
$footer = $footer ?? '';
$icon = $icon ?? '';
$menuLinks = $menuLinks ?? $_SERVER['DOCUMENT_ROOT'].'/menuLinks.php';
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link rel="stylesheet" href="/templateStyles.css">
	<?php include $menuLinks; ?>
	<?php echo $header; ?>
	<title><?= $title ?></title>
</head>

<body>
	<header>
		<nav class="bg-dark static-top">
			<div>
				<h1><?= $icon ?><a class="navbar-brand" href="#"><?= $pageName ?></a></h1>
			</div>
			<div class="navbar navbar-expand-md navbar-dark">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTabs" aria-controls="navTabs" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navTabs">
					<div class="navbar-nav">
						<?php
						$active = null;
						foreach ($navLinks as $link => $name) {
							if ($link == $_SERVER['PHP_SELF'] || $link."/index.php" == $_SERVER['PHP_SELF'])
								$active = $link;
						}
						if ($active == null)
							$active = "/";
						foreach ($navLinks as $link => $name) {
							if ($link == $active)
								echo "<a class='nav-item nav-link active' href='$link'>$name<span class='sr-only'>(current)</span></a>";
							else
								echo "<a class='nav-item nav-link' href='$link'>$name</a>";
						}
						?>  
					</div>
				</div>
			</div>
		</nav>
	</header>

	<main role="main" class="container" id="mainContainer">
		<?php include $body; ?>
	</main>

	<footer class="footer">
		<div class="container">
			<a href="https://github.com/bryantmh">My GitHub</a>
		</div>
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<?php echo $footer; ?>
</body>
</html>