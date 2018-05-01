<div id="body" class='row'>
	<div class='sidebar col-md-1'>
		<?php
		for ($i = 1995; $i < 2019; $i++)
			echo "<a href='./display.php?year=$i'>$i</a><br>\n";
		?>
	</div>
	<div class='main col-md-8 col-lg-9 col-xl-10'>
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
	
</div>