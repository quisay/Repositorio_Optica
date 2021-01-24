   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/ProgHorario.php";
      class clsProgHorario extends Conexion
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
            public static function getProgHorario($proghorario){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where Medico_ID = :medico_id";
               
               $query = "Select * from TBProgHorario ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $medico_id = $proghorario->GetMedico_ID();
               $resultado->bindParam(':medico_id',$medico_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $proghorario= new ProgHorario();

               $proghorario->setMedico_ID($filas["Medico_ID"]);
               $proghorario->setFecha($filas["Fecha"]);
               $proghorario->setHora($filas["Hora"]);
               return $proghorario;

            }
			public static function getAllProgHorario(){
               $query = "Select * from TBProgHorario ";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Medico_ID[$i]=$fila["Medico_ID"];
					$arr_Fecha[$i]=$fila["Fecha"];
					$arr_Hora[$i]=$fila["Hora"];
					
					
					
			        ++$i;
			   }
               return array("arr_Medico_ID"=>$arr_Medico_ID,
							"arr_Fecha"=>$arr_Fecha,
							"arr_Hora"=>$arr_Hora,
							);

            }

            public static function registrarProgHorario($proghorario){
               $query = "Insert Into TBProgHorario(Medico_ID, Fecha, Hora) VALUES 
                         (:Medico_ID,:Fecha,:Hora)";
                         //echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Medico_ID = $proghorario->GetMedico_ID();
               $Fecha = $proghorario->GetFecha();
			   $Hora = $proghorario->GetHora();
               $status=0;
               $fechareg = date('Y-m-d h:i:s');
               $resultado->bindParam(':Medico_ID',$Medico_ID);
               $resultado->bindParam(':Fecha',$Fecha);
               $resultado->bindParam(':Hora',$Hora);
			   //echo " Medico_ID ".$Medico_ID." Fecha ".$Fecha." Hora ".$Hora;
			   
               if($resultado->execute()){
                  return true;
               }
               return false;
            }
			public static function deleteProgHorario($Medico_ID, $Fecha){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where Medico_ID = :Medico_ID and Fecha = :Fecha";
               
               $query = "Delete from TBProgHorario ".$filtro;		   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $resultado->bindParam(':Medico_ID',$Medico_ID); 
			   $resultado->bindParam(':Fecha',$Fecha);  			   
               
               $resultado->execute();

               return true;

            }
   }

   ?>