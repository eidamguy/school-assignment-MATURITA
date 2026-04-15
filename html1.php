<?php
/// Příklad 1. ///
// Vytvořte jednoduchou HTML stránku s formulářem pro zadání jména a e-mailu
// Po odeslání formuláře vypište zadané údaje na stránku
// Formulář vycentrujte na stránce a odělte vstupy tak aby vizuálně nesplívaly.
?>

<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .center-div {display: flex; justify-content: center}

        .top-offset-big {margin-top:10%;}
        .top-offset {margin-top:5%;}
        .bottom-offset {margin-bottom:5%;}

        label {font-family:sans-serif}

        #submit {background:#171844; width:100px; height: 30px; border-radius: 10px; color:white; font-size: 16px; border:none;}
        #submit:hover {background:#3C3C66;}
    </style>
</head>
<body>

    <div class="center-div">

        <img src="educanet-logo-news.png" alt="logo školy">

    </div>

    <div class="center-div">

        <div class="center-div top-offset">
            <form action="" method = "POST">
                <label for="username">Uživatelské jméno</label>
                <br>
                <input type="text" name="username" id="username" class="bottom-offset top-offset">
                <br>
                <label for="email">Email</label>
                <br>
                <input type="email" name="email" id="email" class="top-offset">
                <br>
                <div class="center-div">
                    <input type="submit" class="top-offset-big" id="submit">
                </div>
                
            </form>
        </div>

    </div>

    <?php
        if(isset($_POST)){
            if(isset($_POST["username"])){echo($_POST["username"]."<br>");}
            if(isset($_POST["email"])){echo($_POST["email"]."<br>");}
        }
    ?>
</body>
</html>