<?php
    $con=mysqli_connect("localhost","root","","cosmetique"); 

    if(isset($_POST['submit'])){
        $libelle=$_POST['libelle'];

        $name="";
        if(isset($_FILES['image'])){
            $image=$_FILES['image']['name'];
            $name= uniqid().$image;
            move_uploaded_file($_FILES['image']['tmp_name'],'../images/marque/'.$name);
        
        }
       
        
        if(!empty($libelle)){
            $query="INSERT INTO marque(nom,image)VALUES('$libelle','$name');"; 
            $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
            header("location:../stock/marques.php");
        }else{
            ?>
             <div class="alert alert-danger" role="alert">
              libelle et image sont obligatoire
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
    <title>ajouter marque</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body  style=" margin-top:10% ;">
<?php  include '../include/nav-front.php'?>
<div class="container py-2">
      <form method="POST" enctype="multipart/form-data">
            <label class="form-label">libelle</label>
            <input class="form-control" name='libelle' type="text" autofocus/>
           
            <label class="form-label">image</label>
            <input class="form-control" name='image' type="file" />
            
          <button type="submit"  name="submit" >ajoute marque</button>
      </form>
    </div>
    <script src="../front-end/recherche.js"></script>
</body>
</html>