<title>Hackathon</title>

<?php
    // inclure ci-dessus les balises à inclure dans la balise <head> du layout
    $head = $this->RegisterViewHead();
    // START CONTENT
    // Intégrer ci-dessous la vue
?>
<div class="page">
	<form action="/webservice/connect" method="post">
		<input type="text" name="email"/>
		<input type="password" name="password" />
		<input type="submit" value="ok" />
	</form>

	<a href="/Test/TestCdiscount">Test</a>
</div>