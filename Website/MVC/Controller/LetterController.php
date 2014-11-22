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

		    if (isset($_POST['postData'])) {
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
			    } 
		    } else {
		    	$Model->request = $Cdiscount->request('Search', array(
			    	"SearchRequest" => array(
			    		"Keyword" => "tablette",
					    "SortBy" => "relevance",
					    "Pagination" => array(
							"ItemsPerPage" => 10,
							"PageNumber" => 0
						),
						"Filters" => array(
							"Brands" => "asus"
						)
					)
				));
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