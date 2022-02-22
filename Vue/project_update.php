<!--FORMULAIRE-->
<form action="index.php?table=project&id=<?= $id ?>&op=submit" method="post">
    <p>nom : <input type="text" name="nom" /></p>
    <p>description : <input type="text" name="description" /></p>
    <p><input type="submit" value="OK"></p>
</form>
