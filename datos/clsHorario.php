   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/Horario.php";
      class clsHorario extends Conexion
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
               $horario->setDescripcion($filas["Descripcion"]);
               $horario->setDia($filas["Dia"]);
			   $horario->setHora($filas["Hora"]);
               $horario->setMedico_ID($filas["Medico_ID"]);
               $horario->setFechaMod($filas["FechaMod"]);
			   $horario->setUsuario($filas["Usuario"]);
               return $horario;

            }
			public static function getAllHorario(){
               $query = "Select * from TBHorario ";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
               $arr_Horario_ID =null;
			   $arr_Descripcion =null;
			   $arr_Dia =null;
			   $arr_Hora =null;
			   $arr_Medico_ID =null;
			   $arr_FechaMod =null;
			   $arr_Usuario =null;
			   
			   $i=0;
			   foreach($filas as $fila){
					$arr_Horario_ID[$i]=$fila["Horario_ID"];
					$arr_Descripcion[$i]=$fila["Descripcion"];
					$arr_Dia[$i]=$fila["Dia"];
					$arr_Hora[$i]=$fila["Hora"];
					$arr_Medico_ID[$i]=$fila["Medico_ID"];
					$arr_FechaMod[$i]=$fila["FechaMod"];
					$arr_Usuario[$i]=$fila["Usuario"];
					
					
			        ++$i;
			   }
               return array("arr_Horario_ID"=>$arr_Horario_ID,
							"arr_Descripcion"=>$arr_Descripcion,
							"arr_Dia"=>$arr_Dia, 
							"arr_Hora"=>$arr_Hora,
                            "arr_Medico_ID"=>$arr_Medico_ID,
							"arr_FechaMod"=>$arr_FechaMod,
							"arr_Usuario"=>$arr_Usuario,
							);

            }

            public static function registrarCita($horario){
               $query = "Insert Into TBHorario(Horario_ID, Descripcion, Dia, Hora, Medico_ID, FechaMod, Usuario) VALUES 
                         (:Horario_ID,:Descripcion,:Dia,:Hora,:Medico_ID,:FechaMod,:Usuario)";
                         //echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $horario_ID = $horario->GetHorario_ID();
               $Descripcion = $horario->GetDescripcion();
               $Dia = $horario->GetDia();
			   $Hora = $horario->GetHora();
               $Medico_ID = $horario->GetMedico_ID();
			   $FechaMod = $horario->GetFechaMod();
			   $Usuario = $horario->GetUsuario();
               $status=0;
               $fechareg = date('Y-m-d h:i:s');
               $resultado->bindParam(':Horario_ID',$horario_ID);
               $resultado->bindParam(':Descripcion',$descripcion);
               $resultado->bindParam(':Dia',$Dia);
			   $resultado->bindParam(':Hora',$Hora);
               $resultado->bindParam(':Medico_ID',$Medico_ID);
               $resultado->bindParam(':FechaMod',$FechaMod);
			   $resultado->bindParam(':Usuario',$Usuario);
               $horario_ID = NULL;
			   //echo " Horario_ID ".$Descripcion." Dia ".$Hora." Medico_ID ".$FechaMod." Usuario ";
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