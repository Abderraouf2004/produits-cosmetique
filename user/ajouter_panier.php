<?php 
  $con=mysqli_connect("localhost","root","","cosmetique");
session_start();
if(!isset($_SESSION['client'])){
    header("location:../user/connexion.php");
}else{
$iduser=$_SESSION['client'][0];
$id = $_POST['id'];
$qnt=$_POST['qnt'];
    if($qnt!=0){
        $query="INSERT INTO panier(id,qnt,iduser)VALUES('$id','$qnt','$iduser');"; 
        $res=mysqli_query($con,$query,MYSQLI_USE_RESULT);
    }

}


?>