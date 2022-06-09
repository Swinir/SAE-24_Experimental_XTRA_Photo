<?php
if(isset($_SESSION['admin'])){
    if($_SESSION['admin'] == 0){
      header("Location: index.php");
    }
}if(!isset($_SESSION['admin'])){
      header("Location: index.php");
  }

?>