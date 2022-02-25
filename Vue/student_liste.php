<table>

    <tr>
        <th>Id</th>
        <th>Id de l'année scolaire</th>
        <th>Id du projet</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Date de création</th>
        <th>Date de mise à jour</th>
    </tr>

    <?php //mise en forme du tableau
    foreach ($students as $student) { ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['school_year_id'] ?></td>
            <td><?= $student['project_id'] ?></td>
            <td><?= $student['lastname'] ?></td>
            <td><?= $student['firstname'] ?></td>
            <td><?= $student['email'] ?></td>
            <td><?= $student['created_at'] ?></td>
            <td><?= $student['updated_at'] ?></td>
            <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=update">✎</a></td>
            <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=delete">❌</a></td>
            </a></td>
        </tr>
    <?php } ?>
</table>