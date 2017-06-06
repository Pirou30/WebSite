<body id="bodyautre">
<div id="banniereautre" class="banner2">
  <div class="diamond">
    <div></div>
  </div>
  <h1 class="text">Utilisateurs secondaires</h1>
</div>
<?php include("vue/profile_menu.php"); ?>
<p>
  <div class="basic-grey">
    <div>
      <h1>
        Liste des utilisateurs secondaires de <?php echo ($_SESSION['prenom'])  ?>
      </h1>
    </div>
    <link rel="stylesheet" href="vue/material.min.css" />
    <script defer src="vue/material.min.js"></script>
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead>
        <tr>
          <th>Prénom</th>
          <th>Nom</th>
        </tr>
      </thead>
      <?php
      $line = 0;
      do
      {
        ?>
        <tbody>
          <td><?php echo $secondary_users_array[$line]['prenom'];?></td>
          <td><?php echo $secondary_users_array[$line]['nom'];?></td>
            <?php
            $secondary_exitance = $secondary_users_array[$line]['prenom'];
            if ($profile == modify)
            {
              if (isset($secondary_exitance))
              {
                ?>
                <td>
                <form method="POST" action="index.php?page=profile">
                  <input type='hidden' name='user_id' value='<?php  echo $secondary_users_array[$line]['id_utilisateur'];?>'/>
                  <input type="submit" value="modifier" />
                </form>
                <?php
              }
              ?>
              </td>
              <td>
                <?php
                $secondary_exitance = $secondary_users_array[$line]['prenom'];
                if (isset($secondary_exitance))
                {
                  ?>
                  <form method="POST" action="index.php?page=profile_secondary_rights">
                    <input type='hidden' name='user_id' value='<?php  echo $secondary_users_array[$line]['id_utilisateur'];?>'/>
                    <input type="submit" value="droits" />
                  </form>
                  <?php
                }
              ?>
              </td>
              <?php
            }
            elseif ($profile == delete)
            {
              ?>
              <td>
                <?php
                $secondary_exitance = $secondary_users_array[$line]['prenom'];
                if (isset($secondary_exitance))
                {
                  ?>
                  <form method="POST" action="index.php?page=profile_delete&type=secondary">
                    <input type='hidden' name='user_id' value='<?php  echo $secondary_users_array[$line]['id_utilisateur'];?>'/>
                    <input type="submit" value="suprimer" />
                  </form>
                  <?php
                }
              ?>
              </td>
              <?php
            }
            ?>
        </tbody>
        <?php
        $line++;
        $next_user = $secondary_users_array[$line]['id_utilisateur'];
      } while (isset($next_user));
       ?>
    </table>
    <?php
    if ($profile == delete)
    {
      ?>
      <form method="POST" action="index.php?page=profile_delete&type=primary">
        <input type='hidden' name='secondary_user_id' value='<?php  echo $secondary_users_array;?>'/>
        <input type="submit" name="delete_primary" value="suprimer le compte principal" />
      </form>
      <?php
    }
    ?>
  </div>

</body>
