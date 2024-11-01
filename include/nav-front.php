
<?php  
session_start();
$client=false;
$admin=false;
$con=mysqli_connect("localhost","root","","cosmetique");
if(isset($_SESSION['client'])){
$client=true;
$user=$_SESSION['client'][0];
$query5 = "SELECT COUNT(*) AS total_rows FROM panier WHERE iduser='$user' ";
$result = mysqli_query($con, $query5);
}
if(isset($_SESSION['admin'])){
    $admin=true;
}

   

   
     $query="SELECT * FROM catergorie";
     $res=mysqli_query($con,$query,MYSQLI_USE_RESULT); 
     

    ?>
<header>

<nav class="fixed-top">
<ul class="ul-nav-1" >
    <?php   
    if(!$admin){ ?>
       <li><a href="../front-end/home.php" class="Cosmetique">RADIANCE ROYALE</a>
  </li>
    <?php
    }else{ ?>
             <li><a href="../admine/admin.php" class="Cosmetique">RADIANCE ROYALE</a>
  </li>
    <?php
    }
    ?>

  <li class="right">
                     <?php 
                     if(!$admin){ 
                     if($client){
                     
                     ?><a href="panier.php"><i class="fa-solid fa-cart-shopping"></i>(<?php 
                        if ($result) {
                         // Récupération du résultat
                          $row_count = mysqli_fetch_assoc($result);
                          $totalrw =  $row_count['total_rows'];
                        }
                        echo $totalrw ?>)</a><?php }else{
                      ?><a href="../user/connexion.php"><i class="fa-solid fa-cart-shopping"></i></a><?php
                     } } ?>
   </li>
  <?php   
                   if(!$admin && !$client){ ?>
    <li class="right"><a href="../user/connexion.php"><i class="fa-regular fa-user"></i></a></li>
          <?php
          }elseif($admin || $client){
              ?>
    <li class="right" name="dec">
            <?php 
            if(isset($_SESSION['dc'])) {
                // Unset all session variables
                $_SESSION = array();
            
                // Destroy the session
                session_destroy();
                header("Location:../user/connexion.php");
                exit();
            }
            ?>
            <a href="../user/deconnexion.php"><i class="fa-solid fa-chevron-left"></i></a>
    </li>
        <?php
        } 
        
        if(!$admin){ ?>
                <li class="right">




    <form method="GET" class="search" id="search-bar" action="../front-end/recherche.php">
                <input type="search" placeholder="RECHERCHE" name="q" class="search__input">
                <div class="search__button" id="search-button" >
                    <i class="fa fa-thin fa-magnifying-glass search__icon"></i>
                    <i class="fa-solid fa-xmark search__close"></i>

                </div>
    </form>




    </li>
        <?php
        } ?>

 <?php
        
        if($admin){ ?>
            <li><a class="right" href="../stock/categories.php">liste categories</a></li>
            <li><a class="right" href="../stock/produits.php">liste produits</a></li>
            <li><a class="right" href="../stock/marques.php">liste marques</a></li>
            <li><a class="right" href="../stock/clients.php">liste clients</a></li>
            <li><a class="right" href="../stock/mode_livraison.php">liste Mode de livraison</a></li>
            <li><a class="right" href="../stock/mode_paiement.php">liste Mode de paiement</a></li>
            <li><a class="right" href="../stock/commandes.php">liste des commandes</a></li>
              <?php
          }
            ?>
</ul>
<style>
          .sub-menu{
            position: absolute;
            top:100%;
            right:45%;
            width:320px;
            max-height:0;
            overflow:hidden;
            transition:max-height 0.5s;
          }
          .left:hover .sub-menu {
            max-height: 500px; /* Adjust to a value that is more than the content height */
          }
          .sub{
            background-color:#fff;
            padding: 20px;
            margin:5px;
          }
          .sub hr{
            border:0;
            height:1px;
            width: 100%;
            background: #ccc;
            margin:15px 0 10px;
          }
          .sub-link {
            transition:transform 0.5s;
          }
          .sub-link:hover {
            transform:translatex(5px);
            font-weight:600;
          }
          .ul-nav-2 li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition:transform 0.5s;
}
          .ul-nav-2 li a:hover{
            transform:translatex(5px);
            font-weight:600;
           background-color: white;
           }
        </style>
<ul class="ul-nav-2" >

        <?php 
        if(!$admin){
            if($res){
                while ($row = mysqli_fetch_row($res)){
                ?>
           
                   <li class="left">
                        <a href="../front-end/categorie.php?id=<?php echo $row[0] ?>" >
                        <?php echo $row[1] ?>
                       </a> 
                       <?php
                       if($row[0]==10){?>
                           <div class="sub-menu">
                                <div class="sub">
                                <a href="../front-end/type.php?id=1" class="sub-link">Parfum femme</a><hr>
                                <a href="../front-end/type.php?id=2" class="sub-link">Parfum homme</a><hr>
                                <a href="../front-end/type.php?id=3" class="sub-link">Parfums pour enfants</a>
                                </div>
                           </div>
                            <?php
                           }   ?>
                    </li> 
               <?php
              
              }
           }
        }

?>
</ul>
</nav>

</header>
