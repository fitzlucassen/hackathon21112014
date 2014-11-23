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
<img src="<?php echo __image_directory__; ?>/bg-2.jpg" alt="" id="imgbg"/>

<div class="container-fluid">
	<div class="jumbotron text-center">
		<h1><?php echo $title; ?> <small><?php echo $subtitle; ?></small></h1>
		<button id="envoyer" class="btnField" style="display:block;">Envoyer ma liste au père noël</button>
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
						$class = $i % 2 == 0 ? "angleLeft" : "angleRight";

						echo '<div class="draggable-col ' . $class . '" id="' . $products->BestOffer->Id . '">';				
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

		<div class="col-md-4 col-xs-6 wishlist" style="width:650px;">
			<div class="wishlist-col" style="margin: 171px 0 0 118px;width: 415px;height: 210px;"></div>

			<div class="clearfix"></div>
		</div>

		<div class="col-md-4 col-xs-6">
			<div class="row wishlist-visible"></div>
		</div>
	</div>
</div>