<?php
class Menu
{
    //Attribut
    private $_NomMenu;
    private $_Lien;
    private $_habilitation;

    //Constructeur

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    //Hydrate
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . $key;
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                trigger_error('Je ne trouve pas la methode !', E_USER_WARNING);
            }
        }
    }

    //Méthode magique
    public function __toString()
    {
        return "Ce menu se prénome" . $this->getNomMenu();
    }

    //Getter

    public function getNomMenu()
    {
        return $this->_NomMenu;
    }

    public function getLien()
    {
        return $this->_Lien;
    }

    public function getHabilitation()
    {
        return $this->_habilitation;
    }

    // Setter

    public function setNomMenu($NomMenu)
    {
        if (is_string($NomMenu)) {
            $this->_NomMenu = $NomMenu;
        }
    }

    public function setLien($Lien)
    {
        if (is_string($Lien)) {
            $this->_Lien = $Lien;
        }
    }

    public function setHabilitation($Habilitation)
    {
        if (is_string($Habilitation)) {
            $this->_Habilitation = $Habilitation;
        }
    }
}
?>