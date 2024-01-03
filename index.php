<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <title>Formulaire PHP</title>
</head>

<body class="bg-primary-subtle">
  <!-- inclusion de l'entête du site -->
  <?php require_once(__DIR__ . '/Blocks/header.php'); ?>
     
  <div class="container">
    <div class="card mb-3 my-5">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="images/Safari.jpg" class="img-fluid rounded-start h-100" alt="Safari">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3 class="card-title">Formulaire de Soumission</h3>
            <form method="POST" action="submit.php"  enctype="multipart/form-data">
              
              <div class="row">
                <div class="col-12 col-md-6 mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-12 offset-md-1 col-md-5 mb-3">
                  <label class="form-label">Genre</label>
                  <div class="row">
                    <div class="col-5 offset-1 form-check">
                      <input class="form-check-input" type="radio" name="genre" value="Homme" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Homme
                      </label>
                    </div>
                    <div class="col form-check">
                      <input class="form-check-input" type="radio" name="genre" value="Femme" id="flexRadioDefault2">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Femme
                      </label>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-6 mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-envelope-paper"></i></span>
                    <input type="text" id="exampleInputEmail1" class="form-control" name="email" placeholder="Email" aria-label="Email">
                  </div>
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                  <label class="form-label">Photo</label>
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="file" name="imageClient">
                  </div>
                </div>
              </div>
              
              <div class="mb-3">
                <div class="form-floating">
                  <textarea class="form-control" name="message"  placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                  <label for="floatingTextarea">Message</label>
                </div>
              </div>
               
              <button type="submit" class="btn btn-primary px-3">Submit</button>
            </form>
             
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>