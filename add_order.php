<?php  
require 'commandes.php';
$id=$_GET["id"];
if(isset($_POST['valider']))
{
    if(isset($_POST['nom']) AND isset($_POST['phone']) AND isset($_POST['date']) AND isset($_POST['adress']) AND isset($_POST['Quantete']) )
    {
        
        if(!empty($_POST['nom']) AND !empty($_POST['phone']) AND !empty($_POST['date']) AND !empty($_POST['adress']) AND !empty($_POST['Quantete']) )
        {
          
        $nom =htmlspecialchars(strip_tags($_POST['nom']));
        $phone =htmlspecialchars(strip_tags($_POST['phone']));
        $date =htmlspecialchars(strip_tags($_POST['date']));
        $Quantete =htmlspecialchars(strip_tags($_POST['Quantete']));
        $adress =htmlspecialchars(strip_tags($_POST['adress']));
        $id=$_GET["id"];
        $id_product=$id ;
        $product_prix=id_product_to_prix($id);
        $prix_total=prixtotal($product_prix,$Quantete);
       try{
        ajouter_order($date,$nom,$phone,$adress,$Quantete,$id_product,$prix_total);
        header('location:thankyou.php');
       }catch(Exception $e){
        $e->getMessage();
       }
       
        }
    }
}
function ajouter_order($date,$nom,$phone,$adress,$Quantete,$id_product,$prix_total){
    if(require("connexion.php"))
    {
        
        try {
            // set the PDO error mode to exception
            $sql = "INSERT INTO orders (date_order,nom,phone,adress,qnt_commandes,details_order,id_product,payment_system,prix_total)
            VALUES ('$date','$nom','$phone','$adress',$Quantete,'',$id_product,'COD',$prix_total)";
            // use exec() because no results are returned
            $access->exec($sql);
           // echo "New record created successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          
          $access = null;

    }
}
function id_product_to_prix($id){
    if(require("connexion.php"))
    {
        
  $req =$access->prepare("SELECT * FROM produits WHERE id='$id'");
  $req->execute();
  $data = $req->fetchAll(PDO::FETCH_OBJ);
  foreach($data as $d):
      return $d->prix;

      endforeach ; 
  }

}
function prixtotal($produc_prix,$qnt) {

return $produc_prix*$qnt;
}



?>