<?php














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
                         $nombreCategoria='nada';
                         $nombreSubCategoria='embarazo si tiene relaciones con la regla';
                         $palabraDeReemplazo='embarazoRelacionesConRegla';
                         $palabrasAsociadas=array('uno','una','tiene','relaciones','teniendo','regla','puede','quedar','embarazo','si','hace','sexo','con'
                            ,'periodo','embarazada','podria','mestruacion','menstruacion','embaraso','enbarazo','enbarazada','embarazar','acuesta','acostarse','quedo'
                            ,'terminar','novio','esposo','pareja','relaiones','elaciones','seso','rgla','priodo','sxo','ebarazo','ebarazada','acostarse','eniendo'
                            ,'preja','mstruacion','mestruasion','mestrua','eriodo','embarasar','estuvo','estubo','esta','sta','stuvo','stubo','estuve','estube'
                            ,'puedo','podria','pdria','qudar','quedar','kedar','embarazae','iene','tene','amor','amr','hace','ase','hase'
                            ,'ace','espso','dias','estando');






                         

                         if(substr_count($nombreCategoria, 'nada')==1){

                            
                             }
                             else{
                                 $sql="INSERT INTO taita923_datosPersonas.temas9meses   VALUES('','$nombreCategoria','$nombreSubCategoria','$palabraDeReemplazo','$palabrasAsociadas[0]','$palabrasAsociadas[1]','$palabrasAsociadas[2]','$palabrasAsociadas[3]','$palabrasAsociadas[4]','$palabrasAsociadas[5]','$palabrasAsociadas[6]','$palabrasAsociadas[7]','$palabrasAsociadas[8]','$palabrasAsociadas[9]','$palabrasAsociadas[10]','$palabrasAsociadas[11]','$palabrasAsociadas[12]','$palabrasAsociadas[13]','$palabrasAsociadas[14]','$palabrasAsociadas[15]','$palabrasAsociadas[16]','$palabrasAsociadas[17]','$palabrasAsociadas[18]','$palabrasAsociadas[19]','$palabrasAsociadas[20]','$palabrasAsociadas[21]','$palabrasAsociadas[22]','$palabrasAsociadas[23]','$palabrasAsociadas[24]','$palabrasAsociadas[25]','$palabrasAsociadas[26]','$palabrasAsociadas[27]','$palabrasAsociadas[28]','$palabrasAsociadas[29]','$palabrasAsociadas[30]','$palabrasAsociadas[31]','$palabrasAsociadas[32]','$palabrasAsociadas[33]','$palabrasAsociadas[34]','$palabrasAsociadas[35]','$palabrasAsociadas[36]','$palabrasAsociadas[37]','$palabrasAsociadas[38]','$palabrasAsociadas[39]','$palabrasAsociadas[40]','$palabrasAsociadas[41]','$palabrasAsociadas[42]','$palabrasAsociadas[43]','$palabrasAsociadas[44]','$palabrasAsociadas[45]','$palabrasAsociadas[46]','$palabrasAsociadas[47]','$palabrasAsociadas[48]','$palabrasAsociadas[49]','$palabrasAsociadas[50]','$palabrasAsociadas[51]','$palabrasAsociadas[52]','$palabrasAsociadas[53]','$palabrasAsociadas[54]','$palabrasAsociadas[55]','$palabrasAsociadas[56]','$palabrasAsociadas[57]','$palabrasAsociadas[58]','$palabrasAsociadas[59]','$palabrasAsociadas[60]','$palabrasAsociadas[61]','$palabrasAsociadas[62]','$palabrasAsociadas[63]','$palabrasAsociadas[64]','$palabrasAsociadas[65]','$palabrasAsociadas[66]','$palabrasAsociadas[67]','$palabrasAsociadas[68]','$palabrasAsociadas[69]','$palabrasAsociadas[70]')";
                                 if($conn->query($sql)==TRUE){}
                                 else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;



                                 $nombreSubCategoriaSinEspaciosNuevaColumna=str_replace(" ","",$nombreSubCategoria);
                                 $sql="ALTER TABLE  taita923_datosPersonas.converzaciones9meses ADD  ".$nombreSubCategoriaSinEspaciosNuevaColumna." FLOAT NOT NULL";
                                 if($conn->query($sql)==TRUE){}
                                 else{      echo 'Error: '.$sql .'<br>'.$conn->error;}$conn->close;


                             
                                }
?>