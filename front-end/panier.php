<?php 
    
     $con=mysqli_connect("localhost","root","","cosmetique");
     $query3="SELECT * FROM mode_de_livraison";
     $res3=mysqli_query($con,$query3);
     $query4="SELECT * FROM mode_de_paiement";
     $res4=mysqli_query($con,$query4);
     
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
     <style>
      .main{
    padding-top: 10%;
    width: 100%;
    text-align: center;
    }

.main h2{
    font-size: 2.5vw;
    position: relative;
    text-align: center;
    padding-top: 5px;
    display: inline-block;
}
span{
    color: #FFFF33;
}
.main h2:before{
    position: absolute;
    content: '';
    background: #FFFF33;
    height: 3px;
    width: 30%;
    right: -15px;
    bottom: 0;
    border-radius: 50px;
}
     </style>
    <title>Panier</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body >
   <?php  include '../include/nav-front.php';
   
     $iduser=$_SESSION['client'][0];
    
    
     if(isset($_POST['modifierqnt'])){ 
       $idqnt=$_POST['id'];
        $qnt=$_POST['qnt'];
      
      
       $queryqnt="UPDATE panier SET qnt='$qnt' WHERE id='$idqnt' ";
       $resqnt=mysqli_query($con,$queryqnt,MYSQLI_USE_RESULT);
     
       }

     $query_count = "SELECT COUNT(*) AS total_rows FROM panier WHERE iduser='$iduser'";
     $result_count = mysqli_query($con, $query_count);
     if ($result_count) {
         $row_count = mysqli_fetch_assoc($result_count);
         $total_rows = $row_count['total_rows'];
     }
?>
          <div class="main">
              <h2><i class="fa-solid fa-cart-shopping"></i>(<?php echo $total_rows ?>)</h2>
          </div>
     <div class="container">
        <div class="row">
            <?php
             
              $query="SELECT id,qnt FROM panier WHERE iduser='$iduser'";
              $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
              $total=0;
              $paniers = mysqli_fetch_all($res);
              if(empty($paniers)){ ?>
                  <div class="alert alert-info" role="alert">
                   voutre panier est vide
                  </div>
              <?php
              }else{
                foreach ($paniers as $panier){
                  $idproduit=$panier[0];
                  $quantite[] = $panier[1];
                  $idproduits[] = $idproduit;    
                }
                $query1="SELECT * FROM produit WHERE id IN (" . implode(",", $idproduits) . ")";
                $res1=mysqli_query($con,$query1,MYSQLI_USE_RESULT);
              

                if(isset($_POST['submit'])){      
                  $produits= mysqli_fetch_all($res1);
                  $livraison=$_POST['livraison'];
                  $payment=$_POST['paiement'];
                  $i=0;
                  foreach ($produits as $produit){
                    $totalproduit= $produit[2]*$quantite[$i];
                    $prixproduit[] = $produit[2];
                    $quantiteprod[]=  $produit[8];
                    $total=$totalproduit+$total;
                    $i=$i+1;
                  }

                  $query4="INSERT INTO commande(id_client,total,Livraison,payment)VALUES('$iduser','$total','$livraison','$payment');"; 
                  $res4=mysqli_query($con,$query4,MYSQLI_USE_RESULT);
                  $idcommande=mysqli_insert_id($con); // id tali li d5al f bdd 
                  $c=0;
                foreach ($paniers as $panier){
                  $idproduit=$panier[0];
                  $prix =  $prixproduit[$c];
                  $quantite = $panier[1];
                  $totalproduit =$prix*$quantite;
                  $query4="INSERT INTO ligne_commande(id_produit,id_commande,prix,quantite,total)VALUES('$idproduit','$idcommande','$prix','$quantite','$totalproduit');"; 
                  $res4=mysqli_query($con,$query4,MYSQLI_USE_RESULT); 
                   $quantitenv= $quantiteprod[$c] - $quantite;
                  $query8="UPDATE produit SET quantite = '$quantitenv' WHERE id='$idproduit'"; 
                    $res8=mysqli_query($con,$query8,MYSQLI_USE_RESULT);
                
                  $c=$c+1; 
                }
                $query7="DELETE FROM panier WHERE iduser='$iduser'";
                $res7=mysqli_query($con,$query7);
               
                echo '<script>window.location.href = "home.php";</script>';
                  
                }




                if($res1){
                  $panies = mysqli_fetch_all($res1);
                  ?>
                <table class="table">
                <?php
                  $i=0;
                  foreach ($panies as $panie){
                    $idqntite=$panie[0];
                    $totalproduit= $panie[2]*$quantite[$i];
                    $total=$totalproduit+$total;
                     ?> 
                     <tr>
                       <th scope="row"></th>
                       <td><a href="produit.php?id=<?php echo $panie[0] ?>"><img class="img img-fluid" width="100px" src="../images/produit/<?php echo $panie[7] ?>" ></a></td>
                       <td><a href="produit.php?id=<?php echo $panie[0] ?>" style=" text-decoration: none; color:black"><?php echo $panie[1] ?></a></td>
                       <td><?php echo $panie[2] ?> DZ</td>
                       <td>
                       <form method="POST">
                       <input type="hidden" name="id" value="<?php echo  $idqntite ?>">
                        <input type="number" name="qnt" id="qnt" min="0"  value="<?php echo $quantite[$i] ?>">
                        <button  type="submit" name="modifierqnt"  class="btn btn-dark" >modifier</button>
                       </form>
                      </td>
                      <td><?php  echo $totalproduit ?> DZ</td>
                       <td> <a href="../user/supprimer_panier.php?id=<?php echo $panie[0] ?>" onclick="return confirm('voulez vous vraiment supprimer la categorie <?php echo $panie[1]?>');" class="btn btn-danger">supprimer</a></td>
                     </tr> 
<?php $i=$i+1;
            }?></table><?php
                }
              }
  ?>
          <div class="text-end">
          <h4>Somme totale <strong><?php echo $total;?> DZ</strong></h4>
          </div> 
         
          <!-- <a href="home.php" class="btn active">Retourner à la boutique</a>          -->
               <form method="POST">
               <label class="form-label">livraison</label>
            <select class="form-select" name="livraison">
                <?php  
                  
                  while ($row1=mysqli_fetch_row($res3)) {
                      echo ("<option value='" . $row1[1] . "'>" . $row1[1] ."</option>");
                  }
                  ?>

            </select>
            <label class="form-label">paiement</label>
            <select class="form-select" name="paiement">
                <?php  
                  
                  while ($row2=mysqli_fetch_row($res4)) {
                      echo ("<option value='" . $row2[1] . "'>" . $row2[1] . "</option>");
                  }
                  ?>

            </select>    
               <button  type="submit" name="submit"  class="btn btn-dark" >Commander</button>
               </form>
           </div>
        </div>
      <script src="recherche.js"></script>
</body>
</html>