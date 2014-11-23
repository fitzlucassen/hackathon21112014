<title>Lettre au père noël</title>

<link rel="stylesheet" href="/<?php echo __css_directory__ ?>/bootstrap.css" />

<?php
    // inclure ci-dessus les balises à inclure dans la balise <head> du layout
    $head = $this->RegisterViewHead();
    // START CONTENT
    $title = 'Dépose les cadeaux que tu veux dans la hotte !';
    $subtitle = '';
    $texte = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum fringilla massa sed volutpat. Praesent facilisis tempus metus.';
?>
<img src="/<?php echo __image_directory__; ?>/lettre.png" alt="" id="imgbg"/>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-xs-6"></div>

		<div class="col-md-4 col-xs-6 lettre" style="margin: 36px 0 0 118px; width: 428px;">
			<p>je m'appel <?php echo $this->Model->user[0]->getChildfirstname(); ?>, j'ai <?php echo $this->Model->user[0]->getAge(); ?> ans et pour Noël, je voudrais :</p>
			<ul style="max-height: 300px; overflow: auto;">
				<?php foreach ($this->Model->products as $products) {
					echo '<li>';
					echo '<img src="' . $products->getImage() . '" class="img-thumbnail pull-left" width="60" height="60" />';
					echo '<h3>' . $products->getTitle() . '</h3>';
					echo '<div class="clearfix"></div>';
					echo '</li>';
				} ?>
			</ul>
			<p>J'espèr que tu m'apportera tout ce que j'ai commandé. Merci !</p>
		</div>

		<div class="col-md-4 col-xs-6"></div>
	</div>
</div>