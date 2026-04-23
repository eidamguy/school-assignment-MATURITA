<?php
/// Objektové programování (OOP) ///

// Ukázkové řešení: //
// Vytvořte třídu "Auto" s vlastnostmi "značka", "barva" a "počet kol" (použijte zapouzdření a dodžujte zásady OOP)
// Vytvořte metodu "vypsatInfo", která vypíše informace o autě  
// Vytvořte meodu "zmenitBarvu", která změní barvu auta
// Vytvořte instanci třídy "Auto" a zavolejte metodu "vypsatInfo"

class Auto {
    // Vlastnosti
    private $znacka;
    private $barva;
    private $pocetKolu;

    /// Konstruktor - zavolaný při vytvoření instance
    function __construct($znacka, $barva, $pocetKolu)
    {
        // Sestavujeme zde objekt z příchozích hodnot
        $this->znacka = $znacka;
        $this->barva = $barva;
        $this->pocetKolu = $pocetKolu;
    }

    // Metoda pro změnu barvy
    public function zmenitBarvu($novaBarva) {
        $this->barva = $novaBarva;
    }

    // Metoda pro výpis informací
    public function vypsatInfo() {
        echo "~ $this->znacka <br>";
        echo "Barva: $this->barva <br>";
        echo "Počet kol: $this->pocetKolu";
    }
}

// Vytvoření objektu (instance)
$mojeAuto = new Auto("ŠKODA", "modrá", 4);
$mojeAuto->vypsatInfo();


/// Příklad 1. ///

// Vytvořte třídu "Film" s vlastnostmi "název", "rok" a "hodnocení" (použijte zapouzdření a dodžujte zásady OOP)
// Vytvořte metodu "zmenitHodnoceni", která změní hodnocení filmu
// Vytvořte metodu "vypsatInfo", která vypíše informace o filmu
// Vytvořte instanci třídy "Film" a zavolejte metodu "vypsatInfo"



class Film{
    public function __construct($name, $year, $rating){
        $this->name = $name;
        $this->year = $year;
        $this->rating = $rating;}

    public function zmenitHodnoceni($new_rating){
        $this->rating = $new_rating;
    }

    public function vypsatInfo(){
        echo(
            "jméno: ".$this->name."\n".
            "rok vydání: ".$this->year."\n".
            "hodnocení: ".$this->rating."/10"."\n"
        );}
}

$film = new Film("Shrek", 2001, 5);
$film->vypsatInfo();

/// Příklad 2. ///

// Vytvořte třídu "Student" s vlastnostmi "jméno", "příjmení" a "známky" (použijte zapouzdření a dodžujte zásady OOP)
// Vytvořte metodu "pridatZnamku", která přidá známku do pole známek
// Vytvořte metodu "vypocitatPrumer", která vypočítá průměr známek
// Vytvořte instanci třídy "Student" a zavolejte metodu "vypocitatPrumer"



class Student{
    public function __construct($name, $surname, $grades){
        $this->name = $name;
        $this->surname = $surname;
        $this->grades = $grades;
    }

    public function pridatZnamku($value){
        $this->grades[] = $value;
    }

    public function vypocitatPrumer(){
        $total = 0;
        foreach($this->grades as $grade){
            $total += $grade;
        }
        return $total/count($this->grades);
    }
}


$student = new Student("Pepa", "Novák", [3,4,2,2,2]);//     prumer 2.6
$student->pridatZnamku(5);//                                prumer 3
echo("průměr známek: ".$student->vypocitatPrumer()."\n");

/// Příklad 3. ///

// Vytvořte třídu "Obdelník" s vlastnostmi "šířka" a "výška" (použijte zapouzdření a dodžujte zásady OOP)
// Vytvořte metodu "vypocitatObsah", která vypočítá obsah obdélníku
// Vytvořte metodu "vypocitatObvod", která vypočítá obvod obdélníku
// Vytvořte instanci třídy "Obdelník" a zavolejte metodu "vypocitatObsah" a "vypocitatObvod"



class Rectangle{
    public function __construct($width, $height){
        $this->width = $width;
        $this->height = $height;
    }

    public function get_obvod(){
        return 2 * ($this->width + $this->height);
    }

    public function get_obsah(){
        return $this->width * $this->height;
    }
}

$rect = new Rectangle(10,20);
echo("obsah: ".$rect->get_obsah()."\n");
echo("obvod: ".$rect->get_obvod()."\n");



/// Příklad 4. ///
// Vytvořte třídu "Kalkulacka" se statickou metodou "secti", která sečte dvě čísla
// Vytvořte statickou metodu "odecti", která odečte dvě čísla
// Zavolejte obě metody bez vytváření instance třídy



class Calculator{
    static function secti($a, $b){
        return $a+$b;
    }

    static function odecti($a, $b){
        return $a-$b;
    }
}

echo("součet: ".Calculator::secti(12,13)."\n");
echo("odečtení: ".Calculator::odecti(1,5)."\n");

// Příklad 5. ///
// Třída "Ukol" bude reprezentovat připomínku z úkolovníku, který umožní pracovat s daty a statusem.
// Vlastnosti: datum vyřešení (DateTime), popis úkolu k připomenutí a status vyřešení.
// Metody:
// - kolikCasuZbyva() - vrátí počet dní do vyřešení úkolu
// - vypisStatus() - vypíše "Vyřešeno" pokud odpovídá status, jinak vypíše kolik zbívá dní.
// - vratDatumUdalosti() - vrátí datum konkrétní události
// - nastavitDatum($den, $mesic, $rok) - nastaví datum události podle zadaných promených
// - nastavitVyreseno() - nastaví status na true

class Ukol {
    public function __construct($date, $description){
        $this->date = new DateTime($date);
        $this->description = $description;
        
        $this->update_solved();
    }

    public function is_solved(){
        $now = new DateTime('now');
        if($this->kolikCasuZbyva() > 0){
            return false;}
        return true;
    }

    public function update_solved(){
        $this->solved = false;
        if($this->is_solved()){
            $this->solved = true;
        }
    }

    public function kolikCasuZbyva(){
        return $now::diff($this->date)->days;
    }
}

/// Příklad použití (aktuální datum např: 2025-01-01): ///
$r1 = new Ukol("2025-01-06", "Zkouška z matematiky");
$r2 = new Ukol("2025-01-29", "Posekat zahradu");
$r3 = new Ukol("2025-01-20", "Sestavit plán výletu");
    
$r1->vypisStatus(); // -> "5 dní do vyřešení úkolu - Zkouška z matematiky"

$r2->nastavitDatum(22, 1, 2025); // -> nastaví datum na 2025-01-22
echo $r2->kolikCasuZbyva(); // -> 21
$r2->vypisStatus(); // -> "Zbývá 21 dní do vyřešení úkolu - Posekat zahradu"
$r2->nastavitVyreseno(); 
$r2->vypisStatus(); // -> "Vyřešeno - Posekat zahradu"


// Příklad 6. ~ navazující na Příklad 5. ///
// Třída "Ukolovnik" bude reprezentovat úkolovník, který umožní spravovat více úkolů jako pole objektů.
// Metody:
// - pridatUkol($reminder) - přidá úkol (objekt Reminder) do úkolovníku
// - odstranitUkol($index) - odstraní úkol podle indexu z pole
// - vypsatUkoly($vyresene) - vypíše všechny úkoly, které jsou vyřešené (true) nebo nevyřešené (false) dle parametru

class Ukolovnik {
    // Vlastnosti a metody zde...
}

/// Příklad použití: ///
$ukolovnik = new Ukolovnik();
$ukolovnik->pridatUkol($r1);
$ukolovnik->pridatUkol($r2);
$ukolovnik->pridatUkol($r3);

// Vypíše všechny úkoly
$ukolovnik->vypsatUkoly(false);

$r1->nastavitVyreseno();
// Vypíše pouze vyřešené úkoly (tedy ukol 1)
$ukolovnik->vypsatUkoly(true);

$ukolovnik->odstranitUkol(1); // Odstraní druhý úkol (index 1)




/// Příklad 7. ///
// Příklad základní dědičnosti
// Vytvořte třídu "Zamestnanec" s vlastnostmi "jméno", "příjmení" a "plat"
// Vytvořte metodu "vypisInfo", která vypíše informace o zaměstnanci
// Vytvořte třídu "Manazer", která dědí z třídy "Zamestnanec" a přidá navíc vlastnost "oddělení"
// Vytvořte metodu "vypisInfo", která vypíše informace o manažerovi
// Vytvořte instanci třídy "Manazer" a zavolejte metodu "vypisInfo"