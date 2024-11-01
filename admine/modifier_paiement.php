<?php
    $con=mysqli_connect("localhost","root","","cosmetique"); 

    $id =$_GET['id'];

    if(isset($_POST['submit'])){
        $libelle=$_POST['libelle'];
        $name="";
        // var_dump($libelle);
        // var_dump($name);
        // die();
        if(isset($_FILES['image'])){
            $image=$_FILES['image']['name'];
            $name= $image;
            move_uploaded_file($_FILES['image']['tmp_name'],'../images/paiement/'.$name);
        
        } 
       
        if(!empty($libelle)){
            if(!empty($name)){
                // var_dump($libelle);
                // var_dump($name);
                // die();
             $query3="UPDATE mode_de_paiement SET nom='$libelle',image='$name' WHERE id='$id'"; 
            }else{
             $query3="UPDATE mode_de_paiement SET nom='$libelle' WHERE id='$id'"; 
            }
            $res3=mysqli_query($con,$query3,MYSQLI_USE_RESULT);
            header("location:../stock/mode_paiement.php");
        }else{
            ?>
             <div class="alert alert-danger" role="alert">
              libelle et image sont obligatoire
            </div>
            <?php
        }
    }
    $query2="SELECT * FROM mode_de_paiement WHERE id='$id'";
    $res2=mysqli_query($con,$query2,MYSQLI_USE_RESULT);
    $row2 = mysqli_fetch_row($res2);
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
    <title>modifier paiement</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body style=" margin-top:10% ;">
<?php  include '../include/nav-front.php'?>
<div class="container py-2">
      <form method="POST" enctype="multipart/form-data">
            <label class="form-label">Nom</label>
            <input class="form-control" name='libelle' type="text" value="<?= $row2[1] ?>" />
            <label>image</label>
            <input class="form-control" name='image' type="file"/>
            <img width="200px" class="img img-fluid" src="../images/paiement/<?php echo $row2[2] ?>" ><br>
          <button type="submit"  name="submit" >modifier paiement</button>
      </form>
    </div>
    <script src="../front-end/recherche.js"></script>
</body>
</html>