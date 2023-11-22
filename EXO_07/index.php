<?php

class Bibliotheque
{
    const TYPE_RAD = "RAD";
    const TYPE_FRONTEND = "FRONT-END";
    const TYPE_BACKEND = "BACK-END";

    private $livresRad;
    private $livresFrontEnd;
    private $livresBackEnd;

    public function  __construct()
    {
        $this->livresRad = [];
        $this->livresFrontEnd = [];
        $this->livresBackEnd = [];
    }

    public function ajouterLivre($livre)
    {
        $livres = [
            self::TYPE_RAD => &$this->livresRad,
            self::TYPE_FRONTEND => &$this->livresFrontEnd,
            self::TYPE_BACKEND => &$this->livresBackEnd
        ];

        if (isset($livres[$livre->getType()])) {
            $livres[$livre->getType()][] = $livre;
        }
    }

    public function afficheLivres($categorie)
    {
        $livres = [];

        switch ($categorie) {
            case self::TYPE_RAD:
                $livres = $this->livresRad;
                break;
            case self::TYPE_FRONTEND:
                $livres = $this->livresFrontEnd;
                break;
            case self::TYPE_BACKEND:
                $livres = $this->livresBackEnd;
                break;
            default:
                break;
        }

        foreach ($livres as $livre) {
            echo $livre;
        }
    }
}
class Livre
{
    private $titre;
    private $type;
    private $nbPages;
    private $couleurCouverture;
    private $esTraduitEnAnglais;

    public function __construct(string $titre, string $type, int $nbPages, $couleurCouverture, $esTraduitEnAnglais)
    {
        $this->titre = $titre;
        $this->type = $type;
        $this->nbPages = $nbPages;
        $this->couleurCouverture = $couleurCouverture;
        $this->esTraduitEnAnglais = $esTraduitEnAnglais;
    }

    //* ------------------------------------
    //* DECLARATION DES GETTERS
    //* ------------------------------------

    public function getTitre()
    {
        return $this->titre;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getNbPages()
    {
        return $this->nbPages;
    }
    public function getCouleurCouverture()
    {
        return $this->couleurCouverture;
    }
    public function getEsTraduitEnAnglais()
    {
        return $this->esTraduitEnAnglais == true ? "Oui" : "Non";
    }

    //* ------------------------------------
    //* AFFICHAGE DE L OBJET LIVRE
    //* ------------------------------------

    public function __toString()
    {
        $txt = "Titre : " . $this->getTitre() . "<br>"
            . "Nb Pages : " . $this->getNbPages() . "<br>"
            . "Couleur : " . $this->getCouleurCouverture() . "<br>"
            . "Traduction en anglais : " . $this->getEsTraduitEnAnglais() . "<br>";

        return $txt;
    }
}

$blibliotheque = new Bibliotheque();

$livres = [
    new Livre("DELPHI", "RAD", 1000, 'BLEU', false),
    new Livre("ANGULAR", "FRONT-END", 400, "ROUGE", true),
    new Livre("REACT", "FRONT-END", 300, 'JAUNE', false),
    new Livre("PHP", "BACK-END", 400, "ROUGE", true),
    new Livre("WINDEV", "RAD", 200, 'ROSE', true),
    new Livre("NODE JS", "BACK-END", 400, "ROUGE", true)
];

foreach ($livres as $livre) {
    $blibliotheque->ajouterLivre($livre);
}

$blibliotheque->afficheLivres("FRONT-END");

