



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mot De Passe Oublie</title>
        <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../include/nav-front.css">
        <link rel="stylesheet" href="user.css">
        <link rel="stylesheet" href="../include/search.css">
    </head>
    <?php
include '../include/nav-front.php' ;
?>
    <body style=" margin-top:10% ;" >
    <div class="Connecter">
              <h5>Accueil / Réinitialiser Mot De Passe</h5>
    </div>
    <div class="container py-2">
      <form method="POST">

            <h4>Mot De Passe Oublié?</h4>
            <?php
        if(!isset($_POST['submit'])){
        ?>
            <label>Adresse email</label>
            <input name='mail' type="text"required placeholder="E-MAIL"/>
          <button type="submit"  name="submit">Envoyer Lien De Reinitialisation</button>
        <?php
        }else{
            ?>
        <div class="affiche-msg">
        <p> Si cette adresse e-mail est enregistrée dans notre boutique, vous recevrez un lien pour réinitialiser votre mot de passe sur kaabdo2004@gmail.com.</p> 
        </div>
        <?php
        }
        ?>
        <hr>
        <a href="connexion.php">Retour à la connexion</a>
      </form>
    </div>
    <script src="../front-end/recherche.js"></script>  
    </body>