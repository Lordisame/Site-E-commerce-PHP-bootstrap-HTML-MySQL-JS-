<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Product List</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Product</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Category</th>
              <th>Description</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody id="product_list">
            
              
            <?php 
            $Produits=afficher();
            $categiries=afficher_cat();
            foreach($Produits as $produit):?>
                    <tr>
                      <td><?= $produit->id?></td>
                      <td><?= $produit->nom?></td>
                      <td> <img src = "../images/<?= $produit->image?>" class = "w-25" style="margin-right:-100px ;"></td>
                      <td><?= $produit->prix ?></td>
                      <td><?= $produit->qnt ?></td>
                      <!--get_name_by_cat_id() -->
                      <td> <?= get_name_by_cat_id($produit->id_cat) ?> </td>
                      <td><?= $produit->description?></td>
                      <td><a href="Delete_product.php?id=<?= $produit->id?>">Delete</a></td>
                    </tr>
                            
                <?php endforeach; ?>




           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<form method="POST" action="add_product.php">

<!-- Add Product Modal start -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form   method="POST" id="add-category-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Name</label>
		        		<input type="text" name="nom" class="form-control" placeholder="Enter Product Name">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Category Name</label>
		        		<select class="form-control category_list" name="categorie">
                <?php
                foreach($categiries as $categirie):?>
		        			<option value="<?= $categirie->nom_cat?>"><?= $categirie->nom_cat?></option>
                  <?php endforeach; ?>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Description</label>
		        		<textarea class="form-control" name="desc" placeholder="Enter product desc"></textarea>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Qty</label>
                <input type="number" name="qnt" class="form-control" placeholder="Enter Product Quantity">
              </div>
            </div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Price</label>
		        		<input type="number" name="prix" class="form-control" placeholder="Enter Product Price">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Image  URL</label>
		        		<input type="text" name="image" class="form-control">
		        	</div>
        		</div>
        		<div class="col-12">
            <button name="valider" type="submit" class="btn btn-primary add-category"> ajouter un noveau produit</button>
             
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
</form>


<?php include_once("./templates/footer.php");

function afficher()
{
    if(require("connexion.php"))
    {
        $req =$access->prepare("SELECT * FROM produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req ->closeCursor();
    }
}
function afficher_cat(){
  if(require("connexion.php"))
    {
  $req =$access->prepare("SELECT * FROM categorie ORDER BY id_cat DESC");
  $req->execute();
  $data = $req->fetchAll(PDO::FETCH_OBJ);
  return $data;
}
}


?>

<script type="text/javascript" src="./js/products.js"></script>
<?php
// Function to get id and name categorie
function get_id_by_cat_name($categorie){
    if(require("connexion.php"))
      {
       
    $req =$access->prepare("SELECT * FROM categorie WHERE nom_cat='$categorie'");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    foreach($data as $id):
        return $id->id_cat;

        endforeach ; 
    }
}   
    function get_name_by_cat_id($categorie){
        if(require("connexion.php"))
          {
           
        $req =$access->prepare("SELECT * FROM categorie WHERE id_cat=$categorie ");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $id):
            return $id->nom_cat;
    
            endforeach ; 
        }
    }

 ?>

