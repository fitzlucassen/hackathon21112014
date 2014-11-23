<?php

    namespace fitzlucassen\FLFramework\Website\MVC\Model;
    
     /*
      Class : HomeModel
      Déscription : Model de donnée pour les pages du controller home
     */
    class LetterModel extends Model{
        public $request = "";
        public $user = "";
        public $products = "";

        public function __construct($manager) {
            parent::__construct($manager);
        }
    }
