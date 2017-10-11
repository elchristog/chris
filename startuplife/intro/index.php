<?php


    session_start();

    //si no ha iniciado sesion lo envia a iniciar sesion
    if ($_SESSION['FBID']){       

    }
    else{
         echo "<script>window.location = '../inicia-sesion/index.php'</script>";
    }


    //si no hace parte de los administradores pa la calle
    if ($_SESSION['FBID']!=10153041577179080 && $_SESSION['FBID']!=1842563725971479){       
        echo "<script>window.location = '../</script>";
    }
    else{
         
    }


    $nombreEtapa='intro';
    $_SESSION['nombreEtapa'] = $nombreEtapa;
    //echo $_SESSION['nombreTest'];

    $rutaEtapa='intro';
    $_SESSION['rutaEtapa'] = $rutaEtapa;
    //echo $_SESSION['rutaTest'];

    $rutaBDEtapa=$rutaEtapa;
    $rutaBDEtapa=str_replace('-','',$rutaBDEtapa);
    $_SESSION['rutaBDEtapa'] = $rutaBDEtapa;
    //echo $_SESSION['rutaBDEtapa'];


?>

<!DOCTYPE html>
<!--cada archivo va a ejecutar 2 php, el primero es el cargando-guardando que guarda los datos de la persona en esa seccion y lo dirige ala seccion que sigue, el segundo: si una persona entra a una seccion revisa si si va en esa seccion y si no  entonces ejecuta cargando-->
<html lang='es' class='no-js'>
    <head>
        <meta charset='UTF-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Intro</title>
        <meta name='description' content='Guia de emprendimiento' />
        <meta name='keywords' content='emprendimiento' />
        <meta name='author' content='StartupLife' />
        <meta property='og:image'              content='http://startuplife.co/startuplife.jpg' />
        <link rel='shortcut icon' href='img/startuplife.png'>
        <link rel='stylesheet' type='text/css' href='../css/normalize.css' />
        <link rel='stylesheet' type='text/css' href='../css/demo.css' />
        <link rel='stylesheet' type='text/css' href='../css/component.css' />
        <link rel='stylesheet' type='text/css' href='../css/cs-select.css' />
        <link rel='stylesheet' type='text/css' href='../css/cs-skin-boxes.css' />
        <script src='../js/modernizr.custom.js'></script>
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
                    cookie: true,
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
                FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
            // -------------------------------------------------------
            //      Facebook User Data
            //var facebookUser = {};
            //      Child objects:
            //              facebookUser.id
            //              facebookUser.name
            //              facebookUser.first_name
            //              facebookUser.last_name
            //              facebookUser.link
            //              facebookUser.gender
            //              facebookUser.locale
            //              facebookUser.timezone
            //              facebookUser.updated_time
            //              facebookUser.verified
            // -------------------------------------------------------
            FB.login(function(response) {
            // handle the response
            }, {scope: 'public_profile,email'});
        </script>
        <!-- End Facebook SDK -->
        <!--<script>
        $( function facebook() {
        $( '#dialog' ).dialog();
        } );
        </script>-->
        <div class='container'>

            <div class='fs-form-wrap' id='fs-form-wrap'>
                <div class='fs-title'>

                    <div class='codrops-top'>
                        <a class='codrops-icon' href='../crea-tu-test/'><img id='testsBoton' src='../img/tests.png' style='width:25px; height:25px;'><span></span></a>
                        <a class='codrops-icon' href='../'><img class='logo-taita-funky-pregunta' src='../img/logo-TaiTa-funky.png' alt='Crea tu test TaiTa Funky' ><span></span></a>
                        <a class='codrops-icon' href='https://www.facebook.com/taitafunky/'><img id='testsBoton' src='../img/face.png' style='width:25px; height:25px;'><span></span></a>
                    </div>
                    <h1>Intro</h1><hr>
                </div>



                <form id='myform' class='fs-form fs-form-full' autocomplete='off' action='../cargando.php' method='POST'>
                    <ol class='fs-fields'>
                        <li data-input-trigger>
                            <label class='fs-field-label fs-anim-upper' for='q1' data-info='lalalalal'>Bienvenid@ a StartupLife, en esta herramienta te vamos a guiar paso a paso en la creacion de tu startup</label><br><img src='https://media.giphy.com/media/11s7Ke7jcNxCHS/giphy.gif' alt='startuplife Pregunta 1:' class='fs-anim-upper imagen-pregunta'>
                            <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q1a::after {background-image: url(https://i.imgflip.com/m36dg.jpg);} </style><input id='q1a' name='q1' type='radio' value='1'/><label      for='q1a' class='                               radio-q1a'>Vale</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q1b::after {background-image: url(https://i.imgflip.com/e9d70.jpg);}</style><input id='q1b' name='q1' type='radio' value='2'/><label       for='q1b' class='                               radio-q1b'>Siguente</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q1c::after {background-image: url(https://i.imgflip.com/4ymp3.jpg);}</style><input id='q1c' name='q1' type='radio' value='3'/><label       for='q1c' class='                               radio-q1c'>Excelente</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q1d::after {background-image: url(https://i.imgflip.com/caxfe.jpg);}</style><input id='q1d' name='q1' type='radio' value='4'/><label       for='q1d' class='                               radio-q1d'>Entendido</label></span>
                            </div>
                        </li>
                        <li data-input-trigger>
                            <label class='fs-field-label fs-anim-upper' for='q2' data-info=''>Te guiaremos desde la ideacion de tu proyecto hasta el punto en que estes preparad@ para vivir de tu negocio</label><br><img src='https://media.giphy.com/media/11s7Ke7jcNxCHS/giphy.gif' alt='startuplife Pregunta 2:' class='fs-anim-upper imagen-pregunta'>
                            <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q2a::after {background-image: url(https://i.imgflip.com/19ar4d.jpg);} </style><input id='q2a' name='q2' type='radio' value='1'/><label     for='q2a' class='                               radio-q2a'>Waoooo</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q2b::after {background-image: url(https://i.imgflip.com/fy4ba.jpg);}</style><input id='q2b' name='q2' type='radio' value='2'/><label       for='q2b' class='                               radio-q2b'>Me encanta</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q2c::after {background-image: url(https://i.imgflip.com/bbgj6.jpg);}</style><input id='q2c' name='q2' type='radio' value='3'/><label       for='q2c' class='                               radio-q2c'>Perfecto</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q2d::after {background-image: url(https://i.imgflip.com/10e0vh.jpg);}</style><input id='q2d' name='q2' type='radio' value='4'/><label      for='q2d' class='                               radio-q2d'>Vale</label></span>
                            </div>
                        </li>
                        <li data-input-trigger>
                            <label class='fs-field-label fs-anim-upper' for='q3' data-info=''>Cuando nuestro acompañamiento termine, esperamos que hallas alcanzado el punto de equilibrio, hallas ganado algunos concursos y tengas cierto reconocimiento en tu region</label><br><img src='https://media.giphy.com/media/11s7Ke7jcNxCHS/giphy.gif' alt='startuplife Pregunta 3:' class='fs-anim-upper imagen-pregunta'>
                            <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q3a::after {background-image: url(https://i.imgflip.com/3g5k6.jpg);} </style><input id='q3a' name='q3' type='radio' value='1'/><label      for='q3a' class='                               radio-q3a'>Eso me gusta</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q3b::after {background-image: url(https://i.imgflip.com/6gwau.jpg);}</style><input id='q3b' name='q3' type='radio' value='2'/><label       for='q3b' class='                               radio-q3b'>Listo</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q3c::after {background-image: url(https://i.imgflip.com/p3mcp.jpg);}</style><input id='q3c' name='q3' type='radio' value='3'/><label       for='q3c' class='                               radio-q3c'>Adelante</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q3d::after {background-image: url(https://i.imgflip.com/4b1up.jpg);}</style><input id='q3d' name='q3' type='radio' value='4'/><label       for='q3d' class='                               radio-q3d'>Ok</label></span>
                            </div>
                        </li>
                        <li data-input-trigger>
                            <label class='fs-field-label fs-anim-upper' for='q4' data-info=''>Este proceso va a tomar cerca de 6 meses, se paciente y nunca te rindas</label><br><img src='https://media.giphy.com/media/11s7Ke7jcNxCHS/giphy.gif' alt='startuplife Pregunta 4:' class='fs-anim-upper imagen-pregunta'>
                            <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q4a::after {background-image: url(https://i.imgflip.com/3g5k6.jpg);} </style><input id='q4a' name='q4' type='radio' value='1'/><label      for='q4a' class='                               radio-q4a'>Nunca me rindo</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q4b::after {background-image: url(https://i.imgflip.com/6gwau.jpg);}</style><input id='q4b' name='q4' type='radio' value='2'/><label       for='q4b' class='                               radio-q4b'>Vamos a lograrlo</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q4c::after {background-image: url(https://i.imgflip.com/p3mcp.jpg);}</style><input id='q4c' name='q4' type='radio' value='3'/><label       for='q4c' class='                               radio-q4c'>Esto me encanta</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q4d::after {background-image: url(https://i.imgflip.com/4b1up.jpg);}</style><input id='q4d' name='q4' type='radio' value='4'/><label       for='q4d' class='                               radio-q4d'>Es mi sueño</label></span>
                            </div>
                        </li>
                        <li data-input-trigger>
                            <label class='fs-field-label fs-anim-upper' for='q5' data-info=''>Realizarás muchos cursos y recibirás muchas herramientas, dales el mejor provecho</label><br><img src='https://media.giphy.com/media/11s7Ke7jcNxCHS/giphy.gif' alt='startuplife Pregunta 5:' class='fs-anim-upper imagen-pregunta'>
                            <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q5a::after {background-image: url(https://i.imgflip.com/3g5k6.jpg);} </style><input id='q5a' name='q5' type='radio' value='1'/><label      for='q5a' class='                               radio-q5a'>Entendido</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q5b::after {background-image: url(https://i.imgflip.com/6gwau.jpg);}</style><input id='q5b' name='q5' type='radio' value='2'/><label       for='q5b' class='                               radio-q5b'>Excelente</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q5c::after {background-image: url(https://i.imgflip.com/p3mcp.jpg);}</style><input id='q5c' name='q5' type='radio' value='3'/><label       for='q5c' class='                               radio-q5c'>Maravilloso</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-q5d::after {background-image: url(https://i.imgflip.com/4b1up.jpg);}</style><input id='q5d' name='q5' type='radio' value='4'/><label       for='q5d' class='                               radio-q5d'>Lo haré</label></span>
                            </div>
                        </li>
                        <li data-input-trigger>
                            <label class='fs-field-label fs-anim-upper' for='qestimulo' data-info='Más adelante solicitaremos tu correo.'>Guardaremos todos tus progresos, debes tratar de retomar lo más seguido posible. ¡Arranquemos!</label><br><img src='https://media.giphy.com/media/11s7Ke7jcNxCHS/giphy.gif' alt='startuplife estimulo' class='fs-anim-upper imagen-pregunta'>
                            <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                                <span><style>.fs-fields .fs-radio-custom label.radio-qestimuloa::after {background-image: url(https://i.imgflip.com/6fpey.jpg);}</style><input id='qestimuloa' name='qestimulo' type='submit' value='1'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;' /><label for='qestimuloa' class='radio-qestimuloa          '>Vamos!</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-qestimuloc::after {background-image: url(https://i.imgflip.com/18gtjf.jpg);}</style><input id='qestimuloc' name='qestimulo' type='submit' value='0'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;' /><label for='qestimuloc' class='radio-qestimuloc         '>Estoy listo!</label></span>
                            </div>
                        </li>

                        <!--
                        <li data-input-trigger>
                        <label class='fs-field-label fs-anim-upper' for='qInvest1' data-info=''>¿De qué amarías disfrazarte?</label><br><img src='img/startuplife-intro-qInvest1.gif' alt='startuplife qInvest1' class='fs-anim-upper imagen-pregunta'>
                        <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest1a::after {background-image: url(img/startuplife-intro-qInvest1-1.jpg);}</style><input id='qInvest1a' name='qInvest1' type='radio' value='1'/><label     for='qInvest1a' class='                         radio-qInvest1a'>Super Girl</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest1b::after {background-image: url(img/startuplife-intro-qInvest1-2.jpg);}</style><input id='qInvest1b' name='qInvest1' type='radio' value='2'/><label     for='qInvest1b' class='                         radio-qInvest1b'>Frida</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest1c::after {background-image: url(img/startuplife-intro-qInvest1-3.jpg);}</style><input id='qInvest1c' name='qInvest1' type='radio' value='3'/><label     for='qInvest1c' class='                         radio-qInvest1c'>Alegría</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest1d::after {background-image: url(img/startuplife-intro-qInvest1-4.jpg);}</style><input id='qInvest1d' name='qInvest1' type='radio' value='4'/><label     for='qInvest1d' class='                         radio-qInvest1d'>Dulce princesa</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest1e::after {background-image: url(img/startuplife-intro-qInvest1-5.jpg);}</style><input id='qInvest1e' name='qInvest1' type='radio' value='5'/><label     for='qInvest1e' class='                         radio-qInvest1e'>Moana</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest1f::after {background-image: url(img/startuplife-intro-qInvest1-6.jpg);}</style><input id='qInvest1f' name='qInvest1' type='radio' value='6'/><label     for='qInvest1f' class='                         radio-qInvest1f'>Harley Queen</label></span>
                        </div>
                        </li>

                        <li data-input-trigger>
                        <label class='fs-field-label fs-anim-upper' for='qInvest2' data-info=''>¿De qué amarías disfrazarte?</label><br><img src='img/startuplife-intro-qInvest2.gif' alt='startuplife qInvest2' class='fs-anim-upper imagen-pregunta'>
                        <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest2a::after {background-image: url(img/startuplife-intro-qInvest2-1.jpg);}</style><input id='qInvest2a' name='qInvest2' type='radio' value='1'/><label     for='qInvest2a' class='                         radio-qInvest2a'>Super Girl</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest2b::after {background-image: url(img/startuplife-intro-qInvest2-2.jpg);}</style><input id='qInvest2b' name='qInvest2' type='radio' value='2'/><label     for='qInvest2b' class='                         radio-qInvest2b'>Frida</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest2c::after {background-image: url(img/startuplife-intro-qInvest2-3.jpg);}</style><input id='qInvest2c' name='qInvest2' type='radio' value='3'/><label     for='qInvest2c' class='                         radio-qInvest2c'>Alegría</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest2d::after {background-image: url(img/startuplife-intro-qInvest2-4.jpg);}</style><input id='qInvest2d' name='qInvest2' type='radio' value='4'/><label     for='qInvest2d' class='                         radio-qInvest2d'>Dulce princesa</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest2e::after {background-image: url(img/startuplife-intro-qInvest2-5.jpg);}</style><input id='qInvest2e' name='qInvest2' type='radio' value='5'/><label     for='qInvest2e' class='                         radio-qInvest2e'>Moana</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest2f::after {background-image: url(img/startuplife-intro-qInvest2-6.jpg);}</style><input id='qInvest2f' name='qInvest2' type='radio' value='6'/><label     for='qInvest2f' class='                         radio-qInvest2f'>Harley Queen</label></span>
                        </div>
                        </li>

                        <li data-input-trigger>
                        <label class='fs-field-label fs-anim-upper' for='qInvest3' data-info=''>¿De qué amarías disfrazarte?</label><br><img src='img/startuplife-intro-qInvest3.gif' alt='startuplife qInvest3' class='fs-anim-upper imagen-pregunta'>
                        <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest3a::after {background-image: url(img/startuplife-intro-qInvest3-1.jpg);}</style><input id='qInvest3a' name='qInvest3' type='radio' value='1'/><label     for='qInvest3a' class='                         radio-qInvest3a'>Super Girl</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest3b::after {background-image: url(img/startuplife-intro-qInvest3-2.jpg);}</style><input id='qInvest3b' name='qInvest3' type='radio' value='2'/><label     for='qInvest3b' class='                         radio-qInvest3b'>Frida</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest3c::after {background-image: url(img/startuplife-intro-qInvest3-3.jpg);}</style><input id='qInvest3c' name='qInvest3' type='radio' value='3'/><label     for='qInvest3c' class='                         radio-qInvest3c'>Alegría</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest3d::after {background-image: url(img/startuplife-intro-qInvest3-4.jpg);}</style><input id='qInvest3d' name='qInvest3' type='radio' value='4'/><label     for='qInvest3d' class='                         radio-qInvest3d'>Dulce princesa</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest3e::after {background-image: url(img/startuplife-intro-qInvest3-5.jpg);}</style><input id='qInvest3e' name='qInvest3' type='radio' value='5'/><label     for='qInvest3e' class='                         radio-qInvest3e'>Moana</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest3f::after {background-image: url(img/startuplife-intro-qInvest3-6.jpg);}</style><input id='qInvest3f' name='qInvest3' type='radio' value='6'/><label     for='qInvest3f' class='                         radio-qInvest3f'>Harley Queen</label></span>
                        </div>
                        </li>

                        <li data-input-trigger>
                        <label class='fs-field-label fs-anim-upper' for='qInvest4' data-info=''>¿De qué amarías disfrazarte?</label><br><img src='img/startuplife-intro-qInvest4.gif' alt='startuplife qInvest4' class='fs-anim-upper imagen-pregunta'>
                        <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest4a::after {background-image: url(img/startuplife-intro-qInvest4-1.jpg);}</style><input id='qInvest4a' name='qInvest4' type='radio' value='1'/><label     for='qInvest4a' class='                         radio-qInvest4a'>Super Girl</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest4b::after {background-image: url(img/startuplife-intro-qInvest4-2.jpg);}</style><input id='qInvest4b' name='qInvest4' type='radio' value='2'/><label     for='qInvest4b' class='                         radio-qInvest4b'>Frida</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest4c::after {background-image: url(img/startuplife-intro-qInvest4-3.jpg);}</style><input id='qInvest4c' name='qInvest4' type='radio' value='3'/><label     for='qInvest4c' class='                         radio-qInvest4c'>Alegría</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest4d::after {background-image: url(img/startuplife-intro-qInvest4-4.jpg);}</style><input id='qInvest4d' name='qInvest4' type='radio' value='4'/><label     for='qInvest4d' class='                         radio-qInvest4d'>Dulce princesa</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest4e::after {background-image: url(img/startuplife-intro-qInvest4-5.jpg);}</style><input id='qInvest4e' name='qInvest4' type='radio' value='5'/><label     for='qInvest4e' class='                         radio-qInvest4e'>Moana</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest4f::after {background-image: url(img/startuplife-intro-qInvest4-6.jpg);}</style><input id='qInvest4f' name='qInvest4' type='radio' value='6'/><label     for='qInvest4f' class='                         radio-qInvest4f'>Harley Queen</label></span>
                        </div>
                        </li>

                        <li data-input-trigger>
                        <label class='fs-field-label fs-anim-upper' for='qInvest5' data-info=''>¿De qué amarías disfrazarte?</label><br><img src='img/startuplife-intro-qInvest5.gif' alt='startuplife qInvest5' class='fs-anim-upper imagen-pregunta'>
                        <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest5a::after {background-image: url(img/startuplife-intro-qInvest5-1.jpg);}</style><input id='qInvest5a' name='qInvest5' type='radio' value='1'/><label     for='qInvest5a' class='                         radio-qInvest5a'>Super Girl</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest5b::after {background-image: url(img/startuplife-intro-qInvest5-2.jpg);}</style><input id='qInvest5b' name='qInvest5' type='radio' value='2'/><label     for='qInvest5b' class='                         radio-qInvest5b'>Frida</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest5c::after {background-image: url(img/startuplife-intro-qInvest5-3.jpg);}</style><input id='qInvest5c' name='qInvest5' type='radio' value='3'/><label     for='qInvest5c' class='                         radio-qInvest5c'>Alegría</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest5d::after {background-image: url(img/startuplife-intro-qInvest5-4.jpg);}</style><input id='qInvest5d' name='qInvest5' type='radio' value='4'/><label     for='qInvest5d' class='                         radio-qInvest5d'>Dulce princesa</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest5e::after {background-image: url(img/startuplife-intro-qInvest5-5.jpg);}</style><input id='qInvest5e' name='qInvest5' type='radio' value='5'/><label     for='qInvest5e' class='                         radio-qInvest5e'>Moana</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-qInvest5f::after {background-image: url(img/startuplife-intro-qInvest5-6.jpg);}</style><input id='qInvest5f' name='qInvest5' type='radio' value='6'/><label     for='qInvest5f' class='                         radio-qInvest5f'>Harley Queen</label></span>
                        </div>
                        </li>



                        <li>
                        <label class='fs-field-label fs-anim-upper' for='qcorreo' data-info='No te enviaremos spam, es una promesa'>Deja tu correo electrónico para informarte si ganaste</label><br><img src='img/startuplife-intro-correo.gif' alt='startuplife correo' class='fs-anim-upper imagen-pregunta'><br>
                        <input class='fs-anim-lower' id='qcorreo' name='qcorreo' type='email' placeholder='christian@taita.co' required/>
                        </li>



                        <li data-input-trigger>
                        <label class='fs-field-label fs-anim-upper' for='envioInvest' data-info=''>¿Cuál color prefieres?</label><br><img src='img/startuplife-intro-envioInvest.gif' alt=startuplife  envioInvest' class='fs-anim-upper imagen-pregunta'>
                        <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                        <span><style>.fs-fields .fs-radio-custom label.radio-envioInvesta::after {background-image: url(img/startuplife-intro-envioInvest-1.jpg);}</style><input id='envioInvesta' name='envioInvest' type='submit' value='1'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='envioInvesta' class='radio-envioInvesta              '>Rojo</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-envioInvestb::after {background-image: url(img/startuplife-intro-envioInvest-2.jpg);}</style><input id='envioInvestb' name='envioInvest' type='submit' value='2'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='envioInvestb' class='radio-envioInvestb      '>Verde</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-envioInvestc::after {background-image: url(img/startuplife-intro-envioInvest-3.jpg);}</style><input id='envioInvestc' name='envioInvest' type='submit' value='3'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='envioInvestc' class='radio-envioInvestc              '>Amarillo</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-envioInvestd::after {background-image: url(img/startuplife-intro-envioInvest-4.jpg);}</style><input id='envioInvestd' name='envioInvest' type='submit' value='4'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='envioInvestd' class='radio-envioInvestd      '>Azul</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-envioInveste::after {background-image: url(img/startuplife-intro-envioInvest-5.jpg);}</style><input id='envioInveste' name='envioInvest' type='submit' value='5'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='envioInveste' class='radio-envioInveste      '>Negro</label></span>
                        <span><style>.fs-fields .fs-radio-custom label.radio-envioInvestf::after {background-image: url(img/startuplife-intro-envioInvest-6.jpg);}</style><input id='envioInvestf'  name='envioInvest' type='submit' value='6'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;' /><label for='envioInvestf' class='radio-envioInvestf    '>Rosado</label></span>
                        </div>

                        </li>
                        -->
                        <li data-input-trigger>
                            <label class='fs-field-label fs-anim-upper' for='envio' data-info=''>Pregunta 5:</label><br><img src='img/preg5.png' alt='startuplife Pregunta 5:' class='fs-anim-upper imagen-pregunta'>
                            <div class='fs-radio-group fs-radio-custom clearfix fs-anim-lower'>
                                <span><style>.fs-fields .fs-radio-custom label.radio-envioa::after {background-image: url(https://i.imgflip.com/8wj9w.jpg);}</style><input id='envioa' name='envio' type='submit' value='1'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='envioa' class='radio-envioa               '>A)</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-enviob::after {background-image: url(https://i.imgflip.com/3ji8.jpg);}</style><input id='enviob' name='envio' type='submit' value='2'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='enviob' class='radio-enviob        '>B)</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-envioc::after {background-image: url(https://i.imgflip.com/7bs7x.jpg);}</style><input id='envioc' name='envio' type='submit' value='3'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='envioc' class='radio-envioc               '>C)</label></span>
                                <span><style>.fs-fields .fs-radio-custom label.radio-enviod::after {background-image: url(https://i.imgflip.com/h6dz3.jpg);}</style><input id='enviod' name='envio' type='submit' value='4'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;'/><label for='enviod' class='radio-enviod       '>D)</label></span>
                                <!--<span><style>.fs-fields .fs-radio-custom label.radio-envioh::after {background-image: url(img/startuplife-intro-5-8.jpg);}</style><input id='envioh' onclick='FB.login()' name='envio' type='submit' value='8'  style='height:0px;border-bottom:0px;margin-top:-4px;color:#ffffff;' /><label for='envioh' class='radio-envioh    '> </label></span>-->
                            </div>
                        </li>

                    </ol><!-- /fs-fields -->
                    <!--<button class='fs-submit' type='submit'>Send answers</button>-->
                </form><!-- /fs-form -->
            </div><!-- /fs-form-wrap -->


            <!--<div id='dialog' title='Recuerda iniciar sesión' style='z-index:99999;'>-->
            <!-- <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
            <fb:login-button
            appId='1432872223665171'
            scope='public_profile,email'
            id='facebook-login-button'>
            </fb:login-button>
            <div id='fbStatus'>
            </div>  -->
            <!--</div>-->

            <!-- Related demos -->
            <div class='related'>
                <p>If you enjoyed this demo you might also like:</p>
                <a href='http://tympanus.net/Development/MinimalForm/'>
                    <img src='img/relatedposts/minimalform1-300x162.png' />
                    <h3>Minimal Form Interface</h3>
                </a>
                <a href='http://tympanus.net/Development/ButtonComponentMorph/'>
                    <img src='img/relatedposts/MorphingButtons-300x162.png' />
                    <h3>Morphing Buttons Concept</h3>
                </a>
            </div>

        </div><!-- /container -->
        <script src='../js/classie.js'></script>
        <script src='../js/selectFx.js'></script>
        <script src='../js/fullscreenForm.js'></script>
        <script>
            (function() {
                    var formWrap = document.getElementById( 'fs-form-wrap' );

                    [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
                    new SelectFx( el, {
                    stickyPlaceholder: false,
                    onChange: function(val){
                        document.querySelector('span.cs-placeholder').style.backgroundColor = val;
                    }
                    });
                    } );

                new FForm( formWrap, {
                    onReview : function() {
                        
                    }
                } );
            })();
        </script>
    </body>
</html>