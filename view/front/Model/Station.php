<?php
class Station
{
    private int $id_station;
    private string $nom;
    private string $emplacement;
    private int $nb_bornes;
    private int $availability;

    public function __construct(string $nom, string $emplacement, int $nb_bornes, int $availability)
    {
        $this->nom = $nom;
        $this->emplacement = $emplacement;
        $this->nb_bornes = $nb_bornes;
        $this->availability = $availability;
    }

    /**
     * Get the value of id_station
     */
    public function getIdStation(): int
    {
        return $this->id_station;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of emplacement
     */
    public function getEmplacement(): string
    {
        return $this->emplacement;
    }

    /**
     * Set the value of emplacement
     *
     * @return  self
     */
    public function setEmplacement(string $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get the value of nb_bornes
     */
    public function getNbBornes(): int
    {
        return $this->nb_bornes;
    }

    /**
     * Set the value of nb_bornes
     *
     * @return  self
     */
    public function setNbBornes(int $nb_bornes): self
    {
        $this->nb_bornes = $nb_bornes;

        return $this;
    }

    /**
     * Get the value of availability
     */
    public function getAvailability(): int
    {
        return $this->availability;
    }

    /**
     * Set the value of availability
     *
     * @return  self
     */
    public function setAvailability(int $availability): self
    {
        $this->availability = $availability;

        return $this;
    }
}
