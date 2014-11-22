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
		<button type="button" class="btn btn-success btn-lg">Envoyer ma lettre</button>
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-6">
			<h1>Idées de cadeaux</h1>

			<div class="row">
			<?php $i = 0;
			foreach ($this->Model->request->Products as $products) {
				if ($i >= 10) {
					break;
				} else {
					echo '<div class="draggable-col">';				
					echo '<img src="' . $products->MainImageUrl . '" alt="Best Offer" class="img-thumbnail pull-left" />';
					echo '<p class="text-danger">' . $products->Name . '</p>';
					echo '<p class="text-primary">' . $products->Brand . '</p>';
					echo '<p id="SalePrice-' . $i . '" class="cache">' . $products->BestOffer->SalePrice . '</p>';
					echo '<p id="Id-' . $i . '" class="cache">' . $products->BestOffer->Id . '</p>';
					echo '<div class="clearfix"></div>';
					echo '</div>';
					$i++;
				}
			} ?>
			</div>
		</div>

		<div class="col-md-4 col-xs-6 wishlist">
			<h1>Ma liste au Père Noël</h1>

			<div class="wishlist-col"></div>

			<button type="button" class="btn btn-success btn-lg pull-left" id="envoyer">Envoyer ma lettre</button>
			<button type="button" class="btn btn-danger btn-lg pull-right" id="reinitialiser">Réinitialiser</button>

			<div class="clearfix"></div>
		</div>

		<div class="col-md-4 col-xs-6">
			<h1>Idées de cadeaux</h1>

			<div class="row">
			<?php foreach ($this->Model->request->Products as $products2) {
				if ($i >= 20) {
					break;
				} else {
					echo '<div class="draggable-col">';				
					echo '<img src="' . $products->MainImageUrl . '" alt="Best Offer" class="img-thumbnail pull-left" />';
					echo '<p class="text-danger">' . $products->Name . '</p>';
					echo '<p class="text-primary">' . $products->Brand . '</p>';
					echo '<input type="hidden" class="cache hidden-id" value="' . $products->BestOffer->Id . '" />';
					echo '<input type="hidden" class="cache hidden-name" value="' . $products->BestOffer->SalePrice . '" />';
					echo '<input type="hidden" class="cache hidden-description" value="' . str_replace('"', '£', $products->Description) . '" />';
					echo '<input type="hidden" class="cache hidden-sale-price" value="' . $products->BestOffer->SalePrice . '" />';
					echo '<div class="clearfix"></div>';
					echo '</div>';
					$i++;
				}
			} ?>
			</div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>