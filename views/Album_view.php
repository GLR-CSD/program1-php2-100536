<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumlijst</title>
    <link rel="stylesheet" href="public/css/simple.css">
</head>
<body>
<h1>Personenlijst</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Artiesten</th>
        <th>Resease_date</th>
        <th>URL</th>
        <th>Afbeelding</th>
        <th>Prijs</th>
    </tr>
    <?php foreach ($album as $album): ?>
        <tr>
            <td><?= $album->getID() ?></td>
            <td><?= $album->getNaam() ?></td>
            <td><?= $album->getArtiesten() ?></td>
            <td><?= $album->getResease_date() ?></td>
            <td><?= $album->getURL() ?></td>
            <td><?= $album->getAfbeelding() ?></td>
            <td><?= $album->getPrijs() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="notice">
    <h2>Album Toevoegen:</h2>
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="toevoegen.php" method="post">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" value="<?= $formValues['naam'] ?? '' ?>" required>
        <?php if (isset($errors['naam'])): ?>
            <span style="color: red;"><?= $errors['naam'] ?></span>
        <?php endif; ?><br>

        <label for="">Artiesten:</label>
        <input type="text" id="artiesten" name="artiesten" value="<?= $formValues['a'] ?? '' ?>"  required>
        <?php if (isset($errors['artiesten'])): ?>
            <span style="color: red;"><?= $errors['artiesten'] ?></span>
        <?php endif; ?><br>

        <label for="resease_date">Resease_date:</label>
        <input type="text" id="resease_date" name="resease_date" value="<?= $formValues['resease_date'] ?? '' ?>">
        <?php if (isset($errors['resease_date'])): ?>
            <span style="color: red;"><?= $errors['resease_date'] ?></span>
        <?php endif; ?><br>

        <label for="url">Url:</label>
        <input type="url" id="url" name="url" value="<?= $formValues['url'] ?? '' ?>">
        <?php if (isset($errors['url'])): ?>
            <span style="color: red;"><?= $errors['url'] ?></span>
        <?php endif; ?><br>

        <label for="afbeelding">afbeelding:</label><br>
        <textarea id="afbeelding" name="afbeelding" rows="4" cols="50">
            <?= $formValues['opmerkingen'] ?? '' ?>
        </textarea><br>
        <input type="submit" value="Toevoegen">
    </form>
</div>

</body>
</html>
