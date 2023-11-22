<?php

class Parc
{
    private $nom;
    private $adresse;
    private $voitures;

    public function __construct(String $nom, string $adresse)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->voitures = [];
    }

    public function ajouterVoiture($v)
    {
        $this->voitures[] = $v;
    }

    public function afficheParc()
    {
        for ($i = 0; $i < count($this->voitures); $i++) {
            echo $this->voitures[$i];
        }
    }

    public function rechercheVoiture($marque)
    {
        for ($i = 0; $i < count($this->voitures); $i++) {
            if ($this->voitures[$i]->getMarque() == $marque) {
                echo $this->voitures[$i];
            }
        }
    }
}

class Voiture
{
    const TYPE_MINI = 3;
    const TYPE_NORMAL = 5;
    const TVA = 20;

    private $marque;
    private $modele;
    private $couleur;
    private $nbPortes;
    private $estElectrique;
    private $prix_Ht;
    private $prix_Ttc;

    public static $parc = [];

    public function __construct(string $marque, string $modele, string $couleur, int $nbPortes, bool $estElectrique, float $prix_Ht)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->nbPortes = $nbPortes;
        $this->estElectrique = $estElectrique;
        $this->prix_Ht = $prix_Ht;
        $this->prix_Ttc = $prix_Ht * (1 + (self::TVA / 100));
    }

    /**
     * Get the value of marque
     */
    public function getMarque()
    {
        return $this->marque;
    }

    public function __toString()
    {
        $txt = "";
        $txt .= "------------------------------------------------------- </br>";
        $txt .= "Marque : " . $this->marque . "</br>";
        $txt .= "Modele : " . $this->modele . "</br>";
        $txt .= "Couleur : " . $this->couleur . "</br>";
        $txt .= "Nombre de portes : " . $this->nbPortes . "</br>";
        $txt .= "Electrique : " . ($this->estElectrique == true ? "OUI" : "NON") . "</br>";
        $txt .= "Prix HT : " . $this->prix_Ht . " € </br>";
        $txt .= "Prix TTC : " . $this->prix_Ttc . " €</br>";

        return $txt;
    }
}

$parc = new Parc("MENTON", "3 RUE DES LILAS 06500 MENTON");

$v1 = new Voiture("CITROEN", "C5", "ROUGE", Voiture::TYPE_NORMAL, false, 10000);
$parc->ajouterVoiture($v1);

$v2 = new Voiture("CITROEN", "C4", "BLEU", Voiture::TYPE_NORMAL, true, 30000);
$parc->ajouterVoiture($v2);

$v3 = new Voiture("AUDI", "A4", "GRIS", Voiture::TYPE_NORMAL, false, 40000);
$parc->ajouterVoiture($v3);

$v4 = new Voiture("RENAULT", "SCENIC", "GRIS", Voiture::TYPE_NORMAL, false, 14000);
$parc->ajouterVoiture($v4);

echo $parc->afficheParc();
echo $parc->rechercheVoiture("AUDI");
