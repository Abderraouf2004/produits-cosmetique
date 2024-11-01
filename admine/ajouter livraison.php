<?php
    $con=mysqli_connect("localhost","root","","cosmetique");
    if(isset($_POST['submit'])){
        $nom=$_POST['libelle'];
       

        if(!empty($nom)){
            $query="INSERT INTO mode_de_livraison(nom)VALUES('$nom');"; 
            $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
            header("location:../stock/mode_livraison.php");
            ?>
             <div class="alert alert-success" role="alert">
           le mode <?php echo $nom ?> est bien ajoutée
        </div>
            <?php
        }else{
            ?>
             <div class="alert alert-danger" role="alert">
              nom et prix sont obligatoire
            </div>
            <?php
        }

        
    }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../include/nav-front.css">
    <link rel="stylesheet" href="../include/search.css">
    <title>ajoute Mode de livraison</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body  style=" margin-top:10% ;">
<?php  include '../include/nav-front.php'?>
<div class="container py-2">
      <form method="POST">
            <label class="form-label">NOM</label>
            <input  class="form-control" name='libelle' type="text" />
          <button type="submit"  name="submit" >ajoute Mode de livraison</button>
      </form>
    </div>
    <script src="../front-end/recherche.js"></script>
</body>
</html>