<title>Hackathon</title>

<link rel="stylesheet" href="<?php echo __css_directory__ ?>/bootstrap.css" />
<link href="http://code.jquery.com/ui/1.8.24/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css" />

<?php
    // inclure ci-dessus les balises à inclure dans la balise <head> du layout
    $head = $this->RegisterViewHead();
    // START CONTENT
    // Intégrer ci-dessous la vue
    $title = 'Title';
    $subtitle = 'Subtitle';
    $texte = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum fringilla massa sed volutpat. Praesent facilisis tempus metus.';
?>

<div class="container-fluid">
	<div class="jumbotron">
		<h1><?php echo $title; ?> <small><?php echo $subtitle; ?></small></h1>
		<p><?php echo $texte; ?></p>
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-6">
			<h1>Mes cadeaux</h1>

			<div class="draggable-col">
			<?php foreach ($this->Model->request->Products as $products) {				
				echo '<img src="' . $products->MainImageUrl . '" alt="Best Offer" class="img-thumbnail" />';
			} ?>
			</div>
		</div>

		<div class="col-md-4 col-xs-6">
			<h1>Col center</h1>

			<div class="wishlist-col" style="min-height: 300px; background-color: red;"></div>
		</div>

		<div class="col-md-4 col-xs-6">
			<h1>Mes cadeaux</h1>

			<div class="draggable-col">
			<?php foreach ($this->Model->request->Products as $products) {			
				echo '<img src="' . $products->MainImageUrl . '" alt="Best Offer" class="img-thumbnail" />';
			} ?>
			</div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>