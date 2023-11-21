<?php

class Personnage
{
    private $nom;
    private $classe;
    private $attaque;
    private $pv;
    private $forceDuBien;

    public function __construct(string $nom, string $classe, int $attaque, int $pv, bool $forceDuBien)
    {

        $this->nom = $nom;
        $this->classe = $classe;
        $this->attaque = $attaque;
        $this->pv = $pv;
        $this->forceDuBien = $forceDuBien;
    }

    private function calculDegat()
    {
        return $this->pv / 100 * $this->attaque + 1;
    }

    public function afficheDegat()
    {
        echo "Dégats infligés : " . $this->calculDegat() . " dégats. </br>";
    }
}

$perso_01 = new Personnage("Laurent", "Gerrier", 3, 100, true);
$perso_02 = new Personnage("Séverine", "Gerrier", 23, 90, false);
$perso_03 = new Personnage("Lucas", "Archer", 44, 70, false);
$perso_04 = new Personnage("Manon", "Princesse", 8, 40, true);

$perso_01->afficheDegat();
$perso_02->afficheDegat();
$perso_03->afficheDegat();
$perso_04->afficheDegat();
