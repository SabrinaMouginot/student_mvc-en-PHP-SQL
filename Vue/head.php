<!doctype html>
<html lang="fr">
<title><?= $title ?? 'Exercice Cookies' ?></title>
<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="icon" href="<?= $favicon ?? 'data:;base64,iVBORw0KGgo=' ?>">

<body>
    <form>
        <a href="index.php?table=tag">
            <input type="button" value="tag">
        </a>
    </form>
    <form>
        <a href="index.php?table=student">
            <input type="button" value="student">
        </a>
    </form>
    <form>
        <a href="index.php?table=project">
            <input type="button" value="project">
        </a>
    </form>
</body>