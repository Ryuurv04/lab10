<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laboratorio 10.1</title>
</head>
<body>
    <?php
    require_once("votos.php");
    if(array_key_exists('enviar', $_POST)){
        print ("<h1> Encuesta. voto registrado<h1>\n");

        $obj_votos=new votos();
        $result_votos=$obj_votos->listar_votos();

        foreach ($result_votos as $result_voto){
            $votos1 =$result_voto['votos1'];
            $votos2 = $result_voto['votos2'];
        }

        $voto=$_REQUEST['voto'];
        if ($voto=="si"){
            $votos1=$votos1+1;}
        elseif($voto=="no"){
            $votos2=$votos2+1;}

        $obj_votos=new votos();
        $result=$obj_votos->actualizar_votos($votos1,$votos2);
        if($result){
            print("<p>Su voto ha sido registrado. Gracias por participar</p>\n");
            print("<A HREF='lab102.php'> Ver Resultado</A>\n");
        } 
        else{
            print("<A HREF='lab101.php'> Error al actualizar su voto</A>\n");
        }   
    }
    else{
        
    ?>
    <h1>Encuesta</h1>
    <p>¿cree ud. que el precio de la vivienda seguira subiendo al ritmo actual</p>
    
    <form action="lab101.php" method="POST">
        <input type="radio" name="voto" value="si">Si<BR>
        <input type="radio" name="voto" value="no">No<BR>
        <input type="submit" value="votar" name="enviar">
    </form>
    
    <?php
        }
    ?>
</body>
</html>