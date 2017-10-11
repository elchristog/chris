<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" lang='es' class='no-js'>
<meta charset='UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta property='og:image'              content='http://9meses.co/img/9meses-portada-facebook.png' />
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<link rel="shortcut icon" href="../favicon.ico">
<link rel='stylesheet' type='text/css' href='css/component.css' />

  <head>
     <title>Cargando</title>
      <!--<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> -->
  </head>




   <body>
           <script>
            window.fbAsyncInit = function() {
              FB.init({
                appId      : '145678322659466',
                cookie     : true,
                xfbml      : true,
                version    : 'v2.8'
              });
              FB.AppEvents.logPageView();   
            };

            (function(d, s, id){
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) {return;}
               js = d.createElement(s); js.id = id;
               js.src = "//connect.facebook.net/en_US/sdk.js";
               fjs.parentNode.insertBefore(js, fjs);
             }(document, 'script', 'facebook-jssdk'));
          </script>
      <div class='fs-title'><h1 class="titulo-cargando">Cargando, tranquila estamos aquí</h1></div>






                   <!--  After user login  -->
                  <?php if ($_SESSION['FBID']): 

                   echo "<script>window.location = '../chat/index.php'</script>";



                       ?> 
                      <!-- <div class="container">
                       <div class="hero-unit">
                       <h1>Hello <php>?php echo $_SESSION['USERNAME']; ?></h1>
                       <p>Welcome to "facebook login" tutorial</p>
                       </div>
                       <div class="span4">
                       <ul class="nav nav-list">
                       <li class="nav-header">Image</li>
                      	<li><img src="https://graph.facebook.com/<php>?php echo $_SESSION['FBID']; ?>/picture"></li>
                       <li class="nav-header">Facebook ID</li>
                       <li><php>?php echo  $_SESSION['FBID']; ?></li>
                       <li class="nav-header">Facebook fullname</li>
                       <li><php>?php echo $_SESSION['FULLNAME']; ?></li>
                       <li class="nav-header">Facebook Email</li>
                       <li><php>?php echo $_SESSION['EMAIL']; ?></li>
                       <li class="nav-header">Gender</li>
                       <li><php>?php echo $_SESSION['GENDER']; ?></li>
                       <li class="nav-header">Age</li>
                       <li><php>?php echo $_SESSION['AGE']; ?></li>
                       
                       
                         <php>?php  $_SESSION['FBID'] = $fuid;
                          $_SESSION['LASTNAME'] = $fblastname;
                          $_SESSION['FIRSTNAME'] = $fbfirstname;
                          $_SESSION['EMAIL'] =  $femail; ?>
                       <div><a href="logout.php">Logout</a></div>
                       </ul></div></div>-->


                 

                   <!-- Before login --> 
                  <?php else: ?>    
                       <div class="contenedor">
                          <h1 class="inicia">Inicia sesión para comenzar:</h1><br><br>


                              <!--   Not Connected-->
                         <div>

                              <a href="fbconfig.php"><img class="botonFace" border="0" alt="Inicar sesión 9meses" src="img/facebookLogin.png" width="250" height="40"></a>
                         </div>
                         
                      	 <!--<div> <a href="http://www.krizna.com/general/login-with-facebook-using-php/"  title="Login with facebook">View Post</a>
                      	  </div>-->
                          
                          <h6 class="terminos">Al dar click en el botón estas aceptando los <a class="codrops-icon"  target="_blank" href="../terminosycondiciones/">Terminos y condiciones del servicio</a></h6>

                      </div>
                          <?php endif ?>
  </body>
</html>
