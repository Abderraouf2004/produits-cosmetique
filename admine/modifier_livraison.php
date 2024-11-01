<?php
    $con=mysqli_connect("localhost","root","","cosmetique"); 
 
    $id =$_GET['id'];
  

    if(isset($_POST['submit'])){
        $libelle=$_POST['libelle'];
       
        if(!empty($libelle)){
             $query="UPDATE mode_de_livraison SET nom='$libelle' WHERE id='$id'"; 
            $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
            header("location:../stock/mode_livraison.php");
        }else{
            ?>
             <div class="alert alert-danger" role="alert">
              libelle et image sont obligatoire
            </div>
            <?php
        }
    }
    $query23="SELECT * FROM mode_de_livraison WHERE id='$id'";
    $res23=mysqli_query($con,$query23,MYSQLI_USE_RESULT);
    $row23 = mysqli_fetch_row($res23);
   
    
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
    <title>modifier mode livraison</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body style=" margin-top:10% ;">
<?php  include '../include/nav-front.php';
 ?>
<div class="container py-2">
      <form method="POST" enctype="multipart/form-data">
            <label class="form-label">Nom</label>
            <input class="form-control" name='libelle' type="text" value="<?php echo $row23[1] ?>" />
          <button type="submit"  name="submit" >modifier mode livraison</button>
      </form>
    </div>
    <script src="../front-end/recherche.js"></script>
</body>
</html>