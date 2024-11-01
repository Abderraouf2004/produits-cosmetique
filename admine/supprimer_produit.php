<?php
$con=mysqli_connect("localhost","root","","cosmetique");
$id=$_GET['id'];
$query="DELETE FROM produit WHERE id='$id'"; 
$res=mysqli_query($con,$query);
header("location:../stock/produits.php");

