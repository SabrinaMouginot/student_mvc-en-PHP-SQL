<!--FORMULAIRE-->
<form action="index.php?table=tag&id=<?= $id ?>&op=submit" method="post">
    <p>nom : <input type="text" name="nom" /></p>
    <p>description : <input type="text" name="description" /></p>
    <p><input type="submit" value="OK"></p>
</form>
<!-- POST: envoyer / GET: recevoir -->
<!-- input permet à l'utilisateur de saisir des données -->


<!-- Un modèle (Model) contient les données à afficher.
Une vue (View) contient la présentation de l'interface graphique.
Un contrôleur (Controller) contient la logique concernant les actions effectuées par l'utilisateur. -->

<!-- CRUD (create, read, update, delete) (créer, lire, mettre à jour, supprimer) est un acronyme 
pour les façons dont on peut fonctionner sur des données stockées. -->