<?php
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////traigo sus datos de facebook////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    session_start(); 
    session_write_close();
    $function = $_POST['function'];
    $log = array();




    
    switch($function) {
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////traigo el ultimo chat enviado////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
    	 case('getState'):
            //esta variable nombreChatUsuario crea un archivo de chat a cada persona y el nombre del archivo es su id de facebook
             $nombreChatUsuario=$_SESSION['FBID'];
        	 if(file_exists($nombreChatUsuario)){
               $lines = file($nombreChatUsuario);
        	 }
             $log['state'] = count($lines); 
        	 break;	
    	////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////actualizo el chat cada x segundos////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
    	 case('update'):
             //if ($_SESSION['FBID']!=2026380267589823)
                 //{
                    $state = $_POST['state'];//cuando lo quito trae toda la historia de los chats
                // }
        	
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
            ////////////////////////////////////////cuando la persona envia un mensaje se ejecuta todo esto////////////////////////////////////////
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
                ////////////////////////////////////////Imprimo lo que la persona escribio en el chat////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
        	    
                // Ya no me toca imprimir lo que la persona escribio desde aca, ahora lo hago en JS para que no tenga retraso
                //fwrite(fopen('10154655318669080', 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");         

               
                   
                    
                    
                 
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //////////////////////Solo editar de aca a abajo//////////////////////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////Limpiando el texto////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////

                function limpiaTexto($comentario) {
                //esta funcion limpia un texto quitandole caracteres extraños, mayustculas y tildes. Asi el algoritmo puede encontrar palabras que dicen lo mismo y crear frecuencias
                $comentarioSinSimbolos = str_replace(str_split('\\/:*?"<>|.,(){}[]¡!'), '', $comentario);
                //echo $comentarioSinSimbolos;
                ////////Convertir a minusculas///////////////////
                $comentarioSinMayusculas=str_replace("A","a",$comentarioSinSimbolos);
                $comentarioSinMayusculas=str_replace("B","b",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("C","c",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("D","d",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("E","e",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("F","f",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("G","g",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("H","h",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("I","i",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("J","j",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("K","k",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("L","l",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("M","m",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("N","n",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("Ñ","ñ",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("O","o",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("P","p",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("Q","q",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("R","r",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("S","s",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("T","t",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("U","u",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("V","v",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("W","w",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("X","x",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("Y","y",$comentarioSinMayusculas);
                $comentarioSinMayusculas=str_replace("Z","z",$comentarioSinMayusculas);
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
                ////////////////////////////////////////Determino el mensaje de su frase////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                function cuentaTemasCreados() {                  
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////
                    ////////////////////////////////////////Cuento cuantos temas he creado////////////////////////////////////////
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $servername='localhost';
                    $username='taita923_chris';
                    $password='mantarraya1';
                    $dbname='taita923_datosPersonas';
                    $conn= new mysqli($servername,$username,$password,$dbname);
                    $connection=@mysql_connect($servername,$username,$password);
                    //calculo el numero de temas que he creado en la base de datos y asi saber de que tamaño sera el vector de distribucion de la frase
                    //un tema es algo a lo que se refiere lo que la persona dijo en su mensaje, un tema puede ser el dplor de estomago, la pelicula de harry potter, hablar de si mismo, de su papa,.. y una combinacion de advervios, conjunciones,...... para mas informacion revisar el archivo agrega-nuevo-tema en la carpeta chat-administrador
                    $numeroDeTemasEnBase=mysql_query("SELECT count(id) FROM taita923_datosPersonas.temas9meses  WHERE 1");
                    //echo $numeroDeTemasEnBase;
                    if (!$numeroDeTemasEnBase) {
                        echo 'Could not run query: ' . mysql_error();
                        exit;
                    }
                    $numeroDeTemasEnBaseCalculado=mysql_fetch_row($numeroDeTemasEnBase);
                    //cuento el numero de registros en temas y asi podre generar el vector que representa  la frase actual
                    return $numeroDeTemasEnBaseCalculado;
                }




























                function analizaFrecuenciaDeTemasEnLaFrase($comentarioLimpio,$numeroDeTemasEnBaseCalculado) {  
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        ////////////////////////////////////////Para cada tema existente, cuento que tanto se habla de el en la frase///////////////////////////////////////
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        $servername='localhost';
                        $username='taita923_chris';
                        $password='mantarraya1';
                        $dbname='taita923_datosPersonas';
                        $conn= new mysqli($servername,$username,$password,$dbname);
                        $connection=@mysql_connect($servername,$username,$password);
                        //por ejemplo el tema saludar se encuentra cuando la persona usa palabras como hola, buen dia, buenas noches.... y si la frase fue hola buenos dias yo soy chris, el tema saludar tuvo una frecuencia de 2(hola y buenos dias) en la frase
                        for ($i = 1; $i <= $numeroDeTemasEnBaseCalculado[0]; $i++){
                            //aca calculo la frecuencia de UN tema en la frase
                            $temaAAnalisarDistribucion=mysql_query("SELECT * FROM taita923_datosPersonas.temas9meses  WHERE id='".$i."'");
                            //echo $temaAAnalisarDistribucion;
                            if (!$temaAAnalisarDistribucion) {
                                echo 'Could not run query: ' . mysql_error();
                                exit;
                            }
                            $temaAAnalisarDistribucion=mysql_fetch_row($temaAAnalisarDistribucion);
                            $temaAAnalisarDistribucionCalculadoId=$temaAAnalisarDistribucion[0];
                            $temaAAnalisarDistribucionCalculadoCategoria=$temaAAnalisarDistribucion[1];
                            $temaAAnalisarDistribucionCalculadoSubCategoria=$temaAAnalisarDistribucion[2];
                            $temaAAnalisarDistribucionCalculadoPalabraDeReemplazo=$temaAAnalisarDistribucion[3];
                            
                            $temaAAnalisarDistribucionCalculadoPalabrasAsociadas=array("/\b".$temaAAnalisarDistribucion[4]."\b/u","/\b".$temaAAnalisarDistribucion[5]."\b/u","/\b".$temaAAnalisarDistribucion[6]."\b/u","/\b".$temaAAnalisarDistribucion[7]."\b/u","/\b".$temaAAnalisarDistribucion[8]."\b/u","/\b".$temaAAnalisarDistribucion[9]."\b/u","/\b".$temaAAnalisarDistribucion[10]."\b/u","/\b".$temaAAnalisarDistribucion[11]."\b/u","/\b".$temaAAnalisarDistribucion[12]."\b/u","/\b".$temaAAnalisarDistribucion[13]."\b/u","/\b".$temaAAnalisarDistribucion[14]."\b/u","/\b".$temaAAnalisarDistribucion[15]."\b/u","/\b".$temaAAnalisarDistribucion[16]."\b/u","/\b".$temaAAnalisarDistribucion[17]."\b/u","/\b".$temaAAnalisarDistribucion[18]."\b/u","/\b".$temaAAnalisarDistribucion[19]."\b/u","/\b".$temaAAnalisarDistribucion[20]."\b/u","/\b".$temaAAnalisarDistribucion[21]."\b/u","/\b".$temaAAnalisarDistribucion[22]."\b/u","/\b".$temaAAnalisarDistribucion[23]."\b/u","/\b".$temaAAnalisarDistribucion[24]."\b/u","/\b".$temaAAnalisarDistribucion[25]."\b/u","/\b".$temaAAnalisarDistribucion[26]."\b/u","/\b".$temaAAnalisarDistribucion[27]."\b/u","/\b".$temaAAnalisarDistribucion[28]."\b/u","/\b".$temaAAnalisarDistribucion[29]."\b/u","/\b".$temaAAnalisarDistribucion[30]."\b/u","/\b".$temaAAnalisarDistribucion[31]."\b/u","/\b".$temaAAnalisarDistribucion[32]."\b/u","/\b".$temaAAnalisarDistribucion[33]."\b/u","/\b".$temaAAnalisarDistribucion[34]."\b/u","/\b".$temaAAnalisarDistribucion[35]."\b/u","/\b".$temaAAnalisarDistribucion[36]."\b/u","/\b".$temaAAnalisarDistribucion[37]."\b/u","/\b".$temaAAnalisarDistribucion[38]."\b/u","/\b".$temaAAnalisarDistribucion[39]."\b/u","/\b".$temaAAnalisarDistribucion[40]."\b/u","/\b".$temaAAnalisarDistribucion[41]."\b/u","/\b".$temaAAnalisarDistribucion[42]."\b/u","/\b".$temaAAnalisarDistribucion[43]."\b/u","/\b".$temaAAnalisarDistribucion[44]."\b/u","/\b".$temaAAnalisarDistribucion[45]."\b/u","/\b".$temaAAnalisarDistribucion[46]."\b/u","/\b".$temaAAnalisarDistribucion[47]."\b/u","/\b".$temaAAnalisarDistribucion[48]."\b/u","/\b".$temaAAnalisarDistribucion[49]."\b/u","/\b".$temaAAnalisarDistribucion[50]."\b/u","/\b".$temaAAnalisarDistribucion[51]."\b/u","/\b".$temaAAnalisarDistribucion[52]."\b/u","/\b".$temaAAnalisarDistribucion[53]."\b/u","/\b".$temaAAnalisarDistribucion[54]."\b/u","/\b".$temaAAnalisarDistribucion[55]."\b/u","/\b".$temaAAnalisarDistribucion[56]."\b/u","/\b".$temaAAnalisarDistribucion[57]."\b/u","/\b".$temaAAnalisarDistribucion[58]."\b/u","/\b".$temaAAnalisarDistribucion[59]."\b/u","/\b".$temaAAnalisarDistribucion[60]."\b/u","/\b".$temaAAnalisarDistribucion[61]."\b/u","/\b".$temaAAnalisarDistribucion[62]."\b/u","/\b".$temaAAnalisarDistribucion[63]."\b/u","/\b".$temaAAnalisarDistribucion[64]."\b/u","/\b".$temaAAnalisarDistribucion[65]."\b/u","/\b".$temaAAnalisarDistribucion[66]."\b/u","/\b".$temaAAnalisarDistribucion[67]."\b/u","/\b".$temaAAnalisarDistribucion[68]."\b/u","/\b".$temaAAnalisarDistribucion[69]."\b/u","/\b".$temaAAnalisarDistribucion[70]."\b/u","/\b".$temaAAnalisarDistribucion[71]."\b/u","/\b".$temaAAnalisarDistribucion[72]."\b/u","/\b".$temaAAnalisarDistribucion[73]."\b/u","/\b".$temaAAnalisarDistribucion[74]."\b/u");                
                            $comentarioSujeto = preg_replace($temaAAnalisarDistribucionCalculadoPalabrasAsociadas, $temaAAnalisarDistribucionCalculadoPalabraDeReemplazo, $comentarioLimpio);
                            //echo $comentarioSujeto;
                            $frecuenciaDelTema= substr_count($comentarioSujeto, $temaAAnalisarDistribucionCalculadoPalabraDeReemplazo);
                            //echo $frecuenciaDelTema;
                            $vectorDistribucionDeLaFrase[$i-1]=$frecuenciaDelTema;
                        }         

                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        ////////////////////////////////////////Pondero la frecuencia de todos los temas que se encontraron en la frase para que sume 1////////////////////////////////////////
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        $numPalabras=str_word_count($comentarioLimpio);
                        $numTemas=count($vectorDistribucionDeLaFrase);
                        $sumaPorcentajes=0;
                        for ($i = 1; $i <= $numTemas; $i++){
                            $sumaPorcentajes=$sumaPorcentajes+($vectorDistribucionDeLaFrase[$i-1]/$numPalabras);                    
                        }
                        //echo $sumaPorcentajes;
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        ////////////////////////////////////////si la frase no tiene ni un tema el vector es muchos 9999999, y calculo la distribucion de frecuencias de los temas en la frase de la persona ponderada////////////////////////////////////////
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //si no tengo idea de que habla por que ninguno de los temas creados aparece en la frase que me dijo debo generar una alerta para que se conteste a mano y se almacene esta nueva frase,respuesta,tema 
                        if ($sumaPorcentajes==0){
                            //no habla de nadie
                            $desconoscoLaFrase="desconocida";
                            for ($i = 1; $i <= $numTemas; $i++){
                                $deQuienHabla[$i-1]=9999999;                    
                            }  
                        }
                        else {

                                for ($i = 1; $i <= $numTemas; $i++){
                                    $deQuienHabla[$i-1]=100*(($vectorDistribucionDeLaFrase[$i-1]/$numPalabras)/$sumaPorcentajes);                    
                                }                             

                        }
                        //esta es la distribucion por categorias de quien habla, de la frase de la persona
                        //print_r(array_values($deQuienHabla));
                        //esto de abajo debe sumar siempre 100, si las funciones estan bien hechas deberia ser asi (solo excceptuando el caso en el que la frase es totalmente desconocida va a suman un numero gigantesco)
                        //array_sum($deQuienHabla);          

                        //ya he creado el vector que indica la distribucion de las categorias de las que habla la persona
                        //ahora busco en la base de datos de las conversaciones pasadas, aquella que tenga la distribucion mas proxima
                        //aca va mahalanobis comparando la frase contra todas las que hay en la base
                        //fwrite(fopen('10153041577179080', 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $deQuienHabla[0].$deQuienHabla[1].$deQuienHabla[2]) . "\n");

                            return $deQuienHabla;
                }





























                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////Distancia de mahalanobis de mi frase vs todas las frases almacenadas en converzaciones////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                function mahalanobis($deQuienHabla,$nombreChatUsuario,$comentario) {   
                            ////////////////////////////////////////////Distancia de mahalanobis para encontrar categoria de quien habla////////////////////////////////////
                            $servername='localhost';
                            $username='taita923_chris';
                            $password='mantarraya1';
                            $dbname='taita923_datosPersonas';
                            $conn= new mysqli($servername,$username,$password,$dbname);
                            $connection=@mysql_connect($servername,$username,$password);
                            //este algoritmo ya lo habia creado antes para taita, por eso tiene 4 vacios al principio del vector y no  cambie para evitar dañarlo
                            //Objetos y sus variables
                            //se crea el objeto y se agrega en matrz de objetos
                            // = array("Persona","", "","", 15, 10, 10,10);
                            //el 4 elemento de cada vector debe contener efecto forer  usando las palabras aveces(o en ocasiones, algunas veces, alguna que otra vez, a ratos, de cuando en cuando, de vez en cuando, ocasionalmente, en algunas ocasiones, alguna que otra vez) y para ti(a ti, tu sabes, tu siempre has creido, tu sientes, tu eres)) por ejemplo (Para ti es muy importante demostrar que tienes una voluntad poderoza, pero aveces sientes miedo de arriesgarte por que no quieres cometer un error del cual te arrepientas en el futuro. Hoy la soportunidades están en el lugar adecuado para que puedas tomarlas,) y una parte especifica segun lo que respondio la persona por ejemplo (Ademas como el amor que sientes por ella ya no es el mismo de antes es bueno que dusques alguien que te llene)
                            //el 5 elemento contiene un listado de las cosas quela persona tiene o debe hacer o no tiene
                            $persona =  array_merge(array("deQuienHabla","","","",""), $deQuienHabla);
                            //El modelo compara la distribucion de la frase escrita con la de todas las frases escritas anteriormente
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////cuento cuantas conversaciones hay en la base para saber cuantas comparaciones tiene que hacer mahalanobis////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            $numeroDeConversacionesEnBase=mysql_query("SELECT count(id) FROM taita923_datosPersonas.converzaciones9meses  WHERE 1");
                            //echo $numeroDeTemasEnBase;
                            if (!$numeroDeConversacionesEnBase) {
                                echo 'Could not run query: ' . mysql_error();
                                exit;
                            }
                            $numeroDeConversacionesEnBaseCalculado=mysql_fetch_row($numeroDeConversacionesEnBase);
                            $matrizDeObjetos[0]=$persona;
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////este for compara mi frase con cada frase anterior y le encuentra su distancia////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            //sigue un for para que cree una matriz con todas las converzaciones
                            for ($i = 1; $i <= $numeroDeConversacionesEnBaseCalculado[0]; $i++){
                                //aca traigo una de las conversaciones pasadas
                                $conversacionPasada=mysql_query("SELECT * FROM taita923_datosPersonas.converzaciones9meses  WHERE id='".$i."'");
                                //echo $conversacionPasada;
                                if (!$conversacionPasada) {
                                    echo 'Could not run query: ' . mysql_error();
                                exit;
                                }
                                $conversacionPasadaCalculado=mysql_fetch_row($conversacionPasada);
                                //$tema1  = array_merge(array("1","habloDeMi","","",""), $vectorCategoria1);
                                //var_dump($persona);
                                //agrupo los Objetos en una matriz
                                //como solo caven 5 datos antes del vector, traigo los primeros cuatro y luego del sexto en adelante asi me salto la fecha que no la uso aca
                                $conversacionPasadaCalculadoSoloVariablesUtilesParaMahalanobis=array($conversacionPasadaCalculado[0],$conversacionPasadaCalculado[1],$conversacionPasadaCalculado[2],$conversacionPasadaCalculado[3]);
                                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                ////////////////////////////////////////aca creo la matriz que en su primer registro tiene la distribucion de mi frase y de ahi en adelante la distribucion de cada frase de la base////////////////////////////////////////
                                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                for ($j = 6; $j <= count($conversacionPasadaCalculado); $j++){
                                    $conversacionPasadaCalculadoSoloVariablesUtilesParaMahalanobis[$j-2]=$conversacionPasadaCalculado[$j-1];
                                }
                                $matrizDeObjetos[$i]=$conversacionPasadaCalculadoSoloVariablesUtilesParaMahalanobis;
                                //var_dump($matrizDeObjetos);
                                 //aca abajo esta mahalanobis, ese no se cambia
                            }
                            //$a=$matrizDeObjetos[1];
                            //$a=$a[4];
                            //$a=count($matrizDeObjetos);
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////ya teniendo la matriz de distribuciones comienco a comparar una a una////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            //var_dump($matrizDeValores["0"]["0"]);
                            //cuento cuantos objetos y cuantas variables hay
                            $numeroDeObjetos = count($matrizDeObjetos);
                            $numeroDevariablesEnCadaObjeto=count($persona);
                            //var_dump($numeroDeObjetos);
                            //var_dump($numeroDevariablesEnCadaObjeto);
                            //Distancia de mahalanobis
                            //calcula la distancia vectorial entre los datos de la persona y cada uno de los objetos
                            //voy a calcular respecto a un solo objeto
                            //var_dump($matrizDeObjetos[0])
                            //var_dump($matrizDeObjetos[0][0])
                            $distanciaMahalanobis=0;
                            //aca calculo la distancia de mahalanobis entre 2 objetos
                            //arranca en 5 por que los 5 primeros elementos son el nombre del objeto, la pagina y la imagen y php cuenta desde 0 no desde 1
                            $desviacionesEstandar=array();
                            //var_dump($desviacionesEstandar) ;
                            for ($j = 5; $j < $numeroDevariablesEnCadaObjeto; $j++) {
                                    //la desviacion estandar de la variable necesita la media de la variable
                                    $sumaAcumulada=0;
                                    $media=0;
                                    for ($i = 0; $i < $numeroDeObjetos; $i++){
                                            $sumaAcumulada=$matrizDeObjetos[$i][$j]+$sumaAcumulada;
                                            //      echo $sumaAcumulada;
                                    }
                                    $media=$sumaAcumulada/$numeroDeObjetos;
                                    //echo $media;
                                    //la distancia de mahalanobis necesita al desviacin estandar muestral de la variable
                                    $desvest=0;
                                    $sumaAcumuladaParaDesviacion=0;
                                    for ($i = 0; $i < $numeroDeObjetos; $i++){
                                            $sumaAcumuladaParaDesviacion=$sumaAcumuladaParaDesviacion+(($matrizDeObjetos[$i][$j]-$media)*($matrizDeObjetos[$i][$j]-$media));
                                            //echo "El umero es $matrizDeObjetos[$i][$j]-$media";
                                            //var_dump(($matrizDeObjetos[$i][$j]-$media)*($matrizDeObjetos[$i][$j]-$media));
                                    }
                                            $desvest=sqrt($sumaAcumuladaParaDesviacion/($numeroDeObjetos-1));
                                            //var_dump($desvest);
                                            //desvest fulll funcional
                                            array_push($desviacionesEstandar,$desvest);
                                            //$desviacionesEstandar=array($desviacionesEstandar);

                            }
                            //var_dump($desviacionesEstandar);
                            $numeroDeDesviacionesEstandar = count($desviacionesEstandar);
                            //var_dump($desviacionesEstandar);
                            //var_dump($numeroDeDesviacionesEstandar);
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            //ya tengo todas las desviaciones estandar para poder calcular la distancia de mahalanobis
                            //Distancia de mahalanobis
                            //calcula la distancia vectorial entre los datos de la persona y cada uno de los objetos
                            //var_dump($matrizDeObjetos);
                            //recordar que primero va elobjeto y despues la variable var_dump($matrizDeObjetos)[0][2];
                            //aca i va desde 1 por que no e interesa comparar respecto a si mismo el primer objeto
                            $resultadosMahalanobis=array();
                            for ($i = 1; $i < $numeroDeObjetos; $i++){
                                    $valoresASUmarMahalanobis=array();
                                    for ($j = 5; $j < $numeroDevariablesEnCadaObjeto; $j++){
                                            //($matrizDeObjetos[$0][$j]-$matrizDeObjetos[$i][$j]))/$desviacionesEstandar[$j-3];
                                            //var_dump(((($matrizDeObjetos[0][$j]-$matrizDeObjetos[$i][$j]))/$desviacionesEstandar[$j-5])*((($matrizDeObjetos[0][$j]-$matrizDeObjetos[$i][$j]))/$desviacionesEstandar[$j-5]));
                                            $calculosMahalanobis=((($matrizDeObjetos[0][$j]-$matrizDeObjetos[$i][$j]))/$desviacionesEstandar[$j-5])*((($matrizDeObjetos[0][$j]-$matrizDeObjetos[$i][$j]))/$desviacionesEstandar[$j-5]);
                                            array_push($valoresASUmarMahalanobis,$calculosMahalanobis);
                                    }
                                    //var_dump($valoresASUmarMahalanobis);
                                    $numeroDeValoresMahalanobis = count($valoresASUmarMahalanobis);
                                    //var_dump($numeroDeValoresMahalanobis);
                                    //var_dump(array_sum($valoresASUmarMahalanobis));
                                    $sumoValoresMahalanobis=array_sum($valoresASUmarMahalanobis);
                                    $numeroDeElementosEnLaRespuesta = count($sumoValoresMahalanobis);
                                    //var_dump($numeroDeElementosEnLaRespuesta);
                                    //var_dump($sumoValoresMahalanobis);//aca bota dos numeros, probare a ver si aún asi encuentra el menor por que supongo que si el de la izquierda es el menor el de la drecha tambien, esta bien que bote dos numeros por que hace dos ciclos del for ya que hay 2 objetos con los cuales comparar
                                    //var_dump(gettype($sumoValoresMahalanobis));
                                    //var_dump(str_split($sumoValoresMahalanobis,6));
                                    //var_dump(explode($sumoValoresMahalanobis," "));
                                    $yLeSacoLaRaiz=sqrt($sumoValoresMahalanobis);
                                    //var_dump($yLeSacoLaRaiz);
                                    //var_dump(count($yLeSacoLaRaiz));
                                    ///voy en almacenar los resultados
                                    array_push($resultadosMahalanobis,$yLeSacoLaRaiz);
                                    //var_dump($resultadosMahalanobis);
                            }

                            //var_dump($resultadosMahalanobis);
                            $numeroDeRespuestas = count($resultadosMahalanobis);
                            //var_dump($numeroDeRespuestas);
                            //encuentro el de la menor distancia
                            //le sumo uno a la poscicion para que me diga la posicion en al que se encuentra ese objeto cercado en la tabla original dado que habia quitado el promer objeto que es la opinion de la persona
                            $posicionObjetoMasCercano=array_search(min($resultadosMahalanobis), $resultadosMahalanobis)+1;
                            //var_dump($posicionObjetoMasCercano);
                            //devuelvo ese objeto más cercano
                            $objetoGanador=$matrizDeObjetos[$posicionObjetoMasCercano];
                            $distanciaATemaGanador=min($resultadosMahalanobis);
                            //cuando quiera probar debo activar estas de abajp
                            //echo "<br>"."El mas cercano esta en la posicion $posicionObjetoMasCercano y es  " ."<br>";
                            //var_dump($objetoGanador);
                            //echo "<br>"."A una distancia de  " ."<br>";
                            //var_dump(min($resultadosMahalanobis));
                            //fwrite(fopen('10154655318669080', 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'Objeto ganador: id '.$objetoGanador[0] .' con respuesta: '. $objetoGanador[4]) . "\n");
                            //aca imprimo solo a mi usuario los datos que me ayudan a saber de donde saco la respuesta
                            //if($nombreChatUsuario==10154655318669080){
                            //    fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'Objeto CUASIganador: id '.$objetoGanador[0] .' con respuesta: '. $objetoGanador[4]. ', y con distancia de: '.$distanciaATemaGanador.' = '.$resultadosMahalanobis[$posicionObjetoMasCercano-1]. ', en la matriz el mas cercano esta en la posicion: '. $posicionObjetoMasCercano) . "\n");
                            //}
                            



















                            //ahora lo que pasa es que el chat se esta confundiendo mucho por que puede que la que dio mas cercana no tiene nada que ver, asi que ahora voy a tomar las 10 mas cercanas y si la mayoria responde cosas parecidas es por que esa respuesta probablemente si es de esa pregunta y le devuelve la respuesta que habia encontrado originalmente, si la votacion no asegura que esa sea la respuesta entonces le devuelve la mas lejana de todas y asi mas adelante la va a volver vacia por lejana o incluso solo tiene que poner en distancia un numero re grande
                            //voy a hacerlo con las 10 mas cercanas y voy a dejar que yo pueda configurar el numero minimo de votaciones que necesita una frase
                            //yo le indico cuantas frases quiero que entren a la votacion y que porcentaje de cincidencias minimo para decir que si me quedo con la respuesta que encontre
                            $numeroDeFrasesQueVanAVotar=10;
                            $porcentajeMinimoDeVotosAFavorParaQuedarseConLaREspuesta=0.77;//osea 77 porciento
                            //dejo la votacion en 0 antes de que entren las n frases a votar
                            $votosAcumulados=0;
                            //guardo un respaldo de las distancias de mahalanobis encontradas
                            $resultadosMahalanobisRespaldo=$resultadosMahalanobis;
























                            
                            //convierto esa distancia cercana en un numero enorme y asi ya no vuelve a salir como la mas cercana
                            $resultadosMahalanobis[$posicionObjetoMasCercano-1]=999999999;
                            //if($nombreChatUsuario==10154655318669080){
                            //    fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'La nueva distancia ahora es de: '.$resultadosMahalanobis[$posicionObjetoMasCercano-1]) . "\n");
                            //}

                            //creo un mega texto que une las 11 respuestas y asi luego comparo cada respuesta contra el mega texto y encuentro un porcentaje de votos a favor de esa frase, finalmente la frase que mas votos tenga es la ganadora, claro si logra superar el margen de votos
                            $megaTexto=$objetoGanador[4];
                            for ($k = 1; $k <= $numeroDeFrasesQueVanAVotar; $k++)
                            {
                                //ahora vuelvo a buscar el siguiente más cercano
                                $posicionObjetoMasCercano2=array_search(min($resultadosMahalanobis), $resultadosMahalanobis)+1;
                                //var_dump($posicionObjetoMasCercano);
                                //devuelvo ese objeto más cercano
                                $objetoGanador2=$matrizDeObjetos[$posicionObjetoMasCercano2];
                                $distanciaATemaGanador2=min($resultadosMahalanobis);
                                //if($nombreChatUsuario==10154655318669080){
                                //    fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'El siguiente más cercano: id '.$objetoGanador2[0] .' con respuesta: '. $objetoGanador2[4]. ', y con distancia de: '.$distanciaATemaGanador2.' = '.$resultadosMahalanobis[$posicionObjetoMasCercano2-1]. ', en la matriz el mas cercano esta en la posicion: '. $posicionObjetoMasCercano2) . "\n");
                                //}

                                //creo el mega texto
                                $megaTexto=$megaTexto.' '.$objetoGanador2[4];

                                //y vuelvo a mandar ese valor a la reconcha
                                $resultadosMahalanobis[$posicionObjetoMasCercano2-1]=999999999;
                                 //y reviso
                                //if($nombreChatUsuario==10154655318669080){
                                //    fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'La nueva distancia ahora es de: '.$resultadosMahalanobis[$posicionObjetoMasCercano2-1]) . "\n");
                                //}
                            }


                            //reviso si el mega texto esta bien
                            //if($nombreChatUsuario==10154655318669080){
                            //    fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'Mega texto: '.$megaTexto) . "\n");
                            //}

                            
                            //cuento la frecuencia de la primer respuesta en el mega texto
                            //si la respuesta esta vacia la vuelvo un texto imposible para que pierda
                            if(substr_count($objetoGanador[4], ' ')==1 or substr_count($objetoGanador[4], '')==1 or substr_count($objetoGanador[4], ' ')==1 or $objetoGanador[4]==' ' or $objetoGanador[4]=='' or $objetoGanador[4]==NULL or str_word_count($objetoGanador[4])<2)
                            {
                                $objetoGanador[4]='fraseImposibleDeEncontrarEnElMegaTextoPorLoTantoNoTieneFrecuencia'.rand(10,1000);
                            }
                            $frecuenciaPrimerRespuestaEnMegaTexto=substr_count($megaTexto, $objetoGanador[4]);
                             //reviso la cuenta-parece que esta bien
                            //if($nombreChatUsuario==10154655318669080){
                            //    fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ",'La primer respuesta ganadora es: '.$objetoGanador[4]. ', Y en el mega texto tiene una frecuencia de: '.$frecuenciaPrimerRespuestaEnMegaTexto) . "\n");
                            //}

                            //y hago lo mismo para las otras respuestas, osea reviso cuantas veces aparece cada una en el mega texto y la ganadora rules, claro su supera el porcentaje minimo
                            $resultadosMahalanobis=$resultadosMahalanobisRespaldo;
                            //convierto esa distancia cercana en un numero enorme y asi ya no vuelve a salir como la mas cercana
                            $resultadosMahalanobis[$posicionObjetoMasCercano-1]=999999999;
                             //if($nombreChatUsuario==10154655318669080){
                             //   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'Objeto CUASIganador: id '.$objetoGanador[0] .' con respuesta: '. $objetoGanador[4]. ', y con distancia de: '.$distanciaATemaGanador.' = '.$resultadosMahalanobis[$posicionObjetoMasCercano-1]. ', en la matriz el mas cercano esta en la posicion: '. $posicionObjetoMasCercano) . "\n");
                             // }
                            //creo el objeto ganador de ganadores que es el que gano en la votacion, el que mas veces tuvo respuesta en el mega texto
                            $objetoGanadorDeGanadores=$objetoGanador;
                            $distanciaAlObjetoGanadorDeGanadores=$distanciaATemaGanador;
                            $frecuenciaDelObjetoGanadorDeGanadores=$frecuenciaPrimerRespuestaEnMegaTexto;


                            for ($k = 1; $k <= $numeroDeFrasesQueVanAVotar; $k++)
                            {
                                //ahora vuelvo a buscar el siguiente más cercano
                                $posicionObjetoMasCercano2=array_search(min($resultadosMahalanobis), $resultadosMahalanobis)+1;
                                //var_dump($posicionObjetoMasCercano);
                                //devuelvo ese objeto más cercano
                                $objetoGanador2=$matrizDeObjetos[$posicionObjetoMasCercano2];
                                $distanciaATemaGanador2=min($resultadosMahalanobis);
                                //if($nombreChatUsuario==10154655318669080){
                                //    fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'El siguiente más cercano: id '.$objetoGanador2[0] .' con respuesta: '. $objetoGanador2[4]. ', y con distancia de: '.$distanciaATemaGanador2.' = '.$resultadosMahalanobis[$posicionObjetoMasCercano2-1]. ', en la matriz el mas cercano esta en la posicion: '. $posicionObjetoMasCercano2) . "\n");
                                //}

                                //cuento la frecuencia de la primer respuesta en el mega texto
                                //si la respuesta esta vacia la vuelvo un texto imposible para que pierda
                                if(substr_count($objetoGanador2[4], ' ')==1 or substr_count($objetoGanador2[4], '')==1 or substr_count($objetoGanador2[4], ' ')==1 or $objetoGanador2[4]==' ' or $objetoGanador2[4]=='' or $objetoGanador2[4]==NULL or str_word_count($objetoGanador2[4])<2)
                                {
                                    $objetoGanador2[4]='fraseImposibleDeEncontrarEnElMegaTextoPorLoTantoNoTieneFrecuencia'.rand(10,1000);
                                }
                                $frecuenciaSiguienteRespuestaEnMegaTexto=substr_count($megaTexto, $objetoGanador2[4]);
                                //y vuelvo a mandar ese valor a la reconcha
                                $resultadosMahalanobis[$posicionObjetoMasCercano2-1]=999999999;
                                 //y reviso
                                if($nombreChatUsuario==10154655318669080){
                                    fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ",'La siguiente respuesta es: '.$objetoGanador2[4]. ', y tiene una frecuencia de: '.$frecuenciaSiguienteRespuestaEnMegaTexto. '. Y esta a una distancia de: '.$distanciaATemaGanador2) . "\n");
                                }

                                if($frecuenciaSiguienteRespuestaEnMegaTexto>$frecuenciaDelObjetoGanadorDeGanadores)
                                {
                                    $objetoGanadorDeGanadores=$objetoGanador2;
                                    $distanciaAlObjetoGanadorDeGanadores=$distanciaATemaGanador2;
                                    $frecuenciaDelObjetoGanadorDeGanadores=$frecuenciaSiguienteRespuestaEnMegaTexto;
                                }
                            }


                            //y encuentro el objeto ganador de ganadores
                            if($nombreChatUsuario==10154655318669080){
                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ",'La respuesta re winer es: <b>'.$objetoGanadorDeGanadores[4]. '</b>, y tiene una frecuencia de: '.$frecuenciaDelObjetoGanadorDeGanadores. '. Y esta a una distancia de: '.$distanciaAlObjetoGanadorDeGanadores) . "\n");
                            }


                            //finalmente si el ganador supero el porcentaje minimo de votos entonces esa es la respuesta
                            $porcentajeDeVotosDelGanador=$frecuenciaDelObjetoGanadorDeGanadores/$numeroDeFrasesQueVanAVotar;
                            if($porcentajeDeVotosDelGanador<$porcentajeMinimoDeVotosAFavorParaQuedarseConLaREspuesta)
                            {
                                $distanciaAlObjetoGanadorDeGanadores=999999999;

                                //Si la respuesta no tuvo una votacion superior a 7 entonces el mensaje de la persona se le envia a la flaca y queda a la espéra de que ella lo responda, (la parte donde lo que lla respone y se le envia a la persona esta abajo)
                                if($nombreChatUsuario!=2026380267589823 and $nombreChatUsuario!=10154655318669080)
                                {
                                    //fwrite(fopen('10154655318669080', 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");         
                                    fwrite(fopen('2026380267589823', 'a'), "<span>". $nombreChatUsuario . "</span>" . $message = str_replace("\n", " ", $comentario) . "\n");   

                                    //tambien le envia un correo a la flaca notificandole que hay una respuesta pendiente     
                                    $to = "jeimy855@gmail.com";
                                    $subject = "Princesa tienes una nueva pregunta en 9meses";
                                    $txt = "La persona con el id: ".$nombreChatUsuario." escribio: ".$comentario;
                                    $headers = "From: atencion@9meses.co\r\n";
                                    $headers .= "Reply-To: elchristog@gmail.com\r\n";
                                    $headers .= "Return-Path: atencion@9meses.co\r\n";
                                    $headers .= "CC: elchristog@gmail.com\r\n";
                                    $headers .= "BCC: elchristog@gmail.com\r\n";

                                    mail($to,$subject,$txt,$headers); 
                                }

                            }



                          

                            return array ($objetoGanadorDeGanadores,$distanciaAlObjetoGanadorDeGanadores);
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////ya encontre la frase mas cercana a mi frase y asi mismo la respuesta que se le dio a esa frase////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                }


                        


























                function almacenoNuevoUsuario($nombreChatUsuario,$nombre,$correoUsuario) {  
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////almaceno en base al nuevo usuario ////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            $servername='localhost';
                            $username='taita923_chris';
                            $password='mantarraya1';
                            $dbname='taita923_datosPersonas';
                            $conn= new mysqli($servername,$username,$password,$dbname);
                            $connection=@mysql_connect($servername,$username,$password);
                            $usuarioYaAlmacenado=mysql_query("SELECT count(id) FROM taita923_datosPersonas.usuarios9meses  WHERE idFacebook='".$nombreChatUsuario."'");
                            //echo $usuarioYaAlmacenado;
                            if (!$usuarioYaAlmacenado) {
                              echo 'Could not run query: ' . mysql_error();
                            exit;
                            }
                            $usuarioYaAlmacenadoCalculado=mysql_fetch_row($usuarioYaAlmacenado);
                            if($usuarioYaAlmacenadoCalculado[0]==0){
                                $sql="INSERT INTO taita923_datosPersonas.usuarios9meses        VALUES('','$nombreChatUsuario','$nombre','$correoUsuario')";
                                if($conn->query($sql)==TRUE){}
                                else{echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;
                            }
                }
































                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////(esta funcion se ejecuta dentro de la funcion que  le entrega la respuesta a la persona) Cuando la frase no tiene respuesta le dice que espere y cada 20 segundos busca si ya tiene respuesta hasta que por fin la encuentre////////////////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////////////////////// 
                 function buscaRespuestaAFrase($comentarioLimpio,$nombreChatUsuario,$respuestaALaFraseCalculadoTexto,$contador) {
                            //mientras la frase que puso la persona no tenga respuesta espera 20 segundos y revisa si ya tiene respuesta, cuando ya tiene entrega la respuesta
                            //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ",'entro a la funcion, interaccion numero: '.$contador.' y la respuesta que encontro aca es: '.$respuestaALaFraseCalculadoTexto) . "\n");
                            $servername='localhost';
                            $username='taita923_chris';
                            $password='mantarraya1';
                            $dbname='taita923_datosPersonas';
                            $conn= new mysqli($servername,$username,$password,$dbname);
                            $connection=@mysql_connect($servername,$username,$password);
                            $idUltimaConverzacionUsuarioConsulta=mysql_query("SELECT id FROM taita923_datosPersonas.converzaciones9meses  WHERE idUsuario=".$nombreChatUsuario." order by id desc limit 1");
                            //echo $idDeLaFrase;
                            if (!$idUltimaConverzacionUsuarioConsulta) {
                            echo 'Could not run query: ' . mysql_error();
                            exit;
                            }
                            $idUltimaConverzacionUsuario=mysql_fetch_row($idUltimaConverzacionUsuarioConsulta);
                            $idUltimaConverzacionUsuarioCalculado=$idUltimaConverzacionUsuario[0]-4;

                            $idDeLaFrase=mysql_query("SELECT id FROM taita923_datosPersonas.converzaciones9meses  WHERE idUsuario=".$nombreChatUsuario." and  replace(comentario,' ','') like replace('%".$comentarioLimpio."%',' ','') and id>".$idUltimaConverzacionUsuarioCalculado." order by id desc limit 1");
                            //echo $idDeLaFrase;
                            if (!$idDeLaFrase) {
                            echo 'Could not run query: ' . mysql_error();
                            exit;
                            }
                            $idDeLaFraseCalculado=mysql_fetch_row($idDeLaFrase);
                            $idDeLaFraseCalculadoNumero = $idDeLaFraseCalculado[0]; 
                             
                            //sleep(10);
                            //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ",'Aun no conozco la respuesta a tu frase, pero mañana ya la sabré') . "\n");
                            //como el ciclo dura muy poco mejor no lo pongo a revisar sino que de una le digo que no le tengo respuesta, para cuando vaya a arreglar esto quito las dos lineas siguientes y mas abajo en el if hago que vuelva a ejecutar la funcion quitandole el comentario a la ultima linea
                            //si la persona escribe entre las 9 pm y las 7 am le dice que en la primer hora lo contactara un asesor
                            $currentTime = time();//por cada hora que este corrido debo sumarle o restarle 3600
                            //echo date('H:i',$currentTime);  
                            //y reviso que este tomando la hora correcta
                            //if($nombreChatUsuario==10154655318669080){
                            //       fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ",'La hora es '.date('H:i',$currentTime)) . "\n");
                            //}
                            if (((int) date('H', $currentTime)) >= 21 and ((int) date('H', $currentTime)) <= 07) 
                            {
                              $respuestaALaFraseCalculadoTexto='En este momento no hay asesores disponibles, pero se pondran en contacto contigo a las 8 am';
                            }
                            else
                            {
                              $respuestaALaFraseCalculadoTexto='Espera un momento, nuestro asesor esta respondiendo';
                            }

                            
                            return  array($idDeLaFraseCalculadoNumero,$respuestaALaFraseCalculadoTexto);
                            //set_time_limit(200);
                            if($respuestaALaFraseCalculadoTexto==='' or $respuestaALaFraseCalculadoTexto==' ' or $respuestaALaFraseCalculadoTexto== NULL) {
                                sleep(10);
                                $respuestaALaFrase=mysql_query("SELECT respuestaAComentario FROM taita923_datosPersonas.converzaciones9meses  WHERE replace(comentario,' ','') like replace('".$comentarioLimpio."',' ','')");
                                //echo $respuestaALaFrase;
                                if (!$respuestaALaFrase) {
                                echo 'Could not run query: ' . mysql_error();
                                exit;
                                }
                                $respuestaALaFraseCalculado=mysql_fetch_row($respuestaALaFrase);
                                $respuestaALaFraseCalculadoTexto = $respuestaALaFraseCalculado[0];                                 
                                $contador=$contador+1;
                                //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'el contador va en: '.$contador-1) . "\n");
                                //buscaRespuestaAFrase($comentarioLimpio,$nombreChatUsuario,$respuestaALaFraseCalculadoTexto,$contador);
                            } 
                            else{
                                //$aleatrorio=rand(8,12);
                                //sleep($aleatrorio);
                                //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaALaFraseCalculadoTexto) . "\n");
                                return  array($idDeLaFraseCalculadoNumero,$respuestaALaFraseCalculadoTexto);
                            }
                }


































              function encuentraRespuesta($nombreChatUsuario,$nombre,$comentarioLimpio,$objetoGanador,$distanciaMaximaNivelDeSeguridad,$distanciaATemaGanador,$deQuienHabla) {  
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        ////////////////////////////////////////si la frase ganadora esta verdaderamente cerca y tiene respuesta ya creada entonces le da su respuesta////////////////////////////////////////
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //tuve que hacer la conexion a sql en cada funcion que use sql por que al hacer una sola coneccion general se me fritaba
                        $servername='localhost';
                        $username='taita923_chris';
                        $password='mantarraya1';
                        $dbname='taita923_datosPersonas';
                        $conn= new mysqli($servername,$username,$password,$dbname);
                        $connection=@mysql_connect($servername,$username,$password);
                        if($distanciaATemaGanador<=$distanciaMaximaNivelDeSeguridad and str_word_count($objetoGanador[4])>0)
                            {
                                    $desconoscoLaFrase="conocida";
                                    $fechaHoy=date("Y/m/d");
                                    //si la frase es identica a la de su compañera ni para que guardo duplicados NO por que no almacena el historial de la persona
                                    //if(substr_count(preg_replace('/\s+/','',$objetoGanador[3]),preg_replace('/\s+/','',$comentarioLimpio))==1 and substr_count(preg_replace('/\s+/','',$comentarioLimpio),preg_replace('/\s+/','',$objetoGanador[3]))==1){
                                    //}
                                    //else{
                                    //cada vez que agregue un nuevo tema me toca agregar un valor al final de esta linea:
                                    $sql="INSERT INTO taita923_datosPersonas.converzaciones9meses        VALUES('','$nombreChatUsuario','$nombre','$comentarioLimpio','$fechaHoy','$objetoGanador[4]','$deQuienHabla[0]','$deQuienHabla[1]','$deQuienHabla[2]','$deQuienHabla[3]','$deQuienHabla[4]','$deQuienHabla[5]','$deQuienHabla[6]','$deQuienHabla[7]','$deQuienHabla[8]','$deQuienHabla[9]','$deQuienHabla[10]','$deQuienHabla[11]','$deQuienHabla[12]','$deQuienHabla[13]','$deQuienHabla[14]','$deQuienHabla[15]','$deQuienHabla[16]','$deQuienHabla[17]','$deQuienHabla[18]','$deQuienHabla[19]','$deQuienHabla[20]','$deQuienHabla[21]','$deQuienHabla[22]','$deQuienHabla[23]','$deQuienHabla[24]','$deQuienHabla[25]','$deQuienHabla[26]','$deQuienHabla[27]','$deQuienHabla[28]','$deQuienHabla[29]','$deQuienHabla[30]','$deQuienHabla[31]','$deQuienHabla[32]','$deQuienHabla[33]','$deQuienHabla[34]','$deQuienHabla[35]','$deQuienHabla[36]','$deQuienHabla[37]','$deQuienHabla[38]','$deQuienHabla[39]','$deQuienHabla[40]','$deQuienHabla[41]','$deQuienHabla[42]','$deQuienHabla[43]','$deQuienHabla[44]','$deQuienHabla[45]','$deQuienHabla[46]','$deQuienHabla[47]','$deQuienHabla[48]','$deQuienHabla[49]','$deQuienHabla[50]','$deQuienHabla[51]','$deQuienHabla[52]','$deQuienHabla[53]','$deQuienHabla[54]','$deQuienHabla[55]','$deQuienHabla[56]','$deQuienHabla[57]','$deQuienHabla[58]','$deQuienHabla[59]','$deQuienHabla[60]','$deQuienHabla[61]','$deQuienHabla[62]','$deQuienHabla[63]','$deQuienHabla[64]','$deQuienHabla[65]','$deQuienHabla[66]','$deQuienHabla[67]','$deQuienHabla[68]','$deQuienHabla[69]','$deQuienHabla[70]','$deQuienHabla[71]','$deQuienHabla[72]','$deQuienHabla[73]','$deQuienHabla[74]','$deQuienHabla[75]','$deQuienHabla[76]','$deQuienHabla[77]','$deQuienHabla[78]','$deQuienHabla[79]','$deQuienHabla[80]','$deQuienHabla[81]','$deQuienHabla[82]','$deQuienHabla[83]','$deQuienHabla[84]','$deQuienHabla[85]','$deQuienHabla[86]','$deQuienHabla[87]','$deQuienHabla[88]','$deQuienHabla[89]','$deQuienHabla[90]','$deQuienHabla[91]','$deQuienHabla[92]','$deQuienHabla[93]','$deQuienHabla[94]','$deQuienHabla[95]','$deQuienHabla[96]','$deQuienHabla[97]','$deQuienHabla[98]','$deQuienHabla[99]','$deQuienHabla[100]','$deQuienHabla[101]','$deQuienHabla[102]','$deQuienHabla[103]','$deQuienHabla[104]','$deQuienHabla[105]','$deQuienHabla[106]','$deQuienHabla[107]','$deQuienHabla[108]','$deQuienHabla[109]','$deQuienHabla[110]','$deQuienHabla[111]','$deQuienHabla[112]','$deQuienHabla[113]','$deQuienHabla[114]','$deQuienHabla[115]','$deQuienHabla[116]','$deQuienHabla[117]','$deQuienHabla[118]','$deQuienHabla[119]','$deQuienHabla[120]','$deQuienHabla[121]','$deQuienHabla[122]','$deQuienHabla[123]','$deQuienHabla[124]','$deQuienHabla[125]','$deQuienHabla[126]','$deQuienHabla[127]','$deQuienHabla[128]')";
                                    if($conn->query($sql)==TRUE){}
                                    else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;
                                    //}
                                    //Espera y entega la respuesta
                                    //$aleatrorio=rand(8,12);
                                    //sleep($aleatrorio);            
                                    //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $objetoGanador[4]) . "\n");
                                    $idUltimaConverzacionUsuarioConsulta=mysql_query("SELECT id FROM taita923_datosPersonas.converzaciones9meses  WHERE idUsuario=".$nombreChatUsuario." order by id desc limit 1");
                                    //echo $idDeLaFrase;
                                    if (!$idUltimaConverzacionUsuarioConsulta) {
                                    echo 'Could not run query: ' . mysql_error();
                                    exit;
                                    }
                                    $idUltimaConverzacionUsuario=mysql_fetch_row($idUltimaConverzacionUsuarioConsulta);
                                    $idUltimaConverzacionUsuarioCalculado=$idUltimaConverzacionUsuario[0]-4;




                                    $idDeLaFrase=mysql_query("SELECT id FROM taita923_datosPersonas.converzaciones9meses  WHERE idUsuario=".$nombreChatUsuario." and  replace(comentario,' ','') like replace('%".$comentarioLimpio."%',' ','') and id>".$idUltimaConverzacionUsuarioCalculado." order by id desc limit 1");
                                    //echo $idDeLaFrase;
                                    if (!$idDeLaFrase) {
                                    echo 'Could not run query: ' . mysql_error();
                                    exit;
                                    }
                                    $idDeLaFraseCalculado=mysql_fetch_row($idDeLaFrase);
                                    $idDeLaFraseCalculadoNumero = $idDeLaFraseCalculado[0]; 
                                    return array($idDeLaFraseCalculadoNumero,$objetoGanador[4]);
                            }
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        ////////////////////////////////////////si no le encontro frase cercana ó la frase que encontro aun no tiene respuesta, almacena el registro y espera que se le cree la respuesta en el administrador////////////////////////////////////////
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        else{
                                    ///cuando la frase no es conocida o no hay seguridad de tenerle respuesta acertada, almacena el registro dejando en blanco la respuesta y crea una variable que e indica que hay frase desconocida, ahora notifica para que alejandra la conteste a mano y rellena la respuesta que estaba vacia con lo que ella acaba de escribir
                                    $desconoscoLaFrase="desconocida";
                                    $fechaHoy=date("Y/m/d");
                                    //cada vez que agregue un nuevo tema me toca agregar un valor al final de esta linea:
                                    //if(substr_count(preg_replace('/\s+/','',$objetoGanador[3]),preg_replace('/\s+/','',$comentarioLimpio))==1 and substr_count(preg_replace('/\s+/','',$comentarioLimpio),preg_replace('/\s+/','',$objetoGanador[3]))==1){
                                    //}
                                    //else{
                                    //cada vez que agregue un nuevo tema me toca agregar un valor al final de esta linea:
                                    $sql="INSERT INTO taita923_datosPersonas.converzaciones9meses        VALUES('','$nombreChatUsuario','$nombre','$comentarioLimpio','$fechaHoy','','$deQuienHabla[0]','$deQuienHabla[1]','$deQuienHabla[2]','$deQuienHabla[3]','$deQuienHabla[4]','$deQuienHabla[5]','$deQuienHabla[6]','$deQuienHabla[7]','$deQuienHabla[8]','$deQuienHabla[9]','$deQuienHabla[10]','$deQuienHabla[11]','$deQuienHabla[12]','$deQuienHabla[13]','$deQuienHabla[14]','$deQuienHabla[15]','$deQuienHabla[16]','$deQuienHabla[17]','$deQuienHabla[18]','$deQuienHabla[19]','$deQuienHabla[20]','$deQuienHabla[21]','$deQuienHabla[22]','$deQuienHabla[23]','$deQuienHabla[24]','$deQuienHabla[25]','$deQuienHabla[26]','$deQuienHabla[27]','$deQuienHabla[28]','$deQuienHabla[29]','$deQuienHabla[30]','$deQuienHabla[31]','$deQuienHabla[32]','$deQuienHabla[33]','$deQuienHabla[34]','$deQuienHabla[35]','$deQuienHabla[36]','$deQuienHabla[37]','$deQuienHabla[38]','$deQuienHabla[39]','$deQuienHabla[40]','$deQuienHabla[41]','$deQuienHabla[42]','$deQuienHabla[43]','$deQuienHabla[44]','$deQuienHabla[45]','$deQuienHabla[46]','$deQuienHabla[47]','$deQuienHabla[48]','$deQuienHabla[49]','$deQuienHabla[50]','$deQuienHabla[51]','$deQuienHabla[52]','$deQuienHabla[53]','$deQuienHabla[54]','$deQuienHabla[55]','$deQuienHabla[56]','$deQuienHabla[57]','$deQuienHabla[58]','$deQuienHabla[59]','$deQuienHabla[60]','$deQuienHabla[61]','$deQuienHabla[62]','$deQuienHabla[63]','$deQuienHabla[64]','$deQuienHabla[65]','$deQuienHabla[66]','$deQuienHabla[67]','$deQuienHabla[68]','$deQuienHabla[69]','$deQuienHabla[70]','$deQuienHabla[71]','$deQuienHabla[72]','$deQuienHabla[73]','$deQuienHabla[74]','$deQuienHabla[75]','$deQuienHabla[76]','$deQuienHabla[77]','$deQuienHabla[78]','$deQuienHabla[79]','$deQuienHabla[80]','$deQuienHabla[81]','$deQuienHabla[82]','$deQuienHabla[83]','$deQuienHabla[84]','$deQuienHabla[85]','$deQuienHabla[86]','$deQuienHabla[87]','$deQuienHabla[88]','$deQuienHabla[89]','$deQuienHabla[90]','$deQuienHabla[91]','$deQuienHabla[92]','$deQuienHabla[93]','$deQuienHabla[94]','$deQuienHabla[95]','$deQuienHabla[96]','$deQuienHabla[97]','$deQuienHabla[98]','$deQuienHabla[99]','$deQuienHabla[100]','$deQuienHabla[101]','$deQuienHabla[102]','$deQuienHabla[103]','$deQuienHabla[104]','$deQuienHabla[105]','$deQuienHabla[106]','$deQuienHabla[107]','$deQuienHabla[108]','$deQuienHabla[109]','$deQuienHabla[110]','$deQuienHabla[111]','$deQuienHabla[112]','$deQuienHabla[113]','$deQuienHabla[114]','$deQuienHabla[115]','$deQuienHabla[116]','$deQuienHabla[117]','$deQuienHabla[118]','$deQuienHabla[119]','$deQuienHabla[120]','$deQuienHabla[121]','$deQuienHabla[122]','$deQuienHabla[123]','$deQuienHabla[124]','$deQuienHabla[125]','$deQuienHabla[126]','$deQuienHabla[127]','$deQuienHabla[128]')";
                                    if($conn->query($sql)==TRUE){}
                                    else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;
                                    //}
                                    ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    ////////////////////////////////////////ya almacene el registro dejando vacia la respuesta, ahora cada 10 segundos revisa si ya tiene respuesta////////////////////////////////////////
                                    ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    //como no le tiene respuesta a esa frase, espera unos segundos y busca si ya le pusieron respuesta, esto hasta que si tenga respuesta y se la devuelve
                                    $respuestaALaFrase=mysql_query("SELECT respuestaAComentario FROM taita923_datosPersonas.converzaciones9meses  WHERE replace(comentario,' ','') like replace('".$comentarioLimpio."',' ','')");
                                    //echo $usuarioYaAlmacenado;
                                    if (!$respuestaALaFrase) {
                                         echo 'Could not run query: ' . mysql_error();
                                         exit;
                                    }
                                    $respuestaALaFraseCalculado=mysql_fetch_row($respuestaALaFrase);
                                    $respuestaALaFraseCalculadoTexto = $respuestaALaFraseCalculado[0];
                                    $contador=1;
                                    ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    ////////////////////////////////////////mantiene buscandole respuesta a la frase hasta que la encuentre////////////////////////////////////////
                                    ////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    //set_time_limit(200);
                                    //max_execution_time= 200;
                                    //teoricamente esta funcion se ejecuta cuando la frase es nueva y no conocemos su respuesta, entonces el crea el registro sin respuesta y cada 10 segundos revisa si ya tiene respuesta y cuando alfin tenga respuesta se la entrega, el problema es qu php no puede esperar mas de 60 segundos hay que hacerla en javascript pero yo no puedo
                                    //Espera y entrega la respuesta 
                                                           
                                    list ($idDeLaFrase,$respuestaEncontrada)=buscaRespuestaAFrase($comentarioLimpio,$nombreChatUsuario,$respuestaALaFraseCalculadoTexto,$contador);
                                    //$aleatrorio=rand(9,20);
                                    //sleep($aleatrorio);
                                    //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaALaFraseCalculadoTexto) . "\n");
                                    return array($idDeLaFrase,$respuestaEncontrada);
                            }


                }























                function vaciaRespuestaIncorrecta($nombreChatUsuario,$nombre,$comentarioLimpio) {  
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////Si la persona envia el comando respuesta incorrecta es por que la respuesta que recibio esta incorrecta, entonces se diculpa y en la base de datos la respuesta a esa frase la pasa a vacio para que despues el admin la llene bien////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $servername='localhost';
                    $username='taita923_chris';
                    $password='mantarraya1';
                    $dbname='taita923_datosPersonas';
                    $conn= new mysqli($servername,$username,$password,$dbname);
                    $connection=@mysql_connect($servername,$username,$password);
                    //Si la persona envia el comando respuesta incorrecta es por que la respuesta que recibio esta incorrecta, entonces se diculpa y en la base de datos la respuesta a esa frase la pasa a vacio para que despues el admin la llene bien
                    if(substr_count($comentarioLimpio, 'eso no es lo que yo le estaba preguntando')==1 or substr_count($comentarioLimpio, 'eso no es lo que yo te estaba preguntando')==1 or substr_count($comentarioLimpio, 'eso no es lo que le estaba preguntando')==1 or substr_count($comentarioLimpio, 'eso no es lo que te estaba preguntando')==1 or substr_count($comentarioLimpio, 'eso no es lo que yo estaba preguntando')==1 or substr_count($comentarioLimpio, 'eso no es lo que estaba preguntando')==1 or substr_count($comentarioLimpio, 'la respuesta esta mal')==1 or substr_count($comentarioLimpio, 'que pena pero esa no es mi pregunta')==1 or substr_count($comentarioLimpio, 'esa respuesta esta mal')==1 or substr_count($comentarioLimpio, 'no pero yo no estoy preguntando eso')==1 or substr_count($comentarioLimpio, 'pero yo no estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'pero yo no le estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'pero yo no te estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'pero no le estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'pero no estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'pero no te estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'no le estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'no te estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'no estoy hablando de eso')==1 or substr_count($comentarioLimpio, 'esa no era mi pregunta')==1 or substr_count($comentarioLimpio, 'esa no es mi pregunta')==1 or substr_count($comentarioLimpio, 'creo que te equivocaste en esa respuesta')==1 or substr_count($comentarioLimpio, 'no pero esa no es mi pregunta')==1 or substr_count($comentarioLimpio, 'no estoy diciendo eso')==1 or substr_count($comentarioLimpio, 'yo no le estoy diciendo eso')==1 or substr_count($comentarioLimpio, 'yo no te estoy diciendo eso')==1 or substr_count($comentarioLimpio, 'yo no estoy diciendo eso')==1 or substr_count($comentarioLimpio, 'disculpa pero esa no es mi pregunta')==1 or substr_count($comentarioLimpio, 'pero eso no era lo que le estaba preguntando')==1 or substr_count($comentarioLimpio, 'pero eso no era lo que yo te estaba preguntando')==1 or substr_count($comentarioLimpio, 'pero eso no era lo que yo le estaba preguntando')==1 or substr_count($comentarioLimpio, 'no te estaba preguntando eso')==1 or substr_count($comentarioLimpio, 'no le estaba preguntando eso')==1 or substr_count($comentarioLimpio, 'yo no te estaba preguntando eso')==1 or substr_count($comentarioLimpio, 'no pero yo no te estaba preguntando eso')==1 or substr_count($comentarioLimpio, 'no pero yo no le estaba preguntando eso')==1 or substr_count($comentarioLimpio, 'yo no estaba preguntando eso')==1 or substr_count($comentarioLimpio, 'no pero yo no estaba preguntando eso')==1 or substr_count($comentarioLimpio, 'no pero yo no te pregunte eso')==1 or substr_count($comentarioLimpio, 'no pero yo no le pregunte eso')==1 or substr_count($comentarioLimpio, 'no pero yo no pregunte eso')==1 or substr_count($comentarioLimpio, 'que pena pero yo no le pregunte eso')==1 or substr_count($comentarioLimpio, 'que pena yo no pregunte eso')==1 or substr_count($comentarioLimpio, 'pero esa no era mi pregunta')==1 or substr_count($comentarioLimpio, 'eso no es lo que yo pregunte')==1 or substr_count($comentarioLimpio, 'disculpe pero yo no pregunte eso')==1 or substr_count($comentarioLimpio, 'disculpa pero yo no pregunte eso')==1 or substr_count($comentarioLimpio, 'pero esa no era mi pregunta')==1 or substr_count($comentarioLimpio, 'esa no era mi pregunta')==1 or substr_count($comentarioLimpio, 'no pero no le pregunte eso')==1 or substr_count($comentarioLimpio, 'no pero no te pregunte eso')==1 or substr_count($comentarioLimpio, 'no pero no pregunte eso')==1 or substr_count($comentarioLimpio, 'osea que que')==1 or substr_count($comentarioLimpio, 'no entiendo lo que me dice')==1 or substr_count($comentarioLimpio, 'no entiendo lo que me dices')==1 or substr_count($comentarioLimpio, 'que eso no es lo que yo estaba preguntando')==1 or substr_count($comentarioLimpio, 'disculpa pero no me queda claro')==1 or substr_count($comentarioLimpio, 'disculpe pero no me queda claro')==1 or substr_count($comentarioLimpio, 'no me queda muy claro')==1 or substr_count($comentarioLimpio, 'esa respuesta esta equivocada')==1 or substr_count($comentarioLimpio, 'creo que esa respuesta esta mal')==1 or substr_count($comentarioLimpio, 'esa respuesta esta mal')==1 or substr_count($comentarioLimpio, 'no pero esa respuesta esta equivocada')==1 or substr_count($comentarioLimpio, 'no le estoy preguntando eso')==1 or substr_count($comentarioLimpio, 'no te estoy preguntando eso')==1 or substr_count($comentarioLimpio, 'no pero no pregunte eso')==1 or substr_count($comentarioLimpio, 'no pregunte eso')==1 or substr_count($comentarioLimpio, 'oye creo que esa respuesta esta mal')==1 or substr_count($comentarioLimpio, 'como asi')==1 or substr_count($comentarioLimpio, 'no me queda claro')==1 or substr_count($comentarioLimpio, 'nome queda claro')==1 or substr_count($comentarioLimpio, 'no le entendi')==1 or substr_count($comentarioLimpio, 'no te entendi')==1 or substr_count($comentarioLimpio, 'no entendi')==1 or substr_count($comentarioLimpio, 'no le entiendo')==1 or substr_count($comentarioLimpio, 'no te entiendo')==1 or substr_count($comentarioLimpio, 'no entiendo')==1 or substr_count($comentarioLimpio, 'esa respuesta esta mal')==1 or substr_count($comentarioLimpio, 'me parece que la respuesta es incorrecta')==1 or substr_count($comentarioLimpio, 'respuesta incorrecta')==1 or substr_count($comentarioLimpio, 'la respuesta es incorrecta')==1 or substr_count($comentarioLimpio, 'respuesta equivocada')==1 or substr_count($comentarioLimpio, 'respuestaincorrecta')==1 or substr_count($comentarioLimpio, 'respuesta incorecta')==1){
                        //traigo el id de la ultima frase que dio la persona
                        $idUltimaconversacion=mysql_query("SELECT id FROM taita923_datosPersonas.converzaciones9meses  WHERE  idUsuario=".$nombreChatUsuario." order by id desc limit 1");
                        //echo $idUltimaconversacion;
                        if (!$idUltimaconversacion) {
                        echo 'Could not run query: ' . mysql_error();
                        exit;
                        }
                        $idUltimaconversacionCalculado=mysql_fetch_row($idUltimaconversacion);                          
                        $idUltimaconversacionCalculadoNumero=$idUltimaconversacionCalculado[0];  
                        //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $idUltimaconversacionCalculadoNumero) . "\n");


                        //Y ahora convierto en vacio a la respuesta de la frase de ese id  
                        $sql="UPDATE taita923_datosPersonas.converzaciones9meses  SET respuestaAComentario='' WHERE id=".$idUltimaconversacionCalculadoNumero."";
                        if($conn->query($sql)==TRUE){}
                        else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;  

                        //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'Gracias por corregirme, mañana tendré la respuesta correcta a tu pregunta') . "\n");
                        //si tuvo que corregir una respuesta equivocada volviendola vacia, entonces deberia darle una respuesta diciendo que gracias por corregirme pero no deberia seguir ejecutando las funciones ni darle otra respuesta mas, asi que voy a devolver un 1 y si esta funcion devuelve un 1 es que tuvo que corregir una respuesta incorrecta entonces abajo en la parte donde devuelve uan respuesta devuelve solo el texto de gracias por corregirme y no mas
                        $tuveQueCorregir=1;
                        return $tuveQueCorregir;
                        //die();
                    }
                    else
                    {
                        $tuveQueCorregir=0;
                        return $tuveQueCorregir;
                    }
                }










































                //Cuando se divide la respuesta en varios mensajes me pasa que como las tildes y eso los guarda todo raro, por ejemplo la é es &eacute; cuando va a separar toma la & y el ; como espacios y despues no puede rehacer la é. asi que convierto todas las &, ; y numeros en palabras clave y asi no me separa la palabra, luego la reconvierto en lo que era para la respuesta
                function corrigeTildesYNumerosEnRespuesta($comentario) {
                    $comentario=str_replace("chrisspalmer","&",$comentario);
                    $comentario=str_replace("chrispuntoycoma",";",$comentario);
                    $comentario=str_replace("chrispunto",".",$comentario);
                    $comentario=str_replace("chriscoma",",",$comentario);
                    $comentario=str_replace("chricero","0",$comentario);
                    $comentario=str_replace("chrisuno","1",$comentario);
                    $comentario=str_replace("chrisdos","2",$comentario);
                    $comentario=str_replace("christres","3",$comentario);
                    $comentario=str_replace("chriscuatro","4",$comentario);
                    $comentario=str_replace("chriscinco","5",$comentario);
                    $comentario=str_replace("chrisseis","6",$comentario);
                    $comentario=str_replace("chrissiete","7",$comentario);
                    $comentario=str_replace("chrisocho","8",$comentario);
                    $comentario=str_replace("chrisnueve","9",$comentario);
                    
                    return $comentario;
                }



























































                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////Ejecuto las funciones////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////   
                $comentario=$message;
                $nombre=$nickname;
                $nombreChatUsuario=$_SESSION['FBID'];
                $correoUsuario=$_SESSION['EMAIL'];    
                //me conecto a la base de datos
                $servername='localhost';
                $username='taita923_chris';
                $password='mantarraya1';
                $dbname='taita923_datosPersonas';
                $conn= new mysqli($servername,$username,$password,$dbname);
                $connection=@mysql_connect($servername,$username,$password);

                //esta variable dice cuantas frases se van a recalcular sus vectores cada vez que una persona escribe(esto pasa siempre por que se estan agregando temas y se estan haciendoi cambios en las palabras de los temas)
                $numFrasesARecalcularVectorEnCadaRefrescada=24;//puse que actualice 24 frases por que es rapudo, y normalmente una vista de sql me muestra 25(las 24 que arreglo y la que acabo de escribir)
                
                    //ahora vamos a recalcular el vector para cada frase en la tabla conversaciones
                                //primero cuento las converzaciones
                                $totalConverzaciones=mysql_query("SELECT count(id) FROM taita923_datosPersonas.converzaciones9meses");
                                if (!$totalConverzaciones) {
                                    echo 'Could not run query: ' . mysql_error();
                                    exit;
                                }
                                $totalConverzacionesCalculado=mysql_fetch_row($totalConverzaciones);
                                $totalConverzacionesNumero=$totalConverzacionesCalculado[0];

                                //Como el recalculo de vector para tooodas las farses que ya estan en la base de datos se denmora tanto pues el programa se frita, asi que cuando creamos un nuevo tema solo recalcula el vector a las primeras N y las envia al final, y k veces al dia hace calculos de tamaño N y asi por siempre lo que ayuda a que si se hacen ca,bios en los temas, als frases se refresquen rapido en tertminos de sus vectores, uso dos parametroos, el numero de frases que recalcula en cada totazo y el tiempo minimo al que ay debe hacer el siguiente recalculo
                                //por lo escrito arribita es que ahora recorro hasta el N que yo indico
                                //$numFrasesARecalcularVectorEnCadaRefrescada=500;
                                $totalConverzacionesNumero=$numFrasesARecalcularVectorEnCadaRefrescada;
                                //ahora para cada converzacion le calculo su vector y actualizo sus valores en la tabla
                                for ($i = 1; $i <= $totalConverzacionesNumero; $i++){                       
                                    //traigo el vector completo
                                    $registroConverzacion=mysql_query("SELECT * FROM taita923_datosPersonas.converzaciones9meses where id=".$i."");
                                    if (!$registroConverzacion) {
                                        echo 'Could not run query: ' . mysql_error();
                                        exit;
                                    }
                                    $registroConverzacionCalculado=mysql_fetch_row($registroConverzacion);

                                    //a la frase que es la posocion 3 (por que va desde 0) le calculo su nuevo vector
                                    $comentarioLimpio=limpiaTexto($registroConverzacionCalculado[3]);
                                    $tuvoQueVaciarREspuestaEquivocada=0; 
                                    $numeroDeTemasEnBaseCalculado=cuentaTemasCreados();
                                    $deQuienHabla=analizaFrecuenciaDeTemasEnLaFrase($comentarioLimpio,$numeroDeTemasEnBaseCalculado);

                                    //voy eliminando el registro para reemplazarlo por el nuevo
                                    //$sql="DELETE FROM taita923_datosPersonas.converzaciones9meses  WHERE id=".$i."";
                                    //if($conn->query($sql)==TRUE){}
                                    //else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;

                                    //y se actualiza el registro con sus nuevos valores
                                    $sql="INSERT INTO taita923_datosPersonas.converzaciones9meses        VALUES('','$registroConverzacionCalculado[1]','$registroConverzacionCalculado[2]','$registroConverzacionCalculado[3]','$registroConverzacionCalculado[4]','$registroConverzacionCalculado[5]','$deQuienHabla[0]','$deQuienHabla[1]','$deQuienHabla[2]','$deQuienHabla[3]','$deQuienHabla[4]','$deQuienHabla[5]','$deQuienHabla[6]','$deQuienHabla[7]','$deQuienHabla[8]','$deQuienHabla[9]','$deQuienHabla[10]','$deQuienHabla[11]','$deQuienHabla[12]','$deQuienHabla[13]','$deQuienHabla[14]','$deQuienHabla[15]','$deQuienHabla[16]','$deQuienHabla[17]','$deQuienHabla[18]','$deQuienHabla[19]','$deQuienHabla[20]','$deQuienHabla[21]','$deQuienHabla[22]','$deQuienHabla[23]','$deQuienHabla[24]','$deQuienHabla[25]','$deQuienHabla[26]','$deQuienHabla[27]','$deQuienHabla[28]','$deQuienHabla[29]','$deQuienHabla[30]','$deQuienHabla[31]','$deQuienHabla[32]','$deQuienHabla[33]','$deQuienHabla[34]','$deQuienHabla[35]','$deQuienHabla[36]','$deQuienHabla[37]','$deQuienHabla[38]','$deQuienHabla[39]','$deQuienHabla[40]','$deQuienHabla[41]','$deQuienHabla[42]','$deQuienHabla[43]','$deQuienHabla[44]','$deQuienHabla[45]','$deQuienHabla[46]','$deQuienHabla[47]','$deQuienHabla[48]','$deQuienHabla[49]','$deQuienHabla[50]','$deQuienHabla[51]','$deQuienHabla[52]','$deQuienHabla[53]','$deQuienHabla[54]','$deQuienHabla[55]','$deQuienHabla[56]','$deQuienHabla[57]','$deQuienHabla[58]','$deQuienHabla[59]','$deQuienHabla[60]','$deQuienHabla[61]','$deQuienHabla[62]','$deQuienHabla[63]','$deQuienHabla[64]','$deQuienHabla[65]','$deQuienHabla[66]','$deQuienHabla[67]','$deQuienHabla[68]','$deQuienHabla[69]','$deQuienHabla[70]','$deQuienHabla[71]','$deQuienHabla[72]','$deQuienHabla[73]','$deQuienHabla[74]','$deQuienHabla[75]','$deQuienHabla[76]','$deQuienHabla[77]','$deQuienHabla[78]','$deQuienHabla[79]','$deQuienHabla[80]','$deQuienHabla[81]','$deQuienHabla[82]','$deQuienHabla[83]','$deQuienHabla[84]','$deQuienHabla[85]','$deQuienHabla[86]','$deQuienHabla[87]','$deQuienHabla[88]','$deQuienHabla[89]','$deQuienHabla[90]','$deQuienHabla[91]','$deQuienHabla[92]','$deQuienHabla[93]','$deQuienHabla[94]','$deQuienHabla[95]','$deQuienHabla[96]','$deQuienHabla[97]','$deQuienHabla[98]','$deQuienHabla[99]','$deQuienHabla[100]','$deQuienHabla[101]','$deQuienHabla[102]','$deQuienHabla[103]','$deQuienHabla[104]','$deQuienHabla[105]','$deQuienHabla[106]','$deQuienHabla[107]','$deQuienHabla[108]','$deQuienHabla[109]','$deQuienHabla[110]','$deQuienHabla[111]','$deQuienHabla[112]','$deQuienHabla[113]','$deQuienHabla[114]','$deQuienHabla[115]','$deQuienHabla[116]','$deQuienHabla[117]','$deQuienHabla[118]','$deQuienHabla[119]','$deQuienHabla[120]','$deQuienHabla[121]','$deQuienHabla[122]','$deQuienHabla[123]','$deQuienHabla[124]','$deQuienHabla[125]','$deQuienHabla[126]','$deQuienHabla[127]','$deQuienHabla[128]')";
                                    if($conn->query($sql)==TRUE){}
                                    else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;                            
                                }

                                //Ahora  elimino los registros antiguos
                                 $sql="DELETE FROM taita923_datosPersonas.converzaciones9meses  WHERE id<=".$totalConverzacionesNumero."";
                                 if($conn->query($sql)==TRUE){}
                                 else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;

                                //y pongo el id desde 1 en adelante
                                //for ($i = 1; $i <= $totalConverzacionesNumero; $i++){                       
                                //    $idACambiar=$totalConverzacionesNumero+$i;
                                //    $sql="UPDATE taita923_datosPersonas.converzaciones9meses  SET id=".$i." WHERE id=".$idACambiar."";
                                //    if($conn->query($sql)==TRUE){}
                                //    else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;                            
                                //}
                                 $sql="UPDATE taita923_datosPersonas.converzaciones9meses  SET id=id-".$totalConverzacionesNumero."";
                                 if($conn->query($sql)==TRUE){}
                                 else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;


                                //y guardo en la tabla de recalculos la hora del ultimo recalculo
                                // $horaUltimoRecalculo=date("h:i:sa");
                                // $sql="UPDATE taita923_datosPersonas.ultimoRecalculoVectoresConverzaciones9meses  SET horaUltimoRecalculoVectoresNPrimerasFrases=".$horaUltimoRecalculo." WHERE id=1";
                                // if($conn->query($sql)==TRUE){}
                                // else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;


                                //y pongo el autoincremental en donde debe ir
                                $idMaximoRegistrado=mysql_query("SELECT max(id) FROM taita923_datosPersonas.converzaciones9meses");
                                if (!$idMaximoRegistrado) {
                                    echo 'Could not run query: ' . mysql_error();
                                    exit;
                                }
                                $idMaximoRegistradoCalculado=mysql_fetch_row($idMaximoRegistrado);
                                $idMaximoRegistradoNumero=$idMaximoRegistradoCalculado[0];
                                $autoIncremental=$idMaximoRegistradoNumero+1;
                                $sql="ALTER TABLE taita923_datosPersonas.converzaciones9meses  auto_increment=".$autoIncremental."";
                                if($conn->query($sql)==TRUE){}
                                else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;
                










                //si quien escribio es la flaca pues es por que le estaba respondiendo a una mamita, y eso ya lo hizo arriba asi que si ella escribe a su frase no le debe ejecutar nada de esto
                if($nombreChatUsuario!=2026380267589823)
                    {
                        $comentarioLimpio=limpiaTexto($comentario); 
                        $tuvoQueVaciarREspuestaEquivocada=vaciaRespuestaIncorrecta($nombreChatUsuario,$nombre,$comentarioLimpio);
                        $numeroDeTemasEnBaseCalculado=cuentaTemasCreados();
                        $deQuienHabla=analizaFrecuenciaDeTemasEnLaFrase($comentarioLimpio,$numeroDeTemasEnBaseCalculado);  
                        list ($objetoGanador, $distanciaATemaGanador) = mahalanobis($deQuienHabla,$nombreChatUsuario,$comentario);  
                        // si lo estoy usando yo chris, me muestra este valor para verificar que todo este bien
                        //if($nombreChatUsuario==10154655318669080){
                        //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", 'Objeto ganador: id '.$objetoGanador[0] .' con respuesta: '. $objetoGanador[4]. ', y con distancia de: '.$distanciaATemaGanador. '. 1 si tuvo que vaciar respuesta equivocada 0 si no: '.$tuvoQueVaciarREspuestaEquivocada) . "\n");
                        //}
                        almacenoNuevoUsuario($nombreChatUsuario,$nombre,$correoUsuario);                     
                        $distanciaMaximaNivelDeSeguridad=0.00004;  //si la respuesta ganadora esta verdaderamente cerca a la pregunta realizada entonces le da la respuesta, si no lo esta entonces envia alerta para que se de a mano
                        list ($idDeLaFrase,$respuesta)=encuentraRespuesta($nombreChatUsuario,$nombre,$comentarioLimpio,$objetoGanador,$distanciaMaximaNivelDeSeguridad,$distanciaATemaGanador,$deQuienHabla);
                        








                        //si la respuesta que encontro es fraseincompleta la une con la alnterior frase y vuelve a ejecutarle todo

                        if(substr_count($respuesta, 'fraseincompleta')==1 or substr_count($respuesta, 'fraseIncompleta')==1 or substr_count($respuesta, 'frase incompleta')==1 or substr_count($respuesta, 'fri')==1 or substr_count($respuesta, 'fras incompleta')==1){
                            //$respuesta='uniendo con la anterior frase';

                            $conversacionAnteriorId=mysql_query("SELECT id FROM taita923_datosPersonas.converzaciones9meses  WHERE id<".$idDeLaFrase." and idUsuario=".$nombreChatUsuario." order by id desc limit 1");
                            if (!$conversacionAnteriorId) {
                                echo 'Could not run query: ' . mysql_error();
                                exit;
                            }
                            $conversacionAnteriorIdCalculado=mysql_fetch_row($conversacionAnteriorId);
                            $conversacionAnteriorIdNumero=$conversacionAnteriorIdCalculado[0];
                            //$respuesta=$conversacionAnteriorIdNumero;
                            $conversacionAnterior=mysql_query("SELECT comentario FROM taita923_datosPersonas.converzaciones9meses  WHERE id=".$conversacionAnteriorIdNumero." and idUsuario=".$nombreChatUsuario." order by id desc limit 1");
                            if (!$conversacionAnterior) {
                                echo 'Could not run query: ' . mysql_error();
                                exit;
                            }
                            $conversacionAnteriorCalculado=mysql_fetch_row($conversacionAnterior);
                            $conversacionAnteriorTexto=$conversacionAnteriorCalculado[0];
                            //$respuesta=$conversacionAnteriorTexto;
                            $conversacionAnteriorRespuesta=mysql_query("SELECT respuestaAComentario FROM taita923_datosPersonas.converzaciones9meses  WHERE id=".$conversacionAnteriorIdNumero." and idUsuario=".$nombreChatUsuario." order by id desc limit 1");
                            if (!$conversacionAnteriorRespuesta) {
                                echo 'Could not run query: ' . mysql_error();
                                exit;
                            }
                            $conversacionAnteriorRespuestaCalculado=mysql_fetch_row($conversacionAnteriorRespuesta);
                            $conversacionAnteriorRespuestaTexto=$conversacionAnteriorRespuestaCalculado[0];
                            $conversacionAnteriorRespuestaTextoLimpio=limpiaTexto($conversacionAnteriorRespuestaTexto);
                            //$respuesta=$conversacionAnteriorTexto;
                            $nuevaFraseUnida=$conversacionAnteriorTexto." ".$conversacionAnteriorRespuestaTextoLimpio." ".$comentarioLimpio;
                            //$respuesta=$nuevaFraseUnida;
                            $tuvoQueVaciarREspuestaEquivocada=vaciaRespuestaIncorrecta($nombreChatUsuario,$nombre,$nuevaFraseUnida);
                            $numeroDeTemasEnBaseCalculado=cuentaTemasCreados();
                            $deQuienHabla=analizaFrecuenciaDeTemasEnLaFrase($nuevaFraseUnida,$numeroDeTemasEnBaseCalculado);  
                            list ($objetoGanador, $distanciaATemaGanador) = mahalanobis($deQuienHabla,$nombreChatUsuario,$comentario);   
                            almacenoNuevoUsuario($nombreChatUsuario,$nombre,$correoUsuario);                     
                            $distanciaMaximaNivelDeSeguridad=0.00004;  //si la respuesta ganadora esta verdaderamente cerca a la pregunta realizada entonces le da la respuesta, si no lo esta entonces envia alerta para que se de a mano
                            list ($idDeLaFrase,$respuesta)=encuentraRespuesta($nombreChatUsuario,$nombre,$nuevaFraseUnida,$objetoGanador,$distanciaMaximaNivelDeSeguridad,$distanciaATemaGanador,$deQuienHabla);
                                
                        }













                        //si el comentario es chrisagreganuevotema1982 es que quiero agregar un nuevo tema, lo agrega y para cada frase de la base le vuelve a calcular el vector
                        if(substr_count($comentarioLimpio, 'chrisagreganuevotema1982')==1 or substr_count($comentarioLimpio, 'chrisagrganuevotema1982')==1 or substr_count($comentarioLimpio, 'chris agrega nuevo tema 1982')==1 or substr_count($comentarioLimpio, 'chris agrega nuevo tma 1982')==1 or substr_count($comentarioLimpio, 'cris agrega nuvo tema 1982')==1){
                            //$respuesta='uniendo con la anterior frase';
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                            ////////////////////////////////////////Cada vez que agregue un nuevo tema debo agregar un nuevo valor en las dos consultas de sql que dicen insert, en el archivo del chat y en su funcion llamada encuentraRespuesta////////////////////////////////////////
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        
                            //funcion que crea un nuevo sujeto, tema, sentimiento, etcetera              
                            //me conecto a la base de datos
                            $servername='localhost';
                            $username='taita923_chris';
                            $password='mantarraya1';
                            $dbname='taita923_datosPersonas';
                            $conn= new mysqli($servername,$username,$password,$dbname);
                            $connection=@mysql_connect($servername,$username,$password);


                            /////////////////////////////CATEGORIAS//////////////////////////////////////////////
                            //nada- dejarlo siempre 
                            //sujeto- es una persona de la que se habla como yo, usted, mi mama, mi papa, (de mi, de usted, bebe niño, bebe niña, hijo, hija, esposo, esposa, novio, novia, papa, mama, hermano, hermana, papas, hijos, hermanos, abuelo, abuela, abuelos, amigo, amiga, amigos, tio, tia, tios, sobrina, sobrino, sobrinos,perro, gato, carro, medico, casa, hospital,moto, universidad, trabajo)
                            //tema- es el tema de que trata la charla, puede ser dolor de estomago, un saludo, una invitacion.......
                            //sentimiento amor, fe, felicidad, valentia, tranquilidad, gratitud, respeto, amistad, comprension, autonomia, ansiedad, depresion, odio, tristeza, dolor, remordimiento, envidia, enojo, impaciencia, desconfianza, nerviosismo, miedo 
                            //tiempo- pasado re contra lejano(mas de 4 años), pasado super lejano(hasta 4 años),pasado muy lejano(hasta 9 meses),pasado lejano(hasta 4 meses), pasado cercano(hasta 1 mes), pasado reciente(hasta 1 semana), presente, futuro reciente, futuro cercano, futuro lejano
                            //cantidades mucho, poco, regular
                            //edades- embarazo, bebe, niño, adolescente, joven, adulto, adulto mayor
                            //modos- bien, mal, despacio, rapido, facil,ente
                            //dudas- quizas, probablemente, tal vez
                            //cifras
                            //intencion- chistes,insultos,preguntas, afirmar, negar, burlar, informar, 
                            //

                            //las palabras asociadas se sacan usando adjetivos posesivos, demostrativos, indefinicos y calificativos, articulos, pronombres personales, demostrativos, posesivos, exclamativos, indefinidos, relativos  e interrogativos
                            //NO USAR Ñ entiende lo que dije, agradece
                             $nombreCategoria='tema';
                             $nombreSubCategoria='saber sobre el curso prenatal';
                             $palabraDeReemplazo='saberCursoPrenatal';
                             $palabrasAsociadas=array('curso','cursos','dan','sobre','saber','gratis','gratuito','gratuitos','prenatal','pre','natal','embarazada','embarazadas'
                                ,'informar','curzo','kurso','kursos','crso','crsos','maternidad','preparacion','materna','maternas','embarasada','embarasadas'
                                ,'preparar','prepararme','saber','conocer','quiero','dica','dicta','dictan','dictas','virtual','presencial','certifican','certificado'
                                ,'dertificar','pareja','persona','esposo','marido','papa','urso','ursos','prnatales','prnatal','sorteo','sortean','enbarazadas','envarazadas'
                                ,'curos','curso','curzos','natl','pe','penatl','informacion','informasion','informarme','valen','vale','precio','cuesta','costaria'
                                ,'costo','preparasion','prepracion','paracion');
                             //si el nuevo tema no tiene categoria pues no lo agrega(osea debe pasar dos filtros, que tenga tema y que yo halla dado la orden de agregar nuevo tema)
                             if(substr_count($nombreCategoria, 'nada')==1){

                                  $respuesta='El nuevo tema no tiene categoria';   
                             }
                             else{

                                 for ($k = 0; $k <= 70; $k++){
                                        if(substr_count($palabrasAsociadas[$k], ' ')==1 or substr_count($palabrasAsociadas[$k], '')==1 or substr_count($palabrasAsociadas[$k], ' ')==1 or $palabrasAsociadas[$k]==' ' or $palabrasAsociadas[$k]==''){
                                            $palabrasAsociadas[$k]='EstaPalabraEstaVaciaRellenarConPalabrasClaves';
                                        }
                                 }


                                 //crea el nuevo tema en la tabla de temas
                                 $sql="INSERT INTO taita923_datosPersonas.temas9meses   VALUES('','$nombreCategoria','$nombreSubCategoria','$palabraDeReemplazo','$palabrasAsociadas[0]','$palabrasAsociadas[1]','$palabrasAsociadas[2]','$palabrasAsociadas[3]','$palabrasAsociadas[4]','$palabrasAsociadas[5]','$palabrasAsociadas[6]','$palabrasAsociadas[7]','$palabrasAsociadas[8]','$palabrasAsociadas[9]','$palabrasAsociadas[10]','$palabrasAsociadas[11]','$palabrasAsociadas[12]','$palabrasAsociadas[13]','$palabrasAsociadas[14]','$palabrasAsociadas[15]','$palabrasAsociadas[16]','$palabrasAsociadas[17]','$palabrasAsociadas[18]','$palabrasAsociadas[19]','$palabrasAsociadas[20]','$palabrasAsociadas[21]','$palabrasAsociadas[22]','$palabrasAsociadas[23]','$palabrasAsociadas[24]','$palabrasAsociadas[25]','$palabrasAsociadas[26]','$palabrasAsociadas[27]','$palabrasAsociadas[28]','$palabrasAsociadas[29]','$palabrasAsociadas[30]','$palabrasAsociadas[31]','$palabrasAsociadas[32]','$palabrasAsociadas[33]','$palabrasAsociadas[34]','$palabrasAsociadas[35]','$palabrasAsociadas[36]','$palabrasAsociadas[37]','$palabrasAsociadas[38]','$palabrasAsociadas[39]','$palabrasAsociadas[40]','$palabrasAsociadas[41]','$palabrasAsociadas[42]','$palabrasAsociadas[43]','$palabrasAsociadas[44]','$palabrasAsociadas[45]','$palabrasAsociadas[46]','$palabrasAsociadas[47]','$palabrasAsociadas[48]','$palabrasAsociadas[49]','$palabrasAsociadas[50]','$palabrasAsociadas[51]','$palabrasAsociadas[52]','$palabrasAsociadas[53]','$palabrasAsociadas[54]','$palabrasAsociadas[55]','$palabrasAsociadas[56]','$palabrasAsociadas[57]','$palabrasAsociadas[58]','$palabrasAsociadas[59]','$palabrasAsociadas[60]','$palabrasAsociadas[61]','$palabrasAsociadas[62]','$palabrasAsociadas[63]','$palabrasAsociadas[64]','$palabrasAsociadas[65]','$palabrasAsociadas[66]','$palabrasAsociadas[67]','$palabrasAsociadas[68]','$palabrasAsociadas[69]','$palabrasAsociadas[70]')";
                                 if($conn->query($sql)==TRUE){}
                                 else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;


                                 //crea la nueva columna en converzaciones con el nombre del tema para que pueda hacer el vector
                                 $nombreSubCategoriaSinEspaciosNuevaColumna=str_replace(" ","",$nombreSubCategoria);
                                 $sql="ALTER TABLE  taita923_datosPersonas.converzaciones9meses ADD  ".$nombreSubCategoriaSinEspaciosNuevaColumna." FLOAT NOT NULL";
                                 if($conn->query($sql)==TRUE){}
                                 else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;



                                //ahora vamos a recalcular el vector para cada frase en la tabla conversaciones
                                //primero cuento las converzaciones
                                $totalConverzaciones=mysql_query("SELECT count(id) FROM taita923_datosPersonas.converzaciones9meses");
                                if (!$totalConverzaciones) {
                                    echo 'Could not run query: ' . mysql_error();
                                    exit;
                                }
                                $totalConverzacionesCalculado=mysql_fetch_row($totalConverzaciones);
                                $totalConverzacionesNumero=$totalConverzacionesCalculado[0];

                                //Como el recalculo de vector para tooodas las farses que ya estan en la base de datos se denmora tanto pues el programa se frita, asi que cuando creamos un nuevo tema solo recalcula el vector a las primeras N y las envia al final, y k veces al dia hace calculos de tamaño N y asi por siempre lo que ayuda a que si se hacen ca,bios en los temas, als frases se refresquen rapido en tertminos de sus vectores, uso dos parametroos, el numero de frases que recalcula en cada totazo y el tiempo minimo al que ay debe hacer el siguiente recalculo
                                //por lo escrito arribita es que ahora recorro hasta el N que yo indico
                                $numFrasesARecalcularVectorEnCadaRefrescada=200;
                                $totalConverzacionesNumero=$numFrasesARecalcularVectorEnCadaRefrescada;
                                //ahora para cada converzacion le calculo su vector y actualizo sus valores en la tabla
                                for ($i = 1; $i <= $totalConverzacionesNumero; $i++){                       
                                    //traigo el vector completo
                                    $registroConverzacion=mysql_query("SELECT * FROM taita923_datosPersonas.converzaciones9meses where id=".$i."");
                                    if (!$registroConverzacion) {
                                        echo 'Could not run query: ' . mysql_error();
                                        exit;
                                    }
                                    $registroConverzacionCalculado=mysql_fetch_row($registroConverzacion);

                                    //a la frase que es la posocion 3 (por que va desde 0) le calculo su nuevo vector
                                    $comentarioLimpio=limpiaTexto($registroConverzacionCalculado[3]);
                                    $tuvoQueVaciarREspuestaEquivocada=0; 
                                    $numeroDeTemasEnBaseCalculado=cuentaTemasCreados();
                                    $deQuienHabla=analizaFrecuenciaDeTemasEnLaFrase($comentarioLimpio,$numeroDeTemasEnBaseCalculado);

                                    //voy eliminando el registro para reemplazarlo por el nuevo
                                    //$sql="DELETE FROM taita923_datosPersonas.converzaciones9meses  WHERE id=".$i."";
                                    //if($conn->query($sql)==TRUE){}
                                    //else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;

                                    //y se actualiza el registro con sus nuevos valores
                                    $sql="INSERT INTO taita923_datosPersonas.converzaciones9meses        VALUES('','$registroConverzacionCalculado[1]','$registroConverzacionCalculado[2]','$registroConverzacionCalculado[3]','$registroConverzacionCalculado[4]','$registroConverzacionCalculado[5]','$deQuienHabla[0]','$deQuienHabla[1]','$deQuienHabla[2]','$deQuienHabla[3]','$deQuienHabla[4]','$deQuienHabla[5]','$deQuienHabla[6]','$deQuienHabla[7]','$deQuienHabla[8]','$deQuienHabla[9]','$deQuienHabla[10]','$deQuienHabla[11]','$deQuienHabla[12]','$deQuienHabla[13]','$deQuienHabla[14]','$deQuienHabla[15]','$deQuienHabla[16]','$deQuienHabla[17]','$deQuienHabla[18]','$deQuienHabla[19]','$deQuienHabla[20]','$deQuienHabla[21]','$deQuienHabla[22]','$deQuienHabla[23]','$deQuienHabla[24]','$deQuienHabla[25]','$deQuienHabla[26]','$deQuienHabla[27]','$deQuienHabla[28]','$deQuienHabla[29]','$deQuienHabla[30]','$deQuienHabla[31]','$deQuienHabla[32]','$deQuienHabla[33]','$deQuienHabla[34]','$deQuienHabla[35]','$deQuienHabla[36]','$deQuienHabla[37]','$deQuienHabla[38]','$deQuienHabla[39]','$deQuienHabla[40]','$deQuienHabla[41]','$deQuienHabla[42]','$deQuienHabla[43]','$deQuienHabla[44]','$deQuienHabla[45]','$deQuienHabla[46]','$deQuienHabla[47]','$deQuienHabla[48]','$deQuienHabla[49]','$deQuienHabla[50]','$deQuienHabla[51]','$deQuienHabla[52]','$deQuienHabla[53]','$deQuienHabla[54]','$deQuienHabla[55]','$deQuienHabla[56]','$deQuienHabla[57]','$deQuienHabla[58]','$deQuienHabla[59]','$deQuienHabla[60]','$deQuienHabla[61]','$deQuienHabla[62]','$deQuienHabla[63]','$deQuienHabla[64]','$deQuienHabla[65]','$deQuienHabla[66]','$deQuienHabla[67]','$deQuienHabla[68]','$deQuienHabla[69]','$deQuienHabla[70]','$deQuienHabla[71]','$deQuienHabla[72]','$deQuienHabla[73]','$deQuienHabla[74]','$deQuienHabla[75]','$deQuienHabla[76]','$deQuienHabla[77]','$deQuienHabla[78]','$deQuienHabla[79]','$deQuienHabla[80]','$deQuienHabla[81]','$deQuienHabla[82]','$deQuienHabla[83]','$deQuienHabla[84]','$deQuienHabla[85]','$deQuienHabla[86]','$deQuienHabla[87]','$deQuienHabla[88]','$deQuienHabla[89]','$deQuienHabla[90]','$deQuienHabla[91]','$deQuienHabla[92]','$deQuienHabla[93]','$deQuienHabla[94]','$deQuienHabla[95]','$deQuienHabla[96]','$deQuienHabla[97]','$deQuienHabla[98]','$deQuienHabla[99]','$deQuienHabla[100]','$deQuienHabla[101]','$deQuienHabla[102]','$deQuienHabla[103]','$deQuienHabla[104]','$deQuienHabla[105]','$deQuienHabla[106]','$deQuienHabla[107]','$deQuienHabla[108]','$deQuienHabla[109]','$deQuienHabla[110]','$deQuienHabla[111]','$deQuienHabla[112]','$deQuienHabla[113]','$deQuienHabla[114]','$deQuienHabla[115]','$deQuienHabla[116]','$deQuienHabla[117]','$deQuienHabla[118]','$deQuienHabla[119]','$deQuienHabla[120]','$deQuienHabla[121]','$deQuienHabla[122]','$deQuienHabla[123]','$deQuienHabla[124]','$deQuienHabla[125]','$deQuienHabla[126]','$deQuienHabla[127]','$deQuienHabla[128]')";
                                    if($conn->query($sql)==TRUE){}
                                    else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;                            
                                }

                                //Ahora  elimino los registros antiguos
                                 $sql="DELETE FROM taita923_datosPersonas.converzaciones9meses  WHERE id<=".$totalConverzacionesNumero."";
                                 if($conn->query($sql)==TRUE){}
                                 else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;

                                //y pongo el id desde 1 en adelante
                                //for ($i = 1; $i <= $totalConverzacionesNumero; $i++){                       
                                //    $idACambiar=$totalConverzacionesNumero+$i;
                                //    $sql="UPDATE taita923_datosPersonas.converzaciones9meses  SET id=".$i." WHERE id=".$idACambiar."";
                                //    if($conn->query($sql)==TRUE){}
                                //    else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;                            
                                //}
                                 $sql="UPDATE taita923_datosPersonas.converzaciones9meses  SET id=id-".$totalConverzacionesNumero."";
                                 if($conn->query($sql)==TRUE){}
                                 else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;


                                //y guardo en la tabla de recalculos la hora del ultimo recalculo
                                // $horaUltimoRecalculo=date("h:i:sa");
                                // $sql="UPDATE taita923_datosPersonas.ultimoRecalculoVectoresConverzaciones9meses  SET horaUltimoRecalculoVectoresNPrimerasFrases=".$horaUltimoRecalculo." WHERE id=1";
                                // if($conn->query($sql)==TRUE){}
                                // else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;



                                //y pongo el autoincremental en donde debe ir
                                $idMaximoRegistrado=mysql_query("SELECT max(id) FROM taita923_datosPersonas.converzaciones9meses");
                                if (!$idMaximoRegistrado) {
                                    echo 'Could not run query: ' . mysql_error();
                                    exit;
                                }
                                $idMaximoRegistradoCalculado=mysql_fetch_row($idMaximoRegistrado);
                                $idMaximoRegistradoNumero=$idMaximoRegistradoCalculado[0];
                                $autoIncremental=$idMaximoRegistradoNumero+1;
                                $sql="ALTER TABLE taita923_datosPersonas.converzaciones9meses  auto_increment=".$autoIncremental."";
                                if($conn->query($sql)==TRUE){}
                                else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;





                                $respuesta='Listo chris, el nuevo tema se agrego';   
                                 
                             }

                            
                        }





























































                             
                        //si yuvo que corregir vaciando una respuesta equivocada, la respuesta que le da es que gracias por corregirme, ademas de que ya arriba dejo en vacio esa respuesta. como luego va a unir lo ultimo que la persona escribio con la farse 'respuesta incorrecta', ahora va a dejarle vacia su respuesta para que luego el admin le ponga la que es, asi diga lalalalalala respuesta incorrecta, la respuesta debe ser a lo que diga en lalalalalala
                        if($tuvoQueVaciarREspuestaEquivocada==1){
                            $respuesta='Disculpame, creo que hoy no tengo la respuesta correcta para tu preg&uacute;nta pero ya ma&ntilde;ana la tendr&eacute;';
                            $servername='localhost';
                            $username='taita923_chris';
                            $password='mantarraya1';
                            $dbname='taita923_datosPersonas';
                            $conn= new mysqli($servername,$username,$password,$dbname);
                            $connection=@mysql_connect($servername,$username,$password);
                            //Si la persona envia el comando respuesta incorrecta es por que la respuesta que recibio esta incorrecta, entonces se diculpa y en la base de datos la respuesta a esa frase la pasa a vacio para que despues el admin la llene bien
                            //traigo el id de la ultima frase que dio la persona
                            $idUltimaconversacion=mysql_query("SELECT id FROM taita923_datosPersonas.converzaciones9meses  WHERE  idUsuario=".$nombreChatUsuario." order by id desc limit 1");
                            //echo $idUltimaconversacion;
                            if (!$idUltimaconversacion) {
                            echo 'Could not run query: ' . mysql_error();
                            exit;
                            }
                            $idUltimaconversacionCalculado=mysql_fetch_row($idUltimaconversacion);                          
                            $idUltimaconversacionCalculadoNumero=$idUltimaconversacionCalculado[0];  
                            //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $idUltimaconversacionCalculadoNumero) . "\n");


                            //Y ahora convierto en vacio a la respuesta de la frase de ese id  
                            $sql="UPDATE taita923_datosPersonas.converzaciones9meses  SET respuestaAComentario='' WHERE id=".$idUltimaconversacionCalculadoNumero."";
                            if($conn->query($sql)==TRUE){}
                            else{  
                                echo 'Error: '.$sql .'<br>'.$conn->error;
                            }
                            $conn->close;  
                        }



                    }//hasta aca va lo que no se ejecuta cuando la flaca escribe





                //si el mensaje viene de la flaca es por que a ella le llego un mensaje que no tenia respuesta por la IA, entonces lo que ella acaba de escribir es la respuesta, la primer palabra del mensaje es el idfacebook de quien debe recibir la respuesta
                if($nombreChatUsuario==2026380267589823)
                {
                    //como la primer palabra de la respuesta de la flaca es el id de quien necesita la respuesta, guardo ese ifd en una variable para ponerlo en el chat
                        //$respuesta = '10154655318669080 hola como estas';
                        $idFacebookPersonaAResponder = explode(' ',trim($comentario));
                        $nombreChatUsuario=$idFacebookPersonaAResponder[0];
                    //y tambien guardo el resto del mensaje de la flaca
                        $respuesta=substr(strstr($comentario," "), 1);
                    //fwrite(fopen($idFacebookPersonaAResponderNumero, 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $restoDelMensajeDeLaFlaca) . "\n");         
                    //fwrite(fopen($idFacebookPersonaAResponderNumero, 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $restoDelMensajeDeLaFlaca) . "\n");         
                }




                //los mensajes largos los divide en varios envios de mensajes, el limite de un mensaje es de 17 palabras osea que se hacen hasta 7 envios, si el numero de palabras dividido 17 da menor o igual que 1 son dos envios, que dos son 2 y asi y cada uno lleva un tiempo de espera     
                //Cuando se divide la respuesta en varios mensajes me pasa que como las tildes y eso los guarda todo raro, por ejemplo la é es &eacute; cuando va a separar toma la & y el ; como espacios y despues no puede rehacer la é. asi que convierto todas las &, ; y numeros en palabras clave y asi no me separa la palabra, luego la reconvierto en lo que era para la respuesta
                $respuesta=str_replace("&","chrisspalmer",$respuesta);
                $respuesta=str_replace(";","chrispuntoycoma",$respuesta);
                $respuesta=str_replace(".","chrispunto",$respuesta);
                $respuesta=str_replace(",","chriscoma",$respuesta);
                $respuesta=str_replace("0","chricero",$respuesta);
                $respuesta=str_replace("1","chrisuno",$respuesta);
                $respuesta=str_replace("2","chrisdos",$respuesta);
                $respuesta=str_replace("3","christres",$respuesta);
                $respuesta=str_replace("4","chriscuatro",$respuesta);
                $respuesta=str_replace("5","chriscinco",$respuesta);
                $respuesta=str_replace("6","chrisseis",$respuesta);
                $respuesta=str_replace("7","chrissiete",$respuesta);
                $respuesta=str_replace("8","chrisocho",$respuesta);
                $respuesta=str_replace("9","chrisnueve",$respuesta);

                $limiteDePalabrasPorRenglon=17;//lo encontre viendo cuantas quedaban dentro del container del mensaje en un celular pequeño
                $numeroPalabrasRespuesta = str_word_count($respuesta,0);
                if($numeroPalabrasRespuesta/$limiteDePalabrasPorRenglon<=1)
                    {
                       $aleatrorio=rand(8,11);
                       sleep($aleatrorio);                         
                       $respuesta=corrigeTildesYNumerosEnRespuesta($respuesta);
                       fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuesta) . "\n");
                    }
                    else{                        

                        if($numeroPalabrasRespuesta/$limiteDePalabrasPorRenglon<=2)
                        {   
                            $vectorDeLaRespuesta=str_word_count($respuesta,1);
                            //print_r($vectorDeLaRespuesta);
                            $respuestaParte1=$vectorDeLaRespuesta[0];
                            //print_r($respuestaParte1);
                            for ($j = 1; $j <= $limiteDePalabrasPorRenglon-1; $j++){ 
                                $respuestaParte1=$respuestaParte1.' '.$vectorDeLaRespuesta[$j];
                            }
                            //print_r($respuestaParte1);
                            $respuestaParte1=corrigeTildesYNumerosEnRespuesta($respuestaParte1);
                            $respuestaParte2=' '.$vectorDeLaRespuesta[$limiteDePalabrasPorRenglon];
                            //print_r($respuestaParte2);
                            for ($j = $limiteDePalabrasPorRenglon+1; $j <= $numeroPalabrasRespuesta-1; $j++){ 
                                $respuestaParte2=$respuestaParte2.' '.$vectorDeLaRespuesta[$j];
                            }
                            //print_r($respuestaParte2);
                            $respuestaParte2=corrigeTildesYNumerosEnRespuesta($respuestaParte2);
                           $aleatrorio=rand(8,11);
                           sleep($aleatrorio);  
                           fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte1) . "\n");
                           //$aleatrorio=rand(4,8);
                           //sleep($aleatrorio);  
                           fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte2) . "\n");
                        }
                        else{

                            if($numeroPalabrasRespuesta/$limiteDePalabrasPorRenglon<=3)
                            {   
                                $vectorDeLaRespuesta=str_word_count($respuesta,1);
                                //print_r($vectorDeLaRespuesta);
                                $respuestaParte1=$vectorDeLaRespuesta[0];
                                //print_r($respuestaParte1);
                                for ($j = 1; $j <= $limiteDePalabrasPorRenglon-1; $j++){ 
                                    $respuestaParte1=$respuestaParte1.' '.$vectorDeLaRespuesta[$j];
                                }
                                //print_r($respuestaParte1);
                                $respuestaParte1=corrigeTildesYNumerosEnRespuesta($respuestaParte1);



                                $respuestaParte2=' '.$vectorDeLaRespuesta[$limiteDePalabrasPorRenglon];
                                //print_r($respuestaParte2);
                                for ($j = $limiteDePalabrasPorRenglon+1; $j <= ($limiteDePalabrasPorRenglon*2)-1; $j++){ 
                                    $respuestaParte2=$respuestaParte2.' '.$vectorDeLaRespuesta[$j];
                                }
                                //print_r($respuestaParte2);
                                $respuestaParte2=corrigeTildesYNumerosEnRespuesta($respuestaParte2);



                                $respuestaParte3=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*2)];
                                //print_r($respuestaParte3);
                                for ($j = ($limiteDePalabrasPorRenglon*2)+1; $j <= $numeroPalabrasRespuesta-1; $j++){ 
                                    $respuestaParte3=$respuestaParte3.' '.$vectorDeLaRespuesta[$j];
                                }
                                //print_r($respuestaParte3);
                                $respuestaParte3=corrigeTildesYNumerosEnRespuesta($respuestaParte3);

                               $aleatrorio=rand(8,11);
                               sleep($aleatrorio);  
                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte1) . "\n");
                               //$aleatrorio=rand(4,8);
                               //sleep($aleatrorio);  
                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte2) . "\n");
                               //$aleatrorio=rand(4,8);
                               //sleep($aleatrorio);  
                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte3) . "\n");

                            }
                            else{
                                if($numeroPalabrasRespuesta/$limiteDePalabrasPorRenglon<=4)
                                {   
                                    $vectorDeLaRespuesta=str_word_count($respuesta,1);
                                    //print_r($vectorDeLaRespuesta);
                                    $respuestaParte1=$vectorDeLaRespuesta[0];
                                    //print_r($respuestaParte1);
                                    for ($j = 1; $j <= $limiteDePalabrasPorRenglon-1; $j++){ 
                                        $respuestaParte1=$respuestaParte1.' '.$vectorDeLaRespuesta[$j];
                                    }
                                    //print_r($respuestaParte1);
                                    $respuestaParte1=corrigeTildesYNumerosEnRespuesta($respuestaParte1);



                                    $respuestaParte2=' '.$vectorDeLaRespuesta[$limiteDePalabrasPorRenglon];
                                    //print_r($respuestaParte2);
                                    for ($j = $limiteDePalabrasPorRenglon+1; $j <= ($limiteDePalabrasPorRenglon*2)-1; $j++){ 
                                        $respuestaParte2=$respuestaParte2.' '.$vectorDeLaRespuesta[$j];
                                    }
                                    //print_r($respuestaParte2);
                                    $respuestaParte2=corrigeTildesYNumerosEnRespuesta($respuestaParte2);



                                    $respuestaParte3=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*2)];
                                    //print_r($respuestaParte3);
                                    for ($j = ($limiteDePalabrasPorRenglon*2)+1; $j <= ($limiteDePalabrasPorRenglon*3)-1; $j++){ 
                                        $respuestaParte3=$respuestaParte3.' '.$vectorDeLaRespuesta[$j];
                                    }
                                    //print_r($respuestaParte3);
                                    $respuestaParte3=corrigeTildesYNumerosEnRespuesta($respuestaParte3);




                                    $respuestaParte4=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*3)];
                                    //print_r($respuestaParte4);
                                    for ($j = ($limiteDePalabrasPorRenglon*3)+1; $j <= $numeroPalabrasRespuesta-1; $j++){ 
                                        $respuestaParte4=$respuestaParte4.' '.$vectorDeLaRespuesta[$j];
                                    }
                                    //print_r($respuestaParte4);
                                    $respuestaParte4=corrigeTildesYNumerosEnRespuesta($respuestaParte4);

                                   $aleatrorio=rand(8,11);
                                   sleep($aleatrorio);  
                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte1) . "\n");
                                   //$aleatrorio=rand(4,8);
                                   //sleep($aleatrorio);  
                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte2) . "\n");
                                   //$aleatrorio=rand(4,8);
                                   //sleep($aleatrorio);  
                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte3) . "\n");
                                   //$aleatrorio=rand(4,8);
                                   //sleep($aleatrorio);  
                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte4) . "\n");

                                }
                                else{
                                   
                                        if($numeroPalabrasRespuesta/$limiteDePalabrasPorRenglon<=5)
                                        {   
                                            $vectorDeLaRespuesta=str_word_count($respuesta,1);
                                            //print_r($vectorDeLaRespuesta);
                                            $respuestaParte1=$vectorDeLaRespuesta[0];
                                            //print_r($respuestaParte1);
                                            for ($j = 1; $j <= $limiteDePalabrasPorRenglon-1; $j++){ 
                                                $respuestaParte1=$respuestaParte1.' '.$vectorDeLaRespuesta[$j];
                                            }
                                            //print_r($respuestaParte1);
                                            $respuestaParte1=corrigeTildesYNumerosEnRespuesta($respuestaParte1);



                                            $respuestaParte2=' '.$vectorDeLaRespuesta[$limiteDePalabrasPorRenglon];
                                            //print_r($respuestaParte2);
                                            for ($j = $limiteDePalabrasPorRenglon+1; $j <= ($limiteDePalabrasPorRenglon*2)-1; $j++){ 
                                                $respuestaParte2=$respuestaParte2.' '.$vectorDeLaRespuesta[$j];
                                            }
                                            //print_r($respuestaParte2);
                                            $respuestaParte2=corrigeTildesYNumerosEnRespuesta($respuestaParte2);



                                            $respuestaParte3=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*2)];
                                            //print_r($respuestaParte3);
                                            for ($j = ($limiteDePalabrasPorRenglon*2)+1; $j <= ($limiteDePalabrasPorRenglon*3)-1; $j++){ 
                                                $respuestaParte3=$respuestaParte3.' '.$vectorDeLaRespuesta[$j];
                                            }
                                            //print_r($respuestaParte3);
                                            $respuestaParte3=corrigeTildesYNumerosEnRespuesta($respuestaParte3);




                                            $respuestaParte4=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*3)];
                                            //print_r($respuestaParte4);
                                            for ($j = ($limiteDePalabrasPorRenglon*3)+1; $j <= ($limiteDePalabrasPorRenglon*4)-1; $j++){ 
                                                $respuestaParte4=$respuestaParte4.' '.$vectorDeLaRespuesta[$j];
                                            }
                                            //print_r($respuestaParte4);
                                            $respuestaParte4=corrigeTildesYNumerosEnRespuesta($respuestaParte4);
                                            
                                            
                                            
                                            
                                            $respuestaParte5=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*4)];
                                            //print_r($respuestaParte5;
                                            for ($j = ($limiteDePalabrasPorRenglon*4)+1; $j <= $numeroPalabrasRespuesta-1; $j++){ 
                                                $respuestaParte5=$respuestaParte5.' '.$vectorDeLaRespuesta[$j];
                                            }
                                            //print_r($respuestaParte5);
                                            $respuestaParte5=corrigeTildesYNumerosEnRespuesta($respuestaParte5);

                                           $aleatrorio=rand(8,11);
                                           sleep($aleatrorio);  
                                           fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte1) . "\n");
                                           //$aleatrorio=rand(4,8);
                                           //sleep($aleatrorio);  
                                           fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte2) . "\n");
                                           //$aleatrorio=rand(4,8);
                                           //sleep($aleatrorio);  
                                           fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte3) . "\n");
                                           //$aleatrorio=rand(4,8);
                                           //sleep($aleatrorio);  
                                           fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte4) . "\n");
                                           fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte5) . "\n");

                                        }
                                        else{
                                           
                                            if($numeroPalabrasRespuesta/$limiteDePalabrasPorRenglon<=6)
                                            {   
                                                $vectorDeLaRespuesta=str_word_count($respuesta,1);
                                                //print_r($vectorDeLaRespuesta);
                                                $respuestaParte1=$vectorDeLaRespuesta[0];
                                                //print_r($respuestaParte1);
                                                for ($j = 1; $j <= $limiteDePalabrasPorRenglon-1; $j++){ 
                                                    $respuestaParte1=$respuestaParte1.' '.$vectorDeLaRespuesta[$j];
                                                }
                                                //print_r($respuestaParte1);
                                                $respuestaParte1=corrigeTildesYNumerosEnRespuesta($respuestaParte1);



                                                $respuestaParte2=' '.$vectorDeLaRespuesta[$limiteDePalabrasPorRenglon];
                                                //print_r($respuestaParte2);
                                                for ($j = $limiteDePalabrasPorRenglon+1; $j <= ($limiteDePalabrasPorRenglon*2)-1; $j++){ 
                                                    $respuestaParte2=$respuestaParte2.' '.$vectorDeLaRespuesta[$j];
                                                }
                                                //print_r($respuestaParte2);
                                                $respuestaParte2=corrigeTildesYNumerosEnRespuesta($respuestaParte2);



                                                $respuestaParte3=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*2)];
                                                //print_r($respuestaParte3);
                                                for ($j = ($limiteDePalabrasPorRenglon*2)+1; $j <= ($limiteDePalabrasPorRenglon*3)-1; $j++){ 
                                                    $respuestaParte3=$respuestaParte3.' '.$vectorDeLaRespuesta[$j];
                                                }
                                                //print_r($respuestaParte3);
                                                $respuestaParte3=corrigeTildesYNumerosEnRespuesta($respuestaParte3);




                                                $respuestaParte4=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*3)];
                                                //print_r($respuestaParte4);
                                                for ($j = ($limiteDePalabrasPorRenglon*3)+1; $j <= ($limiteDePalabrasPorRenglon*4)-1; $j++){ 
                                                    $respuestaParte4=$respuestaParte4.' '.$vectorDeLaRespuesta[$j];
                                                }
                                                //print_r($respuestaParte4);
                                                $respuestaParte4=corrigeTildesYNumerosEnRespuesta($respuestaParte4);
                                                
                                                
                                                
                                                
                                                $respuestaParte5=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*4)];
                                                //print_r($respuestaParte5;
                                                for ($j = ($limiteDePalabrasPorRenglon*4)+1; $j <= ($limiteDePalabrasPorRenglon*5)-1; $j++){ 
                                                    $respuestaParte5=$respuestaParte5.' '.$vectorDeLaRespuesta[$j];
                                                }
                                                //print_r($respuestaParte5);
                                                $respuestaParte5=corrigeTildesYNumerosEnRespuesta($respuestaParte5);
                                                
                                                
                                                
                                                $respuestaParte6=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*5)];
                                                //print_r($respuestaParte6;
                                                for ($j = ($limiteDePalabrasPorRenglon*5)+1; $j <= $numeroPalabrasRespuesta-1; $j++){ 
                                                    $respuestaParte6=$respuestaParte6.' '.$vectorDeLaRespuesta[$j];
                                                }
                                                //print_r($respuestaParte6);
                                                $respuestaParte6=corrigeTildesYNumerosEnRespuesta($respuestaParte6);
                                               
                                               $aleatrorio=rand(8,11);
                                               sleep($aleatrorio);  
                                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte1) . "\n");
                                               //$aleatrorio=rand(4,8);
                                               //sleep($aleatrorio);  
                                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte2) . "\n");
                                               //$aleatrorio=rand(4,8);
                                               //sleep($aleatrorio);  
                                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte3) . "\n");
                                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte4) . "\n");
                                               //$aleatrorio=rand(4,8);
                                               //sleep($aleatrorio);  
                                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte5) . "\n");
                                               fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte6) . "\n");

                                            }
                                            else{
                                               
                                                if($numeroPalabrasRespuesta/$limiteDePalabrasPorRenglon<=8)
                                                {   
                                                    $vectorDeLaRespuesta=str_word_count($respuesta,1);
                                                    //print_r($vectorDeLaRespuesta);
                                                    $respuestaParte1=$vectorDeLaRespuesta[0];
                                                    //print_r($respuestaParte1);
                                                    for ($j = 1; $j <= $limiteDePalabrasPorRenglon-1; $j++){ 
                                                        $respuestaParte1=$respuestaParte1.' '.$vectorDeLaRespuesta[$j];
                                                    }
                                                    //print_r($respuestaParte1);
                                                    $respuestaParte1=corrigeTildesYNumerosEnRespuesta($respuestaParte1);



                                                    $respuestaParte2=' '.$vectorDeLaRespuesta[$limiteDePalabrasPorRenglon];
                                                    //print_r($respuestaParte2);
                                                    for ($j = $limiteDePalabrasPorRenglon+1; $j <= ($limiteDePalabrasPorRenglon*2)-1; $j++){ 
                                                        $respuestaParte2=$respuestaParte2.' '.$vectorDeLaRespuesta[$j];
                                                    }
                                                    //print_r($respuestaParte2);
                                                    $respuestaParte2=corrigeTildesYNumerosEnRespuesta($respuestaParte2);



                                                    $respuestaParte3=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*2)];
                                                    //print_r($respuestaParte3);
                                                    for ($j = ($limiteDePalabrasPorRenglon*2)+1; $j <= ($limiteDePalabrasPorRenglon*3)-1; $j++){ 
                                                        $respuestaParte3=$respuestaParte3.' '.$vectorDeLaRespuesta[$j];
                                                    }
                                                    //print_r($respuestaParte3);
                                                    $respuestaParte3=corrigeTildesYNumerosEnRespuesta($respuestaParte3);




                                                    $respuestaParte4=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*3)];
                                                    //print_r($respuestaParte4);
                                                    for ($j = ($limiteDePalabrasPorRenglon*3)+1; $j <= ($limiteDePalabrasPorRenglon*4)-1; $j++){ 
                                                        $respuestaParte4=$respuestaParte4.' '.$vectorDeLaRespuesta[$j];
                                                    }
                                                    //print_r($respuestaParte4);
                                                    $respuestaParte4=corrigeTildesYNumerosEnRespuesta($respuestaParte4);
                                                    
                                                    
                                                    
                                                    
                                                    $respuestaParte5=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*4)];
                                                    //print_r($respuestaParte5;
                                                    for ($j = ($limiteDePalabrasPorRenglon*4)+1; $j <= ($limiteDePalabrasPorRenglon*5)-1; $j++){ 
                                                        $respuestaParte5=$respuestaParte5.' '.$vectorDeLaRespuesta[$j];
                                                    }
                                                    //print_r($respuestaParte5);
                                                    $respuestaParte5=corrigeTildesYNumerosEnRespuesta($respuestaParte5);
                                                    
                                                    
                                                    
                                                    $respuestaParte6=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*5)];
                                                    //print_r($respuestaParte6;
                                                    for ($j = ($limiteDePalabrasPorRenglon*5)+1; $j <= ($limiteDePalabrasPorRenglon*6)-1; $j++){ 
                                                        $respuestaParte6=$respuestaParte6.' '.$vectorDeLaRespuesta[$j];
                                                    }
                                                    //print_r($respuestaParte6);
                                                    $respuestaParte6=corrigeTildesYNumerosEnRespuesta($respuestaParte6);
                                                    
                                                    
                                                    
                                                    $respuestaParte7=' '.$vectorDeLaRespuesta[($limiteDePalabrasPorRenglon*6)];
                                                    //print_r($respuestaParte7;
                                                    for ($j = ($limiteDePalabrasPorRenglon*6)+1; $j <= $numeroPalabrasRespuesta-1; $j++){ 
                                                        $respuestaParte7=$respuestaParte7.' '.$vectorDeLaRespuesta[$j];
                                                    }
                                                    //print_r($respuestaParte7);
                                                    $respuestaParte7=corrigeTildesYNumerosEnRespuesta($respuestaParte7);

                                                   $aleatrorio=rand(8,11);
                                                   sleep($aleatrorio);  
                                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte1) . "\n");
                                                   //$aleatrorio=rand(4,8);
                                                   //sleep($aleatrorio);  
                                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte2) . "\n");
                                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte3) . "\n");
                                                   //$aleatrorio=rand(4,8);
                                                   //sleep($aleatrorio);  
                                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte4) . "\n");
                                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte5) . "\n");
                                                   //$aleatrorio=rand(4,8);
                                                   //sleep($aleatrorio);  
                                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte6) . "\n");
                                                   fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuestaParte7) . "\n");

                                                }
                                                else{
                                                   
                                                     $aleatrorio=rand(8,11);
                                                       sleep($aleatrorio);  
                                                       $respuesta=corrigeTildesYNumerosEnRespuesta($respuesta);
                                                       fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuesta) . "\n");

                                                   
                                                    }
                                               
                                                }

                                           
                                            }

                                    }
                                
                            }
                            
                        }
                    }




                
                //$aleatrorio=rand(8,13);
                //sleep($aleatrorio);  
                //fwrite(fopen($nombreChatUsuario, 'a'), "<span style='background-color: #BD8298;'>Alejandra</span>" . $message = str_replace("\n", " ", $respuesta) . "\n");

               








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

