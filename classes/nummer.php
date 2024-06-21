<?php

class nummer
{
    private ?int $id;

    private string $albumid;

    private string $titel;

    private ?string $duur;

    private ?string $url;

    /**
     * @param int|null $id
     * @param string $albumid
     * @param string $titel
     * @param string|null $duur
     * @param string|null $url
     */
    public function __construct(?int $id, string $albumid, string $titel, ?string $duur, ?string $url)
    {
        $this->id = $id;
        $this->albumid = $albumid;
        $this->titel = $titel;
        $this->duur = $duur;
        $this->url = $url;
    }


    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM nummer");

        // Array om personen op te slaan
        $nummers = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nummer = new nummer(
                $row['ID'],
                $row['AlbumID'],
                $row['Titel'],
                $row['Duur'],
                $row['URL'],
            );
            $nummers[] = $nummer;
        }

        // Retourneer array met personen
        return $nummers;
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
    public function getAlbumid(): string
    {
        return $this->albumid;
    }

    /**
     * @param string $albumid
     */
    public function setAlbumid(string $albumid): void
    {
        $this->albumid = $albumid;
    }

    /**
     * @return string
     */
    public function getTitel(): string
    {
        return $this->titel;
    }

    /**
     * @param string $titel
     */
    public function setTitel(string $titel): void
    {
        $this->titel = $titel;
    }

    /**
     * @return string|null
     */
    public function getDuur(): ?string
    {
        return $this->duur;
    }

    /**
     * @param string|null $duur
     */
    public function setDuur(?string $duur): void
    {
        $this->duur = $duur;
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

}

