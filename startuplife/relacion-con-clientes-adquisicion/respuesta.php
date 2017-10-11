<?php

/////////Recuerda reeemplazar " por comilla doble /////////////////////
/////////Recuerda reeemplazar [ por un parentesis cuadrado que abre, no lo puedo poner por que se daña todo /////////////////////
/////////Recuerda reeemplazar { por una llave que abre que obviamente no puedo poner/////////////////////
/////////Recuerda reeemplazar -> por una flecha hacia la derecha ->/////////////////////
/////////Recuerda reeemplazar $ por el signo pesos/////////////////////



         session_start();
    //print_r($_SESSION);

        $nombreTest=$_SESSION['nombreTest'];
        $rutaTest=$_SESSION['rutaTest'];
        $rutaBDTest=$_SESSION['rutaBDTest'];
        $rutaBDEstudio=$_SESSION['rutaBDEstudio'];


/////////////////Variables que se tienen en cuenta para decidir////////////////////////


                        $q1 = $_SESSION['q1'];
                        //echo "Pregunta 1: $q1"."<br>";
                        //var_dump($q1);

                        $q2 = $_SESSION['q2'];
                        //echo "Pregunta 2: $q2"."<br>";
                        //var_dump($q2);

                        $q3 = $_SESSION['q3'];
                        //echo "Pregunta 3: $q3"."<br>";
                        //var_dump($q3);

                        $q4 = $_SESSION['q4'];
                        //echo "Pregunta 4: $q4"."<br>";
                        //var_dump($q4);

                        $q5 = $_SESSION['q5'];
                        //echo "Pregunta 5: $q5"."<br>";
                        //var_dump($q5);

                        $q6 = $_SESSION['q6'];
                        //echo " $q6"."<br>";
                        //var_dump($q6);

                        $envio = $_SESSION['envio'];
                        //echo " $envio"."<br>";
                        //var_dump($envio);


/////////////////Variables de investigacion////////////////////////


        $estimulo=$_SESSION['qestimulo'];

        $qInvest1 = $_SESSION['qInvest1'];
        //echo "pelota $qInvest1"."<br>";
        //var_dump($qInvest4);

        $qInvest2 = $_SESSION['qInvest2'];
        //echo "comida $qInvest2"."<br>";

        $qInvest3 = $_SESSION['qInvest3'];
        //echo "ejercicio $qInvest3"."<br>";

        $qInvest4 = $_SESSION['qInvest4'];
        //echo "ejercicio $qInvest4"."<br>";

        $qInvest5 = $_SESSION['qInvest5'];
        //echo "ejercicio $qInvest5"."<br>";

        $envioInvest = $_SESSION['envioInvest'];
        //echo "ejercicio $envioInvest"."<br>";

    $correoAceptaEstimulo=$_SESSION['correoAceptaEstimulo'];

        //$envioInvest = $_SESSION['envioInvest'];
        //echo "ejercicio $envioInvest"."<br>";

    $user_profile=$_SESSION['user_profile'];
    //echo "ejercicio $user_profile"."<br>";




///////cuento una ayuda de la persona y consulto a cuantas personas ha ayudado contestanto encuestas////////////

        $servername='localhost';
        $username='taita923_chris';
        $password='mantarraya1';
        $dbname='taita923_datosPersonas';
        $conn= new mysqli($servername,$username,$password,$dbname);
        $connection=@mysql_connect($servername,$username,$password);

        //echo $_SESSION['rutaBDEstudio'];
        //echo $user_profile[id];

if($estimulo==1){

        //Subo el id de la persona que ayudo
        $sql="INSERT INTO taita923_datosPersonas.ayudas        VALUES('$user_profile[id]')";
        if($conn->query($sql)==TRUE){}
        else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;


}


        //cuento las ayudas de esa persona

        $resultAyuda=mysql_query("SELECT count(id) FROM taita923_datosPersonas.ayudas  WHERE id = '".$user_profile[id]."'");
        //echo $resultAyuda;

        if (!$resultAyuda) {
        echo 'Could not run query: ' . mysql_error();
        exit;
        }

        $contadorDeAyudas=mysql_fetch_row($resultAyuda);
        $_SESSION['contadorDeAyudas'] = $contadorDeAyudas;
        //echo $_SESSION['contadorDeAyudas'];
        //echo $contadorDeAyudas[0];





        /////////////////Enviando variables al decisor////////////////////////
        $datosPersona=array("Persona","","","","",$q1,$q2,$q3);
        //var_dump($datosPersona);




/////////////////DECISOR: Aca no se cambia nada////////////////////////


//Cada posible valor que tome el test, osea cada posile respuesta se llama objeto, por ejemplo en que princesa disney eres, rpunsel es un objeto, cenicienta es otro y asi
//Cada valor que le mida a un objeto se llama variable, por ejemplo la edad de cenicienta, su timidez, su peso....
//todos los objetos tienen las mismas variables
//siempre las dos primeras variables de todo objeto son, el nombre del objeto, la web donde lo venden y el nombre de la imagen para la respuesta
//siempre el primer objeto es los valores que puso la persona durante el test



//Objetos y sus variables
//se crea el objeto y se agrega en matrz de objetos
// = array("Persona","", "","", 15, 10, 10,10);
//el 4 elemento de cada vector debe contener efecto forer  usando las palabras aveces(o en ocasiones, algunas veces, alguna que otra vez, a ratos, de cuando en cuando, de vez en cuando, ocasionalmente, en algunas ocasiones, alguna que otra vez) y para ti(a ti, tu sabes, tu siempre has creido, tu sientes, tu eres)) por ejemplo (Para ti es muy importante demostrar que tienes una voluntad poderoza, pero aveces sientes miedo de arriesgarte por que no quieres cometer un error del cual te arrepientas en el futuro. Hoy la soportunidades están en el lugar adecuado para que puedas tomarlas,) y una parte especifica segun lo que respondio la persona por ejemplo (Ademas como el amor que sientes por ella ya no es el mismo de antes es bueno que dusques alguien que te llene)
//el 5 elemento contiene un listado de las cosas quela persona tiene o debe hacer o no tiene
$persona = $datosPersona;

$respuestaUno  = array("¡Increíble!","","https://media.giphy.com/media/wP47HlZohCTTO/giphy.gif","Te iría tan mal que no lo puedo creer, por suerte puedes volver a intentarlo.","<ul style='text-align:left;'><li>Acertaste a 0 preguntas.</li></ul>",1,4,1);
        $respuestaDos  = array("¡Woooow!","","https://media.giphy.com/media/xxmU1ko7Vz4ys/giphy.gif","Vaya que te iría mal jajajaja, bueno pero por suerte tienes mucho carisma.","<ul style='text-align:left;'><li>Acertaste al 30% de las preguntas.</li></ul>",3,4,2);
        $respuestaTres  = array("¡Regular!","","https://media.giphy.com/media/ZwU28PqXuo5pu/giphy.gif","Eres una persona super divertida y llena de energía, pero las matemáticas no son lo tuyo.","<ul style='text-align:left;'><li>Acertaste al 50% de las preguntas.</li></ul>",4,2,2);
        $respuestaCuatro  = array("¡Muy bien!","","https://media.giphy.com/media/l0MYsD20YurCGasOA/giphy.gif","Vaya que se te dan bien las matemáticas, lastima que en el baile no sea asi.","<ul style='text-align:left;'><li>Acertaste al 70% de las preguntas.</li></ul>",4,6,2);
        $respuestaCinco  = array("¡Increíble!","","https://media.giphy.com/media/5GoVLqeAOo6PK/giphy.gif","Nunca imagine que podría existir una persona con tal nivel de genialidad, Wowwwwwwwww.","<ul style='text-align:left;'><li>Acertaste a todas las preguntas.</li></ul>",4,2,4);
        //var_dump($persona);

        //agrupo los Objetos en una matriz
        $matrizDeObjetos=array($persona,$respuestaUno,$respuestaDos,$respuestaTres,$respuestaCuatro,$respuestaCinco);
        //var_dump($matrizDeObjetos);





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



//cuando quiera probar debo activar estas de abajp
//echo "<br>"."El mas cercano esta en la posicion $posicionObjetoMasCercano y es  " ."<br>";
//var_dump($objetoGanador);


//echo "<br>"."A una distancia de  " ."<br>";
//var_dump(min($resultadosMahalanobis));















/////////////////subiendo todas las variables a sql////////////////////////

//decodifico las variables

$servername='localhost';
$username='taita923_chris';
$password='mantarraya1';
$dbname='taita923_datosPersonas';
$conn= new mysqli($servername,$username,$password,$dbname);
//if($conn->conect_error){die('Connection failed: '. $conn->connect_error);}
//$conn= new mysqli($servername,$username,$password,$bdname);
//if($conn->conect_error){die('Connection failed: '. $conn->connect_error);}




if($q1==1){$respuestaPreguntaUno='A)'; }
else{if($q1==2){$respuestaPreguntaUno='B)';}
else{if($q1==3){$respuestaPreguntaUno='C)';}
else{if($q1==4){$respuestaPreguntaUno='D)';}
else{if($q1==5){$respuestaPreguntaUno='';}
else{$respuestaPreguntaUno='';}}}}}

if($q2==1){$respuestaPreguntaDos='A)'; }
else{if($q2==2){$respuestaPreguntaDos='B)';}
else{if($q2==3){$respuestaPreguntaDos='C)';}
else{if($q2==4){$respuestaPreguntaDos='D)';}
else{if($q2==5){$respuestaPreguntaDos='';}
else{$respuestaPreguntaDos='';}}}}}

if($q3==1){$respuestaPreguntaTres='A)'; }
else{if($q3==2){$respuestaPreguntaTres='B)';}
else{if($q3==3){$respuestaPreguntaTres='C)';}
else{if($q3==4){$respuestaPreguntaTres='D)';}
else{if($q3==5){$respuestaPreguntaTres='';}
else{$respuestaPreguntaTres='';}}}}}

if($q4==1){$respuestaPreguntaCuatro='A)'; }
else{if($q4==2){$respuestaPreguntaCuatro='B)';}
else{if($q4==3){$respuestaPreguntaCuatro='C)';}
else{if($q4==4){$respuestaPreguntaCuatro='D)';}
else{if($q4==5){$respuestaPreguntaCuatro='';}
else{$respuestaPreguntaCuatro='';}}}}}

if($q5==1){$respuestaPreguntaCinco='A)'; }
else{if($q5==2){$respuestaPreguntaCinco='B)';}
else{if($q5==3){$respuestaPreguntaCinco='C)';}
else{if($q5==4){$respuestaPreguntaCinco='D)';}
else{if($q5==5){$respuestaPreguntaCinco='';}
else{$respuestaPreguntaCinco='';}}}}}

if($q6==1){$respuestaPreguntaSeis='A)'; }
else{if($q6==2){$respuestaPreguntaSeis='B)';}
else{if($q6==3){$respuestaPreguntaSeis='C)';}
else{if($q6==4){$respuestaPreguntaSeis='D)';}
else{if($q6==5){$respuestaPreguntaSeis='';}
else{$respuestaPreguntaSeis='';}}}}}



//if($qInvest1==1){$respuestaPreguntaInvestUno='a'; }
//else{if($qInvest1==2){$respuestaPreguntaInvestUno='b';}
//else{if($qInvest1==3){$respuestaPreguntaInvestUno='c';}
//else{if($qInvest1==4){$respuestaPreguntaInvestUno='d';}
//else{if($qInvest1==5){$respuestaPreguntaInvestUno='e';}
//else{$respuestaPreguntaInvestUno='f';}}}}}

//if($qInvest2==1){$respuestaPreguntaInvestDos='a'; }
//else{if($qInvest2==2){$respuestaPreguntaInvestDos='b';}
//else{if($qInvest2==3){$respuestaPreguntaInvestDos='c';}
//else{if($qInvest2==4){$respuestaPreguntaInvestDos='d';}
//else{if($qInvest2==5){$respuestaPreguntaInvestDos='e';}
//else{$respuestaPreguntaInvestDos='f';}}}}}

//if($qInvest3==1){$respuestaPreguntaInvestTres='a'; }
//else{if($qInvest3==2){$respuestaPreguntaInvestTres='b';}
//else{if($qInvest3==3){$respuestaPreguntaInvestTres='c';}
//else{if($qInvest3==4){$respuestaPreguntaInvestTres='d';}
//else{if($qInvest3==5){$respuestaPreguntaInvestTres='e';}
//else{$respuestaPreguntaInvestTres='f';}}}}}

//if($qInvest4==1){$respuestaPreguntaInvestCuatro='a'; }
//else{if($qInvest4==2){$respuestaPreguntaInvestCuatro='b';}
//else{if($qInvest4==3){$respuestaPreguntaInvestCuatro='c';}
//else{if($qInvest4==4){$respuestaPreguntaInvestCuatro='d';}
//else{if($qInvest4==5){$respuestaPreguntaInvestCuatro='e';}
//else{$respuestaPreguntaInvestCuatro='f';}}}}}

//if($qInvest5==1){$respuestaPreguntaInvestCinco='a'; }
//else{if($qInvest5==2){$respuestaPreguntaInvestCinco='b';}
//else{if($qInvest5==3){$respuestaPreguntaInvestCinco='c';}
//else{if($qInvest5==4){$respuestaPreguntaInvestCinco='d';}
//else{if($qInvest5==5){$respuestaPreguntaInvestCinco='e';}
//else{$respuestaPreguntaInvestCinco='f';}}}}}

//if($envioInvest==1){$respuestaPreguntaInvestEnvio='a'; }
//else{if($envioInvest==2){$respuestaPreguntaInvestEnvio='b';}
//else{if($envioInvest==3){$respuestaPreguntaInvestEnvio='c';}
//else{if($envioInvest==4){$respuestaPreguntaInvestEnvio='d';}
//else{if($envioInvest==5){$respuestaPreguntaInvestEnvio='e';}
//else{$respuestaPreguntaInvestEnvio='f';}}}}}





$today = date("Y/m/d");
if($estimulo==1){$agradecimiento='De corazón muchas gracias por ayudar, te notificaremos por correo electrónico cuando entreguemos los alimentos que ayudaste a donar.';}
else{$agradecimiento='Recuerda que aplicamos los más avanzados modelos matemáticos para encontrar esta respuesta.';}


$sql="INSERT INTO taita923_datosPersonas.".$rutaBDTest."         VALUES('$user_profile[id]','$user_profile[email]','$today','$estimulo','$user_profile[first_name]','$user_profile[last_name]','$user_profile[gender]','$user_profile[link]','$user_profile[locale]','$user_profile[name]','$user_profile[timezone]','$user_profile[age_range]','$user_profile[cover]','$respuestaPreguntaUno','$respuestaPreguntaDos','$respuestaPreguntaTres','$respuestaPreguntaCuatro','$respuestaPreguntaCinco','$respuestaPreguntaSeis','$objetoGanador[0]')";
if($conn->query($sql)==TRUE){}
else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;




    if($estimulo==1){

         //Subo los datos que la persona puso en la encuesta
                $sql="INSERT INTO taita923_datosPersonas.".$rutaBDEstudio."        VALUES('$user_profile[id]','$user_profile[email]','$today','$estimulo','$user_profile[first_name]','$user_profile[last_name]','$user_profile[gender]','$user_profile[link]','$user_profile[locale]','$user_profile[name]','$user_profile[timezone]','$user_profile[age_range]','$user_profile[cover]','$qInvest1','$qInvest2','$qInvest3','$qInvest4','$qInvest5','$envioInvest','$objetoGanador[0]')";
                if($conn->query($sql)==TRUE){}
                else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;


        //Cuento cuantas encuestas se han recolectado, si ya se cumplio la meta declaro el estudio como Terminado
        $servername='localhost';
        $username='taita923_chris';
        $password='mantarraya1';
        $dbname='taita923_datosPersonas';
        $conn= new mysqli($servername,$username,$password,$dbname);
        $connection=@mysql_connect($servername,$username,$password);


        $result=mysql_query("SELECT count(*) FROM taita923_datosPersonas.".$_SESSION['rutaBDEstudio']."  WHERE 1");

        if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
        }

        $numEncuestasRecolectadas=mysql_fetch_row($result);
        $_SESSION['numEncuestasRecolectadas'] = $numEncuestasRecolectadas;
        //echo $_SESSION['numEncuestasRecolectadas'];
        //echo $numEncuestasRecolectadas[0];




        $result2=mysql_query("SELECT numEncuestasRequeridas FROM taita923_datosPersonas.investigaciones WHERE ruta='".$_SESSION['rutaEstudio']."' Limit 1");

        if (!$result2) {
        echo 'Could not run query: ' . mysql_error();
        exit;
        }

        $numEncuestasRequeridas=mysql_fetch_row($result2);
        $_SESSION['numEncuestasRequeridas'] = $numEncuestasRequeridas;
        //echo $_SESSION['numEncuestasRequeridas'];
        //echo $numEncuestasRequeridas[0];


        //usualmente el 60% de las encuestas recolectadas son funcionales, el resto no
        if(($numEncuestasRecolectadas[0]*0.6)>$numEncuestasRequeridas[0]){
                   //Indico que la encuesta esta terminada
                $sql="UPDATE taita923_datosPersonas.investigaciones SET estado='Terminado' WHERE ruta='".$_SESSION['rutaEstudio']."'";
                //if($conn->query($sql)==TRUE){}
                //else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;

                $to = "elchristog@gmail.com";
                $subject = "Un estudio ha sido completado";
                $headers = "From: elchristog@gmail.com" . "
" .
                "CC: elchristog@gmail.com";

                $txt = $_SESSION['rutaBDEstudio'];

                mail($to,$subject,$txt,$headers);
        }

     }

/////////////////La salida web: cambiar lo que corresponda////////////////////////



echo "<head>
                <meta charset='UTF-8' />
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <title>TaiTa Funky: ".$nombreTest."</title>
                <meta name='description' content='".$objetoGanador[0]."  ".$objetoGanador[3]."' />
                <meta name='keywords' content='personalidad, test, malvada, trump, mujer, psicometrico' />
                <meta name='author' content='TaiTa Funky' />
                <meta property='og:image' content='".$objetoGanador[2]."' />
                <link rel='shortcut icon' href='../img/TaiTa-Funky-Mini.png'>
                <link rel='stylesheet' type='text/css' href='css/normalize.css' />
                <link rel='stylesheet' type='text/css' href='css/demo.css' />
                <link rel='stylesheet' type='text/css' href='css/component.css' />
                <link rel='stylesheet' type='text/css' href='css/cs-select.css' />
                <link rel='stylesheet' type='text/css' href='css/cs-skin-boxes.css' />
                <script src='js/modernizr.custom.js'></script>
        </head>
        <body>



                                                                        <!-- Google Tag Manager -->
                                                <noscript><iframe src='//www.googletagmanager.com/ns.html?id=GTM-NH49QF'
                                                height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
                                                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                                                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                                                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                                                '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                                                })(window,document,'script','dataLayer','GTM-NH49QF');</script>
                                                <!-- End Google Tag Manager -->


                                                <!-- Facebook SDK -->
                                                                                                <script>
                                                  window.fbAsyncInit = function() {
                                                    FB.init({
                                                      appId      : '1432872223665171',
                                                      xfbml      : true,
                                                      version    : 'v2.7'
                                                    });
                                                  };

                                                  (function(d, s, id){
                                                     var js, fjs = d.getElementsByTagName(s)[0];
                                                     if (d.getElementById(id)) {return;}
                                                     js = d.createElement(s); js.id = id;
                                                     js.src = '//connect.facebook.net/en_US/sdk.js';
                                                     fjs.parentNode.insertBefore(js, fjs);
                                                   }(document, 'script', 'facebook-jssdk'));
                                                </script>
                                                <!-- End Facebook SDK -->





                <div class='container header-respuesta'>


                                <div class='fs-title'>

                                        <div class='codrops-top'>
                                                <a class='codrops-icon' href='../crea-tu-test/'><img id='testsBoton' src='../img/tests.png' style='width:25px; height:25px;''><span></span></a>
                                                <a class='codrops-icon' href='../'><img class='logo-taita-funky-pregunta' src='../img/logo-TaiTa-funky.png' alt='Descubre que te pasará este nuevo año TaiTa' ><span></span></a>
                                                <a class='codrops-icon' href='https://www.facebook.com/taitafunky/'><img id='testsBoton' src='../img/face.png' style='width:25px; height:25px;''><span></span></a>
                                                <h1>  </h1>
                                                <span style='color:#313830;'>¡Has ayudado a <b>".$contadorDeAyudas[0]."</b> familias!</span>
                                                <hr>
                                        </div>
                                </div>

                </div><!-- /fs-form-wrap -->

                <div class='container textos-respuesta'>
                                <Article >
                                <h2 style='color:#313830;text-align:center;'> ".$objetoGanador[0]." </h2>
                                <img src='".$objetoGanador[2]."' alt='".$nombreTest." ".$objetoGanador[0]."' class='fs-anim-upper imagen-respuesta' style='text-align:left;'>


                                <p style='text-align:left;'>
                                   ".$objetoGanador[3]."<br> ".$objetoGanador[4]."
                                </p>


                                <!--<p >
                                Tambien puedes contactarlo por instagram  <a href='".$objetoGanador[1]."' target='_blank'>aqui</a>
                                </p>-->



                                <p >
                                <br>".$agradecimiento."
                                </p>

                                <div
                                  class='fb-like'
                                  data-share='true'
                                  data-width='450'
                                  data-show-faces='true'>
                                </div>


                <br></br>
                <div class='fb-comments' data-href='http://taita.co/".$rutaTest."/' data-numposts='5'></div>

                                <br></br>
                                <button class='fs-submit' type='button'><a href='../'>Volver</a></button><br>

                                <!--<div class='fb-login-button' data-max-rows='1' data-size='medium' data-show-faces='false' data-auto-logout-link='false'></div>-->


                                <!--<fb:login-button
                                appId='1432872223665171'
                                scope='public_profile,email'
                                id='facebook-login-button'>
                                </fb:login-button>
                                <div id='fbStatus'>
                                </div>-->

                                <!--boton compartir
                                y boton volver a inicio
                                y barralateral de trending-->

                                </Article>
                </div><!-- /fs-form-wrap -->
                        </body>";

?>