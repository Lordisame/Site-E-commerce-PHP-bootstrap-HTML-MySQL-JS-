<?php
require 'commandes.php';
$id=$_GET["id"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .modal-header {
          background-color: var(--pink);
            color: #fff;
       
        }
        
        .required:after {
            content: "*";
            color: red;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" >
    <!-- CSS -->
    <style>
    /* decrription.css */
    footer{
    position: absolute;
    top: 900px;

    left: 0px;

    width: 1583px;
}
.productdesc{
    position: absolute;
    top: 135px;
    left: 15%;
   

    
}
    
    /* Basic Styling */
html, body {
  height: 100%;
  width: 100%;
  margin: 0;
  font-family: 'Roboto', sans-serif;
}

.container {
  margin: 0 auto;
  padding: 15px;
  display: flex;
}

/* Columns */
.left-column {
  width: 65%;
  position: ab;
}

.right-column {
 
  margin-top: 60px;
  position: absolute;
  margin-left: 600px;
  margin-right: 50px;
 
}


/* Left Column */
.left-column img {
  width: 70%;
  position: relative;
  padding-right: 15%;
}

.left-column img.active {
  opacity: 1;
}


/* Right Column */

/* Product Description */
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;  
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}

/* Product Configuration */
.product-color span,
.cable-config span {
  font-size: 14px;
  font-weight: 400;
  color: #86939E;
  margin-bottom: 20px;
  display: inline-block;
}

/* Product Color */
.product-color {
  margin-bottom: 30px;
}

.color-choose div {
  display: inline-block;
}

.color-choose input[type="radio"] {
  display: none;
}

.color-choose input[type="radio"] + label span {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  border-radius: 50%;
}

.color-choose input[type="radio"] + label span {
  border: 2px solid #FFFFFF;
  box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
}

.color-choose input[type="radio"]#red + label span {
  background-color: #C91524;
}
.color-choose input[type="radio"]#blue + label span {
  background-color: #314780;
}
.color-choose input[type="radio"]#black + label span {
  background-color: #323232;
}

.color-choose input[type="radio"]:checked + label span {
  background-image: url(discription/check-icn.svg);
  background-repeat: no-repeat;
  background-position: center;
}

/* Cable Configuration */
.cable-choose {
  margin-bottom: 20px;
}

.cable-choose button {
  border: 2px solid #E1E8EE;
  border-radius: 6px;
  padding: 13px 20px;
  font-size: 14px;
  color: #5E6977;
  background-color: #fff;
  cursor: pointer;
  transition: all .5s;
}

.cable-choose button:hover,
.cable-choose button:active,
.cable-choose button:focus {
  border: 2px solid #86939E;
  outline: none;
}

.cable-config {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}

.cable-config a {
  color: #358ED7;
  text-decoration: none;
  font-size: 12px;
  position: relative;
  margin: 10px 0;
  display: inline-block;
}
.cable-config a:before {
  content: "?";
  height: 15px;
  width: 15px;
  border-radius: 50%;
  border: 2px solid rgba(53, 142, 215, 0.5);
  display: inline-block;
  text-align: center;
  line-height: 16px;
  opacity: 0.5;
  margin-right: 5px;
}

/* Product Price */
.product-price {
  display: flex;
  align-items: center;
}

.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}

.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
}

/* Responsive */
@media (max-width: 940px) {
  .container {
    flex-direction: column;
    margin-top: 60px;
  }

  .left-column,
  .right-column {
    width: 100%;
  }

  .left-column img {
    width: 30px;
    right: 0;
    top: -65px;
    left: initial;
  }
}

@media (max-width: 535px) {
  .left-column img {
    width: 220px;
    top: -85px;
  }
}
</style>
    
</head>
<body>
<?php

require 'header.php'
?>

<!-- product -->
<section class="productdesc">
<main class="container">
<?php 
      function afficher_one_product()
      {
          if(require("connexion.php"))
          {
            $id=$_GET["id"];
              $req =$access->prepare("SELECT * FROM produits WHERE id=$id");
              $req->execute();
              $data = $req->fetchAll(PDO::FETCH_OBJ);
              return $data;
              $req ->closeCursor();
          }
      }
            $Produits=afficher_one_product();
            foreach($Produits as $produit):?>
      <!-- Left Column / Headphones Image -->
      <div class="left-column">
        <img  data-image="red" class="active" src="images/<?= $produit->image?>" alt="">
      </div>


      <!-- Right Column -->
      <div class="right-column">
     
     

        <!-- Product Description -->
        <div class="product-description">
          <span><?= get_name_by_cat_id($produit->id_cat) ?></span>
          <h3><?= $produit->nom?></h3>
          <p><?= $produit->description?></p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          

          <!-- Cable Configuration -->
          <div class="cable-config">
            <span>Stock available</span>
              <h4>Only <span style="color:red ; font-size:26px;"><?= $produit->qnt ?> pieces </span> available in Stock !!!</h4>
            
          </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
          <span><?= $produit->prix ?>$</span>
          <?php endforeach; ?>
          <div >
            
          <button data-bs-toggle="modal" data-bs-target="#myModal" class="cart-btn">Buy Now !</button>
      
        
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div style="border-radius: 25px;" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enter Your informations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="add_order.php?id=<?php $id=$_GET["id"]; echo $id;?>">
                            <div class="mb-3">
                               
                                <input type="hidden" name='date' class="form-control" value="<?php echo(date('Y/m/d H:i:s')); ?>">
                            </div>
                           
                            <div class="mb-3">
                                <label class="form-label required" >Nom</label>
                                <input type="text"name='nom' class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">phone</label>
                                <input type="tel" name='phone' class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Adress</label>
                                <input type="tel" name='adress'class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Quantete</label>
                                <input style="width:15% ;" type="number" name='Quantete'class="form-control"required value="1">
                            </div>
                            <div class="modal-footer">
                                <button name="valider" type="submit" class="btn btn-primary">Submit</button>
                                
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
          
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="description.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</section>
<!-- finproduct -->
<!--  Footer  -->
<?php  require 'footer.php' ?>
</body>
</html>

