<?php
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
    function afficher_cat(){
        if(require("connexion.php"))
          {
        $req =$access->prepare("SELECT * FROM categorie ORDER BY id_cat DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
      }
      }

function ajouter($image,$nom,$prix,$desc,$qnt){
    if(require("connexion.php"))
    {
        // $req =$access->prepare("INSERT INTO produits (image,nom,prix,description) VALUES(' $image ',' $nom ',$prix,'$desc')");
        // $req->execute(array($image,$nom,$prix,$desc));
        // $req->closeCursor();
        try {
            // set the PDO error mode to exception
            $sql = "INSERT INTO produits (image,nom,prix,description,qnt)
            VALUES ('$image', '$nom',$prix, '$desc',$qnt)";
            // use exec() because no results are returned
            $access->exec($sql);
            header("location: ./products.php");
           // echo "New record created successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          
          $access = null;

    }
}
function afficher()
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req ->closeCursor();
    }
}
function supprimer($id)
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("DELETE * FROM produits WHERE id=?");
        $req->execute(array($id));
    }
}

?>