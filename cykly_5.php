
<script>
<?php
function square_table($limit=10){
    echo("<table>");
    for($i=1; $i<=$limit; $i++){
        echo("<tr>");
        for($y=1; $y<=$limit; $y++){
            $num = $i*$y;
            echo("<td>$num</td>");}
        echo("</tr>");
    }
    echo("</table>");
}
?>
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {width: 10%}
        tr:nth-child(even) {background-color: #D6EEEE;}
    </style>
</head>
<body>

<table></table>
<?php square_table()?>

</body>
</html>