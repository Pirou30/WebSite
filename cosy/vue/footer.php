<div id="piedpage">
<footer>
  <ul>
    <a href="index.php?page=mention_legales">Mentions légales</a>&nbsp;&#124;&nbsp;
    <?php
    if (isset($_SESSION['type']) && $_SESSION['type']=='admin')
//Dans le cas d'un compte administrateur, les conditions d'utilisation pourront être modifiées
    {
    ?>
      <a href="index.php?page=conditions_admin">Conditions d'utilisation</a>&nbsp;&#124;&nbsp;
    <?php
    }
    else
    {
    ?>
      <a href="index.php?page=conditions">Conditions d'utilisation</a>&nbsp;&#124;&nbsp;
    <?php
    }
    ?>
    <a href="index.php?page=assistance">Contact et assistance</a>
  </ul>
</footer>
</div>
</html>
