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
		<button id="envoyer" class="btnField" style="display:block;">J'envoie ma liste au père noël</button>
		<a target="_blank" href="<?php echo $this->Model->urlPublic;?>" id="visualiser" class="btnField" style="display:block;background: #2980b9;border-color: #3498db;width: 300px;text-decoration: none;">Visualiser ma lettre</a>
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
						echo '<img class="noeud" src="' . __image_directory__ . '/noeux.png" alt="" style="position: absolute;top: -31px;width: 90px;height: auto;left: 4px;"/>';
						echo '<img src="' . $products->MainImageUrl . '" alt="Best Offer" class="img-thumbnail pull-left hidden-img" />';
						echo '<input type="hidden" class="hidden-name" value="' . $products->Name . '" />';
						echo '<input type="hidden" class="hidden-description" value="' . str_replace('"', '£', $products->Description) . '" />';
						echo '<input type="hidden" class="hidden-price" value="' . $products->BestOffer->SalePrice . '" />';
						echo '<input type="hidden" class="hidden-url" value="' . $products->BestOffer->ProductURL . '" />';
						echo '<div class="clearfix"></div>';
						echo '</div>';
						$i++;
					}
				}
			?>
			</div>
		</div>

		<div class="col-md-4 col-xs-6 wishlist" style="width:650px;">
			<div class="wishlist-col" style="margin: 0 0 0 118px;width: 415px;height: 381px;"></div>

			<div class="clearfix"></div>
		</div>

		<div class="col-md-4 col-xs-6">
			<div class="row wishlist-visible"></div>
		</div>
	</div>
</div>