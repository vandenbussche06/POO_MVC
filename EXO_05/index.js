class Personnage {

    constructor(nom, race, age, sexe) {
        this.nom = nom;
        this.age = age;
        this.sexe = sexe;
    }

    getNom() { return this.nom; }
    setNom(nom) { this.nom = nom; }

    getAge() { return this.age; }
    setAge(age) { this.age = age; }

    getSexe() { return this.sexe; }
    setSexe(sexe) { this.sexe = sexe; }

    ditBonjour() {
        console.log("Bonjour " + this.nom);
    }
}

var p1 = new Personnage("VANDENBUSSCHE", 51, "M");
p1.ditBonjour();

p1.setNom("BOUCHEZ");
p1.ditBonjour();