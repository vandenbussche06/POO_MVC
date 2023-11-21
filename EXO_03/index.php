<?php

class Livre
{
    private $titre;
    private $nbPages;
    private $couleurCouverture;
    private $esTraduitenAnglais;

    public function __construct(string $titre, $nbPages, $couleurCouverture, $esTraduitenAnglais = false)
    {
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->couleurCouverture = $couleurCouverture;
        $this->esTraduitenAnglais = $esTraduitenAnglais;
    }

    /**
     * Get the value of nbPages
     */
    public function getNbPages()
    {
        return $this->nbPages;
    }

    /**
     * Set the value of nbPages
     *
     * @return  self
     */
    public function setNbPages($nbPages)
    {
        $this->nbPages = $nbPages;

        return $this;
    }

    /**
     * Get the value of couleurCouverture
     */
    public function getCouleurCouverture()
    {
        return $this->couleurCouverture;
    }

    /**
     * Set the value of couleurCouverture
     *
     * @return  self
     */
    public function setCouleurCouverture($couleurCouverture)
    {
        $this->couleurCouverture = $couleurCouverture;
        return $this;
    }

    /**
     * Get the value of esTraduitenAnglais
     */
    public function getEsTraduitenAnglais()
    {
        return $this->esTraduitenAnglais;
    }

    /**
     * Set the value of esTraduitenAnglais
     *
     * @return  self
     */
    public function setEsTraduitenAnglais()
    {
        $this->esTraduitenAnglais = true;
        return $this;
    }

    public function ajouterPages(int $nbPages)
    {
        $this->setNbPages($this->getNbPages() + $nbPages);
    }

    public function basculerEnAnglais()
    {
        $this->setEsTraduitenAnglais();
        $this->ajouterPages(5);
        $this->setCouleurCouverture("VERT");
    }

    public function afficherLivre()
    {
        echo "Titre : {$this->titre}<br>";
        echo "Nb Pages : {$this->getNbPages()}<br>";
        echo "Couleur Couverture : {$this->getCouleurCouverture()}<br>";
        echo "Traduit en anglais : " . ($this->getEsTraduitenAnglais() ? "Oui" : "Non") . "<br>";
    }
}

$livre_01 = new Livre("DELPHI POUR LES NULL", 500, "NOIR");
$livre_01->afficherLivre();
$livre_01->basculerEnAnglais();
$livre_01->afficherLivre();
