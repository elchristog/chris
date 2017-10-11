<?php
session_start(); 

    //si no ha iniciado sesion lo envia a iniciar sesion
    if ($_SESSION['FBID']){       

    }
    else{
         echo "<script>window.location = '../inicia-sesion/index.php'</script>";
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <title>9 Meses</title>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="description" content="Acompañamiento y asesoria en el embarazo y la maternidad" />
    <meta name="piano__keywords" content="embarazo, bebe, cuidado, ser mama, ser papa, asesoria, salud, hijos, periodo" />
    <meta name="author" content="9meses" />
    <meta property='og:image'              content='http://9meses.co/img/9meses-portada-facebook.png' />
    <link rel='shortcut icon' href='favicon.ico'>
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-3851506205594502",
        enable_page_level_ads: true
      });
    </script>
    <script type="text/javascript">


        // ask user for name with popup prompt    
        //var name = prompt("Enter your chat name:", "Guest"); aca salia la caja pidiendo el nombre, ya no por que lo trae de facebook
         var name ="Guest";
        
        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "Guest";	
    	}

       	// strip tags
    	//name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
              
    			        chat.send(text, name);	
    			        $(this).val("");

                        //como le quite lo de actualizarse cada x segundos entonces no muestra en pantalla lo que la persona envio apenas le da enter, por eso voy a hacer que se muestre aca con este comando
                        <?php                        
                         $nickname = $_SESSION['FULLNAME'];
                         $primerNombre = str_word_count($nickname,1);
                         $nickname =  $primerNombre[0];
                         $nombreChatUsuario=$_SESSION['FBID'];
                         //$message = str_replace("\n", " ", $message) 
                        ?>
                        var nombreUsuario="<?php echo $nickname ?>";
                        $('#chat-area').append($("<p>"+ "<span>"+ nombreUsuario + "</span>" + text +"</p>"));


                        //Esta funcion le dice al usuario que alejandra esta escribiendo
                        function muestraTexto() {
                          document.getElementById("estaEscribiendo").innerHTML = "Alejandra está escribiendo...";
                        }


                        //Esta funcion quita el aviso de que esta escribiendo por que ya casi le da la respuesta
                        function ocultaTexto() {
                          document.getElementById("estaEscribiendo").innerHTML = "";
                        }

                        //ejecuto las funciones tardandose 4 segundos en mostrar quee scribe y 9 en quitatr, probe asi y funciona bien
                        var ms=Math.floor(Math.random() * (5000 - 3000)) + 3000;
                        setTimeout(muestraTexto, ms);
                        //voy a hacer que la funcio oculta texto se ejecute apenas comienza a responder en el php
                        setTimeout(ocultaTexto, 11000);

    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>
<!-- 86400000  el intervalo de tiempo estaba en 1000, osea cada 1 segundo ejecutaba la funcion uptdatechat y ella ejecuta el process.php y por eso se gasta toda la memoria del servidor en un ratico, asi que aumente el tiempo de actualizacion a 24 horas, igual esta actualizacion solo sirve cuando es un chat de varias personas pero como aca contesta la maquina-->
<body onload="setInterval('chat.update()', 13000)">
<!--
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
-->
    <div id="page-wrap">
        <img src='images/9meses-logo.png' alt='9 meses' id='logo9meses'>
        <h2>Alejandra Martinez</h2>
        <h4>Activo(a)</h4>
        <h5 id="estaEscribiendo"></h5>
        
        <p id="name-area"></p>
        
        <div id="chat-wrap"><div id="chat-area">
            <!--<p><span style='background-color: #BD8298;'>9meses</span> Bienvenida, procura hacer preguntas concretas y si notas que alguna respuesta no es acertada escribe: respuesta incorrecta</p>-->
        </div></div>
        
        <form id="send-message-area">
            <!--<p>Your message: </p>-->
            <!--Si la flaca es quien escribe le deja muchas mas palabras -->
            <textarea id="sendie" maxlength = "<?php if($_SESSION['FBID']==2026380267589823){echo 733;}else{echo 400;} ?>"  placeholder="Escribe un mensaje..."></textarea>
        </form>
    
    </div>

</body>

</html>