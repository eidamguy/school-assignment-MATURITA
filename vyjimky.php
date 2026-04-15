<?php
/// Ošetřování chyb ///
//    Trénujte try-catch bloky, throw, a vlastní výjimky (dědíme objekt Exception)

/// Ukázkové řešení: ///
// Vytvočte funkci co se pokusí zapsat do souboru, pokud soubor neexistuje, vyhoďte výjimku.
// Pokud dojde k chybě, zachyťte ji v try-catch bloku a vypište chybovou hlášku.
// Vytvořte vlastní výjimku FileNotFoundException, která vypíše "File not found: <název souboru>".

// Vlastní vyjímka
class FileNotFoundException extends Exception {
    public function __construct($file) {
        parent::__construct("File not found: " . $file);
    }
}

// Funkce pro zápis do souboru
function writeToFile($filename, $content) {
    if (!file_exists($filename)) {
        throw new FileNotFoundException($filename);
    }
    file_put_contents($filename, $content);
}

// Použití funkce a ošetření výjimky
try {
    writeToFile("test.txt", "Hello, World!");
} catch (Exception $e) {
    echo $e->getMessage();
    echo("\n\n");
}



/// Příklad 1. ///
// Vytvořte funkci, která dělá dělení dvou čísel a ošetřuje chybu dělení nulou.
// Pokud dojde k pokusu dělení nulou, vyhoďte výjimku a zachyťte ji v try-catch bloku.
// Vytvořte vlastní výjimku DivisionByZeroException, která vypíše "Dělení nulou není povoleno".

class DivisionByZeroException extends Exception {
    public function __construct(){
        return parent::__construct("Division by zero attempt (Dělení nulou není povoleno)");
    }
}

function div($a, $b){
    if($b == 0){throw new DivisionByZeroException();}
    return $a/$b;
}

function main(){
    $a = 10;
    $b = 0;
    $ans = Null;
    try {$ans = div($a,$b);}
    catch (Exception $e){
        echo($e->getMessage());
        echo("\n\n");}
    echo("ans = $ans");
    echo("\n\n");
}

main();

/// Příklad 2. ///
// Vytvořte funkci, která validuje emailovou adresu.
// Pokud je email neplatný, vyhoďte výjimku a zachyťte ji v try-catch bloku.
// Pro připomenutí tvar emailu je vždy uživatel + zavináč + doména (email@domain.com)
// Vytvořte vlastní výjimku InvalidEmailException, která vypíše "Neplatná emailová adresa".

class InvalidEmailException extends Exception{
    public function __construct($email){
        return parent::__construct("$email is not a valid email address");
    }
}

function validate_email_address($email){
    $parts = explode("@", $email);
    if (count($parts) == 2){// berme že může být právě jedno "@"
        return true;
    }
    throw new InvalidEmailException($email);
}

function main2(){
    // $email =  ... $_POST ...
    $address = 'Filip@Janko.cz';
    $valid = false;

    try{$valid = validate_email_address($address);}
    catch(Exception $e){
        echo($e->getMessage());
        echo("\n\n");
    }

    if($valid){
        echo("adresa '$address' je validní");
    }
    else{
        echo("adresa '$address' není validní");}
}


main2();