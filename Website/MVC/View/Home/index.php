<title>Hackathon</title>

<?php
    // inclure ci-dessus les balises à inclure dans la balise <head> du layout
    $head = $this->RegisterViewHead();
    // START CONTENT
    // Intégrer ci-dessous la vue
?>
<div class="page">
	<div class="perenoel">
	</div>

	<div style="width: 500px;text-align:center;margin:auto;">
		<?php echo $this->Model->htmlForm; ?>
	</div>
	<!-- <form action="/webservice/connect" method="post">
		<input type="text" name="email"/>
		<input type="password" name="password" />
		<input type="submit" value="ok" />
	</form>

	<a href="/Test/TestCdiscount">Test</a> -->
</div>