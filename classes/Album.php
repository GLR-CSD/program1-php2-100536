<?php

class Album
{
    private ?int $id;

    private string $naam;

    private string $artiesten;

    private ?string $release_date;

    private ?string $url;

    private ?string $afbeelding;

    private ?string $prijs;
}
public static function getAll(PDO $db): array
{
    // Voorbereiden van de query
    $stmt = $db->query("SELECT * FROM Album");

    // Array om personen op te slaan
    $album = [];

    // Itereren over de resultaten en personen toevoegen aan de array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $persoon = new Persoon(
            $row['id'],
            $row['naam'],
            $row['artiesten'],
            $row['release_date'],
            $row['url'],
            $row['afbeelding']
            $row['prijs']
        );
        $album[] = $album;
    }

    // Retourneer array met personen
    return $album;
}