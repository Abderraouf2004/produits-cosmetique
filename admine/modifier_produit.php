<?php
    $con=mysqli_connect("localhost","root","","cosmetique"); 


      $query5="SELECT * FROM catergorie";
      $res5=mysqli_query($con,$query5);
    

    $query1="SELECT * FROM marque";
    $res1=mysqli_query($con,$query1);

    $id =$_GET['id'];

    if(isset($_POST['submit'])){
        $libelle=$_POST['libelle'];
        $prix=$_POST['prix'];
        $discount=$_POST['discount']; 
        $categorie=$_POST['categorie']; 
        $marque=$_POST['marque'];
        $description=$_POST['description'];
        $quantite=$_POST['quantite'];
        $type=$_POST['type'];
        $nomtype=$_POST['nomtype'];
        $name="";
        if(isset($_FILES['image'])){
            $image=$_FILES['image']['name'];
            $name=$image;
            move_uploaded_file($_FILES['image']['tmp_name'],'../images/produit/'.$name);
        
        }
        if(!empty($libelle) && !empty($prix) && !empty($description)){
            if(!empty($name)){
             $query3="UPDATE produit SET libelle='$libelle',prix='$prix',discount='$discount',id_categorie='$categorie',id_marque='$marque',description='$description',image='$name',quantite='$quantite',type='$type',nom_type='$nomtype' WHERE id='$id'"; 
            }else{
             $query3="UPDATE produit SET libelle='$libelle',prix='$prix',discount='$discount',id_categorie='$categorie',id_marque='$marque',description='$description',quantite='$quantite',type='$type',nom_type='$nomtype' WHERE id='$id'"; 
            }
            $res3=mysqli_query($con,$query3,MYSQLI_USE_RESULT);
            header("location:../stock/produits.php");
        }else{
            ?>
             <div class="alert alert-danger" role="alert">
              libelle et image sont obligatoire
            </div>
            <?php
        }
    }
    $query2="SELECT * FROM produit WHERE id='$id'";
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
    <title>modifier produit</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
</head>
<body style=" margin-top:10% ;">
    <?php       include '../include/nav-front.php'; ?>
<div class="container py-2">
      <form method="POST" enctype="multipart/form-data">
            <label class="form-label">libelle</label>
            <input class="form-control" name='libelle' type="text" value="<?= $row2[1] ?>" />
            <label class="form-label">prix</label>
            <input class="form-control" step="0.00001" name='prix' type="number" value="<?= $row2[2] ?>"/>
            <label class="form-label">discount</label>
            <input class="form-control" step="0.1" name='discount' type="number" value="<?= $row2[3] ?>"/>
            <label class="form-label">categorie</label>
            <select class="form-select" name="categorie">
                <?php  
                   
                  while ($row=mysqli_fetch_row($res5)) {
                    if($row2[4]==$row[0]){
                        echo ("<option selected value='" . $row[0] . "'>" . $row[1] . "</option>");
                    }else{
                        echo ("<option value='" . $row[0] . "'>" . $row[1] . "</option>");
                    }
                  }
                  ?>

            </select>
            <label class="form-label">marque</label>
            <select class="form-select" name="marque">
                <?php  
                  
                  while ($row1=mysqli_fetch_row($res1)) {
                    if($row2[5]==$row1[0]){
                        echo ("<option selected value='" . $row1[0] . "'>" . $row1[1] . "</option>");
                    }else{
                        echo ("<option value='" . $row1[0] . "'>" . $row1[1] . "</option>");
                    }

                  }
                  ?>

            </select>
            <label class="form-label">description</label>
            <textarea class="form-control" name="description"><?php echo $row2[6] ?></textarea>
            <label>image</label>
            <input class="form-control" name='image' type="file"/><br>
            <img width="250px" class="img img-fluid" src="../images/produit/<?php echo $row2[7] ?>" ><br>
            <label class="form-label">Quantite</label>
            <input class="form-control" name='quantite' type="number" value="<?= $row2[8] ?>"/>
            <label class="form-label">type</label>
            <input class="form-control" min=0 max=3 name='type' type="number" value="<?= $row2[9] ?>" /><br>
            <label class="form-label">nom de type</label>
            <input class="form-control" name='nomtype' type="text" value="<?= $row2[10] ?>"/><br>
          <button type="submit"  name="submit" >modifier produit</button>
      </form>
    </div>
    <script src="../front-end/recherche.js"></script>
</body>
</html>