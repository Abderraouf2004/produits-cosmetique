
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../include/nav-front.css">
    <link rel="stylesheet" href="../include/search.css">
   
    
    <title>liste categories</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body style=" margin-top:10% ;">
   <?php  include '../include/nav-front.php'; 
   $con=mysqli_connect("localhost","root","","cosmetique");
   ?> 
   <div class="container py-2">
    <h4>liste des categories</h4>
    <a href="../admine/ajouter categorie.php" class="btn btn-primary">ajouter</a>
   <table class="table table-striped">
  <thead>
  <tr>
    <th>ID</th>
    <th>Libelle</th>
    <th>Description</th>
    <th>Date de creation</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php $query="SELECT * FROM catergorie";
$res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
if($res){
   while ($row = mysqli_fetch_row($res)){
    echo ("<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>")?>
    <?php echo("<td>$row[4]</td>")?>
    <td>
      <a href="../admine/modifier_categorie.php?id=<?php echo $row[0] ?>" class="btn btn-primary">modifier</a>
      <a href="../admine/supprimer_categorie.php?id=<?php echo $row[0] ?>" onclick="return confirm('voulez vous vraiment supprimer la categorie <?php echo $row[1]?>');" class="btn btn-danger">supprimer</a>  
    </td></tr> <?php
   
   }
}
?>

  </tbody>
</table>

   </div>
   <script src="../front-end/recherche.js"></script>
</body>
</html>