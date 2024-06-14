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

    /**
     * @param int|null $id
     * @param string $naam
     * @param string $artiesten
     * @param string|null $release_date
     * @param string|null $url
     * @param string|null $afbeelding
     * @param string|null $prijs
     */
    public function __construct(?int $id, string $naam, string $artiesten, ?string $release_date, ?string $url, ?string $afbeelding, ?string $prijs)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->artiesten = $artiesten;
        $this->release_date = $release_date;
        $this->url = $url;
        $this->afbeelding = $afbeelding;
        $this->prijs = $prijs;
    }

    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM Album");

        // Array om personen op te slaan
        $albums = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $album = new Album(
                $row['ID'],
                $row['Naam'],
                $row['Artiesten'],
                $row['Release_date'],
                $row['URL'],
                $row['Afbeelding'],
                $row['Prijs']
            );
            $albums[] = $album;
        }

        // Retourneer array met personen
        return $albums;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNaam(): string
    {
        return $this->naam;
    }

    /**
     * @param string $naam
     */
    public function setNaam(string $naam): void
    {
        $this->naam = $naam;
    }

    /**
     * @return string
     */
    public function getArtiesten(): string
    {
        return $this->artiesten;
    }

    /**
     * @param string $artiesten
     */
    public function setArtiesten(string $artiesten): void
    {
        $this->artiesten = $artiesten;
    }

    /**
     * @return string|null
     */
    public function getReleaseDate(): ?string
    {
        return $this->release_date;
    }

    /**
     * @param string|null $release_date
     */
    public function setReleaseDate(?string $release_date): void
    {
        $this->release_date = $release_date;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string|null
     */
    public function getAfbeelding(): ?string
    {
        return $this->afbeelding;
    }

    /**
     * @param string|null $afbeelding
     */
    public function setAfbeelding(?string $afbeelding): void
    {
        $this->afbeelding = $afbeelding;
    }

    /**
     * @return string|null
     */
    public function getPrijs(): ?string
    {
        return $this->prijs;
    }

    /**
     * @param string|null $prijs
     */
    public function setPrijs(?string $prijs): void
    {
        $this->prijs = $prijs;
    }


}