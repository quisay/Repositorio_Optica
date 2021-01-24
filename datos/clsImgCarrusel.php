   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/Carruselimg.php";
      class clsImgCarrusel extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene una Imagen
   ***
   */
            public static function getImagen($imagen){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where Imagen_ID = :imagen_id";
               
               $query = "Select * from 	TBimgcarrusel ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $imagen_id = $imagen->getImagen_ID();
               $resultado->bindParam(':imagen_id',$imagen_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $imagen= new Imgcarrusel();

               $imagen->setImagen_ID($filas["Imagen_ID"]);
               $imagen->setImagen($filas["Imagen"]);
               $imagen->setDescripcion($filas["Descripcion"]);
               return $imagen;

            }
			public static function getAllImagen(){
               $query = "Select * from TBimgcarrusel";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Imagen_ID[$i]=$fila["Imagen_ID"];
					$arr_Imagen[$i]=$fila["Imagen"];
					$arr_Descripcion[$i]=$fila["Descripcion"];
					
			        ++$i;
			   }
               return array("arr_Imagen_ID"=>$arr_Imagen_ID,
							"arr_Imagen"=>$arr_Imagen, 
                            "arr_Descripcion"=>$arr_Descripcion,);
            }

            public static function insertaImagen($oimagen){

 //Obtenemos último ID de Imagen
			   self::getConexion();
			   $query = "Select max(imagen_ID) as imagen from TBimgcarrusel";
			   
               $resultado0 = self::$conexion->prepare($query);
               $resultado0->execute();
               $filas0 = $resultado0->fetch();
               $imagen_ID = $filas0["imagen"];
			   if(trim($imagen_ID)=="") $imagen_ID = 0;
			   $imagen_ID = $imagen_ID +1;
              
			  $query = "Insert Into TBimgcarrusel(Imagen_ID, Imagen, Descripcion) VALUES 
                         (:imagen_ID, :imagen,:descripcion)";
                         //echo " qry ==".$query;
               
               $resultado = self::$conexion->prepare($query);
               //$imagen_ID = $imagen->getImagen_ID();
			   $imagen = $oimagen->getImagen();
               $descripcion = $oimagen->getDescripcion();
			   //echo " imagen_ID ".$imagen_ID." descripcion ".$descripcion;
			   $resultado->bindParam(':imagen_ID',$imagen_ID);
               $resultado->bindParam(':imagen',$imagen);
               $resultado->bindParam(':descripcion',$descripcion);
        
			   
               $resultado->execute();
               if($imagen_ID=="")die("Error al insertar los datos, llame al administrador del sistema");
               return $imagen_ID;
            }

   }

   ?>