<header>
  <div class="elementH">
  <div class="bouton-app" onclick="apparaitre()">
      <span></span>
      <span></span>
      <span></span>
  </div>
  <a href="index.php">
    PROJET PHOTO ATB - BANC N°XX
  </a>
  <?php 
    session_start();
    if(isset($_SESSION['connecte'])){
      if($_SESSION['connecte'] == 1){
        echo '<form action="deco.php" id="con">
        <button class="deconnexion" type="submit">Deconnexion</button>
        </form>';
      }else{
        echo '<form action="connexion.php" id="con">
        <button class="connexion" type="submit">Connexion</button>
        </form>';
      }
    }else{
        echo '<form action="connexion.php" id="con">
        <button class="connexion" type="submit">Connexion</button>
        </form>';
      }
    
    
  ?>
  
  </div>
  
</header>
