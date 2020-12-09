   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/Cita.php";
      class clsCita extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene una Cita
   ***
   */
            public static function getCita($cita){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where cita_ID = :cita_id";
               
               $query = "Select * from TBCita ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $cita_id = $cita->GetCita_ID();
               $resultado->bindParam(':cita_id',$cita_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $cita= new Cita();

               $cita->setCita_ID($filas["Cita_ID"]);
               $cita->setFecha($filas["Fecha"]);
               $cita->setHora($filas["Hora"]);
               $cita->setCliente_ID($filas["Cliente_ID"]);
               $cita->setMedico_ID($filas["Medico_ID"]);
               $cita->setFechaMod($filas["FechaMod"]);
               $cita->setFechaIngreso($filas["FechaIngreso"]);
               $cita->setFechaSalida($filas["FechaSalida"]);
               $cita->setStatus($filas["Status"]);
			   $cita->setObservaciones($filas["Observaciones"]);
               return $cita;

            }
			public static function getAllCita(){
               $query = "Select * from TBCita ";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Cita_ID[$i]=$fila["Cita_ID"];
					$arr_Fecha[$i]=$fila["Fecha"];
					$arr_Hora[$i]=$fila["Hora"];
					$arr_Cliente_ID[$i]=$fila["Cliente_ID"];
					$arr_Medico_ID[$i]=$fila["Medico_ID"];
					$arr_FechaMod[$i]=$fila["FechaMod"];
					$arr_FechaIngreso[$i]=$fila["FechaIngreso"];
					$arr_FechaSalida[$i]=$fila["FechaSalida"];
					$arr_Status[$i]=$fila["Status"];
					$arr_Observaciones[$i]=$fila["Observaciones"];
					
			        ++$i;
			   }
               return array("arr_Cita_ID"=>$arr_Cita_ID,
							"arr_Fecha"=>$arr_Fecha,
							"arr_Hora"=>$arr_Hora,
							"arr_Cliente_ID"=>$arr_Cliente_ID, 
                            "arr_Medico_ID"=>$arr_Medico_ID,
							"arr_FechaMod"=>$arr_FechaMod,
							"arr_FechaIngreso"=>$arr_FechaIngreso,
							"arr_FechaSalida"=>$arr_FechaSalida,
							"arr_Status"=>$arr_Status,
							"arr_Observaciones"=>$arr_Observaciones,
							);

            }

            public static function registrarCita($cita){
               $query = "Insert Into TBCita(Cita_ID, Fecha, Hora, Cliente_ID, Medico_ID, FechaMod, FechaIngreso, FechaSalida, Status, Observaciones) VALUES 
                         (:Cita_ID,:Fecha,:Hora,:Cliente_ID,:Medico_ID,:FechaMod,:FechaIngreso,:FechaSalida,:Status,:Observaciones)";
                         //echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Cita_ID = $cita->GetCita_ID();
               $Fecha = $cita->GetFecha();
               $Hora = $cita->GetHora();
               $Cliente_ID = $cita->GetCliente_ID();
               $Medico_ID = $cita->GetMedico_ID();
			   $FechaMod = $cita->GetFechaMod();
			   $FechaIngreso = $cita->GetFechaIngreso();
			   $FechaSalida = $cita->GetFechaSalida();
			   $Status = $cita->GetStatus();
			   $Observaciones = $cita->GetObservaciones();
               $status=0;
               $fechareg = date('Y-m-d h:i:s');
               $resultado->bindParam(':Cita_ID',$Cita_ID);
               $resultado->bindParam(':Fecha',$Fecha);
               $resultado->bindParam(':Hora',$Hora);
               $resultado->bindParam(':Cliente_ID',$Cliente_ID);
               $resultado->bindParam(':Medico_ID',$Medico_ID);
               $resultado->bindParam(':FechaMod',$FechaMod);
               $resultado->bindParam(':FechaIngreso',$FechaIngreso);
			   $resultado->bindParam(':FechaSalida',$FechaSalida);
			   $resultado->bindParam(':Status',$Status);
			   $resultado->bindParam(':Observaciones',$Observaciones);
               $cita_ID = NULL;
			   //echo " Cita_ID ".$Fecha." Hora ".$Cliente_ID." Medico_ID ".$FechaMod." FechaIngreso ".$FechaSalida." Status ".$Observaciones;
               if($resultado->execute()){
                  $query = "Select max(cita_ID) as cita from TBCita Where status = 0 ";
                  $resultado1 = self::$conexion->prepare($query);
                  $resultado1->execute();
                  $filas1 = $resultado1->fetch();
                  $cita_ID = $filas1["cita"];
               }
               if($cita_ID=="")die("Error al insertar los datos, llame al administrador del sistema");
               return $cita_ID;
            }
   }

   ?>