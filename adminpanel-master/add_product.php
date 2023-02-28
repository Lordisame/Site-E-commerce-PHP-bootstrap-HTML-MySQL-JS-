<?php
if(isset($_POST['valider']))
{
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']) AND isset($_POST['qnt']) AND ($_POST['categorie']) )
    {
        
        if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']) AND !empty($_POST['qnt']) AND !empty($_POST['categorie']))
        {
          
        $image =htmlspecialchars(strip_tags($_POST['image']));
        $nom =htmlspecialchars(strip_tags($_POST['nom']));
        $prix =htmlspecialchars(strip_tags($_POST['prix']));
        $desc =htmlspecialchars(strip_tags($_POST['desc']));
        $qnt =htmlspecialchars(strip_tags($_POST['qnt']));
        $id_categorie =htmlspecialchars(strip_tags($_POST['categorie']));
        $categorie=get_id_by_cat_name($id_categorie);
       try{
        ajouter($image,$nom,$prix,$desc,$qnt,$categorie);
     //   header('location:index.php?success=add_product_success');
       }catch(Exception $e){
        $e->getMessage();
       }
       
        }
    }
}
function ajouter($image,$nom,$prix,$desc,$qnt,$categorie){
    require("connexion.php");
    
        
            // set the PDO error mode to exception
            $sql = "INSERT INTO produits (nom,image,prix,qnt,description,id_cat)
            VALUES ('$nom','$image',$prix,$qnt,'$desc',$categorie)";
            // use exec() because no results are returned
            $access->exec($sql);
            header('Location:index.php?success=add_prod_successs');
           // echo "New record created successfully";
          
          
          

    }
?>
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

