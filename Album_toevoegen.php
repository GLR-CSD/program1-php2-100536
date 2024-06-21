<?php
// Start de sessie
// Deze gaan we gebruiken om de form values en de errors op te slaan
session_start();

// Controleer of het verzoek via POST is gedaan
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Valideer de ingediende gegevens
    $errors = [];
    $formValues = [
        'naam' => $_POST['naam'] ?? '',
        'artiesten' => $_POST['artiesten'] ?? '',
        'release_date' => $_POST['release_date'] ?? '',
        'url' => $_POST['url'] ?? '',
        'afbeelding' => $_POST['afbeelding'] ?? '',
        'prijs' => $_POST['prijs'] ?? '',
    ];

    // Valideer voornaam
    if (empty($_POST['naam'])) {
        $errors['naam'] = "Naam is verplicht.";
    }

    // Valideer achternaam
    if (empty($_POST['artiesten'])) {
        $errors['artiesten'] = "Artiesten is verplicht.";
    }

    // Valideer achternaam
    if (empty($_POST['release_date'])) {
        $errors['release_date'] = "Release Date is verplicht.";
    }

    // Valideer achternaam
    if (empty($_POST['url'])) {
        $errors['url'] = "URL is verplicht.";
    }

    // Valideer achternaam
    if (empty($_POST['afbeelding'])) {
        $errors['afbeelding'] = " Afbeelding is verplicht.";
    }

    // Valideer achternaam
    if (empty($_POST['prijs'])) {
        $errors['prijs'] = "Prijs is verplicht.";
    }

    // Als er geen validatiefouten zijn, voeg de persoon toe aan de database
    if (empty($errors)) {
        require_once 'db.php';
        require_once 'classes/Album.php';

        // Maak een nieuw Persoon object met de ingediende gegevens
        $album = new Album(
            null,
            $_POST['naam'],
            $_POST['artiesten'],
            $_POST['release_date'],
            $_POST['url'],
            $_POST['afbeelding'],
            $_POST['prijs'],
        );

        // Voeg de persoon toe aan de database
        $album->save($db);

    } else {
        // Sla de fouten en formulier waarden op in sessievariabelen
        $_SESSION['errors'] = $errors;
        $_SESSION['formValues'] = $formValues;
    }

    // Stuur de gebruiker terug naar de index.php
    header("Location: album.php");
    exit;

} else {
    header("Location: album.php");
}