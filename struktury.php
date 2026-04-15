<?php
/// Strukturované programování (základní syntax) ///
// Tato cvičení zahrnují algoritmizaci a strukturované programování.
// Práce s posloupnoustí kódu, větvení, funkce a kontrolou vstupů.

// Ukázkové řešení: //

// Validuj jméno a heslo příchozího formuláře s následujícími pravidly:
//  Hesla se musí shodovat a mít alespoň 8 znaků
//  Jméno musí mít alespoň 3 znaky a nesmí obsahovat mezery
//  Pokud je vše v pořádku, vypiš "OK" a přesměruj na jinou stránku
//  Pokud je něco špatně, vypiš chybovou hlášku
$username = "USER";
$pass = "PASS";
$passAgain = "PASS";

$isValid = true;

// Kontrola hesla
if (strlen($pass) < 8) {
    echo "Heslo musí mít alespoň 8 znaků.";
    $isValid = false;
} elseif (!str_contains($pass, '#')) {
    echo "Heslo musí obsahovat hashtag (#)";
    $isValid = false;
}

// Kontrola shody hesel
if ($pass !== $passAgain) {
    echo "Hesla se neshodují.";
    $isValid = false;
}

// Kontrola jména
if (strlen($username) < 3 || str_contains($username, ' ') !== false) {
    echo "Jméno musí mít alespoň 3 znaky a nesmí obsahovat mezery.";
    $isValid = false;
}

if (!$isValid) {
    echo "Omlouváme se, ale došlo k chybě při validaci.\n\n";
} else {
    echo "OK\n\n";
    die();
}


/// PŘÍKLAD 1. ///

// Vstupní číslo musí být validováno, zdali je celé číslo a dělitelné 3 nebo 6
// Vstupní proměná musí být číslo                               
// Číslo musí být větší než 0               
// Číslo nesmí být dělitelná 3 nebo 6    <<< ???? *musí být           
// Pokud je číslo validní, vypiš "OK"
//  Pokud je něco špatně, vypiš chybovou hlášku


function is_num_valid($num){
    $valid = true;
    if(gettype($num) != "integer"){
        return false;}
    if($num <= 0){
        return false;}
    if(!($num%3==0 || $num%6==0)){
        return false;
    }
    return true;}

function main1($num){
    if(is_num_valid($num)){
        echo("OK\n\n");}
    else{echo("číslo není OK\n\n");}
}
main1(10);


/// PŘÍKLAD 2. ///

// Napiště program co bude převádět mezi různými metrickými jednotkami (litry, mililitry, decilitry, hektolitry)
// První proměná bude desetiné číslo
// Druhá proměná bude typ jednotky na vstupu (l, ml, dl, hl)
// Třetí proměná bude typ jednotky na výstupu (l, ml, dl, hl)
// Výstupem bude převedená hodnota a její jednotka  Např. 1.5 l = 1500 ml
// Validujte vstupy jesli odpovídají číselné hodnotě desetiného čísla a jestli je jednotka správná


function prevod_jednotek(int|float $amount, $input_unit, $output_unit){
    if(! is_numeric($amount)){throw new Exception("amount must be integer or float");}
    
    $units = [
        "ml" => 0.001,
        "dl" => 0.1,
        "l" => 1,
        "hl" => 100];

    if(! array_key_exists($input_unit, $units)){throw new Exception("input jednotka musí být jedna z ['ml', 'dl', 'l', 'hl']");}
    if(! array_key_exists($output_unit, $units)){throw new Exception("output jednotka musí být jedna z ['ml', 'dl', 'l', 'hl']");}

    return ($amount / $units[$output_unit]) * $units[$input_unit];}

echo("1.2 l = ".prevod_jednotek(1.2, "l", "ml")." ml");

/// PŘÍKLAD 3. ///

// Napište program, který bude kontrolovat, zda zadané číslo je prvočíslo
// Vstupní proměnná musí být celé číslo větší než 1
// Pokud není číslo dělitelné všemi čísli pod ním vypiš "Číslo je prvočíslo"
// Pokud není, vypiš "Číslo není prvočíslo"
// Pokud vstup není validní, vypiš chybovou hlášku



/// PŘÍKLAD 4. ///

// Vlak jezdí každou 45 minutu v hodině. Na základě vstupní hodnoty času určete, kolik minut zbývá od posledního a do následujícího vlaku 
// Vstupní proměná bude čas ve formátu HH:MM (24 hodinový formát)
// Pokud je čas validní, spočítek kolik minut zbývá do dalšího vlaku a o kolik minut ujel poslední vlak.
// Pokud čas není validní, vypiš chybovou hlášku



/// PŘÍKLAD 5. ///

// Vytvoř program, který spočítá kvadratickou rovnici
// Vstupní proměné budou a, b, c .. počítáme rovnici (ax² + b x + c = 0)
// Postup algortitmu:
//  1. Zjisti zda je vstupní proměná validní (a,b,c musí být číslo)
//  2. Zjisti zda je a != 0
//  3. Spočítej diskriminant (D = b² - 4ac)
//  4. Pokud je D > 0, vypočítej x1 a x2, jinak vypiš "Rovnice nemá reálné řešení"
// Matematické řešení:
//  x1,2 = (-b ± √(b² - 4ac)) / 2a 
//  x1 = (-b + √D) / 2a
//  x2 = (-b - √D) / 2a



/// PŘÍKLAD 6. ///
// Vytvořte program, který bude zjišťovat slevu na jízdné podle věku a stavu studenta
// Vstupní proměnné budou věk (int) a stav studenta (bool)
// Podle následujících pravidel vypiš slevu:
//    0-6 let = 100% sleva
//    7-18 let = 50% sleva
//    18-26 let a zároveň student = 25% sleva
//    27-60 let = 0% sleva
//    60+ let = 50% sleva
// *validuj vstupy a pokud je věk menší než 0 nebo větší než 120, vypiš "Neplatný věk"