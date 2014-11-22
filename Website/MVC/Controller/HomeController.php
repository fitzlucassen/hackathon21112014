<?php

    namespace fitzlucassen\FLFramework\Website\MVC\Controller;
    
    use fitzlucassen\FLFramework\Website\MVC\Model;
    use fitzlucassen\FLFramework\Library\Helper;
    use fitzlucassen\FLFramework\Library\Adapter;
    use fitzlucassen\FLFramework\Data\Repository;
    use fitzlucassen\FLFramework\Library\Core;
    
     /*
	Class : HomeController
	Déscription : Permet de gérer les actions en relation avec le groupe de page Home
     */
    class HomeController extends Controller {
		public function __construct($action, $manager) {
		    parent::__construct("home", $action, $manager);
		}
		
		public function Index(){
		    // Une action commencera toujours par l'initilisation de son modèle
		    // Cette initialisation doit obligatoirement contenir le repository manager
		    $Model = new Model\HomeModel($this->_repositoryManager);

		    $Form = new Helper\Form();

		    if(Core\Request::isPost() || Core\Request::isGet()){
		    	// It's a form validation
		    	// Clean all vars
		    	$data = Core\Request::cleanRequest();

		    	// Process request...
		    }
		    else {
		    	// On créée notre formulaire
		    	$html = "";
		    	$html .= $Form->open();
		    	$html .= $Form->input(
		    		"text", 
		    		"childfirstname", 
		    		"", 
		    		"Ho ho ho ! Bonjour mon petit, comment t'appels-tu ?", 
		    		false, 
		    		array("class" => "textField current", "placeholder" => "Ton prénom"), 
		    		true
		    	);

		    	$html .= $Form->input(
		    		"number", 
		    		"age", 
		    		"", 
		    		"D'accord, mais dis moi {0}, quel âge as-tu ?", 
		    		false, 
		    		array("class" => "textField hidden", "placeholder" => "Ton âge"), 
		    		true
		    	);

		    	$html .= $Form->input(
		    		"email", 
		    		"email", 
		    		"",
		    		"Oh, quel grand garçon ! Dis moi {0}, pour pouvoir m'écrire ta lettre il faudrait que tu appels tes parents afin qu'ils me parlent un peu de toi !", 
		    		false, 
		    		array("class" => "textField hidden", "placeholder" => "L'adresse e-mail de tes parents"), 
		    		true
		    	);

		    	$html .= $Form->input(
		    		"password", 
		    		"password", 
		    		"",
		    		"Parfait ! Pour pouvoir vous connecter sur votre lettre il vous faut maintenant choisir un mot de passe...", 
		    		false, 
		    		array("class" => "textField hidden", "placeholder" => "password"), 
		    		true
		    	);

		    	$html .= $Form->input("submit", "validation", "VALIDER", false, true, array("class" => "btnField"), true);
		    	$html .= $Form->close();

		    	$Model->htmlForm = $html;
		    }
		    		    
		    // Une action finira toujours par un $this->_view->ViewCompact contenant : 
		    // cette fonction prend en paramètre le modèle
		    $this->_view->ViewCompact($Model);
		}
		
		public function Error404(){
		    $Model = new Model\HomeModel($this->_repositoryManager);
		    
		    $this->_view->ViewCompact($Model);
		}
    }