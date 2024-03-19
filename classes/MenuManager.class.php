<?php
class UserManager
    {
        private $_db;
        
        public function __construct($db)
        {
            $this->setDB($db);
        }
                
        //CRUD

        public function add(User $User)
        {
            $q = $this->_db->prepare('INSERT INTO USERS (Nom, Prenom, Type, Mail, Mdp) VALUES(:Nom, :Prenom, :Type, :Mail, :Mdp);');
            $q->bindValue(':Nom', $User->getNom());
            $q->bindValue(':Prenom', $User->getPrenom());
            $q->bindValue(':Type', $User->getType());
            $q->bindValue(':Mail', $User->getMail());
            $q->bindValue(':Mdp', $User->getMdp());

            $q->execute();
        }

        public function getUser($mail)
        {
            $q = $this->_db->query('SELECT Nom, Prenom, Type, Mail, Mdp FROM USERS WHERE Mail="'.$mail.'"');
            $userInfo = $q->fetch(PDO::FETCH_ASSOC);
            if ($userInfo)
            {
                return new User($userInfo);
            }
            else
            {
                return $userInfo;
            }
        }

        public function exists($mail,$mdp)
        {
            $q= $this->_db->prepare('SELECT COUNT(*) FROM users WHERE Mail = :Mail AND Mdp = :Mdp');
            $q->execute([':Mail'=> $mail, ':Mdp'=> md5($mdp)]);
            return (bool) $q->fetchColumn();
        }

        public function setDB(PDO $db)
        {
            $this->_db = $db;
        }
    }
?>