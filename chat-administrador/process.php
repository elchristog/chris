<?php
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////Traer datos de facebook////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
    session_start(); 
    session_write_close();

    $function = $_POST['function'];
    
    $log = array();
    
    switch($function) {
    
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////Funcion que trae el ultimo chat////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
    	 case('getState'):
        //esta variable nombreChatUsuario crea un archivo de char a cada persona y el nombre del archivo es su id de facebook
         $nombreChatUsuario=$_SESSION['FBID'];
        	 if(file_exists($nombreChatUsuario)){
               $lines = file($nombreChatUsuario);
        	 }
             $log['state'] = count($lines); 
        	 break;	



    	////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////Funcion que actualiza cada x segundos el chat////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
    	 case('update'):
        	$state = $_POST['state'];//cuando lo quito trae toda la historia de los chats
            $nombreChatUsuario=$_SESSION['FBID'];
        	if(file_exists($nombreChatUsuario)){//cuando lo quito no trae nunca nada al chat, ni del usuario ni dealejandra
        	   $lines = file($nombreChatUsuario);
        	 }
        	 $count =  count($lines);
        	 if($state == $count){
        		 $log['state'] = $state;//cuando lo quito trae toda la historia de los chats
        		 $log['text'] = false;//cuando lo quito todo sigue igual
        		 
        		 }
        		 else{
        			 $text= array();
        			 $log['state'] = $state + count($lines) - $state;
        			 foreach ($lines as $line_num => $line)
                       {
        				   if($line_num >= $state){
                         $text[] =  $line = str_replace("\n", "", $line);//cuando lo quito no trae nunca nada al chat, ni del usuario ni dealejandra
        				   }
         
                        }
        			 $log['text'] = $text; 
        		 }
        	  
             break;
    	 


        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////Funcion que se ejecuta apenas la persona envia su mensaje////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
    	 case('send'):
		 // $nickname = htmlentities(strip_tags($_POST['nickname'])); esta parte es para la clave del chat de administrador a nisiquiera solo necesito que deje entrar solo al idi mio y de la flaca
          //aca traigo el nombre de la persona de facebook y selecciono la primer palabra
          $nickname = $_SESSION['FULLNAME'];
          $primerNombre = str_word_count($nickname,1);
          $nickname =  $primerNombre[0];



          $nombreChatUsuario=$_SESSION['FBID'];
			 $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			  $message = htmlentities(strip_tags($_POST['message']));
		 if(($message) != "\n"){
        	
			 if(preg_match($reg_exUrl, $message, $url)) {
       			$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
				} 
			 
        	

        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////Muestro en pantalla lo que la persona escribio////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        	 fwrite(fopen($nombreChatUsuario, 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");
            
            





































































































//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////Solo editar de aca a abajo//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                $comentario=$message;
                $nombre=$nickname;
                $nombreChatUsuario=$_SESSION['FBID'];
                $correoUsuario=$_SESSION['EMAIL'];

                



                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////Limpiando el texto////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                function limpiaTexto($comentario) {
                //esta funcion limpia un texto quitandole caracteres extraños, mayustculas y tildes. Asi el algoritmo puede encontrar palabras que dicen lo mismo y crear frecuencias
                $comentarioSinSimbolos = str_replace(str_split('\\/:*¿"<>|'), '', $comentario);
                //echo $comentarioSinSimbolos;


                ////////Convertir a minusculas///////////////////
                $comentarioSinMayusculas=str_replace("*","",$comentarioSinSimbolos);                
                $comentarioSinMayusculas=str_replace("Ã±","n",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("á","a",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("é","e",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("í","i",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("ó","o",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("ú","u",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("ñ","n",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("Ã±","n",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("&iacute;","i",$comentarioSinMayusculas);
                //echo $comentarioSinMayusculas

                $comentarioCorregido=$comentarioSinMayusculas;
                return $comentarioCorregido;
                }



                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////Conectando a la base de datos////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
            
               
  
                //me conecto a la base de datos
                $servername='localhost';
                $username='taita923_chris';
                $password='mantarraya1';
                $dbname='taita923_datosPersonas';
                $conn= new mysqli($servername,$username,$password,$dbname);
                $connection=@mysql_connect($servername,$username,$password);






                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////Cada vez que la persona escribe 9meses busca y le muestra una converzacion que necesita respuesta, si no hay le dice que ya acabo////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////


                $comentarioLimpio=limpiaTexto($comentario); 
                

                //traigo la primer converzacion que no tiene respuesta, eso sucede al escribir 9meses
                if(substr_count($comentarioLimpio, '9meses')==1 or substr_count($comentarioLimpio, '9m')==1 or substr_count($comentarioLimpio, '9mses')==1 or substr_count($comentarioLimpio, '9mees')==1 or substr_count($comentarioLimpio, '9mes')==1){

                            $conversacionVacia=mysql_query("SELECT * FROM taita923_datosPersonas.converzaciones9meses  WHERE respuestaAComentario is null or respuestaAComentario='' limit 1");
                            //echo $conversacionVacia;

                            if (!$conversacionVacia) {
                            echo 'Could not run query: ' . mysql_error();
                            exit;
                            }

                            $conversacionVaciaCalculado=mysql_fetch_row($conversacionVacia);
                            //ya tengo el vector de la primer conversacion vacia que aparece


                        //si no hay ninguna vacia ya termino y le informa
                        if($conversacionVaciaCalculado[0]=='')
                        {
                            $aleatrorio=rand(2,9);
                            sleep($aleatrorio);
                            fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'No hay conversaciones vacias, ¡Descansa!') . "\n");

                        }
                        else//si si hay frases que necesitan respuesta
                        {
                            $aleatrorio=rand(2,9);
                            sleep($aleatrorio);

                            //cuento que tantas conversaciones tiene esa persona antes de esta que necesita respuesta
                            
                            $conversacionHistoricaCantidad=mysql_query("SELECT count(id) FROM taita923_datosPersonas.converzaciones9meses  WHERE id<".$conversacionVaciaCalculado[0]." and idUsuario=".$conversacionVaciaCalculado[1]."");
                            if (!$conversacionHistoricaCantidad) {
                             echo 'Could not run query: ' . mysql_error();
                             exit;
                            }

                            $conversacionHistoricaCantidadCalculado=mysql_fetch_row($conversacionHistoricaCantidad);

                            //si tiene mas de 10 historicas trae maximo las 10 ultimas
                            if($conversacionHistoricaCantidadCalculado[0]>10)
                            {
                                $conversacionHistoricaCantidadCalculado[0]=10;
                            }






                            $conversacionPasadaId[0]=$conversacionVaciaCalculado[0];
                            
                            //ahora que se cuantas conversaciones anteriores hay, traigo sus id y los pongo en un vector
                            for ($i = 1; $i <= $conversacionHistoricaCantidadCalculado[0]; $i++){

                            $conversacionHistoricaId=mysql_query("SELECT id FROM taita923_datosPersonas.converzaciones9meses  WHERE id<".$conversacionPasadaId[$i-1]." and idUsuario=".$conversacionVaciaCalculado[1]." order by id desc limit 1");
                            if (!$conversacionHistoricaId) {
                             echo 'Could not run query: ' . mysql_error();
                             exit;
                            }

                            $conversacionHistoricaIdCalculado=mysql_fetch_row($conversacionHistoricaId);


                            $conversacionPasadaId[$i]=$conversacionHistoricaIdCalculado[0];

                            //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'Su historial es: '.$conversacionPasadaId[$i]) . "\n");
                          
                            }







                            //ya tengo los id de las converzaciones anteriores de la persona, ahora las uno en un solo srting

                            $conversacionHistoricaUnida='';
                            
                            for ($i = $conversacionHistoricaCantidadCalculado[0]+1; $i >= 2; $i--){

                            //SELECT comentario FROM `converzaciones9meses` WHERE `id`<5 and `idUsuario`=10153041577179080 order by `id` desc limit 10 
                            $conversacionHistorica=mysql_query("SELECT comentario FROM taita923_datosPersonas.converzaciones9meses  WHERE id=".$conversacionPasadaId[$i-1]." and idUsuario=".$conversacionVaciaCalculado[1]." order by id desc limit 1");
                            //echo $conversacionHistorica;

                            if (!$conversacionHistorica) {
                            echo 'Could not run query: ' . mysql_error();
                            exit;
                            }

                            $conversacionHistoricaCalculado=mysql_fetch_row($conversacionHistorica);
                           
                            //ya tengo unidas las n conversaciones anteriores
                            $conversacionHistoricaUnida=$conversacionHistoricaUnida.', '.$conversacionHistoricaCalculado[0];


                            }




                            fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $conversacionVaciaCalculado[2].' escribió: '.'<b>'.$conversacionVaciaCalculado[3].'</b>') . "\n");
                            
                            fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'Su historial es: '.$conversacionHistoricaUnida) . "\n");
                           
                            fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", '<b>¿Qué respuesta le das?</b>') . "\n");


                        }




                }




        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////esta parte recibe una frase de la flaca y actualiza la ultima respuesta vacia////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////



                else {
                    //esta parte se encarga de llenar las respuestas vacias con lo que la flaca escriba




                            $conversacionVacia=mysql_query("SELECT * FROM taita923_datosPersonas.converzaciones9meses  WHERE respuestaAComentario is null or respuestaAComentario='' limit 1");
                            //echo $conversacionVacia;

                            if (!$conversacionVacia) {
                            echo 'Could not run query: ' . mysql_error();
                            exit;
                            }

                            $conversacionVaciaCalculado=mysql_fetch_row($conversacionVacia);
                            //ya tengo el vector de la primer conversacion vacia que aparece


                        //si no hay ninguna vacia ya termino y le informa
                        if($conversacionVaciaCalculado[0]=='')
                        {
                            $aleatrorio=rand(2,9);
                            sleep($aleatrorio);
                            fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'No hay conversaciones vacias para actualizar, ¡Descansa!') . "\n");

                        }
                        else{




                            //aca subo la respuesta a esa frase y listo
                                $sql="UPDATE taita923_datosPersonas.converzaciones9meses SET respuestaAComentario='".$comentarioLimpio."' WHERE id=".$conversacionVaciaCalculado[0]."";
                                if($conn->query($sql)==TRUE){}
                                else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;


                            
                         //Espera y entega la respuesta
                            $aleatrorio=rand(2,9);
                            sleep($aleatrorio);
                            fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", "¡listo!") . "\n");

                       









                        }


                    }








//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////Solo editar de aca a arriba//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////













		 }
        	 break;
    	
    }
    
    echo json_encode($log);

?>