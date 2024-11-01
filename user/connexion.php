


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CONNEXION</title>
        <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../include/nav-front.css">
        <link rel="stylesheet" href="user.css">
        <link rel="stylesheet" href="../include/search.css">
    </head>
    <?php

$con=mysqli_connect("localhost","root","","cosmetique");
include '../include/nav-front.php' ;
if(isset($_POST['submit'])){
    $mail=$_POST['mail'];
    $password=$_POST['password'];  
    $query="SELECT * FROM client WHERE mail_c='$mail' && password='$password'";
    $res=mysqli_query($con,$query);

    $query1="SELECT * FROM admin WHERE password_user='$password' && mail='$mail'";  
    $res1=mysqli_query($con,$query1);
    if(mysqli_num_rows($res)>0){
      $_SESSION['client'] = mysqli_fetch_row($res);
      
       echo '<script>window.location.href = "../front-end/home.php";</script>';
    }elseif(mysqli_num_rows($res1)>0){
        $_SESSION['admin'] = mysqli_fetch_row($res1);
        // header('location:../admine/admin.php');
        echo '<script>window.location.href = "../admine/admin.php";</script>'; 
            
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
         echec d'authentification
        </div>
    
        <?php
    }
}
?>
    <body style=" margin-top:10% ;">
            <div class="Connecter">
              <h5>Accueil / Se Connecter a Votre Compte</h5>
            </div>
    <div class="container py-2">
        <form method="POST">

        <h4>Se Connecter A Votre Compte</h4>
        <div>
            <label>Adresse email</label>
            <input name='mail' type="text"required placeholder="E-MAIL"/>
            <label>Mot de passe</label>
            <input name="password" type="password" minlength="5" required placeholder="Mot de passe"/>        
            <a href="mot_de_passe_oublie.php">Mot de passe oublié?</a>
            <hr>
          <button type="submit"  name="submit">Se Connecter</button>
          <hr>
          <a href="index.php">Pas de compte ? Créez en un</a>
        </div>
        </form>

    </div>
    <script src="../front-end/recherche.js"></script>  
</body>