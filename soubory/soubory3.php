<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="get">
        <label for="inp">Zde piš něco</label>
        <input type="text" name="inp" id="inp">
    </form>

    <?php
        function main(){
            if( ! isset($_GET)){return;}

            $contents = file_get_contents("soubory3_output.csv");
            file_put_contents("soubory3_output.csv", $contents."\n".$_GET["inp"]);
        }
        main();
    ?>

</body>
</html>