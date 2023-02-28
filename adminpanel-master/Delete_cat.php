<?php

    $id=$_GET["id"];

       try {
        require("connexion.php");
      
        // sql to delete a record
        $sql = $access->prepare('DELETE FROM categorie WHERE id_cat=:id');
        $sql->bindValue(':id',$id);
        $sql->execute();
        header('location:categories.php?success=true');
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $access = null;
      ?>

  