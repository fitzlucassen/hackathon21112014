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

			$Session = new Helper\Session();
		    $uRepository = $this->_repositoryManager->get('user');

		    $idu = $Session->Read('Auth');

		    if(isset($idu) && !empty($idu)){
			    $u = $uRepository->getBy('id', $idu);

			    if(Core\Request::isPost() || Core\Request::isGet()){
				   	// It's a form validation
				   	// Clean all vars
				   	$data = Core\Request::cleanRequest();

				   	$uWishRepository = $this->_repositoryManager->get('user_wishlist');
				   	$uProductsRepository = $this->_repositoryManager->get('user_wishlist_products');


				   	$uWishRepository->add(array(
				   		'idUser' => $idu,
				   		'letterurl'=> Core\Router::GetUrl('letter', 'publicLetter', $idu),
				   		'creationdate' => date('y-m-d')
				   	));

				   	$uWish = $uWishRepository->getBy('idUser', $idu);

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
								"ItemsPerPage" => 9,
								"PageNumber" => 0
							),
							"Filters" => array(
								'Navigation' => 'toys'
							),
						)
					));
			    }
			}
			else
				header('location: /index.html');

		    // Une action finira toujours par un $this->_view->ViewCompact contenant : 
		    // cette fonction prend en paramètre le modèle
		    $this->_view->ViewCompact($Model);
		}

		public function publicLetter($params){
			// Une action commencera toujours par l'initilisation de son modèle
		    // Cette initialisation doit obligatoirement contenir le repository manager
		    $Model = new Model\LetterModel($this->_repositoryManager);

		   	$Session = new Helper\Session();
		    $uRepository = $this->_repositoryManager->get('user');
		    $idu = $Session->Read('Auth');
		   	$Model->user = $uRepository->getBy('id', $idu);

			$uProductsRepository = $this->_repositoryManager->get('Userwishlistproducts');	
			$Model->products = $uProductsRepository->getBy('idUserwishlist', $idu);
		    
		    // Une action finira toujours par un $this->_view->ViewCompact contenant : 
		    // cette fonction prend en paramètre le modèle
		    $this->_view->ViewCompact($Model);
		}
    }