<?php

    $id=$_GET["id"];

       try {
        require("connexion.php");
      
        // sql to delete a record
        $sql = $access->prepare('DELETE FROM produits WHERE id=:id');
        $sql->bindValue(':id',$id);
        $sql->execute();
        echo "Record deleted successfully";
        header('location:products.php');
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $access = null;
      ?>

  
    <!-- ?>
    $id=$_GET["id"];
        $req=$access->prepare("DELETE * FROM produits WHERE id=$id");
        $req->execute(array($id));
        header("location:products.php");
        $sql = "DELETE * FROM produits WHERE id=$id";
         $access->exec($sql);
        header("location:products.php"); -->