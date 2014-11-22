<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	namespace fitzlucassen\FLFramework\Data\Repository;

	use fitzlucassen\FLFramework\Library\Core as cores;
	use fitzlucassen\FLFramework\Data\Entity as entities;

	class UserwishlistproductsRepository {
		private $_pdo;
		private $_lang;
		private $_pdoHelper;
		private $_queryBuilder;

		public function __construct($pdo, $lang){
			$this->_pdoHelper = $pdo;
			$this->_pdo = $pdo->GetConnection();
			$this->_queryBuilder = new cores\QueryBuilder(true);
			$this->_lang = $lang;
		}

		/**************************
		 * REPOSITORIES FUNCTIONS *
		 **************************/
		public static function getAll($Connection){
			$qb = new cores\QueryBuilder(true);
			$query = $qb->select()->from(array("user_wishlist_products"))->getQuery();
			try {
				$result = $Connection->SelectTable($query);
				$array = array();
				foreach ($result as $object){
					$o = new entities\Userwishlistproducts();
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

		public function getById($id){
			$query = $this->_queryBuilder->select()->from(array("user_wishlist_products"))
										->where(array(array("link" => "", "left" => "id", "operator" => "=", "right" => $id)))->getQuery();
			try {
				$properties = $this->_pdoHelper->Select($query);
				$object = new entities\Userwishlistproducts();
				$object->fillObject($properties);
				return $object;
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function getBy($key, $value){
			$query = $this->_queryBuilder->select()->from(array("user_wishlist_products"))
										->where(array(array("link" => "", "left" => $key, "operator" => "=", "right" => $value)))->getQuery();
			try {
				$properties = $this->_pdoHelper->SelectTable($query);
				$array = array();
				foreach ($properties as $object){
					$o = new entities\Userwishlistproducts();
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

		public function delete($id) {
			$query = $this->_queryBuilder->delete("user_wishlist_products")
										->where(array(array("link" => "", "left" => "id", "operator" => "=", "right" => $id )))
										->getQuery();
			try {
				return $this->_pdo->Query($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function add($properties) {
			$query = $this->_queryBuilder->insert("user_wishlist_products", array('idUserwishlist' => $properties["idUserwishlist"], 'idProduct' => $properties["idProduct"], 'title' => $properties["title"], 'description' => $properties["description"], 'price' => $properties["price"], 'image' => $properties["image"], 'creationdate' => $properties["creationdate"], ))->getQuery();
			try {
				return $this->_pdo->Query($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function update($id, $properties) {
			$query = $this->_queryBuilder->update("user_wishlist_products", array('idUserwishlist' => $properties["idUserwishlist"], 'idProduct' => $properties["idProduct"], 'title' => $properties["title"], 'description' => $properties["description"], 'price' => $properties["price"], 'image' => $properties["image"], 'creationdate' => $properties["creationdate"], ))->where(array(array("link" => "", "left" => "id", "operator" => "=", "right" => $id )))->getQuery();
			try {
				return $this->_pdo->Query($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}
		/*******
		 * END *
		 *******/

	}