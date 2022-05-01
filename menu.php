<nav id="sidebar">
  <div class="bouton-app" onclick="apparaitre()">
      <span></span>
      <span></span>
      <span></span>
  </div>
  <br>
  <span>Menu :</span><br><br>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="gallerie.php">Galerie</a></li>
        <li><a href="para.php">Paramétres</a></li>

    </ul>

</nav>
<div id="cacher">
</div>
<script>
function apparaitre() {
  document.getElementById('sidebar').classList.toggle('active');
  document.getElementById('cacher').classList.toggle('active');
}
</script>
