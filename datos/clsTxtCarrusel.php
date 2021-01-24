   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/Carruseltxt.php";
      class clsTxtCarrusel extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene un Texto
   ***
   */
            public static function getTexto($texto){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where texto_ID = :texto_id";
               
               $query = "Select * from TBtxtcarrusel ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $texto_id = $texto->GetTexto_ID();
               $resultado->bindParam(':texto_id',$texto_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $texto= new Texto();

               $texto->setTexto_ID($filas["Texto_ID"]);
               $texto->setTexto($filas["Texto"]);
               return $texto;

            }
			public static function getAllTexto(){
               $query = "Select * from TBtxtcarrusel";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Texto_ID[$i]=$fila["Texto_ID"];
					$arr_Texto[$i]=$fila["Texto"];
					
			        ++$i;
			   }
               return array("arr_Texto_ID"=>$arr_Texto_ID,
							"arr_Texto"=>$arr_Texto);
            }

            public static function registraTexto($texto){

	//Obtenemos Texto
			   self::getConexion();
			   $query = "Select max(texto_ID) as texto from TBtxtcarrusel";
			   
               $resultado0 = self::$conexion->prepare($query);
               $resultado0->execute();
               $filas0 = $resultado0->fetch();
               $texto_ID = $filas0["texto"];
			   if(trim($texto_ID)=="") $texto_ID = 0;
			   $texto_ID = $texto_ID +1;
              
			  $query = "Insert Into TBtxtcarrusel(Texto_ID, Texto) VALUES 
                         (:texto_ID, :texto)";
                         //echo " qry ==".$query;
               
               $resultado = self::$conexion->prepare($query);
               //$texto_ID = $texto->GetTexto_ID();
			   $texto = $texto->GetTexto();
			   $resultado->bindParam(':texto_ID',$texto_ID);
               $resultado->bindParam(':texto',$texto);
               
        
			   //echo " texto_ID ".$texto_ID." texto ".$texto;
               $resultado->execute();
               if($texto_ID=="")die("Error al insertar los datos, llame al administrador del sistema");
               return $texto_ID;
            }

   }

   ?>