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

echo("1.2 l = ".prevod_jednotek(1.2, "l", "ml")." ml\n\n");

/// PŘÍKLAD 3. ///

// Napište program, který bude kontrolovat, zda zadané číslo je prvočíslo
// Vstupní proměnná musí být celé číslo větší než 1
// Pokud není číslo dělitelné všemi čísli pod ním vypiš "Číslo je prvočíslo"
// Pokud není, vypiš "Číslo není prvočíslo"
// Pokud vstup není validní, vypiš chybovou hlášku



function is_prime($num){
    if(gettype($num)!='integer'){throw new Exception("hodnota \$num musí být integer");}
    if($num <= 1){throw new Exception("hodnota \$num musí být větší než 1");}

    for($i=2; $i<$num; $i++){
        if($num % $i ==0){return false;}}
    return true;}
        
function main2(){
    $num = 13;// <<<- vstup
    if(is_prime($num)){
        echo("Číslo je prvočíslo\n\n");}
    else{
        echo("Číslo není prvočíslo\n\n");}}

main2();

/// PŘÍKLAD 4. ///

// Vlak jezdí každou 45 minutu v hodině. Na základě vstupní hodnoty času určete, kolik minut zbývá od posledního a do následujícího vlaku 
// Vstupní proměná bude čas ve formátu HH:MM (24 hodinový formát)
// Pokud je čas validní, spočítek kolik minut zbývá do dalšího vlaku a o kolik minut ujel poslední vlak.
// Pokud čas není validní, vypiš chybovou hlášku



function train_check($time){//      $time format -> HH:MM nebo H:MM      returns ["previous", "next"]
    $array = explode(":",$time);
    $h = $array[0];
    $m = $array[1];

    if(is_numeric($m) === false || is_numeric($h) === false){
        throw new Exception("hodiny a minuty musí být číslo");}
    
    $h = (int) $h; $m = (int) $m;

    if($h>24 || $m >59){throw new Exception("neplatný formát $h:$m");}

    $train_time = 45;// minutes

    if($m > $train_time){
        return [
            "previous" => $m-$train_time,
            "next" => 60+$train_time-$m];}
    else{
        return [
            "previous" => $m-$train_time+60,
            "next" =>$train_time-$m];}}

function main3($time){
    $ans = train_check($time);
    echo ("vlak odjel před ".$ans["previous"]." minutami\n");
    echo ("další vlak přijede za ".$ans["next"]." minut\n\n");}

main3("10:32");


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



function quadratic_echo($a, $b, $c){// nevrací, jenom dělá echo, trochu nepraktické ale splňuje zadání (lenost)
    //
    //  D = b² - 4ac
    //  x1,x2 = (-b ± √(D)) / 2a
    //
    // $a nemůže být 0 because division by zero -> rovnice nemá x^2 takže není kvadratická
    // $D nemůže být záporné číslo protože sqrt(-|N|) nejde v oboru R

    $nums = [$a, $b, $c];
    foreach($nums as $num){
        if( ! in_array(gettype($num), ['integer', 'float'])){throw new Exception("\$a, \$b, \$c must all be numbers");}}

    if($a == 0){echo("rovnice není kvadratická (a = 0)\n\n");return;}
    $determinant = $b*$b - 4*$a*$c;

    if($determinant < 0){echo("rovnice nemá řešení v oboru reálných čísel (d < 0)\n\n");return;}
    if($determinant == 0){
        $ans = (-$b) / (2*$a);
        echo("rovnice má právě jedno řešení: x = $ans\n\n");return;}

    $sqrt = sqrt($determinant);
    $ans1 = (-$b + $sqrt) / (2*$a);
    $ans2 = (-$b - $sqrt) / (2*$a);

    echo("rovnice má dvě řešení: x1 = $ans1, x2 = $ans2\n\n");return;}

quadratic_echo(-2,1,4);



/// PŘÍKLAD 6. ///
// Vytvořte program, který bude zjišťovat slevu na jízdné podle věku a stavu studenta       // stavu studenta LMAO
// Vstupní proměnné budou věk (int) a stav studenta (bool)                                  // STATUS NE STAV 1!1!1!1
// Podle následujících pravidel vypiš slevu:
//    0-6 let = 100% sleva
//    7-18 let = 50% sleva
//    18-26 let a zároveň student = 25% sleva                 // co když je někomu 19 a neni student ??? musel jsem to trochu předělat vvv
//    27-60 let = 0% sleva
//    60+ let = 50% sleva
// *validuj vstupy a pokud je věk menší než 0 nebo větší než 120, vypiš "Neplatný věk"


    /* cestující : podmínka (student:1 nebo ne:0)
    1 : 0
    0 : 1 XXXX
    1 : 1
    0 : 0 */

function get_sale($age, $is_student){
    
    try{$age = (int) $age;}
    catch(Exception $e){throw new Exception("age must be convertable to int");}

    try{$is_student = (bool) $is_student;}
    catch(Exception $e){throw new Exception("is_student must be convertable to bool");}

    if($age<0 || $age>120){
        echo("věk musí být mezi 0 a 120 (Neplatný věk)");
        return NAN;}

    $sales = [
    // MinAge_MaxAge_MustBeStudent => sale%
        '0_6_0' => 100,
        '7_18_0' => 50,
        '19_26_1' => 25,
        '19_60_0' => 0,
        '60_120_0' => 50];

    foreach($sales as $criteria => $amount){
        $array_criteria = explode("_",$criteria);// [0: MinAge, 1: MaxAge, 2: MustBeStudent]
        if($array_criteria[0] > $age || $age > $array_criteria[1]){continue;}
        // splňuje věkove kriterium vvv
        if($is_student == false && $array_criteria[2] == true){continue;}
        // splňuje obě kritéria vvv
        return $amount;}
    return 0;}// pokud sleva není v $sales tak sleva 0%

function main4(){
    $age = 19;
    $status_student = false;
    $sale = get_sale($age, $status_student);
    if (gettype($sale)=='integer'){
        echo ("cestující ve věku $age let, který ".[true => "je", false => "není"][$status_student]." student, má nárok na slevu $sale %");}}

main4();