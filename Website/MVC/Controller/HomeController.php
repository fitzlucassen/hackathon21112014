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
		    $Auth = new Helper\Auth($this->_repositoryManager, array(
				'table' => 'user',
				'primaryKeyField' => 'id',
				'loginField' => 'email',
				'passwordField' => 'password',
				'adminField' => 'isAdmin',
				'encryptedPassword' => true
			));

		    if(Core\Request::isPost() || Core\Request::isGet()){
		    	// It's a form validation
		    	// Clean all vars
		    	$data = Core\Request::cleanRequest();

		    	$UserRepository = $this->_repositoryManager->get('user');
		    	$UserRepository->add(array(
		    		'childfirstname' => $data['childfirstname'],
		    		'childlastname' => '',
		    		'age' => $data['age'],
		    		'gender' => $data['gender'],
		    		'creationdate' => dsate('y-m-d'),
		    		'email' => $data['email'],
		    		'password' => md5($data['password'])
		    	));

		    	$Auth->connect($data['email'], $data['password']);

		    	header('location: /lettre.html');
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

		    	$html .= $Form->input("button", "nextStep", "Ok", false, true, array("class" => "btnField btnNextStep"), true);

		    	$html .= $Form->input(
		    		"number", 
		    		"age", 
		    		"", 
		    		"D'accord, mais dis moi {0}, quel âge as-tu ?", 
		    		false, 
		    		array("class" => "textField hidden", "placeholder" => "Ton âge"), 
		    		true
		    	);

		    	$html .= $Form->input("button", "nextStep", "Ok", false, true, array("class" => "btnField btnNextStep"), true);

		    	$html .= $Form->select(
		    		"gender", 
		    		array('Garçon' => 0, 'Fille' => 1), 
		    		"Oh ! Mais tu es déjà grand ! Es-tu une grande fille ou un grand garçon ?", 
		    		false, 
		    		array("class" => "select hidden"), 
		    		true
		    	);

		    	$html .= $Form->input("button", "nextStep", "Ok", false, true, array("class" => "btnField btnNextStep"), true);

		    	$html .= $Form->input(
		    		"email", 
		    		"email", 
		    		"",
		    		"{1} ! Dis moi {0}, pour pouvoir m'écrire ta lettre il faudrait que tu appels tes parents afin qu'ils me parlent un peu de toi !", 
		    		false, 
		    		array("class" => "textField hidden", "placeholder" => "L'adresse e-mail de tes parents"), 
		    		true
		    	);

		    	$html .= $Form->input("button", "nextStep", "Ok", false, true, array("class" => "btnField btnNextStep"), true);

		    	$html .= $Form->input(
		    		"password", 
		    		"password", 
		    		"",
		    		"Parfait ! Pour pouvoir vous connecter sur votre lettre il vous faut maintenant choisir un mot de passe...", 
		    		false, 
		    		array("class" => "textField hidden", "placeholder" => "mot de passe"), 
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