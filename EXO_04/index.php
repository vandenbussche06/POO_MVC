<?php
class Voiture
{
    private $marque;
    private $modele;
    private $couleur;
    private $nbPortes;
    private $estElectrique;

    public function __construct(string $marque, string $modele, string $couleur, int $nbPortes, bool $estElectrique)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->nbPortes = $nbPortes;
        $this->estElectrique = $estElectrique;
    }

    //* --------------------------------------------------------
    //* Retourne la marque de la voiture
    //* --------------------------------------------------------

    public function getMarque()
    {
        return $this->marque;
    }

    //* --------------------------------------------------------
    //* Méthode : afficherVoiture
    //* --------------------------------------------------------

    public function afficherVoiture()
    {
        echo "----------------------------------<br>";
        echo "Marque : {$this->marque}<br>";
        echo "Modèle : {$this->modele}<br>";
        echo "Couleur : {$this->couleur}<br>";
        echo "Nb Portes : {$this->nbPortes}<br>";
        $electrique = $this->estElectrique ? 'Oui' : 'Non';
        echo "Eletrique : {$electrique}<br>";
    }
}

$tableau = [];

$v1 = new Voiture("Toyota", "Ryas", "NOIR", 5, true);
$tableau[] = $v1;

$v2 = new Voiture("Toyota", "Risau", "ROUGE", 3, false);
$tableau[] = $v2;

$v3 = new Voiture("Troen", "5C", "ROUGE", 5, true);
$tableau[] = $v3;

for ($i = 0; $i < count($tableau); $i++) {
    $tableau[$i]->afficherVoiture();
}
echo "************************************************<br>";

afficherVoitureMarque($tableau, "Toyota");

//* ----------------------------------------------------------
//* Méthode : Afficher la liste des voiture selon une marque
//* ----------------------------------------------------------

function afficherVoitureMarque($listeVoiture, $marque)
{
    for ($i = 0; $i < count($listeVoiture); $i++) {
        if (strtolower($listeVoiture[$i]->getMarque()) == strtolower($marque)) {
            $listeVoiture[$i]->afficherVoiture();
        }
    }
}
