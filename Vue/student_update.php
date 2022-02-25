<!--FORMULAIRE-->
<form action="index.php?table=student&id=<?= $id ?>&op=submit" method="post">
    <p>school_year_id : <input type="text" name="school_year_id" /></p>
    <p>project_id : <input type="text" name="project_id" /></p>
    <p>lastname : <input type="text" name="lastname" /></p>
    <p>firstname : <input type="text" name="firstname" /></p>
    <p>email : <input type="text" name="email" /></p>
    <p><input type="submit" value="OK"></p>
</form>