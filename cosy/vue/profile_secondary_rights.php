<body id="bodyautre">
<div id="banniereautre" class="banner2">
  <div class="diamond">
    <div></div>
  </div>
  <h1 class="text">Droits des utilisateurs secondaires</h1>
</div>
<?php include("vue/profile_menu.php"); ?>
<p>
  <div class="basic-grey">
    <div>
      <h3>
        Droits des utilisateurs secondaires
      </h3>
    </div>
    <link rel="stylesheet" href="vue/material.min.css" />
    <script defer src="vue/material.min.js"></script>
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead>
        <tr>
          <th>Pièce</th>
          <th>Complet</th>
          <th>Affichage</th>
          <th>Aucun</th>
        </tr>
      </thead>
      <?php
      $line = 0;
      do
      {
        ?>
        <tbody>
          <td><?php echo $piece_array[$line]['localisation_dans_la_maison'];?></td>
          <form action="index.php?page=profile_secondary_rights_validation" method="post">
            <?php
            $exist = $piece_array[$line]['localisation_dans_la_maison'];
            $id_piece = $piece_array[$line]['id_piece'];
            $rights = $rights_array[$id_piece]['droit_d_utilisateur'];
            if ($rights == full) {
              $full = checked;
              $view = unchecked;
              $null = unchecked;
            }
            elseif ($rights == view) {
              $full = unchecked;
              $view = checked;
              $null = unchecked;
            }
            else {
              $full = unchecked;
              $view = unchecked;
              $null = checked;
            }
            if (isset($exist))
            {
              ?>
              <input type='hidden' name='id_piece' value='<?php  echo $id_piece;?>'/>
              <td>
                <input type="radio" name="rights" value="full" <?php echo $full; ?>/>
              </td>
              <td>
                <input type="radio" name="rights" value="view" <?php echo $view; ?>/>
              </td>
              <td>
                <input type="radio" name="rights" value="NULL" <?php echo $null; ?>/>
              </td>
              <td>
                <input type="submit" value="Ok" />
              </td>
              <?php
            }
             ?>
          </form>
        </tbody>
        <?php
        $line++;
        $next_piece = $piece_array[$line]['localisation_dans_la_maison'];
      } while (isset($next_piece));
       ?>
    </table>
  </div>
</body>
