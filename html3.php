<?php
/// Příklad 3. ///
// Na stránce budou poznámky z literatury
// Nastyluje rozbalovací summarizaci pro každou knihu s listem důležitých informací a shrnutím knihy
// Všechny knihy budou mít stejný formát a budou se rozbalovat po kliknutí (<details> a <summary>)

// Příklad Obsahu:
// Romeo a Julie
// - Autor: William Shakespeare
// - Žánr: Drama
// - Rok vydání: 1597
// - Hlavní postavy: Romeo, Julie
// - Důležitá témata: Láska, nenávist, osud
// - Citát: "Láska je jako víno, čím déle zraje, tím je lepší."
//  Shrnutí
//      Romeo a Julie je tragédie o dvou mladých milencích, jejichž láska je odsouzena k neúspěchu kvůli rodinným sporům. Jejich smrt nakonec smíří jejich rodiny.
//      Hlavními tématy jsou láska, nenávist a osud. Příběh ukazuje, jak moc může láska ovlivnit životy jednotlivců a jak tragické následky mohou mít rodinné spory.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p {font-size: 15px; margin-left:40px; margin-top:8px; margin-bottom:8px;}
        .inner-summary {font-size: 15px; margin-left:40px}
        .book-name {color:red; font-size:20px;}
    </style>
</head>
<body>
    <h1>poznámky z literatury</h1>
    <details>
        <summary class="book-name">
            Romeo a Julie
        </summary>
        <p><b>Autor</b>: William Shakespeare</p>
        <p><b>Žánr</b>: Drama</p>
        <p><b>Rok vydání</b>: 1597</p>
        <p><b>Hlavní postavy</b>: Romeo, Julie</p>
        <p><b>Důležitá témata</b>: Láska, nenávist, osud</p>
        <p><b>Citát</b>: "Láska je jako víno, čím déle zraje, tím je lepší."
        <details>
            <summary class="inner-summary">
                <b>Shrnutí:</b>
            </summary>
            <p>Romeo a Julie je tragédie o dvou mladých milencích, jejichž láska je odsouzena k neúspěchu kvůli rodinným sporům. Jejich smrt nakonec smíří jejich rodiny. Hlavními tématy jsou láska, nenávist a osud. Příběh ukazuje, jak moc může láska ovlivnit životy jednotlivců a jak tragické následky mohou mít rodinné spory.</p>
        </details>
    </details>

    <details>
        <summary class="book-name">
            Havran
        </summary>
        <p><b>Autor</b>: Poe</p>
        <p><b>Žánr</b>: ??</p>
        <p><b>Rok vydání</b>: 1234</p>
        <p><b>Hlavní postavy</b>: havran</p>
        <p><b>Důležitá témata</b>: b</p>
        <p><b>Citát</b>: "Nevremore"
        <details>
            <summary class="inner-summary">
                <b>Shrnutí:</b>
            </summary>
            <p>havran brr brr havran 1!1!1!1</p>
        </details>
    </details>

</body>
</html>