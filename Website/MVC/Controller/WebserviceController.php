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
    class WebserviceController extends Controller {
		public function __construct($action, $manager) {
		    parent::__construct("webservice", $action, $manager);
		}
		
		public function Connect(){
		    // Une action commencera toujours par l'initilisation de son modèle
		    // Cette initialisation doit obligatoirement contenir le repository manager
		    $Model = new Model\WebserviceModel($this->_repositoryManager);

		    $this->setLayout('json');

		    $UserRepository = $this->_repositoryManager->get('User');
		    $UserWishRepository = $this->_repositoryManager->get('Userwishlist');
		    $ProductRepository = $this->_repositoryManager->get('Userwishlistproducts');

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
			    	$user = $Auth->getUser();

			    	$wish = $UserWishRepository->getBy('idUser', $user->getId());
			    	$wish = $wish[0];

			    	$p = $ProductRepository->getBy('idUserwishlist', $wish->getId());

			    	$Model->result = array(
			    		'user' => array(
			    			'id' => $user->getId(),
			    			'childfirstname' => $user->getChildfirstname(),
			    			'childlasttname' => $user->getChildlastname(),
			    			'email' => $user->getEmail(),
			    			'creationdate' => $user->getCreationdate(),
			    		),
			    		'wishlist' => array(
			    			'id' => $wish->getId(),
			    			'letterUrl' => $wish->getLetterurl(),
			    			'creationdate' => $wish->getCreationdate(),
			    			'products' => array(
			    			)
			    		)
			    	);

			    	foreach ($p as $value) {
			    		$Model->result['wishlist']['products'][] = array(
			    			'id' => $value->getIdProduct(),
			    			'title' => $value->getTitle(),
			    			'description' => $value->getDescription(),
			    			'price' => $value->getPrice(),
			    			'creationdate' => $value->getCreationdate(),
			    			'image' => $value->getImage()
			    		);
			    	}
			    	$Model->result = json_encode($Model->result);
			    }
		    }
		    		    
		    // Une action finira toujours par un $this->_view->ViewCompact contenant : 
		    // cette fonction prend en paramètre le modèle
		    $this->_view->ViewCompact($Model);
		}
    }