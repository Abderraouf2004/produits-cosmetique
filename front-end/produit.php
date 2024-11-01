<?php 
     $con=mysqli_connect("localhost","root","","cosmetique");
     
     $id=$_GET['id'];
     $query="SELECT * FROM produit WHERE id='$id'";
     $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
     $produit = mysqli_fetch_row($res);
   

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
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
    <style>
      .star {
            font-size: 1.5rem;
            
        }
        a{
          text-decoration: none;
          color: black;
        }
    </style>
    <title><?php 
    echo $produit['1'] ?></title>
</head>
<body style=" margin-top:10% ;">
   <?php    include '../include/nav-front.php';
   
     if(isset($_POST['Add'])){
      if(!isset($_SESSION['client'])){
       
        echo '<script>window.location.href = "../user/connexion.php";</script>';
       }else{
  
    $id = $_POST['id'];
    $qnt=$_POST['qnt'];
        if($qnt!=0){
            $query="INSERT INTO panier(id,qnt,iduser)VALUES('$id','$qnt','$user');"; 
            $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
            
            echo '<script>window.location.href = "panier.php";</script>';
        }
    
       
    }

     }

     if(isset($_POST['modify'])){
    // $iduser=$_SESSION['client'][0];
    $id = $_POST['id'];
    $qnt=$_POST['qnt'];
         $query="UPDATE panier SET qnt='$qnt' WHERE id='$id'";
         $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
         echo '<script>window.location.href = "panier.php";</script>';
     }
   
   
   ?>
   <div class="container py-2">
    <ul class="list-group list-group-flush">
     <div class="container">
        <div class="row">
          <div class="col-md-6 pr">
          <img class="card-img-top" src="../images/produit/<?= $produit['7'] ?>" >
          </div>
          <div class="col-md-6">
            <h1 class="produit"><?php echo $produit['1'] ?></h1>
            <?php  
            $discount=$produit['3'];
            $prix=$produit['2'];
             if(!empty($discount)){
              $totale=$prix-(($prix*$discount)/100);
             }else{
              $totale=$prix;
             }
            ?>
            <?php 
            if(empty($discount)){
              ?><h2 style="  color: rgba(0, 255, 34, 0.993);"><?php echo $prix ?>DZD </h2> <?php
            }else{
               ?>
               <h2  class="h1" style="  color: red;" ><?php echo $prix ?> DZD</h2> 
               <h2 style="  color: rgba(0, 255, 34, 0.993);"><?php echo $totale ?> DZD</h2> 
               <p>
               <?php echo $discount ?>%
               </p>
               <?php
              }
            ?>
           
            <hr>
            <p><?php echo $produit['6'] ?></p>
            <hr>
            <div class="card-footer">
             <div class="counter">
              <?php  $qnt=0;
               if(isset($_SESSION['client'])){
                $query1="SELECT * FROM panier WHERE id='$id' AND iduser='$user'";
                $res1=mysqli_query($con,$query1,MYSQLI_USE_RESULT);
                $panier = mysqli_fetch_row($res1);
                
                 if($res1){
                  $qnt=$panier[1];
                 }
               }
              
             
               ?>
              <form method="POST">
              <input type="hidden" name="id" value="<?php echo $id ?>">
              <?php 
              if(isset($_SESSION['client'])){
                if($produit['8'] == 0){
                  ?>
                      <div class="alert alert-danger" role="alert">
                      il n'y a pas de quantité pour le moment!
                      </div>
                  <?php
                }else{
                  ?>
              <label >Quantity</label>
              <input type="number" name="qnt" id="qnt" min="0" max="<?php echo $produit['8'] ?>" value="<?php echo $qnt ?>">
            
              <?php
              if($qnt==0){
                ?>
                <input class="btn btn-secondary dropdown-toggle" type="submit" name="Add" value="Add to panier">

                <?php
              }else{
                ?>
                <input class="btn btn-success" type="submit" name="modify" value="modify">
                <?php
              }
                }
                ?>
 

                              <hr>
                <a href="../include/star.php?id=<?php echo $id ?>&nbr=1"><i class="star">&#9733;</i></a>
               <a href="../include/star.php?id=<?php echo $id ?>&nbr=2"><i class="star">&#9733;</i></a>
                <a href="../include/star.php?id=<?php echo $id ?>&nbr=3"><i class="star">&#9733;</i></a>
               <a href="../include/star.php?id=<?php echo $id ?>&nbr=4"><i class="star">&#9733;</i></a>
             <a href="../include/star.php?id=<?php echo $id ?>&nbr=5"><i class="star">&#9733;</i></a>
              <?php }
              ?>

 
              </form>
             </div>
            </div>
          </div>
        </div>
     </div>
    </ul>
   </div>
   <script src="recherche.js"></script>
</body>
</html>