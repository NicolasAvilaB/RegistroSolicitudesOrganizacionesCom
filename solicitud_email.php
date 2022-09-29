<?php
	 $conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
                    mysqli_set_charset($conexion,"utf8");
                    $consulta = "Call Buscar_LimiteFecha";
                    $ejecutar = mysqli_query($conexion,$consulta);
                    ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = "nicolasrodavila@gmail.com";
            $asunto = "Bienvenido Administrador - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
              "Hola, bienvenido al sistema de organizaciones comunitarias, <br>\n".
              "tu usuario y contraseña se describira a continuacion <br>\n". 
              "<br>\n".
               $i = 0;
                    $a1 = "";
                    $b2 = "";
                	while ($row = mysqli_fetch_array($ejecutar)) 
                	{
                        $a1 = $row[0];
                        $b2 = $row[1];
            	        $i++;
            	        $valor ="";
            	        date_default_timezone_set('America/Santiago');
            		    $fechainicio=strftime("%Y-%m-%d", time());
                        $date1 = new DateTime($fechainicio);
                        $date2 = new DateTime($b2);
                        $diff = $date1->diff($date2);
                        if($diff->days <= "5"){
                        	if($diff->days == "0"){
                        		echo $a1 . ' - Tiempo Limite Expirado';
                        	}
                        	else{
                        	    echo $a1 . ' - ALERTA QUEDAN '.$diff->days . ' Dias ';
                        	}
                        }else{
                            echo $a1 .' - Quedan '. $diff->days . ' Dias ';

                        }
                                        	   "NOMBRE: $a1<br>\n";
                
                	}
               
              "<br>\n".
              "Recuerda, para acceder dirigete a nuestro sitio web muniperalillo.cl, pestaña Tramites y luego Sistema<br>\n".
              "<br>\n".
              "Atte:<br>\n".
              "Departamento Administración Social <br>\n".
              "Ilustre Municipalidad de Peralillo";
            $headers = "MIME-Version: 1.0\r\n".		
               "Content-type: text/html;charset=charset=UTF-8\r\n".
               "From: $from\r\n".
               "Reply-To: $from\r\n".
               "Return-path: $from\r\n".
               "\r\n";
            mail($to,$asunto,$message, $headers);
?>
