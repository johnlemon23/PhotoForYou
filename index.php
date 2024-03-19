<?php
	include ("include/entete.inc.php"); 
?>
	<div class="container text-center">
		<?php echo generationEntete("PhotoForYou", "Des pros au service des professionnels de la communication.");
		include("include/carrousel.inc.php");
		include("include/categories.inc.php");
		include("include/prix.inc.php");
		?>
	</div>
	<?php
	include ("include/piedDePage.inc.php");
?>