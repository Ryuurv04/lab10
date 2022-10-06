<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10.2</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body>
    <h1>Encuesta. Resultado de la votación</h1>

    <?php
        require_once("votos.php");
        $obj_votos=new votos();
        $result_votos=$obj_votos->listar_votos();

        foreach($result_votos as $result_voto){
            $votos1=$result_voto['votos1'];
            $votos2=$result_voto['votos2'];
        }
        $totalVotos=$votos1+$votos2;

        print("<TABLE>\n");
        print("<TR>\n");
        print("<TH>Respuesta</TH>\n");
        print("<TH>Votos</TH>\n");
        print("<TH>Porcentaje</TH>\n");
        print("<TH>Representacion grafica</TH>\n");
        print("</TR>\n");

        $porcentaje=round(($votos1/$totalVotos)*100/2);
        print("<TR>\n");
        print("<TD CLASS='izquierda'>Si</TD>\n");
        print("<TD CLASS='derecha'>$votos1</TD>\n");
        print("<TD CLASS='derecha'>$porcentaje %</TD>\n");
        print("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 ."'></TD>\n");     
        print("</TR>\n");

        $porcentaje=round(($votos2/$totalVotos)*100/2);
        print("<TR>\n");
        print("<TD CLASS='izquierda'>No</TD>\n");
        print("<TD CLASS='derecha'>$votos2</TD>\n");
        print("<TD CLASS='derecha'>$porcentaje %</TD>\n");
        print("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 ."'></TD>\n");     
        print("</TR>\n");

        print("</TABLE>\n");
        print("<p>Numero total de votos emitidos: $totalVotos</p>\n");
        print("<p><A HREF='lab101.php'>Pagina de votacion</A></p>\n");
    ?>
</body>
</html>