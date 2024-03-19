<?php include("include/entete.inc.php")?>
<div class="container">
  <div class="jumbotron">
    <h2>Inscription</h2>
    <legend>Merci de remplir ce formulaire d'inscription.</legend>
    <hr />
  </div>
  <form action="traitement.php" method="post">
    <div class="form-group">
      <label for="prenom">Prénom :</label>
      <input
        type="text"
        class="form-control"
        id="prenom"
        name="prenom"
        required
      />
    </div>

    <div class="form-group">
      <label for="nom">Nom :</label>
      <input
      type="text"
      class="form-control"
      id="nom"
      name="nom"
      required />
    </div>

    <div class="form-group">
      <label for="email">Adresse électronique :</label>
      <input
        type="email"
        class="form-control"
        id="email"
        name="email"
        required
      />
    </div>

    <div class="form-group">
      <label for="motdepasse">Votre mot de passe :</label>
      <input
        type="password"
        class="form-control"
        id="motdepasse"
        name="motdepasse"
        required
      />
    </div>

    <div class="form-group">
      <label for="confirmpassword">Confirmation du mot de passe :</label>
      <input
        type="password"
        class="form-control"
        id="confirmpassword"
        name="confirmpassword"
        required
      />
    </div>

        <!-- Choix entre Client ou Photographe -->
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-info">
        <input type="radio" name="choixType" id="client" value="client" onchange="aff_cach_input('client')" checked>
        Client
      </label>
      <label class="btn btn-info">
        <input type="radio" name="choixType" id="photographe" onchange="aff_cach_input('photographe')" value="photographe">
        Photographe
      </label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="checkbox" />
      <label class="form-check-label" for="checkbox"
        >Oui, je veux recevoir des sources d'inspiration visuelles, des offres
        spéciales et autres communications par e-mail.</label
      >
    </div>

    <button type="submit" class="btn btn-primary" value="Valider" name="valider">Valider</button>
  </form>
</div>
