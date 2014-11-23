<title>Hackathon</title>

<link rel="stylesheet" href="<?php echo __css_directory__ ?>/bootstrap.css" />
<link href="http://code.jquery.com/ui/1.8.24/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css" />

<?php
    // inclure ci-dessus les balises à inclure dans la balise <head> du layout
    $head = $this->RegisterViewHead();
    // START CONTENT
    // Intégrer ci-dessous la vue
    $title = 'Dépose les cadeaux que tu veux dans la hotte !';
    $subtitle = '';
    $texte = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum fringilla massa sed volutpat. Praesent facilisis tempus metus.';
?>

<div class="container-fluid">
	<div class="jumbotron text-center">
		<h1><?php echo $title; ?> <small><?php echo $subtitle; ?></small></h1>
		<!-- <p><?php echo $texte; ?></p> -->
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-6">
			<div class="row gift-list">
			<?php 
				$i = 0;
				foreach ($this->Model->request->Products as $products) {
					if ($i >= 10) {
						break;
					}
					else {
						echo '<div class="draggable-col" id="' . $products->BestOffer->Id . '">';				
						echo '<img src="' . $products->MainImageUrl . '" alt="Best Offer" class="img-thumbnail pull-left hidden-img" />';
						echo '<input type="hidden" class="hidden-name" value="' . $products->Name . '" />';
						echo '<input type="hidden" class="hidden-description" value="' . str_replace('"', '£', $products->Description) . '" />';
						echo '<input type="hidden" class="hidden-price" value="' . $products->BestOffer->SalePrice . '" />';
						echo '<div class="clearfix"></div>';
						echo '</div>';
						$i++;
					}
				}
			?>
			</div>
		</div>

		<div class="col-md-4 col-xs-6 wishlist light-white">
			<div class="wishlist-col"></div>

			<div class="clearfix"></div>
		</div>

		<div class="col-md-4 col-xs-6">
			<button type="button" class="btn btn-success btn-lg pull-left" id="envoyer">Envoyer ma lettre</button>
			<button type="button" class="btn btn-danger btn-lg pull-right" id="reinitialiser">Réinitialiser</button>

			<div class="clearfix"></div>

			<div class="row wishlist-visible"></div>
		</div>
	</div>
</div>