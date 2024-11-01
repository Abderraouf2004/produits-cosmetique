<?php
    $con=mysqli_connect("localhost","root","","cosmetique"); 

 
  
    
   

    if(isset($_POST['submit'])){
        $libelle=$_POST['libelle'];
        $prix=$_POST['prix']; 
        $discount=$_POST['discount']; 
        $categorie=$_POST['categorie']; 
        $marque=$_POST['marque'];
        $description=$_POST['description'];
        $name="";
        if(isset($_FILES['image'])){
            $image=$_FILES['image']['name'];
            $name=$image;
            move_uploaded_file($_FILES['image']['tmp_name'],'../images/produit/'.$name);
        
        }
        $quantite=$_POST['quantite'];
        $type=$_POST['type'];
        $nomtype=$_POST['nomtype'];
      
    
        
        if(!empty($libelle) && !empty($prix) && !empty($description) &&!empty($name) && !empty($quantite)){
        
            $query2="INSERT INTO produit(libelle,prix,discount,id_categorie,id_marque,description,image,quantite,type,nom_type)VALUES('$libelle','$prix','$discount','$categorie','$marque','$description','$name','$quantite','$type','$nomtype');";
           
            $res2=mysqli_query($con,$query2,MYSQLI_USE_RESULT);
         
            if($res2){
                header("location:../stock/produits.php");
            }
           
        }else{
            ?>
             <div class="alert alert-danger" role="alert">
              libelle et image sont obligatoire
            </div>
            <?php
        }

    }
    $query24="SELECT * FROM catergorie";
    $res24=mysqli_query($con,$query24);
    $query1="SELECT * FROM marque";
    $res1=mysqli_query($con,$query1);
   
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
    <title>ajouter produit</title>
    <link rel="shortcut icon" href="../images/logo/Black Gold Luxury Modern Diamond Brand Store Logo (2).png" />
    <link rel="apple-touch-icon" href="../images/logo/Logo.png" />
    <?php  include '../include/nav-front.php'; ?>
</head>
<body  style=" margin-top:10% ;">
<div class="container py-2">
      <form method="POST" enctype="multipart/form-data">
            <label class="form-label">libelle</label>
            <input class="form-control" name='libelle' type="text" autofocus/>
            <label class="form-label">prix</label>
            <input class="form-control" step="0.0001" name='prix' type="number" autofocus/>
            <label class="form-label">discount</label>
            <input class="form-control" name='discount' type="number" autofocus/>
            <label class="form-label">categorie</label>
            <select class="form-select" name="categorie">
                <?php  
                  
                  while ($row=mysqli_fetch_row($res24)) {
                      echo ("<option value='" . $row[0] . "'>" . $row[1] . "</option>");
                  }
                  ?>

            </select>
            <label class="form-label">marque</label>
            <select class="form-select" name="marque">
                <?php  
                  
                  while ($row1=mysqli_fetch_row($res1)) {
                      echo ("<option value='" . $row1[0] . "'>" . $row1[1] . "</option>");
                  }
                  ?>

            </select>
            <label class="form-label">description</label>
            <textarea class="form-control" name="description"></textarea>
            <label class="form-label">image</label>
            <input class="form-control" name='image' type="file" />
            <label class="form-label">quantite</label>
            <input class="form-control" min=0 name='quantite' type="number"/>
            <label class="form-label" >type</label>
            <input class="form-control" min=0 max=3 name='type' type="number"/>
            <label class="form-label">nom de type</label>
            <input class="form-control" name='nomtype' type="text"/>
           <br>
          <button type="submit"  name="submit" >ajoute produit</button>
      </form>
    </div>
    <script src="../front-end/recherche.js"></script>
</body>
</html>