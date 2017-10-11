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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>9 Meses: Administrador</title>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="description" content="Acompañamiento y asesoria en el embarazo y la maternidad" />
    <meta name="piano__keywords" content="embarazo, bebe, cuidado, ser mama, ser papa, asesoria, salud, hijos, periodo" />
    <meta name="author" content="9meses" />
    <meta property='og:image'              content='http://taita.co/9meses/img/9meses-portada-facebook.png' />
    <link rel='shortcut icon' href='favicon.ico'>
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
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


                        //Esta funcion le dice al usuario que alejandra esta escribiendo
                        function muestraTexto() {
                          document.getElementById("estaEscribiendo").innerHTML = "Alejandra está escribiendo...";
                        }


                        //Esta funcion quita el aviso de que esta escribiendo por que ya casi le da la respuesta
                        function ocultaTexto() {
                          document.getElementById("estaEscribiendo").innerHTML = "";
                        }

                        //ejecuto las funciones tardandose 4 segundos en mostrar quee scribe y 9 en quitatr, probe asi y funciona bien
                        var ms=Math.floor(Math.random() * (2000 - 1000)) + 1000;
                        setTimeout(muestraTexto, ms);
                        setTimeout(ocultaTexto, 6000);

    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body onload="setInterval('chat.update()', 86400000)">

    <div id="page-wrap">
        <img src='images/9meses-logo.png' alt='9 meses' id='logo9meses'>
        <h2>Alejandra Martinez</h2>
        <h4>9meses: pide nueva frase que necesita respuesta, fraseincompleta indica que la frase no tiene logica por si sola, siempre tutear</h4>
        <h5 id="estaEscribiendo"></h5>
        
        <p id="name-area"></p>
        
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <!--<p>Your message: </p>-->
            <textarea id="sendie" maxlength = '733'  placeholder="Escribe un mensaje..."></textarea>
        </form>
    
    </div>

</body>

</html>