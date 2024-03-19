<?php

function generationEntete(string $titre, string $sous_titre): string
{
  // Voir pour le traitement si besoins des chaines
  return '<div class="py-5 text-center">
                <img class="d-block mx-auto mb-2" src="images/logo.png" alt="logo photoforyou" width="170" height="115">
                <h1 class="display-5">' . $titre . '</h1>
                <p class="lead">' . $sous_titre . '</p>
          </div>';
}

function accessMenu($sess_type, $db)
{
  switch ($sess_type) {
    case "admin":
      $hab = 4;
      break;
    case "photographe":
      $hab = 2;
      break;
    case "client":
      $hab = 1;
      break;
  }
  $query = "SELECT * FROM menu WHERE Habilitation <= $hab";
  try {
    $stmt = $db->query($query);
    $echo = [];
    while ($menuItem = $stmt->fetch(PDO::FETCH_ASSOC)):
      ?>
      <li class="nav-item"><a class="nav-link" href="<?= $menuItem['Lien'] ?>">
          <?= $menuItem['nomMenu'] ?>
        </a></li>
      <?php
    endwhile;
  } catch (PDOException $e) {
    // Handle the query error if needed
    echo "Error executing query: " . $e->getMessage();
  }
}
?>