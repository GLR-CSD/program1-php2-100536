<?php
// Start de sessie
// Deze gaan we gebruiken om de form values en de errors op te slaan
session_start();

// Controleer of het verzoek via POST is gedaan
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Valideer de ingediende gegevens
    $errors = [];
    $formValues = [
        'albumid' => $_POST['albumid'] ?? '',
        'titel' => $_POST['titel'] ?? '',
        'duur' => $_POST['duur'] ?? '',
        'url' => $_POST['url'] ?? '',
    ];

    // Valideer albumid
    if (empty($_POST['albumid'])) {
        $errors['albumid'] = "AlbumID is verplicht.";
    }

    // Valideer titel
    if (empty($_POST['titel'])) {
        $errors['titel'] = "Titel is verplicht.";
    }
    // Valideer url
    if (empty($_POST['url'])) {
        $errors['url'] = "URL is verplicht.";
    }

    // Als er geen validatiefouten zijn, voeg de persoon toe aan de database
    if (empty($errors)) {
        require_once 'db.php';
        require_once 'classes/nummer.php';

        // Maak een nieuw Persoon object met de ingediende gegevens
        $persoon = new Persoon(
            null,
            $_POST['albumid'],
            $_POST['titel'],
            $_POST['duur'],
            $_POST['url']
        );

        // Voeg de persoon toe aan de database
        $nummer->save($db);

    } else {
        // Sla de fouten en formulier waarden op in sessievariabelen
        $_SESSION['errors'] = $errors;
        $_SESSION['formValues'] = $formValues;
    }

    // Stuur de gebruiker terug naar de index.php
    header("Location: nummer.php");
    exit;

} else {
    header("Location: nummer.php");
}