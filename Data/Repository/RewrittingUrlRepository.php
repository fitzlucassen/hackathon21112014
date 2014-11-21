<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	namespace fitzlucassen\FLFramework\Data\Repository;

	use fitzlucassen\FLFramework\Library\Core as cores;
	use fitzlucassen\FLFramework\Data\Entity as entities;

	class RewrittingUrlRepository {
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
		/**
		 * 
		 * @param type $idRoute
		 * @return \RewrittingUrl
		 */
		public function getByIdRouteUrl($idRoute) {
			$request = $this->_queryBuilder->select()->from(array("rewrittingurl"))
								->where(array(array("link" => "", "left" => "lang", "operator" => "=", "right" => $this->_lang),
									      array("link" => "AND", "left" => "idRouteUrl", "operator" => "=", "right" => $idRoute)))->getQuery();
			
			try {
			    $resultat = $this->_pdoHelper->Select($request);

			    $RewrittingUrl = new entities\RewrittingUrl($resultat["id"], $resultat["idRouteUrl"], $resultat["urlMatched"], $resultat["lang"]);

			    return $RewrittingUrl;
			} catch (\PDOException $e) {
			    print $e->getMessage();
			}
			return array();
		}

		/**
		 * 
		 * @param type $idRoute
		 * @param type $lang
		 * @param type $Connexion
		 * @return \RewrittingUrl
		 */
		public static function getByIdRouteStatic($idRoute, $lang, $Connexion) {
			$qb = new cores\QueryBuilder(true);
			$request = $qb->select()->from(array("rewrittingurl"))
						->where(array(array("link" => "", "left" => "lang", "operator" => "=", "right" => $lang),
								array("link" => "AND", "left" => "idRouteUrl", "operator" => "=", "right" => $idRoute)))->getQuery();
			try {
			    $resultat = $Connexion->Select($request);

			    $RewrittingUrl = new entities\RewrittingUrl($resultat["id"], $resultat["idRouteUrl"], $resultat["urlMatched"], $resultat["lang"]);

			    return $RewrittingUrl;
			} catch (\PDOException $e) {
			    print $e->getMessage();
			}
			return array();
		}

		public function getByUrlMatched($url) {
			return cores\Router::GetRoute($url);
		}
		
		/**************************
		 * REPOSITORIES FUNCTIONS *
		 **************************/
		public static function getAll($Connection){
			$qb = new cores\QueryBuilder(true);
			$query = $qb->select()->from(array("rewrittingurl"))->getQuery();
			try {
				$result = $Connection->SelectTable($query);
				$array = array();
				foreach ($result as $object){
					$o = new entities\RewrittingUrl();
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
			$query = $this->_queryBuilder->select()->from(array("rewrittingurl"))
								->where(array(array("link" => "", "left" => "id", "operator" => "=", "right" => $id)))->getQuery();
			try {
				$properties = $this->_pdoHelper->Select($query);
				$object = new entities\RewrittingUrl();
				$object->fillObject($properties);
				return $object;
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function delete($id) {
			$query = $this->_queryBuilder->delete("rewrittingurl")
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
			$query = $this->_queryBuilder->insert("rewrittingurl", array('idRouteUrl' => $properties["idRouteUrl"], 'urlMatched' => $properties["urlMatched"], 'lang' => $properties["lang"], ))->getQuery();
			try {
				return $this->_pdo->Query($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function update($id, $properties) {
			$query = $this->_queryBuilder->update("rewrittingurl", array('idRouteUrl' => $properties["idRouteUrl"], 'urlMatched' => $properties["urlMatched"], 'lang' => $properties["lang"], ))->where(array(array("link" => "", "left" => "id", "operator" => "=", "right" => $id )))->getQuery();
			try {
				return $this->_pdo->Query($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function getBy($key, $value){
			$query = $this->_queryBuilder->select()->from(array("rewrittingurl"))->where(array(
				array(
					"link" => "", "left" => $key, "operator" => "=", "right" => $value
				)))->getQuery();
			
			try {
				$result = $this->_pdo->SelectTable($query);
				$array = array();
				foreach ($result as $object){
				    $o = new entities\RewrittingUrl();
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

	}