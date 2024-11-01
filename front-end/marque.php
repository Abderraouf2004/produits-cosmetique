<?php 
     $con=mysqli_connect("localhost","root","","cosmetique");
     $id=$_GET['id'];
     $query1="SELECT * FROM produit WHERE id_marque='$id'";
     $res1=mysqli_query($con,$query1,MYSQLI_USE_RESULT);
     $produits = mysqli_fetch_all($res1); 
     include '../include/nav-front.php';
     $query="SELECT * FROM marque WHERE id='$id'";
     $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
     $marque = mysqli_fetch_row($res);

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
    <link rel="stylesheet" href="../include/categorie.css">


    <title><?php echo $marque['1'] ?></title>
</head>
<body>
   <?php  ?>
          <div class="main">
              <h2><?php echo $marque['1'] ?></h2>
          </div>
        <div class="card-container">
            <?php
            if($res1){
                 foreach ($produits as $produit){
                   ?> 
                   
                     <div class="card">
                          <a href="produit.php?id=<?php echo $produit[0] ?>" class="btn stretched-link">
                           <img src="../images/produit/<?= $produit['7'] ?>" >
                             <h6 class="card-text"><?= $produit['1'] ?></h6>
                             <h6 class="card-text">DA <?= $produit['2'] ?></h6>
                             <?php $i=1;
                             while($i <= $produit['11']){
                              ?>
                              <i class="star">&#9733;</i>
                              <?php
                              $i=$i+1;
                             }?>
                          </a>  
                     </div>
                
<?php         
                }           
           }
           ?>
           
           </div>
           <?php

             if(empty($produits)){ ?>
                  <div class="alert alert-info" role="alert" >
                   pas de produits pour l'instant
                  </div>
              <?php
              }
                  ?>

      <script src="recherche.js"></script>
</body>
</html>