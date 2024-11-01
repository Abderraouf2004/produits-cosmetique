<?php  
   $con=mysqli_connect("localhost","root","","cosmetique");
$idcommande=$_GET['id'];
$query1="SELECT ligne_commande.*,produit.libelle,produit.image  FROM ligne_commande INNER JOIN produit ON ligne_commande.id_produit = produit.id WHERE id_commande ='$idcommande'";
$res1=mysqli_query($con,$query1,MYSQLI_USE_RESULT);
$rows=mysqli_fetch_all($res1);

$query="SELECT commande.*,client.nom  FROM commande INNER JOIN client ON commande.id_client = client.id_c WHERE commande.id ='$idcommande'";
$res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
$commande = mysqli_fetch_row($res);

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
    
    <title>commande N:<?php echo $commande[0]; ?></title>
</head>
<body style=" margin-top:10% ;">
   <?php  include '../include/nav-front.php'; 

   ?> 
   <div class="container py-2">
   <table class="table table-striped">
  <thead>
  <tr>
  <th>ID</th>
    <th>CLIENT</th>
    <th>Livraison</th>
    <th>Paiement</th>
    <th>TOTAL</th>
    <th>Date de creation</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php 
if($res){
    echo ("<tr><td>$commande[0]</td><td>$commande[7]</td><td>$commande[3] </td><td>$commande[4]</td><td>$commande[2] DZ</td><td>$commande[6]</td>")?>
    <td>
      <?php 
      if($commande[5]==0){ ?>
        <a href="valide_commande.php?id=<?php echo $commande[0] ?> &etat=1" class="btn btn-success">valider la commande</a>
      <?php
      }else{ ?>
        <a href="valide_commande.php?id=<?php echo $commande[0] ?> &etat=0" class="btn btn-danger">supprimer la commande</a>
      <?php
      }
        ?>
    </td></tr> <?php
}
?>

  </tbody>

</table>
   <table class="table table-striped">
   <h4>PRODUIT:</h4>
  <thead>
  <tr>
    <th>ID</th>
    <th>Produit</th>
    <th>Prix</th>
    <th>Totale</th>
  </tr>
  </thead>
  <tbody>
  <?php 


if($res1){
   foreach ($rows  as $row){
 
    echo ("<tr><td>$row[0]</td><td>$row[6]</td><td>$row[3] DZ</td><td>$row[5] DZ</td>")?>
</tr> <?php
   }

}
?>
  </tbody>
</table>

   </div>
   <script src="../front-end/recherche.js"></script>
</body>
</html>