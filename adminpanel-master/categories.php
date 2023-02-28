<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>


      <div class="row">
      	<div class="col-10">
      		<h2>Manage Category</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_category_modal" class="btn btn-primary btn-sm">Add Category</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="category_list">
          <?php 
            $Produits=afficher();
            foreach($Produits as $produit):?>
                    <tr>
                      <td><?= $produit->id_cat?></td>
                      <td><?= $produit->nom_cat?></td>

                      <td><a href="Delete_cat.php?id=<?= $produit->id_cat?>">Delete</a></td>
                    </tr>
                            
                <?php endforeach; ?>
         
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         
        </button>
      </div>
      <div class="modal-body">
        <form action="add_categorie.php" method="POST" id="add-category-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Category Name</label>
		        		<input type="text" name="nom" class="form-control" placeholder="Enter categorie Name">
		        	</div>
        		</div>
        		<div class="col-12">
        			<button name="valider" type="submit" class="btn btn-primary add-category">Add Category</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once("./templates/footer.php"); ?>




<?php 

function afficher()
{
    if(require("connexion.php"))
    {
        $req =$access->prepare("SELECT * FROM categorie ORDER BY id_cat DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req ->closeCursor();
    }
}

?>




<script type="text/javascript" src="./js/categories.js"></script>