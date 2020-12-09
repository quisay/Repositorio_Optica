   <?php
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include_once 'Conexion.php';
      include_once "$root/Optica/entidades/Seccion.php";
      class clsSeccion extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene un Catalogo de Secciones
   ***
   */
            public static function getSeccion($seccion){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where Seccion_ID = :Seccion_ID";
               
               $query = "Select * from tbseccion ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $seccion_id = $seccion->GetSeccion_ID();
               $resultado->bindParam(':seccion_id',$seccion_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $seccion= new Seccion();

               $seccion->setSeccion_ID($filas["Seccion_ID"]);
               $seccion->set Descripcion($filas[" Descripcion"]);
               $seccion->setTipo($filas["Tipo"]);
               $seccion->setStatus($filas["Status"]);
               return $seccion;

            }
			public static function getAllSeccion(){
               $query = "Select * from tbseccion ";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Seccion_ID[$i]=$fila["Seccion_ID"];
					$arr_Descripcion[$i]=$fila["Descripcion"];
					$arr_Tipo[$i]=$fila["Tipo"];
					$arr_Status[$i]=$fila["Status"];
						
			        ++$i;
			   }
               return array("arr_Seccion_ID"=>$arr_Seccion_ID,
							"arr_Descripcion"=>$arr_Descripcion,
							"arr_Tipo"=>$arr_Tipo,
							"arr_Status"=>$arr_Status);

            }

            public static function registrarSeccion($seccion){
               $query = "Insert Into tbseccion(Seccion_ID, Descripcion, Tipo, Status) VALUES 
                         (:Seccion_ID,:Descripcion,:Tipo,:Status)";
                         //echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Seccion_ID = $seccion->GetSeccion_ID();
               $Descripcion = $seccion->GetDescripcion();
               $Tipo = $seccion->GetTipo();
               $Status=0;
               $resultado->bindParam(':Seccion_ID',$Seccion_ID);
               $resultado->bindParam(':Descripcion',$Descripcion);
			   $resultado->bindParam(':Tipo',$Tipo);
               $resultado->bindParam(':Status',$Status);
               $Seccion_ID = NULL;
               if($resultado->execute()){
				   return true;
			   }
			   return false;

            }
   }

   ?>