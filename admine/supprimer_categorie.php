<?php
$con=mysqli_connect("localhost","root","","cosmetique");
$id=$_GET['id'];
$query="DELETE FROM catergorie WHERE id='$id'"; 
$res=mysqli_query($con,$query);
header("location:../stock/categories.php");

