<?php

interface Combat
{
    public function infligetDegat();
    public function pertePv();
}
class Jeu
{
    private $nom;
    private $listeHumain;
    private $listeZombie;

    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->listeHumain = [];
        $this->listeZombie = [];
    }

    public function ajoutZombie($zombie)
    {
        $this->listeZombie[] = $zombie;
    }
    public function ajoutHumain($humain)
    {
        $this->listeHumain[] = $humain;
    }

    public function __toString()
    {
        echo "Nom du jeu : " . $this->nom . "</br>";
        echo "Voici les zombies<br>";
        for ($i = 0; $i < count($this->listeZombie); $i++) {
            echo $this->listeZombie[$i];
        }
        echo "Voici les humains<br>";
        for ($i = 0; $i < count($this->listeHumain); $i++) {
            echo $this->listeHumain[$i];
        }
    }
}

abstract class Personnage extends Jeu implements Combat
{
    private $nom;
    private $classe;
    protected $attaque;
    protected $pv;
    private $forceDuBien;

    public function __construct(string $nom, string $classe, int $attaque, int $pv, bool $forceDuBien)
    {
        $this->nom = $nom;
        $this->classe = $classe;
        $this->attaque = $attaque;
        $this->pv = $pv;
        $this->forceDuBien = $forceDuBien;
    }

    abstract protected function calculDegat();

    public function infligetDegat()
    {
        return $this->calculDegat() * 2;
    }
    public function pertePv()
    {
        return $this->pv -=  2;
    }

    public function afficheDegat()
    {
        echo "Dégats infligés : " . $this->calculDegat() . " dégats. </br>";
    }

    public function __toString()
    {
        $txt = "";
        $txt .= "-----------------------------------------<br>";
        $txt .= "Nom : " . $this->nom . '</br>';
        $txt .= "Classe : " . $this->classe . '</br>';
        $txt .= "Attaque : " . $this->attaque . '</br>';
        $txt .= "Pv : " . $this->pv . '</br>';
        $txt .= "Force du bien : " . $this->forceDuBien . '</br>';
        return $txt;
    }
}

class Humain extends Personnage
{
    private $level;

    public function __construct(string $nom, string $classe, int $attaque, int $pv, bool $forceDuBien, int $level)
    {
        parent::__construct($nom, $classe, $attaque, $pv, $forceDuBien);
        $this->level = $level;
    }

    protected function calculDegat()
    {
        return $this->pv / 100 * $this->attaque + 1;
    }

    public function __toString()
    {
        $txt = "";
        $txt .= parent::__toString();
        $txt .= "Level : " . $this->level . '</br>';
        return $txt;
    }

    public function gagneLevel()
    {
        $this->level++;
    }

    public function modifStat($attaque, $pv)
    {
        $this->attaque = $attaque;
        $this->pv = $pv;
        $this->afficheDegat();
        echo "Mes Pv sont de " . $this->pv;
    }
}

class Zombie extends Personnage
{
    private  const DEGATZOMBIE = 20;
    private $vitesse;


    public function __construct(string $nom, string $classe, int $pv, bool $forceDuBien, int $vitesse)
    {
        parent::__construct($nom, $classe, self::DEGATZOMBIE, $pv, $forceDuBien);
        $this->vitesse = $vitesse;
    }

    public function majVitesse($vitesse)
    {
        $this->vitesse += $vitesse;
    }

    protected function calculDegat()
    {
        return $this->attaque;
    }

    public function afficheDegat()
    {
        echo "Je peux infliger " . $this->calculDegat();
    }

    public function __toString()
    {
        $txt = "";
        $txt .= "Zombie en approche</br>";
        $txt .= parent::__toString();
        $txt .= "Vitesse : " . $this->vitesse . '</br>';
        return $txt;
    }
}

$jeu = new Jeu("JEU TEST");

$perso_01 = new Humain("Laurent", "Gerrier", 3, 100, true, 2);
$jeu->ajoutHumain($perso_01);

$perso_02 = new Humain("Séverine", "Gerrier", 23, 90, false, 1);
$jeu->ajoutHumain($perso_02);

$perso_03 = new Humain("Lucas", "Archer", 44, 70, false, 3);
$jeu->ajoutHumain($perso_03);

$perso_04 = new Humain("Manon", "Princesse", 8, 40, true, 2);
$jeu->ajoutHumain($perso_04);

$zombie_01 = new Zombie("Pierre", "Zombie", 8, 40, true, 2);
$jeu->ajoutZombie($zombie_01);
$zombie_01->pertePv();

$zombie_02 = new Zombie("Paul", "Zombie", 8, 40, true, 2);
$jeu->ajoutZombie($zombie_02);

$zombie_03 = new Zombie("Pierrette", "Zombie", 8, 40, true, 2);
$jeu->ajoutZombie($zombie_03);

$zombie_04 = new Zombie("Pauline", "Zombie", 8, 40, true, 2);
$jeu->ajoutZombie($zombie_04);

echo $jeu;
