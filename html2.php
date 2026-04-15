<?php
/// Příklad 2. ///
// Sestavte layout pro jednoduchou webovou stránku
// Stránka by měla mít hlavičku, menu, hlavní obsah a patičku
// Tlačítka meny budou rovnoměrně rozložena a budou mít hover efekt
// Hlavní obsah bude mít dvě sekce vedle sebe (obrázek 30% a text 70%)
// Patička bude mít tmavé pozadí a bílý text
// Všechny prvky budou mít padding a margin pro lepší vzhled
// Použijte Flexbox pro rozložení prvků podle potřeby
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {font-family:sans-serif}
        header {background-color:lightgray}
        .center-div {display:flex; justify-content:center}
        .left-div {display:flex; justify-content: flex-start}
        .menu-div {display:flex; justify-content: space-evenly; align-items: center}
        .menu-button {height:30px; margin:15px; border-radius:15px; border:none; width:50%; font-size: 15px;}
        .header-button {height:40px; margin-top:15px; margin-bottom:15px; border-radius:15px; border:none; width:20%; font-size: 20px; background: #A9D378}
        .header-button:hover {background: #94B768}
    </style>
</head>
<body>
    <header class="center-div">
        <div class="center-div" style="width:25%;">
            <h2>Educanet Brno</h2>
        </div>
        <div class="center-div" style="width:75%; justify-content:space-evenly;">
            <button class="header-button">Home</button>
            <button class="header-button">Nabídka</button>
            <button class="header-button">Kontakt</button>
    </header>

    <div class="center-div">
        <h1>EDUCANT BNO</h1>
    </div>

    <div class="center-div">

        
        <div class="center-div" style="width:15%; padding:15px">
            <div style="background:#A9D378; display:flex; justify-content: space-evenly; flex-direction:column; padding=0; width:100%;">
                <div class="left-div"><button class="menu-button">Home</button><h4>????</h4></div>
                <div class="left-div"><button class="menu-button">Nabídka</button><h4>něco</h4></div>
                <div class="left-div"><button class="menu-button">Kontakt</button><h4>tel, email</h4></div>
                <div class="left-div"><button class="menu-button">NĚCO</button><h4>něco</h4></div>
            </div>
        </div>
    
        <div class="center-div" style="width:85%">
            <div style="width: 70%; padding:30px;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem ullam minima sed dolorem ducimus neque nesciunt accusamus atque, error eos nulla nam odio provident repellat tempore aspernatur. Mollitia, voluptas?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem ullam minima sed dolorem ducimus neque nesciunt accusamus atque, error eos nulla nam odio provident repellat tempore aspernatur. Mollitia, voluptas?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem ullam minima sed dolorem ducimus neque nesciunt accusamus atque, error eos nulla nam odio provident repellat tempore aspernatur. Mollitia, voluptas?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem ullam minima sed dolorem ducimus neque nesciunt accusamus atque, error eos nulla nam odio provident repellat tempore aspernatur. Mollitia, voluptas?</p>
            </div>
            <div style="width: 30%; padding:30px;">
                <img src="educanet-logo-news.png" alt="obrázek educanet logo">
            </div>
        </div>

    </div>



    <div class="center-div">    
        <div class="center-div" style="width:85%">
            <div style="width: 30%; padding:30px;">
                <img src="educanet-logo-news.png" alt="obrázek educanet logo">
            </div>
            <div style="width: 70%; padding:30px;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem ullam minima sed dolorem ducimus neque nesciunt accusamus atque, error eos nulla nam odio provident repellat tempore aspernatur. Mollitia, voluptas?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem ullam minima sed dolorem ducimus neque nesciunt accusamus atque, error eos nulla nam odio provident repellat tempore aspernatur. Mollitia, voluptas?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem ullam minima sed dolorem ducimus neque nesciunt accusamus atque, error eos nulla nam odio provident repellat tempore aspernatur. Mollitia, voluptas?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quidem ullam minima sed dolorem ducimus neque nesciunt accusamus atque, error eos nulla nam odio provident repellat tempore aspernatur. Mollitia, voluptas?</p>
            </div>
        </div>

    </div>



    <br><br><br><br><br><br><br>

    <footer style="background: #A9D378; padding:30px;">
        <div class = "center-div">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt cum fuga autem alias cumque quam, recusandae animi sit omnis dolorem error eligendi est dolorum excepturi ad quidem! Modi, vitae cumque.
        </div>
        <div class = "menu-div">
            <button class="menu-button">ABC</button>
            <button class="menu-button">ABC</button>
            <button class="menu-button">ABC</button>
            <button class="menu-button">ABC</button>
        </div>
    </footer>
</body>
</html>