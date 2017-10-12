<?php

//trae las respuestas del test, si la persona eligio ayudar lo envia a la encuesta y de ahi lo enviara a cargando respuesta, si la persona no elige ayudar lo dirige a iniciar sesion

/////////////////Variables que se tienen en cuenta para decidir////////////////////////
                        session_start();

                        $q1 = (isset($_POST['q1']) ? $_POST['q1'] : null);
                        $_SESSION['q1'] = $q1;
                        //echo $_SESSION['q1']; 
                        //echo "Cuándo tu hijo se cae jugando, ¿Qué haces? $q1"."<br>";
                        //var_dump($q1);

                        $q2 = (isset($_POST['q2']) ? $_POST['q2'] : null);
                        $_SESSION['q2'] = $q2;
                        //echo $_SESSION['q2']; 
                        //echo "Si tu hijo quiere un dulce ¿Que haces? $q2"."<br>";
                        //var_dump($q2);

                        $q3 = (isset($_POST['q3']) ? $_POST['q3'] : null);
                        $_SESSION['q3'] = $q3;
                        //echo $_SESSION['q3'];                         
                        //echo "Cuándo se porta mal $q3"."<br>";
                        //var_dump($q3);

                        $q4 = (isset($_POST['q4']) ? $_POST['q4'] : null);
                        $_SESSION['q4'] = $q4;
                        //echo $_SESSION['q4'];                         
                        //echo "Cuando regañas a tu hijo y aún así no te hace caso $q4"."<br>";
                        //var_dump($q4);

                        $q5 = (isset($_POST['q5']) ? $_POST['q5'] : null);
                        $_SESSION['q5'] = $q5;
                        //echo $_SESSION['q5']; 
                        //echo "¿Qué haces cuándo tu hijo tiene miedo? (de lanzarse por el rodadero ó acariciar un perro) $q5"."<br>";
                        //var_dump($q5);

                        $q6 = (isset($_POST['q6']) ? $_POST['q6'] : null);
                        $_SESSION['q6'] = $q6;
                        //echo $_SESSION['q6']; 
                        //echo " $q6"."<br>";
                        //var_dump($q6);

                        $envio = (isset($_POST['envio']) ? $_POST['envio'] : null);
                        $_SESSION['envio'] = $envio;
                        //echo $_SESSION['envio']; 
                        //echo "¿Qué haces cuándo tu hijo tiene miedo? (de lanzarse por el rodadero ó acariciar un perro) $envio"."<br>";
                        //var_dump($envio);


/////////////////Variables de investigacion////////////////////////


        $estimulo=(isset($_POST['qestimulo']) ? $_POST['qestimulo'] : null);
        $_SESSION['qestimulo'] = $estimulo;
        //echo $_SESSION['qestimulo']; 

        //$qInvest1 = (isset($_POST['qInvest1']) ? $_POST['qInvest1'] : null);
        //$_SESSION['qInvest1'] = $qInvest1;
        //echo $_SESSION['qInvest1']; 
        //echo "pelota $qInvest1"."<br>";
        //var_dump($qInvest4);

        //$qInvest2 = (isset($_POST['qInvest2']) ? $_POST['qInvest2'] : null);
        //$_SESSION['qInvest2'] = $qInvest2;
        //echo $_SESSION['qInvest2']; 
        //echo "comida $qInvest2"."<br>";

        //$qInvest3 = (isset($_POST['qInvest3']) ? $_POST['qInvest3'] : null);
        //$_SESSION['qInvest3'] = $qInvest3;
        //echo $_SESSION['qInvest3']; 
        //echo "ejercicio $qInvest3"."<br>";

        //$qInvest4 = (isset($_POST['qInvest4']) ? $_POST['qInvest4'] : null);
        //$_SESSION['qInvest4'] = $qInvest4;
        //echo $_SESSION['qInvest4']; 
        //echo "ejercicio $qInvest4"."<br>";

        //$qInvest5 = (isset($_POST['qInvest5']) ? $_POST['qInvest5'] : null);
        //$_SESSION['qInvest5'] = $qInvest5;
        //echo $_SESSION['qInvest5']; 
        //echo "ejercicio $qInvest5"."<br>";

        //$correoAceptaEstimulo=(isset($_POST['qcorreo']) ? $_POST['qcorreo'] : null);
        //$_SESSION['qcorreo'] = $qcorreo;
        //echo $_SESSION['qcorreo']; 

        //$envioInvest = (isset($_POST['envioInvest']) ? $_POST['envioInvest'] : null);
        //$_SESSION['envioInvest'] = $envioInvest;
        //echo $_SESSION['envioInvest']; 
        //echo "ejercicio $envioInvest"."<br>";






?>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta charset='UTF-8' />
                                                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                                                        <meta name='viewport' content='width=device-width, initial-scale=1'>
                                                        <title></title>
                                                        <meta name='description' content='Cargando, test psicometrico para saber lo mejor de ti y divertirte' />
                                                        <meta name='keywords' content='test, psicometria, estadistica, Cargando tu respuesta , personalidad, hombres, eres, reacciones' />
                                                        <meta name='author' content='TaiTa Funky' />
                                                        <meta property='og:image'              content='http://taita.co/cargando/img/cargando-facebook.jpg' />
                                                        <link rel='shortcut icon' href='../img/TaiTa-Funky-Mini.png'>
                                                        <link rel='stylesheet' type='text/css' href='css/normalize.css' />
                                                        <link rel='stylesheet' type='text/css' href='css/demo.css' />
                                                        <link rel='stylesheet' type='text/css' href='css/component.css' />
                                                        <link rel='stylesheet' type='text/css' href='css/cs-select.css' />
                                                        <link rel='stylesheet' type='text/css' href='css/cs-skin-boxes.css' />
                                                        <script src='js/modernizr.custom.js'></script>

  </head>
  <body>
     <div class='fs-title'><h1>Cargando</h1></div>


   <?php

    if ($estimulo==0){ 
    //echo "Marica"; 
    
      echo "<script>window.location = '../sessionFb/index.php'</script>";

        }
    else{


        //selecciona automaticamente a cual encuesta reenviar a la persona

        $servername='localhost';
        $username='taita923_chris';
        $password='mantarraya1';
        $dbname='taita923_datosPersonas';
        $conn= new mysqli($servername,$username,$password,$dbname);
        $connection=@mysql_connect($servername,$username,$password);

        $result=mysql_query("SELECT ruta FROM taita923_datosPersonas.investigaciones WHERE estado ='Activo' ORDER BY tiempoRestante ASC LIMIT 1");
        
        if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
        }

        $nombreEncuestaActual=mysql_fetch_row($result);
        $_SESSION['nombreEncuestaActual'] = $nombreEncuestaActual;
        //echo $_SESSION['nombreEncuestaActual']; 

        //echo $nombreEncuestaActual[0];

        


     echo "<script>window.location = '../".$nombreEncuestaActual[0]."/index.php'</script>";

     }

     ?>


    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>
</html>