<?php
$con=mysqli_connect("localhost","root","","cosmetique");
$id=$_GET['id'];
$query="DELETE FROM marque WHERE id='$id'"; 
$res=mysqli_query($con,$query);
header("location:../stock/marques.php");