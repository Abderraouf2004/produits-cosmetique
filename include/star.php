<?php 
     $con=mysqli_connect("localhost","root","","cosmetique");
     
     $id=$_GET['id'];
     $star=$_GET['nbr'];
     $query="UPDATE produit SET star='$star' WHERE id='$id'"; 
     $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
    header("location:../front-end/produit.php?id=".$id);
   

    ?>