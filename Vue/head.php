<!doctype html>
<html lang="fr">
<title><?= $title ?? 'PHP-SQL, MVC, student/tag' ?></title>
<link rel="stylesheet" href="Vue/css/style2.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="icon" href="<?= $favicon ?? 'data:;base64,iVBORw0KGgo=' ?>">

<body>
    <form>
        <a href="index.php?table=tag">
            <input type="button" value="tag">
        </a>
        <a href="index.php?table=tag&op=insert">
            <input type="button" value="&#x2795;">
        </a>
    </form>
    <form>
        <a href="index.php?table=student">
            <input type="button" value="student">
        </a>
        <a href="index.php?table=student&op=insert">
            <input type="button" value="&#x2795;">
        </a>
    </form>
    <form>
        <a href="index.php?table=project">
            <input type="button" value="project">
        </a>
        <a href="index.php?table=project&op=insert">
            <input type="button" value="&#x2795;">
        </a>
    </form>
</body>