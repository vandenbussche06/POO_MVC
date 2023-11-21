<?php

class Personnage
{
    private $name;
    private $age;
    private $sexe;

    public function __construct($name, $age, $sexe)
    {
        $this->name = $name;
        $this->age = $age;
        $this->sexe = $sexe;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function ditBonjour()
    {
        echo "C'est moi " . $this->getName();
    }
}

$perso1 = new Personnage("Tya", 22, false);
echo "Nom : " . $perso1->getName() . "</BR>";
$perso1->setName("Titi");
echo "Nouveau nom : " . $perso1->getName() . "</BR>";
$perso1->ditBonjour();
