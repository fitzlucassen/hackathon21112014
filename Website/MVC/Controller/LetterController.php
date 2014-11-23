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
    class LetterController extends Controller {
		public function __construct($action, $manager) {
		    parent::__construct("letter", $action, $manager);
		}
		
		public function Index(){
		    // Une action commencera toujours par l'initilisation de son modèle
		    // Cette initialisation doit obligatoirement contenir le repository manager
		    $Model = new Model\LetterModel($this->_repositoryManager);
		    $Cdiscount = new Helper\Cdiscount($this->_repositoryManager);

		    if(Core\Request::isPost() || Core\Request::isGet()){
			   	// It's a form validation
			   	// Clean all vars
			   	$data = Core\Request::cleanRequest();

			   	$uWishRepository = $this->_repositoryManager->get('user_wishlist');
			   	$uProductsRepository = $this->_repositoryManager->get('user_wishlist_products');

			   	$Session = new Helper\Session();

			   	$uWishRepository->add(array(
			   		'idUser' => $Session->Read('Auth'),
			   		'letterurl'=> Core\Router::GetUrl('letter', 'publicLetter', $Session->Read('Auth')),
			   		'creationdate' => date('y-m-d')
			   	));

			   	$uWish = $uWishRepository->getBy('idUser', $Session->Read('Auth'));

			   	$uProductsRepository->add(array(
			   		'idUserWishlist' => $uWish->getId(),
			   		'creationdate' => date('y-m-d')
			   	));
		    } else {
		    	$Model->request = $Cdiscount->request('Search', array(
			    	"SearchRequest" => array(
			    		"Keyword" => "e",
					    "SortBy" => "relevance",
					    "Pagination" => array(
							"ItemsPerPage" => 10,
							"PageNumber" => 0
						),
						"Filters" => array(
							'Navigation' => 'toys'
						),
					)
				));
		    }

		    // Une action finira toujours par un $this->_view->ViewCompact contenant : 
		    // cette fonction prend en paramètre le modèle
		    $this->_view->ViewCompact($Model);
		}

		public function publicLetter($params){
			// Une action commencera toujours par l'initilisation de son modèle
		    // Cette initialisation doit obligatoirement contenir le repository manager
		    $Model = new Model\LetterModel($this->_repositoryManager);

		    
		    
		    // Une action finira toujours par un $this->_view->ViewCompact contenant : 
		    // cette fonction prend en paramètre le modèle
		    $this->_view->ViewCompact($Model);
		}
    }