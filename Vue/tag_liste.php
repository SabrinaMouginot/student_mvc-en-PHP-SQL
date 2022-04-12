<table>
  <!-- Un modèle (Model) contient les données à afficher.
  Une vue (View) contient la présentation de l'interface graphique.
  Un contrôleur (Controller) contient la logique concernant les actions effectuées par l'utilisateur. -->
<!-- CRUD (create, read, update, delete) (créer, lire, mettre à jour, supprimer) est un acronyme 
pour les façons dont on peut fonctionner sur des données stockées. -->

  <tr>
    <th>Id</th>
    <th>Nom</th>
    <th>Description</th>
  </tr>
  <!-- <tr> définit une ligne de cellules dans un tableau -->
  <!-- <th> définit une cellule d'un tableau comme une cellule d'en-tête pour un groupe de cellule -->
  <!-- <tr> définit une ligne de cellules dans un tableau. -->

  <?php //mise en forme du tableau
  //foreach fournit une façon simple de parcourir des tableaux et <td> définit une cellule d'un tableau qui contient des données
  foreach ($tags as $tag) { ?>
    <tr>
      <td><?= $tag['id'] ?></td>
      <td><?= $tag['name'] ?></td>
      <td><?= $tag['description'] ?></td>
      <td><a href="index.php?table=tag&id=<?= $tag['id'] ?>&op=update">✎</a></td>
      <td><a href="index.php?table=tag&id=<?= $tag['id'] ?>&op=delete">❌</a></td>
    </tr>
  <?php } ?>
</table>