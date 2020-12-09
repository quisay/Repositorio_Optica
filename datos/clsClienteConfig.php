   <?php
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include_once 'Conexion.php';
      include_once "$root/Optica/entidades/ClienteConfig.php";
      class clsClienteConfig extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene un Catalogo de Funciones
   ***
   */
            public static function getConfig($Cliente_ID,$Seccion_ID){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where Cliente_ID = :Cliente_ID and Seccion_ID = :Seccion_ID";
               
               $query = "Select * from Cliente_Config ".$filtro;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $resultado->bindParam(':Cliente_ID',$Cliente_ID); 
			   $resultado->bindParam(':Seccion_ID',$Seccion_ID);  			   
               
               $resultado->execute();

               $filas = $resultado->fetchAll();
             
			   $i=0;
			   $arr_Seccion_ID = null;
			   $arr_Cliente_ID=null;
			   $arr_Config_ID=null;
			   $arr_Observacion=null;
			   
			   foreach($filas as $fila){
					$arr_Seccion_ID[$i]=$fila["Seccion_ID"];
					$arr_Cliente_ID[$i]=$fila["Cliente_ID"];
					$arr_Config_ID[$i]=$fila["Config_ID"];
					$arr_Observacion[$arr_Config_ID[$i]]=$fila["Observacion"];	
			        ++$i;
			   }
               return array("arr_Seccion_ID"=>$arr_Seccion_ID,
			                "arr_Cliente_ID"=>$arr_Cliente_ID,
							"arr_Config_ID"=>$arr_Config_ID,
							"arr_Observacion"=>$arr_Observacion
							);

            }
			public static function getAllConfig(){
               $query = "Select * from tbconfig ";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Seccion_ID[$i]=$fila["Seccion_ID"];
					$arr_Cliente_ID[$i]=$fila["Cliente_ID"];
					$arr_Config_ID[$i]=$fila["Config_ID"];
					$arr_Observacion[$i]=$fila["Observacion"];
						
			        ++$i;
			   }
               return array("arr_Seccion_ID"=>$arr_Seccion_ID,
			                "arr_Cliente_ID"=>$arr_Cliente_ID,
							"arr_Config_ID"=>$arr_Config_ID,
							"arr_Observacion"=>$arr_Observacion
							);

            }

            public static function registrarConfig($config){
               $query = "Insert Into Cliente_Config(Seccion_ID, Cliente_ID, Config_ID, Observacion)
							    Values (:Seccion_ID, :Cliente_ID, :Config_ID, :Observacion)";
                         //echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Seccion_ID = $config->GetSeccion_ID();
			   $Cliente_ID = $config->GetCliente_ID();
               $Config_ID = $config->GetConfig_ID();
			   $Observacion = $config->GetObservacion();
               //echo " <br>Seccion_ID ".$Seccion_ID.$Config_ID;
               $resultado->bindParam(':Seccion_ID',$Seccion_ID);
			   $resultado->bindParam(':Cliente_ID',$Cliente_ID);
               $resultado->bindParam(':Config_ID',$Config_ID);
			   $resultado->bindParam(':Observacion',$Observacion);			   
               if($resultado->execute()){
				   return true;
			   }
			   return false;

            }
			public static function deleteConfig($Cliente_ID,$Seccion_ID){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where Cliente_ID = :Cliente_ID and Seccion_ID = :Seccion_ID";
               
               $query = "Delete from Cliente_Config ".$filtro;		   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $resultado->bindParam(':Cliente_ID',$Cliente_ID); 
			   $resultado->bindParam(':Seccion_ID',$Seccion_ID);  			   
               
               $resultado->execute();

               return true;

            }
   }

   ?>