<?php
    $con=mysqli_connect("localhost","root","","cosmetique");
    $id=$_GET['id'];

    
    if(isset($_POST['modifier'])){
        $libelle=$_POST['libelle'];
        $description=$_POST['description'];
        if(!empty($libelle) && !empty($description)){
            //  var_dump($libelle);
            //  var_dump($description);
            //  var_dump($icone);
            // die();
            $query27="UPDATE catergorie SET libelle='$libelle',description='$description' WHERE id='$id'"; 
            $res27=mysqli_query($con,$query27,MYSQLI_USE_RESULT);
         
            if($res27){
                header("location:../stock/categories.php");
            }
         
           
        }else{
            ?>
             <div class="alert alert-danger" role="alert">
              libelle et description sont obligatoire
            </div>
            <?php
        }
    }
    $query25="SELECT * FROM catergorie WHERE id='$id'";
    $res25=mysqli_query($con,$query25,MYSQLI_USE_RESULT);
    $row25 = mysqli_fetch_row($res25);
   
 
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
    <title>modifier categorie</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
    <?php    include '../include/nav-front.php'; ?>
</head>
<body style=" margin-top:10% ;">
<div class="container py-2">
      <form method="POST">
            <label class="form-label">libelle</label>
            <input class="form-control" name='libelle' type="text" value="<?php echo $row25[1] ?>"/>
            <label class="form-label">description</label>
            <textarea class="form-control" name="description"><?php echo $row25[2] ?></textarea>
          <button type="submit"  name="modifier" >modifier categorie</button>
      </form>
    </div>
    <script src="../front-end/recherche.js"></script>
</body>
</html>


