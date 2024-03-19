<?php
require "include/entete.inc.php";
include("include/connection.inc.php");
if (isset($_POST['valider']))
{

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $type = $_POST['choixType'];
    $mail = $_POST['email'];
    $motDePasse = md5($_POST['motdepasse']);
    $confirmpassword = md5($_POST['confirmpassword']);
    
    $valid = TRUE;
    
    if (strlen($nom)>35 || strlen($prenom)>35)
    {
        $valid = FALSE;
    }
    
    if ($type != 'client' && $type != 'photographe' && $type != 'admin')
    {
        $valid = FALSE;
    }
    
    if ($confirmpassword!=$motDePasse){
        $valid = FALSE;
    }
    
    if ($valid){
        $nouveauUser = new User(['Nom'=>$nom, 'Prenom'=>$prenom, 'Type'=>$type, 'Mail'=>$mail, 'Mdp'=>$motDePasse]);
		$manager->add($nouveauUser);

        try
        {
            header('Location: inscriptionOK.php');
        }
        catch(PDOException $e)
        {
            echo "<br/><h1> Erreur : </h1>" . $e->getMessage();
        }
    }
    if ($valid==FALSE)
    {
        echo "Les informations rentrées ne sont pas conforme";
    }
}
?>