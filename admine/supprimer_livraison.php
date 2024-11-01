<?php
$con=mysqli_connect("localhost","root","","cosmetique");
$id=$_GET['id'];
$query="DELETE FROM mode_de_livraison WHERE id='$id'"; 
$res=mysqli_query($con,$query);
header("location:../stock/mode_livraison.php");

