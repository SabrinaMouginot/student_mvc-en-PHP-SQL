<table>

    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Description</th>
    </tr>

    <?php //mise en forme du tableau
    foreach ($students as $student) { ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['lastname'] ?></td>
            <td><?= $student['firstname'] ?></td>
            <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=update">✎</a></td>
            <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=delete">❌</a></td>
            </a></td>
        </tr>
    <?php } ?>
</table>