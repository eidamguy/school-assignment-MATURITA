<?php
/// Cykly a Pole ///
// Trénujte cykly a pole: for, while, foreach a rekurzy
// Pokud rekurzy neovládám dá se napsat cyklem, se sníženým ohodnocením.

/// Ukázkové řešení: ///
// Vytvořte funkci, která vypíše Faktorial čísla (n!) pomocí rekurze.
// Faktoriál čísla n je součin všech celých čísel od 1 do n.
// Např.: 5! = 5 * 4 * 3 * 2 * 1 = 120

$vstup = 5;

function faktorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        // Rekurze - volání funkce sama sebe
        return $n * faktorial($n - 1);
    }
}

echo "Faktorial čísla $vstup je: " . faktorial($vstup) . "<br>";

// Pomocí cyklu
function faktorialCyklem($n) {
    $faktorial = 1;
    for ($i = 1; $i <= $n; $i++) {
        $faktorial *= $i;
    }
    return $faktorial;
}
echo "Faktorial čísla $vstup je: " . faktorialCyklem($vstup) . "<br>";


/// Příklad 1. ///
// Vypočítejte součet čísel od 1 do N pomocí cyklu
// Např.: 5 -> 1 + 2 + 3 + 4 + 5 = 15
$n = 5;
$ans = 0;

for ($i = 1; $i <= $n; $i++){
    $ans += $i;}
echo "součet čísel od 1 do N: $ans"."<br>";


/// Příklad 2. ///
// Najděte největší číslo v poli pomocí cyklu
// Např.: [1, 2, 3, 4, 5] -> 5
$array = [1, 2, 3, 4, 5];

$max = $array[0];
foreach ($array as $element){
    if($element>$max){
        $max = $element;
    }
}
echo "největší číslo v poli: $max"."<br>";


/// Příklad 3. ///
// Obrácení řetězce pomocí cyklu
// Např.: "ahoj" -> "joha"
$string = str_split("ahoj");

$new_string = "";
foreach($string as $letter){
    $new_string = $letter.$new_string;
}

echo "Obrácení řetězce pomocí cyklu: $new_string"."<br>";


/// Příklad 4. ///
// Nahraďte funkci explode pomocí vlastní funkce, která rozdělí řetězec na pole podle zadaného oddělovače.
// Např.: "ahoj,jak,se,máš" -> ["ahoj", "jak", "se", "máš"]


// řešeni bez replace funkcí:
function explode2($sep, $string){
    $return_array = [];
    $offset = 0;// slice start index
    $sep_len = count(str_split($sep));// character length of separator
    $string_array = str_split($string);// string seperated to array by each letter

    foreach($string_array as $i => $letter){

        // check next N letters
        $check_sep_array = [];
        for($y = 0; $y < $sep_len; $y++){
            if (! isset($string_array[$i+$y])){
                break;}
            $check_sep_array[] = $string_array[$i+$y];}
        $check_sep = implode($check_sep_array);

        if($check_sep != $sep){continue;}
        
        // nalezen sep vvv
        $length = $i - $offset;
        $return_array[] = implode(array_slice($string_array, $offset, $length));
        $offset = $i + $sep_len;// set new start index offset for next slice
    }
    // for last part
    $length = $i - $offset +1;
    $return_array[] = implode(array_slice($string_array, $offset, $length));
    return $return_array;}


// řešení s eval (není optimální kvuli => '    ale podstatně kratší)
function explode3($sep, $string){
    $stringarray = "\$arr = ['".str_replace($sep, "', '", $string)."'];";// example => "$arr = ['A', 'B', 'C']"
    eval($stringarray);
    return $arr;}

    
echo("explode2: ");
var_dump(explode2("B", "ABBFABBFWAFBABF"));
echo("<br>");

echo("explode3: ");
var_dump(explode3("B", "ABBFABBFWAFBABF"));
echo("<br>");


/// Příklad 5. ///
// Vytvořte funkci, která vypíše malou násobilku pomocí.
// Na každý řádek vypište násobení od 1 do 10 postupně inkrementujícím číslem.
// Výstup bude tohoto formátu (body navíc za vypsání do HTMl tabulky):
/*
1 2 3 4 ... 10
2 4 6 8 ... 
3 6 9 12 ...
4 8 12 16 ...
...
*/

echo "Příklad 5: zvlašť v souboru";
echo("<br>");



/// Příklad 6. ///
// Program, bude brát číslo a vypisovat jeho dělitele
// Algoritmus postupně projde čísla od 1 do N a pokud je dělitel, vypíše ho
// Např.: Číslo 12 dělí čísla: 1, 2, 3, 4, 6, 12


// delší řešení s lehkou optimalizaci
function delitel1($num){
    $dividers = [1]; // N je vždy dělitelné 1, takze neni nutne zbytečně řešit v loopu
    $max_div = round($num/2, $mode=PHP_ROUND_HALF_UP); // N nikdy nebude dělitelne čísly v intervalu (N*1/2; N), takže stačí zkoušet polovinu čísel 
    for($i=2; $i<=$max_div; $i++){
        if($num % $i == 0){
            $dividers[] = $i;}}
    $dividers[] = $num;
    foreach($dividers as $div){
        echo($div);
        echo("<br>");
    }
}


//kratší řešení
function delitel2($num){
    for($i=1; $i<=$num; $i++){
        if($num%$i==0){
            echo("$i<br>");}}}


echo("dělitelé (příklad 6):<br>");
echo(delitel1(12));
echo("<br>");
echo("dělitelé (příklad 6):<br>");
echo(delitel2(12));
echo("<br>");


/// Příklad 7. ///
// Vytvořte funkci, která najde nejmenší číslo v poli pomocí cyklu a to číslo odstraní.
// Např.: [1, 2, 3, 4, 5] -> [2, 3, 4, 5]


// řešení 1 (odstraní první prvek s min hodnotou), delší zápis
function remove_min1($array){
    $min_index = array_keys($array)[0];
    $min_val = $array[$min_index];

    foreach($array as $i => $val){
        if($val < $min_val){
            $min_val = $val;
            $min_index = $i;}}

    unset($array[$min_index]);
    return $array;}

// zkraceny zapis
function remove_min2($array){
    unset($array[array_search(min($array), $array)]);
    return $array;}



// druhe řešení (odstraní všechny prvky s min hodnotou)
function remove_min3($array){
    $new_array = [];
    foreach($array as $element){
        if($element != min($array)){
            $new_array[] = $element;}}
    return $new_array;}

$arr = [1, 2, 1, 4, 5];
var_dump($arr);
echo("<br>");
$arr = remove_min1($arr);
var_dump($arr);
echo("<br>");
$arr = remove_min1($arr);
var_dump($arr);
echo("<br>");


$arr = [1, 2, 1, 4, 5];
var_dump($arr);
echo("<br>");
$arr = remove_min2($arr);
var_dump($arr);
echo("<br>");
$arr = remove_min2($arr);
var_dump($arr);
echo("<br>");


$arr = [1, 2, 1, 4, 5];
var_dump($arr);
echo("<br>");
$arr = remove_min3($arr);
var_dump($arr);
echo("<br>");
$arr = remove_min3($arr);
var_dump($arr);
echo("<br>");


/// Příklad 8. ///
// Vytvořte funkci, která velikost trojrozměrného vektoru.
// Funkce bere vektor ve formě pole [x, y, z] a vrátí jeho délku.
// Velikost vektoru je dána pythagorovým vzorcem:
//   |(x, y, z)|  =  √(x^2 + y^2 + z^2)
// *pro info: V matematice zápis pro vektor používá kulaté závorky namísto hranatých jako u polí

// Výstup.: Velikost vektoru (3, 4, 5) je rovna 7.071

function get_vector_len($lengths){
    $total = 0;
    foreach($lengths as $len){
        $total += $len*$len;}
    return sqrt($total);}

function say_vector_len($lengths){
    $str_lengths = implode(", ",$lengths);
    $ans = round(get_vector_len($lengths), 3);
    echo("Velikost vektoru ($str_lengths) je rovna $ans");
}

say_vector_len([3, 4, 10]);