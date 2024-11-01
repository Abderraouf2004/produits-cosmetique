
<?php

        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="front-end/index.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../include/nav-front.css">
        <link rel="stylesheet" href="user.css">
        <link rel="stylesheet" href="../include/search.css">
    <title>sign up</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body style=" margin-top:10% ;">
   <?php  $con=mysqli_connect("localhost","root","","cosmetique");
   include '../include/nav-front.php' ;
              
   
              if(isset($_POST['submit'])){
                  $nom=$_POST['nom'];
                  $prenom=$_POST['prenom'];
                  $num_tel=$_POST['num_tel'];
                  $adresse=$_POST['adresse'];
                  $mail=$_POST['mail'];
                  $password=$_POST['password']; 
                  $query2 =  $query1="SELECT * FROM client WHERE mail_c='$mail'";
                  $res2=mysqli_query($con,$query2);
                  if(mysqli_num_rows($res2)>0){
                      ?>
                      <div class="alert alert-danger" role="alert">
                       il y a un autre compte qui utilise l' email que vous avez entre,essayez un autre e-mail
                      </div>
                  
                      <?php
                  }else{
                      $query="INSERT INTO client(nom,prenom,num_tel_c,adresse_c,mail_c,password)VALUES('$nom','$prenom','$num_tel','$adresse','$mail','$password');"; 
                      $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
                      $query1="SELECT * FROM client WHERE mail_c='$mail' && password='$password'";
                      $res1=mysqli_query($con,$query1);
                      if(mysqli_num_rows($res1)>0){
                          $_SESSION['client'] = mysqli_fetch_row($res1);
                        }
                  }
          
           
                  
              }
   ?> 
   <div class="container py-2">
        <form    method="post">
            <h4>Create your account</h4>
            <label>NOM</label>
            <input name='nom' type="text" required placeholder="NOM"/>
            <label>PRENOM</label>
            <input name="prenom" type="text"  required placeholder="PRENOM"/>
            <label>Num_tel</label>
            <input name="num_tel" type="text"  required placeholder="num_tel"/>
            <label>Adresse</label>
            <input name="adresse" type="text" placeholder="Adresse"/>
            <label>GMAIL</label>
            <input name="mail" type="email" placeholder="GMAIL"/>
            <label> password</label>
            <input name="password" type="password" minlength="5" required placeholder="password"/>
            <button type="submit"  name="submit" >sauvegarder</button>

         
        </form>
   </div>

</body>
</html>