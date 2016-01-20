<?php include_once('header.php'); ?>

<div class="demo features">
	<div class="row">
		<?php if (!file_exists("classes/config.php")) {?>
		<h1>Have you Installed Yet?</h1>
		<p class="intro">If you haven't yet <a href="install">Click ME!</a></p>
		<?}else{?>

		<h1>All Done?</h1>
		<p class="intro">Let's load up Manage My HTPC <a href="index.php">Click ME!</a></p>
		<?}?>
	</div>
</div>

<?php include_once('footer.php'); ?>