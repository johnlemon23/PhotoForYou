<?php
    class User
    {
        //Attribut
        private $_Nom;
        private $_Prenom;
        private $_Type;
        private $_Mail;
        private $_Mdp;

        //Constructeur

        public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

        //Hydrate
        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value) {
                $method = 'set'.$key;
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
                else
                {
                    trigger_error('Je ne trouve pas la methode !', E_USER_WARNING);
                }
            }
        }

        //Méthode magique
        public function __toString()
        {
            return "Cette utilisateur est un ".$this->getType().", son nom est ".$this->getNom();
        }

        //Getter

        public function getNom()
        {
            return $this->_Nom;
        }
        
        public function getPrenom()
        {
            return $this->_Prenom;
        }

        public function getType()
        {
            return $this->_Type;
        }

        public function getMail()
        {
            return $this->_Mail;
        }
        
        public function getMdp()
        {
            return $this->_Mdp;
        }

        // Setter

        public function setNom($Nom)
        {
            if (is_string($Nom))
            {
                $this->_Nom = $Nom;
            }
        }
        
        public function setPrenom($Prenom)
        {
            if (is_string($Prenom))
            {
                $this->_Prenom = $Prenom;
            }
        }

        public function setType($Type)
        {
            if (is_string($Type))
            {
                $this->_Type = $Type;
            }
        }
        
        public function setMail($Mail)
        {
            if (is_string($Mail))
            {
                $this->_Mail = $Mail;
            }
        }
        
        public function setMdp($Mdp)
        {
            if (is_string($Mdp))
            {
                $this->_Mdp = $Mdp;
            }
        }

    }
?>