   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/ProgFecha.php";
      class clsProgFecha extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene un Horario
   ***
   */
            public static function getProgFecha($progfecha){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where Fecha, Medico_ID = :Fecha, Medico_ID";
               
               $query = "Select * from TBProgFecha ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Fecha= $ProgFecha->GetFecha();
               $resultado->bindParam(':Fecha, Medico_ID',$Fecha, Medico_ID);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $ProgFecha= new ProgFecha();

               $ProgFecha->setFecha($filas["Fecha"]);
               $ProgFecha->setMedico_ID($filas["Medico_ID"]);
               $ProgFecha->setSemana($filas["Semana"]);
			   $ProgFecha->setAnio($filas["Anio"]);
               $ProgFecha->setActividad($filas["Actividad"]);
               $ProgFecha->setFechaMod($filas["FechaMod"]);
			   $ProgFecha->setUsuario($filas["Usuario"]);
               return $ProgFecha;

            }
			public static function getAllProgFecha(){
               $query = "Select * from TBProgFecha ";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Fecha[$i]=$fila["Fecha"];
					$arr_Medico_ID[$i]=$fila["Medico_ID"];
					$arr_Semana[$i]=$fila["Semana"];
					$arr_Anio[$i]=$fila["Anio"];
					$arr_Actividad[$i]=$fila["Actividad"];
					$arr_FechaMod[$i]=$fila["FechaMod"];
					$arr_Usuario[$i]=$fila["Usuario"];
					
					
			        ++$i;
			   }
               return array("arr_Fecha"=>$arr_Fecha,
							"arr_Medico_ID"=>$arr_Medico_ID,
							"arr_Semana"=>$arr_Semana, 
							"arr_Anio"=>$arr_Anio,
                            "arr_Actividad"=>$arr_Actividad,
							"arr_FechaMod"=>$arr_FechaMod,
							"arr_Usuario"=>$arr_Usuario,
							);

            }

            public static function registrarProgFecha($ProgFecha){
               $query = "Insert Into TBProgFecha(Fecha, Medico_ID, Semana, Anio, Actividad, FechaMod, Usuario) VALUES 
                         (:Fecha,:Medico_ID,:Semana,:Anio,:Actividad,:FechaMod,:Usuario)";
                         echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Fecha = $ProgFecha->GetFecha();
               $Medico_ID = $ProgFecha->GetMedico_ID();
               $Semana = $ProgFecha->GetSemana();
			   $Anio = $ProgFecha->GetAnio();
               $Actividad = $ProgFecha->GetActividad();
			   $FechaMod = $ProgFecha->GetFechaMod();
			   $Usuario = $ProgFecha->GetUsuario();
               $status=0;
               $fechareg = date('Y-m-d h:i:s');
               $resultado->bindParam(':Fecha',$Fecha);
               $resultado->bindParam(':Medico_ID',$Medico_ID);
               $resultado->bindParam(':Semana',$Semana);
			   $resultado->bindParam(':Anio',$Anio);
               $resultado->bindParam(':Actividad',$Actividad);
               $resultado->bindParam(':FechaMod',$FechaMod);
			   $resultado->bindParam(':Usuario',$Usuario);
               
			   //echo " Fecha ".$Medico_ID." Semana ".$Anio." Actividad ".$FechaMod." Usuario ";
               $resultado->execute();
            }
   }

   ?>