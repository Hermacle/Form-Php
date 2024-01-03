<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
</head>

<body>
  <!-- inclusion de l'entête du site -->
  <?php require_once(__DIR__ . '/Blocks/header.php'); ?>

  <h1>Message Bien Reçu !</h1>
  <?php
  $postData = $_POST;

  if (
    !isset($postData['email'])
    || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL) //Email Valide
    || empty($postData['message'])
    || trim($postData['message']) === ''
  ) {
    echo ('Il faut un email et un message valides pour soumettre le formulaire.');
    return;
  }


  $isFileLoaded = false;
  // Tester si le fichier a bien été envoyé et s'il n'y a pas d'erreur
  if (isset($_FILES['imageClient']) && $_FILES['imageClient']['error'] === 0) {
    if ($_FILES['imageClient']['size'] > 4000000) {
      echo "L'envoi n'a pas pu être effectué, Erreur ou Image trop volumineuse";
      return;
    }

    //Tester si l'extension n'est pas autorisée
    $fileInfo = pathinfo($_FILES["imageClient"]["name"]);
    $extension = $fileInfo["extension"];
    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
    if (!in_array($extension, $allowedExtensions)) {
      echo "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée";
      return;
    }
    if (!in_array($extension, $allowedExtensions)) {
      echo "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée";
      return;
    }

    //Tester si le dossier uploads est manquant 
    $path = __DIR__ . '/uploads/';
    if (!is_dir($path)) {
      echo "L'envoi n'a pas pu être effectué, le dossier uploads est manquant";
      return;
    }
     

    //Valider le fichier et le stocker définitivement
    move_uploaded_file($_FILES['imageClient']['tmp_name'], $path . basename($_FILES['imageClient']['name']));
    $isFileLoaded = true;
  }

  ?>

  <div class="card">

    <div class="card-body">
      <h5 class="card-title">Rappel de vos informations</h5>
      <p class="card-text"><b>Nom</b> :
        <?php echo strip_tags($_POST['name']); ?>
        <!-- Retirer les balises HTML que le visiteur peut tenter d'envoyer avec : strip_tags -->
      </p>
      <p class="card-text"><b>Genre</b> :
        <?php echo $_POST['genre']; ?>
      </p>
      <p class="card-text"><b>Email</b> :
        <?php echo $_POST['email']; ?>
      </p>
      <p class="card-text"><b>Message</b> :
        <?php echo strip_tags($_POST['message']); ?>
        <!-- Pour éviter la faille XSS, il suffit d'appliquer la fonction htmlspecialchars  ou  strip_tags sur tous les textes envoyés par vos visiteur -->
      </p>
      
      <?php if ($isFileLoaded): ?>
        <div class="alert alert-sucess" role="alert">
          L'envoi a bien été effectué !
        </div>
      <?php endif ?>


      <!-- Afficher l'image Uploaded -->
      <?php $nameImage = basename($_FILES['imageClient']['name']);?>
      <div>
        <img src="uploads/<?php echo $nameImage; ?>" alt="image">
      </div>

    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>