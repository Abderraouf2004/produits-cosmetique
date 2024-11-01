<?php
    $con=mysqli_connect("localhost","root","","cosmetique"); 
 
    $id =$_GET['id'];
     $etat=$_GET['etat'];
   
            $query="UPDATE commande SET etat='$etat' WHERE id='$id'"; 
            $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
            header("location:ligne_commande.php?id=".$id);
 
   
    
        ?>