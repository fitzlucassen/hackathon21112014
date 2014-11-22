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
		    		'creationdate' => date('y-m-d'),
		    		'email' => $data['email'],
		    		'password' => md5($data['password'])
		    	));

		    	$Auth->connect($data['email'], $data['password']);

		    	header('location: /lettre.html');
		    }
		    else {
		    	// On créée notre formulaire

		    	$h = "";
		    	$h .= $Form->open("/home/login");
		    	$h .= $Form->input(
		    		"text", 
		    		"email", 
		    		"", 
		    		false, 
		    		false, 
		    		array("class" => "textField current", "placeholder" => "E-mail"), 
		    		true
		    	);
		    	$h .= $Form->input(
		    		"password", 
		    		"password", 
		    		"", 
		    		false, 
		    		false, 
		    		array("class" => "textField current", "placeholder" => "mot de passe"), 
		    		true
		    	);
		    	$h .= $Form->input("submit", "validation", "Connexion", false, true, array("class" => "btnField"), true);
		    	$h .= $Form->close();

		    	$Model->loginForm = $h;

		    	$phrase1 = array(
		    		'Ho ho ho ! Bonjour, comment t\'appelles-tu ?',
		    		'Bonjour bonjour ! Quel est ton prénom ?',
		    		'Coucou ! tu t\'appelles comment ?'
		    	);
		    	$phrase2 = array(
		    		'Salut {0} ! Dis-moi, quel âge as-tu ?',
		    		'{0} ? Quel joli prénom! quel âge as-tu ?',
		    		'Quel âge as-tu, {0} ?'
		    	);
		    	$phrase3 = array(
		    		'Oh ! Mais tu es déjà grand ! Es-tu une grande fille ou un grand garçon ?',
		    		'{2} ans? génial ! Es-tu un garçon ou une fille ?',
		    		'{0} tu préfères plutôt les princesses ou les vaisseaux spatiaux ?'
		    	);
		    	$phrase4 = array(
		    		'Dis moi {0}, pour pouvoir m\'écrire ta lettre il faudrait que tu appelles tes parents afin qu\'ils me parlent un peu de toi !',
		    		'Très bien {0}. Pour que mes rennes puissent m\'amener chez toi, appelle-moi tes parents à tes cotés pour écrire l\'adresse :'
		    	);

		    	$phrase5 = array(
		    		'Parfait ! Pour pouvoir recevoir ta lettre il me faut un mot magique : écris le ici avec l\'aide de maman et papa',
		    		'Super, Choisi maintenant un mot magique et écris le avec maman et papa :',
		    		'Génial ! Il ne te reste plus qu\'à choisir un mot magique, va chercher maman et papa'
		    	);

		    	$html = "";
		    	$html .= $Form->open();
		    	$html .= $Form->input(
		    		"text", 
		    		"childfirstname", 
		    		"", 
		    		$phrase1[rand(0,2)], 
		    		false, 
		    		array("class" => "textField current", "placeholder" => "Ton prénom"), 
		    		true
		    	);

		    	$html .= $Form->input("button", "nextStep", "Ok", false, true, array("class" => "btnField btnNextStep"), true);

		    	$html .= $Form->input(
		    		"number", 
		    		"age", 
		    		"", 
		    		$phrase2[rand(0,2)], 
		    		false, 
		    		array("class" => "textField hidden", "placeholder" => "Ton âge"), 
		    		true
		    	);

		    	$html .= $Form->input("button", "nextStep", "Ok", false, true, array("class" => "btnField btnNextStep"), true);

		    	$html .= $Form->select(
		    		"gender", 
		    		array('Garçon' => 0, 'Fille' => 1), 
		    		$phrase3[rand(0,2)], 
		    		false, 
		    		array("class" => "select hidden"), 
		    		true
		    	);

		    	$html .= $Form->input("button", "nextStep", "Ok", false, true, array("class" => "btnField btnNextStep"), true);

		    	$html .= $Form->input(
		    		"email", 
		    		"email", 
		    		"",
		    		$phrase4[rand(0,1)], 
		    		false, 
		    		array("class" => "textField hidden", "placeholder" => "L'adresse e-mail de tes parents"), 
		    		true
		    	);

		    	$html .= $Form->input("button", "nextStep", "Ok", false, true, array("class" => "btnField btnNextStep"), true);

		    	$html .= $Form->input(
		    		"password", 
		    		"password", 
		    		"",
		    		$phrase5[rand(0,2)], 
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
		
		public function Login(){
		    // Une action commencera toujours par l'initilisation de son modèle
		    // Cette initialisation doit obligatoirement contenir le repository manager
		    $UserRepository = $this->_repositoryManager->get('User');

		    if(Core\Request::isPost()){
		    	// It's a form validation
		    	// Clean all vars
		    	$data = Core\Request::cleanRequest();

		    	// Process request...
		    	$Auth = new Helper\Auth($this->_repositoryManager, array(
					'table' => 'user',
					'primaryKeyField' => 'id',
					'loginField' => 'email',
					'passwordField' => 'password',
					'adminField' => 'isAdmin',
					'encryptedPassword' => true
				));

			    if($Auth->connect($data['email'], $data['password'])){
			    	header('location: /lettre.html');
			    }
			    else {
			    	header('location: /accueil.html');
			    }
			}
		}

		public function Error404(){
		    $Model = new Model\HomeModel($this->_repositoryManager);
		    
		    $this->_view->ViewCompact($Model);
		}
    }