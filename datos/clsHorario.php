   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/Horario.php";
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
   *** Funcion que obtiene un Horario
   ***
   */
            public static function getHorario($horario){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where horario_ID = :horario_id";
               
               $query = "Select * from TBHorario ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $horario_id = $horario->GetHorario_ID();
               $resultado->bindParam(':horario_id',$horario_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $horario= new Horario();

               $horario->setHorario_ID($filas["Horario_ID"]);
               $horario->setFecha($filas["Fecha"]);
               $horario->setHora($filas["Hora"]);
               $horario->setDescripcion($filas["Descripcion"]);
               $horario->setSemana($filas["Semana"]);
               $horario->setFechaMod($filas["FechaMod"]);
               return $horario;

            }
			public static function getAllHorario(){
               $query = "Select * from TBHorario ";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Horario_ID[$i]=$fila["Horario_ID"];
					$arr_Fecha[$i]=$fila["Fecha"];
					$arr_Hora[$i]=$fila["Hora"];
					$arr_Descripcion[$i]=$fila["Descripcion"];
					$arr_Semana[$i]=$fila["Semana"];
					$arr_FechaMod[$i]=$fila["FechaMod"];
					
					
			        ++$i;
			   }
               return array("arr_Horario_ID"=>$arr_Horario_ID,
							"arr_Fecha"=>$arr_Fecha,
							"arr_Hora"=>$arr_Hora,
							"arr_Descripcion"=>$arr_Descripcion, 
                            "arr_Semana"=>$arr_Semana,
							"arr_FechaMod"=>$arr_FechaMod,
							);

            }

            public static function registrarCita($horario){
               $query = "Insert Into TBHorario(Horario_ID, Fecha, Hora, Descripcion, Semana, FechaMod) VALUES 
                         (:Horario_ID,:Fecha,:Hora,:Descripcion,:Semana,:FechaMod)";
                         //echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $horario_ID = $horario->GetHorario_ID();
               $Fecha = $horario->GetFecha();
               $Hora = $horario->GetHora();
               $Descripcion = $horario->GetDescripcion();
               $Semana = $horario->GetSemana();
			   $FechaMod = $horario->GetFechaMod();
               $status=0;
               $fechareg = date('Y-m-d h:i:s');
               $resultado->bindParam(':Horario_ID',$horario_ID);
               $resultado->bindParam(':Fecha',$Fecha);
               $resultado->bindParam(':Hora',$Hora);
               $resultado->bindParam(':Descripcion',$Descripcion);
               $resultado->bindParam(':Semana',$Semana);
               $resultado->bindParam(':FechaMod',$FechaMod);
               $horario_ID = NULL;
			   //echo " Horario_ID ".$Fecha." Hora ".$Descripcion." Semana ".$FechaMod.;
               if($resultado->execute()){
                  $query = "Select max(horario_ID) as horario from TBHorario Where status = 0 ";
                  $resultado1 = self::$conexion->prepare($query);
                  $resultado1->execute();
                  $filas1 = $resultado1->fetch();
                  $horario_ID = $filas1["horario"];
               }
               if($horario_ID=="")die("Error al insertar los datos, llame al administrador del sistema");
               return $horario_ID;
            }
   }

   ?>