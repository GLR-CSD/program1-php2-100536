<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nummerlijst</title>
    <link rel="stylesheet" href="public/css/simple.css">
</head>
<body>
<h1>Nummerlijst</h1>
<table>
    <tr>
        <th>ID</th>
        <th>AlbumID</th>
        <th>Titel</th>
        <th>Duur</th>
        <th>URL</th>
    </tr>
    <?php foreach ($nummers as $nummer): ?>
        <tr>
            <td><?= $nummer->getID() ?></td>
            <td><?= $nummer->getAlbumID() ?></td>
            <td><?= $nummer->getTitel() ?></td>
            <td><?= $nummer->getDuur() ?></td>
            <td><a href="<?= $nummer->getURL() ?>"><?= $nummer->getURL() ?></a></td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="notice">
    <h2>Nummers Toevoegen:</h2>
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="nummer_view.php" method="post">
        <label for="naam">Album Id</label>
        <input type="text" id="naam" name="naam" value="<?= $formValues['albumid'] ?? '' ?>" required>
        <?php if (isset($errors['albumid'])): ?>
            <span style="color: red;"><?= $errors['albumid'] ?></span>
        <?php endif; ?><br>

        <label for="">Titel:</label>
        <input type="text" id="Titel" name="titel" value="<?= $formValues['titel'] ?? '' ?>"  required>
        <?php if (isset($errors['titel'])): ?>
            <span style="color: red;"><?= $errors['titel'] ?></span>
        <?php endif; ?><br>

        <label for="duur">Duur:</label>
        <input type="text" id="duur" name="duur" value="<?= $formValues['duur'] ?? '' ?>">
        <?php if (isset($errors['duur'])): ?>
            <span style="color: red;"><?= $errors['duur'] ?></span>
        <?php endif; ?><br>

        <label for="url">Url:</label>
        <input type="url" id="url" name="url" value="<?= $formValues['url'] ?? '' ?>">
        <?php if (isset($errors['url'])): ?>
            <span style="color: red;"><?= $errors['url'] ?></span>
        <?php endif; ?><br>

        <input type="submit" value="Toevoegen">
    </form>
</div>

</body>
</html>
