   <?php
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include_once 'Conexion.php';
      include_once "$root/Optica/entidades/Config.php";
      class clsConfig extends Conexion
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
            public static function getConfig($Seccion_ID){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where Seccion_ID = :Seccion_ID";
               
               $query = "Select * from tbconfig ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Seccion_ID = $Seccion_ID->GetSeccion_ID();
               $resultado->bindParam(':Seccion_ID',$Seccion_ID);   
               
               $resultado->execute();

               $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Seccion_ID[$i]=$fila["Seccion_ID"];
					$arr_Catalogo_ID[$i]=$fila["Catalogo_ID"];
					$arr_Descripcion[$i]=$fila["Descripcion"];
					$arr_Tipo[$i]=$fila["Tipo"];
					$arr_Status[$i]=$fila["Status"];
					$arr_XML[$i]=$fila["XML"];
					$arr_Usuario_ID[$i]=$fila["Usuario_ID"];
					$arr_Fmod[$i]=$fila["Fmod"];
						
			        ++$i;
			   }
               return array("arr_Seccion_ID"=>$arr_Seccion_ID,
			                "arr_Catalogo_ID"=>$arr_Catalogo_ID,
							"arr_Descripcion"=>$arr_Descripcion,
							"arr_Tipo"=>$arr_Tipo,
							"arr_Status"=>$arr_Status,
							"arr_XML"=>$arr_XML,
							"arr_Usuario_ID"=>$arr_Usuario_ID,
							"arr_Fmod"=>$arr_Fmod);

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
					$arr_Catalogo_ID[$i]=$fila["Catalogo_ID"];
					$arr_Descripcion[$i]=$fila["Descripcion"];
					$arr_Tipo[$i]=$fila["Tipo"];
					$arr_Status[$i]=$fila["Status"];
					$arr_XML[$i]=$fila["XML"];
					$arr_Usuario_ID[$i]=$fila["Usuario_ID"];
					$arr_Fmod[$i]=$fila["Fmod"];
						
			        ++$i;
			   }
               return array("arr_Seccion_ID"=>$arr_Seccion_ID,
			                "arr_Descripcion"=>$arr_Catalogo_ID,
							"arr_Descripcion"=>$arr_Descripcion,
							"arr_Tipo"=>$arr_Tipo,
							"arr_Status"=>$arr_Status,
							"arr_XML"=>$XML,
							"arr_Usuario_ID"=>$Usuario_ID,
							"arr_Fmod"=>$Fmod);

            }

            public static function registrarConfig($config){
               $query = "Insert Into tbconfig(Seccion_ID, Catalogo_ID Descripcion, Tipo, Status, XML, Usuario_ID, Fmod) VALUES 
                         (:Seccion_ID,:Catalogo_ID,:Descripcion,:Tipo,:Status,:XML,:Usuario_ID,:Fmod)";
                         //echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Seccion_ID = $config->GetSeccion_ID();
			   $Catalogo_ID = $config->GetCatalogo_ID();
               $Descripcion = $config->GetDescripcion();
               $Tipo = $config->GetTipo();
               $Status=0;
			   $XML = $config->GetXML();
			   $Usuario_ID = $config->GetUsuario_ID();
			   $Fmod = $config->GetFmod();
               $resultado->bindParam(':Seccion_ID',$Seccion_ID);
			   $resultado->bindParam(':Catalogo_ID',$Catalogo_ID);
               $resultado->bindParam(':Descripcion',$Descripcion);
			   $resultado->bindParam(':Tipo',$Tipo);
               $resultado->bindParam(':Status',$Status);
			   $resultado->bindParam(':XML',$XML);
			   $resultado->bindParam(':Usuario_ID',$Usuario_ID);
			   $resultado->bindParam(':Fmod',$Fmod);
               $Seccion_ID = NULL;
               if($resultado->execute()){
				   return true;
			   }
			   return false;

            }
   }

   ?>