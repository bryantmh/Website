<div class="container-fluid">
	<div class='main'>
		<h2>Highlights</h2>
		<p style="text-align: center;">Hey! I'm Bryant, and this is a website showcasing some of my photography</p>
		<?php
		echo "<div class='photos'>\n";
		$dirname = "./Home/";
		$images = glob($dirname."*.*");

		foreach($images as $image) {
			echo "<img src='".$image."'>\n";
		}
		// echo "</div>";
		// echo "<div id="myModal" class='modal'>
		// 	  <span class='close'>&times;</span>
		// 	  <img class='modal-content' id="img01">\
		// 	</div>";
		?>
	</div>
</div>