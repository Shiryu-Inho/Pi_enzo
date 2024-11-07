<?php
extract($_POST);
   
   if(isset($BT1)) {
       $incluir = ("INSERT INTO `rotas`(`rota`, `Origem`, `Destino`, `Valor`) VALUES ($id,'$origem','$destino',$valor)");
       banco("localhost","root",NULL,"eunapolis",$incluir);
   }
   if(isset($BT2)) {
       $update = "UPDATE `rotas` SET `Valor`= $valor WHERE `Origem` = '$origem' and `Destino` = '$destino'";
      banco("localhost","root",NULL,"eunapolis",$update);
      echo $update;
   }
?>
<html>
    <head>
        
    </head>
    <body>
        <Form action = "Banco.php" method = post>
             ID da rota: <input type = "text" name = "id"> <br/>
             Origem: <input type = "text" name = "origem"> <br/>
             Destino: <input type = "text" name = "destino"> <br/>
             Valor: <input type = "text" name = "valor"> <br/>
             <input type = "submit" value = "Salvar" name = "BT1">
             <input type = "submit" value = "Atualizar" name = "BT2">
            
        </Form>
    </body>
</html>