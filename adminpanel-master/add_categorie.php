<?php
if(isset($_POST['valider']))
{
    if(isset($_POST['nom']) )
    {
        
        if(!empty($_POST['nom']) )
        {
            
        
        $nom =htmlspecialchars(strip_tags($_POST['nom']));
       
       try{
        ajouter($nom);
        
       }catch(Exception $e){
        $e->getMessage();
       }
       
        }
    }
}

function ajouter($nom){
    if(require("connexion.php"))
    {
        // $req =$access->prepare("INSERT INTO produits (image,nom,prix,description) VALUES(' $image ',' $nom ',$prix,'$desc')");
        // $req->execute(array($image,$nom,$prix,$desc));
        // $req->closeCursor();
        try {
            // set the PDO error mode to exception
           
            $sql = "INSERT INTO `categorie` (`nom_cat`) VALUES ('$nom')";
            // use exec() because no results are returned
            $access->exec($sql);
            header('location:index.php?success=add_cat_success');
           // echo "New record created successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          
          $access = null;

    }
}
?>
