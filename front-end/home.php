<?php 
     $con=mysqli_connect("localhost","root","","cosmetique");
     $query1="SELECT * FROM produit";
     $res1=mysqli_query($con,$query1,MYSQLI_USE_RESULT);
     $produits = mysqli_fetch_all($res1); 
  
     $query="SELECT * FROM marque";
     $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
     $marques = mysqli_fetch_all($res);

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
    <link rel="stylesheet" href="marque.css">
    <link rel="stylesheet" href="../include/home.css">
    <link rel="stylesheet" href="swiper-bundle.min.css" />
<link rel="stylesheet" href="test.css" />
    <title>HOME</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body >
     <?php    include '../include/nav-front.php'; ?>
     <div class="container swiper">
         <div class="slide-container">
              <div class="card-wrapper swiper-wrapper">
                        <?php foreach ($marques as $marque){?>
                         <div class="card swiper-slide">
                             <div class="image-box">
                               <a href="marque.php?id=<?php echo $marque[0] ?>">
                               <img src="../images/marque/<?= $marque['2'] ?>" alt="">
                               </a>
                             </div>
                         </div>
                       <?php
                      } ?>
              </div>
                       <div class="swiper-button-next swiper-navBtn"></div>
                       <div class="swiper-button-prev swiper-navBtn"></div>
                       <div class="swiper-pagination"></div>
         </div>
  </div>






        <div class="main">
          <h2>Produits</h2>
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
      <script src="swiper-bundle.min.js"></script>
    <script src="test.js"></script>

</body>
</html>