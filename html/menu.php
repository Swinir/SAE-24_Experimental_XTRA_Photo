<nav id="sidebar">

  <br>
  <?php
  if(isset($_SESSION['admin'])){
    if($_SESSION['admin']==1){
      echo '<span>Menu :</span><br><br>
      <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="gallerie.php">Galerie</a></li>
          <li><a href="para.php">Paramétres</a></li>
  
      </ul>';
    }else{
      echo '<span>Menu :</span><br><br>
      <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="gallerie.php">Galerie</a></li>
      </ul>';
    }
  }else{
    echo '<span>Menu :</span><br><br>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="gallerie.php">Galerie</a></li>
    </ul>';
  }
  
  ?>
  

</nav>
<div id="cacher">
</div>
<script>
function apparaitre() {
  document.getElementById('sidebar').classList.toggle('active');
  document.getElementById('cacher').classList.toggle('active');
}
</script>
