<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Customers</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id_order</th>
              <th>Date order</th>
              <th>Nom</th>
              <th>Phone</th>
			  <th>Adress</th>
              <th>Quantity_commandes</th>
              <th>Product</th>
              <th>Payment Status</th>
              <th>Prix Total </th>
            </tr>
          </thead>
          <tbody id="customer_order_list">
          <?php 
            $orders=afficher_order();
            foreach($orders as $order):?>
                    <tr>
                      <td><?= $order->id_order?></td>
                      <td><?= $order->date_order?></td>
                      <td><?= $order->nom?></td>
                      <td><?= $order->phone?></td>
                      <td><?= $order->adress?></td>
                      <td><?= $order->qnt_commandes?></td>
                      <td style="max-width: 150px ;"> <img src = "../images/<?php echo get_image_by_id( $order->id_product) ; ?>" class = "w-25" style=""></td>
                      <td><?= $order->payment_system?></td>
                      <td><?= $order->prix_total?> $</td>
                      

                      
                    </tr>
                            
                <?php endforeach; ?>
         
            
        </table>
      </div>
    </main>
  </div>
</div>
<?php 
function afficher_order()
{
    if(require("connexion.php"))
    {
        $req =$access->prepare("SELECT * FROM orders ORDER BY id_order DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req ->closeCursor();
    }
} 
function get_image_by_id($id) 
{
  if(require("connexion.php"))
  {
   
$req =$access->prepare("SELECT * FROM produits WHERE id=$id ");
$req->execute();
$data = $req->fetchAll(PDO::FETCH_OBJ);
foreach($data as $d):
    return $d->image;

    endforeach ; 
}
}

?>



<?php include_once("./templates/footer.php");


?>



<script type="text/javascript" src="./js/products.js"></script>

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>