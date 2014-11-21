<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	namespace fitzlucassen\FLFramework\Data\Entity;

	use fitzlucassen\FLFramework\Library\Core as cores;

	class RouteUrl {
		private $_id;
		private $_name;
		private $_controller;
		private $_action;
		private $_order;
		private $_rewrittingurls;
		private $_queryBuilder;

		public function __construct($id = "", $name = "", $controller = "", $action = "", $order = ""){
			$this->_queryBuilder = new cores\QueryBuilder(true);
			$this->fillObject(array("id" => $id, "name" => $name, "controller" => $controller, "action" => $action, "order" => $order));
		}

		/***********
		 * GETTERS *
		 ***********/
		public function getId() {
			return $this->_id;
		}
		public function getName() {
			return $this->_name;
		}
		public function getController() {
			return $this->_controller;
		}
		public function getAction() {
			return $this->_action;
		}
		public function getOrder() {
			return $this->_order;
		}
		public function getRewrittingurls() {
			$query = $this->_queryBuilder->select()->from("rewrittingurl")
								->where(array(array("link" => "", "left" => "idRouteurl", "operator" => "=", "right" => $this->_id)))->getQuery();
			try {
				$result = $this->_pdo->SelectTable($query);
				$array = array();
				foreach ($result as $object){
				    $o = new RewrittingUrl();
				    $o->fillObject($object);
				    $array[] = $o;
				}
				return $array;
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		/*******
		 * END *
		 *******/

		public function fillObject($properties) {
			if(!empty($properties["id"]))
				$this->_id = $properties["id"];
			if(!empty($properties["name"]))
				$this->_name = $properties["name"];
			if(!empty($properties["controller"]))
				$this->_controller = $properties["controller"];
			if(!empty($properties["action"]))
				$this->_action = $properties["action"];
			if(!empty($properties["order"]))
				$this->_order = $properties["order"];
		}
	}